<?php

/* SonataAdminBundle:CRUD:base_show.html.twig */
class __TwigTemplate_2871afcbc7974578ae216842b715296150c1ce3573f280f8e89e279cd8791e00 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'tab_menu' => array($this, 'block_tab_menu'),
            'show' => array($this, 'block_show'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:base_show.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7650d9f4e2cdc916b64c7c37ba858c5a7a73fcdd289311ee479d12caeb2216e9 = $this->env->getExtension("native_profiler");
        $__internal_7650d9f4e2cdc916b64c7c37ba858c5a7a73fcdd289311ee479d12caeb2216e9->enter($__internal_7650d9f4e2cdc916b64c7c37ba858c5a7a73fcdd289311ee479d12caeb2216e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_show.html.twig"));

        // line 14
        $context["show_helper"] = $this->loadTemplate("SonataAdminBundle:CRUD:base_show_macro.html.twig", "SonataAdminBundle:CRUD:base_show.html.twig", 14);
        // line 12
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7650d9f4e2cdc916b64c7c37ba858c5a7a73fcdd289311ee479d12caeb2216e9->leave($__internal_7650d9f4e2cdc916b64c7c37ba858c5a7a73fcdd289311ee479d12caeb2216e9_prof);

    }

    // line 16
    public function block_actions($context, array $blocks = array())
    {
        $__internal_865dab1f1a0c623fc1c05bf3ce5ad7b40006dc053cf2124fb21ac922fd1989ea = $this->env->getExtension("native_profiler");
        $__internal_865dab1f1a0c623fc1c05bf3ce5ad7b40006dc053cf2124fb21ac922fd1989ea->enter($__internal_865dab1f1a0c623fc1c05bf3ce5ad7b40006dc053cf2124fb21ac922fd1989ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        // line 17
        echo "    ";
        $this->loadTemplate("SonataAdminBundle:CRUD:action_buttons.html.twig", "SonataAdminBundle:CRUD:base_show.html.twig", 17)->display($context);
        
        $__internal_865dab1f1a0c623fc1c05bf3ce5ad7b40006dc053cf2124fb21ac922fd1989ea->leave($__internal_865dab1f1a0c623fc1c05bf3ce5ad7b40006dc053cf2124fb21ac922fd1989ea_prof);

    }

    // line 20
    public function block_tab_menu($context, array $blocks = array())
    {
        $__internal_ef08d74164643d4ec118f67706f39666f310aab9d958c5a4fc0501f6bd1af27b = $this->env->getExtension("native_profiler");
        $__internal_ef08d74164643d4ec118f67706f39666f310aab9d958c5a4fc0501f6bd1af27b->enter($__internal_ef08d74164643d4ec118f67706f39666f310aab9d958c5a4fc0501f6bd1af27b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tab_menu"));

        // line 21
        echo "    ";
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active", "template" => $this->getAttribute($this->getAttribute(        // line 23
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), "getTemplate", array(0 => "tab_menu_template"), "method")), "twig");
        // line 24
        echo "
";
        
        $__internal_ef08d74164643d4ec118f67706f39666f310aab9d958c5a4fc0501f6bd1af27b->leave($__internal_ef08d74164643d4ec118f67706f39666f310aab9d958c5a4fc0501f6bd1af27b_prof);

    }

    // line 27
    public function block_show($context, array $blocks = array())
    {
        $__internal_5bfc436f816aa262148ed3e13196e7c749408b5a3bec51d89ce8293f725879a9 = $this->env->getExtension("native_profiler");
        $__internal_5bfc436f816aa262148ed3e13196e7c749408b5a3bec51d89ce8293f725879a9->enter($__internal_5bfc436f816aa262148ed3e13196e7c749408b5a3bec51d89ce8293f725879a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "show"));

        // line 28
        echo "    ";
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.show.top", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "object" => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))));
        echo "

    ";
        // line 30
        $context["has_tab"] = (((twig_length_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array())) == 1) && ($this->getAttribute(twig_get_array_keys_filter($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array())), 0, array(), "array") != "default")) || (twig_length_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array())) > 1));
        // line 31
        echo "
    ";
        // line 32
        if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
            // line 33
            echo "        <div class=\"nav-tabs-custom\">
            <ul class=\"nav nav-tabs\" role=\"tablist\">
                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["name"] => $context["show_tab"]) {
                // line 36
                echo "                    <li";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo " class=\"active\"";
                }
                echo ">
                        <a href=\"#tab_";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" data-toggle=\"tab\">
                            <i class=\"fa fa-exclamation-circle has-errors hide\"></i>
                            ";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["show_tab"], "translation_domain", array())), "method"), "html", null, true);
                echo "
                        </a>
                    </li>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['show_tab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </ul>

            <div class=\"tab-content\">
                ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["code"] => $context["show_tab"]) {
                // line 47
                echo "                    <div
                            class=\"tab-pane fade";
                // line 48
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo " in active";
                }
                echo "\"
                            id=\"tab_";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\"
                    >
                        <div class=\"box-body  container-fluid\">
                            <div class=\"sonata-ba-collapsed-fields\">
                                ";
                // line 53
                if (($this->getAttribute($context["show_tab"], "description", array()) != false)) {
                    // line 54
                    echo "                                    <p>";
                    echo $this->getAttribute($context["show_tab"], "description", array());
                    echo "</p>
                                ";
                }
                // line 56
                echo "
                                ";
                // line 57
                echo $context["show_helper"]->getrender_groups((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), (isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), $this->getAttribute($context["show_tab"], "groups", array()), (isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab")));
                echo "
                            </div>
                        </div>
                    </div>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['code'], $context['show_tab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "            </div>
        </div>
    ";
        } else {
            // line 65
            echo "        ";
            echo $context["show_helper"]->getrender_groups((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), (isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showtabs", array()), "default", array()), "groups", array()), (isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab")));
            echo "
    ";
        }
        // line 67
        echo "
    ";
        // line 68
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.show.bottom", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "object" => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))));
        echo "
";
        
        $__internal_5bfc436f816aa262148ed3e13196e7c749408b5a3bec51d89ce8293f725879a9->leave($__internal_5bfc436f816aa262148ed3e13196e7c749408b5a3bec51d89ce8293f725879a9_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 68,  223 => 67,  217 => 65,  212 => 62,  193 => 57,  190 => 56,  184 => 54,  182 => 53,  173 => 49,  167 => 48,  164 => 47,  147 => 46,  142 => 43,  124 => 39,  117 => 37,  110 => 36,  93 => 35,  89 => 33,  87 => 32,  84 => 31,  82 => 30,  76 => 28,  70 => 27,  62 => 24,  60 => 23,  58 => 21,  52 => 20,  44 => 17,  38 => 16,  31 => 12,  29 => 14,  20 => 12,);
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
/* {% import 'SonataAdminBundle:CRUD:base_show_macro.html.twig' as show_helper %}*/
/* */
/* {% block actions %}*/
/*     {% include 'SonataAdminBundle:CRUD:action_buttons.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block tab_menu %}*/
/*     {{ knp_menu_render(admin.sidemenu(action), {*/
/*         'currentClass' : 'active',*/
/*         'template': sonata_admin.adminPool.getTemplate('tab_menu_template')*/
/*     }, 'twig') }}*/
/* {% endblock %}*/
/* */
/* {% block show %}*/
/*     {{ sonata_block_render_event('sonata.admin.show.top', { 'admin': admin, 'object': object }) }}*/
/* */
/*     {% set has_tab = (admin.showtabs|length == 1 and admin.showtabs|keys[0] != 'default') or admin.showtabs|length > 1 %}*/
/* */
/*     {% if has_tab %}*/
/*         <div class="nav-tabs-custom">*/
/*             <ul class="nav nav-tabs" role="tablist">*/
/*                 {% for name, show_tab in admin.showtabs %}*/
/*                     <li{% if loop.first %} class="active"{% endif %}>*/
/*                         <a href="#tab_{{ admin.uniqid }}_{{ loop.index }}" data-toggle="tab">*/
/*                             <i class="fa fa-exclamation-circle has-errors hide"></i>*/
/*                             {{ admin.trans(name, {}, show_tab.translation_domain) }}*/
/*                         </a>*/
/*                     </li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/* */
/*             <div class="tab-content">*/
/*                 {% for code, show_tab in admin.showtabs %}*/
/*                     <div*/
/*                             class="tab-pane fade{% if loop.first %} in active{% endif %}"*/
/*                             id="tab_{{ admin.uniqid }}_{{ loop.index }}"*/
/*                     >*/
/*                         <div class="box-body  container-fluid">*/
/*                             <div class="sonata-ba-collapsed-fields">*/
/*                                 {% if show_tab.description != false %}*/
/*                                     <p>{{ show_tab.description|raw }}</p>*/
/*                                 {% endif %}*/
/* */
/*                                 {{ show_helper.render_groups(admin, object, elements, show_tab.groups, has_tab) }}*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 {% endfor %}*/
/*             </div>*/
/*         </div>*/
/*     {% else %}*/
/*         {{ show_helper.render_groups(admin, object, elements, admin.showtabs.default.groups, has_tab) }}*/
/*     {% endif %}*/
/* */
/*     {{ sonata_block_render_event('sonata.admin.show.bottom', { 'admin': admin, 'object': object }) }}*/
/* {% endblock %}*/
/* */
