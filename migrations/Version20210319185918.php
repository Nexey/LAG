<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319185918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fourniture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix_depart DOUBLE PRECISION DEFAULT NULL, prix_actuel DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, gamme_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix_vente DOUBLE PRECISION NOT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, benefice DOUBLE PRECISION DEFAULT NULL, INDEX IDX_29A5EC27D2FD85F1 (gamme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_fourniture (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, fourniture_id INT NOT NULL, nb_fourniture INT NOT NULL, INDEX IDX_BABC5D0AF347EFB (produit_id), INDEX IDX_BABC5D0A884A3A3C (fourniture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('ALTER TABLE produit_fourniture ADD CONSTRAINT FK_BABC5D0AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_fourniture ADD CONSTRAINT FK_BABC5D0A884A3A3C FOREIGN KEY (fourniture_id) REFERENCES fourniture (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_fourniture DROP FOREIGN KEY FK_BABC5D0A884A3A3C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D2FD85F1');
        $this->addSql('ALTER TABLE produit_fourniture DROP FOREIGN KEY FK_BABC5D0AF347EFB');
        $this->addSql('DROP TABLE fourniture');
        $this->addSql('DROP TABLE gamme');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_fourniture');
        $this->addSql('DROP TABLE user');
    }
}
