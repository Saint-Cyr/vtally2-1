<?php

/* FOSUserBundle:Resetting:checkEmail.html.twig */
class __TwigTemplate_9f5c0a08b3f6c17cbd78d88c9f8825f2efad91dd08c75d5058ecb49030f392ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Resetting:checkEmail.html.twig", 1);
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
        $__internal_021d90a8e1c573b59e9663a63eae4497edfb8d2f6d9799e5303bae4100960dd4 = $this->env->getExtension("native_profiler");
        $__internal_021d90a8e1c573b59e9663a63eae4497edfb8d2f6d9799e5303bae4100960dd4->enter($__internal_021d90a8e1c573b59e9663a63eae4497edfb8d2f6d9799e5303bae4100960dd4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Resetting:checkEmail.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_021d90a8e1c573b59e9663a63eae4497edfb8d2f6d9799e5303bae4100960dd4->leave($__internal_021d90a8e1c573b59e9663a63eae4497edfb8d2f6d9799e5303bae4100960dd4_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_6ec087b325a8b428d92e8559e38cbc2e8bde652405ae0dd2988516df82007d22 = $this->env->getExtension("native_profiler");
        $__internal_6ec087b325a8b428d92e8559e38cbc2e8bde652405ae0dd2988516df82007d22->enter($__internal_6ec087b325a8b428d92e8559e38cbc2e8bde652405ae0dd2988516df82007d22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "<p>
";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.check_email", array("%email%" => (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email"))), "FOSUserBundle"), "html", null, true);
        echo "
</p>
";
        
        $__internal_6ec087b325a8b428d92e8559e38cbc2e8bde652405ae0dd2988516df82007d22->leave($__internal_6ec087b325a8b428d92e8559e38cbc2e8bde652405ae0dd2988516df82007d22_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  40 => 6,  34 => 5,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* {% block fos_user_content %}*/
/* <p>*/
/* {{ 'resetting.check_email'|trans({'%email%': email}) }}*/
/* </p>*/
/* {% endblock %}*/
/* */
