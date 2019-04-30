<?php

namespace Zhulanov111\Tests\Classes;


class Post
{
    public $ID;
    protected $post_type;
    private $comments;

    public function __construct($ID, $post_type, $comments)
    {
        $this->ID = $ID;
        $this->post_type = $post_type;
        $this->comments = $comments;
    }
}