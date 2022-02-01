<?php
// error_reporting(0);

namespace App\Controllers;

use Google_Client;
use Google_Service;

class Login extends BaseController
{
    protected $google_client = NULL;
    // protected $session;
    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId('146321231399-0h49cssu52qprtc4p2gm4b1uje2av7ol.apps.googleusercontent.com');
        $this->google_client->setClientSecret('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');
        $this->google_client->setRedirectUri('http://localhost:8082/login/loginWithGoogle');
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }

    public function index()
    {
        // include_once APPPATH . "libraries/vendor/autoload.php";
        if (session()->get("userdata")) {
            session()->setFlashdata("Error", "You have already logged in");
            return redirect()->to('data');
        }

        $data['googleButton'] = '<a href="' . $this->google_client->createAuthUrl() . '" ><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';

        return view('login', $data);
        // return redirect()->to('login/loginWithGoogle');

        //----------OLD-----------//
        // if (isset($_GET["code"])) {
        //     $token = $this->google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        //     if (!isset($token["error"])) {
        //         $this->google_client->setAccessToken($token['access_token']);
        //         $session->set('access_token', $token['access_token']);
        //         $google_service = new Google_Service_Oauth2($this->google_client);
        //         $data = $google_service->userinfo->get();
        //         $current_datetime = date('Y-m-d H:i:s');
        //         $user_data = array(
        //             'first_name' => $data['given_name'],
        //             'last_name' => $data['family_name'],
        //             'email_address' => $data['email'],
        //             'profile_picture' => $data['picture'],
        //             'updated_at' => $current_datetime
        //         );
        //         $session->set('user_data', $user_data);
        //         dd($session->get('access_token'));
        //         // $session->set()
        //     }
        // }
        // // dd($this->session->userdata('access_token'));
        // $login_button = '';
        // if (!$session->get('access_token')) {
        //     $login_button = '<a href="' . $this->google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
        //     $data['login_button'] = $login_button;
        //     return view('login', $data);
        // } else {
        //     echo "Login Sukses";
        // }
    }

    public function loginWithGoogle()
    {
        error_reporting(0);
        $token = $this->google_client->fetchAccessTokenWithAuthCode($this->request->getVar("code"));
        // dd($token);
        if (!isset($token['error'])) {
            $this->google_client->setAccessToken($token['access_token']);
            session()->set("access_token", $token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->google_client);
            $data = $googleService->userinfo->get();
            $current_datetime = date('Y-m-d H:i:s');
            $user_data = array(
                'first_name' => $data['given_name'],
                'last_name' => $data['family_name'],
                'email_address' => $data['email'],
                'profile_picture' => $data['picture'],
                'updated_at' => $current_datetime
            );

            session()->set("userdata", $user_data);
        } else {
            session()->setFlashdata("Error", "Login Gagal");
            return redirect()->to('/');
        }
        return redirect()->to('data/input');
    }

    public function logout()
    {
        session()->remove('userdata');
        session()->remove('AccessToken');

        return redirect()->to('login');
    }
}
