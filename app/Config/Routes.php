<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Hewan::index');
$routes->get('/hewan', 'Hewan::index');
$routes->get('/hewan/detail/(:num)', 'Hewan::detail/$1');
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/auth', 'Admin::auth');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/create', 'Admin::create');
$routes->post('/admin/store', 'Admin::store');
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1');
$routes->get('/admin/logout', 'Admin::logout');