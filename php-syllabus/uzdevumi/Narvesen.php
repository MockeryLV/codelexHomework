<?php


/*
 * precu katalogs
 * pircejs
 * iepirksanas grozs
 * ieperkoties narvesena pircejam jabut iespejai ielikt 1 vai vairakas preces groza
 * groza var ielikt preces tik daudz cik veikala atrodas
 * beigas iespeja veikt apmaksu par visu grozu.
 */



class Product{


    public $quantity;

    public $name;

    public $price;

    public $category;


    public function __construct(string $name, int $price, int $quantity ,string $category = 'N')
    {
        $this->name =  $name;
        $this->price = $price;
        $this->category =  $category;
        $this->quantity = $quantity;
    }


}

class Costumer{

    public $cash;

    public $card;

    public $name;

    public $age;

    public function __construct(int $cash, int $card, int $age, string $name = 'John')
    {
        $this->card =  $card;
        $this->cash = $cash;
        $this->name =  $name;
        $this->age = $age;
    }


    public function isAdult(): bool{
        if($this->age >= 18){
            return true;
        }
        return false;
    }

//    public function depositCash(int $amount){
//        $this->cash += $amount;
//    }
//
//    public function depositCard(int $amount){
//        $this->card += $amount;
//    }

    public function withdrawCash(int $amount){
        $this->cash -= $amount;
    }

    public function withdrawCard(int $amount){
        $this->card -= $amount;
    }

}



class Narvesen{



    public $items;

    public $cart = [];


    public function __construct(array $items = [])
    {
        $this->items = $items;
    }


    public function addProducts(array $products){

        foreach ($products as $product){
            array_push($this->items, $product);
        }

    }


    public function printProducts(){
        foreach ($this->items as $key =>$item){
            echo "$key: $item->name: $item->price$ ". "(". $item->quantity .")" . PHP_EOL;
        }
    }


    public function addToCart(Product $item, Costumer $costumer , int $quantity = 1){

        if($item->quantity - $quantity >= 0){
            if($item->category === 'A' && !$costumer->isAdult()){
                readline( 'Sorry, You are not an adult!' );
            }else{
                if(isset($this->cart[$item->name])){
                    $this->cart[$item->name][0]++;
                }else{
                    $this->cart[$item->name] = [$quantity, $item->price];
                }
                $item->quantity-=$quantity;
            }
        }else{
            readline('Sorry, Not in stock!');
        }


    }

    public function cartPrice(){
        $cartPrice = 0;
        foreach ($this->cart as $product){
            $cartPrice += $product[0] * $product[1];
        }
        return $cartPrice;
    }


    public function printCart(){
        foreach ($this->cart as $key => $item){
            echo "$key: ($item[0]p) - " . $item[0] * $item[1] . "$" . PHP_EOL;
        }
    }

}


class UserInterface{

    public static function BuyingCart($narvesen, $costumer){
        while(true){
            $choose = (string) readline('Choose Product (exit to quit/buy to buy cart): ');
            if($choose === 'exit'){
                exit;
            }
            if($choose === 'buy'){
                if(count($narvesen->cart) < 1){
                    echo 'You dont have any items selected!' . PHP_EOL;
                    continue;
                }
                system('clear');


                $narvesen->printCart();
                echo PHP_EOL;
                echo 'Your balance in cash: ' . $costumer->cash . "$" . PHP_EOL;
                echo 'Your balance on card: ' . $costumer->card . "$" . PHP_EOL;


                echo PHP_EOL . 'You need to pay: ' . $narvesen->cartPrice() . "$" . PHP_EOL;
                while(true){
                    $payment = (string) readline('Enter payment method(cash/card/exit): ');

                    if($payment === 'exit'){
                        exit;
                    }
                    if($payment === 'cash' || $payment === 'card'){
                        if($payment === 'cash'){
                            if($costumer->cash >= $narvesen->cartPrice()){
                                $costumer->withdrawCash($narvesen->cartPrice());
                                echo 'Thanks! Have a nice day!'. PHP_EOL;
                                exit;
                            }
                            else{
                                echo 'You do not have enough money in cash!'. PHP_EOL;
                                continue;
                            }
                        }else{
                            if($costumer->card >= $narvesen->cartPrice()){
                                $costumer->withdrawCard($narvesen->cartPrice());
                                echo 'Thanks! Have a nice day!'. PHP_EOL;
                                exit;
                            }
                            else{
                                echo 'You do not have enough money on card!'. PHP_EOL;
                                continue;
                            }
                        }
                    }
                    else{
                        echo 'Invalid Input!' . PHP_EOL;
                    }
                }



            }
            $choose = (int) $choose;
            if(array_key_exists($choose, $narvesen->items)){
                break;
            }
            echo 'Incorrect Input!' . PHP_EOL;
        }
        return $choose;
    }


}


//setting the info

$products = [

    new Product('Phone', 100, 100),
    new Product('Toothpaste', 5, 5),
    new Product('Apple', 1, 6),
    new Product('Vodka', 20, 5,'A')

];

$narvesen = new Narvesen();

$narvesen->addProducts($products);




system('clear');

echo 'Welcome to Narvesen!' . PHP_EOL;


$age = (int) readline('Enter your age: ');
$cash = (int) readline('Enter your cash: ');
$card = (int) readline('Enter your card balance: ');

$costumer = new Costumer($cash, $card, $age);

while(true){

    echo "Cart(" . count($narvesen->cart) . ") - " . $narvesen->cartPrice() . "$" . PHP_EOL;
    echo 'Product List:' . PHP_EOL . PHP_EOL;

    $narvesen->printProducts();

    $choose = UserInterface::BuyingCart($narvesen, $costumer);

    $quantity = (int) readline('Enter quantity of product: ');


    $narvesen->addToCart($narvesen->items[$choose], $costumer, $quantity);


    system('clear');

}


