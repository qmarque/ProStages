<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;



class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    //public function indexHome()
    public function index(StageRepository $repositoryStage)
    {
//return $this -> render('pro_stages/indexHome.html.twig');

        /*return new Response('<html><body><h1> Bienvenue sur la page d accueil de Prostages</h1></body></html>');*/
        

        // Récupérer le repository de l'entité Stage
    //$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
    // Récupérer les stages enregistrés en BD
    $stages = $repositoryStage->findAll();
    // Envoyer les stages récupérés à la vue chargée de les afficher
    return $this->render('pro_stages/indexHome.html.twig', ['stages'=>$stages]);
    }


    /**
     * @Route("/entreprises", name="entreprises")
     */

    
    public function indexEntreprises(EntrepriseRepository $repositoryEntreprise)
    {
        //return $this -> render('pro_stages/indexEntreprises.html.twig');


        /*return new Response('<html><body><h1> Cette page affichera la liste des entreprises proposant un stage</h1></body></html>');*/
        
    // Récupérer le repository de l'entité Entreprise
    //$repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
    // Récupérer les entreprises enregistrées en BD
    $entreprises = $repositoryEntreprise->findAll();
    // Envoyer les entreprises récupérées à la vue chargée de les afficher
    return $this->render('pro_stages/indexEntreprises.html.twig', ['entreprises'=>$entreprises]);
    }


    /**
     * @Route("/formations", name="formations")
     */
    public function indexFormations(FormationRepository $repositoryFormation)
    {
       // return $this -> render('pro_stages/indexFormations.html.twig');


       /* return new Response('<html><body><h1> Cette page affichera la liste des formations de l IUT</h1></body></html>');*/
     
       // Récupérer le repository de l'entité Formation
       //$repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
       // Récupérer les formations enregistrées en BD
       $formations = $repositoryFormation->findAll();
       // Envoyer les formations récupérées à la vue chargée de les afficher
       return $this->render('pro_stages/indexFormations.html.twig', ['formations'=>$formations]);
    }


    /**
     * @Route("/stages/{id}", name="stages")
     */
    public function indexStages(stage $stage)
    {

       // return $this -> render('pro_stages/indexStages.html.twig', ['id'=>$id]);


       /* return new Response('<html><body><h1> Cette page affichera le descriptif du stage ayant pour identifiant id </h1></body></html>');*/
    
       // Récupérer le repository de l'entité Stage
    //$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
    // Récupérer les stages enregistrés en BD
    //$stage = $repositoryStage->find($id);
    // Envoyer les stages récupérés à la vue chargée de les afficher

    return $this->render('pro_stages/indexStages.html.twig',
    ['stage' => $stage]);
    }

    

}