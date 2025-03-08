<?php

$projectRoot = getcwd();
$projectName = basename($projectRoot);

echo "📂 Project Directory: $projectName\n";

// Kullanıcının hangi yapılandırmayı istediğini belirle
$dockerType = $argv[1] ?? 'frontend'; // Default: frontend

$dockerPaths = [
    'frontend' => __DIR__ . '/',
    'backend' => __DIR__  . '/',
];

// Geçerli bir tür mü kontrol et
if (!isset($dockerPaths[$dockerType])) {
    echo "❌ Error: Invalid docker type. Use 'frontend' or 'backend'.\n";
    exit(1);
}

$dockerDir = $dockerPaths[$dockerType];

// Dockerfile'ı ana dizine kopyala
$dockerfileSrc = $dockerDir . 'Dockerfile';
$dockerfileDest = "$projectRoot/Dockerfile";

if (!file_exists($dockerfileDest)) {
    copy($dockerfileSrc, $dockerfileDest);
    echo "✅ Copied: $dockerfileSrc → $dockerfileDest\n";
} else {
    echo "⚠️ Skipped: $dockerfileDest already exists.\n";
}

// docker-compose-template.php dosyasını çalıştır ve docker-compose.yml oluştur
require $dockerDir . 'docker-compose-template.php';

echo "🚀 Docker setup ($dockerType) applied successfully!\n\n";
