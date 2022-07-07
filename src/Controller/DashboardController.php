<?php

namespace App\Controller;

use PDO;
use App\Entity\Achats;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="tableau_de_bord")
     */
    public function index():response
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
    public function ajout_achat(Request $request, EntityManagerInterface $manager, SluggerInterface $slugger): response
    {
        $achat = new Achats();

        $form = $this->createFormBuilder($achat)
                     ->add('nom_produit')
                     ->add('categorie')
                     ->add('lieu_achat')
                     ->add('date_achat')
                     ->add('fin_garantie')
                     ->add('prix')
                     ->add('informations')
                     ->add('ticket_achat', FileType::class, [
                         'mapped' => false
                     ])
                     ->add('manuel_utilisation', FileType::class, [
                         'mapped' => false,
                         'required' => false
                     ])
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achat->setSlug("texte");

            $ticket_achat_file = $form->get('ticket_achat')->getData();
            if ($ticket_achat_file) {
                $nom_file = 'ticket_' . uniqid() . '.' . $ticket_achat_file->guessExtension();
                try {
                    $ticket_achat_file->move($this->getParameter('direction_tickets'), $nom_file);
                } catch (FileException $e) {

                }
                $achat->setTicketAchat($nom_file);
            }

            $manuel_utilisation_file = $form->get('manuel_utilisation')->getData();
            if ($manuel_utilisation_file) {
                $nom_file = 'manuel_' . uniqid() . '.' . $manuel_utilisation_file->guessExtension();
                try {
                    $manuel_utilisation_file->move($this->getParameter('direction_manuels'), $nom_file);
                } catch (FileException $e) {

                }
                $achat->setManuelUtilisation($nom_file);
            }

            $manager->persist($achat);
            $manager->flush();

            return $this->redirectToRoute('visualisation_achat', ['id' => $achat->getId()]);
       }

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
    public function modification_achat($id, Request $request, EntityManagerInterface $manager, SluggerInterface $slugger) :response
    {
        $achats = $this->getDoctrine()->getRepository(Achats::class);
        $achat = $achats->find($id);

        $form = $this->createFormBuilder($achat)
                     ->add('nom_produit')
                     ->add('categorie')
                     ->add('lieu_achat')
                     ->add('date_achat')
                     ->add('fin_garantie')
                     ->add('prix')
                     ->add('informations')
                     ->add('ticket_achat', FileType::class, [
                         'mapped' => false,
                         'required' => false
                     ])
                     ->add('manuel_utilisation', FileType::class, [
                         'mapped' => false,
                         'required' => false
                     ])
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achat->setSlug("texte");

            $ticket_achat_file = $form->get('ticket_achat')->getData();
            if ($ticket_achat_file) {
                $nom_file = 'ticket_' . uniqid() . '.' . $ticket_achat_file->guessExtension();
                try {
                    $ticket_achat_file->move($this->getParameter('direction_tickets'), $nom_file);
                } catch (FileException $e) {

                }
                $achat->setTicketAchat($nom_file);
            }

            $manuel_utilisation_file = $form->get('manuel_utilisation')->getData();
            if ($manuel_utilisation_file) {
                $nom_file = 'manuel_' . uniqid() . '.' . $manuel_utilisation_file->guessExtension();
                try {
                    $manuel_utilisation_file->move($this->getParameter('direction_manuels'), $nom_file);
                } catch (FileException $e) {

                }
                $achat->setManuelUtilisation($nom_file);
            }

            $manager->persist($achat);
            $manager->flush();

            return $this->redirectToRoute('visualisation_achat', ['id' => $achat->getId()]);
        }

        return $this->render('tableau_de_bord/modification_achat.html.twig', [
            'form_modification_achat' => $form->createView(),
            'id' => $id
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achats/{id}/suppression", name="suppression_achat")
     */
    public function suppression_achat($id): response
    {
        return $this->render('tableau_de_bord/suppression_achat.html.twig', [
            'id' => $id,
        ]);
    }
    /**
     * @Route("/tableau_de_bord/achat/{id})/suppression/valide", name="suppression_achat_valide")
     */
    public function suppression_achat_valide($id, EntityManagerInterface $manager): response
    {
        $achats = $this->getDoctrine()->getRepository(Achats::class);
        $achat = $achats->find($id);

        @unlink($this->getparameter('direction_tickets') . '/' . $achat->getTicketAchat());

        $manager->remove($achat);
        $manager->flush();

        return $this->redirectToRoute('achats');
    }
    /**
     * @Route("/tableau_de_bord/statistiques", name="statistiques")
     */
    public function statistiques(Request $request): Response
    {
        $form = $this->createFormBuilder()
                     ->add('debut_periode', DateType::class)
                     ->add('fin_periode', DateType::class)
                     ->getForm();

        $form->handleRequest($request);

        $repoAchats = $this->getDoctrine()->getRepository(Achats::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $achats = $repoAchats->findAll();
        $categories = $repoCategories->findAll();

        $statistiques = [];

        $intervalle_couleur = round(360 / count($categories));
        $couleur = 0;

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($categories as $categorie) {
                $couleur += $intervalle_couleur;
                $statistiques[$categorie->getId()] = [
                    'nom' => $categorie->getName(),
                    'somme_depensee' => 0,
                    'teinte' => $couleur
                ];
            }
            dump($statistiques);
            foreach ($achats as $achat) {
                if ($achat->getDateAchat() >= $form['debut_periode']->getData() and $achat->getDateAchat() <= $form['fin_periode']->getData()) {
                    $statistiques[$achat->getCategorie()->getId()]['somme_depensee'] += $achat->getPrix();
                }
            }
            dump($statistiques);
        }

        return $this->render('tableau_de_bord/statistiques.html.twig', [
            'form_periode' => $form->createView(),
            'statistiques' => $statistiques
        ]);
    }
}