<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_c4abd922a162473a4e3b8024b584af90fd033d8b37d478c745f5824f65807b09 extends Twig_Template
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
        $__internal_3d31f8696ab3bb349712316c2f88c559484c2a4a7a7f72b615c937b14eb2d685 = $this->env->getExtension("native_profiler");
        $__internal_3d31f8696ab3bb349712316c2f88c559484c2a4a7a7f72b615c937b14eb2d685->enter($__internal_3d31f8696ab3bb349712316c2f88c559484c2a4a7a7f72b615c937b14eb2d685_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_3d31f8696ab3bb349712316c2f88c559484c2a4a7a7f72b615c937b14eb2d685->leave($__internal_3d31f8696ab3bb349712316c2f88c559484c2a4a7a7f72b615c937b14eb2d685_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
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
