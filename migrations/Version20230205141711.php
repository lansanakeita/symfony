<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205141711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edition_participation ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE edition_participation ADD CONSTRAINT FK_66E3CA321E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_66E3CA321E27F6BF ON edition_participation (question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edition_participation DROP FOREIGN KEY FK_66E3CA321E27F6BF');
        $this->addSql('DROP INDEX IDX_66E3CA321E27F6BF ON edition_participation');
        $this->addSql('ALTER TABLE edition_participation DROP question_id');
    }
}
