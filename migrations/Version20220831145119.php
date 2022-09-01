<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220831145119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenue_formation ADD titre_formation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE formation ADD contenue_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF939B2951 FOREIGN KEY (contenue_formation_id) REFERENCES contenue_formation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BF939B2951 ON formation (contenue_formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenue_formation DROP titre_formation');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF939B2951');
        $this->addSql('DROP INDEX UNIQ_404021BF939B2951 ON formation');
        $this->addSql('ALTER TABLE formation DROP contenue_formation_id');
    }
}
