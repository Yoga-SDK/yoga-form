<?php

namespace Yoga\Form;

class Form extends Core\Element
{

    /**
     * View that should render
     *
     */
    protected $view = 'yoga:form::form';

    /**
     * Form props
     *
     */
    protected $props = [
        'method' => 'POST',
        'action' => '/'
    ];

    /**
     * Data Source
     *
     */
    protected $_dataSource = [];

    /**
     * Constructor method
     *
     */
    function __construct($props = [], $children = [])
    {
        parent::__construct($props, $children);
    }

    /**
     * Set the form actions
     *
     */
    function action($action)
    {
        $this->props['action'] = $action;
        return $this;
    }

    /**
     * Set the form method
     *
     */
    function method($method)
    {
        $this->props['method'] = $method;
        return $this;
    }

    /**
     * Check if the form is submitting
     *
     * @return boolean
     */
    function isSubmiting()
    {
        return (request()->is($this->props['action']) &&
            request()->isMethod($this->props['method']));
    }
}
