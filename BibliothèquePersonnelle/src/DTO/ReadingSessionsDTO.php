<?php


class ReadingSessionsDTO
{
    public function __construct(private int $readPages, private int $spentTime, private string $notes)
    {
    }
}
