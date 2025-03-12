<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = ['status'];

    // protected function casts()
    // {
    //     return [
    //         'created_at' => 'datetime:d-m-y',
    //     ];
    // }
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
