<?php

namespace App\Form;

use App\Entity\EmployeSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use App\Entity\Employe;

class EmployeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('employe',EntityType::class,['class' => Employe::class, 'choice_label' => 'Cin' , 'label' => 'Employe' ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmployeSearch::class,
        ]);
    }
}
