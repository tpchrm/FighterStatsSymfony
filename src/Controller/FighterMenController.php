<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FighterMenController extends AbstractController
{
    /**
     * @Route("/fighter/men", name="fighter_men")
     */
    public function index(): Response
    {
        return $this->render('fighter_men/index.html.twig', [
            'controller_name' => 'FighterMenController',
        ]);
    }
}
