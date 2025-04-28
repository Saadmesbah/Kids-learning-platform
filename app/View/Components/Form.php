<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;
    public $class;

    public function __construct($action = '', $method = 'POST', $class = '')
    {
        $this->action = $action;
        $this->method = $method;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.form');
    }
} 