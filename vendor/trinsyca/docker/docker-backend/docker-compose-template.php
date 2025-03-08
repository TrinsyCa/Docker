<?php

$projectRoot = getcwd();
$projectName = basename($projectRoot);

$dockerComposeTemplate = <<<YML
version: '3.8'
services:
  api:
    container_name: api
    build:
      context: .
      dockerfile: ./docker/dev/Dockerfile
    image: bookstore-api
    extra_hosts:
      - 'host.docker.internal:host-gateway'
    ports:
      - '8001:80'
    volumes:
      - '.:/var/www/html'
    depends_on:
      - db
    networks:
      - "{$projectName}-api-network"
  db:
    image: 'mysql/mysql-server:8.0'
    command: --socket=/var/run/mysqld/mysqld.sock
    ports:
      - '__FORWARD_DB_PORT__:3306'
    environment:
      MYSQL_ROOT_PASSWORD: '\${DB_PASSWORD}'
      MYSQL_ROOT_HOST: '%'
      MYSQL_DATABASE: '\${DB_DATABASE}'
      MYSQL_USER: '\${DB_USERNAME}'
      MYSQL_PASSWORD: '\${DB_PASSWORD}'
      MYSQL_ALLOW_EMPTY_PASSWORD: 0
    volumes:
      - "{$projectName}-mysql:/var/lib/mysql"
    networks:
      - "{$projectName}-api-network"

networks:
  {$projectName}-api-network:
    driver: bridge
volumes:
  {$projectName}-mysql:
    driver: "local"
YML;

// Değişkeni burada değiştir
$dockerComposeTemplate = str_replace('__FORWARD_DB_PORT__', '${FORWARD_DB_PORT:-3306}', $dockerComposeTemplate);

file_put_contents("$projectRoot/docker-compose.yml", $dockerComposeTemplate);

echo "\n✅ docker-compose.yml generated successfully with project name: {$projectName}\n";
