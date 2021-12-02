<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country_add", name="country_add")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
        ]);
    }
}
