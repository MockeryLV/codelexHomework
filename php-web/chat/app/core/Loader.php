<?php


use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class Loader{

    private string $filename;
    private array $messages;

    public function __construct(string $filename)
    {
        $this->messages = [];
        $this->filename = $filename;
        $stream = fopen($filename, 'r');
        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $stmt = Statement::create();

        $records = $stmt->process($csv);



        foreach ($records as $record) {
            $this->messages[] = new Message($record['username'], $record['text']);
        }
        fclose($stream);

    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    public function addMessage(string $name, string $text): void{

        $this->messages[] = new Message($name, $text);


        $stream = fopen($this->filename, 'w');

        fputcsv($stream, ['username', 'text'], ';');
        foreach ($this->messages as $item){
            fputcsv($stream, [$item->getName(), $item->getText()], ';');
        }
        fclose($stream);

    }



}