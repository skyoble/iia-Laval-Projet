<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220111143136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale ADD id_seller_id INT DEFAULT NULL, ADD id_region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC005DDD9CFE FOREIGN KEY (id_seller_id) REFERENCES `seller` (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC0051813BD72 FOREIGN KEY (id_region_id) REFERENCES `region` (id)');
        $this->addSql('CREATE INDEX IDX_E54BC005DDD9CFE ON sale (id_seller_id)');
        $this->addSql('CREATE INDEX IDX_E54BC0051813BD72 ON sale (id_region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `sale` DROP FOREIGN KEY FK_E54BC005DDD9CFE');
        $this->addSql('ALTER TABLE `sale` DROP FOREIGN KEY FK_E54BC0051813BD72');
        $this->addSql('DROP INDEX IDX_E54BC005DDD9CFE ON `sale`');
        $this->addSql('DROP INDEX IDX_E54BC0051813BD72 ON `sale`');
        $this->addSql('ALTER TABLE `sale` DROP id_seller_id, DROP id_region_id');
    }
}
