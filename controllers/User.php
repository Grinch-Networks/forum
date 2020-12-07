<?php


namespace Controller;


use Model\Session;

class User
{

    /**
     * @return bool
     */
    public static function isAdmin(){
        if( $user = self::checkLogin() ){
            return $user->isAdmin();
        }else{
            return false;
        }
    }

    /**
     * @return false|\Model\User
     */
    public static function checkLogin(){
        $user = false;
        if( isset($_COOKIE["token"]) ){
            if( $session = Session::getByHash($_COOKIE["token"]) ){
                $user = \Model\User::get( $session->getUserId() );
            }
        }
        return $user;
    }

    public static function login(){
        $data = array(
            'error' =>  false
        );
        if( isset($_POST["username"],$_POST["password"])){
            $data["error"] = true;
            if( $user = \Model\User::getByLogin($_POST["username"],$_POST["password"]) ){
                $session = Session::create($user);
                setcookie('token',$session->getHash(),time()+3600,'/');
                \View::redirect('/');
            }
        }
        \View::page('login',$data);
    }



}