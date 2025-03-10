<?php
class Owner {
    public $name, $properties = [];
    public function __construct($name) { $this->name = $name; }
    public function addProperty($pno, $desc, $area) { $this->properties[] = "No: $pno, $desc, $area sq.ft"; }
}

$owners = [
    "Alice" => (new Owner("Alice"))->addProperty(1, "3BHK Apartment", 1500) ?? (new Owner("Alice"))->addProperty(2, "Villa", 3000),
    "Bob" => (new Owner("Bob"))->addProperty(3, "Office Space", 2000) ?? (new Owner("Bob"))->addProperty(4, "Shop", 1000)
];

echo "Enter Owner Name: "; $name = trim(fgets(STDIN));
echo isset($owners[$name]) ? "Properties owned by $name:\n" . implode("\n", $owners[$name]->properties) : "Owner not found!\n";
?>
    