<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619131352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE save_panier (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, nom VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, quantity INT NOT NULL, total NUMERIC(10, 2) NOT NULL, total_qauntity NUMERIC(10, 2) NOT NULL, total_quantity_panier INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE save_panier');
    }
}
