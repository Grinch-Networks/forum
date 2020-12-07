<?php


namespace Model;


class Session
{

    private $session;

    private function __construct($data){
        $this->session = $data;
    }

    /**
     * @return int
     */
    public function getUserId(){
        return (int)$this->session["user_id"];
    }

    /**
     * @return string
     */
    public function getHash(){
        return $this->session["hash"];
    }

    /**
     * @param User $user
     * @return Session
     */
    public static function create(User $user ){
        $hash = md5( microtime().rand().print_r($_SERVER,true)  );
        $d = Db::write()->prepare('insert into session (user_id,hash)  ');
        $d->execute( array($user->getId(),$hash) );
        return new Session(array(
            'user_id'   =>  $user->getId(),
            'hash'      =>  $hash
        ));
    }

    /**
     * @param $hash
     * @return false|Session
     */
    public static function getByHash($hash){
        $d = Db::read()->prepare('select * from session where hash = ? LIMIT 1 ');
        $d->execute( array($hash) );
        return ( $d->rowCount() ) ? new Session($d->fetch()) : false;
    }

}