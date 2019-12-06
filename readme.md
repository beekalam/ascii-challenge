# Running
```
$ composer install

for viewing on console
$ php console.php

for viewing on web
$ php -S localhost:8000

running tests
$ ./vendor/bin/phpunit
```

# Examples
## Draw a star

```php
$star = new Star(Shape::SMALL);
echo $star->draw();
```

with different characters:

```php
$star = new Star(Shape::LARGE);
$star->setSpaceChar('*')
     ->setDecorationChar('+')
     ->setDelimChar('O');

echo $star->draw();
```

or with `ConsoleFormatter`

```php
$star = new Star(Shape::SMALL);
$cf = new ConsoleFormatter($star);
$cf->setSpaceCharColor(ConsoleFormatter::randomColor())
        ->setDecorationCharColor(ConsoleFormatter::randomColor())
        ->setDelimCharColor(ConsoleFormatter::randomColor())
        ->draw();
```
