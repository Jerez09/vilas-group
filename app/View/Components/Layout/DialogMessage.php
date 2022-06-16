<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class DialogMessage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $message;
    public $status;

    public function __construct($message, $status)
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.dialog-message');
    }
}
