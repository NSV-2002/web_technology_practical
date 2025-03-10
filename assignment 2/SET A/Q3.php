<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
</head>
<body>
    <h2>Palindrome Checker</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required>
        <input type="submit" value="Check Palindrome">
    </form>

    <?php
    function isPalindrome($str) {
        $cleanedStr = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str)); // Remove spaces and special characters
        return $cleanedStr === strrev($cleanedStr);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST["inputString"];
        if (isPalindrome($string)) {
            echo "<h3>'$string' is a Palindrome.</h3>";
        } else {
            echo "<h3>'$string' is NOT a Palindrome.</h3>";
        }
    }
    ?>
</body>
</html>
