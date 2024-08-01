<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240729160516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, grade INT NOT NULL, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('CREATE TABLE order_product (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, orders_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_2530ADE64584665A (product_id), INDEX IDX_2530ADE6CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('DROP TABLE product');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('DROP TABLE `order`');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDb1060Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDb1060Platform'."
        );

        $this->addSql('DROP TABLE order_product');
    }
}
