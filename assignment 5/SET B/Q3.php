<?php
class Doctor {
    public $doc_no, $doc_name, $experience, $city, $area;
    public function __construct($doc_no, $doc_name, $experience, $city, $area) {
        $this->doc_no = $doc_no;
        $this->doc_name = $doc_name;
        $this->experience = $experience;
        $this->city = $city;
        $this->area = $area;
    }
}

// Sample doctor data
$doctors = [
    new Doctor(1, "Dr. A", 5, "Delhi", "South"),
    new Doctor(2, "Dr. B", 10, "Pune", "West"),
    new Doctor(3, "Dr. C", 3, "Kolkata", "East"),
    new Doctor(4, "Dr. D", 7, "Chennai", "North")
];

// Accept experience threshold from user
echo "Enter experience value: ";
$input_experience = (int) trim(fgets(STDIN));

// Update city to Mumbai if experience is less than input value
foreach ($doctors as $doctor) {
    if ($doctor->experience < $input_experience) {
        $doctor->city = "Mumbai";
    }
}

// Display updated doctor records
echo "Updated Doctor List:\n";
foreach ($doctors as $doctor) {
    echo "Doc No: $doctor->doc_no, Name: $doctor->doc_name, Experience: $doctor->experience, City: $doctor->city\n";
}
?>
