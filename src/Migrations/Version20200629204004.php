<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629204004 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spcialite (id INT AUTO_INCREMENT NOT NULL, spec_medcin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone INT DEFAULT NULL, CHANGE prix_visite prix_visite INT DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) DEFAULT NULL, CHANGE is_registred is_registred TINYINT(1) DEFAULT NULL, CHANGE date_de_naissance date_de_naissance DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE rendezvous CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE specialite (id_specialite INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, specialite_medcin VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E7D6FCC1A76ED395 (user_id), PRIMARY KEY(id_specialite)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE spcialite');
        $this->addSql('ALTER TABLE rendezvous CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT DEFAULT NULL, CHANGE prix_visite prix_visite INT DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE is_registred is_registred TINYINT(1) DEFAULT \'NULL\', CHANGE date_de_naissance date_de_naissance DATE DEFAULT \'NULL\'');
    }
}
