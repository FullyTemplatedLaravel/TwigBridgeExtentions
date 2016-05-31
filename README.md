# Laravel TwigBridge Extensions

## Installation

Require this package with Composer

```json
    "require": {
        ...
        "ftl/tbe": "^1.0-dev"
    },
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://github.com/FullyTemplatedLaravel/TwigBridgeExtentions"
        }
    ]
```

## Quick Start

Open up config/twigbridge.php and find the enabled key at extensions, and add 'FTL\TBE\EntrustExtension', to the end:
```php
'extensions' => [
    'enabled' => [
        ...
        'FTL\TBE\EntrustExtension',
    ],
],
```

## Extensions

### EntrustExtension

Add functions role(), permission(), ability()

### NotificationsExtension

Add functions n_info(), n_success(), n_warning(), n_danger(), n_error()
NotificationsExtension based on [Laravel Convenient System Notifications](https://github.com/gaaarfild/laravel-notifications)


