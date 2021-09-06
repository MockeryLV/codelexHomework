<?php


class Dog{

    public string $name;

    public string $sex;

    public string $mother;

    public string $father;

    public function __construct(string $name, string $sex, string $mother = 'Unknown', string $father = 'Unknown')
    {
        $this->mother = $mother;
        $this->father = $father;
        $this->name = $name;
        $this->sex =  $sex;
    }


    public function fathersName(): string{
        return $this->father;
    }

    public function HasSameMotherAs(Dog $otherDog): bool {

        return $this->mother === $otherDog->mother ? true : false;

    }


}

class DogTest{

    public static function Main(): array {
        return [
            new Dog('Max', 'male', 'Lady', 'Rocky'),
            new Dog('Rocky', 'male', 'Molly', 'Buster'),
            new Dog('Sparky', 'male'),
            new Dog('Buster', 'male', 'Lady', 'Sparky'),
            new Dog('Sam', 'male'),
            new Dog('Lady', 'female'),
            new Dog('Molly', 'female'),
            new Dog('Coco', 'female', 'Molly', 'Sam'),
        ];
    }

}

$dogs = DogTest::Main();

echo $dogs[0]->fathersName() . PHP_EOL;

echo $dogs[0]->HasSameMotherAs($dogs[5]) . PHP_EOL;

echo $dogs[0]->HasSameMotherAs($dogs[3]) . PHP_EOL;