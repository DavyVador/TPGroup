<?php

class Form {
    private $action;
    private $method;
    private $legend;
    private $textForm;
    private $value;
    private $type;
    private $name;
    private $id;

    public function __construct($action, $method, $legend){
        $this->action = $action;
        $this->method = $method;
        $this->legend = $legend;
        $this->textForm =
            '<form action="' . $this->action . '" method="' . $this->method . '">
            <fieldset>
                <legend>' . $this->legend . '</legend>
        ';
    }


public
function setText($type, $name, $id){
    $this->type = $type;
    $this->name = $name;
    $this->id = $id;
    $this->textForm =
        $this->textForm .
        '           <div>
                    <label for="' . $this->name . '">Entrez votre ' . $this->name . '</label>
                    <br>
                    <input type="' . $this->type . '" name="' . $this->name . '" id="' . $this->id . '">
                    </div>
                    <br>
        ';
}
public
function setSubmit($value){
    $this->value = $value;
    $this->textForm =
        $this->textForm .
        '           <div>
                    <input type="submit" value="' . $this->value . '">
                    </div>
            </fieldset>
         </form>
        ';
}

public
function getForm(){
    echo $this->textForm;
}

}

$form1 = new Form('./formulaire.php', 'get', 'Inscription');
$form1->setText('text', 'nom', 'nom');
$form1->setText('text', 'prénom', 'prénom');
$form1->setText('date', 'date de naissance', 'date de naissance');
$form1->setText('email', 'email', 'email');
$form1->setSubmit('Envoyer');
$form1->getForm();