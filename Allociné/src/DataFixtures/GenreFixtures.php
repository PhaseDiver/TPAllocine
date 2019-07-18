<?php

namespace App\DataFixtures;
use App\Entity\Genre;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
      
       
        // creation d'une liste avec les genres  
       $liste_genre= [ 'Horreur','Drame','Super-Héros','Comédie','Historique'];  

        foreach ($genres as $liste_genre){
        $genre = new Genre();
        // ici le genre sera forcement fixé sur horreur 
        $genre-> setNom($liste_genre[0]);
        $manager->persist($genre);
        $reference =$this->addReference($liste_genre);

    }

    	
        $manager->flush();
    }

    public function  getOrder()
    {
        // ordre dans lesquelles les fixture sont retourné 
        return 5;
    }

}
