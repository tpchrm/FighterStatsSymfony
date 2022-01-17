<?php

namespace App\Controller;

use App\Entity\DivisionMen;
use App\Entity\FighterMen;
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
     * @Route("/fight/list", name="fight_list")
     */
    public function listFight(ManagerRegistry $managerRegistry): Response
    {
        $repository = $managerRegistry->getRepository(FightMen::class);
        $fights = $repository->findAll();

        return $this->render('fight/index.html.twig', ['fights' => $fights]);
    }

    /**
     * @Route("/fight/new/{division_eng}", name="fight_new")
     */
    public function simulateFight(Request $request, ManagerRegistry $managerRegistry, $division_eng): Response
    {
        $fightMen = new FightMen();

        $form = $this->createForm(FightMenType::class, $fightMen, ["division" => $division_eng]);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            for ($i = 1; $i <= 5 ; $i++) {
                $round = new RoundMen();
                $round->Simulate();

                $entityManager= $managerRegistry->getManager();
                $entityManager->persist($round);

                $fightMen->addRound($round);
            }

            $rounds = $fightMen->getRounds();

            $blue_score = 0;
            $red_score =0;
            foreach ($rounds as $round) {
                $red_score += $round->getRedScore();
                $blue_score += $round->getBlueScore();
            }

            if ($red_score > $blue_score) {
                $fightMen->setWinner($fightMen->getRedFighterMen());
            } elseif ($red_score < $blue_score) {
                $fightMen->setWinner($fightMen->getBlueFighterMen());
            }
            $fightMen->getWinner()->setWins($fightMen->getWinner()->getWins() + 1);

            $entityManager->flush();

            return $this->redirectToRoute('fight_list');
        }

        return $this->renderForm('fight/simulate.html.twig', ['fight_form' => $form]);
    }

    /**
     * @Route("/fight/stats/{fight_id}", name="fight_stats")
     */
    public function statsFight(ManagerRegistry $managerRegistry, $fight_id): Response
    {
        $repository = $managerRegistry->getRepository(FightMen::class);
        $fight = $repository->findOneBy(['id' => $fight_id]);
        $repository = $managerRegistry->getRepository(RoundMen::class);
        $rounds = $repository->findBy(['fightMen' => $fight]);

        return $this->render('fight/stats.html.twig', ['fight' => $fight, 'rounds' => $rounds]);
    }
}
