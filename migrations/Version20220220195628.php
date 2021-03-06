<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220195628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture ADD numch INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FF177E7E2 FOREIGN KEY (numch) REFERENCES chauffeur (numch)');
        $this->addSql('CREATE INDEX IDX_E9E2810FF177E7E2 ON voiture (numch)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chauffeur CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FF177E7E2');
        $this->addSql('DROP INDEX IDX_E9E2810FF177E7E2 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP numch, CHANGE marque marque VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
