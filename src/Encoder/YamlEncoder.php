<?php

namespace Zhulanov111\Serializer\Encoder;


use Symfony\Component\Yaml\Yaml;

final class YamlEncoder implements EncoderInterface
{
    public function encode(array $data)
    {
        return Yaml::dump($data, 3);
    }
}