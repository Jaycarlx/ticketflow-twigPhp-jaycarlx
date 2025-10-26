<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Auth.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use TicketApp\Auth;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $result = Auth::login($email, $password);
    
   if ($result['success']) {
    // Show success message then redirect after 1 seconds
    echo $twig->render('login.twig', [
        'message' => [
            'text' => $result['message'],
            'type' => 'success'
        ]
    ]);
    echo '<script>setTimeout(function(){ window.location.href = "dashboard.php"; }, 1000);</script>';
    exit;
} else {
        // Show error on login page
        echo $twig->render('login.twig', [
            'message' => [
                'text' => $result['message'],
                'type' => 'error'
            ]
        ]);
    }
} else {
    header('Location: login.php');
    exit;
}