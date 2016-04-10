<?php

/* FOSUserBundle:Resetting:reset.html.twig */
class __TwigTemplate_3d7b7149e99fe98d533c8d1a6e7075db4353a6f0542196761852c1fafbe46e50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Resetting:reset.html.twig", 1);
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
        $__internal_9c39a44194b3e0699e121f4dc24c513fd44af0c9ca85e38cececd54f99d82657 = $this->env->getExtension("native_profiler");
        $__internal_9c39a44194b3e0699e121f4dc24c513fd44af0c9ca85e38cececd54f99d82657->enter($__internal_9c39a44194b3e0699e121f4dc24c513fd44af0c9ca85e38cececd54f99d82657_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Resetting:reset.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9c39a44194b3e0699e121f4dc24c513fd44af0c9ca85e38cececd54f99d82657->leave($__internal_9c39a44194b3e0699e121f4dc24c513fd44af0c9ca85e38cececd54f99d82657_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_ff934ed4119516f468cc4ee29e81e77358cb4f5cc4b22d712f2ff1629baafa78 = $this->env->getExtension("native_profiler");
        $__internal_ff934ed4119516f468cc4ee29e81e77358cb4f5cc4b22d712f2ff1629baafa78->enter($__internal_ff934ed4119516f468cc4ee29e81e77358cb4f5cc4b22d712f2ff1629baafa78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Resetting:reset_content.html.twig", "FOSUserBundle:Resetting:reset.html.twig", 4)->display($context);
        
        $__internal_ff934ed4119516f468cc4ee29e81e77358cb4f5cc4b22d712f2ff1629baafa78->leave($__internal_ff934ed4119516f468cc4ee29e81e77358cb4f5cc4b22d712f2ff1629baafa78_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:reset.html.twig";
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
/* {% include "FOSUserBundle:Resetting:reset_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
