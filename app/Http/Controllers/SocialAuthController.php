<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
use Illuminate\Support\Facades\Session;
use App\Models\custommer;
use App\Models\Social; //sử dụng model Social
use Illuminate\Support\Facades\Log;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('Google')->redirect();
    }

    public function callback()
    {
        $users = Socialite::driver('Google')->user();
        // dd($users);
        // return $users->id;
        $authUser = $this->findOrCreateUser($users, 'Google');

        $account_name = custommer::where('customer_id', $authUser->user)->first();
        Session::put('customer_name', $account_name->customer_name);
        Session::put('customer_id', $account_name->customer_id);
        Session::put('fee', 15000);
        // return redirect()->route('cli_index')->with('message', 'ĐĂNG NHẬP BẰNG TÀI KHOẢN Google THÀNH CÔNG');
        return redirect('/cli/index')->with('message', 'ĐĂNG NHẬP BẰNG TÀI KHOẢN GOOGLE THÀNH CÔNG');
    }

    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        } else {
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
            $customer = custommer::where('customer_email', $users->email)->first();

            if (!$customer) {
                $customer = custommer::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $customer_new->login()->associate($customer);
            $customer_new->save();

            $account_name = custommer::where('customer_id', $authUser->user)->first();
            // dd($authUser);
            Session::put('customer_name', $account_name->customer_name);
            Session::put('customer_id', $account_name->customer_id);
            Session::put('fee', 15000);


            // return redirect()->route('cli_index')->with('message', 'ĐĂNG NHẬP BẰNG TÀI KHOẢN Google THÀNH CÔNG');
            return redirect('/cli/index')->with('message', 'ĐĂNG NHẬP BẰNG TÀI KHOẢN GOOGLE THÀNH CÔNG');

            // return $customer_new;
        }
    }
}
