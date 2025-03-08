<?php

// Proje dizinini al
$projectRoot = getcwd();
$dockerComposeFile = "$projectRoot/docker-compose.yml";
$dockerFile = "$projectRoot/Dockerfile";
$dockerDir = "$projectRoot/docker";

// Silinecek dosya ve dizinleri birleştir
$itemsToDelete = [
    $dockerComposeFile,
    $dockerFile,
    $dockerDir
];

// Onay sorusu
echo "⚠️ WARNING: This will remove the following files and directories:\n";
echo "- docker-compose.yml\n";
echo "- Dockerfile\n";
echo "- docker directory\n\n";

echo "⏳Deleting the items...\n";
foreach ($itemsToDelete as $item) {
    // Dosya mı, klasör mü kontrol et
    if (is_file($item)) {
        unlink($item);
        echo "✅ Deleted file: $item\n";
    } elseif (is_dir($item)) {
        // Klasörse, recursive olarak içeriğini sil
        deleteDirectory($item);
        echo "✅ Deleted directory: $item\n";
    }
}
echo "\n🚀 Docker setup has been successfully removed!\n\n";

// Klasör silme fonksiyonu
function deleteDirectory($dir) {
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $filePath = "$dir/$file";
        is_dir($filePath) ? deleteDirectory($filePath) : unlink($filePath);
    }
    rmdir($dir);
}
