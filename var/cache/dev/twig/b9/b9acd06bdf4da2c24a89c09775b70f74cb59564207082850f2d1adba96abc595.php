<?php

/* FOSUserBundle:Profile:show.html.twig */
class __TwigTemplate_f6f6ae0f71def22898a0a8f5d2e0eff7f11ccd994fd813df9375f4800df04fda extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Profile:show.html.twig", 1);
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
        $__internal_af9f9430e9cb2cead8a76f60ca9bcae339bdb8c0f4065fa6d8b02820bdecfa90 = $this->env->getExtension("native_profiler");
        $__internal_af9f9430e9cb2cead8a76f60ca9bcae339bdb8c0f4065fa6d8b02820bdecfa90->enter($__internal_af9f9430e9cb2cead8a76f60ca9bcae339bdb8c0f4065fa6d8b02820bdecfa90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Profile:show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_af9f9430e9cb2cead8a76f60ca9bcae339bdb8c0f4065fa6d8b02820bdecfa90->leave($__internal_af9f9430e9cb2cead8a76f60ca9bcae339bdb8c0f4065fa6d8b02820bdecfa90_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_aa2b2a661da0de025a33c61a059da42bacd05aa8c7925c8e60c2bdd275a0c005 = $this->env->getExtension("native_profiler");
        $__internal_aa2b2a661da0de025a33c61a059da42bacd05aa8c7925c8e60c2bdd275a0c005->enter($__internal_aa2b2a661da0de025a33c61a059da42bacd05aa8c7925c8e60c2bdd275a0c005_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Profile:show_content.html.twig", "FOSUserBundle:Profile:show.html.twig", 4)->display($context);
        
        $__internal_aa2b2a661da0de025a33c61a059da42bacd05aa8c7925c8e60c2bdd275a0c005->leave($__internal_aa2b2a661da0de025a33c61a059da42bacd05aa8c7925c8e60c2bdd275a0c005_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:show.html.twig";
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
/* {% include "FOSUserBundle:Profile:show_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
