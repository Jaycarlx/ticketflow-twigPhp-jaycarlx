<?php
require_once __DIR__ . '/../src/Auth.php';

use TicketApp\Auth;

Auth::logout();
header('Location: index.php');
exit;