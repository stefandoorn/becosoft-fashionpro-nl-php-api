<?php

namespace BecosoftApi\Model;

use Illuminate\Support\Collection;

/**
 * Class AbstractModel
 * @package BecosoftApi\Model
 */
abstract class AbstractModel
{
    /**
     * @return array
     * @todo Refactor this
     */
    public function toArray()
    {
        $values = call_user_func('get_object_vars', $this);

        foreach($values as $key => $value) {
            if (!$value instanceof Collection) {
                continue;
            }

            foreach($value as $subKey => $subValue) {
                if (!is_array($subValue)) {
                    $subValue = $subValue->toArray();
                }

                $values[$key][$subKey] = $subValue;
            }
        }

        return array_filter($values, function ($item) {
            if ($item instanceof Collection) {
                return !$item->isEmpty();
            }

            return !is_null($item);
        });
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
