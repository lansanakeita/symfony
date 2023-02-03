<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230203123421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier_lyceen (atelier_id INT NOT NULL, lyceen_id INT NOT NULL, INDEX IDX_E0E358B82E2CF35 (atelier_id), INDEX IDX_E0E358B1E0D401B (lyceen_id), PRIMARY KEY(atelier_id, lyceen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_lyceen ADD CONSTRAINT FK_E0E358B82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_lyceen ADD CONSTRAINT FK_E0E358B1E0D401B FOREIGN KEY (lyceen_id) REFERENCES lyceen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F82E2CF35');
        $this->addSql('DROP TABLE participation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, atelier_id INT DEFAULT NULL, INDEX IDX_AB55E24F82E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('ALTER TABLE atelier_lyceen DROP FOREIGN KEY FK_E0E358B82E2CF35');
        $this->addSql('ALTER TABLE atelier_lyceen DROP FOREIGN KEY FK_E0E358B1E0D401B');
        $this->addSql('DROP TABLE atelier_lyceen');
    }
}
