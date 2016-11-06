<?php
/**
 * DBShop 电子商务系统
 *
 * ==========================================================================
 * @link      http://www.dbshop.net/
 * @copyright Copyright (c) 2012-2015 DBShop.net Inc. (http://www.dbshop.net)
 * @license   http://www.dbshop.net/license.html License
 * ==========================================================================
 *
 * @author    静静的风
 *
 */

return array(
        'routes' => array(
            'stock' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/' . DBSHOP_ADMIN_DIR . '/stock',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Stock\Controller',
                        'controller'    => 'Stock',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:action]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'stock_state' => array(
                'type'    => 'Literal',
                'options' => array(
                       // Change this to something specific to your module
                        'route'    => '/' . DBSHOP_ADMIN_DIR . '/system/stock/state',
                        'defaults' => array(
                                // Change this value to reflect the namespace in which
                                // the controllers for your module are found
                                '__NAMESPACE__' => 'Stock\Controller',
                                'controller'    => 'State',
                                'action'        => 'index',
                        ),
                ), 
                'may_terminate' => true,
                'child_routes' => array(
                        // This route is a sane default when developing a module;
                        // as you solidify the routes for your module, however,
                        // you may want to remove it and replace it with more
                        // specific routes.
                        'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                        'route'    => '[/:action][/:stock_state_id]',
                                        'constraints' => array(
                                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        ),
                                        'defaults' => array(
                                        ),
                                ),
                        ),
                ),              
            )        
        )
);