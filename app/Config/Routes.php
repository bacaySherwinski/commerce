<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('products', 'ProductController::view');
$routes->get('list', 'ProductController::list');
$routes->post('/save', 'ProductController::save');
$routes->get('/delete/(:any)', 'ProductController::delete/$1');
$routes->get('/edit/(:any)', 'ProductController::edit/$1');
