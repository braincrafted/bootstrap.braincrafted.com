<?php

/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012 Florian Eckerstorfer
 */

namespace Bc\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bc\Bundle\BootstrapDemoBundle\Entity\City;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\DefaultStylesFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\ControlStatesFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\SupportedFormControlsType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\ExtendingControlsFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\HorizontalFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\InlineFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\SearchFormType;
use Bc\Bundle\BootstrapDemoBundle\Form\Type\CityType;

/**
 * BootstrapController
 *
 * @category   Controller
 * @package    BraincraftedBootstrapBundle
 * @subpackage Controller
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com Bootstrap for Symfony2
 */
class BootstrapController extends Controller
{
    /**
     * The index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function indexAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:index.html.twig');
    }

    /**
     * The getting started action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function gettingStartedAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:gettingStarted.html.twig');
    }

    /**
     * The base CSS action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function baseCssAction()
    {
        $defaultStylesForm     = $this->createForm(new DefaultStylesFormType());
        $controlStatesForm     = $this->createForm(new ControlStatesFormType());
        $supportedFormControls = $this->createForm(new SupportedFormControlsType());
        $extendingControlsForm = $this->createForm(
            new ExtendingControlsFormType()
        );
        $horizontalForm        = $this->createForm(new HorizontalFormType());
        $inlineForm            = $this->createForm(new InlineFormType());
        $searchForm            = $this->createForm(new SearchFormType());

        return $this->render(
            'BcBootstrapDemoBundle:Bootstrap:baseCss.html.twig',
            array(
                'defaultStylesForm'     => $defaultStylesForm->createView(),
                'controlStatesForm'     => $controlStatesForm->createView(),
                'supportedFormControls' => $supportedFormControls->createView(),
                'extendingControlsForm' => $extendingControlsForm->createView(),
                'horizontalForm'        => $horizontalForm->createView(),
                'inlineForm'            => $inlineForm->createView(),
                'searchForm'            => $searchForm->createView()
            )
        );
    }

    /**
     * The components action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function componentsAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:components.html.twig', array());
    }

    /**
     * The form components action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function formComponentsAction()
    {
        $defaultStylesForm     = $this->createForm(new DefaultStylesFormType());
        $controlStatesForm     = $this->createForm(new ControlStatesFormType());
        $supportedFormControls = $this->createForm(
            new SupportedFormControlsType(),
            array(
                'collection1' => array('Samwise Gamgee', 'Bilbo Baggins', 'Frodo Baggins'),
                'collection2' => array('Samwise Gamgee', 'Bilbo Baggins', 'Frodo Baggins'),
                'collection3' => array('Samwise Gamgee', 'Bilbo Baggins', 'Frodo Baggins')
            )
        );
        $extendingControlsForm = $this->createForm(
            new ExtendingControlsFormType()
        );
        $horizontalForm        = $this->createForm(new HorizontalFormType());
        $inlineForm            = $this->createForm(new InlineFormType());
        $searchForm            = $this->createForm(new SearchFormType());

        return $this->render('BcBootstrapDemoBundle:Bootstrap:formComponents.html.twig', array(
            'defaultStylesForm'     => $defaultStylesForm->createView(),
            'controlStatesForm'     => $controlStatesForm->createView(),
            'supportedFormControls' => $supportedFormControls->createView(),
            'extendingControlsForm' => $extendingControlsForm->createView(),
            'horizontalForm'        => $horizontalForm->createView(),
            'inlineForm'            => $inlineForm->createView(),
            'searchForm'            => $searchForm->createView()
        ));
    }

    public function navComponentsAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:navComponents.html.twig', array());
    }

    public function navbarComponentsAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:navbarComponents.html.twig', array());
    }

    public function flashComponentsAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:flashComponents.html.twig', array());
    }

    public function labelsComponentsAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:labelsComponents.html.twig', array());
    }

    public function paginationComponentsAction()
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            range('a', 'z'),
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render(
            'BcBootstrapDemoBundle:Bootstrap:paginationComponents.html.twig',
            array('pagination' => $pagination)
        );
    }

    /**
     * The javascript action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function javascriptAction()
    {
        return $this->render('BcBootstrapDemoBundle:Bootstrap:javascript.html.twig', array(
        ));
    }

    /**
     * The forms action.
     *
     * @return \Symfony\Component\HttpFoundation\Response The response
     */
    public function formsAction()
    {
        $request = $this->getRequest();

        $city = new City();
        $city->setCitizens(array("Adam", "Eve"));
        $cityForm = $this->createForm(new CityType(), $city);

        if ($request->getMethod() == 'POST') {
            $cityForm->bind($request);

            print_r($cityForm->getData());

            if ($cityForm->isValid()) {
            }
        }

        return $this->render('BcBootstrapDemoBundle:Bootstrap:forms.html.twig', array(
            'cityForm' => $cityForm->createView()
        ));
    }
}
