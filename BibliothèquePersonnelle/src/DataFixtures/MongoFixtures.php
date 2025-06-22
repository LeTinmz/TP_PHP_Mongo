<?php

namespace App\DataFixtures;

use App\Document\Reviews;
use App\Document\ReadingSession;
use Doctrine\ODM\MongoDB\DocumentManager;
use Faker\Factory;

class MongoFixtures
{
    public function __construct(private DocumentManager $dm) {}

    public function load(): void
    {
        $faker = Factory::create('fr_FR');

        // ✅ 1. Générer 39 Reviews
        for ($i = 1; $i <= 39; $i++) {
            $review = new Reviews(
                bookId: $i,
                userId: rand(1, 2),
                rating: rand(0, 5),
                comments: $faker->text(200)
            );

            $this->dm->persist($review);
        }

        // ✅ 2. Générer 10 ReadingSessions
        for ($i = 0; $i < 10; $i++) {
            $session = new ReadingSession(
                pagesRead: rand(1, 100),
                readingTime: $faker->randomFloat(2, 0.5, 3.0),
                personnalNotes: $faker->text(500),
                bookId: rand(1, 39),
                userId: rand(1, 2)
            );

            $this->dm->persist($session);
        }

        $this->dm->flush();
    }
}
