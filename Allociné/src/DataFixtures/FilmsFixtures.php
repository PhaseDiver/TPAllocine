<?php

namespace App\DataFixtures;
use App\Entity\Genre;
use App\Entity\Film;
use App\Entity\Acteurs;
use App\Entity\Cinema;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class FilmsFixtures extends Fixture

{
	
  public function load(ObjectManager $manager)
  {


  	// pour la duree et les datetime on  utilise des objet  timeavec le format 'H:M' pour la durée et 'AAAA-MM-JJ' pour la date de sortie 
 	$time_film='1:15';
 	$date_sortie='24-11-2004';
 	$format_timefilm=DateTime::createFromFormat('H:i',$time_film);
 	$format_datestortie=DateTime::createFromFormat('d-m-Y',$date_sortie);

 	$informationsfilms= [
 		['Les indestrucibles',"opinion publique se retourne contre les super-héros en raison des dommages collatéraux causés par leurs actions. Après plusieurs procès, le gouvernement crée un programme qui forcent les super-héros à garder leurs identités secrètes sur le long terme, et qui rend leurs actions illégales.",$format_timefilm,$format_datestortie,null,$this->getReference('Super-Héros')]
 	];


	foreach($films as $informationsfilms){
 	$film = new Films();
 	$film 
 		->setTitre($informationsfilms[0])
 		->setSynopsis($informationsfilms[1])
 	 	//o^n prédcise le format utilisé  'H:M' pour la durée et 'JJ-MM-AAAA' pour la date de sortie 
	 	->setDuree($informationsfilms[2])
	 	->setDatesortie($informationsfilms[3])
	 	->addFilmCasting($informationsfilms[4])
	 	->addFilmGenre($informaitonsfilms[5])
	 	; 
	 	$manager->persist($film);
	}
	$manager->flush();
 }
public function  getOrder()
    {
        // ordre dans lesquelles les fixture sont retourné 
        return 1;
    }
}