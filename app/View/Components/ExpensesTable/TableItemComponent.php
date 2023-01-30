<?php

namespace App\View\Components\ExpensesTable;

use Illuminate\View\Component;

class TableItemComponent extends Component
{
    public $expense;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($expense,$id)
    {
        $this->expense=$expense;
        $this->id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.expenses-table.table-item-component');
    }
}
