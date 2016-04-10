<?php

/* @Framework/Form/form_end.html.php */
class __TwigTemplate_41c18739ecb1a36471f56ad7412f68de00ea506a4b179dd8952dd74395f83ba8 extends Twig_Template
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
        $__internal_f50f1cc3a47a2edcde77155503aec691f7bbb4e4b749369329cd86753da045c9 = $this->env->getExtension("native_profiler");
        $__internal_f50f1cc3a47a2edcde77155503aec691f7bbb4e4b749369329cd86753da045c9->enter($__internal_f50f1cc3a47a2edcde77155503aec691f7bbb4e4b749369329cd86753da045c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        // line 1
        echo "<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
";
        
        $__internal_f50f1cc3a47a2edcde77155503aec691f7bbb4e4b749369329cd86753da045c9->leave($__internal_f50f1cc3a47a2edcde77155503aec691f7bbb4e4b749369329cd86753da045c9_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_end.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!isset($render_rest) || $render_rest): ?>*/
/* <?php echo $view['form']->rest($form) ?>*/
/* <?php endif ?>*/
/* </form>*/
/* */
