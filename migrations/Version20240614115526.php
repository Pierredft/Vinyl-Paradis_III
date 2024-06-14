<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240614115526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disque ADD artiste_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE disque ADD CONSTRAINT FK_F5ACECA221D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('CREATE INDEX IDX_F5ACECA221D25844 ON disque (artiste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disque DROP FOREIGN KEY FK_F5ACECA221D25844');
        $this->addSql('DROP INDEX IDX_F5ACECA221D25844 ON disque');
        $this->addSql('ALTER TABLE disque DROP artiste_id');
    }
}
