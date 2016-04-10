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
        $__internal_231b5ec966f003304c4ae19744b34d19c8b7861e9926d80de84e1977b9e58608 = $this->env->getExtension("native_profiler");
        $__internal_231b5ec966f003304c4ae19744b34d19c8b7861e9926d80de84e1977b9e58608->enter($__internal_231b5ec966f003304c4ae19744b34d19c8b7861e9926d80de84e1977b9e58608_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Pager:results.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_231b5ec966f003304c4ae19744b34d19c8b7861e9926d80de84e1977b9e58608->leave($__internal_231b5ec966f003304c4ae19744b34d19c8b7861e9926d80de84e1977b9e58608_prof);

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
