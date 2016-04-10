<?php

/* SonataAdminBundle:CRUD:list_currency.html.twig */
class __TwigTemplate_5f8eb1d694ca10dd86477178061a2cd29abe72966e99af5e29df716412917492 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataAdminBundle:CRUD:list_currency.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a960953c4d2969be14ac55bccb917ac8da67360348bab3c63340d31dd2e82c5c = $this->env->getExtension("native_profiler");
        $__internal_a960953c4d2969be14ac55bccb917ac8da67360348bab3c63340d31dd2e82c5c->enter($__internal_a960953c4d2969be14ac55bccb917ac8da67360348bab3c63340d31dd2e82c5c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list_currency.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a960953c4d2969be14ac55bccb917ac8da67360348bab3c63340d31dd2e82c5c->leave($__internal_a960953c4d2969be14ac55bccb917ac8da67360348bab3c63340d31dd2e82c5c_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_bbef43b666f108dbfa94f8b065fbe39b6b2264e7f846d5b66ff6cbf76b1d8454 = $this->env->getExtension("native_profiler");
        $__internal_bbef43b666f108dbfa94f8b065fbe39b6b2264e7f846d5b66ff6cbf76b1d8454->enter($__internal_bbef43b666f108dbfa94f8b065fbe39b6b2264e7f846d5b66ff6cbf76b1d8454_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    ";
        if ( !(null === (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 16
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "currency", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "
    ";
        }
        
        $__internal_bbef43b666f108dbfa94f8b065fbe39b6b2264e7f846d5b66ff6cbf76b1d8454->leave($__internal_bbef43b666f108dbfa94f8b065fbe39b6b2264e7f846d5b66ff6cbf76b1d8454_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_currency.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 16,  39 => 15,  33 => 14,  18 => 12,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* */
/* {% extends admin.getTemplate('base_list_field') %}*/
/* */
/* {% block field %}*/
/*     {% if value is not null %}*/
/*         {{ field_description.options.currency }} {{ value }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
