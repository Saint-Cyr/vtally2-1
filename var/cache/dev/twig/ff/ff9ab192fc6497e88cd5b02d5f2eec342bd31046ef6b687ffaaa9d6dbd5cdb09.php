<?php

/* FOSUserBundle:Group:new.html.twig */
class __TwigTemplate_c7eaf8596b37c7daea945f6aa5f3bb0bbe55bfcbe32cf972657964b11997de9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Group:new.html.twig", 1);
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
        $__internal_e73c31bd99c3537e2b208a529c81389a81072f71cff14b6328f3f4e700049c48 = $this->env->getExtension("native_profiler");
        $__internal_e73c31bd99c3537e2b208a529c81389a81072f71cff14b6328f3f4e700049c48->enter($__internal_e73c31bd99c3537e2b208a529c81389a81072f71cff14b6328f3f4e700049c48_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Group:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e73c31bd99c3537e2b208a529c81389a81072f71cff14b6328f3f4e700049c48->leave($__internal_e73c31bd99c3537e2b208a529c81389a81072f71cff14b6328f3f4e700049c48_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_8356dc367ea696ec2ddaaa923978fbbc2b73e63ad352896cdabb1df132962ee2 = $this->env->getExtension("native_profiler");
        $__internal_8356dc367ea696ec2ddaaa923978fbbc2b73e63ad352896cdabb1df132962ee2->enter($__internal_8356dc367ea696ec2ddaaa923978fbbc2b73e63ad352896cdabb1df132962ee2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Group:new_content.html.twig", "FOSUserBundle:Group:new.html.twig", 4)->display($context);
        
        $__internal_8356dc367ea696ec2ddaaa923978fbbc2b73e63ad352896cdabb1df132962ee2->leave($__internal_8356dc367ea696ec2ddaaa923978fbbc2b73e63ad352896cdabb1df132962ee2_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Group:new.html.twig";
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
/* {% include "FOSUserBundle:Group:new_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
