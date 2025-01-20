<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117123720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tareas ADD categoria_id INT NOT NULL, DROP tipo');
        $this->addSql('ALTER TABLE tareas ADD CONSTRAINT FK_BFE3AB353397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_BFE3AB353397707A ON tareas (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas DROP FOREIGN KEY FK_BFE3AB353397707A');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP INDEX IDX_BFE3AB353397707A ON tareas');
        $this->addSql('ALTER TABLE tareas ADD tipo VARCHAR(255) NOT NULL, DROP categoria_id');
    }
}
