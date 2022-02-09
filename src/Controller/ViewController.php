<?php

namespace App\Controller;

use App\Entity\DivisionMen;
use App\Entity\FighterMen;
use App\Entity\FightMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    /**
     * @Route("/home", name="main_menu")
     */
    public function mainMenu(ManagerRegistry $managerRegistry): Response
    {
        $repository = $managerRegistry->getRepository(FightMen::class);
        $fights = $repository->findAll();

        $repository = $managerRegistry->getRepository(DivisionMen::class);
        $FLWdiv = $repository->findBy(['division_eng' => 'Flyweight']);
        $BWdiv = $repository->findBy(['division_eng' => 'Bantamweight']);
        $FTWdiv = $repository->findBy(['division_eng' => 'Featherweight']);
        $LWdiv = $repository->findBy(['division_eng' => 'Lightweight']);
        $WWdiv = $repository->findBy(['division_eng' => 'Welterweight']);
        $MWdiv = $repository->findBy(['division_eng' => 'Middleweight']);
        $LHWdiv = $repository->findBy(['division_eng' => 'Light Heavyweight']);
        $HWdiv = $repository->findBy(['division_eng' => 'Heavyweight']);

        $repository = $managerRegistry->getRepository(FighterMen::class);
        $FLWfighters = $repository->getTop5Fighters($FLWdiv);
        $BWfighters = $repository->getTop5Fighters($BWdiv);
        $FTWfighters = $repository->getTop5Fighters($FTWdiv);
        $LWfighters = $repository->getTop5Fighters($LWdiv);
        $WWfighters = $repository->getTop5Fighters($WWdiv);
        $MWfighters = $repository->getTop5Fighters($MWdiv);
        $LHWfighters = $repository->getTop5Fighters($LHWdiv);
        $HWfighters = $repository->getTop5Fighters($HWdiv);

        return $this->render('view/index.html.twig',
            [
                'lastFights' => array_slice($fights, -5, 5),
                'topFLW' => $FLWfighters,
                'topBW' => $BWfighters,
                'topFTW' => $FTWfighters,
                'topLW' => $LWfighters,
                'topWW' => $WWfighters,
                'topMW' => $MWfighters,
                'topLHW' => $LHWfighters,
                'topHW' => $HWfighters,
            ]
        );
    }

    /**
     * @Route("/help", name="help_page")
     */
    public function helpPage(): Response
    {

        return $this->render('view/help.html.twig');
    }
}
