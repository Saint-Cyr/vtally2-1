<?php

/* SonataAdminBundle:CRUD:base_show_macro.html.twig */
class __TwigTemplate_ade112ae56f9ba35bd0b020203edd9d0a6d34ad1f4c4757f632a1509149b9a93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field_row' => array($this, 'block_field_row'),
            'show_title' => array($this, 'block_show_title'),
            'show_field' => array($this, 'block_show_field'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fbb280aae2b91a2da9e87731924fc5dd8f954297e13a2a58584fcdfe92924d47 = $this->env->getExtension("native_profiler");
        $__internal_fbb280aae2b91a2da9e87731924fc5dd8f954297e13a2a58584fcdfe92924d47->enter($__internal_fbb280aae2b91a2da9e87731924fc5dd8f954297e13a2a58584fcdfe92924d47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_show_macro.html.twig"));

        // line 10
        echo "
";
        // line 11
        $this->displayBlock('field_row', $context, $blocks);
        
        $__internal_fbb280aae2b91a2da9e87731924fc5dd8f954297e13a2a58584fcdfe92924d47->leave($__internal_fbb280aae2b91a2da9e87731924fc5dd8f954297e13a2a58584fcdfe92924d47_prof);

    }

    public function block_field_row($context, array $blocks = array())
    {
        $__internal_534597312406ede9e5ad6c020f97d03510fb5976f4842957c7d88ba5b299a2a2 = $this->env->getExtension("native_profiler");
        $__internal_534597312406ede9e5ad6c020f97d03510fb5976f4842957c7d88ba5b299a2a2->enter($__internal_534597312406ede9e5ad6c020f97d03510fb5976f4842957c7d88ba5b299a2a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field_row"));

        // line 12
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
            // line 13
            echo "        ";
            $context["show_group"] = $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showgroups", array()), $context["code"], array(), "array");
            // line 14
            echo "
        <div class=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["show_group"]) ? $context["show_group"] : $this->getContext($context, "show_group")), "class", array()), "html", null, true);
            echo " ";
            echo (((isset($context["no_padding"]) ? $context["no_padding"] : $this->getContext($context, "no_padding"))) ? ("nopadding") : (""));
            echo "\">
            <div class=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["show_group"]) ? $context["show_group"] : $this->getContext($context, "show_group")), "box_class", array()), "html", null, true);
            echo "\">
                <div class=\"box-header\">
                    <h4 class=\"box-title\">
                        ";
            // line 19
            $this->displayBlock('show_title', $context, $blocks);
            // line 22
            echo "                    </h4>
                </div>
                <div class=\"box-body table-responsive no-padding\">
                    <table class=\"table\">
                        <tbody>
                        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["show_group"]) ? $context["show_group"] : $this->getContext($context, "show_group")), "fields", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 28
                echo "                            ";
                $this->displayBlock('show_field', $context, $blocks);
                // line 35
                echo "                        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "                        </tbody>
                    </table>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_534597312406ede9e5ad6c020f97d03510fb5976f4842957c7d88ba5b299a2a2->leave($__internal_534597312406ede9e5ad6c020f97d03510fb5976f4842957c7d88ba5b299a2a2_prof);

    }

    // line 19
    public function block_show_title($context, array $blocks = array())
    {
        $__internal_39164d1fe53bc6cb80be39f0bb0d99a8297e5e446d62ba0800b8ddc0cc205955 = $this->env->getExtension("native_profiler");
        $__internal_39164d1fe53bc6cb80be39f0bb0d99a8297e5e446d62ba0800b8ddc0cc205955->enter($__internal_39164d1fe53bc6cb80be39f0bb0d99a8297e5e446d62ba0800b8ddc0cc205955_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "show_title"));

        // line 20
        echo "                            ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute((isset($context["show_group"]) ? $context["show_group"] : $this->getContext($context, "show_group")), "name", array()), 1 => array(), 2 => $this->getAttribute((isset($context["show_group"]) ? $context["show_group"] : $this->getContext($context, "show_group")), "translation_domain", array())), "method"), "html", null, true);
        echo "
                        ";
        
        $__internal_39164d1fe53bc6cb80be39f0bb0d99a8297e5e446d62ba0800b8ddc0cc205955->leave($__internal_39164d1fe53bc6cb80be39f0bb0d99a8297e5e446d62ba0800b8ddc0cc205955_prof);

    }

    // line 28
    public function block_show_field($context, array $blocks = array())
    {
        $__internal_5b30cbccac2cc48632e7874b19d9d90569fb8a67d99d55896ffd2a17d074519d = $this->env->getExtension("native_profiler");
        $__internal_5b30cbccac2cc48632e7874b19d9d90569fb8a67d99d55896ffd2a17d074519d->enter($__internal_5b30cbccac2cc48632e7874b19d9d90569fb8a67d99d55896ffd2a17d074519d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "show_field"));

        // line 29
        echo "                                <tr class=\"sonata-ba-view-container\">
                                    ";
        // line 30
        if ($this->getAttribute((isset($context["elements"]) ? $context["elements"] : null), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array", true, true)) {
            // line 31
            echo "                                        ";
            echo $this->env->getExtension('sonata_admin')->renderViewElement($this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array"), (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")));
            echo "
                                    ";
        }
        // line 33
        echo "                                </tr>
                            ";
        
        $__internal_5b30cbccac2cc48632e7874b19d9d90569fb8a67d99d55896ffd2a17d074519d->leave($__internal_5b30cbccac2cc48632e7874b19d9d90569fb8a67d99d55896ffd2a17d074519d_prof);

    }

    // line 1
    public function getrender_groups($__admin__ = null, $__object__ = null, $__elements__ = null, $__groups__ = null, $__has_tab__ = null, $__no_padding__ = false, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "admin" => $__admin__,
            "object" => $__object__,
            "elements" => $__elements__,
            "groups" => $__groups__,
            "has_tab" => $__has_tab__,
            "no_padding" => $__no_padding__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_54483d3593e2b8d84f75fcba83db7b3db801698ac586ca6d784b969317c269a3 = $this->env->getExtension("native_profiler");
            $__internal_54483d3593e2b8d84f75fcba83db7b3db801698ac586ca6d784b969317c269a3->enter($__internal_54483d3593e2b8d84f75fcba83db7b3db801698ac586ca6d784b969317c269a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "render_groups"));

            // line 2
            echo "    ";
            if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
                // line 3
                echo "        <div class=\"row\">
            ";
                // line 4
                $this->displayBlock("field_row", $context, $blocks);
                echo "
        </div>
    ";
            } else {
                // line 7
                echo "        ";
                $this->displayBlock("field_row", $context, $blocks);
                echo "
    ";
            }
            
            $__internal_54483d3593e2b8d84f75fcba83db7b3db801698ac586ca6d784b969317c269a3->leave($__internal_54483d3593e2b8d84f75fcba83db7b3db801698ac586ca6d784b969317c269a3_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_show_macro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 7,  210 => 4,  207 => 3,  204 => 2,  184 => 1,  176 => 33,  170 => 31,  168 => 30,  165 => 29,  159 => 28,  149 => 20,  143 => 19,  119 => 36,  105 => 35,  102 => 28,  85 => 27,  78 => 22,  76 => 19,  70 => 16,  64 => 15,  61 => 14,  58 => 13,  40 => 12,  28 => 11,  25 => 10,);
    }
}
/* {% macro render_groups(admin, object, elements, groups, has_tab, no_padding = false) %}*/
/*     {% if has_tab %}*/
/*         <div class="row">*/
/*             {{ block('field_row') }}*/
/*         </div>*/
/*     {% else %}*/
/*         {{ block('field_row') }}*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% block field_row %}*/
/*     {% for code in groups %}*/
/*         {% set show_group = admin.showgroups[code] %}*/
/* */
/*         <div class="{{ show_group.class }} {{ no_padding ? "nopadding" }}">*/
/*             <div class="{{ show_group.box_class }}">*/
/*                 <div class="box-header">*/
/*                     <h4 class="box-title">*/
/*                         {% block show_title %}*/
/*                             {{ admin.trans(show_group.name, {}, show_group.translation_domain) }}*/
/*                         {% endblock %}*/
/*                     </h4>*/
/*                 </div>*/
/*                 <div class="box-body table-responsive no-padding">*/
/*                     <table class="table">*/
/*                         <tbody>*/
/*                         {% for field_name in show_group.fields %}*/
/*                             {% block show_field %}*/
/*                                 <tr class="sonata-ba-view-container">*/
/*                                     {% if elements[field_name] is defined %}*/
/*                                         {{ elements[field_name]|render_view_element(object)}}*/
/*                                     {% endif %}*/
/*                                 </tr>*/
/*                             {% endblock %}*/
/*                         {% endfor %}*/
/*                         </tbody>*/
/*                     </table>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
