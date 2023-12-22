<?php

namespace App\Http\Controllers;

use App\Rules\ValueRequestRule;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\SocialPlatform;
use Illuminate\Support\Facades\Auth;

class SocialPlatformController extends Controller
{
    public array $messages = [
        'required_unless' => 'The field is required',
        'between'=>'The field must be between 1 and 100',
        'max'=>'Maximum length is 100',
        'required_without_all'=>'At least one field is required'
    ];

    public function search(Request $request){

        $rules = [
            'facebook'=>['bail','required_without_all:linkedin,x,instagram,reddit'],
            'linkedin'=>['bail','required_without_all:facebook,x,instagram,reddit'],
            'x'=>['bail','required_without_all:facebook,linkedin,instagram,reddit'],
            'instagram'=>['bail','required_without_all:facebook,linkedin,x,reddit'],
            'reddit'=>['bail','required_without_all:facebook,linkedin,x,instagram'],
        ];

        $validator = Validator::make($request->all(), $rules, $this->messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator);
        }

        $facebookRating = $request->string('facebook')->value();
        $linkedinRating = $request->string('linkedin')->value();
        $xRating = $request->string('x')->value();
        $instagramRating = $request->string('instagram')->value();
        $redditRating = $request->string('reddit')->value();

        $usernames = SocialPlatform::query()
            ->select('username')
            ->join('users', 'social_platforms.user_id', '=', 'users.id')
            ->when($facebookRating === 'like', function ($query)  {
               $query->whereInLikeSocialPlatform('facebook');
            })
            ->when($facebookRating === 'dislike', function ($query) {
                $query->whereInDislikeSocialPlatform('facebook');
            })
            ->when($linkedinRating === 'like', function ($query) {
                $query->whereInLikeSocialPlatform('linkedin');;
            })
            ->when($linkedinRating === 'dislike', function ($query) {
                $query->whereInDislikeSocialPlatform('linkedin');
            })
            ->when($xRating === 'like', function ($query) {
                $query->whereInLikeSocialPlatform('x');
            })
            ->when($xRating === 'dislike', function ($query) {
                $query->whereInDislikeSocialPlatform('x');
            })
            ->when($instagramRating === 'like', function ($query) {
                $query->whereInLikeSocialPlatform('instagram');
            })
            ->when($instagramRating === 'dislike', function ($query) {
                $query->whereInDislikeSocialPlatform('instagram');
            })
            ->when($redditRating === 'like', function ($query) {
                $query->whereInLikeSocialPlatform('reddit');
            })
            ->when($redditRating === 'dislike', function ($query) {
                $query->whereInDislikeSocialPlatform('reddit');
            })
            ->get()->toArray();

        $arr=array_unique($usernames, SORT_REGULAR);

//        $arr = array_map("unserialize", array_unique(array_map("serialize", $usernames)));

//        $tempArr = array_unique(array_column($usernames, 'username'));
//        $arr = array_intersect_key($usernames, $tempArr);

        return response()->json(data: $arr, status: 200);

//        Bez Fetch API
//        return redirect()->route('homepage')->with(['items'=> $arr]);
    }

    public function updateLink(SocialPlatform $link, Request $request){

        $validator = Validator::make($request->all(), [
            $link->social_platform_name . '-link'=>['bail','required_unless:rank,null',new ValueRequestRule(),'max:100'],
            'rank'=>['bail','required_unless:' . $link->social_platform_name  . '-link,null','nullable','integer','between:1,100'],
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('link/' . $link->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $link->update(['profile_link'=> $request->get($link->social_platform_name .'-link'), 'ranking'=>$request->get('rank')]);

        return redirect('/profile/'.\auth()->user()->username)->with('success', 'Successfully updated');
    }

    public function editLinkView(SocialPlatform $link){
        return view('edit-social-platform-link', ['link'=>$link]);
    }
    public function delete(SocialPlatform $link){
        $link->delete();
        return redirect('/profile/' . \auth()->user()->username)->with('success', 'Successfully deleted');
    }
    public function addLinksView(){
        return view('add-links');
    }

    public function addLinks(Request $request){

        if (!array_filter((array) $request->except(['_token']) )){
            return response()->json(['validation'=>'empty', 'username'=>\auth()->user()->username]);
        }

        $validator = Validator::make($request->all(), [
            'facebook-link'=>['bail','required_unless:rank-f,null',new ValueRequestRule(),'max:100'],
            'rank-f'=>['bail','required_unless:facebook-link,null','nullable','integer','between:1,100'],
            'linkedin-link'=>['bail','required_unless:rank-l,null',new ValueRequestRule(),'max:100'],
            'rank-l'=>['bail','required_unless:linkedin-link,null','nullable','integer','between:1,100'],
            'x-link'=>['bail','required_unless:rank-x,null',new ValueRequestRule(),'max:100'],
            'rank-x'=>['bail','required_unless:x-link,null','nullable','integer','between:1,100'],
            'instagram-link'=>['bail','required_unless:rank-i,null',new ValueRequestRule(),'max:100'],
            'rank-i'=>['bail','required_unless:instagram-link,null','nullable','integer','between:1,100'],
            'reddit-link'=>['bail','required_unless:rank-r,null',new ValueRequestRule(),'max:100'],
            'rank-r'=>['bail','required_unless:reddit-link,null','nullable','integer','between:1,100'],
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $userId = Auth::id();
        $data = array();

        if ($request->get('facebook-link') !== null){
            $data[] = array('profile_link'=> $request->get('facebook-link'), 'ranking'=>$request->get('rank-f'), 'social_platform_name'=>'facebook', 'user_id'=>$userId);
        }
        if ($request->get('linkedin-link') !== null){
            $data[] = array('profile_link'=> $request->get('linkedin-link'), 'ranking'=>$request->get('rank-l'), 'social_platform_name'=>'linkedin','user_id'=>$userId);
        }
        if ($request->get('x-link') !== null){
            $data[] = array('profile_link'=> $request->get('x-link'), 'ranking'=>$request->get('rank-x'), 'social_platform_name'=>'x', 'user_id'=>$userId);
        }
        if ($request->get('instagram-link') !== null){
            $data[] = array('profile_link'=> $request->get('instagram-link'), 'ranking'=>$request->get('rank-i'), 'social_platform_name'=>'instagram', 'user_id'=>$userId);
        }
        if ($request->get('reddit-link') !== null){
            $data[] = array('profile_link'=> $request->get('reddit-link'), 'ranking'=>$request->get('rank-r'), 'social_platform_name'=>'reddit', 'user_id'=>$userId);
        }


        SocialPlatform::upsert($data, ['social_platform_name', 'user_id'], ['profile_link', 'ranking']);

        return response()->json(['validation'=>'passed', 'username'=>\auth()->user()->username]);
    }
}
