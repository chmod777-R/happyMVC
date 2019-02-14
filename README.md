# HappyMVC
So happy MVC very justified reason
Are you writing classes for everyone to use, or do you just have a simple website project? Then why are you tired?

You can use composer libraries with happyMVC.

Installation
------------

```bash
composer require insayd10/happymvc
```

Template engine docs
------------
http://dwoo.org/documentation/v1.3/index.html

Example routing
------------

```bash
<?php
# An example about how can be happy :)
setRoute("example", "example@indexAction");
setRoute("example/try-your-message/{msg}", "example@tryYourMessage");
setRoute("another-example", function() { 
    echo "smiley";
});

```
Using helpers
------------
helpers reposes in src/func dir
you can use helpers on every page.

```bash
<?php
helper("typer", 1);
slug(...);

```
