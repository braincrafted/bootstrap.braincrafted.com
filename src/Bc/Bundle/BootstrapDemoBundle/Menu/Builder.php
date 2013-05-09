<?php

/**
 * This file is part of BraincraftedBootstrapDemoBundle.
 * (c) 2012 Florian Eckerstorfer
 */

namespace Bc\Bundle\BootstrapDemoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Builder
 *
 * @category   MenuBuilder
 * @package    BraincraftedBootstrapBundle
 * @subpackage Menu
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @link       http://bootstrap.braincrafted.com Bootstrap for Symfony2
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

        $menu->addChild('Home', array('route' => 'bc_bootstrap_demo_index'));
        $menu->addChild('Get started', array('route' => 'bc_bootstrap_demo_gettingStarted'));

        $menu->addChild('Forms', array('route' => 'bc_bootstrap_demo_components_forms'));
        $menu->addChild('Navs', array('route' => 'bc_bootstrap_demo_components_navs'));
        $menu->addChild('Navbar', array('route' => 'bc_bootstrap_demo_components_navbar'));
        $menu->addChild('Pagination', array('route' => 'bc_bootstrap_demo_components_pagination'));
        $menu->addChild('Flash Messages', array('route' => 'bc_bootstrap_demo_components_flash'));
        $menu->addChild('Labels and badges', array('route' => 'bc_bootstrap_demo_components_labels'));
        $menu->addChild('Icons', array('route' => 'bc_bootstrap_demo_components_icons'));

        return $menu;
    }

    /**
     * Builds the navList menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function navList(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('List Header');
        $item->addChild('Home', array('uri' => '#'));
        $item->addChild('Library', array('uri' => '#'));
        $item->addChild('Applications', array('uri' => '#'));
        $item = $menu->addChild('Another List Header');
        $item->addChild('Profile', array('uri' => '#'));
        $item->addChild('Settings', array('uri' => '#'));
        $menu->addChild('d1', array('attributes' => array('divider' => true)));
        $menu->addChild('Help', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the navListIcons menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function navListIcons(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('List Header');
        $item->addChild('.icon-home Home', array('uri' => '#'));
        $item->addChild('.icon-book Library', array('uri' => '#'));
        $item->addChild('.icon-briefcase Applications', array('uri' => '#'));
        $item = $menu->addChild('Another List Header');
        $item->addChild('.icon-user Profile', array('uri' => '#'));
        $item->addChild('.icon-cog Settings', array('uri' => '#'));
        $menu->addChild('d1', array('attributes' => array('divider' => true)));
        $menu->addChild('.icon-question-sign Help', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the basic tabs menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function basicTabs(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('Profile', array('uri' => '#'));
        $item = $menu->addChild('Messages', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the basic pills menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function basicPills(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('Profile', array('uri' => '#'));
        $item = $menu->addChild('Messages', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the disabled state menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function disabledState(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Clickable link 1', array('uri' => '#'));
        $item = $menu->addChild('Clickable link 2', array('uri' => '#'));
        $item = $menu->addChild('Disabled link', array(
            'uri'           => '#',
            'attributes'    => array('class' => 'disabled')
        ));

        return $menu;
    }

    /**
     * Builds the pull right menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function pullRight(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Link 1', array('uri' => '#'));
        $item = $menu->addChild('Link 2', array('uri' => '#'));
        $item = $menu->addChild('Link 3', array(
            'uri'           => '#',
            'attributes'    => array('class' => 'pull-right')
        ));

        return $menu;
    }

    /**
     * Builds the stacked tabs menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function stackedTabs(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('Profile', array('uri' => '#'));
        $item = $menu->addChild('Messages', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the stacked pills menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function stackedPills(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'bc_bootstrap_demo_components'));
        $menu->addChild('Profile', array('route' => 'bc_bootstrap_demo_index'));
        $menu->addChild('Messages', array('route' => 'bc_bootstrap_demo_index'));

        return $menu;
    }

    /**
     * Builds the tabs with dropdown menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function tabsDropdown(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('Help', array('uri' => '#'));
        $dropdown = $menu->addChild('Dropdown');
            $dropdown->addChild('Action', array('uri' => '#'));
            $dropdown->addChild('Another action', array('uri' => '#'));
            $dropdown->addChild('Something else here', array('uri' => '#'));
            $dropdown->addChild('d1', array('attributes' => array('divider' => true)));
            $dropdown->addChild('Separated link', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the pills with dropdown menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function pillsDropdown(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'bc_bootstrap_demo_components'));
        $menu->addChild('Help', array('route' => 'bc_bootstrap_demo_index'));
        $dropdown = $menu->addChild('Dropdown');
            $dropdown->addChild('Action', array('route' => 'bc_bootstrap_demo_index'));
            $dropdown->addChild('Another action', array('route' => 'BraincraftedBootstrapDemoBundle_overview'));
            $dropdown->addChild('Something else here', array('route' => 'BraincraftedBootstrapDemoBundle_overview'));
            $dropdown->addChild('d1', array('attributes' => array('divider' => true)));
            $dropdown->addChild('Separated link', array('route' => 'BraincraftedBootstrapDemoBundle_overview'));

        return $menu;
    }

    /**
     * Builds the basic navbar menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function basicNavbar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('Link 1', array('uri' => '#'));
        $item = $menu->addChild('Link 2', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the navbar with divider menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function dividerNavbar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $item = $menu->addChild('d1', array('attributes' => array('divider' => true)));
        $item = $menu->addChild('Link 1', array('uri' => '#'));
        $item = $menu->addChild('d2', array('attributes' => array('divider' => true)));
        $item = $menu->addChild('Link 2', array('uri' => '#'));

        return $menu;
    }

    /**
     * Builds the responsive navbar menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function responsiveNavbar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('uri' => '#'));
        $item->setCurrent(true);
        $menu->addChild('Link 1', array('uri' => '#'));
        $menu->addChild('Link 2', array('uri' => '#'));
        $dropdown = $menu->addChild('Dropdown');
        $dropdown->addChild('Action', array('uri' => '#'));
        $dropdown->addChild('Another action', array('uri' => '#'));
        $dropdown->addChild('Something else here', array('uri' => '#'));
        $dropdown->addChild('d1', array('attributes' => array('divider' => true)));
        $subDropdown = $dropdown->addChild('Nav header');
        $subDropdown->addChild('Separated link', array('uri' => '#'));
        $subDropdown->addChild('One more separated link', array('uri' => '#'));


        return $menu;
    }

    /**
     * Builds the right responsive navbar menu.
     *
     * @param \Knp\Menu\FactoryInterface $factory The menu factory
     * @param array                      $options The options array
     *
     * @return \Knp\Menu\ItemInterface The root item
     */
    public function responsiveNavbarRight(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Link', array('uri' => '#'));
        $menu->addChild('d1', array('attributes' => array('divider' => true)));
        $dropdown = $menu->addChild('Dropdown');
        $dropdown->addChild('Action', array('uri' => '#'));
        $dropdown->addChild('Another action', array('uri' => '#'));
        $dropdown->addChild('Something else here', array('uri' => '#'));
        $dropdown->addChild('d1', array('attributes' => array('divider' => true)));
        $dropdown->addChild('Separated link', array('uri' => '#'));

        return $menu;
    }
}
