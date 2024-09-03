<?php

declare(strict_types=1);

/* EXERCISE 3

TODO: Copy the code of exercise 2 to here and delete everything related to cola.
TODO: Make all properties private.
TODO: Make all the other prints work without error.
TODO: After fixing the errors. Change the color of Duvel to light instead of blond and also print this new color on the screen after all the other things that were already printed (to be sure that the color has changed).
TODO: Create a new private method in the Beer class called beerInfo which returns "Hi i'm Duvel and have an alcochol percentage of 8.5 and I have a light color."

Make sure that you use the variables and not just this text line.

TODO: Print this method on the screen on a new line.

USE TYPEHINTING EVERYWHERE!
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

    public function changeColor(string $color) {
        $this->color = $color;
    }

    public function getColor():string {
        return $this->color;
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

    private function beerInfo() {
        $alcoholpercentage = $this->getAlcoholPercentage();
        $color = $this->getColor();
        return sprintf('Hi i\'m Duvel and have an alcochol percentage of %s and I have a %s color' . '<br />', $alcoholpercentage, $color);
    }

    public function printBeerInfo() {
        echo $this->beerInfo();
    }
}


$duvel = new Beer('blond', 3.5, 'Duvel', '8,5%');

echo 'Alcohol Percentage: ' .  $duvel->getAlcoholPercentage() . '<br />';

printf('Alcohol Percentage: %s' . '<br />', $duvel->getAlcoholPercentage());

$duvel->getInfo();

$duvel->changeColor('light');

echo $duvel->getColor() . '<br />';

$duvel->printBeerInfo();


