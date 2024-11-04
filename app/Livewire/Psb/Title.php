<?php

namespace App\Livewire\Psb;

use App\Models\Taj;
use Livewire\Component;

class Title extends Component
{
    public function render()
    {
        $ta = Taj::where('status', '1')->first();
        if($ta){
            $title = 'FORMULIR PENDAFTARAN PESERTA DIDIK BARU TAHUN AJARAN ' . ($ta ? $ta->name : '');
        }else{
            $title = '';
        }
        return view('pages.psb.title', compact('title'));
    }

}
