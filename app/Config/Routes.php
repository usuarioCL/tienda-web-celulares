<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas de prueba
$routes->get('/test', 'TestController::index');
$routes->get('/test/celulares', 'TestController::celulares');

$routes->get('/celulares', 'CelularController::index');
$routes->post('/celulares/create', 'CelularController::create');
$routes->put('/celulares/update/(:num)', 'CelularController::update/$1');
$routes->delete('/celulares/delete/(:num)', 'CelularController::delete/$1');
