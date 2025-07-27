<?php
// File: app/Console/Commands/IdMaintenance.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\IdManager;

class IdMaintenance extends Command
{
    protected $signature = 'id:maintenance {--reorder} {--table=}';
    protected $description = 'ID Maintenance untuk auto reset dan reorder';

    public function handle()
    {
        $tables = [
            'users', 'class', 'subject', 'assign_class_teacher',
            'class_subject', 'exam', 'homework', 'marks_grade', 'student_add_fees'
        ];

        $specificTable = $this->option('table');
        $reorder = $this->option('reorder');

        if ($specificTable) {
            $tables = [$specificTable];
        }

        foreach ($tables as $table) {
            try {
                if ($reorder) {
                    IdManager::reorderIds($table);
                    $this->info("✅ Table '{$table}' berhasil di-reorder");
                } else {
                    $nextId = IdManager::autoReset($table);
                    $this->info("✅ Table '{$table}' auto increment reset ke {$nextId}");
                }
            } catch (\Exception $e) {
                $this->error("❌ Error pada table '{$table}': " . $e->getMessage());
            }
        }
    }
}
