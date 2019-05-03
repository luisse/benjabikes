<?php

/* customer/custom_field_form.twig */
class __TwigTemplate_069f0a829854c7e13e431cd948b12c5bf9a84506bebbabb5e8a6bc94215d81e2 extends Twig_Template
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
        <button type=\"submit\" form=\"form-custom-field\" data-toggle=\"tooltip\" title=\"";
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
  <div class=\"container-fluid\"> ";
        // line 16
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 21
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 23
        echo (isset($context["text_form"]) ? $context["text_form"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 26
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-custom-field\" class=\"form-horizontal\">
                      <fieldset>
              <legend>";
        // line 28
        echo (isset($context["text_custom_field"]) ? $context["text_custom_field"] : null);
        echo "</legend>
          
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\">";
        // line 31
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</label>
            <div class=\"col-sm-10\"> ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 33
            echo "              <div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" /></span>
                <input type=\"text\" name=\"custom_field_description[";
            // line 34
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][name]\" value=\"";
            echo (($this->getAttribute((isset($context["custom_field_description"]) ? $context["custom_field_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["custom_field_description"]) ? $context["custom_field_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "name", array())) : (""));
            echo "\" placeholder=\"";
            echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
            echo "\" class=\"form-control\" />
              </div>
              ";
            // line 36
            if ($this->getAttribute((isset($context["error_name"]) ? $context["error_name"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) {
                // line 37
                echo "              <div class=\"text-danger\">";
                echo $this->getAttribute((isset($context["error_name"]) ? $context["error_name"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
                echo "</div>
              ";
            }
            // line 39
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-location\">";
        // line 43
        echo (isset($context["entry_location"]) ? $context["entry_location"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"location\" id=\"input-location\" class=\"form-control\">
                
                

                ";
        // line 49
        if (((isset($context["location"]) ? $context["location"] : null) == "account")) {
            // line 50
            echo "
                
                
                <option value=\"account\" selected=\"selected\">";
            // line 53
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 58
            echo "
                
                
                <option value=\"account\">";
            // line 61
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</option>
                
                

                ";
        }
        // line 66
        echo "                ";
        if (((isset($context["location"]) ? $context["location"] : null) == "address")) {
            // line 67
            echo "
                
                
                <option value=\"address\" selected=\"selected\">";
            // line 70
            echo (isset($context["text_address"]) ? $context["text_address"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 75
            echo "
                
                
                <option value=\"address\">";
            // line 78
            echo (isset($context["text_address"]) ? $context["text_address"] : null);
            echo "</option>
                
                

                ";
        }
        // line 83
        echo "

                ";
        // line 85
        if (((isset($context["location"]) ? $context["location"] : null) == "affiliate")) {
            // line 86
            echo "
                
                
                <option value=\"affiliate\" selected=\"selected\">";
            // line 89
            echo (isset($context["text_affiliate"]) ? $context["text_affiliate"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 94
            echo "
                
                
                <option value=\"affiliate\">";
            // line 97
            echo (isset($context["text_affiliate"]) ? $context["text_affiliate"] : null);
            echo "</option>
                
                

                ";
        }
        // line 102
        echo "

              
              
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-type\">";
        // line 110
        echo (isset($context["entry_type"]) ? $context["entry_type"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"type\" id=\"input-type\" class=\"form-control\">
                <optgroup label=\"";
        // line 113
        echo (isset($context["text_choose"]) ? $context["text_choose"] : null);
        echo "\">
                ";
        // line 114
        if (((isset($context["type"]) ? $context["type"] : null) == "select")) {
            // line 115
            echo "
                
                
                <option value=\"select\" selected=\"selected\">";
            // line 118
            echo (isset($context["text_select"]) ? $context["text_select"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 123
            echo "
                
                
                <option value=\"select\">";
            // line 126
            echo (isset($context["text_select"]) ? $context["text_select"] : null);
            echo "</option>
                
                

                ";
        }
        // line 131
        echo "                ";
        if (((isset($context["type"]) ? $context["type"] : null) == "radio")) {
            // line 132
            echo "
                
                
                <option value=\"radio\" selected=\"selected\">";
            // line 135
            echo (isset($context["text_radio"]) ? $context["text_radio"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 140
            echo "
                
                
                <option value=\"radio\">";
            // line 143
            echo (isset($context["text_radio"]) ? $context["text_radio"] : null);
            echo "</option>
                
                

                ";
        }
        // line 148
        echo "                ";
        if (((isset($context["type"]) ? $context["type"] : null) == "checkbox")) {
            // line 149
            echo "
                
                
                <option value=\"checkbox\" selected=\"selected\">";
            // line 152
            echo (isset($context["text_checkbox"]) ? $context["text_checkbox"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 157
            echo "
                
                
                <option value=\"checkbox\">";
            // line 160
            echo (isset($context["text_checkbox"]) ? $context["text_checkbox"] : null);
            echo "</option>
                
                

                ";
        }
        // line 165
        echo "                </optgroup>
                <optgroup label=\"";
        // line 166
        echo (isset($context["text_input"]) ? $context["text_input"] : null);
        echo "\">
                ";
        // line 167
        if (((isset($context["type"]) ? $context["type"] : null) == "text")) {
            // line 168
            echo "
                
                
                <option value=\"text\" selected=\"selected\">";
            // line 171
            echo (isset($context["text_text"]) ? $context["text_text"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 176
            echo "
                
                
                <option value=\"text\">";
            // line 179
            echo (isset($context["text_text"]) ? $context["text_text"] : null);
            echo "</option>
                
                

                ";
        }
        // line 184
        echo "                ";
        if (((isset($context["type"]) ? $context["type"] : null) == "textarea")) {
            // line 185
            echo "
                
                
                <option value=\"textarea\" selected=\"selected\">";
            // line 188
            echo (isset($context["text_textarea"]) ? $context["text_textarea"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 193
            echo "
                
                
                <option value=\"textarea\">";
            // line 196
            echo (isset($context["text_textarea"]) ? $context["text_textarea"] : null);
            echo "</option>
                
                

                ";
        }
        // line 201
        echo "                </optgroup>
                <optgroup label=\"";
        // line 202
        echo (isset($context["text_file"]) ? $context["text_file"] : null);
        echo "\">
                ";
        // line 203
        if (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 204
            echo "
                
                
                <option value=\"file\" selected=\"selected\">";
            // line 207
            echo (isset($context["text_file"]) ? $context["text_file"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 212
            echo "
                
                
                <option value=\"file\">";
            // line 215
            echo (isset($context["text_file"]) ? $context["text_file"] : null);
            echo "</option>
                
                

                ";
        }
        // line 220
        echo "                </optgroup>
                <optgroup label=\"";
        // line 221
        echo (isset($context["text_date"]) ? $context["text_date"] : null);
        echo "\">
                ";
        // line 222
        if (((isset($context["type"]) ? $context["type"] : null) == "date")) {
            // line 223
            echo "
                
                
                <option value=\"date\" selected=\"selected\">";
            // line 226
            echo (isset($context["text_date"]) ? $context["text_date"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 231
            echo "
                
                
                <option value=\"date\">";
            // line 234
            echo (isset($context["text_date"]) ? $context["text_date"] : null);
            echo "</option>
                
                

                ";
        }
        // line 239
        echo "                ";
        if (((isset($context["type"]) ? $context["type"] : null) == "time")) {
            // line 240
            echo "
                
                
                <option value=\"time\" selected=\"selected\">";
            // line 243
            echo (isset($context["text_time"]) ? $context["text_time"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 248
            echo "
                
                
                <option value=\"time\">";
            // line 251
            echo (isset($context["text_time"]) ? $context["text_time"] : null);
            echo "</option>
                
                

                ";
        }
        // line 256
        echo "                ";
        if (((isset($context["type"]) ? $context["type"] : null) == "datetime")) {
            // line 257
            echo "
                
                
                <option value=\"datetime\" selected=\"selected\">";
            // line 260
            echo (isset($context["text_datetime"]) ? $context["text_datetime"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 265
            echo "
                
                
                <option value=\"datetime\">";
            // line 268
            echo (isset($context["text_datetime"]) ? $context["text_datetime"] : null);
            echo "</option>
                
                

                ";
        }
        // line 273
        echo "                </optgroup>
              </select>
            </div>
          </div>
          <div class=\"form-group\" id=\"display-value\">
            <label class=\"col-sm-2 control-label\" for=\"input-value\">";
        // line 278
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"value\" value=\"";
        // line 280
        echo (isset($context["value"]) ? $context["value"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" id=\"input-value\" class=\"form-control\" />
            </div>
          </div>
          <div class=\"form-group\" id=\"display-validation\">
            <label class=\"col-sm-2 control-label\" for=\"input-validation\"><span data-toggle=\"tooltip\" title=\"";
        // line 284
        echo (isset($context["help_regex"]) ? $context["help_regex"] : null);
        echo "\">";
        echo (isset($context["entry_validation"]) ? $context["entry_validation"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"validation\" id=\"input-validation\" value=\"";
        // line 286
        echo (isset($context["validation"]) ? $context["validation"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_regex"]) ? $context["text_regex"] : null);
        echo "\"  class=\"form-control\"/>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">";
        // line 290
        echo (isset($context["entry_customer_group"]) ? $context["entry_customer_group"] : null);
        echo "</label>
            <div class=\"col-sm-10\">";
        // line 291
        $context["customer_group_row"] = 0;
        // line 292
        echo "              ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["customer_groups"]) ? $context["customer_groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 293
            echo "              <div class=\"checkbox\">
                <label> ";
            // line 294
            if (twig_in_filter($this->getAttribute($context["customer_group"], "customer_group_id", array()), (isset($context["custom_field_customer_group"]) ? $context["custom_field_customer_group"] : null))) {
                // line 295
                echo "                  <input type=\"checkbox\" name=\"custom_field_customer_group[";
                echo (isset($context["customer_group_row"]) ? $context["customer_group_row"] : null);
                echo "][customer_group_id]\" value=\"";
                echo $this->getAttribute($context["customer_group"], "customer_group_id", array());
                echo "\" checked=\"checked\" />
                  ";
                // line 296
                echo $this->getAttribute($context["customer_group"], "name", array());
                echo "
                  ";
            } else {
                // line 298
                echo "                  <input type=\"checkbox\" name=\"custom_field_customer_group[";
                echo (isset($context["customer_group_row"]) ? $context["customer_group_row"] : null);
                echo "][customer_group_id]\" value=\"";
                echo $this->getAttribute($context["customer_group"], "customer_group_id", array());
                echo "\" />
                  ";
                // line 299
                echo $this->getAttribute($context["customer_group"], "name", array());
                echo "
                  ";
            }
            // line 300
            echo " </label>
              </div>
              ";
            // line 302
            $context["customer_group_row"] = ((isset($context["customer_group_row"]) ? $context["customer_group_row"] : null) + 1);
            // line 303
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">";
        // line 306
        echo (isset($context["entry_required"]) ? $context["entry_required"] : null);
        echo "</label>
            <div class=\"col-sm-10\">";
        // line 307
        $context["customer_group_row"] = 0;
        // line 308
        echo "              ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["customer_groups"]) ? $context["customer_groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 309
            echo "              <div class=\"checkbox\">
                <label> ";
            // line 310
            if (twig_in_filter($this->getAttribute($context["customer_group"], "customer_group_id", array()), (isset($context["custom_field_required"]) ? $context["custom_field_required"] : null))) {
                // line 311
                echo "                  <input type=\"checkbox\" name=\"custom_field_customer_group[";
                echo (isset($context["customer_group_row"]) ? $context["customer_group_row"] : null);
                echo "][required]\" value=\"";
                echo $this->getAttribute($context["customer_group"], "customer_group_id", array());
                echo "\" checked=\"checked\" />
                  ";
                // line 312
                echo $this->getAttribute($context["customer_group"], "name", array());
                echo "
                  ";
            } else {
                // line 314
                echo "                  <input type=\"checkbox\" name=\"custom_field_customer_group[";
                echo (isset($context["customer_group_row"]) ? $context["customer_group_row"] : null);
                echo "][required]\" value=\"";
                echo $this->getAttribute($context["customer_group"], "customer_group_id", array());
                echo "\" />
                  ";
                // line 315
                echo $this->getAttribute($context["customer_group"], "name", array());
                echo "
                  ";
            }
            // line 316
            echo "</label>
              </div>
              ";
            // line 318
            $context["customer_group_row"] = ((isset($context["customer_group_row"]) ? $context["customer_group_row"] : null) + 1);
            // line 319
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 322
        echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                
                

                ";
        // line 328
        if ((isset($context["status"]) ? $context["status"] : null)) {
            // line 329
            echo "
                
                
                <option value=\"1\" selected=\"selected\">";
            // line 332
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                <option value=\"0\">";
            // line 333
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                
                

                ";
        } else {
            // line 338
            echo "
                
                
                <option value=\"1\">";
            // line 341
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                <option value=\"0\" selected=\"selected\">";
            // line 342
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                
                

                ";
        }
        // line 347
        echo "
              
              
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-sort-order\"><span data-toggle=\"tooltip\" title=\"";
        // line 354
        echo (isset($context["help_sort_order"]) ? $context["help_sort_order"] : null);
        echo "\">";
        echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"sort_order\" value=\"";
        // line 356
        echo (isset($context["sort_order"]) ? $context["sort_order"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
        echo "\" id=\"input-sort-order\" class=\"form-control\" />
            </div>
          </div>
          </fieldset>
          <br />
          <div id=\"custom-field-value\">
            <fieldset>
              <legend>";
        // line 363
        echo (isset($context["text_value"]) ? $context["text_value"] : null);
        echo "</legend>
              <table class=\"table table-striped table-bordered table-hover\">
                <thead>
                  <tr>
                    <td class=\"text-left required\">";
        // line 367
        echo (isset($context["entry_custom_value"]) ? $context["entry_custom_value"] : null);
        echo "</td>
                    <td class=\"text-right\">";
        // line 368
        echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
        echo "</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                
                ";
        // line 374
        $context["custom_field_value_row"] = 0;
        // line 375
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["custom_field_values"]) ? $context["custom_field_values"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
            // line 376
            echo "                <tr id=\"custom-field-value-row";
            echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
            echo "\">
                  <td class=\"text-left\" style=\"width: 70%;\"><input type=\"hidden\" name=\"custom_field_value[";
            // line 377
            echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
            echo "][custom_field_value_id]\" value=\"";
            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array());
            echo "\" />
                    ";
            // line 378
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 379
                echo "                    <div class=\"input-group\"> <span class=\"input-group-addon\"><img src=\"language/";
                echo $this->getAttribute($context["language"], "code", array());
                echo "/";
                echo $this->getAttribute($context["language"], "code", array());
                echo ".png\" title=\"";
                echo $this->getAttribute($context["language"], "name", array());
                echo "\" /></span>
                      <input type=\"text\" name=\"custom_field_value[";
                // line 380
                echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
                echo "][custom_field_value_description][";
                echo $this->getAttribute($context["language"], "language_id", array());
                echo "][name]\" value=\"";
                echo (($this->getAttribute($this->getAttribute($context["custom_field_value"], "custom_field_value_description", array()), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute($this->getAttribute($context["custom_field_value"], "custom_field_value_description", array()), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "name", array())) : (""));
                echo "\" placeholder=\"";
                echo (isset($context["entry_custom_value"]) ? $context["entry_custom_value"] : null);
                echo "\" class=\"form-control\" />
                    </div>
                    ";
                // line 382
                if ($this->getAttribute($this->getAttribute((isset($context["error_custom_field_value"]) ? $context["error_custom_field_value"] : null), (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null), array(), "array"), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) {
                    // line 383
                    echo "                    <div class=\"text-danger\">";
                    echo $this->getAttribute($this->getAttribute((isset($context["error_custom_field_value"]) ? $context["error_custom_field_value"] : null), (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null), array(), "array"), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
                    echo "</div>
                    ";
                }
                // line 385
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
                  <td class=\"text-right\"><input type=\"text\" name=\"custom_field_value[";
            // line 386
            echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
            echo "][sort_order]\" value=\"";
            echo $this->getAttribute($context["custom_field_value"], "sort_order", array());
            echo "\" placeholder=\"";
            echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
            echo "\" class=\"form-control\" /></td>
                  <td class=\"text-left\"><button onclick=\"\$('#custom-field-value-row";
            // line 387
            echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
            echo "').remove();\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>
                </tr>
                ";
            // line 389
            $context["custom_field_value_row"] = ((isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null) + 1);
            // line 390
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 391
        echo "                  </tbody>
                
                <tfoot>
                  <tr>
                    <td colspan=\"2\"></td>
                    <td class=\"text-left\"><button type=\"button\" onclick=\"addCustomFieldValue();\" data-toggle=\"tooltip\" title=\"";
        // line 396
        echo (isset($context["button_custom_field_value_add"]) ? $context["button_custom_field_value_add"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus-circle\"></i></button></td>
                  </tr>
                </tfoot>
              </table>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('select[name=\\'type\\']').on('change', function() {
\tif (this.value == 'select' || this.value == 'radio' || this.value == 'checkbox') {
\t\t\$('#custom-field-value').show();
\t\t\$('#display-value, #display-validation').hide();
\t} else {
\t\t\$('#custom-field-value').hide();
\t\t\$('#display-value, #display-validation').show();
\t}

\tif (this.value == 'date') {
\t\t\$('#display-value > div').html('<div class=\"input-group date\"><input type=\"text\" name=\"value\" value=\"' + \$('#input-value').val() + '\" placeholder=\"";
        // line 417
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" data-date-format=\"YYYY-MM-DD\" id=\"input-value\" class=\"form-control\" /><span class=\"input-group-btn\"><button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button></span></div>');
\t} else if (this.value == 'time') {
\t\t\$('#display-value > div').html('<div class=\"input-group time\"><input type=\"text\" name=\"value\" value=\"' + \$('#input-value').val() + '\" placeholder=\"";
        // line 419
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" data-date-format=\"HH:mm\" id=\"input-value\" class=\"form-control\" /><span class=\"input-group-btn\"><button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button></span></div>');
\t} else if (this.value == 'datetime') {
\t\t\$('#display-value > div').html('<div class=\"input-group datetime\"><input type=\"text\" name=\"value\" value=\"' + \$('#input-value').val() + '\" placeholder=\"";
        // line 421
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" data-date-format=\"YYYY-MM-DD HH:mm\" id=\"input-value\" class=\"form-control\" /><span class=\"input-group-btn\"><button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button></span></div>');
\t} else if (this.value == 'textarea') {
\t\t\$('#display-value > div').html('<textarea name=\"value\" placeholder=\"";
        // line 423
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" id=\"input-value\" class=\"form-control\">' + \$('#input-value').val() + '</textarea>');
\t} else {
\t\t\$('#display-value > div').html('<input type=\"text\" name=\"value\" value=\"' + \$('#input-value').val() + '\" placeholder=\"";
        // line 425
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" id=\"input-value\" class=\"form-control\" />');
\t}

\t\$('.date').datetimepicker({
\t\tlanguage: '";
        // line 429
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\t\tpickTime: false
\t});

\t\$('.time').datetimepicker({
\t\tlanguage: '";
        // line 434
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\t\tpickDate: false
\t});

\t\$('.datetime').datetimepicker({
\t\tlanguage: '";
        // line 439
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\t\tpickDate: true,
\t\tpickTime: true
\t});
});

\$('select[name=\\'type\\']').trigger('change');

var custom_field_value_row = ";
        // line 447
        echo (isset($context["custom_field_value_row"]) ? $context["custom_field_value_row"] : null);
        echo ";

function addCustomFieldValue() {
\thtml  = '<tr id=\"custom-field-value-row' + custom_field_value_row + '\">';
    html += '  <td class=\"text-left\" style=\"width: 70%;\"><input type=\"hidden\" name=\"custom_field_value[' + custom_field_value_row + '][custom_field_value_id]\" value=\"\" />';
\t";
        // line 452
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 453
            echo "\thtml += '    <div class=\"input-group\">';
\thtml += '      <span class=\"input-group-addon\"><img src=\"language/";
            // line 454
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" /></span><input type=\"text\" name=\"custom_field_value[' + custom_field_value_row + '][custom_field_value_description][";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][name]\" value=\"\" placeholder=\"";
            echo (isset($context["entry_custom_value"]) ? $context["entry_custom_value"] : null);
            echo "\" class=\"form-control\" />';
    html += '    </div>';
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 457
        echo "\thtml += '  </td>';
\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"custom_field_value[' + custom_field_value_row + '][sort_order]\" value=\"\" placeholder=\"";
        // line 458
        echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
        echo "\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-left\"><button type=\"button\" onclick=\"\$(\\'#custom-field-value-row' + custom_field_value_row + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 459
        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\thtml += '</tr>';

\t\$('#custom-field-value tbody').append(html);

\tcustom_field_value_row++;
}
//--></script></div>
";
        // line 467
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "customer/custom_field_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  993 => 467,  982 => 459,  978 => 458,  975 => 457,  958 => 454,  955 => 453,  951 => 452,  943 => 447,  932 => 439,  924 => 434,  916 => 429,  909 => 425,  904 => 423,  899 => 421,  894 => 419,  889 => 417,  865 => 396,  858 => 391,  852 => 390,  850 => 389,  843 => 387,  835 => 386,  827 => 385,  821 => 383,  819 => 382,  808 => 380,  799 => 379,  795 => 378,  789 => 377,  784 => 376,  779 => 375,  777 => 374,  768 => 368,  764 => 367,  757 => 363,  745 => 356,  738 => 354,  729 => 347,  721 => 342,  717 => 341,  712 => 338,  704 => 333,  700 => 332,  695 => 329,  693 => 328,  684 => 322,  674 => 319,  672 => 318,  668 => 316,  663 => 315,  656 => 314,  651 => 312,  644 => 311,  642 => 310,  639 => 309,  634 => 308,  632 => 307,  628 => 306,  618 => 303,  616 => 302,  612 => 300,  607 => 299,  600 => 298,  595 => 296,  588 => 295,  586 => 294,  583 => 293,  578 => 292,  576 => 291,  572 => 290,  563 => 286,  556 => 284,  547 => 280,  542 => 278,  535 => 273,  527 => 268,  522 => 265,  514 => 260,  509 => 257,  506 => 256,  498 => 251,  493 => 248,  485 => 243,  480 => 240,  477 => 239,  469 => 234,  464 => 231,  456 => 226,  451 => 223,  449 => 222,  445 => 221,  442 => 220,  434 => 215,  429 => 212,  421 => 207,  416 => 204,  414 => 203,  410 => 202,  407 => 201,  399 => 196,  394 => 193,  386 => 188,  381 => 185,  378 => 184,  370 => 179,  365 => 176,  357 => 171,  352 => 168,  350 => 167,  346 => 166,  343 => 165,  335 => 160,  330 => 157,  322 => 152,  317 => 149,  314 => 148,  306 => 143,  301 => 140,  293 => 135,  288 => 132,  285 => 131,  277 => 126,  272 => 123,  264 => 118,  259 => 115,  257 => 114,  253 => 113,  247 => 110,  237 => 102,  229 => 97,  224 => 94,  216 => 89,  211 => 86,  209 => 85,  205 => 83,  197 => 78,  192 => 75,  184 => 70,  179 => 67,  176 => 66,  168 => 61,  163 => 58,  155 => 53,  150 => 50,  148 => 49,  139 => 43,  134 => 40,  128 => 39,  122 => 37,  120 => 36,  111 => 34,  102 => 33,  98 => 32,  94 => 31,  88 => 28,  83 => 26,  77 => 23,  73 => 21,  65 => 17,  63 => 16,  58 => 13,  47 => 11,  43 => 10,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-custom-field" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid"> {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_form }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-custom-field" class="form-horizontal">*/
/*                       <fieldset>*/
/*               <legend>{{ text_custom_field }}</legend>*/
/*           */
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label">{{ entry_name }}</label>*/
/*             <div class="col-sm-10"> {% for language in languages %}*/
/*               <div class="input-group"><span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/*                 <input type="text" name="custom_field_description[{{ language.language_id }}][name]" value="{{ custom_field_description[language.language_id] ? custom_field_description[language.language_id].name }}" placeholder="{{ entry_name }}" class="form-control" />*/
/*               </div>*/
/*               {% if error_name[language.language_id] %}*/
/*               <div class="text-danger">{{ error_name[language.language_id] }}</div>*/
/*               {% endif %}*/
/*               {% endfor %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-location">{{ entry_location }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="location" id="input-location" class="form-control">*/
/*                 */
/*                 */
/* */
/*                 {% if location == 'account' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="account" selected="selected">{{ text_account }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="account">{{ text_account }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if location == 'address' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="address" selected="selected">{{ text_address }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="address">{{ text_address }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/* */
/* */
/*                 {% if location == 'affiliate' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="affiliate" selected="selected">{{ text_affiliate }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="affiliate">{{ text_affiliate }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/* */
/* */
/*               */
/*               */
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-type">{{ entry_type }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="type" id="input-type" class="form-control">*/
/*                 <optgroup label="{{ text_choose }}">*/
/*                 {% if type == 'select' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="select" selected="selected">{{ text_select }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="select">{{ text_select }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if type == 'radio' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="radio" selected="selected">{{ text_radio }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="radio">{{ text_radio }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if type == 'checkbox' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="checkbox" selected="selected">{{ text_checkbox }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="checkbox">{{ text_checkbox }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 </optgroup>*/
/*                 <optgroup label="{{ text_input }}">*/
/*                 {% if type == 'text' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="text" selected="selected">{{ text_text }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="text">{{ text_text }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if type == 'textarea' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="textarea" selected="selected">{{ text_textarea }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="textarea">{{ text_textarea }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 </optgroup>*/
/*                 <optgroup label="{{ text_file }}">*/
/*                 {% if type == 'file' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="file" selected="selected">{{ text_file }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="file">{{ text_file }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 </optgroup>*/
/*                 <optgroup label="{{ text_date }}">*/
/*                 {% if type == 'date' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="date" selected="selected">{{ text_date }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="date">{{ text_date }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if type == 'time' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="time" selected="selected">{{ text_time }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="time">{{ text_time }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 {% if type == 'datetime' %}*/
/* */
/*                 */
/*                 */
/*                 <option value="datetime" selected="selected">{{ text_datetime }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="datetime">{{ text_datetime }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/*                 </optgroup>*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group" id="display-value">*/
/*             <label class="col-sm-2 control-label" for="input-value">{{ entry_value }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="value" value="{{ value }}" placeholder="{{ entry_value }}" id="input-value" class="form-control" />*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group" id="display-validation">*/
/*             <label class="col-sm-2 control-label" for="input-validation"><span data-toggle="tooltip" title="{{ help_regex }}">{{ entry_validation }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="validation" id="input-validation" value="{{ validation }}" placeholder="{{ text_regex }}"  class="form-control"/>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label">{{ entry_customer_group }}</label>*/
/*             <div class="col-sm-10">{% set customer_group_row = 0 %}*/
/*               {% for customer_group in customer_groups %}*/
/*               <div class="checkbox">*/
/*                 <label> {% if customer_group.customer_group_id in custom_field_customer_group %}*/
/*                   <input type="checkbox" name="custom_field_customer_group[{{ customer_group_row }}][customer_group_id]" value="{{ customer_group.customer_group_id }}" checked="checked" />*/
/*                   {{ customer_group.name }}*/
/*                   {% else %}*/
/*                   <input type="checkbox" name="custom_field_customer_group[{{ customer_group_row }}][customer_group_id]" value="{{ customer_group.customer_group_id }}" />*/
/*                   {{ customer_group.name }}*/
/*                   {% endif %} </label>*/
/*               </div>*/
/*               {% set customer_group_row = customer_group_row + 1 %}*/
/*               {% endfor %}</div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label">{{ entry_required }}</label>*/
/*             <div class="col-sm-10">{% set customer_group_row = 0 %}*/
/*               {% for customer_group in customer_groups %}*/
/*               <div class="checkbox">*/
/*                 <label> {% if customer_group.customer_group_id in custom_field_required %}*/
/*                   <input type="checkbox" name="custom_field_customer_group[{{ customer_group_row }}][required]" value="{{ customer_group.customer_group_id }}" checked="checked" />*/
/*                   {{ customer_group.name }}*/
/*                   {% else %}*/
/*                   <input type="checkbox" name="custom_field_customer_group[{{ customer_group_row }}][required]" value="{{ customer_group.customer_group_id }}" />*/
/*                   {{ customer_group.name }}*/
/*                   {% endif %}</label>*/
/*               </div>*/
/*               {% set customer_group_row = customer_group_row + 1 %}*/
/*               {% endfor %}</div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-status">{{ entry_status }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="status" id="input-status" class="form-control">*/
/*                 */
/*                 */
/* */
/*                 {% if status %}*/
/* */
/*                 */
/*                 */
/*                 <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                 <option value="0">{{ text_disabled }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% else %}*/
/* */
/*                 */
/*                 */
/*                 <option value="1">{{ text_enabled }}</option>*/
/*                 <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                 */
/*                 */
/* */
/*                 {% endif %}*/
/* */
/*               */
/*               */
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-sort-order"><span data-toggle="tooltip" title="{{ help_sort_order }}">{{ entry_sort_order }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="sort_order" value="{{ sort_order }}" placeholder="{{ entry_sort_order }}" id="input-sort-order" class="form-control" />*/
/*             </div>*/
/*           </div>*/
/*           </fieldset>*/
/*           <br />*/
/*           <div id="custom-field-value">*/
/*             <fieldset>*/
/*               <legend>{{ text_value }}</legend>*/
/*               <table class="table table-striped table-bordered table-hover">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td class="text-left required">{{ entry_custom_value }}</td>*/
/*                     <td class="text-right">{{ entry_sort_order }}</td>*/
/*                     <td></td>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 */
/*                 {% set custom_field_value_row = 0 %}*/
/*                 {% for custom_field_value in custom_field_values %}*/
/*                 <tr id="custom-field-value-row{{ custom_field_value_row }}">*/
/*                   <td class="text-left" style="width: 70%;"><input type="hidden" name="custom_field_value[{{ custom_field_value_row }}][custom_field_value_id]" value="{{ custom_field_value.custom_field_value_id }}" />*/
/*                     {% for language in languages %}*/
/*                     <div class="input-group"> <span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/*                       <input type="text" name="custom_field_value[{{ custom_field_value_row }}][custom_field_value_description][{{ language.language_id }}][name]" value="{{ custom_field_value.custom_field_value_description[language.language_id] ? custom_field_value.custom_field_value_description[language.language_id].name }}" placeholder="{{ entry_custom_value }}" class="form-control" />*/
/*                     </div>*/
/*                     {% if error_custom_field_value[custom_field_value_row][language.language_id] %}*/
/*                     <div class="text-danger">{{ error_custom_field_value[custom_field_value_row][language.language_id] }}</div>*/
/*                     {% endif %}*/
/*                     {% endfor %}</td>*/
/*                   <td class="text-right"><input type="text" name="custom_field_value[{{ custom_field_value_row }}][sort_order]" value="{{ custom_field_value.sort_order }}" placeholder="{{ entry_sort_order }}" class="form-control" /></td>*/
/*                   <td class="text-left"><button onclick="$('#custom-field-value-row{{ custom_field_value_row }}').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>*/
/*                 </tr>*/
/*                 {% set custom_field_value_row = custom_field_value_row + 1 %}*/
/*                 {% endfor %}*/
/*                   </tbody>*/
/*                 */
/*                 <tfoot>*/
/*                   <tr>*/
/*                     <td colspan="2"></td>*/
/*                     <td class="text-left"><button type="button" onclick="addCustomFieldValue();" data-toggle="tooltip" title="{{ button_custom_field_value_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>*/
/*                   </tr>*/
/*                 </tfoot>*/
/*               </table>*/
/*             </fieldset>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/* $('select[name=\'type\']').on('change', function() {*/
/* 	if (this.value == 'select' || this.value == 'radio' || this.value == 'checkbox') {*/
/* 		$('#custom-field-value').show();*/
/* 		$('#display-value, #display-validation').hide();*/
/* 	} else {*/
/* 		$('#custom-field-value').hide();*/
/* 		$('#display-value, #display-validation').show();*/
/* 	}*/
/* */
/* 	if (this.value == 'date') {*/
/* 		$('#display-value > div').html('<div class="input-group date"><input type="text" name="value" value="' + $('#input-value').val() + '" placeholder="{{ entry_value }}" data-date-format="YYYY-MM-DD" id="input-value" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div>');*/
/* 	} else if (this.value == 'time') {*/
/* 		$('#display-value > div').html('<div class="input-group time"><input type="text" name="value" value="' + $('#input-value').val() + '" placeholder="{{ entry_value }}" data-date-format="HH:mm" id="input-value" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div>');*/
/* 	} else if (this.value == 'datetime') {*/
/* 		$('#display-value > div').html('<div class="input-group datetime"><input type="text" name="value" value="' + $('#input-value').val() + '" placeholder="{{ entry_value }}" data-date-format="YYYY-MM-DD HH:mm" id="input-value" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div>');*/
/* 	} else if (this.value == 'textarea') {*/
/* 		$('#display-value > div').html('<textarea name="value" placeholder="{{ entry_value }}" id="input-value" class="form-control">' + $('#input-value').val() + '</textarea>');*/
/* 	} else {*/
/* 		$('#display-value > div').html('<input type="text" name="value" value="' + $('#input-value').val() + '" placeholder="{{ entry_value }}" id="input-value" class="form-control" />');*/
/* 	}*/
/* */
/* 	$('.date').datetimepicker({*/
/* 		language: '{{ datepicker }}',*/
/* 		pickTime: false*/
/* 	});*/
/* */
/* 	$('.time').datetimepicker({*/
/* 		language: '{{ datepicker }}',*/
/* 		pickDate: false*/
/* 	});*/
/* */
/* 	$('.datetime').datetimepicker({*/
/* 		language: '{{ datepicker }}',*/
/* 		pickDate: true,*/
/* 		pickTime: true*/
/* 	});*/
/* });*/
/* */
/* $('select[name=\'type\']').trigger('change');*/
/* */
/* var custom_field_value_row = {{ custom_field_value_row }};*/
/* */
/* function addCustomFieldValue() {*/
/* 	html  = '<tr id="custom-field-value-row' + custom_field_value_row + '">';*/
/*     html += '  <td class="text-left" style="width: 70%;"><input type="hidden" name="custom_field_value[' + custom_field_value_row + '][custom_field_value_id]" value="" />';*/
/* 	{% for language in languages %}*/
/* 	html += '    <div class="input-group">';*/
/* 	html += '      <span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span><input type="text" name="custom_field_value[' + custom_field_value_row + '][custom_field_value_description][{{ language.language_id }}][name]" value="" placeholder="{{ entry_custom_value }}" class="form-control" />';*/
/*     html += '    </div>';*/
/* 	{% endfor %}*/
/* 	html += '  </td>';*/
/* 	html += '  <td class="text-right"><input type="text" name="custom_field_value[' + custom_field_value_row + '][sort_order]" value="" placeholder="{{ entry_sort_order }}" class="form-control" /></td>';*/
/* 	html += '  <td class="text-left"><button type="button" onclick="$(\'#custom-field-value-row' + custom_field_value_row + '\').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';*/
/* 	html += '</tr>';*/
/* */
/* 	$('#custom-field-value tbody').append(html);*/
/* */
/* 	custom_field_value_row++;*/
/* }*/
/* //--></script></div>*/
/* {{ footer }} */
