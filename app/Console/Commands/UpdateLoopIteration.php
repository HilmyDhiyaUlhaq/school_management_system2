<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateLoopIteration extends Command
{
    protected $signature = 'views:update-loop-iteration';
    protected $description = 'Update all list views to use $loop->iteration instead of $value->id for numbering';

    public function handle()
    {
        $viewsPath = resource_path('views');
        $files = [];

        // Scan untuk file list.blade.php
        $this->scanDirectory($viewsPath, $files);

        $updated = 0;

        foreach ($files as $file) {
            if ($this->updateFile($file)) {
                $updated++;
                $this->info("✅ Updated: " . str_replace(resource_path(), '', $file));
            }
        }

        $this->info("\n🎉 Update complete! {$updated} files updated.");
    }

    private function scanDirectory($dir, &$files)
    {
        $items = File::glob($dir . '/*');

        foreach ($items as $item) {
            if (File::isDirectory($item)) {
                $this->scanDirectory($item, $files);
            } elseif (basename($item) === 'list.blade.php') {
                $files[] = $item;
            }
        }
    }

    private function updateFile($filePath)
    {
        $content = File::get($filePath);
        $originalContent = $content;

        // Pattern untuk mengganti {{ $value->id }} dalam konteks tabel
        $patterns = [
            // Dalam <td> untuk penomoran
            '/(<td[^>]*>)\s*\{\{\s*\$value->id\s*\}\}\s*(<\/td>)/i',
        ];

        foreach ($patterns as $pattern) {
            $content = preg_replace($pattern, '$1{{ $loop->iteration }}$2', $content);
        }

        if ($content !== $originalContent) {
            File::put($filePath, $content);
            return true;
        }

        return false;
    }
}
