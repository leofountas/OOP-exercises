<?php

declare(strict_types=1);

/* EXERCISE 5

Copy the class of exercise 1.

TODO: Change the properties to private.
TODO: Fix the errors without using getter and setter functions.
TODO: Change the price to 3.5 euro and print it also on the screen on a new line.
*/

class Beverage 
{
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

    public function setPrice(float $price) {
        $this->price = $price;
    }

    public function getPrice() {
        echo $this->price . ' euro' . '<br />';
    }
}


$cola = new Beverage('black', 2.00);

$cola->getInfo();

$cola->setPrice(3.5);

$cola->getPrice();
