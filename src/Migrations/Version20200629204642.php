<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629204642 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rendezvous CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spcialite ADD id INT AUTO_INCREMENT NOT NULL, DROP id_medc, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user ADD specialite_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone INT DEFAULT NULL, CHANGE prix_visite prix_visite INT DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) DEFAULT NULL, CHANGE is_registred is_registred TINYINT(1) DEFAULT NULL, CHANGE date_de_naissance date_de_naissance DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492195E0F0 FOREIGN KEY (specialite_id) REFERENCES spcialite (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492195E0F0 ON user (specialite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rendezvous CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spcialite MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE spcialite DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE spcialite ADD id_medc INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492195E0F0');
        $this->addSql('DROP INDEX IDX_8D93D6492195E0F0 ON user');
        $this->addSql('ALTER TABLE user DROP specialite_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT DEFAULT NULL, CHANGE prix_visite prix_visite INT DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE cabinet_add cabinet_add VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE is_registred is_registred TINYINT(1) DEFAULT \'NULL\', CHANGE date_de_naissance date_de_naissance DATE DEFAULT \'NULL\'');
    }
}
