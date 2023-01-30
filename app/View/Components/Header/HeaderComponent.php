<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class HeaderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public function __construct($title)
    {
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.header-component');
    }
}
