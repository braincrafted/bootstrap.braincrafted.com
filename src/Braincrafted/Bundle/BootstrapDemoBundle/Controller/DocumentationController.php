<?php
/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012-2013 Florian Eckerstorfer
 */

namespace Braincrafted\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Braincrafted\Bundle\BootstrapDemoBundle\Entity\DemoUser;
use Braincrafted\Bundle\BootstrapDemoBundle\Entity\DemoUser2;

/**
 * DocumentationController
 *
 * @package    BraincraftedBootstrapDemoBundle
 * @subpackage Controller
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2013 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com BraincraftedBootstrapBundle
 */
class DocumentationController extends Controller
{
    /**
     * Root action, redirects the user to {@see indexAction()}.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function rootAction()
    {
        return $this->redirect($this->generateUrl('braincrafted_bootstrap_index'));
    }

    /**
     * Index action, renders the homepage.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('BraincraftedBootstrapDemoBundle:Documentation:index.html.twig');
    }

    /**
     * Renders the installation guide.
     *
     * @return Symfony\Component\HttpFoundation\Response
     *
     */
    public function gettingStartedAction()
    {
        return $this->render('BraincraftedBootstrapDemoBundle:Documentation:getting-started.html.twig');
    }

    /**
     * Renders information about the components included in BraincraftedBootstrapBundle.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function componentsAction()
    {
        $horizontalForm = $this->createFormBuilder([])
            ->add('text', 'text')
            ->add('textarea', 'textarea')
            ->add('email', 'email')
            ->add('integer', 'integer')
            ->add('money', 'money')
            ->add('number', 'number')
            ->add('password', 'password')
            ->add('percent', 'percent')
            ->add('search', 'search')
            ->add('url', 'url')
            ->add('choice', 'choice', [ 'choices' => [ 'male', 'female', 'undecided' ]])
            ->add('choiceMultiple', 'choice', [ 'choices' => [ 'male', 'female', 'undecided' ], 'multiple' => true ])
            ->add('choiceExpanded', 'choice', [ 'choices' => [ 'male', 'female', 'undecided' ], 'expanded' => true ])
            ->add('choiceExpandedMultiple', 'choice', [ 'choices' => [ 'male', 'female', 'undecided' ], 'expanded' => true, 'multiple' => true ])
            ->add('country', 'country')
            ->add('language', 'language')
            ->add('locale', 'locale')
            ->add('timezone', 'timezone')
            ->add('currency', 'currency')
            ->add('date', 'date')
            ->add('dateTime', 'datetime')
            ->add('time', 'time')
            ->add('birthday', 'birthday')
            ->add('file', 'file')
            ->add('checkbox', 'checkbox')
            ->add('radio', 'radio')
            ->add('repeated', 'repeated', [ 'type' => 'email' ])
            ->add('button', 'button')
            ->add('submit', 'submit')
            ->add('reset', 'reset')
            ->getForm();

        $basicForm = $this->createFormBuilder([])
            ->add('basic_email', 'email', [ 'label' => 'Email' ])
            ->add('basic_password', 'password', [ 'label' => 'Password' ])
            ->add('basic_file', 'file', [ 'label' => 'File input' ])
            ->add('basic_checkbox', 'checkbox', [ 'label' => 'Check me out' ])
            ->add('basic_submit', 'submit', [ 'label' => 'Submit' ])
            ->getForm();

        $inlineForm = $this->createFormBuilder([])
            ->add('inline_email', 'email', [ 'label' => 'Email' ])
            ->add('inline_password', 'password', [ 'label' => 'Password' ])
            ->add('inline_remember_me', 'checkbox', [ 'label' => 'Remember me' ])
            ->add('inline_sign_in', 'submit', [ 'label' => 'Sign in' ])
            ->getForm();

        $form = $this->createFormBuilder([])
            ->add('firstName', 'text')
            ->add('username', 'text')
            ->add('twitterScreenname', 'text')
            ->add('price', 'text')
            ->add(
                'price2',
                'text',
                array('attr' => array('input_group' => array('prepend' => '$', 'append' => '.00', 'size' => 'small')))
            )
            ->getForm();

        $demoUser = new DemoUser;
        $demoUser->setFavoriteHobbits(['', '']);
        $demoUser2 = new DemoUser2;

        $errorForm = $this->createFormBuilder($demoUser, [ 'csrf_protection' => false ])
            ->add('username', 'text', [ 'required' => true ])
            ->add('favoriteHobbits', 'bootstrap_collection', [ 'required' => true ])
            ->add('birthday', 'birthday', [ 'required' => true ])
            ->add('gender', 'choice', [ 'choices' => [ 'female', 'male' ], 'expanded' => true, 'multiple' => true, 'required' => true ])
            ->add('acceptTerms', 'checkbox')
            ->getForm();
        $errorForm->submit([]);

        $error2Form = $this->createFormBuilder([])
            ->add('username', 'text', [ 'required' => true ])
            ->getForm();
        $error2Form->submit([]);

        $basicErrorForm = $this->createFormBuilder($demoUser, [ 'csrf_protection' => false ])
            ->add('username', 'text', [ 'required' => true ])
            ->add('favoriteHobbits', 'bootstrap_collection', [ 'required' => true ])
            ->add('birthday', 'birthday', [ 'required' => true ])
            ->add('gender', 'choice', [ 'choices' => [ 'female', 'male' ], 'expanded' => true, 'multiple' => true, 'required' => true ])
            ->getForm();
        $basicErrorForm->submit([]);

        $basicError2Form = $this->createFormBuilder([])
            ->add('username', 'text', [ 'required' => true ])
            ->getForm();
        $basicError2Form->submit([]);

        $inlineErrorForm = $this->createFormBuilder($demoUser2, [ 'csrf_protection' => false ])
            ->add('email', 'email', [ 'label' => 'Email', 'required' => true ])
            ->add('password', 'password', [ 'label' => 'Password', 'required' => true ])
            ->getForm();
        $inlineErrorForm->submit([]);

        $inlineError2Form = $this->createFormBuilder([])
            ->add('username', 'text', [ 'required' => true ])
            ->getForm();
        $inlineError2Form->submit([]);

        $bcCollectionForm = $this->createFormBuilder([])
            ->add(
                'hobbits',
                'bootstrap_collection',
                [
                    'allow_add'             => true,
                    'allow_delete'          => true,
                    'add_button_text'       => 'Add Hobbit',
                    'delete_button_text'    => 'Delete Hobbit',
                    'sub_widget_col'        => 9,
                    'button_col'            => 3
                ]
            )
            ->setData(['hobbits' => ['Frodo Baggins', 'Bilbo Baggins']])
            ->getForm();

        $menuFactory = $this->container->get('knp_menu.factory');

        $tabsMenu = $menuFactory->createItem('root');
        $tabsMenu->addChild('Home', [ 'uri' => '#menus-tabs' ])->setCurrent(true);
        $tabsMenu->addChild('Profile', [ 'uri' => '#menus-tabs' ]);
        $tabsMenu->addChild('Messages', [ 'uri' => '#menus-tabs' ]);
        $settings = $tabsMenu->addChild('Settings', [ 'uri' => '#menus-tabs' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#menus-tabs' ]);
        $settings->addChild('Privacy', [ 'uri' => '#menus-tabs' ]);

        $justifiedTabsMenu = $menuFactory->createItem('root');
        $justifiedTabsMenu->addChild('Home', [ 'uri' => '#menus-tabs' ]);
        $justifiedTabsMenu->addChild('Profile', [ 'uri' => '#menus-tabs' ]);
        $justifiedTabsMenu->addChild('Messages', [ 'uri' => '#menus-tabs' ]);
        $settings = $justifiedTabsMenu->addChild('Settings', [ 'uri' => '#menus-tabs' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#menus-tabs' ])->setCurrent(true);
        $settings->addChild('Privacy', [ 'uri' => '#menus-tabs' ]);

        $stackedPillsMenu = $menuFactory->createItem('root');
        $stackedPillsMenu->addChild('Home', [ 'uri' => '#menus-pills' ])->setCurrent(true);
        $stackedPillsMenu->addChild('Profile', [ 'uri' => '#menus-pills' ]);
        $stackedPillsMenu->addChild('Messages', [ 'uri' => '#menus-pills' ]);

        $pillsMenu = $menuFactory->createItem('root');
        $pillsMenu->addChild('Home', [ 'uri' => '#menus-pills' ])->setCurrent(true);
        $pillsMenu->addChild('Profile', [ 'uri' => '#menus-pills' ]);
        $pillsMenu->addChild('Messages', [ 'uri' => '#menus-pills' ]);
        $settings = $pillsMenu->addChild('Settings', [ 'uri' => '#menus-pills' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#menus-pills' ]);
        $settings->addChild('Privacy', [ 'uri' => '#menus-pills' ]);

        $leftNavbarMenu = $menuFactory->createItem('root');
        $leftNavbarMenu->addChild('Link 1', [ 'uri' => '#navbars' ])->setCurrent(true);
        $leftNavbarMenu->addChild('Link 2', [ 'uri' => '#navbars' ]);
        $dropdown = $leftNavbarMenu->addChild('Dropdown');
        $dropdown->addChild('Action', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Another action', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Something else here', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Separated link', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('One more separated link', [ 'uri' => '#navbars' ]);

        $rightNavbarMenu = $menuFactory->createItem('root');
        $rightNavbarMenu->addChild('Link', [ 'uri' => '#navbars' ]);
        $dropdown = $rightNavbarMenu->addChild('Dropdown');
        $dropdown->addChild('Action', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Another action', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Something elese here', [ 'uri' => '#navbars' ]);
        $dropdown->addChild('Separated link', [ 'uri' => '#navbars' ]);

        $paginator  = $this->get('knp_paginator');
        $paginationPage1 = $paginator->paginate(range(1, 30), 1/*page*/, 10/*limit*/);
        $paginationPage2 = $paginator->paginate(range(1, 30), 2/*page*/, 10/*limit*/);

        $flash = $this->get('braincrafted_bootstrap.flash');
        $flash->alert('This is an alert flash message.');
        $flash->error('This is an error flash message.');
        $flash->info('This is an info flash message.');
        $flash->success('This is an success flash message.');

        return $this->render(
            'BraincraftedBootstrapDemoBundle:Documentation:components.html.twig',
            [
                'horizontalForm'    => $horizontalForm->createView(),
                'basicForm'         => $basicForm->createView(),
                'inlineForm'        => $inlineForm->createView(),
                'form'              => $form->createView(),
                'bcCollectionForm'  => $bcCollectionForm->createView(),
                'errorForm'         => $errorForm->createView(),
                'error2Form'        => $error2Form->createView(),
                'basicErrorForm'    => $basicErrorForm->createView(),
                'basicError2Form'   => $basicError2Form->createView(),
                'inlineErrorForm'   => $inlineErrorForm->createView(),
                'inlineError2Form'  => $inlineError2Form->createView(),
                'tabsMenu'          => $tabsMenu,
                'justifiedTabsMenu' => $justifiedTabsMenu,
                'pillsMenu'         => $pillsMenu,
                'stackedPillsMenu'  => $stackedPillsMenu,
                'leftNavbarMenu'    => $leftNavbarMenu,
                'rightNavbarMenu'   => $rightNavbarMenu,
                'paginationPage1'   => $paginationPage1,
                'paginationPage2'   => $paginationPage2
            ]
        );
    }
}
