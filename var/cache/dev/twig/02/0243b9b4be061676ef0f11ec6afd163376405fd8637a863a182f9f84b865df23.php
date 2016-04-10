<?php

/* @Framework/Form/form_widget.html.php */
class __TwigTemplate_dc80a59e80dbc78f19b82a2b39f3d06bc3ec0ceef54643f989455b20f5cb57c3 extends Twig_Template
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
        $__internal_0aeda654abb084353bc8c22f9ffa5e375e5c110cb7fa4334743de90ae0a7d627 = $this->env->getExtension("native_profiler");
        $__internal_0aeda654abb084353bc8c22f9ffa5e375e5c110cb7fa4334743de90ae0a7d627->enter($__internal_0aeda654abb084353bc8c22f9ffa5e375e5c110cb7fa4334743de90ae0a7d627_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        // line 1
        echo "<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
";
        
        $__internal_0aeda654abb084353bc8c22f9ffa5e375e5c110cb7fa4334743de90ae0a7d627->leave($__internal_0aeda654abb084353bc8c22f9ffa5e375e5c110cb7fa4334743de90ae0a7d627_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($compound): ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_compound')?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_simple')?>*/
/* <?php endif ?>*/
/* */
