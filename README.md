Awimage Image Optimizer CDN
===========================

[![Latest Stable Version](https://img.shields.io/packagist/v/awimage/yii2-image-optimizer-cdn.svg)](https://packagist.org/packages/awimage/yii2-image-optimizer-cdn)
[![Total Downloads](https://img.shields.io/packagist/dt/awimage/yii2-image-optimizer-cdn.svg)](https://packagist.org/packages/awimage/yii2-image-optimizer-cdn)

Awimage Image Optimizer CDN Widget

Service.
-------
this widget is prepared to be used with Awimage services, right now on testing stage,  if you want to be part and help us test it please let us know at awimage@coderteams.com.


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist awimage/yii2-image-optimizer-cdn "*"
```

or add

```
"awimage/yii2-image-optimizer-cdn": "*"
```

to the require section of your `composer.json` file.




Usage
-----

Once the extension is installed, simply use it in your code by:



```php
<?= \awimage\imageOptimizer\Img::widget([
    'src' => 'https://www.yourdomain.com/yourimage.jpg',
    'MaxWidthForMobile' => '460',
    'MaxWidthForTablet' => '760',
    'MaxWidthForDesktop' => '1280',
    'options' => [
        'alt' => 'Your super awesome alternative text'
        ]
      ]); ?>
    ```
