<?php

namespace App\Controller;

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
        $repository = $managerRegistry->getRepository(FighterMen::class);
        $fighters = $repository->findAll();

        return $this->render('view/index.html.twig',
            [
                'lastFights' => array_slice($fights, -5, 5),
                'lastFighters' => array_slice($fighters, -5, 5)
            ]
        );
    }
}
