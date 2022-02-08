<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208160914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE country_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE division_men_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fight_men_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fighter_men_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE round_men_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE division_men (id INT NOT NULL, division_fr VARCHAR(255) NOT NULL, division_eng VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE fight_men (id INT NOT NULL, red_fighter_men_id INT NOT NULL, blue_fighter_men_id INT NOT NULL, winner_id INT DEFAULT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C1D17A7925D61D69 ON fight_men (red_fighter_men_id)');
        $this->addSql('CREATE INDEX IDX_C1D17A7994AC1FB ON fight_men (blue_fighter_men_id)');
        $this->addSql('CREATE INDEX IDX_C1D17A795DFCD4B8 ON fight_men (winner_id)');
        $this->addSql('CREATE TABLE fighter_men (id INT NOT NULL, division_id INT NOT NULL, origin_id INT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, height DOUBLE PRECISION NOT NULL, weight DOUBLE PRECISION NOT NULL, wins INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_67F5D80A41859289 ON fighter_men (division_id)');
        $this->addSql('CREATE INDEX IDX_67F5D80A56A273CC ON fighter_men (origin_id)');
        $this->addSql('CREATE TABLE round_men (id INT NOT NULL, fight_men_id INT DEFAULT NULL, blue_strikes INT NOT NULL, red_strikes INT NOT NULL, blue_significants_strikes INT NOT NULL, red_significants_strikes INT NOT NULL, blue_takedowns INT NOT NULL, red_takedowns INT NOT NULL, blue_score INT NOT NULL, red_score INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B06A99FB1965E510 ON round_men (fight_men_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7925D61D69 FOREIGN KEY (red_fighter_men_id) REFERENCES fighter_men (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A7994AC1FB FOREIGN KEY (blue_fighter_men_id) REFERENCES fighter_men (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fight_men ADD CONSTRAINT FK_C1D17A795DFCD4B8 FOREIGN KEY (winner_id) REFERENCES fighter_men (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A41859289 FOREIGN KEY (division_id) REFERENCES division_men (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fighter_men ADD CONSTRAINT FK_67F5D80A56A273CC FOREIGN KEY (origin_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE round_men ADD CONSTRAINT FK_B06A99FB1965E510 FOREIGN KEY (fight_men_id) REFERENCES fight_men (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE fighter_men DROP CONSTRAINT FK_67F5D80A56A273CC');
        $this->addSql('ALTER TABLE fighter_men DROP CONSTRAINT FK_67F5D80A41859289');
        $this->addSql('ALTER TABLE round_men DROP CONSTRAINT FK_B06A99FB1965E510');
        $this->addSql('ALTER TABLE fight_men DROP CONSTRAINT FK_C1D17A7925D61D69');
        $this->addSql('ALTER TABLE fight_men DROP CONSTRAINT FK_C1D17A7994AC1FB');
        $this->addSql('ALTER TABLE fight_men DROP CONSTRAINT FK_C1D17A795DFCD4B8');
        $this->addSql('DROP SEQUENCE country_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE division_men_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fight_men_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fighter_men_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE round_men_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE division_men');
        $this->addSql('DROP TABLE fight_men');
        $this->addSql('DROP TABLE fighter_men');
        $this->addSql('DROP TABLE round_men');
        $this->addSql('DROP TABLE "user"');
    }
}
