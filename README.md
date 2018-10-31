# Doctrine ArrayPipe

An array pipe type for Doctrine MYSQL

## Installation:

```shell
composer require gollumsf/doctrine-arraypipe
```

## Configuration:

```yaml
doctrine:
    dbal:
        types:
            array_pipe: GollumSF\Doctrine\ArrayPipe
```


## Usage:


```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 */
class Entity {
	
	/**
	 * @ORM\Column(type="array_pipe")
	 * @var int
	 */
	private $arrayPipe = [
		'ROLE_EXAMPLE', 'ROLE_USER', 'ROLE_ADMIN'
	];
	// Storage data in database with value: ROLE_EXAMPLE|ROLE_USER|ROLE_ADMIN
	
	
	/////////
	// ... //
	/////////
	
}
```
