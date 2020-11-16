# Installation
```
composer require nataniel/vocative
```

# Usage
```php
use Nataniel\Vocative;
$vocative = new Vocative();

echo $vocative->invoke('Kasia');
# Kasiu

echo $vocative->invoke('Mściwój Kowalski');
# Mściwoju
```