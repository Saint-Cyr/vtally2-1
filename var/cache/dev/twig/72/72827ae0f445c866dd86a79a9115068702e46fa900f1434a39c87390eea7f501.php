<?php

/* SonataAdminBundle:CRUD:acl.html.twig */
class __TwigTemplate_321b135ec942afa67f953a61a80e2bce16eeca0fd185b4ae918992b8dfe685f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_acl.html.twig", "SonataAdminBundle:CRUD:acl.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_acl.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0c3076abcac385b1ef96a63cf7697021d58b1169c132b262ea52470f30d57cde = $this->env->getExtension("native_profiler");
        $__internal_0c3076abcac385b1ef96a63cf7697021d58b1169c132b262ea52470f30d57cde->enter($__internal_0c3076abcac385b1ef96a63cf7697021d58b1169c132b262ea52470f30d57cde_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:acl.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0c3076abcac385b1ef96a63cf7697021d58b1169c132b262ea52470f30d57cde->leave($__internal_0c3076abcac385b1ef96a63cf7697021d58b1169c132b262ea52470f30d57cde_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:acl.html.twig";
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
/* {% extends 'SonataAdminBundle:CRUD:base_acl.html.twig' %}*/
/* */
