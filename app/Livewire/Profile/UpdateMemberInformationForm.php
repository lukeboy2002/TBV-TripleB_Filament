<?php

namespace App\Livewire\Profile;

use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateMemberInformationForm extends Component
{
    use WithFileUploads;

    public User $user;

    public Member $member;

    #[Rule('nullable|min:5')]
    public $bio;

    #[Rule('nullable|min:5')]
    public $city;

    #[Rule('nullable|date')]
    public string $birthdate;

    public function mount(User $user)
    {
        $member = $user->member()->firstOrNew();
        $this->bio = $member->bio;
        $this->city = $member->city;
        $this->birthdate = $member->birthdate;
    }

    public function render(): View
    {
        return view('profile.update-member-information-form');
    }

    public function save(): void
    {
        $this->validate();

        $member = $this->user->member()->firstOrNew();

        $member->user_id = $this->user->id;
        $member->bio = $this->bio;
        $member->city = $this->city;
        $member->birthdate = $this->birthdate;
        $member->save();

        session()->flash('success_small', 'User has been updated');
    }
}
