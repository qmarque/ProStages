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
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\EntrepriseType;
use App\Form\StageType;






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
     * @Route("/stages/ajouter", name="ajoutStage")
     */
    //public function indexHome()
    public function ajouterStage(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise vierge qui sera remplie par le formulaire
        $stage = new Stage();

        //Création du formulaire permettent de saisir une entreprise
    
        $formulaireStage = $this->createForm(Stagetype::class, $stage);

         /*On demande au formulaire d'analyser la dernière requête Http. Si le tableau POST contenu dans cette requête
         contient des variables nom,activite,adresse,siteweb, alors la méthode handlerequest récupère les valeurs de 
         ces varaibles et les affecte à l'objet entreprise*/
         $formulaireStage->handleRequest($request);

         if ($formulaireStage->isSubmitted() && $formulaireStage->isValid())
         {
            
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($stage);
            $manager->flush();

            // Rediriger l'utilisateur vers la page des stages
            return $this->redirectToRoute('home');
         }

        //Création de la représentation graphique du formulaire
        $vueFormulaire = $formulaireStage->createView();
    
    //Afficher la page présentant le formulaire d'ajout d'une entreprise
    return $this->render('pro_stages/ajoutModifStage.html.twig',['vueFormulaire' => $vueFormulaire, 'action'=>"ajouter"]);
    }

    /**
     * @Route("/stages/modifier/{id}", name="modifStage")
     */
    //public function indexHome()
    public function modifierStage(Request $request, ObjectManager $manager, Stage $stage)
    {
        
        //Création du formulaire permettent de saisir une entreprise
        $formulaireStage = $this->createForm(Stagetype::class, $stage);


         /*On demande au formulaire d'analyser la dernière requête Http. Si le tableau POST contenu dans cette requête
         contient des variables nom,activite,adresse,siteweb, alors la méthode handlerequest récupère les valeurs de 
         ces varaibles et les affecte à l'objet entreprise*/
         $formulaireStage->handleRequest($request);

         if ($formulaireStage->isSubmitted()&& $formulaireStage->isValid() )
         {            
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($stage);
            $manager->flush();

            // Rediriger l'utilisateur vers la page des stages
            return $this->redirectToRoute('home');
         }

        //Création de la représentation graphique du formulaire
        $vueFormulaire = $formulaireStage->createView();
    
    //Afficher la page présentant le formulaire d'ajout d'un stage
    return $this->render('pro_stages/ajoutModifStage.html.twig',['vueFormulaire' => $vueFormulaire,'action'=>"modifier"]);
    }


    /**
     * @Route("/entreprises/ajouter", name="ajoutEntreprise")
     */
    //public function indexHome()
    public function ajouterEntreprise(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise vierge qui sera remplie par le formulaire
        $entreprise = new Entreprise();

        //Création du formulaire permettent de saisir une entreprise
    
        $formulaireEntreprise = $this->createForm(EntrepriseType::class, $entreprise);

         /*On demande au formulaire d'analyser la dernière requête Http. Si le tableau POST contenu dans cette requête
         contient des variables nom,activite,adresse,siteweb, alors la méthode handlerequest récupère les valeurs de 
         ces varaibles et les affecte à l'objet entreprise*/
         $formulaireEntreprise->handleRequest($request);

         if ($formulaireEntreprise->isSubmitted() && $formulaireEntreprise->isValid())
         {
            
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();

            // Rediriger l'utilisateur vers la page des entreprises
            return $this->redirectToRoute('entreprises');
         }

        //Création de la représentation graphique du formulaire
        $vueFormulaire = $formulaireEntreprise->createView();
    
    //Afficher la page présentant le formulaire d'ajout d'une entreprise
    return $this->render('pro_stages/ajoutModifEntreprise.html.twig',['vueFormulaire' => $vueFormulaire, 'action'=>"ajouter"]);
    }


    /**
     * @Route("entreprises/modifier/{id}", name="modifEntreprise")
     */
    //public function indexHome()
    public function modifierEntreprise(Request $request, ObjectManager $manager, Entreprise $entreprise)
    {
        
        //Création du formulaire permettent de saisir une entreprise
        $formulaireEntreprise = $this->createForm(EntrepriseType::class, $entreprise);


         /*On demande au formulaire d'analyser la dernière requête Http. Si le tableau POST contenu dans cette requête
         contient des variables nom,activite,adresse,siteweb, alors la méthode handlerequest récupère les valeurs de 
         ces varaibles et les affecte à l'objet entreprise*/
         $formulaireEntreprise->handleRequest($request);

         if ($formulaireEntreprise->isSubmitted()&& $formulaireEntreprise->isValid() )
         {            
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();

            // Rediriger l'utilisateur vers la page des entreprises
            return $this->redirectToRoute('entreprises');
         }

        //Création de la représentation graphique du formulaire
        $vueFormulaire = $formulaireEntreprise->createView();
    
    //Afficher la page présentant le formulaire d'ajout d'une entreprise
    return $this->render('pro_stages/ajoutModifEntreprise.html.twig',['vueFormulaire' => $vueFormulaire,'action'=>"modifier"]);
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