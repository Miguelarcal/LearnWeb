<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Label;
use App\Entity\Language;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('difficulty')
            ->add('languages', EntityType::class, [
                'class' => Language::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('labels', EntityType::class, [
                'class' => Label::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('students', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}
