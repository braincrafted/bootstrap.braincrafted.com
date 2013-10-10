<?php
/**
 * This file is part of BcBootstrapDemoBundle.
 * (c) 2012-2013 Florian Eckerstorfer
 */

namespace Bc\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        $bcCollectionForm = $this->createFormBuilder([])
            ->add(
                'hobbits',
                'bc_collection',
                [
                    'allow_add'             => true,
                    'allow_delete'          => true,
                    'add_button_text'       => 'Add Hobbit',
                    'delete_button_text'    => 'Delete Hobbit',
                    'widget_col'            => 9,
                    'button_col'            => 3
                ]
            )
            ->setData(['hobbits' => ['Frodo Baggins', 'Bilbo Baggins']])
            ->getForm();

        return $this->render(
            'BcBootstrapDemoBundle:Documentation:components.html.twig',
            [
                'horizontalForm'    => $horizontalForm->createView(),
                'form'              => $form->createView(),
                'bcCollectionForm'  => $bcCollectionForm->createView()
            ]
        );
    }
}
