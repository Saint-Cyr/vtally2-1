<?php

/* TwigBundle:Exception:error.js.twig */
class __TwigTemplate_85c70dca61fa200dafe51794d17385d3413963fe2d533eca006efb43b4639173 extends Twig_Template
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
        $__internal_617489fd68544b68e5a7854f0169264999ef3a1da29d3cc7cb9f745e9a17fa44 = $this->env->getExtension("native_profiler");
        $__internal_617489fd68544b68e5a7854f0169264999ef3a1da29d3cc7cb9f745e9a17fa44->enter($__internal_617489fd68544b68e5a7854f0169264999ef3a1da29d3cc7cb9f745e9a17fa44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "js", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "js", null, true);
        echo "

*/
";
        
        $__internal_617489fd68544b68e5a7854f0169264999ef3a1da29d3cc7cb9f745e9a17fa44->leave($__internal_617489fd68544b68e5a7854f0169264999ef3a1da29d3cc7cb9f745e9a17fa44_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {{ status_code }} {{ status_text }}*/
/* */
/* *//* */
/* */
