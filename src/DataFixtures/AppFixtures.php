<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');


        

        //Génaration de données de test (excepté les noms) pour les entreprises 
        $nbEntreprises = 30; //$faker->numberBetween($min = 1,$max = 10);
        for ($i=0; $i < $nbEntreprises; $i++) { 
            $uneEntreprise[$i] = new Entreprise();
            $uneEntreprise[$i]->setNom($faker->regexify('(Capgemini|Cybertek|Digiway|SEI GROUPE LKS|ALGO TECH INFORMATIQUE|BIGWIKI|IM DIGITAL|WEETAB|SITINCLOUD|CPAM|SARL HARADA|SMILE AND GOLF)'));
            $uneEntreprise[$i]->setActivite($faker->catchPhrase);
            $uneEntreprise[$i]->setAdresse($faker->address);
            $uneEntreprise[$i]->setSiteWeb($faker->url);
            $manager->persist($uneEntreprise[$i]);
        }

       
        //Génaration de données de test pour les formations 
        $tableauFormations = array("DUT Info"=>"DUT Informatique","LPM"=>"Licence Pro Multimédia","DUTIC"=>"DU Technologie de l'Information");
        foreach ($tableauFormations as $nomCourt => $nomLong) {
            $uneFormation = new Formation();
            $uneFormation->setNomCourt($nomCourt);
            $uneFormation->setNomLong($nomLong);
            $manager->persist($uneFormation); 
        
                


        
       //Création de plusieurs stages associés aux formations
        $nbStages = 10;
        for ($i=0; $i < $nbStages; $i++) {
            $stage = new Stage();
            $stage -> setTitre($faker->jobTitle);
            $stage -> setDescription($faker->realText($maxNbChars = 400, $indexSize = 2));
            $stage -> setEmail($faker->email);
            // Création relation Stage --> Formation
            $stage -> addFormation($uneFormation);
            

            //Définir et mettre à jour l'entreprise
            // Sélectionner une entreprise au hasard parmi les 12 enregistrées dans $tableauEntreprises
            $numEntreprises = $faker->numberBetween($min = 0,$max = 11);
            // Création relation Stage --> Entreprise
            $stage -> setEntreprise($uneEntreprise[$numEntreprises]);
            // Création relation Entreprise --> Stage
            $uneEntreprise[$numEntreprises] -> addStage($stage);
            // Persister les objets modifiés
            $manager->persist($stage);
            $manager->persist($uneEntreprise[$numEntreprises]);
        }
    } 
        //Envoi les objets crées en base de données
        $manager->flush();
    }
}
