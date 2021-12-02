<?php

namespace App\Controller;

use App\Entity\RoundMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoundController extends AbstractController
{

    /**
     * @Route("/round", name="round")
     */
    public function round(): Response
    {
        $round = new RoundMen();
        $round->Simulate();

        return $this->render("round/index.html.twig" , ['round' => $round]);
    }
}
