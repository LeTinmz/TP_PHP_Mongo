<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection: 'reviews')]
class Reviews
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type: "int")]
    private int $bookId;

    #[MongoDB\Field(type: "int")]
    private int $rating;

    #[MongoDB\Field(type: "string")]
    private string $comments;

    #[MongoDB\Field(type: "date")]
    private \DateTime $date;

    public function __construct(int $bookId, int $rating, string $comments)
    {
        $this->bookId = $bookId;
        $this->rating = $rating;
        $this->comments = $comments;
        $this->date = new \DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function setBookId(int $bookId): void
    {
        $this->bookId = $bookId;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }
}
