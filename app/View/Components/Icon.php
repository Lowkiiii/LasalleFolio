<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public $icon;
    public $fill;
    public $class;
    public $width;
    public $height;

    public function __construct($icon, $fill = '#7A601D', $class = 'shadow-xl', $width = '24', $height = '24')
    {
        $this->icon = $icon;
        $this->fill = $fill;
        $this->class = $class;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon');
    }
}
