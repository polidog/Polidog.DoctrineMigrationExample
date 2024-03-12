<?php

declare(strict_types=1);

use BEAR\Dotenv\Dotenv;
require_once dirname(__DIR__) . '/vendor/autoload.php';
(new Dotenv())->load(dirname(__DIR__));

chdir(dirname(__DIR__));
passthru('rm -rf ./var/tmp/*');

// データベースの作成
$pdo = new \PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASSWORD'));
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . getenv('DB_NAME'));
$pdo->exec('DROP DATABASE IF EXISTS ' . getenv('DB_NAME') . '_test');
$pdo->exec('CREATE DATABASE ' . getenv('DB_NAME') . '_test');

// migrationの実行
$migrationsConfigPath = dirname(__DIR__) . '/var/doctrine/migrations.php';
$dbConfigPath = dirname(__DIR__) . '/var/doctrine/migrations-db.php';
$dbConfigTestPath = dirname(__DIR__) . '/var/doctrine/migrations-db-test.php';
passthru("vendor/bin/doctrine-migrations migrations:migrate --configuration=$migrationsConfigPath --db-configuration=$dbConfigPath --no-interaction ");
passthru("vendor/bin/doctrine-migrations migrations:migrate --configuration=$migrationsConfigPath --db-configuration=$dbConfigTestPath --no-interaction ");
