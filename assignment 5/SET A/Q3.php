<?php
class Employee {
    public $eno, $ename, $edesignation, $esalary, $dept;
    public function __construct($eno, $ename, $edesignation, $esalary, $dept) {
        $this->eno = $eno;
        $this->ename = $ename;
        $this->edesignation = $edesignation;
        $this->esalary = $esalary;
        $this->dept = $dept;
    }
}

// Employees list
$employees = [
    new Employee(1, "Alice", "Manager", 60000, "HR"),
    new Employee(2, "Bob", "Analyst", 50000, "IT"),
    new Employee(3, "Charlie", "Clerk", 40000, "Finance"),
    new Employee(4, "David", "Developer", 55000, "IT"),
    new Employee(5, "Eve", "HR Assistant", 45000, "HR")
];

// Accept department name
echo "Enter Department Name: ";
$input_dept = trim(fgets(STDIN));

// Count employees in the given department
$count = count(array_filter($employees, fn($emp) => strcasecmp($emp->dept, $input_dept) == 0));
echo "Employees in $input_dept: $count\n";
?>
