<?php

class Store{

    private array $storeItems;

    public function __construct(array $storeItems)
    {
        $this->storeItems = $storeItems;

    }


    public function getStoreItems(): array
    {
        return $this->storeItems;
    }

    public function addStoreItem(Product $product): void{
        array_push($this->storeItems, $product);
    }

}