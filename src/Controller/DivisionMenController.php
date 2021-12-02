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
        // À commenter pour ne pas ajouter de doublons dans la base
//        $division_fr_array = array('Poids Mouches', 'Poids Coqs', 'Poids Plumes', 'Poids Légers', 'Poids Mi-Moyens', 'Poids Moyens', 'Poids Lourd Léger', 'Poids Lourd');
//        $division_eng_array = array('Flyweight', 'Bantamweight', 'Featherweight', 'Lightweight', 'Welterweight', 'Middleweight', 'Light Heavyweight', 'Heavyweight');

//        for ($i = 0; $i < sizeof($division_fr_array); $i++) {
//            $em = $doctrine->getManager();
//            $division = new DivisionMen();
//            $division->setDivisionFr($division_fr_array[$i]);
//            $division->setDivisionEng($division_eng_array[$i]);
//            $em->persist($division);
//            $em->flush();
//        }

        $repository= $doctrine->getRepository(DivisionMen::class);

        $divisions_mens = $repository->findAll();

        return $this->render('division_men/index.html.twig', ['divisions_mens' => $divisions_mens]);
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
