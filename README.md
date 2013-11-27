postal-address-bundle [![Build Status](https://travis-ci.org/skonsoft/postal-address-bundle.png?branch=master)](https://travis-ci.org/skonsoft/postal-address-bundle)
=====================

Simple Addressing  management bundle for Symfony2.

## What is it ?
It's a small bundle gives you a basic postal adresses managing.
This bundle give you three ready to use entity to manage a postal adresses.
* Address: a postal address

### Step 1: Install bundle using composer
``` js
{
    "require": {
        // ...
        "skonsoft/postal-address-bundle": "dev-master"
    }
}
```

### Step 2: Register the bundle

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Skonsoft\PostalAddressBundle\SkonsoftPostalAddressBundle(),
    );
    // ...
}
```

### Step 3: Update your schema database
```
#Important: don't use this command in production environnement !

./app/console doctrine:schema:update --force

```

### Step 4: Load fixtures
```
./app/console doctrine:schema:update --force

```


### Step 5: Clear cache

Clear your cache and enjoy !

