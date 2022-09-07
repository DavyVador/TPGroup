<?php

class Qcm
{
    private array $questions = array();
    private array $appreciations = array();

    public function ajouterQuestions(Question $question): void
    {
        $this->questions[] = $question;
    }

    public function setAppreciation($appreciations): void
    {
        $this->appreciations[] = $appreciations;
    }

    public function generer(): string
    {

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $reponse = $this->questions[$key]->getReponse($value);
                if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                    echo 'Bonne reponse : ' . $reponse->getReponse() . '</br> ';
                    echo  $this->questions[$key]->getExplication() ;
                } else {
                    echo 'Mauvaise reponse : ' . $reponse->getReponse(). '</br> ';
                    echo 'La bonne reponse : ' . $this->questions[$key]->getBonneReponse()->getReponse();
                }
            }
        }
        $code = '<form method="post" action="">';
        foreach ($this->questions as $indexquestion => $question) {
            $code .= '<h1>' . $question->getQuestion() . '</h1>';
            foreach ($question->getReponses() as $index => $reponse) {
                $code .= '<input type="radio" name="' . $indexquestion . '" value="' . $index . '">' . $reponse->getReponse() . '</input>';
            }
        }

        $code .= '<input type="submit" value="TESTER"/>';
        $code .= '</form>';
        return $code;
    }
}
class Question
{
    protected string $question;
    protected array $reponses = [];
    protected string $explication;

    public function __construct(string $question)
    {
        $this->question = $question;
    }

    public function ajouterReponse(Reponse $reponse): void
    {
        $this->reponses[] = $reponse;
    }
    public function getReponses(): array
    {
        return $this->reponses;
    }

    public function setExpliquations($explication): void
    {
        $this->explication = $explication;
    }
    public function getExplication(): string
    {
        return $this->explication;
    }
    public function getQuestion(): string
    {
        return $this->question;
    }
    public function getReponse(int $index): Reponse
    {
        return $this->reponses[$index];
    }
    public function getNumBonneReponse(): int
    {
        foreach ($this->reponses as $index => $reponse) {
            if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                return $index;
            }
        }
    }
    public function getBonneReponse(): Reponse
    {
        foreach ($this->reponses as $reponse) {
            if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                return $reponse;
            }
        }
    }
}
class Reponse
{
    public const BONNE_REPONSE = true;
    public const MAUVAISE_REPONSE = false;
    private string $reponse;
    private bool $statut;


    public function __construct($reponse, $statut = self::MAUVAISE_REPONSE)
    {
        $this->reponse = $reponse;
        $this->statut = $statut;
    }

    public function getReponse(): string
    {
        return $this->reponse;
    }
    public function getStatut(): bool
    {
        return $this->statut;
    }
}

$qcm = new Qcm();

$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'));
$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('Des actimels'));
$question1->setExpliquations('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
$qcm->ajouterQuestions($question1);
echo $qcm->generer();

//echo '<pre>';
//print_r($qcm);
//echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="./index.php">Accueil</a>


</body>
</html>
