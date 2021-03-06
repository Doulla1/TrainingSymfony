<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322095817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE semestre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation VARCHAR(255) NOT NULL, semestre VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__cours AS SELECT id, nom, description, ects FROM cours');
        $this->addSql('DROP TABLE cours');
        $this->addSql('CREATE TABLE cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, ects INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO cours (id, nom, description, ects) SELECT id, nom, description, ects FROM __temp__cours');
        $this->addSql('DROP TABLE __temp__cours');
        $this->addSql('CREATE TEMPORARY TABLE __temp__lieu AS SELECT id, nom, description FROM lieu');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('CREATE TABLE lieu (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO lieu (id, nom, description) SELECT id, nom, description FROM __temp__lieu');
        $this->addSql('DROP TABLE __temp__lieu');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE semestre');
        $this->addSql('ALTER TABLE cours ADD COLUMN semestre VARCHAR(255) NOT NULL COLLATE BINARY');
        $this->addSql('ALTER TABLE lieu ADD COLUMN image VARCHAR(255) DEFAULT NULL COLLATE BINARY');
    }
}
