<?php

/* SonataAdminBundle:CRUD:edit_boolean.html.twig */
class __TwigTemplate_7eed69ea82a8dbc7f81121cb245d130d57bca2c362fb22ca9fd33df1dc35170a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field' => array($this, 'block_field'),
            'label' => array($this, 'block_label'),
            'errors' => array($this, 'block_errors'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d52dc3e75743a709b67772b66bc48520c8f7af16fb8c581c8fa49495d916597f = $this->env->getExtension("native_profiler");
        $__internal_d52dc3e75743a709b67772b66bc48520c8f7af16fb8c581c8fa49495d916597f->enter($__internal_d52dc3e75743a709b67772b66bc48520c8f7af16fb8c581c8fa49495d916597f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_boolean.html.twig"));

        // line 11
        echo "
<div>
    <div class=\"sonata-ba-field ";
        // line 13
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), "vars", array()), "errors", array())) > 0)) {
            echo "sonata-ba-field-error";
        }
        echo "\">
        ";
        // line 14
        $this->displayBlock('field', $context, $blocks);
        // line 15
        echo "        ";
        $this->displayBlock('label', $context, $blocks);
        // line 23
        echo "
        <div class=\"sonata-ba-field-error-messages\">
            ";
        // line 25
        $this->displayBlock('errors', $context, $blocks);
        // line 26
        echo "        </div>

    </div>
</div>
";
        
        $__internal_d52dc3e75743a709b67772b66bc48520c8f7af16fb8c581c8fa49495d916597f->leave($__internal_d52dc3e75743a709b67772b66bc48520c8f7af16fb8c581c8fa49495d916597f_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_a97a60ab085e9fb1ad9fef8d8df28da572a7fc2d37f24963dbc7f8721cfb2aa9 = $this->env->getExtension("native_profiler");
        $__internal_a97a60ab085e9fb1ad9fef8d8df28da572a7fc2d37f24963dbc7f8721cfb2aa9->enter($__internal_a97a60ab085e9fb1ad9fef8d8df28da572a7fc2d37f24963dbc7f8721cfb2aa9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget');
        
        $__internal_a97a60ab085e9fb1ad9fef8d8df28da572a7fc2d37f24963dbc7f8721cfb2aa9->leave($__internal_a97a60ab085e9fb1ad9fef8d8df28da572a7fc2d37f24963dbc7f8721cfb2aa9_prof);

    }

    // line 15
    public function block_label($context, array $blocks = array())
    {
        $__internal_aa3b443b6643ee3a72606f5249b95e26dada99f7f5e9079c6af430454cbfd1a0 = $this->env->getExtension("native_profiler");
        $__internal_aa3b443b6643ee3a72606f5249b95e26dada99f7f5e9079c6af430454cbfd1a0->enter($__internal_aa3b443b6643ee3a72606f5249b95e26dada99f7f5e9079c6af430454cbfd1a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 16
        echo "            ";
        if ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "name", array(), "any", true, true)) {
            // line 17
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'label', (twig_test_empty($_label_ = $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "name", array())) ? array() : array("label" => $_label_)));
            echo "
            ";
        } else {
            // line 19
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'label');
            echo "
            ";
        }
        // line 21
        echo "            <br>
        ";
        
        $__internal_aa3b443b6643ee3a72606f5249b95e26dada99f7f5e9079c6af430454cbfd1a0->leave($__internal_aa3b443b6643ee3a72606f5249b95e26dada99f7f5e9079c6af430454cbfd1a0_prof);

    }

    // line 25
    public function block_errors($context, array $blocks = array())
    {
        $__internal_6655047d0b01848793d783c0e64527644a687307c8f68e61c4d423883e03e0a5 = $this->env->getExtension("native_profiler");
        $__internal_6655047d0b01848793d783c0e64527644a687307c8f68e61c4d423883e03e0a5->enter($__internal_6655047d0b01848793d783c0e64527644a687307c8f68e61c4d423883e03e0a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "errors"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'errors');
        
        $__internal_6655047d0b01848793d783c0e64527644a687307c8f68e61c4d423883e03e0a5->leave($__internal_6655047d0b01848793d783c0e64527644a687307c8f68e61c4d423883e03e0a5_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 25,  90 => 21,  84 => 19,  78 => 17,  75 => 16,  69 => 15,  57 => 14,  46 => 26,  44 => 25,  40 => 23,  37 => 15,  35 => 14,  29 => 13,  25 => 11,);
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
/* <div>*/
/*     <div class="sonata-ba-field {% if field_element.vars.errors|length > 0 %}sonata-ba-field-error{% endif %}">*/
/*         {% block field %}{{ form_widget(field_element) }}{% endblock %}*/
/*         {% block label %}*/
/*             {% if field_description.options.name is defined %}*/
/*                 {{ form_label(field_element, field_description.options.name) }}*/
/*             {% else %}*/
/*                 {{ form_label(field_element) }}*/
/*             {% endif %}*/
/*             <br>*/
/*         {% endblock %}*/
/* */
/*         <div class="sonata-ba-field-error-messages">*/
/*             {% block errors %}{{ form_errors(field_element) }}{% endblock %}*/
/*         </div>*/
/* */
/*     </div>*/
/* </div>*/
/* */
