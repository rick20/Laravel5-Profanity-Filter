# Laravel 5 & PHP Profanity Filter
Filter profanity, or other words, out of a string using Laravels [localization](https://laravel.com/docs/5.3/localization) feature or with any PHP application and some custom coding.

# Installation
```
composer require askedio/profanity-filter
```
## Register in `config/app.php`
Register the service providers to enable the package:
```
Askedio\ProfanityFilter\ProfanityFilterServiceProvider::class,
```

## Configure
```
php artisan vendor:publish
```

You can edit the default list of words to filter along with the settings in `config/profanity.php`.

`replaceWith` can also be a string of chars to be randomly chosen to replace with, like `'&%^@#'`.

You can create your own list of words, per language, in `resources/lang/[language]/profanity.php`.

# Usage
```php
$string = app('profanity-filter')->filter('something with a bad word');
```
The `$string` will contain the filtered result.

You can also define things inline
```php
$string = app('profanity-filter')->replaceWith('#')->replaceFullWords(false)->filter('something with a bad word'));
```

# Options
* `filter($string = string, $details = boolean)` pass a string to be filtered.

  * Enable details to have an array of results returned:
    ```php
    [
      "orig" => "",
      "clean" => "",
      "hasMatch" => boolean,
      "matched" => []
    ]
    ```
* `reset()` reset `replaceWith` and `replaceFullWords` to defaults.
* `replaceWith(string)` change the chars used to replace filtered strings.
* `replaceFullWords(boolean)` enable to replace full words, disable to replace partial.


# Profanity Filter with PHP
You can also use this package without Laravel.

```php
use Askedio\ProfanityFilter\ProfanityFilter;

$config = []; // Data from `resources/config/profanity.php`
$badWordsArray = []; // Data from `resources/lang/[lang]/profanity.php`

$profanityFilter =  new ProfanityFilter($config, $badWordsArray);
$string = $profanityFilter->filter('something with a bad word');
```



# Credits
This package is based on [banbuilder](https://github.com/snipe/banbuilder).