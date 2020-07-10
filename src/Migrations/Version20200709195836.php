<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709195836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agente (id INT AUTO_INCREMENT NOT NULL, ubicacion_id INT NOT NULL, nombre_apellido VARCHAR(255) NOT NULL, INDEX IDX_61421E3F57E759E8 (ubicacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', firstname VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recurso (id INT AUTO_INCREMENT NOT NULL, ubicacion_id INT NOT NULL, ip VARCHAR(255) NOT NULL, red VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, INDEX IDX_B2BB376457E759E8 (ubicacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localidad (id INT AUTO_INCREMENT NOT NULL, l_distrito VARCHAR(3) NOT NULL, l_nom_dis VARCHAR(150) NOT NULL, l_departamento VARCHAR(3) NOT NULL, l_nom_dpto VARCHAR(150) NOT NULL, nodo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ubicacion (id INT AUTO_INCREMENT NOT NULL, localidad_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_DC158CB867707C89 (localidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agente ADD CONSTRAINT FK_61421E3F57E759E8 FOREIGN KEY (ubicacion_id) REFERENCES ubicacion (id)');
        $this->addSql('ALTER TABLE recurso ADD CONSTRAINT FK_B2BB376457E759E8 FOREIGN KEY (ubicacion_id) REFERENCES ubicacion (id)');
        $this->addSql('ALTER TABLE ubicacion ADD CONSTRAINT FK_DC158CB867707C89 FOREIGN KEY (localidad_id) REFERENCES localidad (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ubicacion DROP FOREIGN KEY FK_DC158CB867707C89');
        $this->addSql('ALTER TABLE agente DROP FOREIGN KEY FK_61421E3F57E759E8');
        $this->addSql('ALTER TABLE recurso DROP FOREIGN KEY FK_B2BB376457E759E8');
        $this->addSql('DROP TABLE agente');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE recurso');
        $this->addSql('DROP TABLE localidad');
        $this->addSql('DROP TABLE ubicacion');
    }
}
