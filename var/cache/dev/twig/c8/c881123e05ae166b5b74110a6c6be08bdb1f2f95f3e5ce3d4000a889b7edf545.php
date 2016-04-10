<?php

/* FOSUserBundle:ChangePassword:changePassword.html.twig */
class __TwigTemplate_91380ce12577b107b5d4ffba8a7c8ae7e3e5f8a85a1d74612ff11288f35cdf2d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:ChangePassword:changePassword.html.twig", 1);
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
        $__internal_72060fad200e97ac81184068a2c895fc6eefa665c5fada93417547c208ae5c40 = $this->env->getExtension("native_profiler");
        $__internal_72060fad200e97ac81184068a2c895fc6eefa665c5fada93417547c208ae5c40->enter($__internal_72060fad200e97ac81184068a2c895fc6eefa665c5fada93417547c208ae5c40_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:ChangePassword:changePassword.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_72060fad200e97ac81184068a2c895fc6eefa665c5fada93417547c208ae5c40->leave($__internal_72060fad200e97ac81184068a2c895fc6eefa665c5fada93417547c208ae5c40_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_578abc6e408e2879edc9314e69616c40eaec20f1c8b1f23441ae23971eabb9d4 = $this->env->getExtension("native_profiler");
        $__internal_578abc6e408e2879edc9314e69616c40eaec20f1c8b1f23441ae23971eabb9d4->enter($__internal_578abc6e408e2879edc9314e69616c40eaec20f1c8b1f23441ae23971eabb9d4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:ChangePassword:changePassword_content.html.twig", "FOSUserBundle:ChangePassword:changePassword.html.twig", 4)->display($context);
        
        $__internal_578abc6e408e2879edc9314e69616c40eaec20f1c8b1f23441ae23971eabb9d4->leave($__internal_578abc6e408e2879edc9314e69616c40eaec20f1c8b1f23441ae23971eabb9d4_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:ChangePassword:changePassword.html.twig";
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
/* {% include "FOSUserBundle:ChangePassword:changePassword_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
