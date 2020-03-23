<?php

namespace Yoga\Form;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class Field extends Core\Element
{
    /**
     * Element View
     *
     */
    protected $view = 'yoga:form::field';

    /**
     * Field label
     *
     */
    public $label = null;

    /**
     * Field name
     *
     */
    public $name = null;

    /**
     * Field type
     *
     */
    public $type = 'text';

    /**
     * Help text
     *
     * @var [type]
     */
    public $help = null;

    /**
     * Field Id
     *
     */
    public $id = null;

    /**
     * Get Field Id
     *
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Set field id
     *
     */
    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Print the id
     *
     */
    function printId()
    {
        return $this->id ?? $this->name;
    }

    /**
     * Set help text
     *
     * @param [type] $help
     * @return $this
     */
    function setHelp($help)
    {
        $this->help = $help;
        return $this;
    }

    /**
     * Call Static Magic Method
     *
     * @param [type] $name
     * @param [type] $arguments
     * @return void
     */
    public static function __callStatic($type, $arguments)
    {
        $el = static::create();
        $el->type  = $type;
        $el->name  = Arr::first($arguments) ?? $type;
        $el->label = Arr::get($arguments, 1) ?? Str::title($el->name);
        return $el;
    }
}
