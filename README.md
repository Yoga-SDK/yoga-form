# Yoga Form Build
## Sumary
* [Version Support](#version-support)
* [Getting Started](#getting-started)
* [Examples](#examples)
* [Api](#api)
    * [Form](#form)
    * [Field](#field)

## Version Support

| Laravel | Yoga Form |
|:-------:|:---------:|
| v7.*    |  v1.*     |

## Getting Started
```bash
composer require yoga/form
```

## Examples
### Login Example
```php
<?php

namespace App\Http\Controllers;

use Yoga\Form\{Form, Button, Field};
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function form()
    {
        return
            Form::create(['action' => url('/login')], [
                Field::email()->setRules('required|email'),
                Field::password()->setRules('required|min:6|max:16'),
                Button::info('Log in')
            ]);
    }

    function index()
    {
        $data = $this->form()->validate();

        if ($form->isSubmiting()) {
            Auth::attempt($form->getData());
        }

        return view('login', ['form' => $form]);
    }
}

```

```blade
// app.blade.php

{!! $form !!}
```

## Api
### Form
#### Creating form
```php
use Yoga\Form\Form;
...
$form = Form::create(['action' => url('login')])

```

### Field
#### Field Type
| Field Type | Field Method    |
|:----------:|:---------------:|
| text       | Field::text     |
| email      | Field::email    |
| password   | Field::password |
| phone      | Field::phone    |
| number     | Field::number   |
