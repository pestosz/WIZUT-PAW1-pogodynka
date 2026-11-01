<?php

namespace App\Form;

use App\Entity\Forecast;
use App\Entity\Location;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('temperature', IntegerType::class, [
                'attr' => ['placeholder' => 'Celsius'],
            ])
            ->add('rain_chance', IntegerType::class, [
                'attr' => ['placeholder' => '0 - 100%'],
            ])
            ->add('wind_speed', IntegerType::class, [
                'attr' => ['placeholder' => 'km/h'],
            ])
            ->add('humidity', IntegerType::class, [
                'attr' => ['placeholder' => '0 - 100%'],
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'name',
                'placeholder' => 'City',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}
