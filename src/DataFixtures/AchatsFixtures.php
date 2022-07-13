<?php

namespace App\DataFixtures;


use Faker;
use DateTime;
use App\Entity\Achats;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\CategoriesFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AchatsFixtures extends Fixture implements DependentFixtureInterface
{
    private $projectDir;

    public function __construct(string $projectDir, private SluggerInterface $slugger){
        $this->projectDir = $projectDir;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $this->createAchat(
            $nom_produit = 'Cahier',
            $categorie = $this->getReference('categorie-7'),
            $informations = "Cahier reliure intégrale. Papier vélin velouté 90 g/m². Couverture pelliculée lavable. 170 x 220 mm.
            CARACTÉRISTIQUES
            Marque: Clairefontaine
            Type: Cahier Spirale
            Taille: Din A5+
            Couverture: Carton Plastifié
            Nº De Feuilles: 100
            Impression: Seyes
            Grammage: 90 G",
            $lieu_achat = "22 Rue des Forges, 58800 Corbigny",
            $date_achat = DateTime::createFromFormat('d m Y', '03 03 2017'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '03 03 2017'),
            $prix = 3.36 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Marqueurs',
            $categorie = $this->getReference('categorie-7'),
            $informations = "MARQUEUR TABLEAUX BLANCS 1741. Corps plastique, format stylo, capuchon ventilé. Nouvelle encre. Excellente effaçabilité : ne laisse pas de trace. Longue durée d'écriture. Pointe ogive. Tracé de 1,4 mm. Pochette de 4.
            CARACTÉRISTIQUES
            Marque: Velleda
            Type: Pour Tableau
            Couleur: Assortiment
            Écriture: 1,4 mm",
            $lieu_achat = "22 Rue des Forges, 58800 Corbigny",
            $date_achat = DateTime::createFromFormat('d m Y', '21 05 2017'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '21 05 2017'),
            $prix = 4.85 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Chaise de bureau',
            $categorie = $this->getReference('categorie-6'),
            $informations = "À dossier haut · Maille · Manager · Ergonomique · Pivotants",
            $lieu_achat = "https://www.darty.com/",
            $date_achat = DateTime::createFromFormat('d m Y', '03 09 2017'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '03 03 2018'),
            $prix = 99.99 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Souris',
            $categorie = $this->getReference('categorie-3'),
            $informations = "Optique haute précision 2000 ppp pour un suivi plus fluide sur toutes les surfaces Fonctionne avec Windows 10, 8, 7, Vista, XP et Mac OS X (Les boutons latéraux ne sont pas disponibles pour MAC et le système IOS.).",
            $lieu_achat = "https://www.amazon.fr/",
            $date_achat = DateTime::createFromFormat('d m Y', '16 08 2018'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '16 08 2021'),
            $prix = 11.19 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Sable',
            $categorie = $this->getReference('categorie-5'),
            $informations = "Granulométrie 0,4 - 0,8 mm. Sac de 25 kg.",
            $lieu_achat = "https://www.piscinayspa.com/",
            $date_achat = DateTime::createFromFormat('d m Y', '22 04 2019'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '22 04 2019'),
            $prix = 18.66 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Peinture extérieure',
            $categorie = $this->getReference('categorie-5'),
            $informations = "Aspect : Velouté Sec au toucher : 30 mn Recouvrable : 06 h Excellent pouvoir couvrant - Facile d'application RESINE ACRYLIQUE Peinture Parpaing, velours, pour protéger et embellir vos murs en parpaing. RENDEMENT Pinceau: ± 5 m2 / l en 1 couche - Prêt à l'emploi Rouleau: ± 5 m2 / l en 1 couche - Prêt à l'emploi Pistolet: ± 7 m2 / l en 1 couche - Dilution 10% DILUANT & NETTOYAGE Eau.",
            $lieu_achat = "https://www.manomano.fr/",
            $date_achat = DateTime::createFromFormat('d m Y', '24 04 2019'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '24 04 2019'),
            $prix = 195.84 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Imprimante 3D',
            $categorie = $this->getReference('categorie-1'),
            $informations = "CONTENU DE LA LIVRAISON Imprimante 3D Wi-Fi 1 extrudeuse 2 buses d'extrusion (1 prémontée, 1 de rechange) 1 lit d'impression flexible (intégré) 1 filament PLA 300 g (1,75 mm) blanc (env. 105 m) 1 filament PLA 300 g (1,75 mm) noir (env. 105 m) 1 filtre de purification de l'air HEPA (prémonté) 1 spatule 1 graisse Fiche secteur Mode d'emploi",
            $lieu_achat = "https://www.atome3d.com/",
            $date_achat = DateTime::createFromFormat('d m Y', '15 09 2019'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '15 03 2020'),
            $prix = 379.00 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Filament PLA Blanc',
            $categorie = $this->getReference('categorie-4'),
            $informations = "Précision du diamètre: 1,75 ± 0,03 mm
            Température de traitement: 200220 ° C
            Poids net: 1 kg
            Longueur de filament: 335 m
            Température de fusion: 168 ° C
            Densité: 1,24 g / cm³
            Température de transition vitreuse: 58 ° C
            Diamètre de la bobine: 200 mm
            Profondeur de bobine: 72 mm
            Diamètre du moyeu: 102 mm
            Diamètre du trou du moyeu: 51 mm
            Température d'extrusion: 210 + / 10 ° C
            Température du lit d'impression: 60 ° C
            Vitesse d'impression: 30 mm / s",
            $lieu_achat = "https://www.tradeinn.com/",
            $date_achat = DateTime::createFromFormat('d m Y', '15 09 2019'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '15 09 2019'),
            $prix = 23.99 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Destructeur de documents',
            $categorie = $this->getReference('categorie-8'),
            $informations = "CARACTÉRISTIQUES
            Marque: Fellowes",
            $lieu_achat = "https://papeterie-algofae.com",
            $date_achat = DateTime::createFromFormat('d m Y', '30 11 2020'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '30 04 2021'),
            $prix = 140.48 /* € */,
            $manager,
        );

        $this->createAchat(
            $nom_produit = 'Processeur',
            $categorie = $this->getReference('categorie-2'),
            $informations = "Six cœurs · Overclocking · Socket LGA1156",
            $lieu_achat = "https://www.rueducommerce.fr/",
            $date_achat = DateTime::createFromFormat('d m Y', '30 01 2021'),
            $fin_garantie = DateTime::createFromFormat('d m Y', '30 01 2024'),
            $prix = 129.99 /* € */,
            $manager,
        );

        $manager->flush();
    }

    public function createAchat($nom_produit, $categorie, $informations, $lieu_achat, $date_achat, $fin_garantie, $prix, ObjectManager $manager)
    {

        $nom_file = 'ticket_' . uniqid() . '.svg';
        copy($this->projectDir . '/public/images/ticket.svg', $this->projectDir . '/public/donnees/tickets/' . $nom_file);

        $achat = new Achats();
        $achat->setNomProduit($nom_produit);
        $achat->setCategorie($categorie);
        $achat->setInformations($informations);
        $achat->setLieuAchat($lieu_achat);
        $achat->setDateAchat($date_achat);
        $achat->setFinGarantie($fin_garantie);
        $achat->setPrix($prix);
        $achat->setTicketAchat($nom_file);
        $achat->setSlug($this->slugger->slug($achat->getNomProduit())->lower());
        $manager->persist($achat);

        return $achat;
    }

    public function getDependencies()
    {
        return [
            CategoriesFixtures::class,
        ];
    }
}