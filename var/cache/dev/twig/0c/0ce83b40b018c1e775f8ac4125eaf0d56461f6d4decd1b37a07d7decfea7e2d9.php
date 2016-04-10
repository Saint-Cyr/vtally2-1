<?php

/* FOSUserBundle:Profile:edit.html.twig */
class __TwigTemplate_cd9f416d6c9be3754c206257b945292bbb22cc704399e727c27855f8964bb927 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Profile:edit.html.twig", 1);
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
        $__internal_0dfd1effc649908ea120a00f2fced13fdfd738f73a74f4c0b6229317114ea69e = $this->env->getExtension("native_profiler");
        $__internal_0dfd1effc649908ea120a00f2fced13fdfd738f73a74f4c0b6229317114ea69e->enter($__internal_0dfd1effc649908ea120a00f2fced13fdfd738f73a74f4c0b6229317114ea69e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Profile:edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0dfd1effc649908ea120a00f2fced13fdfd738f73a74f4c0b6229317114ea69e->leave($__internal_0dfd1effc649908ea120a00f2fced13fdfd738f73a74f4c0b6229317114ea69e_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_0c82822f8b8cd451422f0b7657d2ff318f45204a512570b224525b0c2f7f15a8 = $this->env->getExtension("native_profiler");
        $__internal_0c82822f8b8cd451422f0b7657d2ff318f45204a512570b224525b0c2f7f15a8->enter($__internal_0c82822f8b8cd451422f0b7657d2ff318f45204a512570b224525b0c2f7f15a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Profile:edit_content.html.twig", "FOSUserBundle:Profile:edit.html.twig", 4)->display($context);
        
        $__internal_0c82822f8b8cd451422f0b7657d2ff318f45204a512570b224525b0c2f7f15a8->leave($__internal_0c82822f8b8cd451422f0b7657d2ff318f45204a512570b224525b0c2f7f15a8_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:edit.html.twig";
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
/* {% include "FOSUserBundle:Profile:edit_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
