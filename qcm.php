<?php

class Qcm {
    private array $questions = array();

    public function ajouterQuestions(Question $question){
        $this->questions[] = $question;
    }

    public function setAppreciation(){

    }

    public function generer(){

    }
}

class Question {
    public function ajouterReponse(){

    }

    public function setExpliquations(){

    }
}

class Reponse {
    const BONNE_REPONSE = true;
    const MAUVAISE_REPONSE = false;

    
}

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
