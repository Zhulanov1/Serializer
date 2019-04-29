<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 29.04.19
 * Time: 1:11
 */

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