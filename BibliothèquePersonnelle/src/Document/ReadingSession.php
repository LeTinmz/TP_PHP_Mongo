<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
#[MongoDB\Document(collection: 'reading_sessions')]
class ReadingSession
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type: 'int')]
    #[Assert\GreaterThanOrEqual(
        value: 0,
        message: 'Le nombre de pages lues ne peut pas être négatif.'
    )]
    private int $pagesRead;

    #[MongoDB\Field(type: 'float')]
    private float $readingTime;

    #[MongoDB\Field(type: 'string')]
    #[Assert\Length(
        max: 1022,
        maxMessage: 'Les notes personnelles ne doivent pas dépasser {{ limit }} caractères.'
    )]
    private string $personnalNotes;

    #[MongoDB\Field(type: 'int')]
    private int $bookId;

    #[MongoDB\Field(type: 'int')]
    private int $userId;

    public function __construct(int $pagesRead, float $readingTime, string $personnalNotes, int $bookId, int $userId)
    {
        $this->pagesRead = $pagesRead;
        $this->readingTime = $readingTime;
        $this->personnalNotes = $personnalNotes;
        $this->bookId = $bookId;
        $this->userId = $userId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPagesRead(): int
    {
        return $this->pagesRead;
    }

    public function setPagesRead(int $pagesRead): void
    {
        $this->pagesRead = $pagesRead;
    }

    public function getReadingTime(): float
    {
        return $this->readingTime;
    }

    public function setReadingTime(float $readingTime): void
    {
        $this->readingTime = $readingTime;
    }

    public function getPersonnalNotes(): string
    {
        return $this->personnalNotes;
    }

    public function setPersonnalNotes(string $personnalNotes): void
    {
        $this->personnalNotes = $personnalNotes;
    }

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function setBookId(int $bookId): void
    {
        $this->bookId = $bookId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
