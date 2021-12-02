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
     * @Route("/division/men/add", name="division_men_add")
     */
    public function addDivisionMen(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

//        $div1 = new DivisionMen();
//        $div1->setDivisionFr('Poids Mouches')->setDivisionEng('Flyweight');
//
//        $em->persist($div1);
//        $em->flush();

        $repository=$em->getRepository(DivisionMen::class);
        $divisions_mens = $repository->findAll();


        return $this->render('division_men/index.html.twig', [
            'divisions_mens' => $divisions_mens,
        ]);
    }

//    /**
//     * @Route("/division/men", name="division_men")
//     */
//    public function index(): Response
//    {
//        return $this->render('division_men/index.html.twig', [
//            'controller_name' => 'DivisionMenController',
//        ]);
//    }
}
