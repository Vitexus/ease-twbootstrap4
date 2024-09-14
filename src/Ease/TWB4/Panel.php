<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWBootstrap4 package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap4
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ease\TWB4;

use Ease\Html\DivTag;

/**
 * Description of Panel.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Panel extends Card
{
    /**
     * Panel Head.
     */
    public \Ease\Html\DivTag $header = null;

    /**
     * Panel's body.
     */
    public \Ease\Html\DivTag $body = null;

    /**
     * footer content.
     */
    public \Ease\Html\DivTag $footer = null;

    /**
     * Panel type.
     *
     * @var string succes|wanring|info|danger
     */
    public string $type = 'default';

    /**
     * Panel Twitter Bootstrapu.
     *
     * @param mixed|string $heading
     * @param string       $type    succes|wanring|info|danger
     * @param mixed        $body    tělo panelu
     * @param mixed        $footer  patička panelu. FALSE = nezobrazit vůbec
     */
    public function __construct(
        $heading = null,
        $type = null,
        $body = null,
        $footer = null
    ) {
        parent::__construct(null, $type ? ['class' => 'bg-'.$type] : null);
        $this->header = new DivTag($heading, ['class' => 'card-header']);
        $this->body = new DivTag($body, ['class' => 'card-body']);
        $this->footer = new DivTag($footer, ['class' => 'card-footer']);
    }

    /**
     * Vloží další element do objektu.
     *
     * @param mixed  $pageItem     hodnota nebo EaseObjekt s metodou draw()
     * @param string $pageItemName Pod tímto jménem je objekt vkládán do stromu
     *
     * @return pointer Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null)
    {
        $added = $this->body->addItem($pageItem, $pageItemName);

        return $added;
    }

    public function finalize(): void
    {
        if ($this->header->getItemsCount()) {
            parent::addItem($this->header);
        }

        if ($this->body->getItemsCount()) {
            parent::addItem($this->body);
        }

        if ($this->footer->getItemsCount()) {
            parent::addItem($this->footer);
        }
    }
}
