<?php


namespace App\Models\Abilities;


use DateTimeInterface;

trait DateFormatable {
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
