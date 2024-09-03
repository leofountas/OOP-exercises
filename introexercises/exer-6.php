<?php

declare(strict_types=1);

/* EXERCISE 6

Copy the classes of exercise 2.

TODO: Change the properties to private.
TODO: Make a const barname with the value 'Het Vervolg'.
TODO: Print the constant on the screen.
TODO: Create a function in beverage and use the constant.
TODO: Do the same in the beer class.
TODO: Print the output of these functions on the screen.
TODO: Make sure that every print is on a new line.

Use typehinting everywhere!
*/


class Beverage 
{
    protected const BARNAME = 'Het Vervolg';
    private string $color;
    private float $price;
    private string $temperature;

    public function __construct(string $color, float $price)
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = 'cold';
    }

    public function getInfo() {
        $temperature = $this->temperature;
        $color = $this->color;
        echo sprintf('This beverage is %s and %s.' . '<br />', $temperature, $color);
    }

    public static function printBarname() {
        echo self::BARNAME . '<br />';
    }
}


class Beer extends Beverage 
{
    private string $name;
    private string $alcoholpercentage;


    public function __construct(string $color, float $price, string $name, string $alcoholpercentage)
    {
        parent::__construct($color, $price);
        $this->name = $name;
        $this->alcoholpercentage = $alcoholpercentage;
    }

    public function getAlcoholPercentage():string {
        return $this->alcoholpercentage;
    }

    public static function whereBuy() {
      echo sprintf('You can buy this Beer at %s', parent::BARNAME);
    }
}



Beverage::printBarname();
Beer::printBarname();

Beer::whereBuy();