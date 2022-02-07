<?php

define('PI', 3.14159);

Class Figure {
    protected $result;
}

Class Triangle extends Figure {
    public function computeArea (float $base, float $height): float {
        $result = 0.5 * $base * $height;
        return $result;
    }
}

Class Rectangle extends Figure {
    public function computeArea (float $firstSide, float $secondSide): float {
        $result = $firstSide * $secondSide;
        return $result;
    }
}

Class Square extends Figure {
    public function computeArea (float $side): float {
        $result = $side * $side;
        return $result;
    }
}

Class Circle extends Figure {
    public function computeArea (float $radius) {
        $result = PI * $radius * $radius;
        return $result;
    }
}

$triangle = new Triangle();
$rectangle = new Rectangle();
$square = new Square();
$circle = new Circle();


echo "Triangle area: " . $triangle->computeArea(3, 7) . "<br>";
echo "Rectangle area: " . $rectangle->computeArea(3, 5) . "<br>";
echo "Square area: " . $square->computeArea(5) . "<br>";
echo "Circle area: " . $circle->computeArea(4) . "<br>";

?>
