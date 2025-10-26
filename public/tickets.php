<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Auth.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use TicketApp\Auth;

// Require authentication
Auth::requireAuth();

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// Get current user
$user = Auth::getCurrentUser();

// Render tickets page
echo $twig->render('tickets.twig', [
    'user' => $user
]);