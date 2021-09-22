<?php

namespace App\Classes;

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

    }


}