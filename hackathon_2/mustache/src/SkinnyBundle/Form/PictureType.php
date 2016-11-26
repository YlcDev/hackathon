<?php

namespace SkinnyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PictureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('avatar', 'file', array('label' => 'image', 'required' => false))
            ->add('image1', 'file', array('label' => 'image', 'required' => false))
            ->add('image2', 'file', array('label' => 'image', 'required' => false))
            ->add('image3', 'file', array('label' => 'image', 'required' => false))
            ->add('image4', 'file', array('label' => 'image', 'required' => false))
            ->add('image5', 'file', array('label' => 'image', 'required' => false))
    ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SkinnyBundle\Entity\Picture'
        ));
    }

    


}
