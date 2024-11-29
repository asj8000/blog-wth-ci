<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posts::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('posts', 'Posts::index');
$routes->get('posts/create', 'Posts::create');
$routes->post('posts/create', 'Posts::create');
$routes->get('posts/(:num)', 'Posts::show/$1');

$routes->post('comments/create', 'Comments::create');
