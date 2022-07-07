<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704072310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE achats ADD categorie_id INT DEFAULT NULL, DROP id_categorie');
        //$this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
       // $this->addSql('CREATE INDEX IDX_9920924EBCF5E72D ON achats (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924EBCF5E72D');
        //$this->addSql('DROP INDEX IDX_9920924EBCF5E72D ON achats');
       // $this->addSql('ALTER TABLE achats ADD id_categorie INT NOT NULL, DROP categorie_id');
    }
}