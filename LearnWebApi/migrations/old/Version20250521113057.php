<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250521113057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tutorial_score (tutorial_id INT NOT NULL, user_id INT NOT NULL, score INT NOT NULL, INDEX IDX_3A8BCCFB89366B7B (tutorial_id), INDEX IDX_3A8BCCFBA76ED395 (user_id), PRIMARY KEY(tutorial_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tutorial_score ADD CONSTRAINT FK_3A8BCCFB89366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (id)');
        $this->addSql('ALTER TABLE tutorial_score ADD CONSTRAINT FK_3A8BCCFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutorial_score DROP FOREIGN KEY FK_3A8BCCFB89366B7B');
        $this->addSql('ALTER TABLE tutorial_score DROP FOREIGN KEY FK_3A8BCCFBA76ED395');
        $this->addSql('DROP TABLE tutorial_score');
    }
}
