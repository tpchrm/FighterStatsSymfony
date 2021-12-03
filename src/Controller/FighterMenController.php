<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\DivisionMen;
use App\Entity\FighterMen;
use App\Form\FighterMenType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FighterMenController extends AbstractController
{
    /**
     * @Route("/fighter/men", name="fighter_men")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository=$doctrine->getManager()->getRepository(FighterMen::class);
        $list_fighter_men=$repository->findAll();

        return $this->render('fighter_men/index.html.twig', [
            'list_fighter_men' => $list_fighter_men,
        ]);
    }

    /**
     * @Route("/fighter/men/add", name="fighter_men_add")
     */
    public function addFighterMen(Request $request, ManagerRegistry $doctrine): Response
    {
        $fightermen = new FighterMen();

        $form = $this->createForm(FighterMenType::class, $fightermen);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $fightermen=$form->getData();
            $em = $doctrine->getManager();
            $em->persist($fightermen);
            $em->flush();

            return $this->redirectToRoute('fighter_men');
        }

        return $this->renderForm('fighter_men/add.html.twig', [
            'fighter_men_add' => $form
        ]);
    }

    /**
     * @Route("/fighter/men/show/{id}", name="fighter_men_show")
     */
    public function showFighterMen(ManagerRegistry $doctrine, int $id): Response
    {
        //afficher tout les combattant present de notre BDD par rapport a l'Id
        $repository=$doctrine->getManager()->getRepository(FighterMen::class);
        $fighter_men=$repository->find($id);

        return $this->render('fighter_men/show.html.twig', [
            'fighter_men_show' => $fighter_men
        ]);
    }

    /**
     * @Route("/fighter/men/update/{id}", name="fighter_men_update")
     */
    public function updateFighterMen(Request $request, ManagerRegistry $doctrine, FighterMen $fighterMen): Response
    {
        $form = $this->createForm(FighterMenType::class, $fighterMen);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $fightermen=$form->getData();
            $em = $doctrine->getManager();
            $em->persist($fightermen);
            $em->flush();

            return $this->redirectToRoute('fighter_men');
        }

        return $this->renderForm('fighter_men/update.html.twig', [
            'fighter_men_update' => $form
        ]);
    }

    /**
     * @Route("/fighter/men/delete/{id}", name="fighter_men_delete")
     */
    public function deleteFighterMen(Request $request, ManagerRegistry $doctrine, FighterMen $fighterMen): Response
    {
        $form = $this->createForm(FighterMenType::class, $fighterMen);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $fightermen=$form->getData();
            $em = $doctrine->getManager();
            $em->remove($fightermen);
            $em->flush();

            return $this->redirectToRoute('fighter_men');
        }

        return $this->renderForm('fighter_men/delete.html.twig', [
            'fighter_men_delete' => $form
        ]);
    }

    /**
     * @Route("/fighter/men/generate", name="fighter_men_generate")
     */
    public function generateFighterMen(ManagerRegistry $doctrine): Response
    {
        $countries = ['États-Unis', 'États-Unis', 'Mexique', 'Corée du Sud', 'États-Unis', 'Royaume-Uni', 'Australie'];

        $fighter_firstnames = ['Max', 'Brian', 'Yair', 'Chan Sung', 'Calvin', 'Arnold', 'Alexander'];
        $fighter_lastnames = ['Holloway', 'Ortega', 'Rodriguez', 'Jung', 'Kattar', 'Allen', 'Volkanovski'];
        $fighter_weights = [146.00, 145.00, 145.50, 145.00, 145.00, 145.00, 145.00];
        $fighter_heights = [71.00, 68.00, 71.00, 67.00, 71.00, 68.00, 66.00];

        for ($i = 0; $i < sizeof($fighter_firstnames); $i++) {
            $fighter = new FighterMen();

            $repository= $doctrine->getRepository(DivisionMen::class);
            $division = $repository->findBy(['division_eng' => 'Featherweight']);
            $fighter->setDivision($division[0]);

            $repository= $doctrine->getRepository(Country::class);
            $origin = $repository->findBy( ['name' => $countries[$i]]);
            $fighter->setOrigin($origin[0]);

            $fighter->setFirstname($fighter_firstnames[$i]);
            $fighter->setLastname($fighter_lastnames[$i]);
            $fighter->setWeight($fighter_weights[$i]);
            $fighter->setHeight($fighter_heights[$i]);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($fighter);
            $entityManager->flush();
            dump($fighter);
        }

        $repository=$doctrine->getManager()->getRepository(FighterMen::class);
        $list_fighter_men=$repository->findAll();

        return $this->render('fighter_men/index.html.twig', [
            'list_fighter_men' => $list_fighter_men,
            ]);
    }
}
