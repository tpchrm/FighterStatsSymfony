<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202170931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A3E11ABEA');
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80AF203F111');
        $this->addSql('DROP INDEX IDX_67F5D80A3E11ABEA ON fighter_men');
        $this->addSql('DROP INDEX IDX_67F5D80AF203F111 ON fighter_men');
        $this->addSql('ALTER TABLE fighter_men DROP red_corner_fights_id, DROP blue_corner_fights_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fighter_men ADD red_corner_fights_id INT DEFAULT NULL, ADD blue_corner_fights_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A3E11ABEA FOREIGN KEY (red_corner_fights_id) REFERENCES fight_men (id)');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80AF203F111 FOREIGN KEY (blue_corner_fights_id) REFERENCES fight_men (id)');
        $this->addSql('CREATE INDEX IDX_67F5D80A3E11ABEA ON fighter_men (red_corner_fights_id)');
        $this->addSql('CREATE INDEX IDX_67F5D80AF203F111 ON fighter_men (blue_corner_fights_id)');
    }
}