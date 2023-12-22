<?php


namespace App\Builders;

//use App\Models\SocialPlatform;
use Illuminate\Database\Eloquent\Builder;

class SocialPlatformBuilder extends Builder{

    public function whereInLikeSocialPlatform(string $socialPlatformName, int $threshold = 40): self
    {
        return $this->whereIn('username',function ($query) use ($socialPlatformName, $threshold){
            $query->select('username')
                ->from('social_platforms')
                ->join('users', 'social_platforms.user_id', '=', 'users.id')
                ->where('social_platform_name', '=', $socialPlatformName)
                ->where('ranking', '>', $threshold);
        });
    }

    public function whereInDislikeSocialPlatform(string $socialPlatformName, int $threshold = 40): self
    {
        return $this->whereIn('username',function ($query) use ($socialPlatformName, $threshold){
            $query->select('username')
                ->from('social_platforms')
                ->join('users', 'social_platforms.user_id', '=', 'users.id')
                ->where('social_platform_name', '=', $socialPlatformName)
                ->where('ranking', '<=', $threshold);
        });
    }

}
