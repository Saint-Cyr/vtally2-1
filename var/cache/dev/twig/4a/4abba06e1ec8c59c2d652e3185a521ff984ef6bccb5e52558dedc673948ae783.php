<?php

/* SonataAdminBundle:CRUD:edit_array.html.twig */
class __TwigTemplate_22dc736e5034f854b39af9967f7ded5671ea74e156fcb3494cdcf96f494964e0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:edit_array.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f0befe6e590156575ba0a85d976abc865aca14bc3ad94d79c8e6f48fea942e91 = $this->env->getExtension("native_profiler");
        $__internal_f0befe6e590156575ba0a85d976abc865aca14bc3ad94d79c8e6f48fea942e91->enter($__internal_f0befe6e590156575ba0a85d976abc865aca14bc3ad94d79c8e6f48fea942e91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_array.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f0befe6e590156575ba0a85d976abc865aca14bc3ad94d79c8e6f48fea942e91->leave($__internal_f0befe6e590156575ba0a85d976abc865aca14bc3ad94d79c8e6f48fea942e91_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_153dbbecd5766ff7a506d0217784ce253cef7c77ef9e7d4b7337084833d80a1a = $this->env->getExtension("native_profiler");
        $__internal_153dbbecd5766ff7a506d0217784ce253cef7c77ef9e7d4b7337084833d80a1a->enter($__internal_153dbbecd5766ff7a506d0217784ce253cef7c77ef9e7d4b7337084833d80a1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    <span class=\"edit\">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget', array("attr" => array("class" => "title")));
        echo "
    </span>
";
        
        $__internal_153dbbecd5766ff7a506d0217784ce253cef7c77ef9e7d4b7337084833d80a1a->leave($__internal_153dbbecd5766ff7a506d0217784ce253cef7c77ef9e7d4b7337084833d80a1a_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_array.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 16,  39 => 15,  33 => 14,  18 => 12,);
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
/* {% block field %}*/
/*     <span class="edit">*/
/*         {{ form_widget(field_element, {'attr': {'class' : 'title'}}) }}*/
/*     </span>*/
/* {% endblock %}*/
/* */
