<?php 
namespace App\DataFixtures;
use App\Entity\Acteurs;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class ActeursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     	
    	$ActeursInformations=[

    		['Russel','Crowe',55,'Homme',null,'Gladiator'],
    		['Jonny','Deep',56,'Homme',null,'Pirate des Caraibes'],
    		['Zoe','Zaldana',41,'Femme',null,'Avatar']
    	];

    	foreach ($Acteurs as $ActeursInformations){
    		$acteur = new Acteurs();
    		$acteur
    		->setNom($ActeursInformations[0])
    		->setPrenom($ActeursInformations[1])
    		->setAge($ActeursInformations[2])
    		->setCivilite($ActeursInformations[3])
    		->setPhoto($ActeursInformations[4])
    		->setFilmsActeurs($ActeursInformations[5])
    		;
    		$manager->persist($acteur);
    	}
        $manager->flush();
    }

  public function getOrder()
  {
  	return 2;
  }
}
