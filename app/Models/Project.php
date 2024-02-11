<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model  implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable =[
        'title',
        'description',
        'start_date',
        'deadline',
        'budget',
        'status',
    ];

    protected $attributes =[
        'status'=>0,
    ];

    const STATUS_RADIO =[
        '0' => 'planning',
        '1' => 'In progress',
        '2' => 'On hold',
        '3' => 'Completed',
    ];

    public function users()
    {
        return $this->belongsToMany(user::class);

    }
    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }

}
