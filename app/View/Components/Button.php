<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $id;
    public $type;
    public $onclick;
    public $class;
    public function __construct($id, $type = 'default', $onclick='', $class='') // Default type
    {
        $this->id = $id;
        $this->type = $type;
        $this->class = $class;
        $this->onclick = $onclick;
    }   

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
