<?php

class Form
{
    protected string $textForm;

    public function __construct(string $action, string $method, string $legend)
    {
        $this->textForm =
            '<form action="' . $action . '" method="' . $method . '">
            <fieldset>
                <legend>' . $legend . '</legend>
        ';
    }

    public function setText(string $type, string $name, string $id): void
    {

        $this->textForm =
            $this->textForm .
            '           <div>
                    <label for="' . $id . '">Entrez votre ' . $name . '</label>
                    <br>
                    <input type="' . $type . '" name="' . $name . '" id="' . $id . '">
                    </div>
                    <br>
        ';
    }

    public function setSubmit(string $value): void
    {
        $this->textForm =
            $this->textForm .
            '           <div>
                    <input type="submit" value="' . $value . '">
                    </div>
            </fieldset>
         </form>
        ';
    }

    public function getForm(): string
    {
        return $this->textForm;
    }
}
class Form2 extends Form
{
    public function setRadioCheck(string $type, string $label, string $name, string $value, string $id): void
    {
        $this->textForm = $this->textForm .
            '  <div>
                <label for="' . $id . '">' . $label . '</label>
                <input type="' . $type . '" name="' . $name . '" value="' . $value . '" id= "' . $id . '">
        </div>
        ';
    }
}

$form2 = new Form2('./formulaire.php', 'get', 'inscription');
$form2->setText('text', 'nom', 'nom');
$form2->setText('text', 'prénom', 'prénom');
$form2->setRadioCheck('radio', 'fr', 'nationalite', 'email', 'email');
$form2->setRadioCheck('radio', 'eng', 'nationalite', 'phone', 'phone');
$form2->setRadioCheck('checkBox', 'salut', 'coucou', 'email', 'email');
$form2->setRadioCheck('checkBox', 'hi', 'coucou', 'phone', 'phone');
$form2->setText('date', 'date de naissance', 'date de naissance');
$form2->setText('email', 'email', 'email');

$form2->setSubmit('Envoyer');
echo $form2->getForm();