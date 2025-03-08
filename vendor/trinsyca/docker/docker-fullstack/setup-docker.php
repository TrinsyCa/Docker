<?php

$projectRoot = getcwd();
$projectName = basename($projectRoot);

echo "📂 Project Directory: $projectName\n\n";

// Dizinin doğru tanımlanması
$dockerComposeDir = 'vendor/trinsyca/docker/docker-fullstack/';

// Dosya listesini tanımla
$files = [
    $dockerComposeDir . 'docker-compose.yml' => "$projectRoot/docker-compose.yml",
];

$directories = [
    $dockerComposeDir . 'docker' => "$projectRoot/docker",
];

// Dosyaları proje dizinine kopyala
/* foreach ($files as $src => $dest) {
    if (!file_exists($dest)) {
        if (copy($src, $dest)) {
            echo "✅ Copied: $src → $dest\n";
        } else {
            echo "❌ Failed to copy: $src → $dest\n";
        }
    } else {
        echo "⚠️ Skipped: $dest already exists.\n";
    }
} */

// Klasörleri kopyalayan fonksiyon
function recursive_copy($src, $dst) {
    if (!is_dir($src)) {
        echo "❌ Source directory does not exist: $src\n";
        return;
    }

    $dir = opendir($src);
    @mkdir($dst);

    while (false !== ($file = readdir($dir))) {
        if ($file !== '.' && $file !== '..') {
            $srcFile = $src . '/' . $file;
            $dstFile = $dst . '/' . $file;

            if (is_dir($srcFile)) {
                recursive_copy($srcFile, $dstFile);
            } else {
                if (copy($srcFile, $dstFile)) {
                    echo "✅ Copied file: $srcFile → $dstFile\n";
                } else {
                    echo "❌ Failed to copy file: $srcFile → $dstFile\n";
                }
            }
        }
    }
    closedir($dir);
}

// Klasörleri kopyala
foreach ($directories as $src => $dst) {
    recursive_copy($src, $dst);
    echo "✅ Copied directory: $src → $dst\n";
}

// docker-compose-template.php dosyasını çalıştır ve docker-compose.yml oluştur
$dockerTemplateFile = $dockerComposeDir . 'docker-compose-template.php';

if (file_exists($dockerTemplateFile)) {
    require $dockerTemplateFile;
    echo "\n🚀 Docker setup applied successfully!\n\n";
} else {
    echo "\n❌ Missing template file: $dockerTemplateFile\n";
}
