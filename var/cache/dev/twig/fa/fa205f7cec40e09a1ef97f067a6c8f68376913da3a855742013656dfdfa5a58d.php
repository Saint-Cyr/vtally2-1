<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_a27e39562c072abb16463b771bb78786106c6c10183293697e0b4d9c6fbe43b3 extends Twig_Template
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
        $__internal_3a3e94f758c64ee5744d071fe9a68dfc0b194700de401add00e4acbe9284b8c5 = $this->env->getExtension("native_profiler");
        $__internal_3a3e94f758c64ee5744d071fe9a68dfc0b194700de401add00e4acbe9284b8c5->enter($__internal_3a3e94f758c64ee5744d071fe9a68dfc0b194700de401add00e4acbe9284b8c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_3a3e94f758c64ee5744d071fe9a68dfc0b194700de401add00e4acbe9284b8c5->leave($__internal_3a3e94f758c64ee5744d071fe9a68dfc0b194700de401add00e4acbe9284b8c5_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
