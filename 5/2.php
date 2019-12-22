<?php
/**
 * Введите в свой новый класс Ingredient метод, изменяющий стоимость
 * ингредиента блюда.
 */

class Ingredient
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}

$tomato = new Ingredient('Помидоры', 100);
echo "<pre>";
print_r($tomato);
echo "</pre>";

$tomato->setPrice(200);
echo "<pre>";
print_r($tomato);
echo "</pre>";