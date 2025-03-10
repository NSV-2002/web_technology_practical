<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
</head>
<body>
    <h2>Arithmetic Calculator</h2>
    <form method="post">
        Enter First Number: <input type="number" name="num1" required><br><br>
        Enter Second Number: <input type="number" name="num2" required><br><br>
        
        <strong>Select an Operation:</strong><br>
        <input type="radio" name="operation" value="add" checked> Addition (+)<br>
        <input type="radio" name="operation" value="subtract"> Subtraction (-)<br>
        <input type="radio" name="operation" value="multiply"> Multiplication (*)<br>
        <input type="radio" name="operation" value="divide"> Division (/)<br>
        <input type="radio" name="operation" value="modulus"> Modulus (%)<br><br>

        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    function calculate($num1, $num2, $operation = "add") {
        switch ($operation) {
            case "add":
                return $num1 + $num2;
            case "subtract":
                return $num1 - $num2;
            case "multiply":
                return $num1 * $num2;
            case "divide":
                return ($num2 != 0) ? $num1 / $num2 : "Error: Division by zero!";
            case "modulus":
                return ($num2 != 0) ? $num1 % $num2 : "Error: Modulus by zero!";
            default:
                return "Invalid Operation";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculate"])) {
        $num1 = floatval($_POST["num1"]);
        $num2 = floatval($_POST["num2"]);
        $operation = $_POST["operation"];

        $result = calculate($num1, $num2, $operation);

        echo "<h2>Calculation Result</h2>";
        echo "<p><strong>First Number:</strong> $num1</p>";
        echo "<p><strong>Second Number:</strong> $num2</p>";
        echo "<p><strong>Operation:</strong> " . ucfirst($operation) . "</p>";
        echo "<p><strong>Result:</strong> $result</p>";
    }
    ?>
</body>
</html>
