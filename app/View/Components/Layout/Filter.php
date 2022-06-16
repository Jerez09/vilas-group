<?php

namespace App\View\Components\Layout;

use App\Models\Country;
use App\Models\LuxuryTypes;
use App\Models\Property_Type;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $countries;
    public $property_types;
    public $luxury_types;

    public function __construct()
    {   
        // Fetching all the data needed for the filter from the database
        $this->countries = Country::all();
        $this->property_types = Property_Type::all();
        $this->luxury_types = LuxuryTypes::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.filter');
    }
}
