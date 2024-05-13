<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Tutorial;
use App\Entity\TutorialInCourse;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutorialInCourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('orderNumber')
            ->add('course', EntityType::class, [
                'class' => Course::class,
                'choice_label' => 'id',
            ])
            ->add('tutorial', EntityType::class, [
                'class' => Tutorial::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TutorialInCourse::class,
        ]);
    }
}
