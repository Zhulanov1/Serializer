<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 29.04.19
 * Time: 1:13
 */

namespace Zhulanov111\Tests\Classes;


class User
{
    public $name;
    protected $age;
    private $email;

    public function __construct($email, $age = 20, $name = 'noname')
    {
        $this->email = $email;
        $this->name = $name;
        $this->age = $age;
    }
}