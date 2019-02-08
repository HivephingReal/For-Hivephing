<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    protected $table = 'noti';

    protected $primaryKey = 'id';

    protected $fillable=['post_id', 'com_id', 'seen', 'created_at', 'updated_at'];
}
