<?php

namespace Sylius\Bundle\ThemeBundle\Form\Type;


use Symfony\Component\Form\FormBuilderInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\AbstractType;

class ProductReviewType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'label' => 'Firstname(Required)',
            ))
            ->add('lastname','text',array(
                'label' => 'Lastname',
            ))
            ->add('productid','hidden',array(
                'label' => 'Productid',
            ))
            ->add('email','email',array(
                'label' => 'Email(Required,but will not display)',
            ))
            ->add('content','textarea',array(
                'label' => 'Content',
            ))
        ;
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'theme_reviews';
    }
}
