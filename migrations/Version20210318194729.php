<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318194729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO `fourniture` (`id`, `nom`, `prix_depart`, `prix_actuel`) VALUES (1, "bout de ficelle", 0.48, 0.48),(2, "ruban", 0.4, 0.4),(3, "étiquette", 0.4, 0.4),(4, "bout de carton", NULL, NULL),(5, "papier d\'emballage", NULL, NULL)');
        $this->addSql('INSERT INTO `gamme` (`id`, `nom`) VALUES(1, "carton et bouts de ficelle"),(2, "emballages")');
        $this->addSql('INSERT INTO `produit` (`id`, `gamme_id`, `nom`, `prix_vente`, `prix_achat`, `benefice`) VALUES(1, 1, "Carton et bouts de ficelle 1", 1407.66, NULL, NULL),(2, 1, "Carton et bouts de ficelle 2", 2050.28, NULL, NULL),(3, 1, "Carton et bouts de ficelle 3", 1402.55, NULL, NULL),(4, 1, "Carton et bouts de ficelle 4", 1382.26, NULL, NULL),(5, 1, "Carton et bouts de ficelle 5", 2080.49, NULL, NULL),(6, 1, "Carton et bouts de ficelle 6", 2133.32, NULL, NULL),(7, 1, "Carton et bouts de ficelle 7", 2728.76, NULL, NULL),(8, 1, "Carton et bouts de ficelle 8", 2065.28, NULL, NULL),(9, 1, "Carton et bouts de ficelle 9", 2769.13, NULL, NULL),(10, 2, "Emballage 1", 664.09, NULL, NULL),(11, 2, "Emballage 2", 984.87, NULL, NULL),(12, 2, "Emballage 3", 770.66, NULL, NULL),(13, 2, "Emballage 4", 1138.15, NULL, NULL),(14, 2, "Emballage 5", 1336.14, NULL, NULL),(15, 2, "Emballage 6", 1880.97, NULL, NULL),(16, 2, "Emballage 7", 1936.04, NULL, NULL),(17, 2, "Emballage 8", 1160.25, NULL, NULL),(18, 2, "Emballage 9", 1258.96, NULL, NULL),(19, 2, "Emballage 10", 1397.47, NULL, NULL),(20, 2, "Emballage 11", 1253.33, NULL, NULL),(21, 2, "Emballage 12", 1609.01, NULL, NULL)');
        $this->addSql('INSERT INTO `produit_fourniture` (`id`, `produit_id`, `fourniture_id`, `nb_fourniture`) VALUES(1, 1, 4, 10),(2, 1, 1, 5),(3, 2, 4, 12),(4, 2, 1, 20),(5, 3, 4, 13),(6, 3, 1, 10),(7, 4, 4, 13),(8, 4, 1, 10),(9, 5, 4, 13),(10, 5, 1, 10),(11, 6, 4, 13),(12, 6, 1, 10),(13, 7, 4, 16),(14, 7, 1, 20),(15, 8, 4, 16),(16, 8, 1, 20),(17, 9, 4, 17),(18, 9, 1, 10),(19, 10, 5, 12),(20, 10, 2, 0),(21, 10, 3, 0),(22, 11, 5, 12),(23, 11, 2, 0),(24, 11, 3, 0),(25, 12, 5, 9),(26, 12, 2, 1),(27, 12, 3, 0),(28, 13, 5, 35),(29, 13, 2, 1),(30, 13, 3, 1),(31, 14, 5, 35),(32, 14, 2, 1),(33, 14, 3, 1),(34, 15, 5, 16),(35, 15, 2, 1),(36, 15, 3, 1),(37, 16, 5, 16),(38, 16, 2, 2),(39, 16, 3, 1),(40, 17, 5, 35),(41, 17, 2, 1),(42, 17, 3, 1),(43, 18, 5, 12),(44, 18, 2, 3),(45, 18, 3, 0),(46, 19, 5, 12),(47, 19, 2, 1),(48, 19, 3, 0),(49, 20, 5, 35),(50, 20, 2, 1),(51, 20, 3, 1),(52, 21, 5, 16),(53, 21, 2, 2),(54, 21, 3, 0)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM produit_fourniture');
        $this->addSql('DELETE FROM produit');
        $this->addSql('DELETE FROM gamme');
        $this->addSql('DELETE FROM fourniture');
    }
}
