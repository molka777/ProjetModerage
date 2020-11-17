<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116221445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cadeau (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nouveau_type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, offre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, sondages_id INT NOT NULL, texte VARCHAR(255) DEFAULT NULL, INDEX IDX_B6F7494E65C3BD4A (sondages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remise (id INT AUTO_INCREMENT NOT NULL, pourcentage INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remuneration (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, questions_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, contenue VARCHAR(2000) DEFAULT NULL, INDEX IDX_5FB6DEC7BCB134CE (questions_id), INDEX IDX_5FB6DEC7FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sondage (id INT AUTO_INCREMENT NOT NULL, sujets_id INT DEFAULT NULL, remises_id INT DEFAULT NULL, cadeaux_id INT DEFAULT NULL, nouveaux_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, nb_participant INT DEFAULT NULL, nb_reponse INT DEFAULT NULL, nb_question INT DEFAULT NULL, UNIQUE INDEX UNIQ_7579C89F50B0AC57 (sujets_id), UNIQUE INDEX UNIQ_7579C89F6EECD166 (remises_id), UNIQUE INDEX UNIQ_7579C89FDA7CA8F0 (cadeaux_id), UNIQUE INDEX UNIQ_7579C89F855D09F1 (nouveaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, numtel INT NOT NULL, adresse VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, matricule_fisc VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, registre_com VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E65C3BD4A FOREIGN KEY (sondages_id) REFERENCES sondage (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7BCB134CE FOREIGN KEY (questions_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89F50B0AC57 FOREIGN KEY (sujets_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89F6EECD166 FOREIGN KEY (remises_id) REFERENCES remise (id)');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89FDA7CA8F0 FOREIGN KEY (cadeaux_id) REFERENCES cadeau (id)');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89F855D09F1 FOREIGN KEY (nouveaux_id) REFERENCES nouveau_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sondage DROP FOREIGN KEY FK_7579C89FDA7CA8F0');
        $this->addSql('ALTER TABLE sondage DROP FOREIGN KEY FK_7579C89F855D09F1');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7BCB134CE');
        $this->addSql('ALTER TABLE sondage DROP FOREIGN KEY FK_7579C89F6EECD166');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E65C3BD4A');
        $this->addSql('ALTER TABLE sondage DROP FOREIGN KEY FK_7579C89F50B0AC57');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7FB88E14F');
        $this->addSql('DROP TABLE cadeau');
        $this->addSql('DROP TABLE nouveau_type');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE remise');
        $this->addSql('DROP TABLE remuneration');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE sondage');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE utilisateur');
    }
}
