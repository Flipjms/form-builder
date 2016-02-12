<?php

namespace Clumsy\FormBuilder\Collections;

use Clumsy\FormBuilder\FormBuilderException;

abstract class BaseCollection
{
    private $items = array();

    public function addItem($item, $key = null)
    {
        if (isset($this->items[$key])) {
            throw new FormBuilderException("key $key already in use.");
        }

        if (is_null($key)) {
            $this->items[] = $item;
            return;
        }

        $this->items[$key] = $item;
    }

    public function deleteItem($key)
    {
        if (!isset($this->items[$key])) {
            throw new FormBuilderException("Invalid key $key.");
        }

        unset($this->items[$key]);
    }

    public function getItem($key)
    {
        if (!isset($this->items[$key])) {
            throw new FormBuilderException("Invalid key $key.");
        }

        return $this->items[$key];
    }

    public function getAllItems()
    {
        return $this->items;
    }


    public function hasKey($key)
    {
        return isset($this->items[$key]);
    }

    // public function getItemsByDriver($driver)
    // {
    //     return array_filter($this->items, function ($item) use ($driver) {
    //         return $item->getDriver() == $driver;
    //     });
    // }
}
