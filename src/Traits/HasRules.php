<?php

namespace Yoga\Form\Traits;

use Illuminate\Support\Facades\Validator;

trait HasRules
{
    /**
     * Element Rules
     *
     */
    public $rules = null;

    /**
     * Valid data
     *
     */
    public $data = [];

    /**
     * Set Element Rules
     *
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Get Element Rules
     *
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set Form Data
     *
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get Form Data
     *
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Mount Validation Rules
     *
     */
    public function mountRules()
    {
        $rules = [];

        // Check if the element has rules
        if ($this->rules) {
            $rules[$this->name] = $this->rules;
        }

        // Get children rules
        foreach ($this->getChildren() as $child) {
            $rules = array_merge($child->mountRules(), $rules);
        }

        // Return the rules
        return $rules;
    }

    /**
     * Validate Form
     *
     */
    function validate()
    {
        if (!$this->isSubmiting()) return;

        $rules = $this->mountRules();

        $data = Validator::make(request()->all(), $rules)->validate();

        $this->setData($data);

        return $this->getData();
    }
}
