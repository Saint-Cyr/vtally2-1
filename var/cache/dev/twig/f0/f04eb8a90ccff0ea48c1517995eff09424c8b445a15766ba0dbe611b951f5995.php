<?php

/* SonataAdminBundle:CRUD:show_currency.html.twig */
class __TwigTemplate_3960dd5ad61e7ee5de78a1e1cd19be6d1e6c328bee675a8b6e5c6efa9b38ad90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig", "SonataAdminBundle:CRUD:show_currency.html.twig", 12);
        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f2229968b2b2d0a1db857058637283bead1facbe19b18bc55b4761ffbe3e5d16 = $this->env->getExtension("native_profiler");
        $__internal_f2229968b2b2d0a1db857058637283bead1facbe19b18bc55b4761ffbe3e5d16->enter($__internal_f2229968b2b2d0a1db857058637283bead1facbe19b18bc55b4761ffbe3e5d16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:show_currency.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f2229968b2b2d0a1db857058637283bead1facbe19b18bc55b4761ffbe3e5d16->leave($__internal_f2229968b2b2d0a1db857058637283bead1facbe19b18bc55b4761ffbe3e5d16_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_f557220e73a27ac080a9878b056887085acaec7c7230b9faa03e418e66dcdb6b = $this->env->getExtension("native_profiler");
        $__internal_f557220e73a27ac080a9878b056887085acaec7c7230b9faa03e418e66dcdb6b->enter($__internal_f557220e73a27ac080a9878b056887085acaec7c7230b9faa03e418e66dcdb6b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

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
        
        $__internal_f557220e73a27ac080a9878b056887085acaec7c7230b9faa03e418e66dcdb6b->leave($__internal_f557220e73a27ac080a9878b056887085acaec7c7230b9faa03e418e66dcdb6b_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show_currency.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 16,  40 => 15,  34 => 14,  11 => 12,);
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
/* {% extends 'SonataAdminBundle:CRUD:base_show_field.html.twig' %}*/
/* */
/* {% block field %}*/
/*     {% if value is not null %}*/
/*         {{ field_description.options.currency }} {{ value }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
