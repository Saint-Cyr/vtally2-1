<?php

/* SonataAdminBundle:Menu:sonata_menu.html.twig */
class __TwigTemplate_997c9d17355be74e6f117c40548a6c3c701d9f345d386ff213c4a83d0c936e1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "SonataAdminBundle:Menu:sonata_menu.html.twig", 1);
        $this->blocks = array(
            'root' => array($this, 'block_root'),
            'item' => array($this, 'block_item'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_46af08645245bd6250c618d23742c7bd2f832bfbaf44b67b8ab94e80e373b684 = $this->env->getExtension("native_profiler");
        $__internal_46af08645245bd6250c618d23742c7bd2f832bfbaf44b67b8ab94e80e373b684->enter($__internal_46af08645245bd6250c618d23742c7bd2f832bfbaf44b67b8ab94e80e373b684_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Menu:sonata_menu.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_46af08645245bd6250c618d23742c7bd2f832bfbaf44b67b8ab94e80e373b684->leave($__internal_46af08645245bd6250c618d23742c7bd2f832bfbaf44b67b8ab94e80e373b684_prof);

    }

    // line 3
    public function block_root($context, array $blocks = array())
    {
        $__internal_0805f9df5e6200f9974c26091d2f54c3e7e8e856e07285d996fc3218b90a0b05 = $this->env->getExtension("native_profiler");
        $__internal_0805f9df5e6200f9974c26091d2f54c3e7e8e856e07285d996fc3218b90a0b05->enter($__internal_0805f9df5e6200f9974c26091d2f54c3e7e8e856e07285d996fc3218b90a0b05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        // line 4
        $context["listAttributes"] = twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttributes", array()), array("class" => "sidebar-menu"));
        // line 5
        $context["request"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "request"), "method")) ? ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "request"), "method")) : ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array())));
        // line 6
        echo "    ";
        $this->displayBlock("list", $context, $blocks);
        
        $__internal_0805f9df5e6200f9974c26091d2f54c3e7e8e856e07285d996fc3218b90a0b05->leave($__internal_0805f9df5e6200f9974c26091d2f54c3e7e8e856e07285d996fc3218b90a0b05_prof);

    }

    // line 9
    public function block_item($context, array $blocks = array())
    {
        $__internal_e5c641c41d273ab70a78e180c6c89b1af6d6765c3b54ce813a8720ad7fa37227 = $this->env->getExtension("native_profiler");
        $__internal_e5c641c41d273ab70a78e180c6c89b1af6d6765c3b54ce813a8720ad7fa37227->enter($__internal_e5c641c41d273ab70a78e180c6c89b1af6d6765c3b54ce813a8720ad7fa37227_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        // line 10
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "displayed", array())) {
            // line 12
            $context["display"] = (twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "roles"), "method")) || $this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN"));
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "roles"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                if ( !(isset($context["display"]) ? $context["display"] : $this->getContext($context, "display"))) {
                    // line 14
                    $context["display"] = $this->env->getExtension('security')->isGranted($context["role"]);
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 18
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "displayed", array()) && ((array_key_exists("display", $context)) ? (_twig_default_filter((isset($context["display"]) ? $context["display"] : $this->getContext($context, "display")))) : ("")))) {
            // line 19
            $context["active"] = false;
            // line 20
            if (( !twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "active"), "method")) && $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "active"), "method"))) {
                // line 21
                $context["active"] = true;
            } elseif (((( !twig_test_empty($this->getAttribute(            // line 22
(isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "admin"), "method")) && $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "admin"), "method"), "hasroute", array(0 => "list"), "method")) && $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "admin"), "method"), "isGranted", array(0 => "LIST"), "method")) && ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array(0 => "_sonata_admin"), "method") == $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "admin"), "method"), "code", array())))) {
                // line 23
                $context["active"] = true;
            } elseif (($this->getAttribute(            // line 24
(isset($context["item"]) ? $context["item"] : null), "route", array(), "any", true, true) && ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array(0 => "_route"), "method") == $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "route", array())))) {
                // line 25
                $context["active"] = true;
            } else {
                // line 27
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    if ( !(isset($context["active"]) ? $context["active"] : $this->getContext($context, "active"))) {
                        // line 28
                        if (((( !twig_test_empty($this->getAttribute($context["child"], "extra", array(0 => "admin"), "method")) && $this->getAttribute($this->getAttribute($context["child"], "extra", array(0 => "admin"), "method"), "hasroute", array(0 => "list"), "method")) && $this->getAttribute($this->getAttribute($context["child"], "extra", array(0 => "admin"), "method"), "isGranted", array(0 => "LIST"), "method")) && ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array(0 => "_sonata_admin"), "method") == $this->getAttribute($this->getAttribute($context["child"], "extra", array(0 => "admin"), "method"), "code", array())))) {
                            // line 29
                            $context["active"] = true;
                        } elseif (($this->getAttribute(                        // line 30
$context["child"], "route", array(), "any", true, true) && ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array(0 => "_route"), "method") == $this->getAttribute($context["child"], "route", array())))) {
                            // line 31
                            $context["active"] = true;
                        }
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 36
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "hasChildren", array())) {
                // line 37
                $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "setAttribute", array(0 => "class", 1 => trim(($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method") . " treeview"))), "method");
            }
            // line 39
            if ((isset($context["active"]) ? $context["active"] : $this->getContext($context, "active"))) {
                // line 40
                $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "setAttribute", array(0 => "class", 1 => trim(($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method") . " active"))), "method");
                // line 41
                $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "setChildrenAttribute", array(0 => "class", 1 => trim(($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method") . " active"))), "method");
            }
            // line 44
            $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "setChildrenAttribute", array(0 => "class", 1 => trim(($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method") . " treeview-menu"))), "method");
            // line 45
            echo "        ";
            $this->displayParentBlock("item", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_e5c641c41d273ab70a78e180c6c89b1af6d6765c3b54ce813a8720ad7fa37227->leave($__internal_e5c641c41d273ab70a78e180c6c89b1af6d6765c3b54ce813a8720ad7fa37227_prof);

    }

    // line 49
    public function block_linkElement($context, array $blocks = array())
    {
        $__internal_842b5d0271ff4ade5295278528fdc5f697d94d790100132907b805f373979beb = $this->env->getExtension("native_profiler");
        $__internal_842b5d0271ff4ade5295278528fdc5f697d94d790100132907b805f373979beb->enter($__internal_842b5d0271ff4ade5295278528fdc5f697d94d790100132907b805f373979beb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        // line 50
        echo "    ";
        ob_start();
        // line 51
        echo "        ";
        $context["translation_domain"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "translation_domain", 1 => "messages"), "method");
        // line 52
        echo "        ";
        $context["icon"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method"), ((($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "level", array()) > 1)) ? ("<i class=\"fa fa-angle-double-right\"></i>") : ("")))) : (((($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "level", array()) > 1)) ? ("<i class=\"fa fa-angle-double-right\"></i>") : (""))));
        // line 53
        echo "        ";
        $context["is_link"] = true;
        // line 54
        echo "        ";
        $this->displayParentBlock("linkElement", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_842b5d0271ff4ade5295278528fdc5f697d94d790100132907b805f373979beb->leave($__internal_842b5d0271ff4ade5295278528fdc5f697d94d790100132907b805f373979beb_prof);

    }

    // line 58
    public function block_spanElement($context, array $blocks = array())
    {
        $__internal_7696ed9f23fd33db3e2fef1b8ddd2cf2ba57b353f42f1a475adb4270d94f2f9f = $this->env->getExtension("native_profiler");
        $__internal_7696ed9f23fd33db3e2fef1b8ddd2cf2ba57b353f42f1a475adb4270d94f2f9f->enter($__internal_7696ed9f23fd33db3e2fef1b8ddd2cf2ba57b353f42f1a475adb4270d94f2f9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        // line 59
        echo "    ";
        ob_start();
        // line 60
        echo "        <a href=\"#\">
            ";
        // line 61
        $context["translation_domain"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "label_catalogue"), "method");
        // line 62
        echo "            ";
        $context["icon"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extra", array(0 => "icon"), "method", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extra", array(0 => "icon"), "method"), "")) : (""));
        // line 63
        echo "            ";
        echo (isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon"));
        echo "
            ";
        // line 64
        $this->displayParentBlock("spanElement", $context, $blocks);
        echo "
            <i class=\"fa pull-right fa-angle-left\"></i>
        </a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_7696ed9f23fd33db3e2fef1b8ddd2cf2ba57b353f42f1a475adb4270d94f2f9f->leave($__internal_7696ed9f23fd33db3e2fef1b8ddd2cf2ba57b353f42f1a475adb4270d94f2f9f_prof);

    }

    // line 70
    public function block_label($context, array $blocks = array())
    {
        $__internal_98cd3ff4a9abe40223c9d78af70ec67600b5f0092e0edbe0dd79e1fdc105ef0a = $this->env->getExtension("native_profiler");
        $__internal_98cd3ff4a9abe40223c9d78af70ec67600b5f0092e0edbe0dd79e1fdc105ef0a->enter($__internal_98cd3ff4a9abe40223c9d78af70ec67600b5f0092e0edbe0dd79e1fdc105ef0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        if ((array_key_exists("is_link", $context) && (isset($context["is_link"]) ? $context["is_link"] : $this->getContext($context, "is_link")))) {
            echo ((array_key_exists("icon", $context)) ? (_twig_default_filter((isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")))) : (""));
        }
        if (($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "allow_safe_labels", array()) && $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extra", array(0 => "safe_label", 1 => false), "method"))) {
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "label", array());
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "label", array()), array(), ((array_key_exists("translation_domain", $context)) ? (_twig_default_filter((isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")), "messages")) : ("messages"))), "html", null, true);
        }
        
        $__internal_98cd3ff4a9abe40223c9d78af70ec67600b5f0092e0edbe0dd79e1fdc105ef0a->leave($__internal_98cd3ff4a9abe40223c9d78af70ec67600b5f0092e0edbe0dd79e1fdc105ef0a_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Menu:sonata_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 70,  192 => 64,  187 => 63,  184 => 62,  182 => 61,  179 => 60,  176 => 59,  170 => 58,  159 => 54,  156 => 53,  153 => 52,  150 => 51,  147 => 50,  141 => 49,  130 => 45,  128 => 44,  125 => 41,  123 => 40,  121 => 39,  118 => 37,  116 => 36,  107 => 31,  105 => 30,  103 => 29,  101 => 28,  96 => 27,  93 => 25,  91 => 24,  89 => 23,  87 => 22,  85 => 21,  83 => 20,  81 => 19,  79 => 18,  71 => 14,  66 => 13,  64 => 12,  62 => 10,  56 => 9,  48 => 6,  46 => 5,  44 => 4,  38 => 3,  11 => 1,);
    }
}
/* {% extends 'knp_menu.html.twig' %}*/
/* */
/* {% block root %}*/
/*     {%- set listAttributes = item.childrenAttributes|merge({'class': 'sidebar-menu'}) %}*/
/*     {%- set request        = item.extra('request') ?: app.request %}*/
/*     {{ block('list') -}}*/
/* {% endblock %}*/
/* */
/* {% block item %}*/
/*     {%- if item.displayed %}*/
/*         {#- check role of the group #}*/
/*         {%- set display = (item.extra('roles') is empty or is_granted('ROLE_SUPER_ADMIN') ) %}*/
/*         {%- for role in item.extra('roles') if not display %}*/
/*             {%- set display = is_granted(role) %}*/
/*         {%- endfor %}*/
/*     {%- endif %}*/
/* */
/*     {%- if item.displayed and display|default %}*/
/*         {%- set active = false %}*/
/*         {%- if item.extra('active') is not empty and item.extra('active') %}*/
/*             {%- set active = true %}*/
/*         {%- elseif item.extra('admin') is not empty and item.extra('admin').hasroute('list') and item.extra('admin').isGranted('LIST') and request.get('_sonata_admin') == item.extra('admin').code %}*/
/*             {%- set active = true %}*/
/*         {%- elseif item.route is defined and request.get('_route') == item.route %}*/
/*             {%- set active = true %}*/
/*         {%- else %}*/
/*             {%- for child in item.children if not active %}*/
/*                 {%- if child.extra('admin') is not empty and child.extra('admin').hasroute('list') and child.extra('admin').isGranted('LIST') and request.get('_sonata_admin') == child.extra('admin').code %}*/
/*                     {%- set active = true %}*/
/*                 {%-  elseif child.route is defined and request.get('_route') == child.route %}*/
/*                     {%- set active = true %}*/
/*                 {%- endif %}*/
/*             {%- endfor %}*/
/*         {%- endif %}*/
/* */
/*         {%- if item.hasChildren %}*/
/*             {%- do item.setAttribute('class', (item.attribute('class')~' treeview')|trim) %}*/
/*         {%- endif %}*/
/*         {%- if active %}*/
/*             {%- do item.setAttribute('class', (item.attribute('class')~' active')|trim) %}*/
/*             {%- do item.setChildrenAttribute('class', (item.childrenAttribute('class')~' active')|trim) %}*/
/*         {%- endif %}*/
/* */
/*         {%- do item.setChildrenAttribute('class', (item.childrenAttribute('class')~' treeview-menu')|trim) %}*/
/*         {{ parent() }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block linkElement %}*/
/*     {% spaceless %}*/
/*         {% set translation_domain = item.extra('translation_domain', 'messages') %}*/
/*         {% set icon = item.attribute('icon')|default(item.level > 1 ? '<i class="fa fa-angle-double-right"></i>' : '') %}*/
/*         {% set is_link = true %}*/
/*         {{ parent() }}*/
/*     {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block spanElement %}*/
/*     {% spaceless %}*/
/*         <a href="#">*/
/*             {% set translation_domain = item.extra('label_catalogue') %}*/
/*             {% set icon = item.extra('icon')|default('') %}*/
/*             {{ icon|raw }}*/
/*             {{ parent() }}*/
/*             <i class="fa pull-right fa-angle-left"></i>*/
/*         </a>*/
/*     {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block label %}{% if is_link is defined and is_link %}{{ icon|default|raw }}{% endif %}{% if options.allow_safe_labels and item.extra('safe_label', false) %}{{ item.label|raw }}{% else %}{{ item.label|trans({}, translation_domain|default('messages')) }}{% endif %}{% endblock %}*/
/* */
