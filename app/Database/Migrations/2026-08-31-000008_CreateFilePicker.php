<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFilePicker extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `file_picker` (
  `id_file_picker` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_upload` int(10) UNSIGNED NOT NULL,
  `meta_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('file_picker', true);
    }
}
