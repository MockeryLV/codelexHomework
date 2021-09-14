<?php

class TableSetter{

    private ConsoleTable $tbl;
    private array $fields;


    public function __construct(ConsoleTable $tbl, array $fields)
    {
        $this->tbl = $tbl;
        $this->fields = $fields;
    }

    public function setTable(){


        $this->tbl
            ->addHeader('Datums')
            ->addHeader('Valsts')
            ->addHeader('14Dienu')
            ->addHeader('Izcelosana')
            ->addHeader('Pasizolacija');

        foreach ($this->fields as $key => $field){

            /**
             * @var Field $field
             */
            if($key === 0){
                continue;
            }
            $this->tbl
                ->addRow()
                ->addColumn($field->getInfo()['date'])
                ->addColumn($field->getInfo()['country'])
                ->addColumn($field->getInfo()['twoWeek'])
                ->addColumn($field->getInfo()['travelStatus'])
                ->addColumn($field->getInfo()['selfIsolationPeriod'])
            ;


        }
    }

    public function getTbl(): ConsoleTable{
        return $this->tbl;
    }



}
