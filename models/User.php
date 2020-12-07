<?php


namespace Model;


class User
{

    private $user;

    private function __construct($data){
        $this->user = $data;
    }

    /**
     * @return int
     */
    public function getId(){
        return (int)$this->user["id"];
    }

    /**
     * @return mixed
     */
    public function getUsername(){
        return $this->user["username"];
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return ( $this->user["admin"] ) ? true : false;
    }

    /**
     * @param $username
     * @param $password
     * @return false|User
     */
    public static function getByLogin($username, $password){
        $d = Db::read()->prepare('select * from user where username = ? and password = ? LIMIT 1 ');
        $d->execute( array($username,md5($password)));
        return ( $d->rowCount() == 1 ) ? new User($d->fetch()) : false;
    }

    /**
     * @param $id
     * @return false|User
     */
    public static function get($id){
        $d = Db::read()->prepare('select * from user where id = ? LIMIT 1 ');
        $d->execute( array($id) );
        return ( $d->rowCount() == 1 ) ? new User($d->fetch()) : false;
    }

}