<?php

class Artist
{
    private int $beginningYear;
    private string $name;
    private string $nationality;
    private array $styles = array();
    private array $albums = array();


    public function __toString(): string
    {
        return $this->name.' '.$this->getBeginningYear();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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

$artist = new Artist();
$artist->setName('Metallica');
$artist->setBeginningYear(1981);
echo $artist;
