<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Auth.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use TicketApp\Auth;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// Check if already logged in
if (Auth::isAuthenticated()) {
    header('Location: dashboard.php');
    exit;
}

// Render signup page
echo $twig->render('signup.twig');