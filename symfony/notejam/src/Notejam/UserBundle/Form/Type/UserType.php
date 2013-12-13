<?php

namespace Notejam\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('password', 'repeated', array(
           'first_name'  => 'password',
           'second_name' => 'confirm',
           'type'        => 'password',
           'invalid_message' => 'The password fields do not match.',
        ));
        $builder->add('save', 'submit', array(
            'attr' => array('type' => 'submit') 
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Notejam\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
