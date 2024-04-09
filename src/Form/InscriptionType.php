<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenoms')
            ->add('telephone')
            ->add('entreprise')
            ->add('email', EmailType::class)
            ->add('dateNaissance', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'restauration' => 'restauration',
                    'industrielle' => 'industrielle',
                    'agro alimentaire' => 'agro alimentaire',
                    'art & création' => 'art & création',
                    'entrepreneurs sociaux' => 'entrepreneurs sociaux',
                    'mode et marque' => 'mode et marque',
                    'oeuvre caritative' => 'oeuvre caritative',
                    'prestation de service' => 'prestation de service',
                    'technologie' => 'technologie',
                ],
            ])
            ->add('commune')
            ->add('description')
            ->add('premiere_edition', ChoiceType::class, [
                'choices' => [
                    'OUI' => 1,
                    'NON' => 0,
                ]
            ])
            ->add('typeEntreprise', ChoiceType::class, [
                'choices' => [
                    'TPE' => 'TPE',
                    'PME' => 'PME',
                    'Multinationale' => 'Multinationale'
                ]
            ])
            ->add('caEntreprise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
