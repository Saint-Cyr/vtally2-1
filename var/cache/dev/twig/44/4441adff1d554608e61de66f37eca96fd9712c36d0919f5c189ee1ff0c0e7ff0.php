<?php

/* @Framework/Form/form_widget_simple.html.php */
class __TwigTemplate_e94469ea73b9af773d74241c526574ffab5f1e35cbe9f49e83d96fa7a6445263 extends Twig_Template
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
        $__internal_2b394919b52ac12985d089e3fa2bf1f62e97673970223f521ed952ec21ced43e = $this->env->getExtension("native_profiler");
        $__internal_2b394919b52ac12985d089e3fa2bf1f62e97673970223f521ed952ec21ced43e->enter($__internal_2b394919b52ac12985d089e3fa2bf1f62e97673970223f521ed952ec21ced43e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        // line 1
        echo "<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
";
        
        $__internal_2b394919b52ac12985d089e3fa2bf1f62e97673970223f521ed952ec21ced43e->leave($__internal_2b394919b52ac12985d089e3fa2bf1f62e97673970223f521ed952ec21ced43e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_simple.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="<?php echo isset($type) ? $view->escape($type) : 'text' ?>" <?php echo $view['form']->block($form, 'widget_attributes') ?><?php if (!empty($value) || is_numeric($value)): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?> />*/
/* */
