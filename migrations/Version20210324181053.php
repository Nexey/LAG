<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324181053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_active`) VALUES (1, "leliam@live.fr", "[\"ROLE_USER\", \"ROLE_ADMIN\"]", "$argon2id$v=19$m=65536,t=4,p=1$bzUvMEFQamJRRFJkV3FOQw$44Av42pY4q1VNccglVU2eD0p0E0+OPTxPsDQG0Vz2RQ", 1)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM user');
    }
}
