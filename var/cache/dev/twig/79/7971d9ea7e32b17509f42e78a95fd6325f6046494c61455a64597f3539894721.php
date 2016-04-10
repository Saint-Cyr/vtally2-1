<?php

/* SonataAdminBundle:Pager:links.html.twig */
class __TwigTemplate_972519c87f2fa5d8bffbe172ab25f496faa2e1a12a255b2f65ad0c752d620999 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:Pager:base_links.html.twig", "SonataAdminBundle:Pager:links.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Pager:base_links.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_426a19db6861abbfc221bdf49052dfb80efe57d98068816a29bff5faa394dc53 = $this->env->getExtension("native_profiler");
        $__internal_426a19db6861abbfc221bdf49052dfb80efe57d98068816a29bff5faa394dc53->enter($__internal_426a19db6861abbfc221bdf49052dfb80efe57d98068816a29bff5faa394dc53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Pager:links.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_426a19db6861abbfc221bdf49052dfb80efe57d98068816a29bff5faa394dc53->leave($__internal_426a19db6861abbfc221bdf49052dfb80efe57d98068816a29bff5faa394dc53_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:links.html.twig";
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
/* {% extends 'SonataAdminBundle:Pager:base_links.html.twig' %}*/
/* */
