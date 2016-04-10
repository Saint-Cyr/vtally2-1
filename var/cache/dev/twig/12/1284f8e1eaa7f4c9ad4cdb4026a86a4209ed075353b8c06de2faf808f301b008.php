<?php

/* SonataAdminBundle:CRUD:base_inline_edit_field.html.twig */
class __TwigTemplate_819c7f11de508623a9d80fba6ca87a92c5233ae53f42d1943fc282225ca6a893 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'label' => array($this, 'block_label'),
            'field' => array($this, 'block_field'),
            'errors' => array($this, 'block_errors'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_dfe519e971b97753c5f02c2c741ce75da7e8e48fbb35ac4cb6b5a79abedd2a45 = $this->env->getExtension("native_profiler");
        $__internal_dfe519e971b97753c5f02c2c741ce75da7e8e48fbb35ac4cb6b5a79abedd2a45->enter($__internal_dfe519e971b97753c5f02c2c741ce75da7e8e48fbb35ac4cb6b5a79abedd2a45_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_inline_edit_field.html.twig"));

        // line 11
        echo "
<div id=\"sonata-ba-field-container-";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"sonata-ba-field sonata-ba-field-";
        echo twig_escape_filter($this->env, (isset($context["edit"]) ? $context["edit"] : $this->getContext($context, "edit")), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")), "html", null, true);
        echo " ";
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), "vars", array()), "errors", array()))) {
            echo "sonata-ba-field-error";
        }
        echo "\">

    ";
        // line 14
        $this->displayBlock('label', $context, $blocks);
        // line 24
        echo "
    ";
        // line 25
        $this->displayBlock('field', $context, $blocks);
        // line 26
        echo "
    <div class=\"sonata-ba-field-error-messages\">
        ";
        // line 28
        $this->displayBlock('errors', $context, $blocks);
        // line 29
        echo "    </div>
</div>
";
        
        $__internal_dfe519e971b97753c5f02c2c741ce75da7e8e48fbb35ac4cb6b5a79abedd2a45->leave($__internal_dfe519e971b97753c5f02c2c741ce75da7e8e48fbb35ac4cb6b5a79abedd2a45_prof);

    }

    // line 14
    public function block_label($context, array $blocks = array())
    {
        $__internal_5fd9a223724bdedec08e7ab8318a1c58c619f559fb6afba9e12be520b40283bc = $this->env->getExtension("native_profiler");
        $__internal_5fd9a223724bdedec08e7ab8318a1c58c619f559fb6afba9e12be520b40283bc->enter($__internal_5fd9a223724bdedec08e7ab8318a1c58c619f559fb6afba9e12be520b40283bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 15
        echo "        ";
        if (((isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")) == "natural")) {
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
        }
        // line 23
        echo "    ";
        
        $__internal_5fd9a223724bdedec08e7ab8318a1c58c619f559fb6afba9e12be520b40283bc->leave($__internal_5fd9a223724bdedec08e7ab8318a1c58c619f559fb6afba9e12be520b40283bc_prof);

    }

    // line 25
    public function block_field($context, array $blocks = array())
    {
        $__internal_8e1b12e8d86363312ce611fd09104fb862aae778ee7487cdbd94e78e5f4bfa3e = $this->env->getExtension("native_profiler");
        $__internal_8e1b12e8d86363312ce611fd09104fb862aae778ee7487cdbd94e78e5f4bfa3e->enter($__internal_8e1b12e8d86363312ce611fd09104fb862aae778ee7487cdbd94e78e5f4bfa3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget');
        
        $__internal_8e1b12e8d86363312ce611fd09104fb862aae778ee7487cdbd94e78e5f4bfa3e->leave($__internal_8e1b12e8d86363312ce611fd09104fb862aae778ee7487cdbd94e78e5f4bfa3e_prof);

    }

    // line 28
    public function block_errors($context, array $blocks = array())
    {
        $__internal_a2b9146f8898bbbabfff20c00a5ccce5ea1ca80a7c159b7a59eaf56c58a5ee19 = $this->env->getExtension("native_profiler");
        $__internal_a2b9146f8898bbbabfff20c00a5ccce5ea1ca80a7c159b7a59eaf56c58a5ee19->enter($__internal_a2b9146f8898bbbabfff20c00a5ccce5ea1ca80a7c159b7a59eaf56c58a5ee19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "errors"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'errors');
        
        $__internal_a2b9146f8898bbbabfff20c00a5ccce5ea1ca80a7c159b7a59eaf56c58a5ee19->leave($__internal_a2b9146f8898bbbabfff20c00a5ccce5ea1ca80a7c159b7a59eaf56c58a5ee19_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_inline_edit_field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 28,  98 => 25,  91 => 23,  87 => 21,  81 => 19,  75 => 17,  72 => 16,  69 => 15,  63 => 14,  54 => 29,  52 => 28,  48 => 26,  46 => 25,  43 => 24,  41 => 14,  28 => 12,  25 => 11,);
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
/* <div id="sonata-ba-field-container-{{ field_element.vars.id }}" class="sonata-ba-field sonata-ba-field-{{ edit }}-{{ inline }} {% if field_element.vars.errors|length %}sonata-ba-field-error{% endif %}">*/
/* */
/*     {% block label %}*/
/*         {% if inline == 'natural' %}*/
/*             {% if field_description.options.name is defined %}*/
/*                 {{ form_label(field_element, field_description.options.name) }}*/
/*             {% else %}*/
/*                 {{ form_label(field_element) }}*/
/*             {% endif %}*/
/*             <br>*/
/*         {% endif %}*/
/*     {% endblock %}*/
/* */
/*     {% block field %}{{ form_widget(field_element) }}{% endblock %}*/
/* */
/*     <div class="sonata-ba-field-error-messages">*/
/*         {% block errors %}{{ form_errors(field_element) }}{% endblock %}*/
/*     </div>*/
/* </div>*/
/* */
