<?php
// File: app/Helpers/IdManager.php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class IdManager
{
    /**
     * Auto reset auto increment untuk tabel tertentu
     */
    public static function autoReset($tableName)
    {
        $maxId = DB::table($tableName)->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        DB::statement("ALTER TABLE `{$tableName}` AUTO_INCREMENT = {$nextId}");

        return $nextId;
    }

    /**
     * Reorder IDs untuk membuat berurutan tanpa gap
     */
    public static function reorderIds($tableName)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $records = DB::table($tableName)->orderBy('id')->get();

            if ($records->isEmpty()) {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                return;
            }

            $newId = 1;
            foreach ($records as $record) {
                DB::table($tableName)
                    ->where('id', $record->id)
                    ->update(['id' => $newId]);
                $newId++;
            }

            DB::statement("ALTER TABLE `{$tableName}` AUTO_INCREMENT = {$newId}");
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } catch (\Exception $e) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            throw $e;
        }
    }

    /**
     * Monitor dan auto-reorder jika gap terlalu banyak
     */
    public static function monitorAndFix($tableName, $maxGapAllowed = 10)
    {
        $totalRecords = DB::table($tableName)->count();
        $maxId = DB::table($tableName)->max('id') ?? 0;

        $gap = $maxId - $totalRecords;

        if ($gap > $maxGapAllowed) {
            static::reorderIds($tableName);
            return true;
        }

        return false;
    }
}
