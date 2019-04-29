Serializer
===============

Php library for serializing data of various objects into formats json and xml

Usage
-----
1. To use the serializer, specify which encoders you will use.

```php
 <?php
    ...
    use Zhulanov111\Serializer\Serializer;
    use Zhulanov111\Serializer\Encoder\JsonEncoder;
    use Zhulanov111\Serializer\Encoder\YamlEncoder;
```
2. We need to create objects of the serializer and encoder (json, yaml).
```php
 <?php
    ...
    $serializer = new Serializer();
    $json_encoder = new JsonEncoder();
```
3. Finally, serialization itself (suppose that we have an object of Post class, )
```php
 <?php
    ...
    $json_data = $serializer->serialize($post, $json_encoder, 'all');
```
Pay attention to the 3 argument of the `Serialiler :: serialize(object $object, encoderInterface $encoder, string $config)`, in it you can specify with which scope of the property you want to get. There are 4 options available:
   - public
   - protected
   - private
   - all
   
   The default value is `public`.
   