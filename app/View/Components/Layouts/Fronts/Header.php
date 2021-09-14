<?php

namespace App\View\Components\Layouts\Fronts;

use App\Models\User;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = User::all()->first();
        return view('components.layouts.fronts.header', compact('users'));
    }
}
