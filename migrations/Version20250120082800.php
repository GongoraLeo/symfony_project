<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250120082800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas ADD usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE tareas ADD CONSTRAINT FK_BFE3AB35DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_BFE3AB35DB38439E ON tareas (usuario_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas DROP FOREIGN KEY FK_BFE3AB35DB38439E');
        $this->addSql('DROP INDEX IDX_BFE3AB35DB38439E ON tareas');
        $this->addSql('ALTER TABLE tareas DROP usuario_id');
    }
}
