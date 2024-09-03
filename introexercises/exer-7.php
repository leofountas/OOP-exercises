<?php

declare(strict_types=1);

/* EXERCISE 7

Copy your solution from exercise 6

TODO: Make a static property in the Beverage class that can only be accessed from inside the class called address which has the value "Melkmarkt 9, 2000 Antwerpen".
TODO: Print the address without creating a new instant of the beverage class 2 times in two different ways.

Use typehinting everywhere!
*/


class Beverage 
{
    protected const BARNAME = 'Het Vervolg';
    private string $color;
    private float $price;
    private string $temperature;
    private static string $address = 'Melkmarkt 9, 2000 Antwerpen';

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

    public static function getAddress(): string
    {
        return self::$address;
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
      echo sprintf('You can buy this Beer at %s' . '<br />', parent::BARNAME);
    }
}



Beverage::printBarname();
Beer::printBarname();

Beer::whereBuy();


echo Beverage::getAddress() . '<br />';



// Using Reflection to access the private static property
// By using Reflection, you can bypass visibility constraints and interact with properties and methods that are otherwise inaccessible,
// which can be useful for debugging or certain advanced use cases. 
// However, in general practice, it is recommended to use public methods to access class properties to adhere to good 
// object-oriented design principles.

$reflection = new ReflectionClass('Beverage');
$property = $reflection->getProperty('address');
$property->setAccessible(true); // Allows access to private property

// Print the private static property
echo $property->getValue() . '<br />';