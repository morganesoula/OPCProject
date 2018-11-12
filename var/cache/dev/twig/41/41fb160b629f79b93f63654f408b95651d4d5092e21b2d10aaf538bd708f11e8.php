<?php

/* @OpenClassRoomPlatform/Advert/bye.html.twig */
class __TwigTemplate_b4e85e3ee50ab6e11abf1ecca99cde248fd0aeee8b56542330b4a5c407c12e28 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@OpenClassRoomPlatform/Advert/bye.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@OpenClassRoomPlatform/Advert/bye.html.twig"));

        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <title>Bye bye, see you soon ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["firstname"]) ? $context["firstname"] : $this->getContext($context, "firstname")), "html", null, true);
        echo "!</title>
    </head>
    <body>
        <h2>It's time to say goodbye</h2>

        <p>But you should know that you can always come back to us. <br>Please, come back.</p>
    </body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@OpenClassRoomPlatform/Advert/bye.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 6,  25 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# src/OpenClassRoom/PlatformBundle/Resources/views/Advert/bye.html.twig #}

<!DOCTYPE html>
<html>
    <head>
        <title>Bye bye, see you soon {{ firstname }}!</title>
    </head>
    <body>
        <h2>It's time to say goodbye</h2>

        <p>But you should know that you can always come back to us. <br>Please, come back.</p>
    </body>
</html>", "@OpenClassRoomPlatform/Advert/bye.html.twig", "C:\\wamp\\www\\OPCProject\\src\\OpenClassRoom\\PlatformBundle\\Resources\\views\\Advert\\bye.html.twig");
    }
}
