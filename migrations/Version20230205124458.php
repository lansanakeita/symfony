<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205124458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponse_lyceen (reponse_id INT NOT NULL, lyceen_id INT NOT NULL, INDEX IDX_3B6DB73ECF18BB82 (reponse_id), INDEX IDX_3B6DB73E1E0D401B (lyceen_id), PRIMARY KEY(reponse_id, lyceen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse_lyceen ADD CONSTRAINT FK_3B6DB73ECF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse_lyceen ADD CONSTRAINT FK_3B6DB73E1E0D401B FOREIGN KEY (lyceen_id) REFERENCES lyceen (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_lyceen DROP FOREIGN KEY FK_3B6DB73ECF18BB82');
        $this->addSql('ALTER TABLE reponse_lyceen DROP FOREIGN KEY FK_3B6DB73E1E0D401B');
        $this->addSql('DROP TABLE reponse_lyceen');
    }
}
