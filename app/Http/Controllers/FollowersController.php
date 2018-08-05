<?php

namespace App\Http\Controllers;

use App\Notifications\NewUserFollowNotification;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    protected $userRepository;

    /**
     * FollowersController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($id)
    {
        $user=$this->userRepository->byId($id);
        $followers=$user->followersUser()->pluck('follower_id')->toArray();
        if (in_array(user('api')->id,$followers)){
            return response()->json(['followed'=>true]);
        }
        return response()->json(['followed'=>false]);
    }

    public function follow()
    {
        $userToFollow=$this->userRepository->byId(\request('user'));
        $followed=user('api')->followThisUser($userToFollow->id);
        if(count($followed['attached'])>0){
            $userToFollow->notify(new NewUserFollowNotification());
            return response()->json(['followed'=>true]);
        }
        return response()->json(['followed'=>false]);
    }
}
