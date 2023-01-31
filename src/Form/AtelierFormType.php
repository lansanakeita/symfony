<?php

namespace App\Form;

use App\Entity\Atelier;
use App\Entity\Metier;
use App\Entity\Salle;
use App\Entity\Secteur;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AtelierFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_atelier')
            ->add('date_atelier')
            ->add('url_ressource')
            ->add('pdf_ressource')
            ->add('salle', EntityType::class, [
                'class'         => Salle::class,
                'choice_label' =>'nom',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->orderBy('b.nom', 'ASC');
                }
            ])
            ->add('secteur', EntityType::class, [
                'class'         => Secteur::class,
                'choice_label' =>'nom',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->orderBy('b.nom', 'ASC');
                }
            ])
            ->add('metier', EntityType::class, [
                'class'         => Metier::class,
                'choice_label' =>'nom_metier',
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->orderBy('b.nom_metier', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Atelier::class,
        ]);
    }
}
