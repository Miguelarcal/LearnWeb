<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240602180306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutorial DROP FOREIGN KEY FK_C66BFFE969CCBE9A');
        $this->addSql('DROP INDEX IDX_C66BFFE969CCBE9A ON tutorial');
        $this->addSql('ALTER TABLE tutorial CHANGE author_id_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE tutorial ADD CONSTRAINT FK_C66BFFE9F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C66BFFE9F675F31B ON tutorial (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tutorial DROP FOREIGN KEY FK_C66BFFE9F675F31B');
        $this->addSql('DROP INDEX IDX_C66BFFE9F675F31B ON tutorial');
        $this->addSql('ALTER TABLE tutorial CHANGE author_id author_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE tutorial ADD CONSTRAINT FK_C66BFFE969CCBE9A FOREIGN KEY (author_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C66BFFE969CCBE9A ON tutorial (author_id_id)');
    }
}
