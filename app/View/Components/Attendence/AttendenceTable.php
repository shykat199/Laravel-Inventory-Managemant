<?php

namespace App\View\Components\Attendence;

use Illuminate\View\Component;

class AttendenceTable extends Component
{
    public $employee;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employee,$id)
    {
        $this->id=$id;
        $this->employee=$employee;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.attendence.attendence-table');
    }
}
