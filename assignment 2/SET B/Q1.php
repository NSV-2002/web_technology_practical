<!DOCTYPE html>
<html>
<head>
    <title>Number to Words</title>
</head>
<body>
    <h2>Convert Number to Words</h2>
    <form method="post">
        Enter a number: <input type="number" name="number" required>
        <input type="submit" value="Convert to Words">
    </form>

    <?php
    function numberToWords($num) {
        $words = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
        $numStr = strval($num);
        $wordOutput = "";

        for ($i = 0; $i < strlen($numStr); $i++) {
            $wordOutput .= $words[$numStr[$i]] . " ";
        }

        return trim($wordOutput);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = intval($_POST["number"]);
        echo "<h3>Number in Words: " . numberToWords($number) . "</h3>";
    }
    ?>
</body>
</html>
