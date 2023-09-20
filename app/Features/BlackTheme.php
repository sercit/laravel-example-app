<?php

namespace App\Features;

use App\Models\Subscription;
use Illuminate\Support\Lottery;

class BlackTheme
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(Subscription $subscription): mixed
    {
        return match (true) {
            $subscription->level === 'gold' => true,
            $subscription->level === 'silver' && Lottery::odds(5, 100) => true,
            default => false,
        };
    }
}
