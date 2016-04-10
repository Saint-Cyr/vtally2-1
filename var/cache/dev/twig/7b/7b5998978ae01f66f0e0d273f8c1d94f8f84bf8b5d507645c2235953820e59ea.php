<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_695fa41e6d2235df1a5899b62f47a6ca94e8c0287047a5fad77ed7455f9b2fa4 extends Twig_Template
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
        $__internal_2c75ebd974ba6567342645c36adfff9abeb1197d9d2ef41d65b80dd170eda3a2 = $this->env->getExtension("native_profiler");
        $__internal_2c75ebd974ba6567342645c36adfff9abeb1197d9d2ef41d65b80dd170eda3a2->enter($__internal_2c75ebd974ba6567342645c36adfff9abeb1197d9d2ef41d65b80dd170eda3a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.atom.twig", 1)->display($context);
        
        $__internal_2c75ebd974ba6567342645c36adfff9abeb1197d9d2ef41d65b80dd170eda3a2->leave($__internal_2c75ebd974ba6567342645c36adfff9abeb1197d9d2ef41d65b80dd170eda3a2_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
