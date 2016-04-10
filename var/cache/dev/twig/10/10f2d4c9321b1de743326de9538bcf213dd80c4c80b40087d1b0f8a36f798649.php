<?php

/* @Framework/Form/datetime_widget.html.php */
class __TwigTemplate_7ffa223074676ef6b7214b21434b4dad6d781d7a56010e36f46d8ef6528fa441 extends Twig_Template
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
        $__internal_cba45a898e5c624922e39bc4d53a7e95eb1da335259917039e0b5bd35bb8ac92 = $this->env->getExtension("native_profiler");
        $__internal_cba45a898e5c624922e39bc4d53a7e95eb1da335259917039e0b5bd35bb8ac92->enter($__internal_cba45a898e5c624922e39bc4d53a7e95eb1da335259917039e0b5bd35bb8ac92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/datetime_widget.html.php"));

        // line 1
        echo "<?php if (\$widget == 'single_text'): ?>
    <?php echo \$view['form']->block(\$form, 'form_widget_simple'); ?>
<?php else: ?>
    <div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
        <?php echo \$view['form']->widget(\$form['date']).' '.\$view['form']->widget(\$form['time']) ?>
    </div>
<?php endif ?>
";
        
        $__internal_cba45a898e5c624922e39bc4d53a7e95eb1da335259917039e0b5bd35bb8ac92->leave($__internal_cba45a898e5c624922e39bc4d53a7e95eb1da335259917039e0b5bd35bb8ac92_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/datetime_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($widget == 'single_text'): ?>*/
/*     <?php echo $view['form']->block($form, 'form_widget_simple'); ?>*/
/* <?php else: ?>*/
/*     <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*         <?php echo $view['form']->widget($form['date']).' '.$view['form']->widget($form['time']) ?>*/
/*     </div>*/
/* <?php endif ?>*/
/* */
