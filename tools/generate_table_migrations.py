from pathlib import Path
import re

root = Path(r'D:\laragon\www\wioos-kasirpro')
sql_path = root / 'db-co-kasirpro-v-1-1-3.sql'
out_dir = root / 'app/Database/Migrations'

if not sql_path.exists():
    raise FileNotFoundError(f'SQL dump not found: {sql_path}')

sql = sql_path.read_text(encoding='utf-8', errors='ignore')
sql = re.sub(r'/\*!.*?\*/\s*', '', sql, flags=re.S)
sql = re.sub(r'--.*?(?:\n|$)', '\n', sql, flags=re.S)

entries = []
seen = set()
index = 0
search_from = 0

while True:
    start = sql.lower().find('create table', search_from)
    if start == -1:
        break

    table_match = re.search(
        r'CREATE\s+TABLE\s+(?:IF\s+NOT\s+EXISTS\s+)?`?([A-Za-z0-9_]+)`?',
        sql[start:start + 200],
        flags=re.I,
    )
    if not table_match:
        search_from = start + 12
        continue

    table_name = table_match.group(1)
    key = table_name.lower()
    if key in seen:
        search_from = start + 12
        continue
    seen.add(key)

    open_paren = sql.find('(', start)
    if open_paren == -1:
        break

    depth = 0
    in_single = False
    in_double = False
    pos = open_paren
    while pos < len(sql):
        ch = sql[pos]
        if ch == "'" and not in_double:
            in_single = not in_single
        elif ch == '"' and not in_single:
            in_double = not in_double
        elif not in_single and not in_double:
            if ch == '(':
                depth += 1
            elif ch == ')':
                depth -= 1
                if depth == 0:
                    pos += 1
                    break
        pos += 1

    end = pos
    while end < len(sql) and sql[end] != ';':
        end += 1
    if end >= len(sql):
        break

    stmt = sql[start:end + 1].strip()
    entries.append((table_name, stmt))
    search_from = end + 1
    index += 1

if not entries:
    raise RuntimeError('No CREATE TABLE statements were parsed from the SQL dump.')

for order, (table_name, stmt) in enumerate(entries, start=1):
    class_base = ''.join(part.capitalize() for part in re.split(r'[^A-Za-z0-9]+', table_name) if part)
    class_name = 'Create' + (class_base if class_base else 'Table')
    file_name = f'2026-08-31-{order:06d}_{class_name}.php'
    file_path = out_dir / file_name

    content = (
        "<?php\n\n"
        "namespace App\\Database\\Migrations;\n\n"
        "use CodeIgniter\\Database\\Migration;\n\n"
        f"class {class_name} extends Migration\n"
        "{\n"
        "    public function up(): void\n"
        "    {\n"
        "        $this->db->query(<<<'SQL'\n"
        f"{stmt}\n"
        "SQL);\n"
        "    }\n\n"
        "    public function down(): void\n"
        "    {\n"
        f"        $this->forge->dropTable('{table_name}', true);\n"
        "    }\n"
        "}\n"
    )
    file_path.write_text(content, encoding='utf-8')
    print(file_name)

print(f'TOTAL_TABLES={len(entries)}')
