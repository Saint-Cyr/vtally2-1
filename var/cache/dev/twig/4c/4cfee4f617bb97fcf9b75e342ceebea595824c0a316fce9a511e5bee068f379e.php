<?php

/* SonataAdminBundle:CRUD:list.html.twig */
class __TwigTemplate_24747422c16d73a9ab4d0804cd8364f58579d70c050f86e65a553df9c6e771aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_list.html.twig", "SonataAdminBundle:CRUD:list.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_043bc4cf2399620b1f1fc00509ce4148490c358f85c5a4ed3bdf0de2284a7f78 = $this->env->getExtension("native_profiler");
        $__internal_043bc4cf2399620b1f1fc00509ce4148490c358f85c5a4ed3bdf0de2284a7f78->enter($__internal_043bc4cf2399620b1f1fc00509ce4148490c358f85c5a4ed3bdf0de2284a7f78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_043bc4cf2399620b1f1fc00509ce4148490c358f85c5a4ed3bdf0de2284a7f78->leave($__internal_043bc4cf2399620b1f1fc00509ce4148490c358f85c5a4ed3bdf0de2284a7f78_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list.html.twig";
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
/* {% extends 'SonataAdminBundle:CRUD:base_list.html.twig' %}*/
/* */
