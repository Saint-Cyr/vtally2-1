<?php

/* FOSUserBundle:Group:edit.html.twig */
class __TwigTemplate_c6a527ca92f2cc60034dd0283d5c4027656fd9c1210401b63f0313745a69b097 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Group:edit.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_264f433cd0d1bdab37696575f283343d2ba46edc0fffadd52d328c8df9f20edc = $this->env->getExtension("native_profiler");
        $__internal_264f433cd0d1bdab37696575f283343d2ba46edc0fffadd52d328c8df9f20edc->enter($__internal_264f433cd0d1bdab37696575f283343d2ba46edc0fffadd52d328c8df9f20edc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Group:edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_264f433cd0d1bdab37696575f283343d2ba46edc0fffadd52d328c8df9f20edc->leave($__internal_264f433cd0d1bdab37696575f283343d2ba46edc0fffadd52d328c8df9f20edc_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_1ceb4d78a202e46fe7a7c8a79ee60902a75cbeb50a3124d06265d47500834eeb = $this->env->getExtension("native_profiler");
        $__internal_1ceb4d78a202e46fe7a7c8a79ee60902a75cbeb50a3124d06265d47500834eeb->enter($__internal_1ceb4d78a202e46fe7a7c8a79ee60902a75cbeb50a3124d06265d47500834eeb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Group:edit_content.html.twig", "FOSUserBundle:Group:edit.html.twig", 4)->display($context);
        
        $__internal_1ceb4d78a202e46fe7a7c8a79ee60902a75cbeb50a3124d06265d47500834eeb->leave($__internal_1ceb4d78a202e46fe7a7c8a79ee60902a75cbeb50a3124d06265d47500834eeb_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Group:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% block fos_user_content %}*/
/* {% include "FOSUserBundle:Group:edit_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
