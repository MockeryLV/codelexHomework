<?php



class Loader{

    private array $products;
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        if(($file = fopen($filename, 'r')) !== false){
            while(($data = fgetcsv($file, 1000, ';')) !== false){
                $this->products[] = new Product($data[0], $data[1], $data[2]);
            }
        }

        fclose($file);

    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function save(array $data)
    {
        $file = fopen($this->filename, 'w');

        foreach ($data as $item){
            fputcsv($file, $item->getProduct(), ';');
        }
        fclose($file);

    }


}
