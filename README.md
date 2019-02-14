# HappyMVC
So happy MVC very justified reason
Are you writing classes for everyone to use, or do you just have a simple website project? Then why are you tired?

You can use composer libraries with happyMVC.

Installation
------------

```bash
composer require insayd10/happymvc
```

Local Development ServerLocal Development Server
------------
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Smiley command. This command will start a development server at http://localhost:8000 or choosed port.

```bash
cd ProjectDir
```
start on 8000
```bash
php smiley serve
```
or start on 3000 
```bash
php smiley serve 3000
```
Template engine docs
------------
http://dwoo.org/documentation/v1.3/index.html

Example routing
------------

```php
# An example about how can be happy :)
setRoute("example", "example@indexAction");
setRoute("example/try-your-message/{msg}", "example@tryYourMessage");
setRoute("another-example", function() { 
    echo "smiley";
});

```

Your controller: example.php
```php
function tryYourMessage($params) {
    print_r($params);
}
```
Using helpers
------------
helpers reposes in src/func dir
you can use helpers on every page.

```php
helper("typer", 1);
slug(...);

```
Using models
------------
New file to models dir.
```php
function getSomeData() {
    etc...
}

```

edit your controller:

```php
useModel("example");
function indexAction()
{
    getSomeData();
}
```

Using views
------------
Your controller file:
```php
function indexAction()
{
    $data = ["msg" => "Just smile", "title" => "happyMVC", "main" => getBaseUrl()];
    getView("example", $data);
}
```
New template file to views: example.dwoo
```html
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>{$title}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="http://localhost/oop1/public/happyHome/css/style.css">
</head>

<body>

  <h2>{$msg}</h2>
<div id="smile">
  <div class="eye"></div>
  <div class="eye"></div>
</div>



</body>

</html>

```

