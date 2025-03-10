<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h2>Factorial Calculator</h2>
    <form method="post">
        Enter a number: <input type="number" name="number" required>
        <input type="submit" value="Calculate Factorial">
    </form>

    <?php
    function factorial($n) {
        if ($n < 0) {
            return "Factorial is not defined for negative numbers.";
        }
        if ($n == 0 || $n == 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = intval($_POST["number"]);
        echo "<h3>Factorial of $num is: " . factorial($num) . "</h3>";
    }
    ?>
</body>
</html>
