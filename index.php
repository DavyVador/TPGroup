<?php

class Form {
    private string $action;
    private string $method;
    private string $legend;
    private string $textForm;
    private string $value;
    private string $type;
    private string $name;
    private string $id;

    public function __construct(string $action, string $method, string $legend){
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
function setText(string $type, string $name, string $id){
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
function setSubmit(string $value){
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
    return $this->textForm;
}

}

class form2 extends Form {

}


$form1 = new Form('./formulaire.php', 'get', 'Inscription');
$form1->setText('text', 'nom', 'nom');
$form1->setText('text', 'firstname', 'firstname');
$form1->setText('date', 'birthday', 'birthday');
$form1->setText('email', 'email', 'email');
$form1->setSubmit('Envoyer');
echo $form1->getForm();