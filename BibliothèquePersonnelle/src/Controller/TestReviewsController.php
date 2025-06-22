<?php

//namespace App\Controller;
//
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Attribute\Route;
//use App\Document\Reviews;
//use Doctrine\ODM\MongoDB\DocumentManager;
//
//final class TestReviewsController extends AbstractController
//{
//    #[Route('/reviews', name: 'app_test_reviews')]
//    public function addReview(DocumentManager $dm): Response
//    {
//        $review = new Reviews(42, 5, 'Excellent roman !');
//
//        $dm->persist($review);
//        $dm->flush();
//
//        return new Response('Review ajoutée avec succès !');
//    }
//}
