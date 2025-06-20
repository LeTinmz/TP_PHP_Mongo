<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Document\ReadingSession;
use Doctrine\ODM\MongoDB\DocumentManager;

final class ReadingSessionController extends AbstractController
{
    #[Route('/reading-session', name: 'app_test_reading_session')]
    public function addReadingSession(DocumentManager $dm): Response
    {

        $session = new ReadingSession(
            pagesLues: 45,
            tempsPasse: 1.75,
            notesPersonnelles: 'Une lecture fluide et agréable',
            bookId: 101
        );

        $dm->persist($session);
        $dm->flush();

        return new Response('ReadingSession ajoutée avec succès !');
    }
}
