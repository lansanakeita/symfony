<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205150059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EC53BC6BC');
        $this->addSql('DROP INDEX IDX_B6F7494EC53BC6BC ON question');
        $this->addSql('ALTER TABLE question DROP reponse_possible_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD reponse_possible_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EC53BC6BC FOREIGN KEY (reponse_possible_id) REFERENCES reponse_possible (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EC53BC6BC ON question (reponse_possible_id)');
    }
}
