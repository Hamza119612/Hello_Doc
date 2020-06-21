<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621102731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE medcin CHANGE tt tt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE specialite CHANGE slug slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone INT DEFAULT NULL, CHANGE date_de_naissance date_de_naissance DATETIME DEFAULT NULL, CHANGE prix_visite prix_visite DOUBLE PRECISION DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) DEFAULT NULL, CHANGE is_registred is_registred TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE medcin CHANGE tt tt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE specialite CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT DEFAULT NULL, CHANGE date_de_naissance date_de_naissance DATETIME DEFAULT \'NULL\', CHANGE prix_visite prix_visite DOUBLE PRECISION DEFAULT \'NULL\', CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE is_registred is_registred TINYINT(1) DEFAULT \'NULL\'');
    }
}
