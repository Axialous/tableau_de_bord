<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707114851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats ADD manuel_utilisation VARCHAR(255) DEFAULT NULL, CHANGE ticket_achat ticket_achat VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categories DROP color');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP manuel_utilisation, CHANGE ticket_achat ticket_achat LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE categories ADD color VARCHAR(7) DEFAULT NULL');
    }
}
