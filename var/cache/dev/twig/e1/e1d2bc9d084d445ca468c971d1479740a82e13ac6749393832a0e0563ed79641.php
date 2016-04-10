<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_bba9990185ff1a647ba4edc9af10a17d758a144917cbc5a4cd3cd1df0d1f97da extends Twig_Template
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
        $__internal_36a50cae81d24c2d18059d9f328f195a0ac4b161a511a50b34928f3fbfeb07d5 = $this->env->getExtension("native_profiler");
        $__internal_36a50cae81d24c2d18059d9f328f195a0ac4b161a511a50b34928f3fbfeb07d5->enter($__internal_36a50cae81d24c2d18059d9f328f195a0ac4b161a511a50b34928f3fbfeb07d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.rdf.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_36a50cae81d24c2d18059d9f328f195a0ac4b161a511a50b34928f3fbfeb07d5->leave($__internal_36a50cae81d24c2d18059d9f328f195a0ac4b161a511a50b34928f3fbfeb07d5_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
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
/* {% include '@Twig/Exception/exception.xml.twig' with { 'exception': exception } %}*/
/* */
