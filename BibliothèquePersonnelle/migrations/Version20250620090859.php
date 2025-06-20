<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250620090859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE categories_books (categories_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_4E183FDFA21214B7 (categories_id), INDEX IDX_4E183FDF7DD8AC20 (books_id), PRIMARY KEY(categories_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories_books ADD CONSTRAINT FK_4E183FDFA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories_books ADD CONSTRAINT FK_4E183FDF7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories_books DROP FOREIGN KEY FK_4E183FDFA21214B7
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories_books DROP FOREIGN KEY FK_4E183FDF7DD8AC20
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categories
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categories_books
        SQL);
    }
}
