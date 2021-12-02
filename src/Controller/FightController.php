<?php

namespace App\Controller;

use App\Entity\DivisionMen;
use App\Entity\FightMen;
use App\Form\FightMenType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends AbstractController
{
    /**
     * @Route("/fight/new/Lighweight", name="fight_new_lighweight")
     */
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $fightMen = new FightMen();
        $form = $this->createForm(FightMenType::class, $fightMen);
        //@TODO : passer la division_eng dans le constructeur pour affiner les sélections.

        return $this->renderForm('fight/index.html.twig', ['fight_form' => $form]);
    }
}
