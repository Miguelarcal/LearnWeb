<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512220832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, type VARCHAR(255) NOT NULL, content VARCHAR(6000) NOT NULL, order_number INT NOT NULL, INDEX IDX_831B9722C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(600) NOT NULL, difficulty VARCHAR(60) NOT NULL, INDEX IDX_169E6FB9F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_language (course_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_7D6F1CE3591CC992 (course_id), INDEX IDX_7D6F1CE382F1BAF4 (language_id), PRIMARY KEY(course_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_label (course_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_E70C5700591CC992 (course_id), INDEX IDX_E70C570033B92F39 (label_id), PRIMARY KEY(course_id, label_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, tutorial_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, order_number INT NOT NULL, INDEX IDX_140AB62089366B7B (tutorial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutorial (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutorial_in_course (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, tutorial_id INT NOT NULL, order_number INT NOT NULL, INDEX IDX_4C015B2D591CC992 (course_id), INDEX IDX_4C015B2D89366B7B (tutorial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_type VARCHAR(50) NOT NULL, email VARCHAR(64) NOT NULL, passwd VARCHAR(255) NOT NULL, nickname VARCHAR(120) NOT NULL, banned TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_course (user_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_73CC7484A76ED395 (user_id), INDEX IDX_73CC7484591CC992 (course_id), PRIMARY KEY(user_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE3591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_label ADD CONSTRAINT FK_E70C5700591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_label ADD CONSTRAINT FK_E70C570033B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62089366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id)');
        $this->addSql('ALTER TABLE tutorial_in_course ADD CONSTRAINT FK_4C015B2D591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE tutorial_in_course ADD CONSTRAINT FK_4C015B2D89366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id)');
        $this->addSql('ALTER TABLE user_course ADD CONSTRAINT FK_73CC7484A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_course ADD CONSTRAINT FK_73CC7484591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722C4663E4');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9F675F31B');
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE3591CC992');
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE382F1BAF4');
        $this->addSql('ALTER TABLE course_label DROP FOREIGN KEY FK_E70C5700591CC992');
        $this->addSql('ALTER TABLE course_label DROP FOREIGN KEY FK_E70C570033B92F39');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62089366B7B');
        $this->addSql('ALTER TABLE tutorial_in_course DROP FOREIGN KEY FK_4C015B2D591CC992');
        $this->addSql('ALTER TABLE tutorial_in_course DROP FOREIGN KEY FK_4C015B2D89366B7B');
        $this->addSql('ALTER TABLE user_course DROP FOREIGN KEY FK_73CC7484A76ED395');
        $this->addSql('ALTER TABLE user_course DROP FOREIGN KEY FK_73CC7484591CC992');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_language');
        $this->addSql('DROP TABLE course_label');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE tutorial');
        $this->addSql('DROP TABLE tutorial_in_course');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_course');
    }
}
