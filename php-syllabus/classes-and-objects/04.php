<?php


class Movie{

    public string $title;

    public string $studio;

    public string $rating;


    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function GetPG(array $movies): array{
        $returnedArr = [];

        foreach ($movies as $movie){
            if($movie->rating === 'PG'){
                array_push($returnedArr, $movie);
            }
        }
        return $returnedArr;
    }

}


$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Spider-Man: Into the Spider-Verse', 'PG'),
];

$pgMovies = Movie::GetPG($movies);

foreach($pgMovies as $pgMovie){
    echo $pgMovie->title . PHP_EOL;
}
