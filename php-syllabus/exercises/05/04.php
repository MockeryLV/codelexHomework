<?php


class Person{

    public $name;
    public $surname;
    public $age;



    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;

    }


}

function isAdult(Person $person): string {
    if($person->age){
        if($person->age >= 18){
            return $person->name . ' has already reached 18! He is an adult!';
        }else if($person->age < 18 && $person->age > 0){
            return 'Go home ' . $person->name . '. You are not 18!';
        }else if($person->age <= 0){
            return $person->name . ', you are not even born yet! Chill!';
        }
    }else{
        return 'Invalid input';
    }

}


$persons = [
    new Person('Vasya', 'Pupkin', 18),
    new Person('Igor', 'Kanareikin', -10),
    new Person('Juan', 'Gonzalez', 12),
];

foreach ($persons as $person){
    echo isAdult($person);
    echo "\n";
}



