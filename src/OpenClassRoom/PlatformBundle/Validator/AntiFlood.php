<?php

// src/OpenClassRoom/PlatformBundle/Validator/AntiFlood.php

namespace OpenClassRoom\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class AntiFlood
 * @package OpenClassRoom\PlatformBundle\Validator
 *
 * @Annotation
 */
class AntiFlood extends Constraint
{
    public $message = "Vous avez déjà posté un message il y a moins de 15 secondes. Merci d'attendre un peu.";

    public function validatedBy()
    {
        return "oc_platform_antiflood";
    }

}