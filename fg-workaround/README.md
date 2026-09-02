# fg-workaround

This sample shows a workaround that can be used to use multiple dependencies added to FunctionGraph.

On adding dependencies to FunctionGraph, they will be unpacked to folder ```./vendor```, but the autoload.php is not adapted.

PackageLoader.php allows to load all composer.json from all ```./vendor/**/composer.json``` files as composer would do.

> [!CAUTION]
> This workaround only works if there are no conflicts in
> unzipped dependencies.

## Support


- PSR-4: YES
- PSR-0: YES
- Classmap: NO
- Files: YES

## Usage

```php
<?php
// load PackageLoader
include __DIR__.'/PackageLoader.php';
$loader = new \PackageLoader\PackageLoader();

// load all packages found in /vendor folder
$loader->loadVendor(__DIR__ . "/vendor");
```

## Note
PackageLoader.php is inspired by [https://github.com/Wilkins/composer-file-loader](https://github.com/Wilkins/composer-file-loader)