<?php

namespace Yoga\Form\Traits;

trait HasDataSource
{
    /**
     * Data Source Object
     *
     */
    protected $dataSource;

    /**
     * Set Data Source Object
     *
     */
    function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
        return $this;
    }

    /**
     * Get Data Source
     *
     */
    function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * Bind Data Source to Class
     *
     */
    function bind($dataSource)
    {
        $this->setDataSource($dataSource);

        foreach ($this->getChildren() as $child) {
            $child->bind($this->dataSource);
        }

        return $this;
    }

    /**
     * Gets a Value from Data Source
     *
     */
    function getValue($name)
    {
        $value = isset($this->dataSource[$name]) ? $this->dataSource[$name] : '';
        return old($name, $value);
    }
}
