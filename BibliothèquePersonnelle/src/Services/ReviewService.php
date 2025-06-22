<?php

namespace App\Services;

use IReviewService;
use ReviewDTO;

class ReviewService implements IReviewService
{

    public function __construct(private){}
    public function addReviewByBookId(int $id, ReviewDTO $reviewDTO)
    {
        // TODO: Implement addReviewByBookId() method.
    }
    public function getBookReviewsByBookId(int $id)
    {
        // TODO: Implement getBookReviewsByBookId() method.
    }
}
