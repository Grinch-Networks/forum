<?php namespace Model;


class Comment
{

    private $comment;

    private function __construct( $data ){
        $this->comment = $data;
    }

    public function getId(){
        return (int)$this->comment["id"];
    }

    public function getPostId(){
        return (int)$this->comment["section_id"];
    }

    /**
     * @return string
     */
    public function getContent(){
        return $this->comment["content"];
    }

    /**
     * @return string
     */
    public function getUsername(){
        return $this->comment["username"];
    }

    /**
     * @return string
     */
    public function getCreatedAt(){
        return $this->comment["created_at"];
    }

    /**
     * @param Post $post
     * @return Comment[]
     */
    public static function getByPost(Post $post ){
        $resp = array();
        $d = Db::read()->prepare('select * from comment where post_id = ? ');
        $d->execute( array($post->getId()) );
        while( $comment = $d->fetch() ){
            $resp[] = new Comment( $comment );
        }
        return $resp;
    }


}