<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190720010718 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acteurs (id INT AUTO_INCREMENT NOT NULL, film_acteurs_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, age INT NOT NULL, civilite VARCHAR(20) NOT NULL, photo VARBINARY(255) DEFAULT NULL, INDEX IDX_B85835ACCE46D7B4 (film_acteurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_D48304B4A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, cinema_id INT DEFAULT NULL, titre VARCHAR(150) NOT NULL, synopsis LONGTEXT NOT NULL, duree TIME NOT NULL, datesortie DATETIME NOT NULL, INDEX IDX_CEECCA51B4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_films (genre_id INT NOT NULL, films_id INT NOT NULL, INDEX IDX_73EAD5944296D31F (genre_id), INDEX IDX_73EAD594939610EE (films_id), PRIMARY KEY(genre_id, films_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acteurs ADD CONSTRAINT FK_B85835ACCE46D7B4 FOREIGN KEY (film_acteurs_id) REFERENCES films (id)');
        $this->addSql('ALTER TABLE cinema ADD CONSTRAINT FK_D48304B4A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE genre_films ADD CONSTRAINT FK_73EAD5944296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_films ADD CONSTRAINT FK_73EAD594939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51B4CB84B6');
        $this->addSql('ALTER TABLE acteurs DROP FOREIGN KEY FK_B85835ACCE46D7B4');
        $this->addSql('ALTER TABLE genre_films DROP FOREIGN KEY FK_73EAD594939610EE');
        $this->addSql('ALTER TABLE genre_films DROP FOREIGN KEY FK_73EAD5944296D31F');
        $this->addSql('ALTER TABLE cinema DROP FOREIGN KEY FK_D48304B4A73F0036');
        $this->addSql('DROP TABLE acteurs');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE genre_films');
        $this->addSql('DROP TABLE ville');
    }
}
