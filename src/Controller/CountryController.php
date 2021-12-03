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
     * @Route("/country/generate", name="country_generate")
     */
    public function generateCountry(ManagerRegistry $managerRegistry): Response
    {

//         À commenter pour ne pas ajouter de doublons dans la base
        $countries_array = array('Mexique', 'Australie', 'Corée du Sud', 'Croatie', 'Écosse', 'Cameroun', 'Brésil', 'États-Unis', 'Iran', 'Daghestan', 'Nouvelle-Zélande', 'Irlande', 'Russie',  'Nigéria', 'Royaume-Uni', 'Italie', 'République Tchèque', 'Arabie Saoudite', 'Tchétchénie', 'Chine', 'Argentine', 'Norvège', 'France', 'Jamaïque', 'Pologne', 'Autriche', 'Suisse', 'Géorgie', 'Moldavie');
        sort($countries_array, SORT_STRING );

        foreach ($countries_array as $name) {
            $country = new Country();
            $country->setName($name);

            $entity_manager = $managerRegistry->getManager();
            $entity_manager->persist($country);
            $entity_manager->flush();
        }

        $repository = $managerRegistry->getRepository(Country::class);
        $countries = $repository->findAll();

        return $this->render('country/index.html.twig', ['countries' => $countries]);
    }
}
