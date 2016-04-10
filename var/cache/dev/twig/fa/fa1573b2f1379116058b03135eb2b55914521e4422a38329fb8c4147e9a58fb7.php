<?php

/* SonataAdminBundle:CRUD:show.html.twig */
class __TwigTemplate_8e2f2a632d36533ef83e57d64479421ff253c667b1843ad2dd8256ea188e83ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_show.html.twig", "SonataAdminBundle:CRUD:show.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8d90dd38cd82af58841fabee020329ce6e8c3a78a4e96f775c76a302ebe2e416 = $this->env->getExtension("native_profiler");
        $__internal_8d90dd38cd82af58841fabee020329ce6e8c3a78a4e96f775c76a302ebe2e416->enter($__internal_8d90dd38cd82af58841fabee020329ce6e8c3a78a4e96f775c76a302ebe2e416_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8d90dd38cd82af58841fabee020329ce6e8c3a78a4e96f775c76a302ebe2e416->leave($__internal_8d90dd38cd82af58841fabee020329ce6e8c3a78a4e96f775c76a302ebe2e416_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 12,);
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
/* {% extends 'SonataAdminBundle:CRUD:base_show.html.twig' %}*/
/* */
