PaladinUserBundle
=============

The PaladinUserBundle adds support for a database-backed user system in Symfony4.


Installation
------------


```sh
composer require paladinbbk/user-bundle
```


Create Entity User
```php

<?php
// src/Entity/User.php

namespace App\Entity;

use Paladin\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

```

add routes
```yaml
#config/routes.yaml

paladin.user:
    resource: '@PaladinUserBundle/Resources/config/routing/routes.yaml'

```


put security.yaml
```yaml
#config/packages/security.yaml

security:
    encoders:
        App\Entity\User:
            algorithm: bcrypt
            cost: 12

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: ROLE_ADMIN

    providers:
        user_db:
            entity: { class: App\Entity\User, property: username }
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            pattern: ^/
            form_login:
                provider: user_db
                login_path: /login
                check_path: /login_check
            logout:       true
            anonymous:    true

    access_control:
        # - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/login$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/registration, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/resetting, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/, roles: ROLE_USER }

```

update database schema:
```sh
php bin/console doctrine:schema:update --force
```

create user:
```sh
php bin/console paladin:user:create
```