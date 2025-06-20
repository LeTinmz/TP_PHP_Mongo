<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection: 'reading_sessions')]
class ReadingSession
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type: 'int')]
    private int $pagesLues;

    #[MongoDB\Field(type: 'float')]
    private float $tempsPasse;

    #[MongoDB\Field(type: 'string')]
    private string $notesPersonnelles;

    #[MongoDB\Field(type: 'int')]
    private int $bookId;

    public function __construct(int $pagesLues, float $tempsPasse, string $notesPersonnelles, int $bookId)
    {
        $this->pagesLues = $pagesLues;
        $this->tempsPasse = $tempsPasse;
        $this->notesPersonnelles = $notesPersonnelles;
        $this->bookId = $bookId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPagesLues(): int
    {
        return $this->pagesLues;
    }

    public function setPagesLues(int $pagesLues): void
    {
        $this->pagesLues = $pagesLues;
    }

    public function getTempsPasse(): float
    {
        return $this->tempsPasse;
    }

    public function setTempsPasse(float $tempsPasse): void
    {
        $this->tempsPasse = $tempsPasse;
    }

    public function getNotesPersonnelles(): string
    {
        return $this->notesPersonnelles;
    }

    public function setNotesPersonnelles(string $notesPersonnelles): void
    {
        $this->notesPersonnelles = $notesPersonnelles;
    }

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function setBookId(int $bookId): void
    {
        $this->bookId = $bookId;
    }
}
