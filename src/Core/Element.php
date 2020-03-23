<?php

namespace Yoga\Form\Core;

use Yoga\Form\Traits\{HasRules, HasDataSource};

class Element
{
    use HasDataSource;
    use HasRules;

    /**
     * Element Properties
     *
     * @var array
     */
    protected $props = [];

    /**
     * Element Children
     *
     * @var array
     */
    protected $children = [];

    /**
     * Element Root View
     *
     * @var string
     */
    protected $view = 'yoga:form::element';

    /**
     * Constructor Method
     *
     */
    function __construct($props = [], $children = [])
    {
        $children       = is_array($children) ? $children : [$children];
        $this->props    = array_merge($this->props, $props);
        $this->children = array_merge($this->children, $children);
    }

    /**
     * Creates a new form element
     *
     * @return static
     */
    static function create($props = [], $children = [])
    {
        return new static($props, $children);
    }

    /**
     * Get Element Children
     *
     */
    function getChildren()
    {
        return $this->children ?? [];
    }

    /**
     * Print props to view
     *
     * @return void
     */
    function printProps()
    {
        $props = [];
        foreach ($this->props as $key => $value) {
            $props[] = $key . '="' . $value . '"';
        }
        return join(' ', $props);
    }

    /**
     * Render the Element
     *
     * @return void
     */
    function render()
    {
        return view($this->view, ['el' => $this])->render();
    }

    /**
     * Convert the component to string
     *
     * @return string
     */
    function __toString()
    {
        return $this->render();
    }
}
