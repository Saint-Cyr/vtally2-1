<?php

/* FOSUserBundle:Group:list.html.twig */
class __TwigTemplate_85061b3389d1c51f7c150356c8b206d5cc674b50a2a2eef5484f5bb97b9bc394 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Group:list.html.twig", 1);
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
        $__internal_76e1ff0af9938eae983a1644578c380293052cd93f034b048d7c8ebfc3e37d77 = $this->env->getExtension("native_profiler");
        $__internal_76e1ff0af9938eae983a1644578c380293052cd93f034b048d7c8ebfc3e37d77->enter($__internal_76e1ff0af9938eae983a1644578c380293052cd93f034b048d7c8ebfc3e37d77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Group:list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_76e1ff0af9938eae983a1644578c380293052cd93f034b048d7c8ebfc3e37d77->leave($__internal_76e1ff0af9938eae983a1644578c380293052cd93f034b048d7c8ebfc3e37d77_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_a40c4d171275f29c90015bd5ada35f64b50864b0fc5f4e7ca93e2e28c1bee57f = $this->env->getExtension("native_profiler");
        $__internal_a40c4d171275f29c90015bd5ada35f64b50864b0fc5f4e7ca93e2e28c1bee57f->enter($__internal_a40c4d171275f29c90015bd5ada35f64b50864b0fc5f4e7ca93e2e28c1bee57f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Group:list_content.html.twig", "FOSUserBundle:Group:list.html.twig", 4)->display($context);
        
        $__internal_a40c4d171275f29c90015bd5ada35f64b50864b0fc5f4e7ca93e2e28c1bee57f->leave($__internal_a40c4d171275f29c90015bd5ada35f64b50864b0fc5f4e7ca93e2e28c1bee57f_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Group:list.html.twig";
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
/* {% include "FOSUserBundle:Group:list_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
