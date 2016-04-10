<?php

/* TwigBundle:Exception:exception.atom.twig */
class __TwigTemplate_6b07b707c35cc7d353a8477e915967232f7d0521121046852eb8dbe9bbd00f8a extends Twig_Template
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
        $__internal_8ed70910a508064bb103171a91400335637b531127501c75926f5b2ff102db43 = $this->env->getExtension("native_profiler");
        $__internal_8ed70910a508064bb103171a91400335637b531127501c75926f5b2ff102db43->enter($__internal_8ed70910a508064bb103171a91400335637b531127501c75926f5b2ff102db43_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.atom.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_8ed70910a508064bb103171a91400335637b531127501c75926f5b2ff102db43->leave($__internal_8ed70910a508064bb103171a91400335637b531127501c75926f5b2ff102db43_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.atom.twig";
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
