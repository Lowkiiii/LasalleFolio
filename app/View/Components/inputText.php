<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputText extends Component
{
  public $name;
  public $id;
  public $placeholder;
  public $type;
    public function __construct($name, $id, $placeholder = '', $type = '')
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text');
    }
}
