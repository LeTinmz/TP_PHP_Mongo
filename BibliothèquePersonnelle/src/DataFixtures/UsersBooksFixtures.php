<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Books;
use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UsersBooksFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $categoriesList = ['Romans', 'Sci-Fi', 'Biographie', 'Fantastique', 'Horreur'];
        $categories = [];

        foreach ($categoriesList as $name) {
            $category = new Categories();
            $category->setCategoryName($name);
            $manager->persist($category);
            $categories[] = $category;
        }
        //2 users
        $john = new Users();
        $john->setName('John');
        $john->setEmail('john@smith.com');
        $manager->persist($john);

        $jane = new Users();
        $jane->setName('Jane');
        $jane->setEmail('jane@smith.com');
        $manager->persist($jane);

        // books in common
        for ($i = 0; $i < 9; $i++) {
            $title = "Livre commun #$i";
            $author = $faker->name();
            $isbn = $faker->isbn13();

            // ----- Livre de John -----
            $bookJohn = new Books();
            $bookJohn->setTitle($title);
            $bookJohn->setAuthor($author);
            $bookJohn->setIsbn($isbn);
            $bookJohn->setUserId($john);

            shuffle($categories);
            $johnCategories = array_slice($categories, 0, rand(1, 3));
            foreach ($johnCategories as $cat) {
                $bookJohn->addCategory($cat);
            }

            $manager->persist($bookJohn);

            // ----- Livre de Jane -----
            $bookJane = new Books();
            $bookJane->setTitle($title);
            $bookJane->setAuthor($author);
            $bookJane->setIsbn($isbn);
            $bookJane->setUserId($jane);

            shuffle($categories);
            $janeCategories = array_slice($categories, 0, rand(1, 3));
            foreach ($janeCategories as $cat) {
                $bookJane->addCategory($cat);
            }

            $manager->persist($bookJane);
        }

        // 3. other books
        for ($i = 0; $i < 21; $i++) {
            $book = new Books();
            $book->setTitle("Livre unique #$i");
            $book->setAuthor($faker->name());
            $book->setIsbn($faker->isbn13());

            $user = $i % 2 === 0 ? $john : $jane;
            $book->setUserId($user);

            shuffle($categories);
            $randomCategories = array_slice($categories, 0, rand(1, 3));
            foreach ($randomCategories as $cat) {
                $book->addCategory($cat);
            }

            $manager->persist($book);
        }

        $manager->flush();
    }
}
