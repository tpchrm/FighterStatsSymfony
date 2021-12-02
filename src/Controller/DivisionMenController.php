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

        $div = new DivisionMen();
        $div1 = new DivisionMen();
        $div2 = new DivisionMen();
        $div3 = new DivisionMen();
        $div4 = new DivisionMen();
        $div5 = new DivisionMen();
        $div6 = new DivisionMen();
        $div->setDivisionFr('Poids Mouches')->setDivisionEng('Flyweight');
        $div1->setDivisionFr('Poids Coqs')->setDivisionEng('Bantamweight');
        $div2->setDivisionFr('Poids Plumes')->setDivisionEng('Fearthereight');
        $div3->setDivisionFr('Poids Légers')->setDivisionEng('Lightweight');
        $div4->setDivisionFr('Poids Mi-Moyens')->setDivisionEng('Welterweight');
        $div5->setDivisionFr('Poids Moyens')->setDivisionEng('Middleweight');
        $div6->setDivisionFr('Poids Lourd Léger')->setDivisionEng('Light Heavyweight');
        $div6->setDivisionFr('Poids Lourd')->setDivisionEng('Heavyweight');

//        $em->persist($div);
        $em->persist($div1);
        $em->persist($div2);
        $em->persist($div3);
        $em->persist($div4);
        $em->persist($div5);
        $em->persist($div6);
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
