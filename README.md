# Laravel TwigBridge Extensions

## EntrustExtension

Add functions role(), permission(), ability()

### Installation

Require this package with Composer

```bash
composer require "ftl/tbe:~1.0-dev"
```

### Quick Start

Open up config/twigbridge.php and find the enabled key at extensions, and add 'FTL\TBE\EntrustExtension', to the end:
```php
'extensions' => [
    'enabled' => [
        ...
        'FTL\TBE\EntrustExtension',
    ],
],
```
