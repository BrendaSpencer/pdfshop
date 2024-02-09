<?php 

namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PDFController extends AbstractController
{
    #[Route('/')]
    public function homepage():Response
    {
        return $this->render('pdf/homepage.html.twig', [
            'title' => 'PDF Shop',
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null):Response
    {
        if ($slug){
            $title = u(str_replace('-', ' ', $slug))->title(true);
        }else {
            $title = 'All PDFs';
        }
        return new Response($title);

    }
}