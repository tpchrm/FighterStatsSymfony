<?php

namespace App\Controller;

use App\Entity\DivisionMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DivisionMenController extends AbstractController
{
    /**
     * @Route("/division/men", name="division_men")
     */
    public function readDivisionMen(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(DivisionMen::class);

        $divisions_mens = $repository->findAll();

        return $this->render('division_men/index.html.twig', ['divisions_mens' => $divisions_mens]);
    }
}
