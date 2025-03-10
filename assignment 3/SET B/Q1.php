<?php
// Step 1: Declare a Multidimensional Array
$array = [
    "Student1" => ["Name" => "Alice", "Age" => 22, "City" => "New York"],
    "Student2" => ["Name" => "Bob", "Age" => 24, "City" => "Los Angeles"],
    "Student3" => ["Name" => "Charlie", "Age" => 21, "City" => "Chicago"]
];

echo "Original Array:\n";
print_r($array);

// Step 2: Display a specific element
$key1 = "Student2"; 
$key2 = "City"; 

if (isset($array[$key1][$key2])) {
    echo "\nSpecific Element ($key1 -> $key2): " . $array[$key1][$key2] . "\n";
} else {
    echo "\nElement not found!\n";
}

// Step 3: Delete a given element
$deleteKey1 = "Student1";
$deleteKey2 = "Age";

if (isset($array[$deleteKey1][$deleteKey2])) {
    unset($array[$deleteKey1][$deleteKey2]);
    echo "\nElement ($deleteKey1 -> $deleteKey2) deleted successfully.\n";
} else {
    echo "\nElement not found for deletion!\n";
}

// Step 4: Display the array after deletion
echo "\nArray after deletion:\n";
print_r($array);
?>
