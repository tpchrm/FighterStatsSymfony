<?php

namespace App\Controller;

use App\Entity\FightMen;
use App\Entity\RoundMen;
use App\Form\FightMenType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends AbstractController
{
    /**
     * @Route("/fight/new/{division_eng}", name="fight_new")
     */
    public function index(Request $request, ManagerRegistry $managerRegistry, $division_eng): Response
    {
        $form = $this->createForm(FightMenType::class, $fightMen, ["division" => $division_eng]);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            dump($fightMen);
            $formData=$form->getData();
            dump($formData);


//            $entityManager= $managerRegistry->getManager();
//            $entityManager->persist($fightMen);
//            $entityManager->flush();

//            return $this->json($fightMen);
//            return $this->redirectToRoute('fight_new', ['division_eng' => 'Featherweight']);
        }

        return $this->renderForm('fight/index.html.twig', ['fight_form' => $form]);
    }
}
