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
        $moneyForm = $this->createFormBuilder([])
            ->add('priceEuro', 'bootstrap_money', ['label' => 'Price', 'currency' => 'EUR'])
            ->add('priceDollar', 'bootstrap_money', ['label' => 'Price', 'currency' => 'USD'])
            ->getForm();

        return $this->render(
            'BcBootstrapDemoBundle:Documentation:components.html.twig',
            [ 'moneyForm' => $moneyForm->createView() ]
        );
    }
}
