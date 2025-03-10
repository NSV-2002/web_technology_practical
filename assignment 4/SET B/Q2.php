<?php
// Base class Employee
class Employee {
    private $id, $name, $department, $salary;
    
    public function __construct($id, $name, $dept, $salary) {
        $this->id = $id;
        $this->name = $name;
        $this->department = $dept;
        $this->salary = $salary;
    }

    public function getSalary() { return $this->salary; }
    public function getDetails() {
        return ["ID" => $this->id, "Name" => $this->name, "Department" => $this->department, "Salary" => $this->salary];
    }
}

// Subclass Manager
class Manager extends Employee {
    private $bonus;

    public function __construct($id, $name, $dept, $salary, $bonus) {
        parent::__construct($id, $name, $dept, $salary);
        $this->bonus = $bonus;
    }

    public function getTotalSalary() { return $this->getSalary() + $this->bonus; }
    public function getDetails() {
        $details = parent::getDetails();
        $details["Bonus"] = $this->bonus;
        $details["Total Salary"] = $this->getTotalSalary();
        return $details;
    }
}

// Create 6 Manager objects
$managers = [
    new Manager(101, "Alice", "HR", 50000, 5000),
    new Manager(102, "Bob", "Finance", 60000, 8000),
    new Manager(103, "Charlie", "IT", 55000, 7000),
    new Manager(104, "David", "Marketing", 58000, 6000),
    new Manager(105, "Eve", "Sales", 62000, 9000),
    new Manager(106, "Frank", "Admin", 59000, 7500)
];

// Find Manager with Maximum Total Salary
$maxManager = $managers[0];
foreach ($managers as $manager) {
    if ($manager->getTotalSalary() > $maxManager->getTotalSalary()) {
        $maxManager = $manager;
    }
}

// Display Manager with Maximum Total Salary
echo "Manager with Highest Salary:\n";
print_r($maxManager->getDetails());
?>
