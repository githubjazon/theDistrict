<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511081404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plats ADD categorie_id INT NOT NULL, ADD plat VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE plats ADD CONSTRAINT FK_854A620ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_854A620ABCF5E72D ON plats (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plats DROP FOREIGN KEY FK_854A620ABCF5E72D');
        $this->addSql('DROP INDEX IDX_854A620ABCF5E72D ON plats');
        $this->addSql('ALTER TABLE plats DROP categorie_id, DROP plat');
    }
}
