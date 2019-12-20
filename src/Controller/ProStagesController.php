<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function indexHome()
    {
return $this -> render('pro_stages/indexHome.html.twig');

        /*return new Response('<html><body><h1> Bienvenue sur la page d accueil de Prostages</h1></body></html>');*/
        
    }


    /**
     * @Route("/entreprises", name="entreprises")
     */

    
    public function indexEntreprises()
    {
        return $this -> render('pro_stages/indexEntreprises.html.twig');


        /*return new Response('<html><body><h1> Cette page affichera la liste des entreprises proposant un stage</h1></body></html>');*/
    
    }


    /**
     * @Route("/formations", name="formations")
     */
    public function indexFormations()
    {
        return $this -> render('pro_stages/indexFormations.html.twig');


       /* return new Response('<html><body><h1> Cette page affichera la liste des formations de l IUT</h1></body></html>');*/
    
    }


    /**
     * @Route("/stages/{id}", name="stages")
     */
    public function indexStages($id)
    {

        return $this -> render('pro_stages/indexStages.html.twig', ['id'=>$id]);


       /* return new Response('<html><body><h1> Cette page affichera le descriptif du stage ayant pour identifiant id </h1></body></html>');*/
    
    }

    

    /*public functon index()
    {
            
        // Récupérer le repository de l'entité Stage
       $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

       // Récupérer les stages enregistrés en BD
       $stages = $repositoryStage->findAll();

       // Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('pro_stages/index.html.twig',['stages'=>$stages]);
        
    }*/
}