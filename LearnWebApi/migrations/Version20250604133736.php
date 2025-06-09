<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250604133736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_score (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, user_id INT NOT NULL, score INT NOT NULL, INDEX IDX_DB3230B9591CC992 (course_id), INDEX IDX_DB3230B9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_score ADD CONSTRAINT FK_DB3230B9591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course_score ADD CONSTRAINT FK_DB3230B9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tutorial_label DROP FOREIGN KEY FK_6B5AB4233B92F39');
        $this->addSql('ALTER TABLE tutorial_label DROP FOREIGN KEY FK_6B5AB4289366B7B');
        $this->addSql('ALTER TABLE tutorial_language DROP FOREIGN KEY FK_4C5E03582F1BAF4');
        $this->addSql('ALTER TABLE tutorial_language DROP FOREIGN KEY FK_4C5E03589366B7B');
        $this->addSql('ALTER TABLE course_label DROP FOREIGN KEY FK_E70C570033B92F39');
        $this->addSql('ALTER TABLE course_label DROP FOREIGN KEY FK_E70C5700591CC992');
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE3591CC992');
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE382F1BAF4');
        $this->addSql('DROP TABLE tutorial_label');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE tutorial_language');
        $this->addSql('DROP TABLE course_label');
        $this->addSql('DROP TABLE course_language');
        $this->addSql('ALTER TABLE course ADD add_date DATETIME NOT NULL, ADD mod_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tutorial ADD add_date DATETIME NOT NULL, ADD mod_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tutorial_score ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tutorial_label (tutorial_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_6B5AB4233B92F39 (label_id), INDEX IDX_6B5AB4289366B7B (tutorial_id), PRIMARY KEY(tutorial_id, label_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tutorial_language (tutorial_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_4C5E03582F1BAF4 (language_id), INDEX IDX_4C5E03589366B7B (tutorial_id), PRIMARY KEY(tutorial_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course_label (course_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_E70C570033B92F39 (label_id), INDEX IDX_E70C5700591CC992 (course_id), PRIMARY KEY(course_id, label_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE course_language (course_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_7D6F1CE3591CC992 (course_id), INDEX IDX_7D6F1CE382F1BAF4 (language_id), PRIMARY KEY(course_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tutorial_label ADD CONSTRAINT FK_6B5AB4233B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_label ADD CONSTRAINT FK_6B5AB4289366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_language ADD CONSTRAINT FK_4C5E03582F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_language ADD CONSTRAINT FK_4C5E03589366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_label ADD CONSTRAINT FK_E70C570033B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_label ADD CONSTRAINT FK_E70C5700591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE3591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_score DROP FOREIGN KEY FK_DB3230B9591CC992');
        $this->addSql('ALTER TABLE course_score DROP FOREIGN KEY FK_DB3230B9A76ED395');
        $this->addSql('DROP TABLE course_score');
        $this->addSql('ALTER TABLE tutorial_score MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON tutorial_score');
        $this->addSql('ALTER TABLE tutorial_score DROP id');
        $this->addSql('ALTER TABLE tutorial_score ADD PRIMARY KEY (tutorial_id, user_id)');
        $this->addSql('ALTER TABLE course DROP add_date, DROP mod_date');
        $this->addSql('ALTER TABLE tutorial DROP add_date, DROP mod_date');
    }
}
