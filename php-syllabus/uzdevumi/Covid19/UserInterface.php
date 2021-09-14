<?php
class UserInterface{

    private Loader $loader;
    private TableSetter $tblSet;


    public function __construct(Loader $loader, TableSetter $tblSet)
    {
        $this->loader = $loader;
        $this->tblSet = $tblSet;
    }

    public function printTable(): void{
        $this->tblSet->setTable();

        $this->tblSet->getTbl()->display();
    }

    public function searchByCounty(): void{
        $country = (string) readline('Search by country: ');

        $this->tblSet->setTbl();
        $this->tblSet->setFields($this->loader->searchByCountry($country));
        $this->tblSet->getTbl()->display();
    }

    public function options(): void{

        echo '1: search by country' . PHP_EOL;
        echo '2: print all county info' . PHP_EOL;

        $choose = (int) readline('Choose option: ');

        switch ($choose){
            case 1:
                $this->searchByCounty();
                $this->printTable();
                break;
            case 2:
                $this->tblSet->setTbl();
                $this->tblSet->setFields($this->loader->getFields());
                $this->printTable();
                break;
            default:
                echo 'There is no option number ' . $choose . PHP_EOL;
                break;
        }

    }

}