<?php
// Base class
class Teacher {
    protected $code, $name, $qualification;

    public function __construct($code, $name, $qualification) {
        $this->code = $code;
        $this->name = $name;
        $this->qualification = $qualification;
    }

    public function getDetails() {
        return ["Code" => $this->code, "Name" => $this->name, "Qualification" => $this->qualification];
    }
}

// Derived class - Teach_Account
class Teach_Account extends Teacher {
    protected $account_no, $joining_date;

    public function __construct($code, $name, $qualification, $account_no, $joining_date) {
        parent::__construct($code, $name, $qualification);
        $this->account_no = $account_no;
        $this->joining_date = $joining_date;
    }

    public function getAccountDetails() {
        return array_merge($this->getDetails(), ["Account No" => $this->account_no, "Joining Date" => $this->joining_date]);
    }
}

// Derived class - Teach_Sal
class Teach_Sal extends Teach_Account {
    private $basic_pay, $earnings, $deduction;

    public function __construct($code, $name, $qualification, $account_no, $joining_date, $basic_pay, $earnings, $deduction) {
        parent::__construct($code, $name, $qualification, $account_no, $joining_date);
        $this->basic_pay = $basic_pay;
        $this->earnings = $earnings;
        $this->deduction = $deduction;
    }

    public function calculateSalary() {
        return $this->basic_pay + $this->earnings - $this->deduction;
    }

    public function getFullDetails() {
        return array_merge($this->getAccountDetails(), ["Basic Pay" => $this->basic_pay, "Earnings" => $this->earnings, "Deductions" => $this->deduction, "Net Salary" => $this->calculateSalary()]);
    }
}

// Menu-driven program
$teachers = [];

function displayMenu() {
    echo "\nMenu:\n";
    echo "1. Build Master Table\n";
    echo "2. Sort Entries\n";
    echo "3. Search an Entry\n";
    echo "4. Display Salary of All Teachers\n";
    echo "5. Exit\n";
    echo "Enter your choice: ";
}

do {
    displayMenu();
    $choice = intval(trim(fgets(STDIN)));

    switch ($choice) {
        case 1: // Build Master Table
            echo "Enter Teacher Code: ";
            $code = trim(fgets(STDIN));

            echo "Enter Name: ";
            $name = trim(fgets(STDIN));

            echo "Enter Qualification: ";
            $qualification = trim(fgets(STDIN));

            echo "Enter Account Number: ";
            $account_no = trim(fgets(STDIN));

            echo "Enter Joining Date: ";
            $joining_date = trim(fgets(STDIN));

            echo "Enter Basic Pay: ";
            $basic_pay = floatval(trim(fgets(STDIN)));

            echo "Enter Earnings: ";
            $earnings = floatval(trim(fgets(STDIN)));

            echo "Enter Deduction: ";
            $deduction = floatval(trim(fgets(STDIN)));

            $teachers[] = new Teach_Sal($code, $name, $qualification, $account_no, $joining_date, $basic_pay, $earnings, $deduction);
            echo "Teacher record added successfully!\n";
            break;

        case 2: // Sort Entries
            usort($teachers, function($a, $b) {
                return strcmp($a->getDetails()["Name"], $b->getDetails()["Name"]);
            });
            echo "Teachers sorted by name.\n";
            break;

        case 3: // Search an Entry
            echo "Enter Teacher Code to Search: ";
            $searchCode = trim(fgets(STDIN));
            $found = false;
            foreach ($teachers as $teacher) {
                if ($teacher->getDetails()["Code"] == $searchCode) {
                    print_r($teacher->getFullDetails());
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                echo "Teacher with Code $searchCode not found.\n";
            }
            break;

        case 4: // Display Salary of All Teachers
            if (empty($teachers)) {
                echo "No teacher records available.\n";
            } else {
                foreach ($teachers as $teacher) {
                    echo "Name: " . $teacher->getDetails()["Name"] . ", Net Salary: " . $teacher->calculateSalary() . "\n";
                }
            }
            break;

        case 5:
            echo "Exiting the program.\n";
            break;

        default:
            echo "Invalid choice! Please enter a number between 1 and 5.\n";
    }
} while ($choice != 5);
?>
