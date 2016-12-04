<?php
namespace controller;

use model\Members;
use pukoframework\auth\Auth;
use pukoframework\auth\Session;
use pukoframework\pda\DBI;
use pukoframework\pte\View;
use pukoframework\Request;

class main extends View implements Auth
{

    /**
     * #Value PageTitle Puko Framework
     */
    public function main()
    {

    }

    /**
     * #Value PageTitle Registrasi Member Baru
     * #DisplayException true
     */
    public function register()
    {
        if (Request::IsPost()) {
            $email = Request::Post('email', null);
            $password = Request::Post('password', null);

            $name = Request::Post('name', null);
            $address = Request::Post('address', null);

            $member = Members::Create(array(
                'created' => DBI::NOW(),
                'email' => $email,
                'password' => md5($password),
                'name' => $name,
                'address' => $address,
            ));
            if ($member) $this->RedirectTo(BASE_URL . 'login');
            else $this->RedirectTo(BASE_URL . 'failed');
        }

        $vars['total'] = Members::CountAll()[0]['total'];
        return $vars;
    }

    /**
     * #Value PageTitle Login Member
     */
    public function e_login()
    {
        if (Request::IsPost()) {
            $email = Request::Post('email', null);
            $password = Request::Post('password', null);

            $login = Session::Get($this)->Login($email, $password);
            $user = Session::Get($this)->GetLoginData();

            Members::Update(array('id' => $user['id']), array(
                'logincount' => (int)$user['logincount'] + 1
            ));
            if ($login) $this->RedirectTo(BASE_URL . 'home');
            else $vars['error'] = 'Login failed.';
        }
        $vars['total'] = Members::CountAll()[0]['total'];
        return $vars;
    }

    /**
     * #Value PageTitle Home Member
     * #Auth true
     */
    public function home()
    {
        $vars = Session::Get($this)->GetLoginData();
        return $vars;
    }

    public function e_logout()
    {
        Session::Get($this)->Logout();
        $this->RedirectTo(BASE_URL . 'login');
    }

    public function Login($username, $password)
    {
        $user = Members::GetData($username, md5($password));
        return isset($user[0]['id']) ? $user[0]['id'] : false;
    }

    public function Logout()
    {
        // release another user source here
    }

    public function GetLoginData($id)
    {
        return Members::GetID($id)[0];
    }
}