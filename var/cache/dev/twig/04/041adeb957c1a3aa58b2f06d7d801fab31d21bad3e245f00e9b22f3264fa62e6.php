<?php

/* FOSUserBundle:Group:show_content.html.twig */
class __TwigTemplate_6ac9e72fcb04a35b16430be06764b009249f44490249f0f911ee65aad1c2fd42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f54d04328630d2518beaa167038a40b058a8241cd5ccd1bbcf537d234e528aa8 = $this->env->getExtension("native_profiler");
        $__internal_f54d04328630d2518beaa167038a40b058a8241cd5ccd1bbcf537d234e528aa8->enter($__internal_f54d04328630d2518beaa167038a40b058a8241cd5ccd1bbcf537d234e528aa8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Group:show_content.html.twig"));

        // line 2
        echo "
<div class=\"fos_user_group_show\">
    <p>";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("group.show.name", array(), "FOSUserBundle"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "getName", array(), "method"), "html", null, true);
        echo "</p>
</div>
";
        
        $__internal_f54d04328630d2518beaa167038a40b058a8241cd5ccd1bbcf537d234e528aa8->leave($__internal_f54d04328630d2518beaa167038a40b058a8241cd5ccd1bbcf537d234e528aa8_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Group:show_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 4,  22 => 2,);
    }
}
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* */
/* <div class="fos_user_group_show">*/
/*     <p>{{ 'group.show.name'|trans }}: {{ group.getName() }}</p>*/
/* </div>*/
/* */
