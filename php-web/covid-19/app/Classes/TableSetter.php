<?php


namespace App\Classes;

class TableSetter{

    private array $fields;

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function setTable(){


        echo "<table>";
        echo "<th>Datums</th>";
        echo "<th>Valsts</th>";
        echo "<th>14Dienu</th>";
        echo "<th>Izcelosana</th>";
        echo "<th>Pasizolacija</th>";
        echo "<th>PersVac</th>";
        echo "<th>PersTestB</th>";
        echo "<th>PersTestA</th>";
        echo "<th>PersIsolLat</th>";
        echo "<th>CitTestB</th>";
        echo "<th>CitTestA</th>";
        foreach ($this->fields as $key => $field){


            /**
             * @var Field $field
             */
            if($key > 0) {

                echo "<tr>";
                echo "<td>{$field->getInfo()['date']}</td>";
                echo "<td>{$field->getInfo()['country']}</td>";
                echo "<td>{$field->getInfo()['twoWeek']}</td>";
                echo "<td>{$field->getInfo()['travelStatus']}</td>";
                echo "<td>{$field->getInfo()['selfIsolationPeriod']}</td>";
                echo "<td>{$field->getInfo()['persVac']}</td>";
                echo "<td>{$field->getInfo()['persTestB']}</td>";
                echo "<td>{$field->getInfo()['persTestA']}</td>";
                echo "<td>{$field->getInfo()['persIsoLat']}</td>";
                echo "<td>{$field->getInfo()['citTestB']}</td>";
                echo "<td>{$field->getInfo()['citTestA']}</td>";
                echo "</tr>";

            }

        }
        echo "</table>";
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }







}
