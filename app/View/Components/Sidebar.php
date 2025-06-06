<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast\Object_;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     */
    // public $user;
    public function __construct(public $user = '')
    {
        //
        // $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
