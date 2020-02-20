<?php

namespace App\Form;

use App\Entity\Stage;
use App\Form\EntrepriseType;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description',TextareaType::class)
            ->add('email',EmailType::class)
            ->add('entreprise',EntrepriseType::class)
            ->add('formations', EntityType::class, array(
                'class' => Formation::class,
                'choice_label' => function(Formation $formation)
                {return $formation->getNomLong();},
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
