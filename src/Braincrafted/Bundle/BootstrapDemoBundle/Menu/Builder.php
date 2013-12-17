<?php
/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012-2013 Florian Eckerstorfer
 */

namespace Braincrafted\Bundle\BootstrapDemoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Builder
 *
 * @package    BraincraftedBootstrapDemoBundle
 * @subpackage Menu
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com BraincraftedBootstrapBundle
 */
class Builder extends ContainerAware
{
    /**
     * Builds the navbar menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function navbar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Getting started', array('route' => 'braincrafted_bootstrap_getting_started'));
        $menu->addChild('Components', array('route' => 'braincrafted_bootstrap_components'));
        $playground = $menu->addChild('Playground');
        $playground->addChild('Forms', array('route' => 'braincrafted_bootstrap_playground_forms'));

        return $menu;
    }
}
