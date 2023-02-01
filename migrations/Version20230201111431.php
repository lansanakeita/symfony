<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201111431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervenant ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_73D0145C82E2CF35 ON intervenant (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145C82E2CF35');
        $this->addSql('DROP INDEX IDX_73D0145C82E2CF35 ON intervenant');
        $this->addSql('ALTER TABLE intervenant DROP atelier_id');
    }
}
