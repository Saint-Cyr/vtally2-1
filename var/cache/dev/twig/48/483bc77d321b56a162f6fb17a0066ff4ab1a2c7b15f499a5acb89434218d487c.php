<?php

/* SonataAdminBundle:Core:user_block.html.twig */
class __TwigTemplate_b396bfdfe1dba797ea16eeb6cdc00a9d3de84af5c634ee47f4800daff3925c1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c7128b56f455841c83c9a6c255beefd99031a2d09c2519355d7035ff71d2ffe2 = $this->env->getExtension("native_profiler");
        $__internal_c7128b56f455841c83c9a6c255beefd99031a2d09c2519355d7035ff71d2ffe2->enter($__internal_c7128b56f455841c83c9a6c255beefd99031a2d09c2519355d7035ff71d2ffe2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Core:user_block.html.twig"));

        // line 1
        $this->displayBlock('user_block', $context, $blocks);
        
        $__internal_c7128b56f455841c83c9a6c255beefd99031a2d09c2519355d7035ff71d2ffe2->leave($__internal_c7128b56f455841c83c9a6c255beefd99031a2d09c2519355d7035ff71d2ffe2_prof);

    }

    public function block_user_block($context, array $blocks = array())
    {
        $__internal_1049c3adffb2844ae0be2f7ff20669191cd4eff605217e0e0175c287a3d3dbfe = $this->env->getExtension("native_profiler");
        $__internal_1049c3adffb2844ae0be2f7ff20669191cd4eff605217e0e0175c287a3d3dbfe->enter($__internal_1049c3adffb2844ae0be2f7ff20669191cd4eff605217e0e0175c287a3d3dbfe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "user_block"));

        
        $__internal_1049c3adffb2844ae0be2f7ff20669191cd4eff605217e0e0175c287a3d3dbfe->leave($__internal_1049c3adffb2844ae0be2f7ff20669191cd4eff605217e0e0175c287a3d3dbfe_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:user_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block user_block %}{# Customize this value #}{% endblock %}*/
/* */
