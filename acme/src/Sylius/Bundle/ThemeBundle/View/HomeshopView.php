<?php
namespace Sylius\Bundle\ThemeBundle\View;

use Pagerfanta\View\DefaultView;

class HomeshopView extends DefaultView
{

    protected function createDefaultTemplate()
    {
        return new HomeshopTemplate();
    }

}