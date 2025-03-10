<!DOCTYPE html>
<html>
<head>
    <title>Vowel Counter</title>
</head>
<body>
    <h2>Vowel Counter</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required>
        <input type="submit" value="Count Vowels">
    </form>

    <?php
    function countVowels($str) {
        $vowels = array('a', 'e', 'i', 'o', 'u');
        $count = 0;
        $occurrences = array("a" => 0, "e" => 0, "i" => 0, "o" => 0, "u" => 0);
        
        $lowerStr = strtolower($str);
        
        for ($i = 0; $i < strlen($lowerStr); $i++) {
            if (in_array($lowerStr[$i], $vowels)) {
                $count++;
                $occurrences[$lowerStr[$i]]++;
            }
        }

        return array($count, $occurrences);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST["inputString"];
        list($totalVowels, $vowelCounts) = countVowels($string);
        
        echo "<h3>Total Number of Vowels: $totalVowels</h3>";
        echo "<h3>Occurrences of Each Vowel:</h3>";
        foreach ($vowelCounts as $vowel => $count) {
            echo "<p>$vowel: $count</p>";
        }
    }
    ?>
</body>
</html>
