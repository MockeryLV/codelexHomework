<?php
interface Animal{

    public function getName(): string;

    public function getStatus(): string;

    public static function isCompatible(Animal $a, Animal $b): string;

}