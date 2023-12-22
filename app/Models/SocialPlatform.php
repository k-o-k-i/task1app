<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Builders\SocialPlatformBuilder;

class SocialPlatform extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['profile_link', 'ranking', 'user_id'];



//    public function toSearchableArray()
//    {
//        return [
//            'ranking' => $this->ranking,
//            'user_id' => $this->user_id,
//            'social_platform_name'=>$this->social_platform_name,
//            'users.username' => ''
//        ];
//    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toSearchableArray()
    {
        return [
            'ranking' => '',
            'user_id' => '',
            'social_platform_name'=> '',
            'users.username' => ''
        ];
    }

    public function newEloquentBuilder($query): SocialPlatformBuilder
    {
        return new SocialPlatformBuilder($query);
    }
}
