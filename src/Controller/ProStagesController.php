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
    // Récupérer les stages enregistrés en BD
    $stages = $repositoryStage->getStageEntrepriseEtFormation();
    // Envoyer les stages récupérés à la vue chargée de les afficher
    return $this->render('pro_stages/indexHome.html.twig', ['stages'=>$stages]);
    }


    /**
     * @Route("/entreprises", name="entreprises")
     */

    
    public function indexEntreprises(EntrepriseRepository $repositoryEntreprise)
    {
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

    // Envoyer les stages récupérés à la vue chargée de les afficher
    return $this->render('pro_stages/indexStages.html.twig',
    ['stage' => $stage]);
    }

     /**
     * @Route("/entreprises/{nom}", name="stagesParEntreprise")
     */
    public function entreprisesParNom($nom)
    {

    // Récupérer le repository de l'entité Entreprise
    $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
    // Récupérer les entreprises enregistrées en BD
    $stagesParNomEntreprise = $repositoryStage->findByNomEntreprise($nom);
    // Envoyer les entreprises récupérées à la vue chargée de les afficher
    return $this->render('pro_stages/indexEntreprisesParNom.html.twig', ['stagesParNomEntreprise'=>$stagesParNomEntreprise]);
    }
    
     /**
     * @Route("/formations/{nom}", name="stagesParFormation")
     */
    public function formationsParNom($nom)
    {

    // Récupérer le repository de l'entité Formation
    $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
    // Récupérer les formations enregistrées en BD
    $stagesParNomFormation = $repositoryStage->findByNomFormation($nom);
    // Envoyer les formations récupérées à la vue chargée de les afficher
    return $this->render('pro_stages/indexFormationsParNom.html.twig', ['stagesParNomFormation'=>$stagesParNomFormation]);
    }

}