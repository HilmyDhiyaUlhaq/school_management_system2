<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetAutoIncrement extends Command
{
    protected $signature = 'db:reset-auto-increment {table?} {--force-reset : Force reset to 1}';
    protected $description = 'Reset auto increment for tables';

    public function handle()
    {
        $table = $this->argument('table');
        $forceReset = $this->option('force-reset');

        if ($table) {
            $this->resetTable($table, $forceReset);
        } else {
            $this->resetAllTables($forceReset);
        }
    }

    private function resetAllTables($forceReset = false)
    {
        $tables = [
            'users',
            'class',
            'subject',
            'assign_class_teacher',
            'class_subject',
            'exam',
            'homework',
            'marks_grade',
            'student_add_fees',
            'exam_schedule',
            'notice_board'
        ];

        foreach ($tables as $table) {
            $this->resetTable($table, $forceReset);
        }

        $this->info('All tables auto increment reset successfully!');
    }

    private function resetTable($table, $forceReset = false)
    {
        try {
            if ($forceReset) {
                // Hapus semua data dan reset ke 1
                DB::statement("TRUNCATE TABLE `{$table}`");
                $this->info("Table '{$table}' truncated and auto increment reset to 1");
            } else {
                // Reset normal (ke max ID + 1)
                $maxId = DB::table($table)->max('id');
                $nextId = $maxId ? $maxId + 1 : 1;
                DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = {$nextId}");
                $this->info("Table '{$table}' auto increment reset to {$nextId}");
            }
        } catch (\Exception $e) {
            $this->error("Failed to reset table '{$table}': " . $e->getMessage());
        }
    }
}
