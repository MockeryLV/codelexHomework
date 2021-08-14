<?php



class Person{

    public $name;
    public $surname;
    public $age;
    public $birthday;

    public function __construct($name, $surname, $age, $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
    }



}

$persons = [
    'John' => new Person('John', 'Doe', 20, '31.02.2001'),
    'Peter' => new Person('Peter', 'Hoops', 19, '31.02.2002'),
    'Justin' => new Person('Justin', 'Mill', 21, '31.02.2000'),
];

foreach ($persons as $person){
    echo $person->name . ' ' .$person->surname . ' - ' .$person->age . ' -  ' .$person->birthday;
    echo "\n";
}