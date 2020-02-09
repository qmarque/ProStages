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
use Symfony\Component\Form\Extension\Core\Type\UrlType;




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
     * @Route("/entreprises/ajouter", name="ajoutEntreprise")
     */
    //public function indexHome()
    public function ajouterEntreprise()
    {
        //Création d'une entreprise vierge qui sera remplie par le formulaire
        $entreprise = new Entreprise();

        //Création du formulaire permettent de saisir une entreprise
        $formulaireEntreprise = $this->createFormBuilder($entreprise)
        ->add('nom')
        ->add('activite')
        ->add('adresse')
        ->add('siteWeb', UrlType::class)
        ->getForm();

        //Création de la représentation graphique du formulaire
        $vueFormulaire = $formulaireEntreprise->createView();
    
    //Afficher la page présentant le formulaire d'ajout d'une entreprise
    return $this->render('pro_stages/ajoutEntreprise.html.twig',['vueFormulaire' => $vueFormulaire]);
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




    /**
     * @Route("/stages/{id}", name="stages")
     */
    public function indexStages(stage $stage)
    {

    // Envoyer les stages récupérés à la vue chargée de les afficher
    return $this->render('pro_stages/indexStages.html.twig',
    ['stage' => $stage]);
    }

    
    
     
}