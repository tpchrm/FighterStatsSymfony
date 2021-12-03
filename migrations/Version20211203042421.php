<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203042421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE division_men (id INT AUTO_INCREMENT NOT NULL, division_fr VARCHAR(255) NOT NULL, division_eng VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fight_men (id INT AUTO_INCREMENT NOT NULL, red_fighter_men_id INT NOT NULL, blue_fighter_men_id INT NOT NULL, winner_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_C1D17A7925D61D69 (red_fighter_men_id), INDEX IDX_C1D17A7994AC1FB (blue_fighter_men_id), INDEX IDX_C1D17A795DFCD4B8 (winner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fighter_men (id INT AUTO_INCREMENT NOT NULL, division_id INT NOT NULL, origin_id INT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, height DOUBLE PRECISION NOT NULL, weight DOUBLE PRECISION NOT NULL, wins INT DEFAULT NULL, INDEX IDX_67F5D80A41859289 (division_id), INDEX IDX_67F5D80A56A273CC (origin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE round_men (id INT AUTO_INCREMENT NOT NULL, fight_men_id INT NOT NULL, blue_strikes INT NOT NULL, red_strikes INT NOT NULL, blue_significants_strikes INT NOT NULL, red_significants_strikes INT NOT NULL, blue_takedowns INT NOT NULL, red_takedowns INT NOT NULL, blue_score INT NOT NULL, red_score INT NOT NULL, INDEX IDX_B06A99FB1965E510 (fight_men_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7925D61D69 FOREIGN KEY (red_fighter_men_id) REFERENCES fighter_men (id)');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7994AC1FB FOREIGN KEY (blue_fighter_men_id) REFERENCES fighter_men (id)');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A795DFCD4B8 FOREIGN KEY (winner_id) REFERENCES fighter_men (id)');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A41859289 FOREIGN KEY (division_id) REFERENCES division_men (id)');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A56A273CC FOREIGN KEY (origin_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE round_men ADD CONSTRAINT FK_B06A99FB1965E510 FOREIGN KEY (fight_men_id) REFERENCES fight_men (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A56A273CC');
        $this->addSql('ALTER TABLE fighter_men DROP FOREIGN KEY FK_67F5D80A41859289');
        $this->addSql('ALTER TABLE round_men DROP FOREIGN KEY FK_B06A99FB1965E510');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A7925D61D69');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A7994AC1FB');
        $this->addSql('ALTER TABLE fight_men DROP FOREIGN KEY FK_C1D17A795DFCD4B8');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE division_men');
        $this->addSql('DROP TABLE fight_men');
        $this->addSql('DROP TABLE fighter_men');
        $this->addSql('DROP TABLE round_men');
    }
}
