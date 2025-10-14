<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/celulares', 'CelularController::index');
$routes->post('/celulares/create', 'CelularController::create');
$routes->put('/celulares/update/(:num)', 'CelularController::update/$1');
$routes->delete('/celulares/delete/(:num)', 'CelularController::delete/$1');
