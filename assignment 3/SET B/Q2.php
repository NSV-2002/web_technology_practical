<?php
// Initialize an empty stack (array)
$stack = [];

function displayMenu() {
    echo "\nStack Operations:\n";
    echo "1. Insert (Push) an element\n";
    echo "2. Delete (Pop) an element\n";
    echo "3. Display the stack\n";
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
            array_push($stack, $element);
            echo "Element '$element' inserted into the stack.\n";
            break;

        case 2:
            if (!empty($stack)) {
                $popped = array_pop($stack);
                echo "Element '$popped' deleted from the stack.\n";
            } else {
                echo "Stack is empty! Nothing to delete.\n";
            }
            break;

        case 3:
            if (!empty($stack)) {
                echo "Current Stack: ";
                print_r(array_reverse($stack)); // Display stack in top-to-bottom order
            } else {
                echo "Stack is empty!\n";
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
