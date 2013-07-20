<?php

namespace Bc\Bundle\BootstrapDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DocumentationController extends Controller
{
    public function indexAction()
    {
        return $this->render('BcBootstrapDemoBundle:Documentation:index.html.twig');
    }

    public function installationAction()
    {
        return $this->render('BcBootstrapDemoBundle:Documentation:installation.html.twig');
    }

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
            ->getForm();

        $form = $this->createFormBuilder([])
            ->add('firstName', 'text')
            ->getForm();

        return $this->render(
            'BcBootstrapDemoBundle:Documentation:components.html.twig',
            [
                'horizontalForm'    => $horizontalForm->createView(),
                'form'              => $form->createView()
            ]
        );
    }
}
