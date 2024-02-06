<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    protected $fillable =[
        'request_status',
        'approval_status',
    ];

    protected $attributes =[
        'request_status' => 0,
        'approval_status' => 0,
    ];

    const STATUS_RADIO = [
        '0' => 'pinned',
        '1' => 'accepted',
        '2' => 'rejected',
    ];

}
