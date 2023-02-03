<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230203121851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier_intervenant (atelier_id INT NOT NULL, intervenant_id INT NOT NULL, INDEX IDX_DAC6F4282E2CF35 (atelier_id), INDEX IDX_DAC6F42AB9A1716 (intervenant_id), PRIMARY KEY(atelier_id, intervenant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_intervenant ADD CONSTRAINT FK_DAC6F4282E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_intervenant ADD CONSTRAINT FK_DAC6F42AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145C82E2CF35');
        $this->addSql('DROP INDEX IDX_73D0145C82E2CF35 ON intervenant');
        $this->addSql('ALTER TABLE intervenant DROP atelier_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_intervenant DROP FOREIGN KEY FK_DAC6F4282E2CF35');
        $this->addSql('ALTER TABLE atelier_intervenant DROP FOREIGN KEY FK_DAC6F42AB9A1716');
        $this->addSql('DROP TABLE atelier_intervenant');
        $this->addSql('ALTER TABLE intervenant ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_73D0145C82E2CF35 ON intervenant (atelier_id)');
    }
}
