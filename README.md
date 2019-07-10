# Signature Pad librairy with Laravel and Ajax

For the begginers in coding like me who are struggling to implement the great Signature Pad librairy in Laravel framework.
I've decided to use AJAX to POST it. 

### Versions

PHP : PHP 7.1.23

Laravel : Laravel Framework 5.8.27

### Library Signature Pad

https://github.com/szimek/signature_pad

### CSS and JS

I have used Bootstrap already available in Laravel https://laravel.com/docs/5.8/frontend

### CDN

I have used 3 CDN:

```html
<!-- Jquery -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- Signature Pad -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
```

### Signature Pad set-up

1 / See the signature_pad.umd.js file in ressources->js->signature_pad.umd.js

Don't forget to require this file in app.js, ressources->js->app.js :
```js
require('./signature_pad');
```
2 / See the CSS class .wrapper and .signature-pad in the file app.css, public->css->app.css


### Model

In this app my model is 'Signature' with the string attribut 'file'


