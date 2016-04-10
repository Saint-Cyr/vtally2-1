<?php

/* FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig */
class __TwigTemplate_69fcffd0e4fb70a4baca277e80d817ffb02d6e255b99cbe44d1b4b4bb5df3fe1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig", 1);
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
        $__internal_83057e34e6b57ea18b6739ec7e6dc7233219cf6b1dda3fb7b0de5ac417983d4a = $this->env->getExtension("native_profiler");
        $__internal_83057e34e6b57ea18b6739ec7e6dc7233219cf6b1dda3fb7b0de5ac417983d4a->enter($__internal_83057e34e6b57ea18b6739ec7e6dc7233219cf6b1dda3fb7b0de5ac417983d4a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_83057e34e6b57ea18b6739ec7e6dc7233219cf6b1dda3fb7b0de5ac417983d4a->leave($__internal_83057e34e6b57ea18b6739ec7e6dc7233219cf6b1dda3fb7b0de5ac417983d4a_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_2acdfcd8e6d8217f0bcefd131af3689928958cb549efe5451cb6bc3c657b824b = $this->env->getExtension("native_profiler");
        $__internal_2acdfcd8e6d8217f0bcefd131af3689928958cb549efe5451cb6bc3c657b824b->enter($__internal_2acdfcd8e6d8217f0bcefd131af3689928958cb549efe5451cb6bc3c657b824b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 6
        echo "<p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.password_already_requested", array(), "FOSUserBundle"), "html", null, true);
        echo "</p>
";
        
        $__internal_2acdfcd8e6d8217f0bcefd131af3689928958cb549efe5451cb6bc3c657b824b->leave($__internal_2acdfcd8e6d8217f0bcefd131af3689928958cb549efe5451cb6bc3c657b824b_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig";
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
/* <p>{{ 'resetting.password_already_requested'|trans }}</p>*/
/* {% endblock fos_user_content %}*/
/* */
