<?php

namespace App\Form;

use App\Entity\Contract;
use App\Entity\DurationWorkTime;
use App\Entity\Job;
use App\Entity\JobCategory;
use App\Entity\Offer;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', CKEditorType::class)
            ->add('postalCode', IntegerType::class)
            ->add('city',TextType::class )
            ->add('country',TextType::class)
            ->add('contract', EntityType::class, [
                'class' => Contract::class,
                'choice_label' => 'title',
                'multiple' => true,
            ])
            ->add('job',EntityType::class, [
                'class'=>Job::class, 'choice_label'=>'title'
            ])
            ->add('duration', EntityType::class, [
                'class'=>DurationWorkTime::class, 'choice_label'=>'title'
            ])
            ->add('jobCategory', EntityType::class, [
                'class'=>JobCategory::class, 'choice_label'=>'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
