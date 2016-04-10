<?php

/* TwigBundle:Exception:exception.js.twig */
class __TwigTemplate_0aad799f3c110e4133a244206b072b8cb855550366d98ed60891bb4491956124 extends Twig_Template
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
        $__internal_a4a77137576abff68955cfc67701d70d83c903ec6594cb8e6f8534312bb47ffd = $this->env->getExtension("native_profiler");
        $__internal_a4a77137576abff68955cfc67701d70d83c903ec6594cb8e6f8534312bb47ffd->enter($__internal_a4a77137576abff68955cfc67701d70d83c903ec6594cb8e6f8534312bb47ffd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.js.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_a4a77137576abff68955cfc67701d70d83c903ec6594cb8e6f8534312bb47ffd->leave($__internal_a4a77137576abff68955cfc67701d70d83c903ec6594cb8e6f8534312bb47ffd_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {% include '@Twig/Exception/exception.txt.twig' with { 'exception': exception } %}*/
/* *//* */
/* */
