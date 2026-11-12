#!/usr/bin/env python3
"""
Generate per-table seeders for CodeIgniter 4 from SQL dump.
Each table gets its own seeder class for better maintainability.
"""

import re
from pathlib import Path
from collections import defaultdict

def extract_insert_statements_robust(sql_file):
    """Extract INSERT statements more robustly from SQL dump."""
    content = Path(sql_file).read_text(encoding='utf-8')
    tables_data = defaultdict(list)
    
    # Find all INSERT INTO statements
    # Use a more robust approach: find all "INSERT INTO" and then find the matching semicolon
    pattern = r"INSERT INTO `([^`]+)`[^;]*?;(?=\n|$)"
    
    for match in re.finditer(pattern, content, re.DOTALL):
        table_name = match.group(1)
        full_stmt = match.group(0)
        tables_data[table_name].append(full_stmt)
    
    return tables_data

def get_table_list(sql_file):
    """Extract list of all table names from the dump."""
    content = Path(sql_file).read_text(encoding='utf-8')
    # Pattern: CREATE TABLE `table_name`
    pattern = r"CREATE TABLE `([^`]+)`"
    matches = re.findall(pattern, content)
    return sorted(set(matches))

def create_seeder_class(table_name, insert_statements):
    """Create a seeder class for a single table."""
    # Convert table name to class name (e.g., barang -> BarangSeeder)
    class_name = ''.join(word.capitalize() for word in table_name.split('_')) + 'Seeder'
    
    # Build queries array
    queries_lines = []
    for stmt in insert_statements:
        # Use double quotes and escape special characters
        # Escape backslashes first, then double quotes, then dollar signs
        escaped_stmt = stmt.replace('\\', '\\\\').replace('"', '\\"').replace('$', '\\$')
        queries_lines.append(f'            "{escaped_stmt}",')
    
    # Remove trailing comma from last entry
    if queries_lines:
        queries_lines[-1] = queries_lines[-1].rstrip(',')
    
    queries_block = '\n'.join(queries_lines)
    
    seeder_content = f'''<?php

namespace App\\Database\\Seeds;

use CodeIgniter\\Database\\Seeder;

class {class_name} extends Seeder
{{
    public function run()
    {{
        $queries = [
{queries_block}
        ];

        foreach ($queries as $query) {{
            $this->db->query($query);
        }}
    }}
}}
'''
    
    return seeder_content

def main():
    sql_file = r'D:\laragon\www\wioos-kasirpro\db-co-kasirpro-v-1-1-3.sql'
    seeds_dir = Path(r'D:\laragon\www\wioos-kasirpro\app\Database\Seeds')
    
    print("[*] Analyzing SQL dump...")
    tables = get_table_list(sql_file)
    print(f"[OK] Found {len(tables)} tables")
    
    # Extract INSERT statements by table
    print("\n[*] Extracting INSERT statements...")
    tables_data = extract_insert_statements_robust(sql_file)
    print(f"[OK] Found {len(tables_data)} tables with data")
    
    # Generate seeder for each table with data
    print("\n[*] Generating seeders...")
    seeder_classes = []
    
    for table_name in sorted(tables_data.keys()):
        insert_stmts = tables_data[table_name]
        seeder_code = create_seeder_class(table_name, insert_stmts)
        
        # Generate class name
        class_name = ''.join(word.capitalize() for word in table_name.split('_')) + 'Seeder'
        seeder_classes.append(class_name)
        
        # Write seeder file
        seeder_file = seeds_dir / f'{class_name}.php'
        seeder_file.write_text(seeder_code, encoding='utf-8')
        print(f"  [OK] {class_name}.php ({len(insert_stmts)} INSERT statements)")
    
    # Generate DatabaseSeeder that calls all table seeders
    print("\n[*] Updating DatabaseSeeder.php...")
    db_seeder_calls = '\n'.join([f"        $this->call('{cls}');" for cls in sorted(seeder_classes)])
    
    db_seeder_content = f'''<?php

namespace App\\Database\\Seeds;

use CodeIgniter\\Database\\Seeder;

class DatabaseSeeder extends Seeder
{{
    public function run()
    {{
{db_seeder_calls}
    }}
}}
'''
    
    db_seeder_file = seeds_dir / 'DatabaseSeeder.php'
    db_seeder_file.write_text(db_seeder_content, encoding='utf-8')
    print("[OK] DatabaseSeeder.php updated")
    
    print(f"\n[SUCCESS] Generated {len(seeder_classes)} per-table seeders!")
    print(f"   Tables: {', '.join(sorted(tables_data.keys()))}")

if __name__ == '__main__':
    main()
