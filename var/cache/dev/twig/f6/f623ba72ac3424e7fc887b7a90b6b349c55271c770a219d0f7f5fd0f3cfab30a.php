<?php

/* FOSUserBundle:Registration:checkEmail.html.twig */
class __TwigTemplate_0a2ebd182edeb4fed3809ea54710fb2ece337179e98c8adecd9e6224fad94356 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:checkEmail.html.twig", 1);
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
        $__internal_06620bc8c11352f293f7f58db290c15de81238349a0c84c2c078367c8bcad099 = $this->env->getExtension("native_profiler");
        $__internal_06620bc8c11352f293f7f58db290c15de81238349a0c84c2c078367c8bcad099->enter($__internal_06620bc8c11352f293f7f58db290c15de81238349a0c84c2c078367c8bcad099_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:checkEmail.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_06620bc8c11352f293f7f58db290c15de81238349a0c84c2c078367c8bcad099->leave($__internal_06620bc8c11352f293f7f58db290c15de81238349a0c84c2c078367c8bcad099_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_8a3843730012ba4ab499e70d1c8169225dc92c042bde404e5f44e42d00cfd94d = $this->env->getExtension("native_profiler");
        $__internal_8a3843730012ba4ab499e70d1c8169225dc92c042bde404e5f44e42d00cfd94d->enter($__internal_8a3843730012ba4ab499e70d1c8169225dc92c042bde404e5f44e42d00cfd94d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "    <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.check_email", array("%email%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array())), "FOSUserBundle"), "html", null, true);
        echo "</p>
";
        
        $__internal_8a3843730012ba4ab499e70d1c8169225dc92c042bde404e5f44e42d00cfd94d->leave($__internal_8a3843730012ba4ab499e70d1c8169225dc92c042bde404e5f44e42d00cfd94d_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  34 => 5,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block fos_user_content %}*/
/*     <p>{{ 'registration.check_email'|trans({'%email%': user.email}) }}</p>*/
/* {% endblock fos_user_content %}*/
/* */
