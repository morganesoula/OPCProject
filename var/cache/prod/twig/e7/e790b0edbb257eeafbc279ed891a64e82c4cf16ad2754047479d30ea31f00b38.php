<?php

/* OpenClassRoomPlatformBundle::layout.html.twig */
class __TwigTemplate_834cbe05acc90552034c7cc0df0d3223f27f41d76234c166f7eb61a0f37159eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("OpenClassRoomCoreBundle::layout.html.twig", "OpenClassRoomPlatformBundle::layout.html.twig", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ocplaform_body' => array($this, 'block_ocplaform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OpenClassRoomCoreBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "    Annonces - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
    <h1>Annonces</h1>

    <hr>

    ";
        // line 15
        $this->displayBlock('ocplaform_body', $context, $blocks);
        // line 17
        echo "
";
    }

    // line 15
    public function block_ocplaform_body($context, array $blocks = array())
    {
        // line 16
        echo "    ";
    }

    public function getTemplateName()
    {
        return "OpenClassRoomPlatformBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 16,  57 => 15,  52 => 17,  50 => 15,  43 => 10,  40 => 9,  33 => 6,  30 => 5,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "OpenClassRoomPlatformBundle::layout.html.twig", "C:\\wamp\\www\\OPCProject\\src\\OpenClassRoom\\PlatformBundle/Resources/views/layout.html.twig");
    }
}
