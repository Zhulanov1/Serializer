<?php

namespace Zhulanov111\Serializer\Encoder;


final class JsonEncoder implements EncoderInterface
{
    public function encode(array $data)
    {
        return json_encode($data);
    }
}