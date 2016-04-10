<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_b47e97eaee5a2b31bd3adc1a7a81931b2d751ab8b30feeab5750a0bc16b500f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bdf2377601c9aac2eebd9f535a1ae38c61cd8ba7c3d0f76fe2efb73da9b1f9d5 = $this->env->getExtension("native_profiler");
        $__internal_bdf2377601c9aac2eebd9f535a1ae38c61cd8ba7c3d0f76fe2efb73da9b1f9d5->enter($__internal_bdf2377601c9aac2eebd9f535a1ae38c61cd8ba7c3d0f76fe2efb73da9b1f9d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_bdf2377601c9aac2eebd9f535a1ae38c61cd8ba7c3d0f76fe2efb73da9b1f9d5->leave($__internal_bdf2377601c9aac2eebd9f535a1ae38c61cd8ba7c3d0f76fe2efb73da9b1f9d5_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_98fa5acdfc9c54d1f4b520a167a91fc1205a4ecf6e537be630c1c5556cc314fb = $this->env->getExtension("native_profiler");
        $__internal_98fa5acdfc9c54d1f4b520a167a91fc1205a4ecf6e537be630c1c5556cc314fb->enter($__internal_98fa5acdfc9c54d1f4b520a167a91fc1205a4ecf6e537be630c1c5556cc314fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_98fa5acdfc9c54d1f4b520a167a91fc1205a4ecf6e537be630c1c5556cc314fb->leave($__internal_98fa5acdfc9c54d1f4b520a167a91fc1205a4ecf6e537be630c1c5556cc314fb_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block panel '' %}*/
/* */
