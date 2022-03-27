<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $hrefval;
    public $classval;
    public $txt;
    public function __construct($hrefval,$classval,$txt)
    {
        $this->hrefval=$hrefval;
        $this->classval=$classval;
        $this->txt=$txt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
