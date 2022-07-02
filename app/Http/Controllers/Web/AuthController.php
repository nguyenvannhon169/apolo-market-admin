<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $userRepository;

    public function __construct(UserServiceInterface $userRepository)
    {
        $this->userRepository =  $userRepository;
    }

    public function redirectToProvider ($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback ()
    {
        try
        {
            $api = Socialite::driver(config('auth.socialite.drivers.google'))->user();
            $user = $this->userRepository->findAndUpdateAccountByGoogle($api->getId(),$api->user);
            Auth::login($user,true);
        } catch (Exception $e)
        {
            return redirect()->route('auth.show.login');
        }

        return redirect()->route('home');
    }
}
