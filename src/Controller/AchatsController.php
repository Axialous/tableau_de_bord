<?php

namespace App\Controller;

use App\Entity\Achats;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/achats', name: 'achats_')]
class AchatsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Achats $achat): Response
    {
        return $this->render('achats/details.html.twig', compact('achat'));
    }
}