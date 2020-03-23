<?php

namespace Yoga\Form;

use Illuminate\Support\Arr;

class Button extends Core\Element
{

    /**
     * View that should render
     *
     */
    protected $view = 'yoga:form::button';

    public $text = null;

    public $variant = null;

    public static function __callStatic($variant, $arguments)
    {
        $el = static::create();

        $el->text = __(Arr::first($arguments) ?? 'Submit');
        $el->variant = $variant;

        return $el;
    }
}
