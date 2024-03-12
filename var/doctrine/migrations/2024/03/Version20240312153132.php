<?php

declare(strict_types=1);

namespace Polidog\DoctrineMigrationExample\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312153132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create user table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('username', 'string', ['length' => 255]);
        $table->addColumn('avatar_url', 'string', [
            'length' => 255,
            'notnull' => true,
            'default' => null
        ]);
        $table->addColumn("created_at", "datetime", [
            "notnull" => false,
            "default" => null
        ]);
        $table->addColumn("updated_at", "datetime", [
            "notnull" => false,
            "default" => null
        ]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable("authors");
    }
}
