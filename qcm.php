<?php

class Qcm
{
    private array $questions = array();

    public function ajouterQuestions(Question $question)
    {
        $this->questions[] = $question;
    }

    public function setAppreciation()
    {
    }

    public function generer()
    {
    }
}

class Question
{
    protected $question;
    protected array $reponses = [];

    public function construct($question)
    {
        $this->question = $question;
    }

    public function ajouterReponse(Reponse $reponse)
    {
        $this->reponses[] = $reponse;
    }


    public function setExpliquations()
    {
    }
}

class Reponse
{
    const BONNE_REPONSE = true;
    const MAUVAISE_REPONSE = false;
    private string $reponse;
    private bool $statut;


    public function construct($reponse, $statut = self::MAUVAISE_REPONSE)
    {
        $this->reponse = $reponse;
        $this->statut = $statut;
    }

    public function getReponse()
    {
        return $this->reponse;
    }
    public function getStatut()
    {
        return $this->statut;
    }
}

$qcm = new Qcm();

$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'));
$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('Des actimels'));
$qcm->ajouterQuestions($question1);
$qcm->generer();

echo '<pre>';
print_r($qcm);
echo '</pre>';

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
<a href="./level1.php">LEVEL 1</a>


</body>
</html>
