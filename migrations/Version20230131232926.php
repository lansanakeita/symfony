<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131232926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA7A76ED395');
        $this->addSql('DROP INDEX UNIQ_EF396EA7A76ED395 ON lyceen');
        $this->addSql('ALTER TABLE lyceen CHANGE user_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA767B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF396EA767B3B43D ON lyceen (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA767B3B43D');
        $this->addSql('DROP INDEX UNIQ_EF396EA767B3B43D ON lyceen');
        $this->addSql('ALTER TABLE lyceen CHANGE users_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF396EA7A76ED395 ON lyceen (user_id)');
    }
}
