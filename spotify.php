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
        return $this->name.' '.$this->getBeginningYear(). ' '.'(' . $this->getNationality(). ')';
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

    public function addStyle(style $styles): void
    {
        $this->styles[] = $styles;
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

    public function addSong(Song $song): void
    {
        $this->songList[] = $song;
    }

    public function getSongList(): array
    {
        return $this->songList;
    }

    public function albumDuration(): string
    {
        $songDuration = new DateTime('00:00:00');
        foreach ($this->songList as $key => $song) {
            $d = $this->time_to_interval($song->getDuration());
            $songDuration->add($d);
        }
        return $songDuration->format('H:i:s');
    }

    public function time_to_interval($time): DateInterval
    {
        $parts = explode(':',$time);
        return new DateInterval('PT'.$parts[0].'H'.$parts[1].'M'.$parts[2].'S');
    }
}
class Song
{
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

    public function addArtistList($artistsList): void
    {
        $this->artistsList[] = $artistsList;
    }

    public function getArtistsList(): array
    {
        return $this->artistsList;
    }

}

class Style {
    use NameTrait;
}

class playlist {
    use NameTrait;

    private array $playList = array();
    private DateTime $creationDate;
    private DateTime $modificationDate;

    public function addSong($song): void
    {
        $this->playList[] = $song;
    }

    public function getSongList(): array
    {
        return $this->playList;
    }

    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(): void
    {
        $this->creationDate = new DateTime();

    }

    public function getModificationDate(): DateTime
    {
        return $this->modificationDate;
    }

    public function setModificationDate(): void
    {
        $this->modificationDate = new DateTime();
    }

}

class User {
    use NameTrait;
    private int $userId;
    private mail $mail;
    private password $password;
    private playlist $playlist;
    private array $userPlaylist = array();

    public function addSong(Song $song): void
    {
        $this->userPlaylist[] = $song;
    }

}

//$artist = (new Artist());
//    $artist->setBeginningYear(1981);
//    $artist->setNationality('American');
//    $artist->setName('Metallica');
//
//$song = new Song();
//$song->setDuration('00:05:42');
//$song1 = new Song();
//$song1->setDuration('00:04:56');
//
//$album = new Album();
//$album->addSong($song);
//$album->addSong($song1);
//$album->setPrice(150);
//$song->addArtistList(array('John lennon', 'nirvana', 'britney spears'));
//
//
//
//var_dump($album->albumDuration($album));
//echo $album->albumDuration($album);
//echo '<br>';
//echo $artist;
//echo '<br>';
//echo $album->getPrice(). ' $ ';
//echo $album->albumDuration($album);

///// Création des styles \\\\\
$style1 = new Style();
$style1->setName('Heavy metal');
$style2 = new Style();
$style2->setName('Trash metal');
$style3 = new Style();
$style3->setName('Hard rock');

///// Création des artistes \\\\\
$artist = (new Artist());
$artist->setBeginningYear(1981);
$artist->setNationality('American');
/// ????
$artist->addStyle($style1);
$artist->addStyle($style2);
$artist->addStyle($style3);
$artist->setName('Metallica');

$song = new Song();
$song->setDuration('00:06:37');

$song1 = new Song();
$song1->setDuration('00:04:45');

$album = new Album();
$album->addSong($song);
$album->addSong($song1);

echo $album->albumDuration();
echo '<br>';

$user = new User();
/// ????
$date = (new DateTime());
$date->setDate(1990, 1, 1);
//$user->setBirthDate($date);
/// ????
//echo $user->getAge();

echo '<br>';

echo $artist;
echo '<ul>';
foreach ($artist->getStyles() as $style) {
    echo '<li>';
    echo $style;
    echo '</li>';
}
echo '</ul>';

