<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220627112139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achats (id INT AUTO_INCREMENT NOT NULL, lieu_achat VARCHAR(255) NOT NULL, nom_produit VARCHAR(255) NOT NULL, id_categorie INT NOT NULL, date_achat DATE NOT NULL, fin_garantie DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, informations LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_factures (id INT AUTO_INCREMENT NOT NULL, achats_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_957B4681645CAD33 (achats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_factures ADD CONSTRAINT FK_957B4681645CAD33 FOREIGN KEY (achats_id) REFERENCES achats (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_factures DROP FOREIGN KEY FK_957B4681645CAD33');
        $this->addSql('DROP TABLE achats');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE photo_factures');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
