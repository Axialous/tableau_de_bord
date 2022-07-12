<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $compteur = 1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $secteur = $this->createCategory('Informatique', null, $manager);
        
        $this->createCategory('Ordinateurs', $secteur, $manager);
        $this->createCategory('Composants', $secteur, $manager);
        $this->createCategory('Périphériques', $secteur, $manager);

        $secteur = $this->createCategory('Matériaux', null, $manager);

        $this->createCategory('Impression 3D', $secteur, $manager);
        $this->createCategory('Construction', $secteur, $manager);
        
        $secteur = $this->createCategory('Fournitures de bureau', null, $manager);
        
        $this->createCategory('Mobilier', $secteur, $manager);
        $this->createCategory('Papeterie', $secteur, $manager);
        $this->createCategory('Machines', $secteur, $manager);

        $manager->flush();
    }

    public function createCategory(string $name, Categories $secteur = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($secteur);
        $manager->persist($category);

        if ($secteur != NULL) {
            $this->addReference('categorie-'.$this->compteur, $category);
            $this->compteur++;
        }

        return $category;
    }
}