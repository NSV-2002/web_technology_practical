<!DOCTYPE html>
<html>
<head>
    <title>Calculate Area of Shapes</title>
</head>
<body>
    <h2>Select a Shape to Calculate Area</h2>
    <form method="post">
        <input type="radio" name="shape" value="triangle" required> Triangle<br>
        <input type="radio" name="shape" value="square"> Square<br>
        <input type="radio" name="shape" value="rectangle"> Rectangle<br>
        <input type="radio" name="shape" value="circle"> Circle<br><br>
        
        Enter First Value: <input type="number" name="val1" step="0.01" required><br><br>
        Enter Second Value (if applicable): <input type="number" name="val2" step="0.01"><br><br>

        <input type="submit" name="submit" value="Calculate Area">
    </form>

    <?php
    // Base class
    class Shape {
        protected $val1, $val2;
        public function __construct($val1, $val2 = 0) {
            $this->val1 = $val1;
            $this->val2 = $val2;
        }
        public function area() {
            return 0; // Default implementation
        }
    }

    // Subclasses
    class Triangle extends Shape {
        public function area() { return 0.5 * $this->val1 * $this->val2; }
    }

    class Square extends Shape {
        public function area() { return $this->val1 * $this->val1; }
    }

    class Rectangle extends Shape {
        public function area() { return $this->val1 * $this->val2; }
    }

    class Circle extends Shape {
        const PI = 3.14159;
        public function area() { return self::PI * $this->val1 * $this->val1; }
    }

    // Handle form submission
    if (isset($_POST['submit'])) {
        $shapeType = $_POST['shape'];
        $val1 = floatval($_POST['val1']);
        $val2 = isset($_POST['val2']) ? floatval($_POST['val2']) : 0;

        switch ($shapeType) {
            case "triangle": $shape = new Triangle($val1, $val2); break;
            case "square": $shape = new Square($val1); break;
            case "rectangle": $shape = new Rectangle($val1, $val2); break;
            case "circle": $shape = new Circle($val1); break;
            default: $shape = null;
        }

        if ($shape) {
            echo "<h3>Area of $shapeType: " . $shape->area() . " square units</h3>";
        }
    }
    ?>
</body>
</html>
