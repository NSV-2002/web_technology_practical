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
    echo "1. Reverse the key-value pairs\n";
    echo "2. Traverse the array in random order\n";
    echo "3. Display the array\n";
    echo "4. Exit\n";
    echo "Enter your choice: ";
}

do {
    displayMenu();
    $choice = intval(trim(fgets(STDIN)));  // Read user input

    switch ($choice) {
        case 1:
            $flippedArray = array_flip($array); // Reverse key-value pairs
            echo "Reversed key-value pairs:\n";
            print_r($flippedArray);
            break;

        case 2:
            $shuffledArray = $array;
            $keys = array_keys($shuffledArray);
            shuffle($keys);
            $randomArray = [];
            foreach ($keys as $key) {
                $randomArray[$key] = $shuffledArray[$key];
            }
            echo "Array elements in random order:\n";
            print_r($randomArray);
            break;

        case 3:
            echo "Current Array:\n";
            print_r($array);
            break;

        case 4:
            echo "Exiting program.\n";
            break;

        default:
            echo "Invalid choice! Please enter a number between 1 and 4.\n";
    }
} while ($choice != 4);
?>
