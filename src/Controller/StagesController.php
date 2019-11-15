<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StagesController extends AbstractController
{
    /**
     * @Route("/stages", name="stages")
     */
    public function index()
    {
        return $this->render('stages/index.html.twig', [
            'controller_name' => 'StagesController',
        ]);
    }
}
