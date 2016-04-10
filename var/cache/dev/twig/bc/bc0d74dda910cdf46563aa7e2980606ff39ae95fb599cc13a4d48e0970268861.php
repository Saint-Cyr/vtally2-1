<?php

/* SonataBlockBundle:Block:block_core_action.html.twig */
class __TwigTemplate_1b087ca2cbe49b729d82e350e7f54ccef1a465a63a16216a314a3a6444890e63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates", array()), "block_base", array()), "SonataBlockBundle:Block:block_core_action.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c03e70547ab6dbfe1cb91aba4ddf171fa300d4a1dd7e787e7cb17e574f8bf139 = $this->env->getExtension("native_profiler");
        $__internal_c03e70547ab6dbfe1cb91aba4ddf171fa300d4a1dd7e787e7cb17e574f8bf139->enter($__internal_c03e70547ab6dbfe1cb91aba4ddf171fa300d4a1dd7e787e7cb17e574f8bf139_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_core_action.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c03e70547ab6dbfe1cb91aba4ddf171fa300d4a1dd7e787e7cb17e574f8bf139->leave($__internal_c03e70547ab6dbfe1cb91aba4ddf171fa300d4a1dd7e787e7cb17e574f8bf139_prof);

    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        $__internal_8da2dcc633439957d6f94f1360afe86c8e84fb0ddb98186d12a2495c01ef1ae8 = $this->env->getExtension("native_profiler");
        $__internal_8da2dcc633439957d6f94f1360afe86c8e84fb0ddb98186d12a2495c01ef1ae8->enter($__internal_8da2dcc633439957d6f94f1360afe86c8e84fb0ddb98186d12a2495c01ef1ae8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        // line 15
        echo "    ";
        echo (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content"));
        echo "
";
        
        $__internal_8da2dcc633439957d6f94f1360afe86c8e84fb0ddb98186d12a2495c01ef1ae8->leave($__internal_8da2dcc633439957d6f94f1360afe86c8e84fb0ddb98186d12a2495c01ef1ae8_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_core_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 15,  33 => 14,  18 => 12,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* */
/* {% extends sonata_block.templates.block_base %}*/
/* */
/* {% block block %}*/
/*     {{ content|raw }}*/
/* {% endblock %}*/
/* */
