<?php

/* SonataAdminBundle:CRUD:base_edit.html.twig */
class __TwigTemplate_87c450eb7a48bcd184b73fc425d98615fe8846dd4742b4974650b6a0a54f8600 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $_trait_0 = $this->loadTemplate("SonataAdminBundle:CRUD:base_edit_form.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 32);
        // line 32
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."SonataAdminBundle:CRUD:base_edit_form.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        if (!isset($_trait_0_blocks["form"])) {
            throw new Twig_Error_Runtime(sprintf('Block "form" is not defined in trait "SonataAdminBundle:CRUD:base_edit_form.html.twig".'));
        }

        $_trait_0_blocks["parentForm"] = $_trait_0_blocks["form"]; unset($_trait_0_blocks["form"]);

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'navbar_title' => array($this, 'block_navbar_title'),
                'actions' => array($this, 'block_actions'),
                'tab_menu' => array($this, 'block_tab_menu'),
                'form' => array($this, 'block_form'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:base_edit.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_262061ee6cc83de74da79d28d7820294b3eed0f2acb9f64864a7b69eeeb09a71 = $this->env->getExtension("native_profiler");
        $__internal_262061ee6cc83de74da79d28d7820294b3eed0f2acb9f64864a7b69eeeb09a71->enter($__internal_262061ee6cc83de74da79d28d7820294b3eed0f2acb9f64864a7b69eeeb09a71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_edit.html.twig"));

        // line 33
        $context["form_helper"] = $this->loadTemplate("SonataAdminBundle:CRUD:base_edit_form_macro.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 33);
        // line 12
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_262061ee6cc83de74da79d28d7820294b3eed0f2acb9f64864a7b69eeeb09a71->leave($__internal_262061ee6cc83de74da79d28d7820294b3eed0f2acb9f64864a7b69eeeb09a71_prof);

    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        $__internal_77b1ca646026feb58e433247cc9b305f130631ee7c0550047cf9e6ad9f65305d = $this->env->getExtension("native_profiler");
        $__internal_77b1ca646026feb58e433247cc9b305f130631ee7c0550047cf9e6ad9f65305d->enter($__internal_77b1ca646026feb58e433247cc9b305f130631ee7c0550047cf9e6ad9f65305d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 15
        echo "    ";
        if ( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"))) {
            // line 16
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_edit", array("%name%" => twig_truncate_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "toString", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), 15)), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        } else {
            // line 18
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_create", array(), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        }
        
        $__internal_77b1ca646026feb58e433247cc9b305f130631ee7c0550047cf9e6ad9f65305d->leave($__internal_77b1ca646026feb58e433247cc9b305f130631ee7c0550047cf9e6ad9f65305d_prof);

    }

    // line 22
    public function block_navbar_title($context, array $blocks = array())
    {
        $__internal_7a9092b3f2d0e1eba2ce9af7a1289af15edb424c7e35366b8e0bef7160934ead = $this->env->getExtension("native_profiler");
        $__internal_7a9092b3f2d0e1eba2ce9af7a1289af15edb424c7e35366b8e0bef7160934ead->enter($__internal_7a9092b3f2d0e1eba2ce9af7a1289af15edb424c7e35366b8e0bef7160934ead_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "navbar_title"));

        // line 23
        echo "    ";
        $this->displayBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_7a9092b3f2d0e1eba2ce9af7a1289af15edb424c7e35366b8e0bef7160934ead->leave($__internal_7a9092b3f2d0e1eba2ce9af7a1289af15edb424c7e35366b8e0bef7160934ead_prof);

    }

    // line 26
    public function block_actions($context, array $blocks = array())
    {
        $__internal_91d8a707005c8c56181349a9f026c40272ed0aacc3d0679d2c26608befd0d6f2 = $this->env->getExtension("native_profiler");
        $__internal_91d8a707005c8c56181349a9f026c40272ed0aacc3d0679d2c26608befd0d6f2->enter($__internal_91d8a707005c8c56181349a9f026c40272ed0aacc3d0679d2c26608befd0d6f2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        // line 27
        echo "    ";
        $this->loadTemplate("SonataAdminBundle:CRUD:action_buttons.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 27)->display($context);
        
        $__internal_91d8a707005c8c56181349a9f026c40272ed0aacc3d0679d2c26608befd0d6f2->leave($__internal_91d8a707005c8c56181349a9f026c40272ed0aacc3d0679d2c26608befd0d6f2_prof);

    }

    // line 30
    public function block_tab_menu($context, array $blocks = array())
    {
        $__internal_4f672f94a982032fa06b70c88a59754d867a82e2a8f10fe623e1f22b74fb8249 = $this->env->getExtension("native_profiler");
        $__internal_4f672f94a982032fa06b70c88a59754d867a82e2a8f10fe623e1f22b74fb8249->enter($__internal_4f672f94a982032fa06b70c88a59754d867a82e2a8f10fe623e1f22b74fb8249_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tab_menu"));

        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active", "template" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), "getTemplate", array(0 => "tab_menu_template"), "method")), "twig");
        
        $__internal_4f672f94a982032fa06b70c88a59754d867a82e2a8f10fe623e1f22b74fb8249->leave($__internal_4f672f94a982032fa06b70c88a59754d867a82e2a8f10fe623e1f22b74fb8249_prof);

    }

    // line 35
    public function block_form($context, array $blocks = array())
    {
        $__internal_820b7f08a0e518a61c3bdf58f57ee4d71c5b6626732982c13fb6afeb92b5ed07 = $this->env->getExtension("native_profiler");
        $__internal_820b7f08a0e518a61c3bdf58f57ee4d71c5b6626732982c13fb6afeb92b5ed07->enter($__internal_820b7f08a0e518a61c3bdf58f57ee4d71c5b6626732982c13fb6afeb92b5ed07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form"));

        // line 36
        echo "    ";
        $this->displayBlock("parentForm", $context, $blocks);
        echo "
";
        
        $__internal_820b7f08a0e518a61c3bdf58f57ee4d71c5b6626732982c13fb6afeb92b5ed07->leave($__internal_820b7f08a0e518a61c3bdf58f57ee4d71c5b6626732982c13fb6afeb92b5ed07_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 36,  126 => 35,  114 => 30,  106 => 27,  100 => 26,  90 => 23,  84 => 22,  73 => 18,  67 => 16,  64 => 15,  58 => 14,  51 => 12,  49 => 33,  40 => 12,  12 => 32,);
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
/* {% block title %}*/
/*     {% if admin.id(object) is not null %}*/
/*         {{ "title_edit"|trans({'%name%': admin.toString(object)|truncate(15) }, 'SonataAdminBundle') }}*/
/*     {% else %}*/
/*         {{ "title_create"|trans({}, 'SonataAdminBundle') }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block navbar_title %}*/
/*     {{ block('title') }}*/
/* {% endblock %}*/
/* */
/* {% block actions %}*/
/*     {% include 'SonataAdminBundle:CRUD:action_buttons.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block tab_menu %}{{ knp_menu_render(admin.sidemenu(action), {'currentClass' : 'active', 'template': sonata_admin.adminPool.getTemplate('tab_menu_template')}, 'twig') }}{% endblock %}*/
/* */
/* {% use 'SonataAdminBundle:CRUD:base_edit_form.html.twig' with form as parentForm %}*/
/* {% import "SonataAdminBundle:CRUD:base_edit_form_macro.html.twig" as form_helper %}*/
/* */
/* {% block form %}*/
/*     {{ block('parentForm') }}*/
/* {% endblock %}*/
/* */
