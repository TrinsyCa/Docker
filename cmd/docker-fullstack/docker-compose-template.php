<?php

$projectRoot = getcwd();
$projectName = basename($projectRoot);

$dockerComposeTemplate = <<<YML
version: '3.8'

services:
  nginx:
    container_name: {$projectName}-nginx
    image: nginx:latest
    ports:
      - "80:80"
    volumes:
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - web
      - api
    networks:
      - {$projectName}-network

  web:
    container_name: {$projectName}-frontend
    build:
      context: .
      dockerfile: docker/frontend/Dockerfile
    ports:
      - "3000:3000"
    volumes:
      - ./frontend:/app
      - /app/node_modules
    networks:
      - {$projectName}-network

  api:
    container_name: {$projectName}-backend
    build:
      context: .
      dockerfile: docker/backend/Dockerfile
    ports:
      - "8000:8000"
    volumes:
      - ./backend:/var/www/html
    depends_on:
      - db
    networks:
      - {$projectName}-network

  db:
    container_name: {$projectName}-db
    image: mysql:8.0
    ports:
      - "3306:3306"
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: app_db
      MYSQL_USER: app_user
      MYSQL_PASSWORD: secret
    volumes:
      - db_data:/var/lib/mysql
    networks:
      - {$projectName}-network

volumes:
  db_data:

networks:
  {$projectName}-network:
    driver: bridge
YML;

// docker-compose.yml dosyasını proje kök dizinine yaz
file_put_contents("$projectRoot/docker-compose.yml", $dockerComposeTemplate);

echo "✅ docker-compose.yml generated successfully with project name: $projectName\n";
