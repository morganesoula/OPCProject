<?php

// src/OpenClassRoom/UserBundle/OpenClassRoomUserBundle.php

namespace OpenClassRoom\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OpenClassRoomUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
