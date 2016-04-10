<?php

/* SonataBlockBundle:Block:block_core_text.html.twig */
class __TwigTemplate_fbbadc7c8691deca426bb6ae0114a92d41d4c0d2d54fa851c755a0ea1e8281f4 extends Twig_Template
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
        return $this->loadTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates", array()), "block_base", array()), "SonataBlockBundle:Block:block_core_text.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8286465cf86c94b5049dcff26bad25d99119510ef218e8328e67ea91426fec9b = $this->env->getExtension("native_profiler");
        $__internal_8286465cf86c94b5049dcff26bad25d99119510ef218e8328e67ea91426fec9b->enter($__internal_8286465cf86c94b5049dcff26bad25d99119510ef218e8328e67ea91426fec9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_core_text.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8286465cf86c94b5049dcff26bad25d99119510ef218e8328e67ea91426fec9b->leave($__internal_8286465cf86c94b5049dcff26bad25d99119510ef218e8328e67ea91426fec9b_prof);

    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        $__internal_5f39a9542c7c51b0305c3d095e53432a936d410a510c85959650c59f7897d419 = $this->env->getExtension("native_profiler");
        $__internal_5f39a9542c7c51b0305c3d095e53432a936d410a510c85959650c59f7897d419->enter($__internal_5f39a9542c7c51b0305c3d095e53432a936d410a510c85959650c59f7897d419_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        // line 15
        echo "    ";
        echo $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "content", array());
        echo "
";
        
        $__internal_5f39a9542c7c51b0305c3d095e53432a936d410a510c85959650c59f7897d419->leave($__internal_5f39a9542c7c51b0305c3d095e53432a936d410a510c85959650c59f7897d419_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_core_text.html.twig";
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
/*     {{ settings.content|raw }}*/
/* {% endblock %}*/
/* */
