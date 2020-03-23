<?php

namespace Yoga\Form;

class Select extends Field
{

    /**
     * View to be rendered
     *
     * @var string
     */
    protected $view = 'yoga:form::select';

    /**
     * Select Options
     *
     * @var array
     */
    public $options = [];

    /**
     * Set Select Options
     *
     * @param [type] $options
     * @return $this
     */
    function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get Select Options
     *
     * @return void
     */
    function getOptions()
    {
        return $this->options;
    }
}
