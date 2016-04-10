<?php

/* SonataAdminBundle:Pager:results.html.twig */
class __TwigTemplate_040e31e39ebaa3d6d8a488741620ea5ee5da31d8373667f7daf846fc7b2b3a7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:Pager:base_results.html.twig", "SonataAdminBundle:Pager:results.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Pager:base_results.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cda1cb98f7c5dc945e25f75af8d643f0e9045d2ddc6af2f92f739dc8eeae415d = $this->env->getExtension("native_profiler");
        $__internal_cda1cb98f7c5dc945e25f75af8d643f0e9045d2ddc6af2f92f739dc8eeae415d->enter($__internal_cda1cb98f7c5dc945e25f75af8d643f0e9045d2ddc6af2f92f739dc8eeae415d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Pager:results.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cda1cb98f7c5dc945e25f75af8d643f0e9045d2ddc6af2f92f739dc8eeae415d->leave($__internal_cda1cb98f7c5dc945e25f75af8d643f0e9045d2ddc6af2f92f739dc8eeae415d_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:results.html.twig";
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
/* {% extends 'SonataAdminBundle:Pager:base_results.html.twig' %}*/
/* */
