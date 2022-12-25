<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $clases;
	public function __construct($type = 'info')
	{
		switch($type) {
			case 'info':
				$clases = "bg-blue-100 border-blue-500 text-blue-700";
				break;
			case 'danger':
				$clases = "bg-red-100 border-red-500 text-red-700";
				break;
			default:
				$clases = "bg-orange-100 border-orange-500 text-orange-700";
				break;
		}
		$this->clases = $clases;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
