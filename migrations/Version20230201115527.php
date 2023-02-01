<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201115527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145C67B3B43D');
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA767B3B43D');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F67B3B43D');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX UNIQ_73D0145C67B3B43D ON intervenant');
        $this->addSql('ALTER TABLE intervenant CHANGE users_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_73D0145CA76ED395 ON intervenant (user_id)');
        $this->addSql('DROP INDEX UNIQ_EF396EA767B3B43D ON lyceen');
        $this->addSql('ALTER TABLE lyceen DROP users_id, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA7BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_AB55E24F67B3B43D ON participation');
        $this->addSql('ALTER TABLE participation CHANGE users_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FA76ED395 ON participation (user_id)');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, ADD type VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, first_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CA76ED395');
        $this->addSql('DROP INDEX UNIQ_73D0145CA76ED395 ON intervenant');
        $this->addSql('ALTER TABLE intervenant CHANGE user_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_73D0145C67B3B43D ON intervenant (users_id)');
        $this->addSql('ALTER TABLE lyceen DROP FOREIGN KEY FK_EF396EA7BF396750');
        $this->addSql('ALTER TABLE lyceen ADD users_id INT DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE lyceen ADD CONSTRAINT FK_EF396EA767B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF396EA767B3B43D ON lyceen (users_id)');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA76ED395');
        $this->addSql('DROP INDEX IDX_AB55E24FA76ED395 ON participation');
        $this->addSql('ALTER TABLE participation CHANGE user_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_AB55E24F67B3B43D ON participation (users_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP roles, DROP type, CHANGE email email VARCHAR(100) DEFAULT NULL, CHANGE password password VARCHAR(100) NOT NULL, CHANGE phone phone VARCHAR(100) DEFAULT NULL');
    }
}
