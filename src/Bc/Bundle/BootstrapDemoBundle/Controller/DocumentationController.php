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
        $formFieldTypes = $this->createFormBuilder([])
            ->add('textField', 'text')
            ->add('textareaField', 'textarea')
            ->add('emailField', 'email')
            ->add('integerField', 'integer')
            ->add('moneyField', 'bootstrap_money')
            ->add('numberField', 'number')
            ->add('passwordField', 'password')
            ->add('percentField', 'percent')
            ->add('searchField', 'search')
            ->add('urlField', 'url')
            ->getForm();

        return $this->render(
            'BcBootstrapDemoBundle:Documentation:components.html.twig',
            [ 'formFieldTypes' => $formFieldTypes->createView() ]
        );
    }
}
