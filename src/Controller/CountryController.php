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
     * @Route("/country_add", name="country_add")
     */
    public function addCountry(ManagerRegistry $managerRegistry): Response
    {
        /* À commenter pour ne pas ajouter de doublons dans la base
        $country = new Country();
        $country->setName("Chili");

        $entity_manager = $managerRegistry->getManager();
        $entity_manager->persist($country);
        $entity_manager->flush();
        */

        $repository = $managerRegistry->getRepository(Country::class);
        $countries = $repository->findAll();

        return $this->render('country/index.html.twig', [
            'countries' => $countries,
        ]);
    }
}
