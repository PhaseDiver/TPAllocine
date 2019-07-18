<?php

namespace App\Controller;
use App\Entity\Villes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index()
    {
        

    $ville= $this->getDoctrine()
     ->getRepository(Ville::class);

        return $this->render('ville/index.html.twig',[
            'message' => 'Welcome to your new controller!',
            'villes' => $villes,
        ]);
    }
}
