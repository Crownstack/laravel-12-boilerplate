<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ReturnResponse;

class BaseModel extends Model
{
    use ReturnResponse;

    protected $guarded = [];
}
