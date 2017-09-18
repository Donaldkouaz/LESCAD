<?php

namespace lescad\userBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class lescaduserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
