<?php


class UserInterface{

    private Loader $loader;
    private Store $store;

    public function __construct(Loader $loader, Store $store)
    {
        $this->loader = $loader;
        $this->store = $store;
    }


    public function mainMenu(): void{
        echo '1: List products' . PHP_EOL;
        echo '2: Add new product' . PHP_EOL;

        $choose = (int) readline('Choose option: ');

        switch ($choose){
            case 1:
                system('clear');
                foreach ($this->store->getStoreItems() as $item){
                    echo "{$item->getName()}, {$item->getPrice()}$, {$item->getQuantity()}p," . PHP_EOL;
                }
                readline('Press Enter to get back to menu: ');
                break;
            case 2:
                system('clear');

                $name = readline("Product's name: ");
                $price = (int) readline("Product's price: ");
                $quantity = (int) readline("Product's quantity: ");

                $this->store->addStoreItem(new Product($name, $price, $quantity));
                $this->loader->save($this->store->getStoreItems());
                readline('Product successfully added!');
                break;
            default:
                readline('Invalid input!');
                break;
        }
    }

}