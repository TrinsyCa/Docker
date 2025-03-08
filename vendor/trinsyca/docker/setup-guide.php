<?php

echo "\n";
echo "==================================\n";
echo "🚀 TrinsyCa Docker Setup Guide 🚀\n";
echo "==================================\n\n";

// Proje adını al
$projectRoot = getcwd();
$projectName = basename($projectRoot);

echo "📂 Project Directory: $projectName\n\n";

// Kullanım talimatlarını göster
echo "🔹 How to generate Docker files for your project:\n\n";

echo "👉 For Backend Only:\n";
echo "   $ composer trinsy:docker-backend\n";
echo "   → This command will generate backend Docker files and setup Docker environment.\n\n";

echo "👉 For Frontend Only:\n";
echo "   $ composer trinsy:docker-frontend\n";
echo "   → This command will generate frontend Docker files and setup Docker environment.\n\n";

echo "👉 For Fullstack (Frontend + Backend):\n";
echo "   $ composer trinsy:docker-fullstack\n";
echo "   → This command will generate both frontend and backend Docker files together.\n\n";

echo "🛑 To remove Docker files:\n";
echo "   $ composer trinsy:docker-remove\n";
echo "   → This command will remove instantly all Docker files❗\n\n";

echo "🚀 Setup Completed Successfully! Now you can use Docker. 🎉\n\n";
