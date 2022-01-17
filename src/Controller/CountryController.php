<?php

namespace App\Controller;

use App\Entity\Country;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country", name="country")
     */
    public function readCountry(ManagerRegistry $managerRegistry): Response
    {
        $repository = $managerRegistry->getRepository(Country::class);
        $countries = $repository->findAll();

        return $this->render('country/index.html.twig', ['countries' => $countries]);
    }
}
