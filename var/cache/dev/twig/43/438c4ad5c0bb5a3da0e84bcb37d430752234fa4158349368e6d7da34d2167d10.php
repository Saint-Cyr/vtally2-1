<?php

/* SonataAdminBundle:CRUD:base_show_field.html.twig */
class __TwigTemplate_2a334a1cafb04d25efb3155f040937e2e07efdd3ce670328f5aedd8a74108d1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'name' => array($this, 'block_name'),
            'field' => array($this, 'block_field'),
            'field_compare' => array($this, 'block_field_compare'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_297b02c3c9e690828d30bae89314954a6b5b922fe8525b3a40baace13c0bbd29 = $this->env->getExtension("native_profiler");
        $__internal_297b02c3c9e690828d30bae89314954a6b5b922fe8525b3a40baace13c0bbd29->enter($__internal_297b02c3c9e690828d30bae89314954a6b5b922fe8525b3a40baace13c0bbd29_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_show_field.html.twig"));

        // line 11
        echo "
<th";
        // line 12
        if (((array_key_exists("is_diff", $context)) ? (_twig_default_filter((isset($context["is_diff"]) ? $context["is_diff"] : $this->getContext($context, "is_diff")), false)) : (false))) {
            echo " class=\"diff\"";
        }
        echo ">";
        $this->displayBlock('name', $context, $blocks);
        echo "</th>
<td>";
        // line 13
        $this->displayBlock('field', $context, $blocks);
        echo "</td>

";
        // line 15
        $this->displayBlock('field_compare', $context, $blocks);
        
        $__internal_297b02c3c9e690828d30bae89314954a6b5b922fe8525b3a40baace13c0bbd29->leave($__internal_297b02c3c9e690828d30bae89314954a6b5b922fe8525b3a40baace13c0bbd29_prof);

    }

    // line 12
    public function block_name($context, array $blocks = array())
    {
        $__internal_07c7175c2a76b04802745015ee309c14d98a48ad94d86eb5c14d6e21c9af5baf = $this->env->getExtension("native_profiler");
        $__internal_07c7175c2a76b04802745015ee309c14d98a48ad94d86eb5c14d6e21c9af5baf->enter($__internal_07c7175c2a76b04802745015ee309c14d98a48ad94d86eb5c14d6e21c9af5baf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "name"));

        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "label", array()), 1 => array(), 2 => $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "translationDomain", array())), "method"), "html", null, true);
        
        $__internal_07c7175c2a76b04802745015ee309c14d98a48ad94d86eb5c14d6e21c9af5baf->leave($__internal_07c7175c2a76b04802745015ee309c14d98a48ad94d86eb5c14d6e21c9af5baf_prof);

    }

    // line 13
    public function block_field($context, array $blocks = array())
    {
        $__internal_4770113b2592fc8bed0bb5ec171e205f9c8399c4a5e3d4de52ece8341854397c = $this->env->getExtension("native_profiler");
        $__internal_4770113b2592fc8bed0bb5ec171e205f9c8399c4a5e3d4de52ece8341854397c->enter($__internal_4770113b2592fc8bed0bb5ec171e205f9c8399c4a5e3d4de52ece8341854397c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        if ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "safe", array())) {
            echo (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"));
        } else {
            echo nl2br(twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true));
        }
        
        $__internal_4770113b2592fc8bed0bb5ec171e205f9c8399c4a5e3d4de52ece8341854397c->leave($__internal_4770113b2592fc8bed0bb5ec171e205f9c8399c4a5e3d4de52ece8341854397c_prof);

    }

    // line 15
    public function block_field_compare($context, array $blocks = array())
    {
        $__internal_eb81bba75c8740e6a981a613f1b262080019c6fa33f0152ef2bb268d1e276f59 = $this->env->getExtension("native_profiler");
        $__internal_eb81bba75c8740e6a981a613f1b262080019c6fa33f0152ef2bb268d1e276f59->enter($__internal_eb81bba75c8740e6a981a613f1b262080019c6fa33f0152ef2bb268d1e276f59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field_compare"));

        // line 16
        echo "    ";
        if (array_key_exists("value_compare", $context)) {
            // line 17
            echo "        <td>
            ";
            // line 18
            $context["value"] = (isset($context["value_compare"]) ? $context["value_compare"] : $this->getContext($context, "value_compare"));
            // line 19
            echo "            ";
            $this->displayBlock("field", $context, $blocks);
            echo "
        </td>
    ";
        }
        
        $__internal_eb81bba75c8740e6a981a613f1b262080019c6fa33f0152ef2bb268d1e276f59->leave($__internal_eb81bba75c8740e6a981a613f1b262080019c6fa33f0152ef2bb268d1e276f59_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 19,  88 => 18,  85 => 17,  82 => 16,  76 => 15,  60 => 13,  48 => 12,  41 => 15,  36 => 13,  28 => 12,  25 => 11,);
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
/* <th{% if(is_diff|default(false)) %} class="diff"{% endif %}>{% block name %}{{ admin.trans(field_description.label, {}, field_description.translationDomain) }}{% endblock %}</th>*/
/* <td>{% block field %}{% if field_description.options.safe %}{{ value|raw }}{% else %}{{ value|nl2br }}{% endif %}{% endblock %}</td>*/
/* */
/* {% block field_compare %}*/
/*     {% if(value_compare is defined) %}*/
/*         <td>*/
/*             {% set value = value_compare %}*/
/*             {{ block('field') }}*/
/*         </td>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
