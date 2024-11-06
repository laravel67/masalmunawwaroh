<?php

namespace App\Livewire\Home;

use Livewire\Component;
use \App\Models\Slide as Sld;

class Slide extends Component
{
    public function render()
    {
        $slides = Sld::orderBy('id', 'desc')->take(5)->get();
        return view('pages.home.slide', compact('slides'));
    }
}
