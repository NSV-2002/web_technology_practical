<!DOCTYPE html>
<html>
<head>
    <title>Reverse a String</title>
</head>
<body>
    <h2>Reverse a String</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required>
        <input type="submit" value="Reverse String">
    </form>

    <?php
    function reverseString($str) {
        return strrev($str);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST["inputString"];
        echo "<h3>Reversed String: " . reverseString($string) . "</h3>";
    }
    ?>
</body>
</html>
