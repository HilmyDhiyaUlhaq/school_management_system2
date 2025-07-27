<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\IdManager;

class IdManagementController extends Controller
{
    public function index()
    {
        $tables = $this->getTableStats();
        return view('admin.id_management.index', compact('tables'));
    }

    public function autoReset(Request $request)
    {
        try {
            $table = $request->table;
            $nextId = IdManager::autoReset($table);

            return redirect()->back()->with('success', "Auto increment table '{$table}' berhasil direset ke {$nextId}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Error: " . $e->getMessage());
        }
    }

    public function reorderIds(Request $request)
    {
        try {
            $table = $request->table;
            IdManager::reorderIds($table);

            return redirect()->back()->with('success', "ID table '{$table}' berhasil diurutkan ulang");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Error: " . $e->getMessage());
        }
    }

    public function autoFix(Request $request)
    {
        try {
            $table = $request->table;
            $maxGap = $request->max_gap ?? 10;

            $fixed = IdManager::monitorAndFix($table, $maxGap);

            if ($fixed) {
                return redirect()->back()->with('success', "Table '{$table}' berhasil diperbaiki karena gap terlalu besar");
            } else {
                return redirect()->back()->with('info', "Table '{$table}' tidak perlu diperbaiki");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Error: " . $e->getMessage());
        }
    }

    private function getTableStats()
    {
        $tableNames = [
            'users' => 'Users',
            'class' => 'Classes',
            'subject' => 'Subjects',
            'assign_class_teacher' => 'Assign Class Teacher',
            'class_subject' => 'Class Subjects',
            'exam' => 'Exams',
            'student_add_fees' => 'Student Fees'
        ];

        $stats = [];
        foreach ($tableNames as $table => $displayName) {
            try {
                $totalRecords = \DB::table($table)->count();
                $maxId = \DB::table($table)->max('id') ?? 0;
                $gap = $maxId - $totalRecords;

                $stats[$table] = [
                    'display_name' => $displayName,
                    'total_records' => $totalRecords,
                    'max_id' => $maxId,
                    'gap' => $gap,
                    'needs_fix' => $gap > 5
                ];
            } catch (\Exception $e) {
                $stats[$table] = [
                    'display_name' => $displayName,
                    'error' => $e->getMessage()
                ];
            }
        }

        return $stats;
    }
}
