[![Build Status](https://travis-ci.org/ferfabricio/hydrator.svg?branch=master)](https://travis-ci.org/ferfabricio/hydrator) [![codecov](https://codecov.io/gh/ferfabricio/hydrator/branch/master/graph/badge.svg)](https://codecov.io/gh/ferfabricio/hydrator)

# Hydrator

PHP Library to hydratate objects with class setters

## Instalation

```
composer require ferfabricio/hydrator
```

## How use

If you have a class like this:

```
class Example
{
    private $test;

    public function setTest($test)
    {
        $this->test = $test;
    }

    public function getTest()
    {
        return $this->test;
    }
}
```

And need to create a object from an array:

```
$myData = [
    'test' => 'this is a test'
];
```

You can use `FerFabricio\Hydratate\Hydratate` to do this work in a simple way:

```
use FerFabricio\Hydratate\Hydratate;

class Example
{
    private $test;

    public function setTest($test)
    {
        $this->test = $test;
    }

    public function getTest()
    {
        return $this->test;
    }
}

$myData = [
    'test' => 'this is a test'
];

$example = Hydratate::toObject(Example::class, $myData);
echo $example->getTest(); // This line will print: this is a test
```


## Autoload

This library is only compatible with PSR-4, please be sure if your application is well configured to work with this.
