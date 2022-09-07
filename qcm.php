<?php

/**
 *
 */
class Qcm
{
    /**
     * @var array
     */
    private array $questions = array();
    /**
     * @var array
     */
    private array $appreciations = array();


    /**
     * @param Question $question
     * @return void
     */
    public function ajouterQuestions(Question $question): void
    {
        $this->questions[] = $question;
    }

    /**
     * @param array $appreciations
     * @return $this
     */
    public function setAppreciation(array $appreciations): Qcm
    {
        foreach ($appreciations as $key => $appr) {
            if (is_numeric($key))
                $this->appreciations[(int)$appr] = $appr;
            else {
                list($min, $max) = explode('-', $key);
                if ($min > $max)
                    list($min, $max) = array($max, $min);
                for ($i = (int)$min; $i <= $max; $i++)
                    $this->appreciations[$i] = $appr;
            }
        }
        return $this;
    }

    /**
     *  Méthode de génération du QCM
     *
     * @return string
     */
    public function generer(): string
    {

        $code = '';
        if (!empty($_POST)) {
            $score = 0;
            $bonneR = 0;
            foreach ($_POST as $key => $value) {
                $reponse = $this->questions[$key]->getReponse($value);
                if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                    $code .= 'Bonne reponse : ' . $reponse->getReponse() . '</br> ';
                    $code .= $this->questions[$key]->getExplication() . '</br> ';
                    $bonneR++;
                } else {
                    $code .= 'Mauvaise reponse : ' . $reponse->getReponse() . '</br> ';
                    $code .= 'La bonne reponse : ' . $this->questions[$key]->getBonneReponse()->getReponse() . '</br> ';
                    $code .= $this->questions[$key]->getExplication() . '</br> ';
                }
            }
            $code .= 'votre score : ' . $score = round(($bonneR / count($this->questions) * 20));
            $code .= ' ' . $this->appreciations[$score];
            return $code;
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

/**
 *
 */
class Question
{
    /**
     * @var string
     */
    protected string $question;
    /**
     * @var array
     */
    protected array $reponses = [];
    /**
     * @var string
     */
    protected string $explication;

    /**
     * @param string $question
     */
    public function __construct(string $question)
    {
        $this->question = $question;
    }

    /**
     * @param Reponse $reponse
     * @return void
     */
    public function ajouterReponse(Reponse $reponse): void
    {
        $this->reponses[] = $reponse;
    }

    /**
     * @return array
     */
    public function getReponses(): array
    {
        return $this->reponses;
    }

    /**
     * @param $explication
     * @return void
     */
    public function setExplications($explication): void
    {
        $this->explication = $explication;
    }

    /**
     * @return string
     */
    public function getExplication(): string
    {
        return $this->explication;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param int $index
     * @return Reponse
     */
    public function getReponse(int $index): Reponse
    {
        return $this->reponses[$index];
    }

    /**
     * @return int
     */
    public function getNumBonneReponse(): int
    {
        foreach ($this->reponses as $index => $reponse) {
            if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                return $index;
            }
        }
    }

    /**
     * @return Reponse
     */
    public function getBonneReponse(): Reponse
    {
        foreach ($this->reponses as $reponse) {
            if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
                return $reponse;
            }
        }
    }
}

/**
 *
 */
class Reponse
{
    /**
     *
     */
    public const BONNE_REPONSE = true;
    /**
     *
     */
    public const MAUVAISE_REPONSE = false;
    /**
     * @var string
     */
    private string $reponse;
    /**
     * @var bool|mixed
     */
    private bool $statut;


    /**
     * @param $reponse
     * @param $statut
     */
    public function __construct($reponse, $statut = self::MAUVAISE_REPONSE)
    {
        $this->reponse = $reponse;
        $this->statut = $statut;
    }

    /**
     * @return string
     */
    public function getReponse(): string
    {
        return $this->reponse;
    }

    /**
     * @return bool
     */
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
$question1->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
$qcm->ajouterQuestions($question1);

$question2 = new Question('POO signifie');
$question2->ajouterReponse(new Reponse('Php Orienté Objet'));
$question2->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
$question2->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestions($question2);
$qcm->setAppreciation(array('0-10' => 'Pas top du tout...',
    '10-20' => 'Très bien...'));
echo $qcm->generer();

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
<a href="./index.php">Accueil</a>


</body>
</html>
