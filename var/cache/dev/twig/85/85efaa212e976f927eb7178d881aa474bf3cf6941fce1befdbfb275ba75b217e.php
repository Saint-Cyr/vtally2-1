<?php

/* SonataAdminBundle:CRUD:show_compare.html.twig */
class __TwigTemplate_2a6fa35794bbee15f0338dc828362911582382b547e33567eceb75a928ed4380 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_show_compare.html.twig", "SonataAdminBundle:CRUD:show_compare.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show_compare.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8a8fb3a2e4cd2dde9e392ae0c792fec164ffa28509fb7799756909c2e759545a = $this->env->getExtension("native_profiler");
        $__internal_8a8fb3a2e4cd2dde9e392ae0c792fec164ffa28509fb7799756909c2e759545a->enter($__internal_8a8fb3a2e4cd2dde9e392ae0c792fec164ffa28509fb7799756909c2e759545a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:show_compare.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8a8fb3a2e4cd2dde9e392ae0c792fec164ffa28509fb7799756909c2e759545a->leave($__internal_8a8fb3a2e4cd2dde9e392ae0c792fec164ffa28509fb7799756909c2e759545a_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show_compare.html.twig";
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
/* {% extends 'SonataAdminBundle:CRUD:base_show_compare.html.twig' %}*/
/* */
