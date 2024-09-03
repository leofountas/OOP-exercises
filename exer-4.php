<?php

declare(strict_types=1);

/* EXERCISE 4

Copy the code of exercise 3 to here and delete everything related to cola.

TODO: Make all properties protected.
TODO: Make all the other prints work without error without changing the beverage class.
TODO: Don't call getters in de child class.

USE TYPEHINTING EVERYWHERE!
*/

class Beverage 
{
    protected string $color;
    protected float $price;
    protected string $temperature;

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
    protected string $name;
    protected string $alcoholpercentage;


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
        //  removed the getters cause thx to the protected proprieties we can access them normally also in child class
        return sprintf('Hi i\'m %s and have an alcochol percentage of %s and I have a %s color' . '<br />', $this->name, $this->alcoholpercentage, $this->color);
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


