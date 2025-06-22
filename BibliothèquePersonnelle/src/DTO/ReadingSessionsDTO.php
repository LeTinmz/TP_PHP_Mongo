<?php


class ReadingSessionsDTO
{
    public function __construct(private int $readPages, private float $spentTime, private string $notes)
    {
    }
}
