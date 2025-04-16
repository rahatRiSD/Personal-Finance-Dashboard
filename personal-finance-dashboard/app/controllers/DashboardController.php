// app/controllers/DashboardController.php
require_once 'app/models/Budget.php';
// app/controllers/DashboardController.php
require_once 'app/models/Budget.php';

class DashboardController extends Controller {
    public function index() {
        // Checking if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $budgetModel = new Budget();
        $budgetData = $budgetModel->getBudgetData();
        
        $this->loadView('dashboard', ['budgetData' => $budgetData]);
    }

    // Method to log in a user (dummy example)
    public function login() {
        if ($_POST) {
            // Simulating user validation (use actual validation logic here)
            if ($_POST['username'] == 'user' && $_POST['password'] == 'password') {
                $_SESSION['user_id'] = 1; // Save user ID in session
                header("Location: /");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid credentials';
            }
        }

        $this->loadView('login');
    }

    // Log out
    public function logout() {
        session_destroy();  // Destroy the session
        header("Location: /login");
        exit();
    }
}
// app/controllers/DashboardController.php
class DashboardController extends Controller {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $budgetModel = new Budget();
        $budgetData = $budgetModel->getBudgetData();
        $this->loadView('dashboard', ['budgetData' => $budgetData]);
    }

    public function login() {
        if ($_POST) {
            if ($_POST['username'] == 'user' && $_POST['password'] == 'password') {
                $_SESSION['user_id'] = 1;
                header("Location: /");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid credentials';
            }
        }
        $this->loadView('login');
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }

    public function setTheme() {
        if (isset($_POST['theme'])) {
            setcookie('theme', $_POST['theme'], time() + (86400 * 30), "/");
            header("Location: /");
            exit();
        }
    }
}
