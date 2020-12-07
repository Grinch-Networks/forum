<?php


namespace Model;


class Section
{

    private $section;

    private function __construct( $data ){
        $this->section = $data;
    }

    /**
     * @return int
     */
    public function getId(){
        return (int)$this->section["id"];
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->section["name"];
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return ( $this->section["admin"] ) ? true : false;
    }

    public static function getAll( $admin = false ){
        $resp = array();
        $admin = ( $admin ) ? 1 : 0;
        $d = Db::read()->prepare('select * from section where admin = ? ');
        $d->execute( array($admin) );
        while( $section = $d->fetch() ){
            $resp[] = new Section($section);
        }
        return $resp;
    }

    /**
     * @param $id
     * @return false|Section
     */
    public static function get($id){
        $d = Db::read()->prepare('select * from section where id = ? LIMIT 1 ');
        $d->execute( array($id) );
        return ( $d->rowCount() == 1 ) ? new Section( $d->fetch() ) : false;
    }


}