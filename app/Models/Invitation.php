<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'email',
        'invited_by',
        'invited_date',
        'invitation_token',
        'registered_at',
    ];

    protected $casts = [
        'invited_date' => 'datetime',
    ];

    public function generateInvitationToken(): void
    {
        $this->invitation_token = substr(md5(rand(0, 9).$this->email.time()), 0, 32);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return urldecode(route('user.create').'?invitation_token='.$this->invitation_token);
    }

    public function getInvitationDate()
    {
        return $this->invited_date->format('d F Y');
    }
}
