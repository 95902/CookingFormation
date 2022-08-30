<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830153940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details_formation (id INT AUTO_INCREMENT NOT NULL, type_details_formation VARCHAR(255) NOT NULL, enoncer_details_formation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, sous_titre VARCHAR(255) DEFAULT NULL, duree_formation VARCHAR(255) NOT NULL, contenue JSON DEFAULT NULL, INDEX IDX_404021BFBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_prerequis (formation_id INT NOT NULL, prerequis_id INT NOT NULL, INDEX IDX_9EBBD45200282E (formation_id), INDEX IDX_9EBBD4ED196790 (prerequis_id), PRIMARY KEY(formation_id, prerequis_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_objectif (formation_id INT NOT NULL, objectif_id INT NOT NULL, INDEX IDX_256A3FA05200282E (formation_id), INDEX IDX_256A3FA0157D1AD4 (objectif_id), PRIMARY KEY(formation_id, objectif_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_details_formation (formation_id INT NOT NULL, details_formation_id INT NOT NULL, INDEX IDX_9094497B5200282E (formation_id), INDEX IDX_9094497B7F69BD89 (details_formation_id), PRIMARY KEY(formation_id, details_formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectif (id INT AUTO_INCREMENT NOT NULL, enonce_objectif VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prerequis (id INT AUTO_INCREMENT NOT NULL, enonce_prerequis VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFBCF5E72D FOREIGN KEY (categorie_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE formation_prerequis ADD CONSTRAINT FK_9EBBD45200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_prerequis ADD CONSTRAINT FK_9EBBD4ED196790 FOREIGN KEY (prerequis_id) REFERENCES prerequis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_objectif ADD CONSTRAINT FK_256A3FA05200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_objectif ADD CONSTRAINT FK_256A3FA0157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_details_formation ADD CONSTRAINT FK_9094497B5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_details_formation ADD CONSTRAINT FK_9094497B7F69BD89 FOREIGN KEY (details_formation_id) REFERENCES details_formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_details_formation DROP FOREIGN KEY FK_9094497B7F69BD89');
        $this->addSql('ALTER TABLE formation_prerequis DROP FOREIGN KEY FK_9EBBD45200282E');
        $this->addSql('ALTER TABLE formation_objectif DROP FOREIGN KEY FK_256A3FA05200282E');
        $this->addSql('ALTER TABLE formation_details_formation DROP FOREIGN KEY FK_9094497B5200282E');
        $this->addSql('ALTER TABLE formation_objectif DROP FOREIGN KEY FK_256A3FA0157D1AD4');
        $this->addSql('ALTER TABLE formation_prerequis DROP FOREIGN KEY FK_9EBBD4ED196790');
        $this->addSql('DROP TABLE details_formation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_prerequis');
        $this->addSql('DROP TABLE formation_objectif');
        $this->addSql('DROP TABLE formation_details_formation');
        $this->addSql('DROP TABLE objectif');
        $this->addSql('DROP TABLE prerequis');
    }
}
