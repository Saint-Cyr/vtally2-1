<?php

/* FOSUserBundle:Registration:confirmed.html.twig */
class __TwigTemplate_fc80c43e4c112b2c38c0a4c886fec9265905a19aaf547f73a7e925988058a6f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:confirmed.html.twig", 1);
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
        $__internal_f2d5d7b457c11bca888b5ba35e6188ff72f157fc7fb54e3d9f31c94bcb888d7f = $this->env->getExtension("native_profiler");
        $__internal_f2d5d7b457c11bca888b5ba35e6188ff72f157fc7fb54e3d9f31c94bcb888d7f->enter($__internal_f2d5d7b457c11bca888b5ba35e6188ff72f157fc7fb54e3d9f31c94bcb888d7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:confirmed.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f2d5d7b457c11bca888b5ba35e6188ff72f157fc7fb54e3d9f31c94bcb888d7f->leave($__internal_f2d5d7b457c11bca888b5ba35e6188ff72f157fc7fb54e3d9f31c94bcb888d7f_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_891a24b71904c25afcb9429cbfffb5efbefb0c6a0449d574fb09ed7a0c20c738 = $this->env->getExtension("native_profiler");
        $__internal_891a24b71904c25afcb9429cbfffb5efbefb0c6a0449d574fb09ed7a0c20c738->enter($__internal_891a24b71904c25afcb9429cbfffb5efbefb0c6a0449d574fb09ed7a0c20c738_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "    <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.confirmed", array("%username%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array())), "FOSUserBundle"), "html", null, true);
        echo "</p>
    ";
        // line 7
        if ((isset($context["targetUrl"]) ? $context["targetUrl"] : $this->getContext($context, "targetUrl"))) {
            // line 8
            echo "    <p><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["targetUrl"]) ? $context["targetUrl"] : $this->getContext($context, "targetUrl")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.back", array(), "FOSUserBundle"), "html", null, true);
            echo "</a></p>
    ";
        }
        
        $__internal_891a24b71904c25afcb9429cbfffb5efbefb0c6a0449d574fb09ed7a0c20c738->leave($__internal_891a24b71904c25afcb9429cbfffb5efbefb0c6a0449d574fb09ed7a0c20c738_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:confirmed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 8,  45 => 7,  40 => 6,  34 => 5,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block fos_user_content %}*/
/*     <p>{{ 'registration.confirmed'|trans({'%username%': user.username}) }}</p>*/
/*     {% if targetUrl %}*/
/*     <p><a href="{{ targetUrl }}">{{ 'registration.back'|trans }}</a></p>*/
/*     {% endif %}*/
/* {% endblock fos_user_content %}*/
/* */
