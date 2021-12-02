<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202095652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fight_men_fighter_men (fight_men_id INT NOT NULL, fighter_men_id INT NOT NULL, INDEX IDX_8349289A1965E510 (fight_men_id), INDEX IDX_8349289AEFE00905 (fighter_men_id), PRIMARY KEY(fight_men_id, fighter_men_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fight_men_fighter_men ADD CONSTRAINT FK_8349289A1965E510 FOREIGN KEY (fight_men_id) REFERENCES fight_men (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fight_men_fighter_men ADD CONSTRAINT FK_8349289AEFE00905 FOREIGN KEY (fighter_men_id) REFERENCES fighter_men (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A795DFCD4B8');
        $this->addSql('DROP INDEX UNIQ_C1D17A795DFCD4B8 ON fight_men');
        $this->addSql('ALTER TABLE fight_men DROP winner_id');
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A1965E510');
        $this->addSql('DROP INDEX IDX_67F5D80A1965E510 ON fighter_men');
        $this->addSql('ALTER TABLE fighter_men ADD wins_id INT DEFAULT NULL, DROP fight_men_id');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A5DD0B535 FOREIGN KEY (wins_id) REFERENCES fight_men (id)');
        $this->addSql('CREATE INDEX IDX_67F5D80A5DD0B535 ON fighter_men (wins_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fight_men_fighter_men');
        $this->addSql('ALTER TABLE fight_men ADD winner_id INT NOT NULL');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A795DFCD4B8 FOREIGN KEY (winner_id) REFERENCES fighter_men (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C1D17A795DFCD4B8 ON fight_men (winner_id)');
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A5DD0B535');
        $this->addSql('DROP INDEX IDX_67F5D80A5DD0B535 ON fighter_men');
        $this->addSql('ALTER TABLE fighter_men ADD fight_men_id INT NOT NULL, DROP wins_id');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A1965E510 FOREIGN KEY (fight_men_id) REFERENCES fight_men (id)');
        $this->addSql('CREATE INDEX IDX_67F5D80A1965E510 ON fighter_men (fight_men_id)');
    }
}
