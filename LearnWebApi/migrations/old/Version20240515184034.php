<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515184034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tutorial_language (tutorial_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_4C5E03589366B7B (tutorial_id), INDEX IDX_4C5E03582F1BAF4 (language_id), PRIMARY KEY(tutorial_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutorial_label (tutorial_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_6B5AB4289366B7B (tutorial_id), INDEX IDX_6B5AB4233B92F39 (label_id), PRIMARY KEY(tutorial_id, label_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tutorial_language ADD CONSTRAINT FK_4C5E03589366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_language ADD CONSTRAINT FK_4C5E03582F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_label ADD CONSTRAINT FK_6B5AB4289366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tutorial_label ADD CONSTRAINT FK_6B5AB4233B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutorial_language DROP FOREIGN KEY FK_4C5E03589366B7B');
        $this->addSql('ALTER TABLE tutorial_language DROP FOREIGN KEY FK_4C5E03582F1BAF4');
        $this->addSql('ALTER TABLE tutorial_label DROP FOREIGN KEY FK_6B5AB4289366B7B');
        $this->addSql('ALTER TABLE tutorial_label DROP FOREIGN KEY FK_6B5AB4233B92F39');
        $this->addSql('DROP TABLE tutorial_language');
        $this->addSql('DROP TABLE tutorial_label');
    }
}
