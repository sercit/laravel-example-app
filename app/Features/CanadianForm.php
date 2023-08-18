<?php

namespace App\Features;

use App\Models\Subscription;
use Illuminate\Support\Lottery;

class CanadianForm
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(Subscription $subscription): mixed
    {
        return match (true) {
            $subscription->name === 'gold' => true,
            $subscription->name === 'silver' && Lottery::odds(5,100) => true,
            default => false,
        };
    }
}
