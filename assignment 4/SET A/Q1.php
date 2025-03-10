<?php
interface Shape {
    const PI = 3.14159;
    public function area();
    public function volume();
}

class Cylinder implements Shape {
    private $r, $h;
    public function __construct($r, $h) { $this->r = $r; $this->h = $h; }
    public function area() { return 2 * self::PI * $this->r * ($this->r + $this->h); }
    public function volume() { return self::PI * $this->r ** 2 * $this->h; }
}

echo "Enter radius: "; $r = floatval(trim(fgets(STDIN)));
echo "Enter height: "; $h = floatval(trim(fgets(STDIN)));

$cyl = new Cylinder($r, $h);
echo "Surface Area: " . $cyl->area() . " sq units\n";
echo "Volume: " . $cyl->volume() . " cubic units\n";
?>
