<?php
// Base class
class Account {
    protected $accno, $cust_name, $balance, $min_amount;
    
    public function __construct($accno, $cust_name, $balance, $min_amount) {
        $this->accno = $accno;
        $this->cust_name = $cust_name;
        $this->balance = $balance;
        $this->min_amount = $min_amount;
    }

    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited: $amount | New Balance: $this->balance\n";
    }

    public function withdraw($amount) {
        if ($this->balance - $amount >= $this->min_amount) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount | New Balance: $this->balance\n";
        } else {
            echo "Insufficient balance! Minimum required: $this->min_amount\n";
        }
    }

    public function showDetails() {
        echo "Acc No: $this->accno | Name: $this->cust_name | Balance: $this->balance\n";
    }
}

// Derived classes
class Saving_Acc extends Account { }
class Current_Acc extends Account { }

// Menu-driven program
$accounts = [];

function createAccount($type) {
    global $accounts;
    echo "Enter Account No: "; $accno = trim(fgets(STDIN));
    echo "Enter Customer Name: "; $name = trim(fgets(STDIN));
    echo "Enter Initial Balance: "; $balance = floatval(fgets(STDIN));
    $min_amount = ($type == "saving") ? 1000 : 5000;
    $accounts[$accno] = ($type == "saving") ? new Saving_Acc($accno, $name, $balance, $min_amount) : new Current_Acc($accno, $name, $balance, $min_amount);
    echo "Account Created Successfully!\n";
}

function processTransaction($accno, $action) {
    global $accounts;
    if (!isset($accounts[$accno])) {
        echo "Account Not Found!\n";
        return;
    }
    echo "Enter Amount: "; $amount = floatval(fgets(STDIN));
    ($action == "deposit") ? $accounts[$accno]->deposit($amount) : $accounts[$accno]->withdraw($amount);
}

// Main menu
while (true) {
    echo "\n1. Saving Account  2. Current Account  3. Exit\nChoice: ";
    $choice = intval(fgets(STDIN));
    if ($choice == 3) break;

    echo "\n1. Create Account  2. Deposit  3. Withdraw\nChoice: ";
    $sub_choice = intval(fgets(STDIN));
    
    if ($sub_choice == 1) createAccount($choice == 1 ? "saving" : "current");
    elseif ($sub_choice == 2 || $sub_choice == 3) {
        echo "Enter Account No: "; $accno = trim(fgets(STDIN));
        processTransaction($accno, $sub_choice == 2 ? "deposit" : "withdraw");
    }
}
?>
