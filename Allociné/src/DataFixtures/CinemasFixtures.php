<?php

namespace App\DataFixtures;
use App\Entity\Ville;
use App\Entity\Cinema;
use App\Entity\Films;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;



class CinemasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         // creation d'une liste avec les genres  
        $InfosCinema=  [
            ['Studios', '136 Rue Jean Jaurès, 29200',null,$this->getReference('Brest')],
            ['Pathé Grenoble','21 Boulevard Maréchal Lyautey,38000',null,$this->getReference('Grenoble')]
        ];
        foreach( $Cinemas as $InfosCinema)
        {
        $cinema = new Cinema();
        // ici le genre sera forcement fixé sur horreur 
        $cinema
        ->setNom($InfosCinema[0])
        ->setAdresse($InfosCinema[1])
        ->addCinemaAffich($InfosCinema[2])
        ->setVille($InfosCinema[3])
        ;
            $manager->persist($cinema);
        }
        
        $manager->flush();
    }

     public function  getOrder()
    {
        // ordre dans lesquelles les fixture sont retourné 
        return 3;
    }
}
