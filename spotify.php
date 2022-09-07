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

    private $date;
    private $prix;
    private array $songList = array();



    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    public function addSong($songList): object
    {
        $this->songList[] = $songList;
    }
    public function getSongList(): array
    {
        return $this->music;
    }
}

class Song {
    use NameTrait;
    private string $duration;
    protected array $artists = array();

    
}






$artist = new Artist();
$artist->setName('Metallica');
$artist->setBeginningYear(1981);
echo $artist;
