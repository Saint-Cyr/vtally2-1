<?php

/* SonataAdminBundle:CRUD:action.html.twig */
class __TwigTemplate_890c53e0ef674b9f59e07afc158e87e4f9b55b7fff8e5ccc62d247e09e15767e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'tab_menu' => array($this, 'block_tab_menu'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:action.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e0a21dd8e57d42377333f07c52189fc77a4b12650abe957a85d43dd8711e3bb2 = $this->env->getExtension("native_profiler");
        $__internal_e0a21dd8e57d42377333f07c52189fc77a4b12650abe957a85d43dd8711e3bb2->enter($__internal_e0a21dd8e57d42377333f07c52189fc77a4b12650abe957a85d43dd8711e3bb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:action.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e0a21dd8e57d42377333f07c52189fc77a4b12650abe957a85d43dd8711e3bb2->leave($__internal_e0a21dd8e57d42377333f07c52189fc77a4b12650abe957a85d43dd8711e3bb2_prof);

    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        $__internal_9963008801080d02796a3182c7550fdd1cf3979bb4f35095faa9f8fd5c9d3b02 = $this->env->getExtension("native_profiler");
        $__internal_9963008801080d02796a3182c7550fdd1cf3979bb4f35095faa9f8fd5c9d3b02->enter($__internal_9963008801080d02796a3182c7550fdd1cf3979bb4f35095faa9f8fd5c9d3b02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        // line 15
        echo "    ";
        $this->loadTemplate("SonataAdminBundle:CRUD:action_buttons.html.twig", "SonataAdminBundle:CRUD:action.html.twig", 15)->display($context);
        
        $__internal_9963008801080d02796a3182c7550fdd1cf3979bb4f35095faa9f8fd5c9d3b02->leave($__internal_9963008801080d02796a3182c7550fdd1cf3979bb4f35095faa9f8fd5c9d3b02_prof);

    }

    // line 18
    public function block_tab_menu($context, array $blocks = array())
    {
        $__internal_4173e42d4066da44b5270c5389301a529974a3d1bcd31b170d84d4121af89ead = $this->env->getExtension("native_profiler");
        $__internal_4173e42d4066da44b5270c5389301a529974a3d1bcd31b170d84d4121af89ead->enter($__internal_4173e42d4066da44b5270c5389301a529974a3d1bcd31b170d84d4121af89ead_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tab_menu"));

        // line 19
        echo "    ";
        if (array_key_exists("action", $context)) {
            // line 20
            echo "        ";
            echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active", "template" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), "getTemplate", array(0 => "tab_menu_template"), "method")), "twig");
            echo "
    ";
        }
        
        $__internal_4173e42d4066da44b5270c5389301a529974a3d1bcd31b170d84d4121af89ead->leave($__internal_4173e42d4066da44b5270c5389301a529974a3d1bcd31b170d84d4121af89ead_prof);

    }

    // line 24
    public function block_content($context, array $blocks = array())
    {
        $__internal_0a01a3cb14e1fe9c2ded7a36ab9cbcd76981eeb747b4c42799f274a322e05772 = $this->env->getExtension("native_profiler");
        $__internal_0a01a3cb14e1fe9c2ded7a36ab9cbcd76981eeb747b4c42799f274a322e05772->enter($__internal_0a01a3cb14e1fe9c2ded7a36ab9cbcd76981eeb747b4c42799f274a322e05772_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 25
        echo "
    Redefine the content block in your action template

";
        
        $__internal_0a01a3cb14e1fe9c2ded7a36ab9cbcd76981eeb747b4c42799f274a322e05772->leave($__internal_0a01a3cb14e1fe9c2ded7a36ab9cbcd76981eeb747b4c42799f274a322e05772_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 25,  69 => 24,  58 => 20,  55 => 19,  49 => 18,  41 => 15,  35 => 14,  20 => 12,);
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
/* {% extends base_template %}*/
/* */
/* {% block actions %}*/
/*     {% include 'SonataAdminBundle:CRUD:action_buttons.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block tab_menu %}*/
/*     {% if action is defined %}*/
/*         {{ knp_menu_render(admin.sidemenu(action), {'currentClass' : 'active', 'template': sonata_admin.adminPool.getTemplate('tab_menu_template')}, 'twig') }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     Redefine the content block in your action template*/
/* */
/* {% endblock %}*/
/* */
