// app/models/Budget.php
class Budget {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getBudgetData() {
        $query = "SELECT * FROM budgets";
        return $this->db->query($query);
    }

    public function addExpense($amount, $category, $date) {
        $query = "INSERT INTO expenses (amount, category, date) VALUES (:amount, :category, :date)";
        $this->db->prepare($query);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':category', $category);
        $this->db->bind(':date', $date);
        return $this->db->execute();
    }

    public function setBudget($amount, $month, $year) {
        $query = "INSERT INTO budgets (amount, month, year) VALUES (:amount, :month, :year)";
        $this->db->prepare($query);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        return $this->db->execute();
    }
}
