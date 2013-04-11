<?php

/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012 Florian Eckerstorfer
 */

namespace Bc\Bundle\BootstrapDemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * CityType
 *
 * @category   FormType
 * @package    BraincraftedBootstrapBundle
 * @subpackage Form
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com Bootstrap for Symfony2
 */
class CityType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'label' => 'Name'
        ));
        $builder->add('mayorEmail', 'email', array(
            'label' => 'Mayors email address'
        ));
        $builder->add('population', 'integer', array(
            'label' => 'Population',
            'attr'  => array('class' => 'span2')
        ));
        $builder->add('newsletter', 'choice', array(
            'label'   => 'Subscribe?',
            'choices' => array(1 => 'Yes', 0 => 'No'),
            'multiple' => false,
            'expanded' => true
        ));
	$builder->add('citizens', 'collection', array(
	    'type'      => 'text',
	    'allow_add' => true,
	    'options'   => array(
		'required'  => false,
		'attr'      => array('class' => 'citizen-field')
	    ),
	));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'city_form';
    }
}
