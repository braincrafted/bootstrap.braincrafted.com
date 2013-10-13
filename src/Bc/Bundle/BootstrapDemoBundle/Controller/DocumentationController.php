<?php
/**
 * This file is part of BcBootstrapDemoBundle.
 * (c) 2012-2013 Florian Eckerstorfer
 */

namespace Bc\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bc\Bundle\BootstrapDemoBundle\Entity\DemoUser;

/**
 * DocumentationController
 *
 * @package    BcBootstrapDemoBundle
 * @subpackage Controller
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2013 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com BcBootstrapBundle
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
        return $this->redirect($this->generateUrl('bc_bootstrap_index'));
    }

    /**
     * Index action, renders the homepage.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('BcBootstrapDemoBundle:Documentation:index.html.twig');
    }

    /**
     * Renders the installation guide.
     *
     * @return Symfony\Component\HttpFoundation\Response
     *
     */
    public function gettingStartedAction()
    {
        return $this->render('BcBootstrapDemoBundle:Documentation:getting-started.html.twig');
    }

    /**
     * Renders information about the components included in BcBootstrapBundle.
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

        $form = $this->createFormBuilder([])
            ->add('firstName', 'text')
            ->getForm();

        $demoUser = new DemoUser;
        $demoUser->setFavoriteHobbits(['', '']);
        $errorForm = $this->createFormBuilder($demoUser, [ 'csrf_protection' => false ])
            ->add('username', 'text', [ 'required' => true ])
            ->add('favoriteHobbits', 'bc_collection', [ 'required' => true ])
            ->add('birthday', 'birthday', [ 'required' => true ])
            ->add('gender', 'choice', [ 'choices' => [ 'female', 'male' ], 'expanded' => true, 'multiple' => true, 'required' => true ])
            ->getForm();
        $errorForm->submit([]);

        $error2Form = $this->createFormBuilder([])
            ->add('username', 'text', [ 'required' => true ])
            ->getForm();
        $error2Form->submit([]);

        $bcCollectionForm = $this->createFormBuilder([])
            ->add(
                'hobbits',
                'bc_collection',
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
        $tabsMenu->addChild('Home', [ 'uri' => '#' ])->setCurrent(true);
        $tabsMenu->addChild('Profile', [ 'uri' => '#' ]);
        $tabsMenu->addChild('Messages', [ 'uri' => '#' ]);
        $settings = $tabsMenu->addChild('Settings', [ 'uri' => '#' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#' ]);
        $settings->addChild('Privacy', [ 'uri' => '#' ]);

        $justifiedTabsMenu = $menuFactory->createItem('root');
        $justifiedTabsMenu->addChild('Home', [ 'uri' => '#' ]);
        $justifiedTabsMenu->addChild('Profile', [ 'uri' => '#' ]);
        $justifiedTabsMenu->addChild('Messages', [ 'uri' => '#' ]);
        $settings = $justifiedTabsMenu->addChild('Settings', [ 'uri' => '#' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#' ])->setCurrent(true);
        $settings->addChild('Privacy', [ 'uri' => '#' ]);

        $stackedPillsMenu = $menuFactory->createItem('root');
        $stackedPillsMenu->addChild('Home', [ 'uri' => '#' ])->setCurrent(true);
        $stackedPillsMenu->addChild('Profile', [ 'uri' => '#' ]);
        $stackedPillsMenu->addChild('Messages', [ 'uri' => '#' ]);

        $pillsMenu = $menuFactory->createItem('root');
        $pillsMenu->addChild('Home', [ 'uri' => '#' ])->setCurrent(true);
        $pillsMenu->addChild('Profile', [ 'uri' => '#' ]);
        $pillsMenu->addChild('Messages', [ 'uri' => '#' ]);
        $settings = $pillsMenu->addChild('Settings', [ 'uri' => '#' ]);
        $settings->addChild('Edit Profile', [ 'uri' => '#' ]);
        $settings->addChild('Privacy', [ 'uri' => '#' ]);

        return $this->render(
            'BcBootstrapDemoBundle:Documentation:components.html.twig',
            [
                'horizontalForm'    => $horizontalForm->createView(),
                'form'              => $form->createView(),
                'bcCollectionForm'  => $bcCollectionForm->createView(),
                'errorForm'         => $errorForm->createView(),
                'error2Form'        => $error2Form->createView(),
                'tabsMenu'          => $tabsMenu,
                'justifiedTabsMenu' => $justifiedTabsMenu,
                'pillsMenu'         => $pillsMenu,
                'stackedPillsMenu'  => $stackedPillsMenu
            ]
        );
    }
}
