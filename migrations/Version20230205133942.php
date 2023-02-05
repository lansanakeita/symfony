<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205133942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD text_reponse VARCHAR(255) NOT NULL, ADD text_reponse1 VARCHAR(255) NOT NULL, ADD text_reponse2 VARCHAR(255) NOT NULL, ADD text_reponse3 VARCHAR(255) NOT NULL, ADD text_reponse4 VARCHAR(255) NOT NULL, DROP text_question, DROP text_question1, DROP text_question2, DROP text_question3, DROP text_question4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD text_question VARCHAR(255) NOT NULL, ADD text_question1 VARCHAR(255) NOT NULL, ADD text_question2 VARCHAR(255) NOT NULL, ADD text_question3 VARCHAR(255) NOT NULL, ADD text_question4 VARCHAR(255) NOT NULL, DROP text_reponse, DROP text_reponse1, DROP text_reponse2, DROP text_reponse3, DROP text_reponse4');
    }
}
