<?php

/* OpenClassRoomPlatformBundle:Advert:form.html.twig */
class __TwigTemplate_46c229a0ab1585597842747c5c7d04b29c4c90fd42a1c55e8d1022e01be7bae2 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "OpenClassRoomPlatformBundle:Advert:form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "OpenClassRoomPlatformBundle:Advert:form.html.twig"));

        // line 2
        echo "
<h3>Formulaire d'annonce</h3>

<div class=\"well\">
    ";
        // line 6
        echo         $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "

    ";
        // line 8
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock(($context["form"] ?? $this->getContext($context, "form")), 'errors');
        echo "

    ";
        // line 10
        if ($this->getAttribute(($context["form"] ?? null), "date", array(), "any", true, true)) {
            // line 11
            echo "    <div class=\"form-group\">
        ";
            // line 12
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "date", array()), 'errors');
            echo "

        <div class=\"col-sm-10\">
            ";
            // line 15
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "date", array()), 'row');
            echo "
        </div>
    </div>
    ";
        }
        // line 19
        echo "
    <div class=\"form-group\">
        ";
        // line 21
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "title", array()), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Titre"));
        echo "

        ";
        // line 23
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "title", array()), 'errors');
        echo "

        <div class=\"col-sm-13\">
            ";
        // line 26
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        ";
        // line 31
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "content", array()), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Contenu"));
        echo "

        ";
        // line 33
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "content", array()), 'errors');
        echo "

        <div class=\"col-sm-13\">
            ";
        // line 36
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "content", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
        </div>
    </div>

    <div class=\"form-group\">
        ";
        // line 41
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "author", array()), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Auteur"));
        echo "

        ";
        // line 43
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "author", array()), 'errors');
        echo "

        <div class=\"col-sm-13\">
            ";
        // line 46
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "author", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
        </div>
    </div>

    ";
        // line 50
        if ($this->getAttribute(($context["form"] ?? null), "published", array(), "any", true, true)) {
            // line 51
            echo "        ";
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "published", array()), 'row', array("attr" => array("class" => "col-sm-2")));
            echo "
    ";
        }
        // line 53
        echo "
    ";
        // line 54
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "image", array()), 'row', array("attr" => array("class" => "col-sm-12")));
        echo "


    <div class=\"col-sm-13\">
        <div>
            ";
        // line 59
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "categories", array()), 'errors');
        echo "

            <div class=\"col-sm-13\">
                ";
        // line 62
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "categories", array()), 'row');
        echo "
            </div>
        </div>

    </div>

    ";
        // line 68
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "save", array()), 'widget', array("attr" => array("class" => "btn btn-primary center-block")));
        echo "

    ";
        // line 70
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock(($context["form"] ?? $this->getContext($context, "form")), 'rest');
        echo "

    ";
        // line 72
        echo         $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "

</div>


<!--
";
        // line 79
        echo "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>

";
        // line 82
        echo "<script type=\"text/javascript\">
    \$(document).ready(function() {

        var \$container = \$('div#advert_categories');

        // Compteur
        var index = \$container.find(':input').length;

        // Ajout d'un nouveau champ à chaque clic sur le lien d'ajout
        \$('#add_category').click(function(e) {
            addCategory(\$container);

            e.preventDefault();
            return false;
        });

        // Dans le cas d'une nouvelle annonce, ajout automatique d'un nouveau champ
        if (index == 0)
        {
            addCategory(\$container);
        } else {
            // Et s'il y a déjà une catégorie, on ajoute un lien de suppression
            \$container.children('div').each(function() {
                addDeleteLink(\$(this));
            });
        }
        
        // Fonction d'ajout du formulaire d'une catégorie
        function addCategory(\$container) {

            var template = \$container.attr('data-prototype')
                .replace(/__name__label__/g, 'Catégorie n°' + (index+1))
                .replace(/__name__/g, index);

            var \$prototype = \$(template);

            // Ajout au prototype du lien de suppression
            addDeleteLink(\$prototype);

            // Ajout du prototype modifié
            \$container.append(\$prototype);

            // Incrémentation de l'index
            index++;
        }


        // Fonction qui permet la suppression d'une catégorie
        function addDeleteLink(\$prototype) {

            var \$deleteLink = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a>');

            // Ajout du lien
            \$prototype.append(\$deleteLink);

            // Ajout d'un listener sur le clic pour supprimer la catégorie
            \$deleteLink.click(function(e) {
                \$prototype.remove();

                e.preventDefault();
                return false;
            });
            
        }
    });
</script> -->
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "OpenClassRoomPlatformBundle:Advert:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 82,  172 => 79,  163 => 72,  158 => 70,  153 => 68,  144 => 62,  138 => 59,  130 => 54,  127 => 53,  121 => 51,  119 => 50,  112 => 46,  106 => 43,  101 => 41,  93 => 36,  87 => 33,  82 => 31,  74 => 26,  68 => 23,  63 => 21,  59 => 19,  52 => 15,  46 => 12,  43 => 11,  41 => 10,  36 => 8,  31 => 6,  25 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# src/OpenClassRoom/PlatformBundle/Resources/views/Advert/form.html.twig #}

<h3>Formulaire d'annonce</h3>

<div class=\"well\">
    {{ form_start(form, {'attr': {'class': 'form-horizontal'}}) }}

    {{ form_errors(form) }}

    {% if form.date is defined %}
    <div class=\"form-group\">
        {{ form_errors(form.date) }}

        <div class=\"col-sm-10\">
            {{ form_row(form.date) }}
        </div>
    </div>
    {% endif %}

    <div class=\"form-group\">
        {{ form_label(form.title, \"Titre\", {'label_attr': {'class': 'col-sm-1 control-label'}}) }}

        {{ form_errors(form.title) }}

        <div class=\"col-sm-13\">
            {{ form_widget(form.title, {'attr': {'class': 'form-control'}}) }}
        </div>
    </div>

    <div class=\"form-group\">
        {{ form_label(form.content, \"Contenu\", {'label_attr': {'class': 'col-sm-1 control-label'}}) }}

        {{ form_errors(form.content) }}

        <div class=\"col-sm-13\">
            {{ form_widget(form.content, {'attr': {'class': 'form-control'}}) }}
        </div>
    </div>

    <div class=\"form-group\">
        {{ form_label(form.author, \"Auteur\", {'label_attr': {'class': 'col-sm-1 control-label'}}) }}

        {{ form_errors(form.author) }}

        <div class=\"col-sm-13\">
            {{ form_widget(form.author, {'attr': {'class': 'form-control'}}) }}
        </div>
    </div>

    {% if form.published is defined %}
        {{ form_row(form.published, {'attr': {'class': 'col-sm-2'}}) }}
    {% endif %}

    {{ form_row(form.image, {'attr': {'class': 'col-sm-12'}}) }}


    <div class=\"col-sm-13\">
        <div>
            {{ form_errors(form.categories) }}

            <div class=\"col-sm-13\">
                {{ form_row(form.categories) }}
            </div>
        </div>

    </div>

    {{ form_widget(form.save, {'attr': {'class': 'btn btn-primary center-block'}}) }}

    {{ form_rest(form) }}

    {{ form_end(form) }}

</div>


<!--
{# Appel de la librairie, JQuery#}
<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>

{# Initialisation du script #}
<script type=\"text/javascript\">
    \$(document).ready(function() {

        var \$container = \$('div#advert_categories');

        // Compteur
        var index = \$container.find(':input').length;

        // Ajout d'un nouveau champ à chaque clic sur le lien d'ajout
        \$('#add_category').click(function(e) {
            addCategory(\$container);

            e.preventDefault();
            return false;
        });

        // Dans le cas d'une nouvelle annonce, ajout automatique d'un nouveau champ
        if (index == 0)
        {
            addCategory(\$container);
        } else {
            // Et s'il y a déjà une catégorie, on ajoute un lien de suppression
            \$container.children('div').each(function() {
                addDeleteLink(\$(this));
            });
        }
        
        // Fonction d'ajout du formulaire d'une catégorie
        function addCategory(\$container) {

            var template = \$container.attr('data-prototype')
                .replace(/__name__label__/g, 'Catégorie n°' + (index+1))
                .replace(/__name__/g, index);

            var \$prototype = \$(template);

            // Ajout au prototype du lien de suppression
            addDeleteLink(\$prototype);

            // Ajout du prototype modifié
            \$container.append(\$prototype);

            // Incrémentation de l'index
            index++;
        }


        // Fonction qui permet la suppression d'une catégorie
        function addDeleteLink(\$prototype) {

            var \$deleteLink = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a>');

            // Ajout du lien
            \$prototype.append(\$deleteLink);

            // Ajout d'un listener sur le clic pour supprimer la catégorie
            \$deleteLink.click(function(e) {
                \$prototype.remove();

                e.preventDefault();
                return false;
            });
            
        }
    });
</script> -->
", "OpenClassRoomPlatformBundle:Advert:form.html.twig", "C:\\wamp\\www\\OPCProject\\src\\OpenClassRoom\\PlatformBundle\\Resources\\views\\Advert\\form.html.twig");
    }
}
