<?php

namespace Zhulanov111\Tests;


require_once '../vendor/autoload.php';

use Zhulanov111\Tests\Classes\Post;
use Zhulanov111\Tests\Classes\Comment;
use Zhulanov111\Tests\Classes\User;
use Zhulanov111\Serializer\Serializer;
use Zhulanov111\Serializer\Encoder\JsonEncoder;
use Zhulanov111\Serializer\Encoder\YamlEncoder;

$post = new Post(1, 'post', new Comment(1, new User('vasya@some.com'), '2019/04/22'));

var_dump($post);


$serializer = new Serializer();

$yaml_encoder = new YamlEncoder();
$json_encoder = new JsonEncoder();

$json_data =  $serializer->serialize($post, $json_encoder, 'all');
$yaml_data =  $serializer->serialize($post, $yaml_encoder, 'all');

echo "\n <----Format data----> \n\n";

print_r($yaml_data);




