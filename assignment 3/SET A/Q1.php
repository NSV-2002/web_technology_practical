<?php
// Initialize an associative array
$array = [
    "Name" => "Alice",
    "Age" => 25,
    "City" => "New York",
    "Country" => "USA"
];

function displayMenu() {
    echo "\nAssociative Array Operations:\n";
    echo "1. Display elements of the array along with keys\n";
    echo "2. Display the size of the array\n";
    echo "3. Exit\n";
    echo "Enter your choice: ";
}

do {
    displayMenu();
    $choice = intval(trim(fgets(STDIN)));  // Read user input

    switch ($choice) {
        case 1:
            echo "Array elements with keys:\n";
            foreach ($array as $key => $value) {
                echo "$key => $value\n";
            }
            break;

        case 2:
            echo "Size of the array: " . count($array) . "\n";
            break;

        case 3:
            echo "Exiting program.\n";
            break;

        default:
            echo "Invalid choice! Please enter a number between 1 and 3.\n";
    }
} while ($choice != 3);
?>
