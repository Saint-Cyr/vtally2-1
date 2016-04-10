<?php

/* TwigBundle:Exception:error.txt.twig */
class __TwigTemplate_dfca8e6163a46f6d1cac8035cb3ba97de24e640ed721a91590c219778a0e417c extends Twig_Template
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
        $__internal_368b4426b85f3511a4d7e5dc3f331e9cb36828ca28a955980f41c7d0f8f1d1c8 = $this->env->getExtension("native_profiler");
        $__internal_368b4426b85f3511a4d7e5dc3f331e9cb36828ca28a955980f41c7d0f8f1d1c8->enter($__internal_368b4426b85f3511a4d7e5dc3f331e9cb36828ca28a955980f41c7d0f8f1d1c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.txt.twig"));

        // line 1
        echo "Oops! An Error Occurred
=======================

The server returned a \"";
        // line 4
        echo (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code"));
        echo " ";
        echo (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text"));
        echo "\".

Something is broken. Please let us know what you were doing when this error occurred.
We will fix it as soon as possible. Sorry for any inconvenience caused.
";
        
        $__internal_368b4426b85f3511a4d7e5dc3f331e9cb36828ca28a955980f41c7d0f8f1d1c8->leave($__internal_368b4426b85f3511a4d7e5dc3f331e9cb36828ca28a955980f41c7d0f8f1d1c8_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  22 => 1,);
    }
}
/* Oops! An Error Occurred*/
/* =======================*/
/* */
/* The server returned a "{{ status_code }} {{ status_text }}".*/
/* */
/* Something is broken. Please let us know what you were doing when this error occurred.*/
/* We will fix it as soon as possible. Sorry for any inconvenience caused.*/
/* */
