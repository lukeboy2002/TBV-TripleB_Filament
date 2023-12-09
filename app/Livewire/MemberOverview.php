<?php

namespace App\Livewire;

use App\Models\Member;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MemberOverview extends Component
{
    use WithPagination;

    public function render(): View
    {
        $members = Member::with('user')
            ->simplePaginate(1);


        return view('livewire.member-overview', [
            'members'=>$members
        ]);
    }
}
