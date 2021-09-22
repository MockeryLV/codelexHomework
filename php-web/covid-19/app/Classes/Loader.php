<?php

namespace App\Classes;

class Loader{

    private array $fields;
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        if(($file = fopen($filename, 'r')) !== false){
            while(($data = fgetcsv($file, 10000, ';')) !== false){
                $this->fields[] = new Field($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10]);
            }
        }

        fclose($file);

    }

    public function getFields(): array
    {
        return $this->fields;
    }

//    public function searchByCountry(string $country): array{
//        foreach ($this->fields as $field){
//            /**
//             * @var Field $field
//             */
//            if(strtoupper($field->getInfo()['country']) === strtoupper($country)){
//                return [$field];
//            }
//        }
//        return [];
//    }



}