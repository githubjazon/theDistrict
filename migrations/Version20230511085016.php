<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511085016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D82EA2E54 FOREIGN KEY (commande_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D82EA2E54 ON commande (commande_id)');
        $this->addSql('ALTER TABLE detail ADD detail_id INT NOT NULL');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93D8D003BB FOREIGN KEY (detail_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_2E067F93D8D003BB ON detail (detail_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93D8D003BB');
        $this->addSql('DROP INDEX IDX_2E067F93D8D003BB ON detail');
        $this->addSql('ALTER TABLE detail DROP detail_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D82EA2E54');
        $this->addSql('DROP INDEX IDX_6EEAA67D82EA2E54 ON commande');
        $this->addSql('ALTER TABLE commande DROP commande_id');
    }
}
