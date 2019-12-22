<?php
/**
 * Что будет содержать массив $_POST после передачи на обработку приведенной
 * ниже формы, где выбран третий элемент из списка Braised Noodles (Тушеное
 * мясо с лапшой), первый и последний элементы из списка Sweet (Сладкое), а в
 * текстовом поле введено значение 4?
 *
 * Ответ:
 * Array(
 *  [noodle] => barbecued pork
 *  [sweet_] => Array(
 *      [0] => puff
 *      [1] => ricemeat
 *  )
 *  [sweet_q] => 4
 *  [submit] => Order
 * )
 */

function process_form($data)
{
    foreach($data as $key => $value) {
        if (is_string($key)) {
            echo $key . ' = ';
        }

        if (is_array($value)) {
            process_form($value);
        } else {
            if ($key > 0) {
                echo  ', ';
            }
            echo  $value;
        }

        if (is_string($key)) {
            echo  '<br>';
        }
    }

    // or
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
}
?>

<form method="POST">
    Braised Noodles with: <select name="noodle">
        <option>crab meat</option>
        <option>mushroom</option>
        <option>barbecued pork</option>
        <option>shredded ginger and green onion</option>
    </select>
    <br/>
    Sweet: <select name="sweet[]" multiple>
        <option value="puff"> Sesame Seed Puff
        <option value="square"> Coconut Milk Gelatin Square
        <option value="cake"> Brown Sugar Cake
        <option value="ricemeat"> Sweet Rice and Meat
    </select>
    <br/>
    Sweet Quantity: <input type="text" name="sweet_q">
    <br/>
    <input type="submit" name="submit" value="Order">
</form>

<?php
if (!empty($_POST)) {
    process_form($_POST);
}
?>