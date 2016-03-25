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
        $__internal_32382a85fbf0e43f0f13f1184e9b6ae7fe4a853c217e82ee942e9901f02392e9 = $this->env->getExtension("native_profiler");
        $__internal_32382a85fbf0e43f0f13f1184e9b6ae7fe4a853c217e82ee942e9901f02392e9->enter($__internal_32382a85fbf0e43f0f13f1184e9b6ae7fe4a853c217e82ee942e9901f02392e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Core:user_block.html.twig"));

        // line 1
        $this->displayBlock('user_block', $context, $blocks);
        
        $__internal_32382a85fbf0e43f0f13f1184e9b6ae7fe4a853c217e82ee942e9901f02392e9->leave($__internal_32382a85fbf0e43f0f13f1184e9b6ae7fe4a853c217e82ee942e9901f02392e9_prof);

    }

    public function block_user_block($context, array $blocks = array())
    {
        $__internal_41ffd7b2ce6b0e2a8e5d8609513e8eb0360ea209e781ee7dc6d635771e53d34f = $this->env->getExtension("native_profiler");
        $__internal_41ffd7b2ce6b0e2a8e5d8609513e8eb0360ea209e781ee7dc6d635771e53d34f->enter($__internal_41ffd7b2ce6b0e2a8e5d8609513e8eb0360ea209e781ee7dc6d635771e53d34f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "user_block"));

        
        $__internal_41ffd7b2ce6b0e2a8e5d8609513e8eb0360ea209e781ee7dc6d635771e53d34f->leave($__internal_41ffd7b2ce6b0e2a8e5d8609513e8eb0360ea209e781ee7dc6d635771e53d34f_prof);

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
