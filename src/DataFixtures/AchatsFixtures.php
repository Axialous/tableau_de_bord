<?php

namespace App\DataFixtures;


use App\Entity\Achats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class AchatsFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        for($ach = 1; $ach <= 10; $ach++){
            $achat = new Achats();
            $achat->setLieuAchat($faker->text(15));
            $achat->setNomProduit($faker->text(15));
            $achat->setDateAchat(new \DateTime());
            $achat->setFinGarantie(new \DateTime());
            $achat->setSlug($this->slugger->slug($achat->getNomProduit())->lower());
            $achat->setPrix($faker->numberBetween (900, 300000));
            $achat->setInformations($faker->text());

            //chercher la référence de catégorie
            $category = $this->getReference('cat-'. rand(1, 8));
            $achat->setCategories($category);

            $this->setReference('ach-'.$ach, $achat);
            $manager->persist($achat);
            
        }

        $manager->flush();
    }
}