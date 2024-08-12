# Access

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![The Whole Fruit Manifesto](https://img.shields.io/badge/writing%20standard-the%20whole%20fruit-brightgreen)](https://github.com/the-whole-fruit/manifesto)

Middleware app access.

## Installation

Via Composer

``` bash
composer require winex01/access
```

## Usage
**Step 1.** install
```bash
# run
php artisan access:install
```
**Step 2.** Other available commands.
```bash
#
php artisan access:migrate:fresh
#
php artisan access:migrate:rollback
#
php artisan license --key=base64EncryptedData

```

## Uninstall this package.
```bash
composer remove winex01/access
```

## Change log

Changes are documented here on Github. Please see the [Releases tab](https://github.com/winex01/access/releases).

## Testing

``` bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for a todolist and howtos.

## Security

If you discover any security related issues, please email winnie131212592@gmail.com instead of using the issue tracker.

## Credits

- [Winnie A. Damayo][link-author]
- [All Contributors][link-contributors]

## License

This project was released under MIT, so you can install it on top of any Backpack & Laravel project. Please see the [license file](license.md) for more information. 

However, please note that you do need Backpack installed, so you need to also abide by its [YUMMY License](https://github.com/Laravel-Backpack/CRUD/blob/master/LICENSE.md). That means in production you'll need a Backpack license code. You can get a free one for non-commercial use (or a paid one for commercial use) on [backpackforlaravel.com](https://backpackforlaravel.com).


[ico-version]: https://img.shields.io/packagist/v/winex01/access.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/winex01/access.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/winex01/access
[link-downloads]: https://packagist.org/packages/winex01/access
[link-author]: https://github.com/winex01
[link-contributors]: ../../contributors
