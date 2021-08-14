<?php


$minimalWage = 8;

$maxHours = 60;

$maxHoursBase = 40;

Class Employee {

    public $id;

    public $basePay;

    public $hoursWorked;




    public function __construct($id, $basePay, $hoursWorked)
    {
        $this->basePay = $basePay;
        $this->id = $id;
        $this->hoursWorked = $hoursWorked;
    }

    public static function getSalary(Employee $employee): string{
        if($employee->basePay < 8 || $employee->hoursWorked > 60){
            return "Employee $employee->id - " . 'Error' . PHP_EOL;
        }
        else if($employee->hoursWorked > 40){
            return "Employee $employee->id - "
                . (float)(($employee->basePay * 40) + (($employee->hoursWorked - 40) * ($employee->basePay * 1.5)))
                . '$'
                . PHP_EOL;
        }
        else{
            return "Employee $employee->id - ". $employee->basePay * $employee->hoursWorked .'$' . PHP_EOL;
        }
    }

}


$employees = [

    new Employee(1, 7.5, 35),
    new Employee(2, 8.2, 47),
    new Employee(3, 10, 73),

];

foreach ($employees as $employee){
    echo Employee::getSalary($employee);
}