<?php

// src/OpenClassRoom/PlatformBundle/Antispam/OCAntispam.php

namespace OpenClassRoom\PlatformBundle\Antispam;

class OCAntispam
{

    private $mailer;
    private $locale;
    private $minLength;

    public function __construct(\Symfony\Bundle\MonologBundle\SwiftMailer $mailer, $locale, $minLength)
    {
        $this->mailer =          $mailer;
        $this->locale =          $locale;
        $this->minLength = (int) $minLength;
    }

    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }

}
