<?php
class SalesOrder {
    public $sonumber, $s_order_date;
    public function __construct($sonumber, $s_order_date) {
        $this->sonumber = $sonumber;
        $this->s_order_date = $s_order_date;
    }
}

class Client {
    public $clientno, $name, $orders = [];
    public function __construct($clientno, $name) {
        $this->clientno = $clientno;
        $this->name = $name;
    }
    public function addOrder($sonumber, $date) {
        $this->orders[] = new SalesOrder($sonumber, $date);
    }
}

// Clients and their orders
$clients = [
    (new Client(101, "Alice"))->addOrder(1, "2024-02-15") ?? (new Client(101, "Alice"))->addOrder(2, "2024-03-10"),
    (new Client(102, "Bob"))->addOrder(3, "2024-01-25") ?? (new Client(102, "Bob"))->addOrder(4, "2024-03-05")
];

// Accept user input
echo "Enter a date (YYYY-MM-DD): "; $input_date = trim(fgets(STDIN));

// Display orders before the given date
echo "Sales Orders before $input_date:\n";
foreach ($clients as $client) {
    foreach ($client->orders as $order) {
        if ($order->s_order_date < $input_date) {
            echo "Order No: $order->sonumber, Client: $client->name, Date: $order->s_order_date\n";
        }
    }
}
?>
