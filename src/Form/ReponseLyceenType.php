<?php

namespace App\Form;

use App\Entity\Lyceen;
use App\Entity\Questions;
use App\Entity\Reponses;
use http\Env\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class ReponseLyceenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text_reponse', TextType::class, ['label' => ' '])
            ->add('text_reponse1', TextType::class, ['label' => ' '])
            ->add('text_reponse2', TextType::class, ['label' => ' '])
            ->add('text_reponse3', TextType::class, ['label' => ' '])
            ->add('text_reponse4', TextType::class, ['label' => ' '])
            ->add('commentaire', TextareaType::class, [
                "attr" => array("cols" => "5", "rows" => 6),
                'required'=>false
            ])
           // ->add('reponses')
        ;
            //->add('date_reponse')
            //->add('archive')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reponses::class,
        ]);
    }
}
