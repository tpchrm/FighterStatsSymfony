<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202171216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A5DD0B535');
        $this->addSql('DROP INDEX IDX_67F5D80A5DD0B535 ON fighter_men');
        $this->addSql('ALTER TABLE fighter_men DROP wins_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fighter_men ADD wins_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A5DD0B535 FOREIGN KEY (wins_id) REFERENCES fight_men (id)');
        $this->addSql('CREATE INDEX IDX_67F5D80A5DD0B535 ON fighter_men (wins_id)');
    }
}
