<?php
/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012-2013 Florian Eckerstorfer
 */

namespace Braincrafted\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Braincrafted\Bundle\BootstrapBundle\Form\Type\BootstrapCollectionType;

/**
 * PlaygroundController
 *
 * @package    BraincraftedBootstrapDemoBundle
 * @subpackage Controller
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2013 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com BraincraftedBootstrapBundle
 */
class PlaygroundController extends Controller
{
    /**
     * Renders information about the components included in BraincraftedBootstrapBundle.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function formsAction()
    {
        $bcCollectionForm = $this->createFormBuilder(array())
            ->add('subcol', 'bootstrap_collection', array(
                'type'               => 'bootstrap_collection',
                'allow_add'          => true,
                'allow_delete'       => true,
                'add_button_text'    => 'Add Level 1',
                'delete_button_text' => 'Delete Level 1',
                'sub_widget_col'     => 9,
                'button_col'         => 3,
                'options'            => array(
                    'type'               => 'text',
                    'allow_add'          => true,
                    'allow_delete'       => true,
                    'add_button_text'    => 'Add Level 2',
                    'delete_button_text' => 'Delete Level 2',
                    'prototype_name'     => '__subname__',
                    'sub_widget_col'     => 8,
                    'button_col'         => 4
                )
            ))
            ->setData(array(
                'subcol' => array(
                    array('Answer 1a', 'Answer 1b'),
                    array('Answer 2a', 'Answer 2b')
                )
            ))
            ->getForm();

        $sidebysideForm = $this->createFormBuilder(array())
            ->add('firstName', 'text', array('attr' => array('row' => false)))
            ->add('lastName', 'text', array('attr' => array('row' => false)))
            ->setData(array('firstName' => 'Florian', 'lastName' => 'Eckerstorfer'))
            ->getForm();

        return $this->render(
            'BraincraftedBootstrapDemoBundle:Playground:forms.html.twig',
            array(
                'bcCollectionForm' => $bcCollectionForm->createView(),
                'sidebysideForm'      => $sidebysideForm->createView()
            )
        );
    }
}
