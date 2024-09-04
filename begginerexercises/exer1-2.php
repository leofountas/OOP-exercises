<?php 

class Items
{
    public function __construct(protected string $name, protected int $quantity, protected float $price_for_each, protected float $tax )
    {
    }

    public function totalPrice() {
        return $this->quantity * $this->price_for_each;
    }

    public function totalTax() {
        return $this->totalPrice() * $this->tax;
    }
}

class Fruits extends Items
{
    public function applyDiscount($discount_rate) {
        $this->price_for_each *= (1 - $discount_rate);
    }
}



$bananas = new Fruits('Bananas',6, 1, 0.06);
$apples = new Fruits('Apples', 3, 1.5, 0.06);
$wine = new Items('Wine',2, 10, 0.21);

$bananas->applyDiscount(0.50);
$apples->applyDiscount(0.50);

$items = [$bananas, $apples, $wine];
$total_price = 0;
$total_tax = 0;

foreach($items as $item){
    $total_price += $item->totalPrice();
    $total_tax += $item->totalTax();
}

echo 'the Total price is ' . $total_price . ' euro' . '<br />';
echo 'the Total tax is ' . $total_tax . ' euro' . '<br />';