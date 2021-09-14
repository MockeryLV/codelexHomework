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


        foreach ($this->fields as $key => $field){

            /**
             * @var Field $field
             */
            if($key === 0){
                $this->tbl
                    ->addHeader('Datums')
                    ->addHeader('Valsts')
                    ->addHeader('14Dienu')
                    ->addHeader('Izcelosana')
                    ->addHeader('Pasizolacija')
                    ->addHeader('PersVac')
                    ->addHeader('PersTestB')
                    ->addHeader('PersTestA')
                    ->addHeader('PersIsolLat')
                    ->addHeader('CitTestB')
                    ->addHeader('CitTestA');
            }
            $this->tbl
                ->addRow()
                ->addColumn($field->getInfo()['date'])
                ->addColumn($field->getInfo()['country'])
                ->addColumn($field->getInfo()['twoWeek'])
                ->addColumn($field->getInfo()['travelStatus'])
                ->addColumn($field->getInfo()['selfIsolationPeriod'])
                ->addColumn($field->getInfo()['persVac'])
                ->addColumn($field->getInfo()['persTestB'])
                ->addColumn($field->getInfo()['persTestA'])
                ->addColumn($field->getInfo()['persIsoLat'])
                ->addColumn($field->getInfo()['citTestB'])
                ->addColumn($field->getInfo()['citTestA']);
            ;


        }
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function setTbl(): void{
        $this->tbl = new ConsoleTable();
    }

    public function getTbl(): ConsoleTable{
        return $this->tbl;
    }



}
