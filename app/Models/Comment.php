<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = false;

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getDateAsCarbonAttribute(){
        return Carbon::parse($this->created_at);
    }
}
