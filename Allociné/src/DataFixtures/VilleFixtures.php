<?php

namespace App\DataFixtures;
use App\Entity\Ville;
use App\Entity\Cinema;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
    	foreach ($this->getCinemasDatas() as [$nom,$cinemas]) 
        {
    		$ville = new Ville();
    		$ville
             ->setNom($nom)
             ->addVilleCinema($cinemas)
             ;
    	
        $manager->persist($ville);
        $reference = $this->addReference($ville);
        }    
        $manager->flush();
    }
    //attention aux acollades j'ai une erreur par rapport à ça
   private  function getCinemasDatas():array
    {

    	return [ 
            ['Brest','Studios'],
			['Nantes','Cinéma le Concorcode'],
			['Quimper','TBA']
		];
    }

 public function  getOrder()
    {
        // ordre dans lesquelles les fixture sont retourné 
        return 4;
    }
}
