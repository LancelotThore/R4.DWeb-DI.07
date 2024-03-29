<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329081835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brique ADD category_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE brique ADD CONSTRAINT FK_B611ED79777D11E FOREIGN KEY (category_id_id) REFERENCES briques_categories (id)');
        $this->addSql('CREATE INDEX IDX_B611ED79777D11E ON brique (category_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brique DROP FOREIGN KEY FK_B611ED79777D11E');
        $this->addSql('DROP INDEX IDX_B611ED79777D11E ON brique');
        $this->addSql('ALTER TABLE brique DROP category_id_id');
    }
}
