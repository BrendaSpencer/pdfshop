<?php

namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PDFController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('pdf/homepage.html.twig', [
            'title' => 'PDF Shop',
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('pdf/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}
