<?php
// php artisan make:model Like -m (-m to create migration)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likeable () {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
