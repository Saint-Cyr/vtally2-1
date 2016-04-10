<?php

/* SonataBlockBundle:Block:block_core_menu.html.twig */
class __TwigTemplate_c2720d9b19370e3bd41304145ebcc89dcc22b339ac44bc2e850bfde446dcd7ef extends Twig_Template
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
        return $this->loadTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates", array()), "block_base", array()), "SonataBlockBundle:Block:block_core_menu.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e79140d7aae1a9a4d89dea4e72368b581eed229d5f039f7173c640d2bdccb6b2 = $this->env->getExtension("native_profiler");
        $__internal_e79140d7aae1a9a4d89dea4e72368b581eed229d5f039f7173c640d2bdccb6b2->enter($__internal_e79140d7aae1a9a4d89dea4e72368b581eed229d5f039f7173c640d2bdccb6b2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_core_menu.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e79140d7aae1a9a4d89dea4e72368b581eed229d5f039f7173c640d2bdccb6b2->leave($__internal_e79140d7aae1a9a4d89dea4e72368b581eed229d5f039f7173c640d2bdccb6b2_prof);

    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        $__internal_e7c93e9cf799328634045032b86c9131989c16c3374ddbef302a3ae0b9ef5e47 = $this->env->getExtension("native_profiler");
        $__internal_e7c93e9cf799328634045032b86c9131989c16c3374ddbef302a3ae0b9ef5e47->enter($__internal_e7c93e9cf799328634045032b86c9131989c16c3374ddbef302a3ae0b9ef5e47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        // line 15
        echo "    ";
        echo $this->env->getExtension('knp_menu')->render((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), (isset($context["menu_options"]) ? $context["menu_options"] : $this->getContext($context, "menu_options")));
        echo "
";
        
        $__internal_e7c93e9cf799328634045032b86c9131989c16c3374ddbef302a3ae0b9ef5e47->leave($__internal_e7c93e9cf799328634045032b86c9131989c16c3374ddbef302a3ae0b9ef5e47_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_core_menu.html.twig";
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
/*     {{ knp_menu_render(menu, menu_options) }}*/
/* {% endblock %}*/
/* */
