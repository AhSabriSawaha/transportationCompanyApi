<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SettingData extends Data
{
    public function __construct(
        public string|Optional $about_us,
        public string|Optional $phone_number,
        public string|Optional $email,
        public string|Optional $facebook,
        public string|Optional $website,
        public string|Optional $address,
        public string|Optional $work_time,
    ) {}
}

