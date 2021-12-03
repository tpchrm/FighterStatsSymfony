<?php

namespace App\Form;

use App\Entity\DivisionMen;
use App\Entity\FighterMen;
use App\Entity\FightMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FightMenType extends AbstractType
{
    private $managerRegistry;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->managerRegistry = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $repository = $this->managerRegistry->getRepository(DivisionMen::class);
        $currentDivision = $repository->findBy(['division_eng' => $options['division']]);

        $repository = $this->managerRegistry->getRepository(FighterMen::class);
        $fighters = $repository->findBy(['division' => $currentDivision]);
        $builder
            ->add('date', DateType::class, ['widget' => 'single_text'])
            ->add('blueFighterMen', EntityType::class, ['class' => FighterMen::class, 'choices' => $fighters])
            ->add('redFighterMen', EntityType::class, ['class' => FighterMen::class, 'choices' => $fighters])
            ->add('Simuler',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FightMen::class,
            'division' => null
        ]);
    }
}
