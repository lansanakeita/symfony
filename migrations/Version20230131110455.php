<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131110455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, nom_activite VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_metier (activite_id INT NOT NULL, metier_id INT NOT NULL, INDEX IDX_28C2C9E89B0F88B1 (activite_id), INDEX IDX_28C2C9E8ED16FA20 (metier_id), PRIMARY KEY(activite_id, metier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_metier ADD CONSTRAINT FK_28C2C9E89B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_metier ADD CONSTRAINT FK_28C2C9E8ED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE activity');
        $this->addSql('ALTER TABLE metier DROP activites');
        $this->addSql('ALTER TABLE question ADD questionnaire_id INT DEFAULT NULL, ADD reponse_possible_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ECE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaire (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EC53BC6BC FOREIGN KEY (reponse_possible_id) REFERENCES reponse_possible (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494ECE07E8FF ON question (questionnaire_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EC53BC6BC ON question (reponse_possible_id)');
        $this->addSql('ALTER TABLE reponse ADD question_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC71E27F6BF ON reponse (question_id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7A76ED395 ON reponse (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, nom_activite VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activite_metier DROP FOREIGN KEY FK_28C2C9E89B0F88B1');
        $this->addSql('ALTER TABLE activite_metier DROP FOREIGN KEY FK_28C2C9E8ED16FA20');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_metier');
        $this->addSql('ALTER TABLE metier ADD activites VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ECE07E8FF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EC53BC6BC');
        $this->addSql('DROP INDEX IDX_B6F7494ECE07E8FF ON question');
        $this->addSql('DROP INDEX IDX_B6F7494EC53BC6BC ON question');
        $this->addSql('ALTER TABLE question DROP questionnaire_id, DROP reponse_possible_id');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A76ED395');
        $this->addSql('DROP INDEX IDX_5FB6DEC71E27F6BF ON reponse');
        $this->addSql('DROP INDEX IDX_5FB6DEC7A76ED395 ON reponse');
        $this->addSql('ALTER TABLE reponse DROP question_id, DROP user_id');
    }
}
