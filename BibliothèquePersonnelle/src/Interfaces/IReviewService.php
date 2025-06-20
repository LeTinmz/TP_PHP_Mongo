<?php


interface IReviewService
{
    public function getBookReviewsByBookId(int $id);

    public function addReviewByBookId(int $id, ReviewDTO $reviewDTO);

    /* public function getAllRatingsByRatingNumber(int $rating)*/

}
