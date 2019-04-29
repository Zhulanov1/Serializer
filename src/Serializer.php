<?php

namespace Zhulanov111\Serializer;


require_once '../vendor/autoload.php';

use Zhulanov111\Serializer\Encoder\EncoderInterface;
use Zhulanov111\Serializer\Exceptions\NoValidConfigSerializer;


final class Serializer implements SerializerInterface
{
    private $object;

    private $encoder;

    private $object_data = [];

    private $config;

    private $valid_config_params = ['public' => \ReflectionProperty::IS_PUBLIC ,
                                    'protected' => \ReflectionProperty::IS_PROTECTED,
                                    'private' => \ReflectionProperty::IS_PRIVATE,
                                    'all' => null];


    /**
     * @param object $object
     * @param EncoderInterface $encoder
     * @param string $config, allowed values: public, private, protected, 'all'
     * @return mixed
     * @throws NoValidConfigSerializer
     */
    public function serialize(object $object, EncoderInterface $encoder, string $config = 'public')
    {
        $this->object = $object;

        $this->encoder = $encoder;

        $this->setConfig($config);

        $this->setObjectData();

        return $this->encoder->encode($this->object_data);
    }

    private function setConfig($config)
    {
        $config = strtolower($config);

        if (\key_exists($config, $this->valid_config_params)) {
            $this->config = $this->valid_config_params[$config];
        } else {
            throw new NoValidConfigSerializer('no valid config');
        }

    }

    private function setObjectData()
    {
        $this->object_data = $this->prepareObjectData($this->object, $data);
    }

    private function prepareObjectData($obj, &$data)
    {
        $reflect = new \ReflectionObject($obj);

        if ($this->config) {
            $properties = $reflect->getProperties($this->config);
        } else {
            $properties = $reflect->getProperties();
        }

        foreach ($properties as $property) {
            $property->setAccessible(true);

            if (is_object($property->getValue($obj))) {
                $data[$property->getName()] = [];
                $this->prepareObjectData($property->getValue($obj), $data[$property->getName()]);
            } else {
                $data[$property->getName()] = $property->getValue($obj);
            }

            $property->setAccessible(false);

        }

        return $data;

    }

}