<?php

namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReponseLyceenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text_reponse',TextType::class, ['attr' => ['label' =>false]])
            ->add('text_reponse1',TextType::class, ['attr' => ['label' =>false]])
            ->add('text_reponse2',TextType::class, ['attr' => ['label' =>false]])
            ->add('text_reponse3',TextType::class, ['attr' => ['label' =>false]])
            ->add('text_reponse4',TextType::class, ['attr' => ['label' =>false]])
            ->add('commentaire', TextareaType::class, [
                "attr" => array("cols" => "5", "rows" => 6, 
                'placeholder' => 'Pour plus de précisions', 
                'label' => 'Commenatire'
                ), 
                'required'=>false, 
                
            ])
        //    ->add('Envoyer', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}
