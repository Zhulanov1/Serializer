<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 29.04.19
 * Time: 1:12
 */

namespace Zhulanov111\Tests\Classes;

class Comment
{
    public $ID;
    private $author;
    protected $date;

    public function __construct($ID, $author, $date)
    {
        $this->ID = $ID;
        $this->author = $author;
        $this->date = $date;
    }
}