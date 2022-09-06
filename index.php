<?php

class Form
{
    private $action;
    private $method;
    private $legend;
    private $textForm;
    private $value;
    private $type;
    private $name;
    private $id;

    public function __construct($action, $method, $legend)
    {
        $this->action = $action;
        $this->method = $method;
        $this->legend = $legend;
        $this->textForm =
            '<form action="' . $this->action . '" method="' . $this->method . '">
            <fieldset>
                <legend>' . $this->legend . '</legend>
        ';
    }