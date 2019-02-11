<?php

namespace App\Models;

use App\Models\Traits\HasConfirmationTokens;
use App\Models\Traits\HasSubscriptions;
use App\Models\Traits\HasTwoFactorAuthentication;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Laravel\Passport\HasApiTokens;
use \TCG\Voyager\Models\User as BaseUser;

class User extends BaseUser
{
    use Billable, Notifiable, HasConfirmationTokens, HasSubscriptions, HasTwoFactorAuthentication, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'activated',
        'provider',
        'provider_id',
        'application_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasNotActivated()
    {
        return !$this->hasActivated();
    }

    public function hasActivated()
    {
        return $this->activated;
    }

    public function getPlanAttribute()
    {
        return $this->plan();
    }

    public function plan()
    {
        return $this->plans->first();
    }


    public function plans()
    {
        return $this->hasManyThrough(
            Plan::class, Subscription::class, 'user_id', 'gateway_id', 'id', 'stripe_plan'
        )->orderBy('subscriptions.created_at', 'desc');
    }

}
