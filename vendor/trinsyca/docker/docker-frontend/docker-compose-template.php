<?php

$projectRoot = getcwd();
$projectName = basename($projectRoot);

$dockerComposeTemplate = <<<YML
version: '3.8'

services:
  app:
    image: 'laravelapp:latest'
    build:
      context: .
      dockerfile: Dockerfile
    ports:
      - "8000:8000"
    volumes:
      - .:/var/www
    environment:
      - APP_ENV=local
    networks:
      - {$projectName}-api_{$projectName}-api-network

networks:
  {$projectName}-api_{$projectName}-api-network:
    external: true
YML;

// docker-compose.yml dosyasını proje kök dizinine yaz
file_put_contents("$projectRoot/docker-compose.yml", $dockerComposeTemplate);

echo "✅ docker-compose.yml generated successfully with project name: $projectName\n";
