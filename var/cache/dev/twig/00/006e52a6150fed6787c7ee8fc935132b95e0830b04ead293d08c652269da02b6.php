<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_e16588ca1cc625892e821bddf82263ac380f9fc31cc8818a4808ab1d60dfaf7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:register.html.twig", 1);
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
        $__internal_1a3639bb32acee7dd928dc315b868ceea15afbe25305d02c95667af725676f0d = $this->env->getExtension("native_profiler");
        $__internal_1a3639bb32acee7dd928dc315b868ceea15afbe25305d02c95667af725676f0d->enter($__internal_1a3639bb32acee7dd928dc315b868ceea15afbe25305d02c95667af725676f0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1a3639bb32acee7dd928dc315b868ceea15afbe25305d02c95667af725676f0d->leave($__internal_1a3639bb32acee7dd928dc315b868ceea15afbe25305d02c95667af725676f0d_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_30ff5ad9a5c97b21166095f3eb8e0c63e11d414010d1278b80f21812a3f2aaf8 = $this->env->getExtension("native_profiler");
        $__internal_30ff5ad9a5c97b21166095f3eb8e0c63e11d414010d1278b80f21812a3f2aaf8->enter($__internal_30ff5ad9a5c97b21166095f3eb8e0c63e11d414010d1278b80f21812a3f2aaf8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Registration:register_content.html.twig", "FOSUserBundle:Registration:register.html.twig", 4)->display($context);
        
        $__internal_30ff5ad9a5c97b21166095f3eb8e0c63e11d414010d1278b80f21812a3f2aaf8->leave($__internal_30ff5ad9a5c97b21166095f3eb8e0c63e11d414010d1278b80f21812a3f2aaf8_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
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
/* {% include "FOSUserBundle:Registration:register_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
