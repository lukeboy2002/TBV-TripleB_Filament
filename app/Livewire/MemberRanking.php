<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;

class MemberRanking extends Component
{
    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url(history:true)]
    public $sortBy = 'points';

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.member-ranking', [
            'members' => Member::orderBy($this->sortBy,$this->sortDir)
                ->with('user')
                ->get()
        ]);
    }
}
