<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117124147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas ADD categoria_id INT NOT NULL');
        $this->addSql('ALTER TABLE tareas ADD CONSTRAINT FK_BFE3AB353397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_BFE3AB353397707A ON tareas (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas DROP FOREIGN KEY FK_BFE3AB353397707A');
        $this->addSql('DROP INDEX IDX_BFE3AB353397707A ON tareas');
        $this->addSql('ALTER TABLE tareas DROP categoria_id');
    }
}
