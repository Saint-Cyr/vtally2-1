<?php

/* SonataCoreBundle:FlashMessage:render.html.twig */
class __TwigTemplate_b0c7fd63e2e076fe683444cfe1f5a97d5c456dd89cf966fd33f772a0bb9d0d88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_42c6ac1d9686bf070f6988a5b1823f1e4be45b0f6a156b161188f1a7d7d0542b = $this->env->getExtension("native_profiler");
        $__internal_42c6ac1d9686bf070f6988a5b1823f1e4be45b0f6a156b161188f1a7d7d0542b->enter($__internal_42c6ac1d9686bf070f6988a5b1823f1e4be45b0f6a156b161188f1a7d7d0542b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataCoreBundle:FlashMessage:render.html.twig"));

        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('sonata_core_flashmessage')->getFlashMessagesTypes());
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 12
            echo "    ";
            $context["domain"] = ((array_key_exists("domain", $context)) ? ((isset($context["domain"]) ? $context["domain"] : $this->getContext($context, "domain"))) : (null));
            // line 13
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->env->getExtension('sonata_core_flashmessage')->getFlashMessages($context["type"], (isset($context["domain"]) ? $context["domain"] : $this->getContext($context, "domain"))));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 14
                echo "        <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_core_status')->statusClass($context["type"]), "html", null, true);
                echo " alert-dismissable\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
            ";
                // line 16
                echo $context["message"];
                echo "
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_42c6ac1d9686bf070f6988a5b1823f1e4be45b0f6a156b161188f1a7d7d0542b->leave($__internal_42c6ac1d9686bf070f6988a5b1823f1e4be45b0f6a156b161188f1a7d7d0542b_prof);

    }

    public function getTemplateName()
    {
        return "SonataCoreBundle:FlashMessage:render.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 16,  34 => 14,  29 => 13,  26 => 12,  22 => 11,);
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
/* {% for type in sonata_flashmessages_types() %}*/
/*     {% set domain = domain is defined ? domain : null %}*/
/*     {% for message in sonata_flashmessages_get(type, domain) %}*/
/*         <div class="alert alert-{{ type|sonata_status_class }} alert-dismissable">*/
/*             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>*/
/*             {{ message|raw }}*/
/*         </div>*/
/*     {% endfor %}*/
/* {% endfor %}*/
/* */
