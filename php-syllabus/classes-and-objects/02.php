<?php


class Point{

    private int $x;

    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;

        $this->y = $y;

    }

    public static function swap_points(Point $p1, Point $p2): void
    {

        $pswap = new Point(0,0);
        $pswap->x = $p1->x;
        $pswap->y = $p1->y;

        $p1->y = $p2->y;
        $p1->x = $p2->x;

        $p2->y = $pswap->y;
        $p2->x = $pswap->x;

    }

    public function getX(): int{
        return $this->x;
    }

    public function getY(): int{
        return $this->y;
    }


}


$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);


Point::swap_points($p1, $p2);


echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")" . PHP_EOL;