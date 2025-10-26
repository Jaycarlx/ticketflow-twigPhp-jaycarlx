<?php
namespace TicketApp;

class Auth {
    
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function isAuthenticated() {
        self::startSession();
        return isset($_SESSION['ticketapp_user']);
    }
    
    public static function login($email, $password) {
        // Validate inputs
        if (empty($email) || empty($password)) {
            return ['success' => false, 'message' => 'Email and password are required'];
        }
        
        if (strlen($password) < 6) {
            return ['success' => false, 'message' => 'Password must be at least 6 characters'];
        }
        
        // Create session
        self::startSession();
        $_SESSION['ticketapp_user'] = ['email' => $email];
        $_SESSION['ticketapp_session'] = true;
        
        return ['success' => true, 'message' => 'Login successful!'];
    }
    
    public static function signup($email, $password, $confirmPassword) {
        // Validate inputs
        if (empty($email) || empty($password) || empty($confirmPassword)) {
            return ['success' => false, 'message' => 'All fields are required'];
        }
        
        if (strlen($password) < 6) {
            return ['success' => false, 'message' => 'Password must be at least 6 characters'];
        }
        
        if ($password !== $confirmPassword) {
            return ['success' => false, 'message' => 'Passwords do not match'];
        }
        
        // Create session
        self::startSession();
        $_SESSION['ticketapp_user'] = ['email' => $email];
        $_SESSION['ticketapp_session'] = true;
        
        return ['success' => true, 'message' => 'Account created successfully!'];
    }
    
    public static function logout() {
        self::startSession();
        session_destroy();
    }
    
    public static function getCurrentUser() {
        self::startSession();
        return $_SESSION['ticketapp_user'] ?? null;
    }
    
    public static function requireAuth() {
        if (!self::isAuthenticated()) {
            header('Location: login.php');
            exit;
        }
    }
}