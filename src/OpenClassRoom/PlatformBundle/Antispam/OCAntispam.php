<?php

// src/OpenClassRoom/PlatformBundle/Antispam/OCAntispam.php

namespace OpenClassRoom\PlatformBundle\Antispam;

class OCAntispam
{
    private $mailer;
    private $locale;
    private $minLength;

    /**
     * OCAntispam constructor.
     * @param \Swift_Mailer $mailer
     * @param $locale
     * @param $minLength
     */
    public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
    {
        $this->mailer    = $mailer;
        $this->minLength = (int) $minLength;
    }


    /**
     * Vérifie si le texte est un spam ou non
     *
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }

    /**
     * @param $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}