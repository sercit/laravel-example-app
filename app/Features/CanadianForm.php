<?php

namespace App\Features;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Lottery;

class CanadianForm
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(User $user): mixed
    {
        return match (true) {
            $user->subscription->level > 30 => true,
            $user->subscription->level <= 30 && Lottery::odds(100,100) => true,
            default => false,
        };
    }
}
