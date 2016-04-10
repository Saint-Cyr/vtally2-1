<?php

/* @Framework/Form/checkbox_widget.html.php */
class __TwigTemplate_5d5408804dd08e03b552a1fb634f1a2c04d61d281e681be8fa2299c1c1331a39 extends Twig_Template
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
        $__internal_d1480b17e0440501e1ef51095bef4e80e4134d24bbf4c57bea7de46d5420e1ef = $this->env->getExtension("native_profiler");
        $__internal_d1480b17e0440501e1ef51095bef4e80e4134d24bbf4c57bea7de46d5420e1ef->enter($__internal_d1480b17e0440501e1ef51095bef4e80e4134d24bbf4c57bea7de46d5420e1ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        // line 1
        echo "<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_d1480b17e0440501e1ef51095bef4e80e4134d24bbf4c57bea7de46d5420e1ef->leave($__internal_d1480b17e0440501e1ef51095bef4e80e4134d24bbf4c57bea7de46d5420e1ef_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/checkbox_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="checkbox"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     <?php if (strlen($value) > 0): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?>*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
