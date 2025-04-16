// public/index.php
session_start(); // Start the session
require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/models/Budget.php';
require_once '../app/core/Router.php';
require_once '../app/core/Request.php';     