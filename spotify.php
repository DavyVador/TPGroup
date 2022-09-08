<?php

/**
 * permet de definir des trait de class et ne bloque pas les extends
 */
trait NameTrait {
    protected string $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}



class Artist
 {
     use NameTrait;

    private int $beginningYear;
    private string $nationality;
    private array $styles = array();
    private array $albums = array();


    public function __toString(): string
    {
        return $this->name.' '.$this->getBeginningYear();
    }

    public function getBeginningYear(): int
    {
        return $this->beginningYear;
    }

    public function setBeginningYear($beginningYear): void
    {
        $this->beginningYear = $beginningYear;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getStyles(): array
    {
        return $this->styles;
    }

    public function getAlbums(): array
    {
        return $this->albums;
    }

}

class Album
{
    use NameTrait;

    private string $date;
    private float $price;
    private array $songList = array();



    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function addSong($songList): void
    {
        $this->songList[] = $songList;
    }

    public function getSongList(): array
    {
        return $this->songList;
    }
}

class Song {
    use NameTrait;
    private string $duration;
    protected array $artistsList = array();

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function addArtistList ($artistsList): void
    {
            $this->artistsList[] = $artistsList;
    }

    public function getArtistsList (): array
    {
        return $this->artistsList;
    }




}


$artist = (new Artist());
    $artist->setBeginningYear(1981);
    $artist->setNationality('American');
    $artist->setName('Metallica');

$song = new Song();
$song->setDuration('00:06:37');

$song1 = new Song();
$song1->setDuration('00:04:45');

$album = new Album();
$album->addSong($song);
$album->addSong($song1);
$album->setPrice(150);
$song->addArtistList(array('John lennon', 'nirvana', 'britney spears'));


var_dump($song->getArtistsList());


echo $song->getDuration() ;
echo '<br>';
echo $artist;
echo '<br>';
echo $album->getPrice(). ' $ ';



