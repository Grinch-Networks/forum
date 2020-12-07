<?php


namespace Controller;


use Model\Comment;
use Model\Post;
use Model\Section;

class Forum
{


    public static function home(){
        $general = array();
        foreach( Section::getAll() as $section ){
            $general[] = array(
                'id'    =>  $section->getId(),
                'name'  =>  $section->getName(),
                'posts' =>  count( Post::getBySection($section))
            );
        }
        $admin = array();
        foreach( Section::getAll(true) as $section ){
            $admin[] = array(
                'id'    =>  $section->getId(),
                'name'  =>  $section->getName(),
                'posts' =>  count( Post::getBySection($section)),
            );
        }
        $data = array(
            'admin'     =>  User::isAdmin(),
            'header'    =>  array(
                'title' =>  'Forum'
            ),
            'section'   =>  array(
                'general'   =>  $general,
                'admin'    =>  $admin
            )
        );
        \View::page('home',$data);
    }

    public static function post($arg){
        if( $post = Post::get($arg[2])  ){
            if( $post->getSectionId() == $arg[1] ){
                $section = Section::get($post->getSectionId());
                if( $section->isAdmin() && !User::isAdmin() ){
                    \View::page('404');
                    exit();
                }
                $comments = array();
                foreach( Comment::getByPost($post) as $comment ){
                    $comments[] = array(
                        'user'      =>  $comment->getUsername(),
                        'content'   =>  $comment->getContent(),
                        'date'      =>  $comment->getCreatedAt()
                    );
                }
                $data = array(
                    'section'   =>  array(
                        'id'    =>  $section->getId(),
                        'name'  =>  $section->getName()
                    ),
                    'post'  =>  array(
                        'name'      =>  $post->getTitle(),
                        'user'      =>  $post->getUsername(),
                        'content'   =>  $post->getContent(),
                        'date'      =>  $post->getCreatedAt()
                    ),
                    'comments'      =>  $comments,
                );

                \View::page('post',$data);
            }else{
                \View::page('404');
            }
        }else{
            \View::page('404');
        }
    }

    public static function section($arg){
        if( $section = Section::get($arg[1]) ){
            if( $section->isAdmin() && !User::isAdmin() ){
                \View::page('404');
                exit();
            }
            $posts = array();
            foreach( Post::getBySection($section) as $post ){
                $posts[] = array(
                    'id'        =>  $post->getId(),
                    'name'      =>  $post->getTitle(),
                    'comments'  =>  count( Comment::getByPost($post ))
                );
            }
            $data = array(
                'section'   =>  array(
                    'id'        =>  $section->getId(),
                    'name'      =>  $section->getName(),
                    'posts'     =>  $posts
                )
            );
            \View::page('section',$data);
        }else{
            \View::page('404');
        }
    }


}