<?php

/* @Framework/Form/radio_widget.html.php */
class __TwigTemplate_b04d52db1cfdbb7bb36236ea36eafcf69e3cc685473622c58515a86880565000 extends Twig_Template
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
        $__internal_cb09b02f87a945e68b8f6d07b90f6ac050a41c7f1ad35097dd29581338132c5a = $this->env->getExtension("native_profiler");
        $__internal_cb09b02f87a945e68b8f6d07b90f6ac050a41c7f1ad35097dd29581338132c5a->enter($__internal_cb09b02f87a945e68b8f6d07b90f6ac050a41c7f1ad35097dd29581338132c5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        // line 1
        echo "<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_cb09b02f87a945e68b8f6d07b90f6ac050a41c7f1ad35097dd29581338132c5a->leave($__internal_cb09b02f87a945e68b8f6d07b90f6ac050a41c7f1ad35097dd29581338132c5a_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/radio_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="radio"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     value="<?php echo $view->escape($value) ?>"*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
