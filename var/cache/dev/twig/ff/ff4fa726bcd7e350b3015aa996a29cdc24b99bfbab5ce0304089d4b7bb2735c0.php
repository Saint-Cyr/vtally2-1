<?php

/* FOSUserBundle:Group:show.html.twig */
class __TwigTemplate_4e583c062cac886f0d5b369dd71c2aa5fa1f7d062794d80e8d8c683b757acdc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Group:show.html.twig", 1);
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
        $__internal_a78caddd4e2f236c4fc69ed040b507688aaf505fd3eb719182d1cfc0c9b66cf7 = $this->env->getExtension("native_profiler");
        $__internal_a78caddd4e2f236c4fc69ed040b507688aaf505fd3eb719182d1cfc0c9b66cf7->enter($__internal_a78caddd4e2f236c4fc69ed040b507688aaf505fd3eb719182d1cfc0c9b66cf7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Group:show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a78caddd4e2f236c4fc69ed040b507688aaf505fd3eb719182d1cfc0c9b66cf7->leave($__internal_a78caddd4e2f236c4fc69ed040b507688aaf505fd3eb719182d1cfc0c9b66cf7_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_0432b3a4fae162a8583620805e0da5ea7189f4541bffa205eb5dd30053e2dde9 = $this->env->getExtension("native_profiler");
        $__internal_0432b3a4fae162a8583620805e0da5ea7189f4541bffa205eb5dd30053e2dde9->enter($__internal_0432b3a4fae162a8583620805e0da5ea7189f4541bffa205eb5dd30053e2dde9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Group:show_content.html.twig", "FOSUserBundle:Group:show.html.twig", 4)->display($context);
        
        $__internal_0432b3a4fae162a8583620805e0da5ea7189f4541bffa205eb5dd30053e2dde9->leave($__internal_0432b3a4fae162a8583620805e0da5ea7189f4541bffa205eb5dd30053e2dde9_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Group:show.html.twig";
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
/* {% include "FOSUserBundle:Group:show_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
