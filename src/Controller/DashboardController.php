<?php

namespace App\Controller;

use App\Entity\Achats;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="tableau_de_bord")
     */
    public function index(): Response
    {
        return $this->render('tableau_de_bord/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
    

    /**
     * @Route("/tableau_de_bord/achats", name="achats")
     */
    public function achats(): Response
    {
        $repoAchats = $this->getDoctrine()->getRepository(Achats::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $achats = $repoAchats->findAll();
        $categories = $repoCategories->findAll();

        return $this->render('tableau_de_bord/achats.html.twig', [
            'controller_name' => 'DashboardController',
            'achats' => $achats,
            'categories' => $categories
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/ajout", name="ajout_achat")
     */
    public function ajout_achat(Request $request): response
    {
        $achat = new Achats();

        $form = $this->createFormBuilder($achat)
                     ->add('nom_produit')
                     ->add('id_categorie', TextType::class)
                     ->add('lieu_achat')
                     ->add('date_achat')
                     ->add('fin_garantie', TextType::class)
                     ->add('prix')
                     ->add('informations')
                     ->getForm();

        return $this->render('tableau_de_bord/ajout_achat.html.twig', [
            'form_ajout_achat' => $form->createView(),
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}", name="visualisation_achat")
     */
    public function visualisation_achat($id): response
    {
        $repoAchats = $this->getDoctrine()->getRepository(Achats::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $achat = $repoAchats->find($id);
        $categories = $repoCategories->findAll();

        return $this->render('tableau_de_bord/visualisation_achat.html.twig', [
            'achat' => $achat,
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}/modification", name="modification_achat")
     */
    public function modification_achat($id): response
    {
        $repoAchats = $this->getDoctrine()->getRepository(Achats::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $achat = $repoAchats->find($id);
        $categories = $repoCategories->findAll();

        return $this->render('tableau_de_bord/modification_achat.html.twig', [
            'achat' => $achat,
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}/suppression", name="suppression_achat")
     */
    public function suppression_achat($id): response
    {
        $repoAchats = $this->getDoctrine()->getRepository(Achats::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $achat = $repoAchats->find($id);
        $categories = $repoCategories->findAll();

        return $this->render('tableau_de_bord/suppression_achat.html.twig', [
            'achat' => $achat,
            'categories' => $categories,
        ]);
    }
}