<?php
/**
 * Создайте класс Ingredient. Каждый экземпляр этого класса должен представлять
 * отдельный ингредиент блюда, а также отслеживать наименование ингредиента и
 * его стоимость.
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
}

$tomato = new Ingredient('Помидоры', 100);

echo "<pre>";
print_r($tomato);
echo "</pre>";
