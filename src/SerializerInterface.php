<?php

namespace Zhulanov111\Serializer;


use Zhulanov111\Serializer\Encoder\EncoderInterface;

interface SerializerInterface
{
    public function serialize(object $object, EncoderInterface $encoder, string $config = 'public');
}