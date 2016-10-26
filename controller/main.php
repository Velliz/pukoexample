<?php
namespace controller;

use model\Members;
use pukoframework\auth\Auth;
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

            if($member) $this->RedirectTo(BASE_URL . 'login');
            else $this->RedirectTo(BASE_URL . 'failed');
        }

        $vars['total'] = Members::CountAll()[0]['total'];
        return $vars;
    }

    public function e_login()
    {

    }

    public function e_logout()
    {

    }

    public function Login($username, $password)
    {
    }

    public function Logout()
    {
    }

    public function GetLoginData($id)
    {
    }
}