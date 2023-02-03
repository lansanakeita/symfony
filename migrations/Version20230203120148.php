<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230203120148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB1823DC304035');
        $this->addSql('DROP INDEX UNIQ_E1BB1823DC304035 ON atelier');
        $this->addSql('ALTER TABLE atelier DROP salle_id');
        $this->addSql('ALTER TABLE salle ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5C82E2CF35 ON salle (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier ADD salle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB1823DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E1BB1823DC304035 ON atelier (salle_id)');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C82E2CF35');
        $this->addSql('DROP INDEX IDX_4E977E5C82E2CF35 ON salle');
        $this->addSql('ALTER TABLE salle DROP atelier_id');
    }
}
