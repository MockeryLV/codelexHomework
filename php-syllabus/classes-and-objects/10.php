<?php


class Application
{

    public VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    function run(): void
    {
        system('clear');
        while (true) {

            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
            system('clear');
        }

    }

    private function add_movies(): void
    {
        echo PHP_EOL;
        $title = (string) readline("Enter the movie's title: ");
        $this->videoStore->add_video($title);
    }

    private function rent_video(): void
    {
        echo PHP_EOL;
        $title = (string) readline("Enter the movie's title: ");
        $this->videoStore->rent_video($title);
        $this->videoStore->list_inventory();

    }

    private function return_video(): void
    {
        echo PHP_EOL;
        $title = (string) readline("Enter the movie's title: ");
        $this->videoStore->return_video($title);

    }

    private function list_inventory(): void
    {
        $this->videoStore->list_inventory();
    }
}

class VideoStore
{

    public array $inventory = [];

    public function add_video(string $title){
        foreach ($this->inventory as $item){
            if($item->title === $title) {
                return readline('Sorry, we already have that movie! Press Enter to continue!');
            }
        }
        $newVideo =  new Video($title);
        array_push($this->inventory, $newVideo);
    }

     public function list_inventory(): void{

         system('clear');
         echo 'List of movies:' . PHP_EOL . PHP_EOL;
        foreach ($this->inventory as $item){
            if($item->isCheckedOut){
                echo "Title: '$item->title', Status: Checked Out, Average user rating: $item->averageUserRating" . PHP_EOL;
            }else{
                echo "Title: '$item->title', Status: Is not Checked Out, Average user rating: $item->averageUserRating" . PHP_EOL;
            }
        }
        readline('Press Enter to get back to menu!');
     }

     public function rent_video($title){

        $needle = false;
          foreach ($this->inventory as $key => $item){
              if($item->title === $title){
                  $needle = $item;
              }
          }

        if(!$needle){
            return readline("Sorry, we don't have that movie! Press Enter to continue!");
        }

        $this->inventory[array_search($needle, $this->inventory)]->checkOut();
        echo 'The movie has been successfully rented!' . PHP_EOL;
        readline('Press Enter to continue!');
     }

    public function return_video($title)
    {
        $needle = false;

        foreach ($this->inventory as $key => $item){
            if($item->title === $title && $item->isCheckedOut === true){
                $needle =  $item;
            }
        }

        if(!$needle){
            return readline("Sorry, that movie was not checked out! Press Enter to continue!");
        }

        $this->inventory[array_search($needle, $this->inventory)]->getReturned();
        while(true){
            $rating = (int) readline('Rate the movie 1-10: ');
            if($rating < 1 || $rating > 10){
                readline('Rating should be 1-10! Press Enter to try again!');
            }else{
                break;
            }

        }

        $this->inventory[array_search($needle, $this->inventory)]->getRated($rating);
        echo 'The movie has been successfully returned!' . PHP_EOL;
        readline('Press Enter to continue!');

    }


}

class Video
{

    public string $title;
    public $isCheckedOut = false;
    public $averageUserRating = 0;
    public $countOfRates = 0;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function checkOut(): void{
        $this->isCheckedOut = true;
    }

    public function getReturned():void{
        $this->isCheckedOut = false;
    }

    public function getRated(int $rating){
        $this->averageUserRating = round((($this->averageUserRating * $this->countOfRates + $rating) / (1 + $this->countOfRates)), 1);
        $this->countOfRates++;
    }

}

$app = new Application();
$app->run();