<?php

/* SonataAdminBundle:CRUD:base_acl.html.twig */
class __TwigTemplate_39fd17462242156dbd2cd0818e3b6cf928ce4108b8dfe52ada8d71a1a09db22e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'form' => array($this, 'block_form'),
            'form_acl_roles' => array($this, 'block_form_acl_roles'),
            'form_acl_users' => array($this, 'block_form_acl_users'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:base_acl.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e3c8df9393ecae3d4841f9a0282cc09afba5e02a1193191ab880a3efef908de4 = $this->env->getExtension("native_profiler");
        $__internal_e3c8df9393ecae3d4841f9a0282cc09afba5e02a1193191ab880a3efef908de4->enter($__internal_e3c8df9393ecae3d4841f9a0282cc09afba5e02a1193191ab880a3efef908de4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_acl.html.twig"));

        // line 18
        $context["acl"] = $this->loadTemplate("SonataAdminBundle:CRUD:base_acl_macro.html.twig", "SonataAdminBundle:CRUD:base_acl.html.twig", 18);
        // line 12
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e3c8df9393ecae3d4841f9a0282cc09afba5e02a1193191ab880a3efef908de4->leave($__internal_e3c8df9393ecae3d4841f9a0282cc09afba5e02a1193191ab880a3efef908de4_prof);

    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        $__internal_555890895a7d3d190c5723b679e2866738549e24c8bd772fe40cea5502018917 = $this->env->getExtension("native_profiler");
        $__internal_555890895a7d3d190c5723b679e2866738549e24c8bd772fe40cea5502018917->enter($__internal_555890895a7d3d190c5723b679e2866738549e24c8bd772fe40cea5502018917_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        // line 15
        echo "    ";
        $this->loadTemplate("SonataAdminBundle:CRUD:action_buttons.html.twig", "SonataAdminBundle:CRUD:base_acl.html.twig", 15)->display($context);
        
        $__internal_555890895a7d3d190c5723b679e2866738549e24c8bd772fe40cea5502018917->leave($__internal_555890895a7d3d190c5723b679e2866738549e24c8bd772fe40cea5502018917_prof);

    }

    // line 20
    public function block_form($context, array $blocks = array())
    {
        $__internal_900e191849510ed3a47dc05ab767a4a309e1dd2956b47300a240e1ff5f30b67f = $this->env->getExtension("native_profiler");
        $__internal_900e191849510ed3a47dc05ab767a4a309e1dd2956b47300a240e1ff5f30b67f->enter($__internal_900e191849510ed3a47dc05ab767a4a309e1dd2956b47300a240e1ff5f30b67f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form"));

        // line 21
        echo "    ";
        $this->displayBlock('form_acl_roles', $context, $blocks);
        // line 24
        echo "    ";
        $this->displayBlock('form_acl_users', $context, $blocks);
        
        $__internal_900e191849510ed3a47dc05ab767a4a309e1dd2956b47300a240e1ff5f30b67f->leave($__internal_900e191849510ed3a47dc05ab767a4a309e1dd2956b47300a240e1ff5f30b67f_prof);

    }

    // line 21
    public function block_form_acl_roles($context, array $blocks = array())
    {
        $__internal_7344dbd8b41cae3fbdeb23d3e6a47e05d16ed3e265279812ace2b7d98d0fa2e3 = $this->env->getExtension("native_profiler");
        $__internal_7344dbd8b41cae3fbdeb23d3e6a47e05d16ed3e265279812ace2b7d98d0fa2e3->enter($__internal_7344dbd8b41cae3fbdeb23d3e6a47e05d16ed3e265279812ace2b7d98d0fa2e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_acl_roles"));

        // line 22
        echo "        ";
        echo $context["acl"]->getrender_form((isset($context["aclRolesForm"]) ? $context["aclRolesForm"] : $this->getContext($context, "aclRolesForm")), (isset($context["permissions"]) ? $context["permissions"] : $this->getContext($context, "permissions")), "td_role", (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")));
        echo "
    ";
        
        $__internal_7344dbd8b41cae3fbdeb23d3e6a47e05d16ed3e265279812ace2b7d98d0fa2e3->leave($__internal_7344dbd8b41cae3fbdeb23d3e6a47e05d16ed3e265279812ace2b7d98d0fa2e3_prof);

    }

    // line 24
    public function block_form_acl_users($context, array $blocks = array())
    {
        $__internal_fe7f353532b048cdd41659d425c9f1ce4463c0c2a18121646aeeeb1347650436 = $this->env->getExtension("native_profiler");
        $__internal_fe7f353532b048cdd41659d425c9f1ce4463c0c2a18121646aeeeb1347650436->enter($__internal_fe7f353532b048cdd41659d425c9f1ce4463c0c2a18121646aeeeb1347650436_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_acl_users"));

        // line 25
        echo "        ";
        echo $context["acl"]->getrender_form((isset($context["aclUsersForm"]) ? $context["aclUsersForm"] : $this->getContext($context, "aclUsersForm")), (isset($context["permissions"]) ? $context["permissions"] : $this->getContext($context, "permissions")), "td_username", (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")));
        echo "
    ";
        
        $__internal_fe7f353532b048cdd41659d425c9f1ce4463c0c2a18121646aeeeb1347650436->leave($__internal_fe7f353532b048cdd41659d425c9f1ce4463c0c2a18121646aeeeb1347650436_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_acl.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 25,  86 => 24,  76 => 22,  70 => 21,  62 => 24,  59 => 21,  53 => 20,  45 => 15,  39 => 14,  32 => 12,  30 => 18,  21 => 12,);
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
/* {% import 'SonataAdminBundle:CRUD:base_acl_macro.html.twig' as acl %}*/
/* */
/* {% block form %}*/
/*     {% block form_acl_roles %}*/
/*         {{ acl.render_form(aclRolesForm, permissions, 'td_role', admin, sonata_admin.adminPool, object) }}*/
/*     {% endblock %}*/
/*     {% block form_acl_users %}*/
/*         {{ acl.render_form(aclUsersForm, permissions, 'td_username', admin, sonata_admin.adminPool, object) }}*/
/*     {% endblock %}*/
/* {% endblock %}*/
/* */
