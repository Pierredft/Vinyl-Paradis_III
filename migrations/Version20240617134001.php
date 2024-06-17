<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240617134001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE disque_genre (disque_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_42A52D991161FE8 (disque_id), INDEX IDX_42A52D94296D31F (genre_id), PRIMARY KEY(disque_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_disque (genre_id INT NOT NULL, disque_id INT NOT NULL, INDEX IDX_1E1FDC824296D31F (genre_id), INDEX IDX_1E1FDC8291161FE8 (disque_id), PRIMARY KEY(genre_id, disque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disque_genre ADD CONSTRAINT FK_42A52D991161FE8 FOREIGN KEY (disque_id) REFERENCES disque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_genre ADD CONSTRAINT FK_42A52D94296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_disque ADD CONSTRAINT FK_1E1FDC824296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_disque ADD CONSTRAINT FK_1E1FDC8291161FE8 FOREIGN KEY (disque_id) REFERENCES disque (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disque_genre DROP FOREIGN KEY FK_42A52D991161FE8');
        $this->addSql('ALTER TABLE disque_genre DROP FOREIGN KEY FK_42A52D94296D31F');
        $this->addSql('ALTER TABLE genre_disque DROP FOREIGN KEY FK_1E1FDC824296D31F');
        $this->addSql('ALTER TABLE genre_disque DROP FOREIGN KEY FK_1E1FDC8291161FE8');
        $this->addSql('DROP TABLE disque_genre');
        $this->addSql('DROP TABLE genre_disque');
    }
}
