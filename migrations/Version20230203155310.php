<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230203155310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lyceen ADD section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA7D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_EF396EA7D823E37A ON lyceen (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA7D823E37A');
        $this->addSql('DROP INDEX IDX_EF396EA7D823E37A ON lyceen');
        $this->addSql('ALTER TABLE lyceen DROP section_id');
    }
}
