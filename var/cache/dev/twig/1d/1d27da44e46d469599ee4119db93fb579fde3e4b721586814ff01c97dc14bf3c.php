<?php

/* knp_menu_base.html.twig */
class __TwigTemplate_95acfe47b9a801fa84299a7ec9590ea26ad595f8fc8012f3a09de48c8de6d0f9 extends Twig_Template
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
        $__internal_eb73a7693eb648cbb6ff650b8ca1418b52b99317cdab51eed558c2f83c7d5bb7 = $this->env->getExtension("native_profiler");
        $__internal_eb73a7693eb648cbb6ff650b8ca1418b52b99317cdab51eed558c2f83c7d5bb7->enter($__internal_eb73a7693eb648cbb6ff650b8ca1418b52b99317cdab51eed558c2f83c7d5bb7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        // line 1
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "compressed", array())) {
            $this->displayBlock("compressed_root", $context, $blocks);
        } else {
            $this->displayBlock("root", $context, $blocks);
        }
        
        $__internal_eb73a7693eb648cbb6ff650b8ca1418b52b99317cdab51eed558c2f83c7d5bb7->leave($__internal_eb73a7693eb648cbb6ff650b8ca1418b52b99317cdab51eed558c2f83c7d5bb7_prof);

    }

    public function getTemplateName()
    {
        return "knp_menu_base.html.twig";
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
/* {% if options.compressed %}{{ block('compressed_root') }}{% else %}{{ block('root') }}{% endif %}*/
/* */
