<?php

/* marketing/marketing_form.twig */
class __TwigTemplate_943afe7cfa303ff37805821da00cffb021f90b2937b628329845393d8bdfdb7b extends Twig_Template
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
        // line 1
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-marketing\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo (isset($context["text_form"]) ? $context["text_form"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-marketing\" class=\"form-horizontal\">
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 29
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 31
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 32
        if ((isset($context["error_name"]) ? $context["error_name"] : null)) {
            // line 33
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_name"]) ? $context["error_name"] : null);
            echo "</div>
              ";
        }
        // line 35
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-description\">";
        // line 38
        echo (isset($context["entry_description"]) ? $context["entry_description"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"description\" rows=\"5\" placeholder=\"";
        // line 40
        echo (isset($context["entry_description"]) ? $context["entry_description"] : null);
        echo "\" id=\"input-description\" class=\"form-control\">";
        echo (isset($context["description"]) ? $context["description"] : null);
        echo "</textarea>
            </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-code\"><span data-toggle=\"tooltip\" title=\"";
        // line 44
        echo (isset($context["help_code"]) ? $context["help_code"] : null);
        echo "\">";
        echo (isset($context["entry_code"]) ? $context["entry_code"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"code\" value=\"";
        // line 46
        echo (isset($context["code"]) ? $context["code"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_code"]) ? $context["entry_code"] : null);
        echo "\" id=\"input-code\" class=\"form-control\" />
              ";
        // line 47
        if ((isset($context["error_code"]) ? $context["error_code"] : null)) {
            // line 48
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_code"]) ? $context["error_code"] : null);
            echo "</div>
              ";
        }
        // line 50
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-example\"><span data-toggle=\"tooltip\" title=\"";
        // line 53
        echo (isset($context["help_example"]) ? $context["help_example"] : null);
        echo "\">";
        echo (isset($context["entry_example"]) ? $context["entry_example"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" placeholder=\"";
        // line 55
        echo (isset($context["entry_example"]) ? $context["entry_example"] : null);
        echo "\" id=\"input-example1\" class=\"form-control\" />
              <br />
              <input type=\"text\" placeholder=\"";
        // line 57
        echo (isset($context["entry_example"]) ? $context["entry_example"] : null);
        echo "\" id=\"input-example2\" class=\"form-control\" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('#input-code').on('keyup', function() {
\t\$('#input-example1').val('";
        // line 66
        echo (isset($context["store"]) ? $context["store"] : null);
        echo "?tracking=' + \$('#input-code').val());
\t\$('#input-example2').val('";
        // line 67
        echo (isset($context["store"]) ? $context["store"] : null);
        echo "index.php?route=common/home&tracking=' + \$('#input-code').val());
});

\$('#input-code').trigger('keyup');
//--></script></div>
";
        // line 72
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "marketing/marketing_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 72,  181 => 67,  177 => 66,  165 => 57,  160 => 55,  153 => 53,  148 => 50,  142 => 48,  140 => 47,  134 => 46,  127 => 44,  118 => 40,  113 => 38,  108 => 35,  102 => 33,  100 => 32,  94 => 31,  89 => 29,  84 => 27,  78 => 24,  74 => 22,  66 => 18,  64 => 17,  58 => 13,  47 => 11,  43 => 10,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-marketing" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_form }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-marketing" class="form-horizontal">*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-name">{{ entry_name }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="name" value="{{ name }}" placeholder="{{ entry_name }}" id="input-name" class="form-control" />*/
/*               {% if error_name %}*/
/*               <div class="text-danger">{{ error_name }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-description">{{ entry_description }}</label>*/
/*             <div class="col-sm-10">*/
/*               <textarea name="description" rows="5" placeholder="{{ entry_description }}" id="input-description" class="form-control">{{ description }}</textarea>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip" title="{{ help_code }}">{{ entry_code }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="code" value="{{ code }}" placeholder="{{ entry_code }}" id="input-code" class="form-control" />*/
/*               {% if error_code %}*/
/*               <div class="text-danger">{{ error_code }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-example"><span data-toggle="tooltip" title="{{ help_example }}">{{ entry_example }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" placeholder="{{ entry_example }}" id="input-example1" class="form-control" />*/
/*               <br />*/
/*               <input type="text" placeholder="{{ entry_example }}" id="input-example2" class="form-control" />*/
/*             </div>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/* $('#input-code').on('keyup', function() {*/
/* 	$('#input-example1').val('{{ store }}?tracking=' + $('#input-code').val());*/
/* 	$('#input-example2').val('{{ store }}index.php?route=common/home&tracking=' + $('#input-code').val());*/
/* });*/
/* */
/* $('#input-code').trigger('keyup');*/
/* //--></script></div>*/
/* {{ footer }}*/
