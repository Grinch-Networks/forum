<?php


namespace Model;


class Post
{

    private $post;

    public function __construct($data){
        $this->post = $data;
    }

    public function getId(){
        return (int)$this->post["id"];
    }

    public function getSectionId(){
        return (int)$this->post["section_id"];
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->post["title"];
    }

    /**
     * @return string
     */
    public function getContent(){
        return $this->post["content"];
    }

    /**
     * @return string
     */
    public function getUsername(){
        return $this->post["username"];
    }

    /**
     * @return string
     */
    public function getCreatedAt(){
        return $this->post["created_at"];
    }


    /**
     * @param Section $section
     * @return Post[]
     */
    public static function getBySection(Section $section ){
        $resp = array();
        $d = Db::read()->prepare('select * from post where section_id = ? ');
        $d->execute(array($section->getId()));
        while( $post = $d->fetch() ){
            $resp[] = new Post( $post );
        }
        return $resp;
    }

    /**
     * @param $id
     * @return false|Post
     */
    public static function get($id){
        $d = Db::read()->prepare('select * from post where id = ? LIMIT 1 ');
        $d->execute( array($id) );
        return ( $d->rowCount() == 1 ) ? new Post( $d->fetch() ) : false;
    }



}