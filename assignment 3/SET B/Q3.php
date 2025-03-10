<?php
// Initialize an empty queue (array)
$queue = [];

function displayMenu() {
    echo "\nQueue Operations:\n";
    echo "1. Insert (Enqueue) an element\n";
    echo "2. Delete (Dequeue) an element\n";
    echo "3. Display the queue\n";
    echo "4. Exit\n";
    echo "Enter your choice: ";
}

do {
    displayMenu();
    $choice = intval(trim(fgets(STDIN)));  // Read user input

    switch ($choice) {
        case 1:
            echo "Enter element to insert: ";
            $element = trim(fgets(STDIN));
            array_push($queue, $element); // Enqueue operation
            echo "Element '$element' inserted into the queue.\n";
            break;

        case 2:
            if (!empty($queue)) {
                $removed = array_shift($queue); // Dequeue operation
                echo "Element '$removed' deleted from the queue.\n";
            } else {
                echo "Queue is empty! Nothing to delete.\n";
            }
            break;

        case 3:
            if (!empty($queue)) {
                echo "Current Queue: ";
                print_r($queue);
            } else {
                echo "Queue is empty!\n";
            }
            break;

        case 4:
            echo "Exiting program.\n";
            break;

        default:
            echo "Invalid choice! Please enter a number between 1 and 4.\n";
    }
} while ($choice != 4);
?>
