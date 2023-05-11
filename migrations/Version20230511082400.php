<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511082400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, prix NUMERIC(10, 0) NOT NULL, image VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, categorie VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, INDEX IDX_2038A207BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE plats DROP FOREIGN KEY FK_854A620ABCF5E72D');
        $this->addSql('DROP TABLE plats');
        $this->addSql('ALTER TABLE categorie CHANGE plats plat VARCHAR(120) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plats (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix NUMERIC(10, 0) NOT NULL, image VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, details VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_854A620ABCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE plats ADD CONSTRAINT FK_854A620ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207BCF5E72D');
        $this->addSql('DROP TABLE plat');
        $this->addSql('ALTER TABLE categorie CHANGE plat plats VARCHAR(120) NOT NULL');
    }
}
