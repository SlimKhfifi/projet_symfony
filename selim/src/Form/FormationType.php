<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Employe;
 use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 



class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
         $builder
         ->add('NomFormation')
         ->add('Centre')
         ->add('Formateur')
         ->add('DateDebut')
         ->add('DateFin')
         ->add('Lieu')
         ->add('employe',EntityType::class,['class' => Employe::class, 'choice_label' => 'Cin', 'label' => 'employe']);}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
