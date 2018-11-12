<?php

// src/OpenClassRoom/PlatformBundle/Validator/AntifloodValidator.php

namespace OpenClassRoom\PlatformBundle\Validator;


use Doctrine\ORM\EntityManagerInterface;
use OpenClassRoom\PlatformBundle\Entity\Application;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AntifloodValidator extends ConstraintValidator
{
    private $requestStack;
    private $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint)
    {
        $request = $this->requestStack->getCurrentRequest();

        $ip = $request->getClientIp();

        $isFlood = $this->em
            ->getRepository('OpenClassRoomPlatformBundle:Application')
            ->isFlood($ip, 15);

        if ($isFlood)
        {
            $this->context->addViolation($constraint->message);
        }
    }

}