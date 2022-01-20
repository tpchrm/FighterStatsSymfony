<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\DivisionMen;
use App\Entity\FighterMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneratorController extends AbstractController
{
    /**
     * @Route("/generate/success", name="success")
     */
    public function generator_success(): Response
    {
        return $this->render('generator/index.html.twig');
    }

    /**
     * @Route("/generate/4b340", name="generator_fighter")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        // À n'utiliser que lors de la premiere création de base de données pour ne pas ajouter de doublons

        $flyweight_countries = ['Mexique', 'Brésil', 'Russie', 'Brésil', 'États-Unis', 'États-Unis', 'Nouvelle-Zélande', 'Brésil', 'Brésil', 'États-Unis', 'République Tchèque', 'États-Unis', 'Chine', 'Iraq', 'Russie', 'États-Unis'];

        $flyweight_fighter_firstnames = ['Brandon', 'Deiveson', 'Askar', 'Alexandre', 'Alex', 'Brandon', 'Kai', 'Rogerio', 'Matheus', 'Matt', 'David', 'Tim', 'Su', 'Amir', 'Tagir', 'Tyson'];
        $flyweight_fighter_lastnames = ['Moreno', 'Figueiredo', 'Askarov', 'Pantoja', 'Perez', 'Royval', 'Kara France', 'Bontorin', 'Nicolau', 'Schnell', 'Dvorak', 'Elliott', 'Mudaerji', 'Albazi', 'Ulanbekov', 'Nam'];
        $flyweight_fighter_weights = [125.00, 125.00, 125.00, 126.0, 124.50, 125.00, 125.00, 125.00, 125.50, 135.00, 125.00, 125.50, 125.00, 126.00, 125.00, 125.00];
        $flyweight_fighter_heights = [67.00, 65.00, 66.00, 65.00, 66.00, 69.00, 64.00, 65.00, 66.00, 68.00, 65.00, 67.00, 68.00, 65.00, 67.00, 67.00];

        for ($i = 0; $i < sizeof($flyweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Flyweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $flyweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($flyweight_fighter_firstnames[$i]);
            $fighter->setLastname($flyweight_fighter_lastnames[$i]);
            $fighter->setWeight($flyweight_fighter_weights[$i]);
            $fighter->setHeight($flyweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $bantamweight_countries = ['États-Unis', 'Russie', 'États-Unis', 'Brésil', 'États-Unis', 'États-Unis', 'Géorgie', 'États-Unis', 'Équateur', 'Brésil', 'Brésil', 'États-Unis', 'États-Unis', 'États-Unis', 'Chine', 'Brésil'];

        $bantamweight_fighter_firstnames = ['Aljamain', 'Petr', 'TJ', 'José', 'Cory', 'Rob', 'Merab', 'Dominick', 'Marlon', 'Marlon', 'Pedro', 'Frankie', 'Sean', 'Ricky', 'Song', 'Raphael'];
        $bantamweight_fighter_lastnames = ['Sterling', 'Yan', 'Dillashaw', 'Aldo', 'Sandhagen', 'Font', 'Dvalishvili', 'Cruz', 'Vera', 'Moraes', 'Munhoz', 'Edgar', 'O Malley', 'Simon', 'Yadong', 'Assuncao'];
        $bantamweight_fighter_weights = [134.50, 135.00, 135.00, 135.00, 135.00, 135.00, 135.00, 135.00, 135.00, 135.00, 135.00, 135.60, 135.00, 135.00, 135.00, 135.00];
        $bantamweight_fighter_heights = [67.00, 67.50, 66.50, 67.00, 71.00, 71.50, 66.00, 68.00, 68.00, 66.00, 66.00, 68.00, 71.00, 66.00, 68.00, 66.50];

        for ($i = 0; $i < sizeof($bantamweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Bantamweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $bantamweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($bantamweight_fighter_firstnames[$i]);
            $fighter->setLastname($bantamweight_fighter_lastnames[$i]);
            $fighter->setWeight($bantamweight_fighter_weights[$i]);
            $fighter->setHeight($bantamweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $featherweight_countries = ['Australie', 'États-Unis', 'États-Unis', 'Mexique', 'Corée du Sud', 'États-Unis', 'Royaume-Uni', 'États-Unis', 'Géorgie', 'États-Unis', 'Brésil', 'États-Unis', 'Nigéria', 'Russie', 'États-Unis', 'États-Unis'];

        $featherweight_fighter_firstnames = ['Alexander', 'Max', 'Brian', 'Yair', 'Chan Sung', 'Calvin', 'Arnold', 'Josh', 'Giga', 'Dan', 'Edson', 'Bryce', 'Sodiq', 'Movsar', 'Shane', 'Alex'];
        $featherweight_fighter_lastnames = ['Volkanovski', 'Holloway', 'Ortega', 'Rodriguez', 'Jung', 'Kattar', 'Allen', 'Emmet', 'Chikadze', 'Ige', 'Barboza', 'Mitchell', 'Yusuf', 'Evloev', 'Burgos', 'Caceres'];
        $featherweight_fighter_weights = [145.00, 146.00, 145.00, 145.50, 145.00, 145.00, 145.00, 145.00, 145.00, 145.00, 155.00, 145.00, 145.00, 145.00, 145.60, 159.00];
        $featherweight_fighter_heights = [66.00, 71.00, 68.00, 71.00, 67.00, 71.00, 68.00, 66.50, 72.00, 67.00, 71.00, 70.00, 69.00, 67.00, 71.00, 70.00];

        for ($i = 0; $i < sizeof($featherweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Featherweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $featherweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($featherweight_fighter_firstnames[$i]);
            $fighter->setLastname($featherweight_fighter_lastnames[$i]);
            $fighter->setWeight($featherweight_fighter_weights[$i]);
            $fighter->setHeight($featherweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $lightweight_countries = ['Brésil', 'États-Unis', 'États-Unis', 'Iran', 'Russie', 'États-Unis', 'Brésil', 'États-Unis', 'Nouvelle-Zélande', 'Irlande', 'États-Unis', 'Kazakhstan', 'Pologne', 'Géorgie', 'Nouvelle-Zélande', 'Brésil'];

        $lightweight_fighter_firstnames = ['Charles', 'Justin', 'Dustin', 'Beneil', 'Islam', 'Michael', 'Rafael', 'Tony', 'Dan', 'Conor', 'Gregor', 'Rafael', 'Mateusz', 'Arman', 'Brad', 'Diego'];
        $lightweight_fighter_lastnames = ['Oliveira', 'Gaethje', 'Poirier', 'Dariush', 'Makhachev', 'Chandler', 'Dos Anjos', 'Ferguson', 'Hooker', 'Mcgregor', 'Gillespie', 'Fiziev', 'Gamrot', 'Tsarukyan', 'Riddell', 'Ferreira'];
        $lightweight_fighter_weights = [155.00, 155.60, 154.50, 155.00, 155.50, 155.20, 155.00, 155.0, 156.00, 145.00, 155.00, 155.00, 155.00, 169.40, 155.00, 155.00];
        $lightweight_fighter_heights = [70.00, 71.00, 69.00, 70.00, 70.00, 68.00, 68.00, 71.00, 72.00, 69.00, 67,00, 68.00, 70.00, 67.00, 67.00, 69.00];

        for ($i = 0; $i < sizeof($lightweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Lightweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $lightweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($lightweight_fighter_firstnames[$i]);
            $fighter->setLastname($lightweight_fighter_lastnames[$i]);
            $fighter->setWeight($lightweight_fighter_weights[$i]);
            $fighter->setHeight($lightweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $welterweight_countries = ['Nigéria', 'États-Unis', 'Brésil', 'Jamaïque', 'États-Unis', 'États-Unis', 'États-Unis', 'États-Unis', 'États-Unis', 'États-Unis', 'États-Unis', 'Suède', 'États-Unis', 'Chine', 'Argentine', 'Russie'];

        $welterweight_fighter_firstnames = ['Kamaru', 'Colby', 'Gilbert', 'Leon', 'Vicente', 'Belal', 'Jorge', 'Stephen', 'Neil', 'Sean', 'Michael', 'Khamzat', 'Geoff', 'Li', 'Santiago', 'Muslim'];
        $welterweight_fighter_lastnames = ['Usman', 'Covington', 'Burns', 'Edwards', 'Luque', 'Muhammad', 'Masvidal', 'Thompson', 'Magny', 'Brady', 'Chiesa', 'Chimaev', 'Neal', 'Jingliang', 'Ponzinibbio', 'Salikhov'];
        $welterweight_fighter_weights = [169.00, 169.40, 155.00, 170.00, 170.00, 170.00, 156.00, 170.00, 170.00, 170.00, 170.50, 186.60, 171.00, 170.00, 171.00, 170.00, 170.00];
        $welterweight_fighter_heights = [72.00, 71.00, 70.00, 72.00, 71.00, 71.00, 71.00, 72.00, 75.00, 70.00, 73.00, 74.00, 71.00, 72.00, 72.00, 71.00];

        for ($i = 0; $i < sizeof($welterweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Welterweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $welterweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($welterweight_fighter_firstnames[$i]);
            $fighter->setLastname($welterweight_fighter_lastnames[$i]);
            $fighter->setWeight($welterweight_fighter_weights[$i]);
            $fighter->setHeight($welterweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $middleweight_countries = ['Nigéria', 'Australie', 'Italie', 'États-Unis', 'États-Unis', 'Brésil','Norvège', 'États-Unis','Royaume-Uni', 'Jamaïque', 'États-Unis', 'États-Unis', 'Russie', 'Brésil', 'États-Unis', 'États-Unis'];

        $middleweight_fighter_firstnames = ['Israel', 'Robert', 'Marvin','Jared', 'Derek', 'Paulo', 'Jack', 'Sean', 'Darren', 'Uriah', 'Kelvin', 'Brad', 'Nassourdine', 'Andre', 'Kevin', 'Chris'];
        $middleweight_fighter_lastnames = ['Adesanya', 'Whittaker', 'Vettori','Cannonier', 'Brunson', 'Costa','Hermansson', 'Strickland', 'Till', 'Hall', 'Gastelum', 'Tavares', 'Imavov', 'Muniz', 'Holland', 'Weidman'];
        $middleweight_fighter_weights = [185.00, 185.00, 185.00, 185.00, 218.40, 186.00, 186.00, 170.00, 185.00, 185.00, 185.00, 185.00, 184.60, 186.00, 185.00, 186.00];
        $middleweight_fighter_heights = [76.00, 72.00, 71.00, 73.00, 73.00, 71.00, 73.00, 73.00, 72.00, 72.00, 69.00, 73.00, 75.00, 73.00, 75.00, 74.00];

        for ($i = 0; $i < sizeof($middleweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Middleweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $middleweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($middleweight_fighter_firstnames[$i]);
            $fighter->setLastname($middleweight_fighter_lastnames[$i]);
            $fighter->setWeight($middleweight_fighter_weights[$i]);
            $fighter->setHeight($middleweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $lightheavyweight_countries = ['Brésil','Pologne', 'République Tchèque','Serbie', 'États-Unis', 'Brésil', 'Russie', 'États-Unis', 'Suisse', 'Ukraine', 'Brésil', 'Royaume-Uni', 'États-Unis', 'États-Unis', 'Australie', 'Moldavie'];

        $lightheavyweight_fighter_firstnames = ['Glover', 'Jan','jiri', 'Aleksandar','Anthony', 'Thiago', 'Magomed', 'Dominick', 'Volkan', 'Nikita', 'Johnny', 'Paul', 'Jamahal', 'Ryan', 'Jimmy', 'Ion'];
        $lightheavyweight_fighter_lastnames = ['Texeira', 'Blachowicz','Prochazka', 'Rakic','Smith', 'Santos', 'Ankalaev','Reyes', 'Oezdemir', 'Krylov', 'Walker', 'Craig', 'Hill', 'Spann', 'Crute', 'Cutelaba'];
        $lightheavyweight_fighter_weights = [205.00, 205.00, 205.00, 206.00, 205.50, 206.00, 205.50, 205.00, 205.50, 205.00, 204.50, 205.00, 205.50, 223.20, 205.00, 211.20];
        $lightheavyweight_fighter_heights = [74.00, 74.00, 75.00, 76.00, 76.00, 74.00, 75.00, 76.00, 74.00, 75.00, 78.00, 75.50, 76.00, 77.00, 74.00, 73.00];

        for ($i = 0; $i < sizeof($lightheavyweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Light Heavyweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $lightheavyweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($lightheavyweight_fighter_firstnames[$i]);
            $fighter->setLastname($lightheavyweight_fighter_lastnames[$i]);
            $fighter->setWeight($lightheavyweight_fighter_weights[$i]);
            $fighter->setHeight($lightheavyweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $heavyweight_countries = ['Cameroun', 'France', 'États-Unis', 'États-Unis', 'États-Unis', 'Russie', 'Surinam', 'États-Unis','Russie', 'Pologne', 'Royaume-Uni', 'Australie', 'Brésil', 'Bulgarie', 'États-Unis', 'Russie'];

        $heavyweight_fighter_firstnames = ['Francis', 'Ciryl', 'Stipe', 'Derrick', 'Curtis', 'Alexander', 'Jairzinho', 'Chris', 'Shamil', 'Marcin', 'Tom', 'Tai', 'Augusto', 'Blagoy', 'Walt', 'Sergei'];
        $heavyweight_fighter_lastnames = ['Ngannou', 'Gane', 'Miocic', 'Lewis', 'Blaydes', 'Volkov', 'Rozenstruik', 'Dakhaus', 'Abdurakhimov', 'Tybura', 'Aspinall', 'Tuivasa','Sakai', 'Ivanov', 'Harris', 'Pavlovich'];
        $heavyweight_fighter_weights = [250.00, 245.00, 240.00, 265.00, 265.00, 263.00, 242.00, 250.00, 235.00, 249.00, 245.00, 264.00, 265.00, 250.00, 250.00, 257.00];
        $heavyweight_fighter_heights = [76.00, 76.00, 77.00, 75.00, 76.00, 79.00, 74.00, 75.00, 75.00, 75.00, 77.00, 74.00, 75.00, 71.00, 77.00, 75.00];

        for ($i = 0; $i < sizeof($heavyweight_fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $managerRegistry->getRepository(DivisionMen::class);
            $division = $repository->findOneBy(['division_eng' => 'Heavyweight']);
            $fighter->setDivision($division);

            $repository= $managerRegistry->getRepository(Country::class);
            $origin = $repository->findOneBy( ['name' => $heavyweight_countries[$i]]);
            $fighter->setOrigin($origin);

            $fighter->setFirstname($heavyweight_fighter_firstnames[$i]);
            $fighter->setLastname($heavyweight_fighter_lastnames[$i]);
            $fighter->setWeight($heavyweight_fighter_weights[$i]);
            $fighter->setHeight($heavyweight_fighter_heights[$i]);
            $fighter->setWins(0);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($fighter);
        }

        $entityManager->flush();

        return $this->redirectToRoute('success');
    }

    /**
     * @Route("/generate/55x24", name="generator_division")
     */
    public function generator_division(ManagerRegistry $managerRegistry): Response
    {
        // À commenter pour ne pas ajouter de doublons dans la base
        $division_fr_array = array('Poids Mouches', 'Poids Coqs', 'Poids Plumes', 'Poids Légers', 'Poids Mi-Moyens', 'Poids Moyens', 'Poids Lourds-Légers', 'Poids Lourd');
        $division_eng_array = array('Flyweight', 'Bantamweight', 'Featherweight', 'Lightweight', 'Welterweight', 'Middleweight', 'Light Heavyweight', 'Heavyweight');

        for ($i = 0; $i < sizeof($division_fr_array); $i++) {
            $em = $managerRegistry->getManager();
            $division = new DivisionMen();
            $division->setDivisionFr($division_fr_array[$i]);
            $division->setDivisionEng($division_eng_array[$i]);
            $em->persist($division);
            $em->flush();
        }

        return $this->redirectToRoute('generator_fighter');
    }

    /**
     * @Route("/generate/start", name="generator_coutry")
     */
    public function generator_country(ManagerRegistry $managerRegistry): Response
    {
        //À commenter pour ne pas ajouter de doublons dans la base
        $countries_array = [ "Afrique du Sud", "Algérie", "Allemagne", "Arabie Saoudite", "Argentine", "Australie", "Autriche", "Belgique", "Brésil", "Bulgarie", "Cameroun", "Canada", "Chili", "Chine", "Colombie", "Corée du Sud", "Croatie", "Danemark", "Égypte", "Émirats Arabes Unis", "Équateur", "Espagne", "États-Unis", "Finlande", "France", "Géorgie", "Grèce", "Hongrie", "Inde", "Iran", "Iraq", "Irlande", "Islande", "Israël", "Italie", "Jamaïque", "Japon", "Kazakhstan", "Maroc", "Mexique", "Moldavie", "Nigéria", "Norvège", "Nouvelle-Zélande", "Paraguay", "Pays-Bas", "Pérou", "Pologne", "Portugal", "Quatar", "République Démocratique du Congo", "République Tchèque", "Réunion", "Roumanie", "Royaume-Uni", "Russie", "Serbie","Singapour", "Slovaquie", "Slovénie", "Somalie", "Soudan", "Suède", "Suisse", "Surinam", "Thaïlande", "Tunisie", "Turquie", "Ukraine", "Uruguay" ];

        foreach ($countries_array as $name) {
            $country = new Country();
            $country->setName($name);

            $entity_manager = $managerRegistry->getManager();
            $entity_manager->persist($country);
            $entity_manager->flush();
        }

        return $this->redirectToRoute('generator_division');
    }
}