<?php
// Define a sample class
class Sample {
    public $var1 = "Hello";
    private $var2 = "Secret";
    
    public function display() { echo "Display Method Called\n"; }
    private function hidden() { echo "Hidden Method\n"; }
}

// Create an object
$obj = new Sample();

// Introspection
echo "Class Name: " . get_class($obj) . "\n";  
echo "Class Methods: "; print_r(get_class_methods($obj));  
echo "Public Properties: "; print_r(get_object_vars($obj));  

// Check if method/property exists
echo method_exists($obj, "display") ? "Method 'display' exists\n" : "Method 'display' does not exist\n";
echo property_exists($obj, "var1") ? "Property 'var1' exists\n" : "Property 'var1' does not exist\n";

// List all declared classes
echo "Declared Classes: "; print_r(get_declared_classes());  
?>
