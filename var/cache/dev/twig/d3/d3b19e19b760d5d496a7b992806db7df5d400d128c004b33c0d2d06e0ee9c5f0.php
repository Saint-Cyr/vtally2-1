<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_1185451e4e913d188f1bd24c5d6834b5a1dbba6db1940eeb4a1c54bc7eb08758 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_137adeec61d271db28d41062e05eb2ef0263a271a9b79d467296d7a5ff8d6333 = $this->env->getExtension("native_profiler");
        $__internal_137adeec61d271db28d41062e05eb2ef0263a271a9b79d467296d7a5ff8d6333->enter($__internal_137adeec61d271db28d41062e05eb2ef0263a271a9b79d467296d7a5ff8d6333_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_137adeec61d271db28d41062e05eb2ef0263a271a9b79d467296d7a5ff8d6333->leave($__internal_137adeec61d271db28d41062e05eb2ef0263a271a9b79d467296d7a5ff8d6333_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_eb6851c246d731293d8b49b4aa285305af5c15167f5ced14ba9822714ee53a29 = $this->env->getExtension("native_profiler");
        $__internal_eb6851c246d731293d8b49b4aa285305af5c15167f5ced14ba9822714ee53a29->enter($__internal_eb6851c246d731293d8b49b4aa285305af5c15167f5ced14ba9822714ee53a29_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_eb6851c246d731293d8b49b4aa285305af5c15167f5ced14ba9822714ee53a29->leave($__internal_eb6851c246d731293d8b49b4aa285305af5c15167f5ced14ba9822714ee53a29_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_20e54c21778e9d8185aa4af89142dce051842a47136d8bba159e9d5515a0805f = $this->env->getExtension("native_profiler");
        $__internal_20e54c21778e9d8185aa4af89142dce051842a47136d8bba159e9d5515a0805f->enter($__internal_20e54c21778e9d8185aa4af89142dce051842a47136d8bba159e9d5515a0805f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_20e54c21778e9d8185aa4af89142dce051842a47136d8bba159e9d5515a0805f->leave($__internal_20e54c21778e9d8185aa4af89142dce051842a47136d8bba159e9d5515a0805f_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block title 'Redirection Intercepted' %}*/
/* */
/* {% block body %}*/
/*     <div class="sf-reset">*/
/*         <div class="block-exception">*/
/*             <h1>This request redirects to <a href="{{ location }}">{{ location }}</a>.</h1>*/
/* */
/*             <p>*/
/*                 <small>*/
/*                     The redirect was intercepted by the web debug toolbar to help debugging.*/
/*                     For more information, see the "intercept-redirects" option of the Profiler.*/
/*                 </small>*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
