<?php

/* FOSUserBundle:Resetting:request.html.twig */
class __TwigTemplate_5d7e5ad8372e156c288f3c818ef6f7b19206001a0f312ce894ec1a941b09260a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Resetting:request.html.twig", 1);
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
        $__internal_0d06c07c883178351a33bd26b45c13d08d920300752ac88f5e34a17da22364f6 = $this->env->getExtension("native_profiler");
        $__internal_0d06c07c883178351a33bd26b45c13d08d920300752ac88f5e34a17da22364f6->enter($__internal_0d06c07c883178351a33bd26b45c13d08d920300752ac88f5e34a17da22364f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Resetting:request.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0d06c07c883178351a33bd26b45c13d08d920300752ac88f5e34a17da22364f6->leave($__internal_0d06c07c883178351a33bd26b45c13d08d920300752ac88f5e34a17da22364f6_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_c97f7ecf38470524b4d00c8884e9fd359c8fda978eb6cae916bdc2bc265c30ec = $this->env->getExtension("native_profiler");
        $__internal_c97f7ecf38470524b4d00c8884e9fd359c8fda978eb6cae916bdc2bc265c30ec->enter($__internal_c97f7ecf38470524b4d00c8884e9fd359c8fda978eb6cae916bdc2bc265c30ec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Resetting:request_content.html.twig", "FOSUserBundle:Resetting:request.html.twig", 4)->display($context);
        
        $__internal_c97f7ecf38470524b4d00c8884e9fd359c8fda978eb6cae916bdc2bc265c30ec->leave($__internal_c97f7ecf38470524b4d00c8884e9fd359c8fda978eb6cae916bdc2bc265c30ec_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:request.html.twig";
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
/* {% include "FOSUserBundle:Resetting:request_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
