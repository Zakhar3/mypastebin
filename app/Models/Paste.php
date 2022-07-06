<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Paste extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($paste) {
            $paste->{$paste->getKeyName()} = (string) Str::random(8);
        });
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'code',
        'author',
        'typed',
        'timer',
        'syntax'
    ];
}
