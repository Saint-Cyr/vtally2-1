<?php

/* SonataAdminBundle:CRUD:history.html.twig */
class __TwigTemplate_78b661bda27563840b922bcd4dc8b5c475dad8840f52f8c3b28cf9dfc5020a38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_history.html.twig", "SonataAdminBundle:CRUD:history.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_history.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bc740e7ceff7d9cbf7d8c01d697571e4af4b14c56d7298c2ca297e763291a9e0 = $this->env->getExtension("native_profiler");
        $__internal_bc740e7ceff7d9cbf7d8c01d697571e4af4b14c56d7298c2ca297e763291a9e0->enter($__internal_bc740e7ceff7d9cbf7d8c01d697571e4af4b14c56d7298c2ca297e763291a9e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:history.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bc740e7ceff7d9cbf7d8c01d697571e4af4b14c56d7298c2ca297e763291a9e0->leave($__internal_bc740e7ceff7d9cbf7d8c01d697571e4af4b14c56d7298c2ca297e763291a9e0_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:history.html.twig";
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
/* {% extends 'SonataAdminBundle:CRUD:base_history.html.twig' %}*/
/* */
