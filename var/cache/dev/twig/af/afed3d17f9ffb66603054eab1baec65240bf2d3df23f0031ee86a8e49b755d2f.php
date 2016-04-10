<?php

/* @Framework/Form/form_widget_compound.html.php */
class __TwigTemplate_dab2d4c44e14173151c1efe2e8dc05923ec9aaf202b178fcb17581895a1aa780 extends Twig_Template
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
        $__internal_2e6bb2dfe8d952ea2def78aee0598b627baef9021d62054a930a00a2891ee7ef = $this->env->getExtension("native_profiler");
        $__internal_2e6bb2dfe8d952ea2def78aee0598b627baef9021d62054a930a00a2891ee7ef->enter($__internal_2e6bb2dfe8d952ea2def78aee0598b627baef9021d62054a930a00a2891ee7ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
";
        
        $__internal_2e6bb2dfe8d952ea2def78aee0598b627baef9021d62054a930a00a2891ee7ef->leave($__internal_2e6bb2dfe8d952ea2def78aee0598b627baef9021d62054a930a00a2891ee7ef_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </div>*/
/* */
