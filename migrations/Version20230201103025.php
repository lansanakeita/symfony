<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201103025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_metier DROP FOREIGN KEY FK_28C2C9E8ED16FA20');
        $this->addSql('ALTER TABLE activite_metier DROP FOREIGN KEY FK_28C2C9E89B0F88B1');
        $this->addSql('DROP TABLE activite_metier');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite_metier (activite_id INT NOT NULL, metier_id INT NOT NULL, INDEX IDX_28C2C9E89B0F88B1 (activite_id), INDEX IDX_28C2C9E8ED16FA20 (metier_id), PRIMARY KEY(activite_id, metier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activite_metier ADD CONSTRAINT FK_28C2C9E8ED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_metier ADD CONSTRAINT FK_28C2C9E89B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
    }
}
