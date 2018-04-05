<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Game' => [ // Controller
        ['index', '/', 'GET'], // HOME PAGE
        ['play', '/play', ['GET','POST']], // HOME PAGE
        ['end', '/end', 'GET'], // END PAGE
    ],
];