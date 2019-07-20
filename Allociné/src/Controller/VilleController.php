<?php

namespace App\Controller;
use App\Entity\Ville;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index(VilleRepository $villeRepo)
    {

        return $this->render('ville/index.html.twig',[
            'message' => 'Welcome to your new controller!',
            //on récupère tout les champs de ville
            'villes' => $villeRepo->findAll(),
        ]);
    }
     public function newVille(Request $requete):Response 
     {
       $ville = new Ville();
       $ville->setNom("Rennes");
        $insertion= $this->getDoctrine()->getManager();
        $insertion->persist($ville);
        $insertion->flush();
        // on utilise cette fonction pour retourné les erreurs
       $erreur=$validator->$validate($ville);
       if(count($error) >0)
        {
            return new Response((string) $erreur,400);
        }
    }
    public function checkRequest()
        {

        return new Response('Nouvelle ville ajouté');
       }
     
 public function getDatas(Ville $ville)
    {
        $ville =$this->getDoctrine()
        ->getRepository(Ville::class);

        if(!$ville)
            {

            throw $this->createNotFoundException("Aucune ville n'as été trouvé");
            
            }
        return new Response(' Les villes'.$ville->getNom());

    }  



}
