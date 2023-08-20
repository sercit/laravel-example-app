<?php

namespace App\Enum;

enum PostStatusEnum: string {
    case Draft = 'draft';
    case Published = 'published';
}
