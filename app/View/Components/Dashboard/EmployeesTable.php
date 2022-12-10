<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class EmployeesTable extends Component
{

    public $companyIdFilter;

    public function __construct( $companyIdFilter = '' )
    {
        $this->companyIdFilter = $companyIdFilter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.employees-table');
    }
}
