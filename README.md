# Exposes a simple permission seeder class that aids in creation of roles and permissions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creode/permissions-seeder.svg?style=flat-square)](https://packagist.org/packages/creode/permissions-seeder)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/creode-modules/permissions-seeder/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/creode-modules/permissions-seeder/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/creode-modules/permissions-seeder/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/creode-modules/permissions-seeder/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/creode/permissions-seeder.svg?style=flat-square)](https://packagist.org/packages/creode/permissions-seeder)

Exposes a simple permission seeder class that aids in creation of roles and permissions.

## Installation

You can install the package via composer:

```bash
composer require creode/permissions-seeder
```

## Usage

### The `getPermissions()` function
This is a function used to return an array of permissions to create. By default it uses the following but of course can be overridden in child classes.

```php
protected function getPermissions(): array {
    return [
        'viewAny',
        'view',
        'update',
        'create',
        'delete',
        'destroy',
    ];
}
```

### The `getPermissionGroup()` function
This is an abstract function used to determine the type of resource to create permissions for. It should return a string for example "Asset". This is used to be appended to the end of the permission name for instance "viewAnyAsset" or "deleteAsset". It also is used to determine the name of the role to create.
```php
protected function getPermissionGroup(): string {
    return 'Asset';
}
```

### The getRoleName() function
This is a function used to return the name of the role to create. By default it uses the following but of course can be overridden in child classes. It defaults to the following but can be overridden in child classes:

```php
protected function getRoleName(): string {
    return strtolower($this->getPermissionGroup().'-manager');
}
```

### Properties
This class exposes the following properties that can be used to override the default behaviour:

```php
/** Determines if we should give super admin permissions to this group. */
protected $giveSuperAdminPermissions = true;

/** Determines if we should create a role for this group. */
protected $shouldCreateRole = true;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Creode](https://github.com/creode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
