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
        $formationDUTInfo = new Formation();
        $formationDUTInfo->setNomLong("Diplôme universitaire et Technologique Informatique");
        $formationDUTInfo->setNomCourt("DUT Info");
        $manager->persist($formationDUTInfo);

        $formationLPMul = new Formation();
        $formationLPMul->setNomLong("Licence professionnelle multimédia");
        $formationLPMul->setNomCourt("LP Multimédia");
        $manager->persist($formationLPMul);

        $formationDUTIC = new Formation();
        $formationDUTIC->setNomLong("Diplôme universitaire en Technologies de l'Information et de la Communication");
        $formationDUTIC->setNomCourt("DU TIC");
        $manager->persist($formationDUTIC);

        //Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        //Génaration de données de test pour les Entreprises dans une boucle for
       /* $nbEntreprises=10;
        for($i=0;$i<=$nbEntreprises;$i++){
            $Entreprise = new Entreprise();
            $Entreprise->setNom($faker->regexify('[A-Z][a-z]{5,12}'));
            $Entreprise->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
            $Entreprise->setAdresse($faker->address);
            $Entreprise->setSiteWeb($faker->url);
            $manager->persist($Entreprise);
        }
    */

        //Génaration de données de test pour les Entreprises excepté pour le nom de l'entreprise
        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("Capgemini");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("Cybertek");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("Digiway");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("SEI GROUPE LKS");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("ALGO'TECH INFORMATIQUE");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("BIGWIKI");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("IM DIGITAL");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("WEETAB");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("SITINCLOUD");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("CPAM");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("SARL HARADA");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        $Entreprise1 = new Entreprise();
        $Entreprise1->setNom("SMILE AND GOLF");
        $Entreprise1->setActivite($faker->realText($maxNbChars=150,$indexSize=2));
        $Entreprise1->setAdresse($faker->address);
        $Entreprise1->setSiteWeb($faker->url);
        $manager->persist($Entreprise1);

        
        $manager->flush();
    }
}
