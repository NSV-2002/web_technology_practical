<?php
class Employee {
    public $eno, $ename;
    public function __construct($eno, $ename) {
        $this->eno = $eno;
        $this->ename = $ename;
    }
}

class Project {
    public $pno, $pname;
    public function __construct($pno, $pname) {
        $this->pno = $pno;
        $this->pname = $pname;
    }
}

// Employee and Project objects
$employees = [
    1 => new Employee(1, "Alice"),
    2 => new Employee(2, "Bob"),
    3 => new Employee(3, "Charlie"),
];

$projects = [
    101 => new Project(101, "Website Development"),
    102 => new Project(102, "AI Research"),
];

// Many-to-Many relationship (employee_id => [project_id => no_of_hrs_worked])
$work_hours = [
    1 => [101 => 20, 102 => 15], 
    2 => [101 => 25], 
    3 => [102 => 30]
];

// Accept project name
echo "Enter Project Name: ";
$input_project = trim(fgets(STDIN));

// Find Project ID
$pno = array_search($input_project, array_column($projects, 'pname'));
if ($pno === false) {
    echo "Project not found!\n";
    exit;
}

// Display employees working on the project
echo "Employees working on '$input_project':\n";
foreach ($work_hours as $eid => $projects) {
    if (isset($projects[$pno])) {
        echo "Employee: {$employees[$eid]->ename}, Hours Worked: {$projects[$pno]}\n";
    }
}
?>
