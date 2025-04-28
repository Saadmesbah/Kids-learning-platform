<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $text;
    public $class;

    public function __construct($type = 'primary', $text = '', $class = '')
    {
        $this->type = $type;
        $this->text = $text;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.button');
    }
} 