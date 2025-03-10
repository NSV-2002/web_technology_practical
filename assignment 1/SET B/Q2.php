<?php
$number = 153;
$sum = 0;
$temp = $number;

while ($temp != 0) {
    $digit = $temp % 10;
    $sum += $digit * $digit * $digit;
    $temp = (int)($temp / 10);
}

if ($sum == $number) {
    echo "$number is an Armstrong number.";
} else {
    echo "$number is not an Armstrong number.";
}
?>
