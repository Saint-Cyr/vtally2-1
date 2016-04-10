<?php

/* SonataAdminBundle:CRUD:show_percent.html.twig */
class __TwigTemplate_ce4b728a4f65d7e57bda11f995f5e72d4879ac0484efa821b8f4855778b6c16c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig", "SonataAdminBundle:CRUD:show_percent.html.twig", 12);
        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bd3e73a1d906ef66d9d072f1399ee025f96a207bc77129c0800ca5467bfaabb9 = $this->env->getExtension("native_profiler");
        $__internal_bd3e73a1d906ef66d9d072f1399ee025f96a207bc77129c0800ca5467bfaabb9->enter($__internal_bd3e73a1d906ef66d9d072f1399ee025f96a207bc77129c0800ca5467bfaabb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:show_percent.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bd3e73a1d906ef66d9d072f1399ee025f96a207bc77129c0800ca5467bfaabb9->leave($__internal_bd3e73a1d906ef66d9d072f1399ee025f96a207bc77129c0800ca5467bfaabb9_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_c2dc0ab77f8049a4452b25d96a75bda8272aa0e69dbaa07092a88e0c8dced4ab = $this->env->getExtension("native_profiler");
        $__internal_c2dc0ab77f8049a4452b25d96a75bda8272aa0e69dbaa07092a88e0c8dced4ab->enter($__internal_c2dc0ab77f8049a4452b25d96a75bda8272aa0e69dbaa07092a88e0c8dced4ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    ";
        $context["value"] = ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) * 100);
        // line 16
        echo "    ";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo " %
";
        
        $__internal_c2dc0ab77f8049a4452b25d96a75bda8272aa0e69dbaa07092a88e0c8dced4ab->leave($__internal_c2dc0ab77f8049a4452b25d96a75bda8272aa0e69dbaa07092a88e0c8dced4ab_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show_percent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 16,  40 => 15,  34 => 14,  11 => 12,);
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
/* {% extends 'SonataAdminBundle:CRUD:base_show_field.html.twig' %}*/
/* */
/* {% block field %}*/
/*     {% set value = value * 100 %}*/
/*     {{ value }} %*/
/* {% endblock %}*/
/* */
