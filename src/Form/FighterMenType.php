<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\DivisionMen;
use App\Entity\FighterMen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FighterMenType extends AbstractType
{
    private $doctrine;
    public function __construct(ManagerRegistry $doc)
    {
        $this->doctrine=$doc;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $repository_division= $this->doctrine->getRepository(DivisionMen::class);
        $divisions_mens = $repository_division->findAll();

        $repository_country= $this->doctrine->getRepository(Country::class);
        $country = $repository_country->findAll();

        $builder
            ->add('lastname',TextType::class)
            ->add('firstname',TextType::class)
            ->add('height',NumberType::class,[
                'scale'=>2,
            ])
            ->add('weight',NumberType::class,[
                'scale'=>2,
            ])
            ->add('division',EntityType::class, [
                'class'=>DivisionMen::class,
                'choices'=> $divisions_mens,
                ])
            ->add('origin',EntityType::class, [
                'class'=>Country::class,
                'choices'=> $country,
            ])
            ->add('enregistrer',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FighterMen::class,
        ]);
    }
}
