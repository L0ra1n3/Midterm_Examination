<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
    
// Public pages
$routes->get('/', 'Home::index');   
$routes->get('/about', 'Home::about');  
$routes->get('/contact', 'Home::contact');
$routes->get('/announcements', 'Announcement::index');

// Auth routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('logout', 'Auth::logout');

// Dashboard
$routes->get('dashboard', 'Auth::dashboard'); // unified dashboard route

// Course enrollment (AJAX)
$routes->post('course/enroll', 'Course::enroll');

// Student pages
$routes->get('student/courses', 'Student::myCourses');
$routes->get('student/assignments', 'Student::assignments');

// Admin pages (protected) - routes for announcements CRUD will be added next
