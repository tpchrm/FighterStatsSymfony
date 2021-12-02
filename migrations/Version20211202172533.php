<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202172533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fight_men ADD red_fighter_men_id INT NOT NULL, ADD blue_fighter_men_id INT NOT NULL, ADD winner_id INT NOT NULL');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7925D61D69 FOREIGN KEY (red_fighter_men_id) REFERENCES fighter_men (id)');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7994AC1FB FOREIGN KEY (blue_fighter_men_id) REFERENCES fighter_men (id)');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A795DFCD4B8 FOREIGN KEY (winner_id) REFERENCES fighter_men (id)');
        $this->addSql('CREATE INDEX IDX_C1D17A7925D61D69 ON fight_men (red_fighter_men_id)');
        $this->addSql('CREATE INDEX IDX_C1D17A7994AC1FB ON fight_men (blue_fighter_men_id)');
        $this->addSql('CREATE INDEX IDX_C1D17A795DFCD4B8 ON fight_men (winner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A7925D61D69');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A7994AC1FB');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A795DFCD4B8');
        $this->addSql('DROP INDEX IDX_C1D17A7925D61D69 ON fight_men');
        $this->addSql('DROP INDEX IDX_C1D17A7994AC1FB ON fight_men');
        $this->addSql('DROP INDEX IDX_C1D17A795DFCD4B8 ON fight_men');
        $this->addSql('ALTER TABLE fight_men DROP red_fighter_men_id, DROP blue_fighter_men_id, DROP winner_id');
    }
}
