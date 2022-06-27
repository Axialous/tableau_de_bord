<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/tableau_de_bord", name="tableau_de_bord")
     */
    public function index(): Response
    {
        return $this->render('tableau_de_bord/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/inscription", name="inscription")
     */
    public function inscription(): Response
    {
        return $this->render('tableau_de_bord/inscription.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/connexion", name="connexion")
     */
    public function connexion(): Response
    {
        return $this->render('tableau_de_bord/connexion.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats", name="achats")
     */
    public function achats(): Response
    {
        return $this->render('tableau_de_bord/achats.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/ajout", name="ajout_achat")
     */
    public function ajout_achat(): response
    {
        return $this->render('tableau_de_bord/ajout_achat.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}/modification", name="modification_achat")
     */
    public function modification_achat(): response
    {
        return $this->render('tableau_de_bord/modification_achat.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}/suppression", name="suppression_achat")
     */
    public function suppression_achat(): response
    {
        return $this->render('tableau_de_bord/suppression_achat.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
