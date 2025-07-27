<?php


$files = [
    'resources/views/admin/admin/list.blade.php',
    'resources/views/admin/teacher/list.blade.php',
    'resources/views/admin/student/list.blade.php',
    'resources/views/admin/parent/list.blade.php',
    'resources/views/admin/class/list.blade.php',
    'resources/views/admin/subject/list.blade.php',
    'resources/views/admin/assign_class_teacher/list.blade.php',
    'resources/views/admin/assign_subject/list.blade.php',
    'resources/views/admin/homework/list.blade.php',
    'resources/views/admin/class_timetable/list.blade.php',
    'resources/views/admin/communicate/noticeboard/list.blade.php',
    'resources/views/admin/examinations/exam/list.blade.php',
    'resources/views/admin/examinations/marks_grade/list.blade.php'
];

$basePath = __DIR__ . '/';

foreach ($files as $file) {
    $fullPath = $basePath . $file;

    if (file_exists($fullPath)) {
        $content = file_get_contents($fullPath);


        $patterns = [

            '/(<td[^>]*>)\{\{\s*\$value->id\s*\}\}(<\/td>)/i',
            
            '/(<td[^>]*>)\{\{\s*\$value->id\s*\}\}(<\/td>)/i'
        ];

        $replacement = '$1{{ $loop->iteration }}$2';

        $originalContent = $content;

        foreach ($patterns as $pattern) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Cek apakah ada perubahan
        if ($content !== $originalContent) {
            file_put_contents($fullPath, $content);
            echo "✅ Updated: {$file}\n";
        } else {
            echo "⏭️ No changes needed: {$file}\n";
        }
    } else {
        echo "❌ File not found: {$file}\n";
    }
}

echo "\n🎉 Update complete!\n";
echo "Sekarang semua file list menggunakan \$loop->iteration untuk penomoran urut.\n";
