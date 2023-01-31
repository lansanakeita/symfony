<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131113038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lycee (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lyceen ADD lycee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA7D1DC61BF FOREIGN KEY (lycee_id) REFERENCES lycee (id)');
        $this->addSql('CREATE INDEX IDX_EF396EA7D1DC61BF ON lyceen (lycee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA7D1DC61BF');
        $this->addSql('DROP TABLE lycee');
        $this->addSql('DROP INDEX IDX_EF396EA7D1DC61BF ON lyceen');
        $this->addSql('ALTER TABLE lyceen DROP lycee_id');
    }
}
