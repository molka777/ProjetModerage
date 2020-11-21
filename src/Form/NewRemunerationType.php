<?php

namespace App\Form;

use App\Entity\NouveauType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewRemunerationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom' , null , ['label'=>'Votre offre :  '])
            ->add('offre' , null , ['label'=>'Description :  '])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NouveauType::class,
        ]);
    }
}
