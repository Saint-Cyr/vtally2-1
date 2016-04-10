<?php

/* SonataAdminBundle:CRUD:show_time.html.twig */
class __TwigTemplate_f766b0b1c0294363fbdf736100ade48689c4ef82ff535e38ac4327a58fce7afb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig", "SonataAdminBundle:CRUD:show_time.html.twig", 12);
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
        $__internal_11ebfebc2d68203a08bc332f90b18c591a2275b2b57a02f3254abcc259283639 = $this->env->getExtension("native_profiler");
        $__internal_11ebfebc2d68203a08bc332f90b18c591a2275b2b57a02f3254abcc259283639->enter($__internal_11ebfebc2d68203a08bc332f90b18c591a2275b2b57a02f3254abcc259283639_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:show_time.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_11ebfebc2d68203a08bc332f90b18c591a2275b2b57a02f3254abcc259283639->leave($__internal_11ebfebc2d68203a08bc332f90b18c591a2275b2b57a02f3254abcc259283639_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_480ee72eff85deda2735a5cb1803cf6142f9adbbdb63c0b931458cb8ff904782 = $this->env->getExtension("native_profiler");
        $__internal_480ee72eff85deda2735a5cb1803cf6142f9adbbdb63c0b931458cb8ff904782->enter($__internal_480ee72eff85deda2735a5cb1803cf6142f9adbbdb63c0b931458cb8ff904782_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 16
            echo "&nbsp;";
        } else {
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "H:i:s"), "html", null, true);
        }
        
        $__internal_480ee72eff85deda2735a5cb1803cf6142f9adbbdb63c0b931458cb8ff904782->leave($__internal_480ee72eff85deda2735a5cb1803cf6142f9adbbdb63c0b931458cb8ff904782_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show_time.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 18,  42 => 16,  40 => 15,  34 => 14,  11 => 12,);
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
/*     {%- if value is empty -%}*/
/*         &nbsp;*/
/*     {%- else -%}*/
/*         {{ value|date('H:i:s') }}*/
/*     {%- endif -%}*/
/* {% endblock %}*/
/* */
