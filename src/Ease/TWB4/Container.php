<?php

/**
 * Twitter Bootrstap Container.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2021 Vitex@hippy.cz (G)
 */

namespace Ease\TWB4;

class Container extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootrstap Container.
     *
     * @param mixed $content
     * @param array $properties of Container Row
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('container');
    }
}
