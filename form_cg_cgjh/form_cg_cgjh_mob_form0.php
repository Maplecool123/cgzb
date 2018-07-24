<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_cgjh'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_cgjh'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cg_cgjh/form_cg_cgjh_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cg_cgjh_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('form_cg_cgjh_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
  $(".scBtnGrpClick").find("a").click(function(e){
     e.preventDefault();
  });
  $(".scBtnGrpClick").click(function(){
     var aObj = $(this).find("a"), aHref = aObj.attr("href");
     if ("javascript:" == aHref.substr(0, 11)) {
        eval(aHref.substr(11));
     }
     else {
        aObj.trigger("click");
     }
   }).mouseover(function(){
     $(this).css("cursor", "pointer");
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $("#hidden_bloco_0,#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_0": true,
    "hidden_bloco_1": true
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_cg_cgjh_mob_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" enctype="multipart/form-data" 
               action="form_cg_cgjh_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="id" value="<?php  echo $this->form_encode_input($this->id) ?>">
<input type="hidden" name="fa_salva" value="<?php  echo $this->form_encode_input($this->fa) ?>">
<input type="hidden" name="bg_salva" value="<?php  echo $this->form_encode_input($this->bg) ?>">
<input type="hidden" name="ps_salva" value="<?php  echo $this->form_encode_input($this->ps) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cg_cgjh_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cg_cgjh_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_cgjh'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_cgjh'] . ""; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "提交审核", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="fa_ul_name" id="id_sc_field_fa_ul_name" value="<?php echo $this->form_encode_input($this->fa_ul_name);?>">
<input type="hidden" name="fa_ul_type" id="id_sc_field_fa_ul_type" value="<?php echo $this->form_encode_input($this->fa_ul_type);?>">
<input type="hidden" name="bg_ul_name" id="id_sc_field_bg_ul_name" value="<?php echo $this->form_encode_input($this->bg_ul_name);?>">
<input type="hidden" name="bg_ul_type" id="id_sc_field_bg_ul_type" value="<?php echo $this->form_encode_input($this->bg_ul_type);?>">
<input type="hidden" name="ps_ul_name" id="id_sc_field_ps_ul_name" value="<?php echo $this->form_encode_input($this->ps_ul_name);?>">
<input type="hidden" name="ps_ul_type" id="id_sc_field_ps_ul_type" value="<?php echo $this->form_encode_input($this->ps_ul_type);?>">
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>基本数据<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['xmbh']))
    {
        $this->nm_new_label['xmbh'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xmbh = $this->xmbh;
   $sStyleHidden_xmbh = '';
   if (isset($this->nmgp_cmp_hidden['xmbh']) && $this->nmgp_cmp_hidden['xmbh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xmbh']);
       $sStyleHidden_xmbh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xmbh = 'display: none;';
   $sStyleReadInp_xmbh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xmbh']) && $this->nmgp_cmp_readonly['xmbh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xmbh']);
       $sStyleReadLab_xmbh = '';
       $sStyleReadInp_xmbh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xmbh']) && $this->nmgp_cmp_hidden['xmbh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xmbh" value="<?php echo $this->form_encode_input($xmbh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_xmbh_line" id="hidden_field_data_xmbh" style="<?php echo $sStyleHidden_xmbh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xmbh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_xmbh_label"><span id="id_label_xmbh"><?php echo $this->nm_new_label['xmbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xmbh"]) &&  $this->nmgp_cmp_readonly["xmbh"] == "on") { 

 ?>
<input type="hidden" name="xmbh" value="<?php echo $this->form_encode_input($xmbh) . "\">" . $xmbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_xmbh" class="sc-ui-readonly-xmbh css_xmbh_line" style="<?php echo $sStyleReadLab_xmbh; ?>"><?php echo $this->form_encode_input($this->xmbh); ?></span><span id="id_read_off_xmbh" style="white-space: nowrap;<?php echo $sStyleReadInp_xmbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_xmbh_obj" style="" id="id_sc_field_xmbh" type=text name="xmbh" value="<?php echo $this->form_encode_input($xmbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xmbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xmbh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['xmmc']))
    {
        $this->nm_new_label['xmmc'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xmmc = $this->xmmc;
   $sStyleHidden_xmmc = '';
   if (isset($this->nmgp_cmp_hidden['xmmc']) && $this->nmgp_cmp_hidden['xmmc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xmmc']);
       $sStyleHidden_xmmc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xmmc = 'display: none;';
   $sStyleReadInp_xmmc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xmmc']) && $this->nmgp_cmp_readonly['xmmc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xmmc']);
       $sStyleReadLab_xmmc = '';
       $sStyleReadInp_xmmc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xmmc']) && $this->nmgp_cmp_hidden['xmmc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xmmc" value="<?php echo $this->form_encode_input($xmmc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_xmmc_line" id="hidden_field_data_xmmc" style="<?php echo $sStyleHidden_xmmc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xmmc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_xmmc_label"><span id="id_label_xmmc"><?php echo $this->nm_new_label['xmmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xmmc"]) &&  $this->nmgp_cmp_readonly["xmmc"] == "on") { 

 ?>
<input type="hidden" name="xmmc" value="<?php echo $this->form_encode_input($xmmc) . "\">" . $xmmc . ""; ?>
<?php } else { ?>
<span id="id_read_on_xmmc" class="sc-ui-readonly-xmmc css_xmmc_line" style="<?php echo $sStyleReadLab_xmmc; ?>"><?php echo $this->form_encode_input($this->xmmc); ?></span><span id="id_read_off_xmmc" style="white-space: nowrap;<?php echo $sStyleReadInp_xmmc; ?>">
 <input class="sc-js-input scFormObjectOdd css_xmmc_obj" style="" id="id_sc_field_xmmc" type=text name="xmmc" value="<?php echo $this->form_encode_input($xmmc) ?>"
 size=50 maxlength=64 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xmmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xmmc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ysje']))
    {
        $this->nm_new_label['ysje'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ysje = $this->ysje;
   $sStyleHidden_ysje = '';
   if (isset($this->nmgp_cmp_hidden['ysje']) && $this->nmgp_cmp_hidden['ysje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ysje']);
       $sStyleHidden_ysje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ysje = 'display: none;';
   $sStyleReadInp_ysje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ysje']) && $this->nmgp_cmp_readonly['ysje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ysje']);
       $sStyleReadLab_ysje = '';
       $sStyleReadInp_ysje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ysje']) && $this->nmgp_cmp_hidden['ysje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ysje" value="<?php echo $this->form_encode_input($ysje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ysje_line" id="hidden_field_data_ysje" style="<?php echo $sStyleHidden_ysje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ysje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ysje_label"><span id="id_label_ysje"><?php echo $this->nm_new_label['ysje']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['ysje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['ysje'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ysje"]) &&  $this->nmgp_cmp_readonly["ysje"] == "on") { 

 ?>
<input type="hidden" name="ysje" value="<?php echo $this->form_encode_input($ysje) . "\">" . $ysje . ""; ?>
<?php } else { ?>
<span id="id_read_on_ysje" class="sc-ui-readonly-ysje css_ysje_line" style="<?php echo $sStyleReadLab_ysje; ?>"><?php echo $this->form_encode_input($this->ysje); ?></span><span id="id_read_off_ysje" style="white-space: nowrap;<?php echo $sStyleReadInp_ysje; ?>">
 <input class="sc-js-input scFormObjectOdd css_ysje_obj" style="" id="id_sc_field_ysje" type=text name="ysje" value="<?php echo $this->form_encode_input($ysje) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ysje']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ysje']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ysje']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="css_ysje_label">&nbsp;万元
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ysje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ysje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['zjly']))
   {
       $this->nm_new_label['zjly'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_zjly'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zjly = $this->zjly;
   $sStyleHidden_zjly = '';
   if (isset($this->nmgp_cmp_hidden['zjly']) && $this->nmgp_cmp_hidden['zjly'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zjly']);
       $sStyleHidden_zjly = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zjly = 'display: none;';
   $sStyleReadInp_zjly = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zjly']) && $this->nmgp_cmp_readonly['zjly'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zjly']);
       $sStyleReadLab_zjly = '';
       $sStyleReadInp_zjly = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zjly']) && $this->nmgp_cmp_hidden['zjly'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zjly" value="<?php echo $this->form_encode_input($this->zjly) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zjly_line" id="hidden_field_data_zjly" style="<?php echo $sStyleHidden_zjly; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zjly_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zjly_label"><span id="id_label_zjly"><?php echo $this->nm_new_label['zjly']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['zjly']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['zjly'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zjly"]) &&  $this->nmgp_cmp_readonly["zjly"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array(); 
    }

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_zjly 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $zjly_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zjly_1))
          {
              foreach ($this->zjly_1 as $tmp_zjly)
              {
                  if (trim($tmp_zjly) === trim($cadaselect[1])) { $zjly_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zjly) === trim($cadaselect[1])) { $zjly_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="zjly" value="<?php echo $this->form_encode_input($zjly) . "\">" . $zjly_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'] = array(); 
    }

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_zjly 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $zjly_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zjly_1))
          {
              foreach ($this->zjly_1 as $tmp_zjly)
              {
                  if (trim($tmp_zjly) === trim($cadaselect[1])) { $zjly_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zjly) === trim($cadaselect[1])) { $zjly_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($zjly_look))
          {
              $zjly_look = $this->zjly;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_zjly\" class=\"css_zjly_line\" style=\"" .  $sStyleReadLab_zjly . "\">" . $this->form_encode_input($zjly_look) . "</span><span id=\"id_read_off_zjly\" style=\"" . $sStyleReadInp_zjly . "\">";
   echo " <span id=\"idAjaxSelect_zjly\"><select class=\"sc-js-input scFormObjectOdd css_zjly_obj\" style=\"\" id=\"id_sc_field_zjly\" name=\"zjly\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_zjly'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->zjly) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->zjly)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zjly_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zjly_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['xmfzr']))
    {
        $this->nm_new_label['xmfzr'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmfzr'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xmfzr = $this->xmfzr;
   $sStyleHidden_xmfzr = '';
   if (isset($this->nmgp_cmp_hidden['xmfzr']) && $this->nmgp_cmp_hidden['xmfzr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xmfzr']);
       $sStyleHidden_xmfzr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xmfzr = 'display: none;';
   $sStyleReadInp_xmfzr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xmfzr']) && $this->nmgp_cmp_readonly['xmfzr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xmfzr']);
       $sStyleReadLab_xmfzr = '';
       $sStyleReadInp_xmfzr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xmfzr']) && $this->nmgp_cmp_hidden['xmfzr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xmfzr" value="<?php echo $this->form_encode_input($xmfzr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_xmfzr_line" id="hidden_field_data_xmfzr" style="<?php echo $sStyleHidden_xmfzr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xmfzr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_xmfzr_label"><span id="id_label_xmfzr"><?php echo $this->nm_new_label['xmfzr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmfzr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['xmfzr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xmfzr"]) &&  $this->nmgp_cmp_readonly["xmfzr"] == "on") { 

 ?>
<input type="hidden" name="xmfzr" value="<?php echo $this->form_encode_input($xmfzr) . "\">" . $xmfzr . ""; ?>
<?php } else { ?>
<span id="id_read_on_xmfzr" class="sc-ui-readonly-xmfzr css_xmfzr_line" style="<?php echo $sStyleReadLab_xmfzr; ?>"><?php echo $this->form_encode_input($this->xmfzr); ?></span><span id="id_read_off_xmfzr" style="white-space: nowrap;<?php echo $sStyleReadInp_xmfzr; ?>">
 <input class="sc-js-input scFormObjectOdd css_xmfzr_obj" style="" id="id_sc_field_xmfzr" type=text name="xmfzr" value="<?php echo $this->form_encode_input($xmfzr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xmfzr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xmfzr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sbbm']))
   {
       $this->nm_new_label['sbbm'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbbm'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sbbm = $this->sbbm;
   $sStyleHidden_sbbm = '';
   if (isset($this->nmgp_cmp_hidden['sbbm']) && $this->nmgp_cmp_hidden['sbbm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sbbm']);
       $sStyleHidden_sbbm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sbbm = 'display: none;';
   $sStyleReadInp_sbbm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sbbm']) && $this->nmgp_cmp_readonly['sbbm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sbbm']);
       $sStyleReadLab_sbbm = '';
       $sStyleReadInp_sbbm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sbbm']) && $this->nmgp_cmp_hidden['sbbm'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sbbm" value="<?php echo $this->form_encode_input($this->sbbm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sbbm_line" id="hidden_field_data_sbbm" style="<?php echo $sStyleHidden_sbbm; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sbbm_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sbbm_label"><span id="id_label_sbbm"><?php echo $this->nm_new_label['sbbm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbbm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbbm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sbbm"]) &&  $this->nmgp_cmp_readonly["sbbm"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array(); 
    }

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bm 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $sbbm_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sbbm_1))
          {
              foreach ($this->sbbm_1 as $tmp_sbbm)
              {
                  if (trim($tmp_sbbm) === trim($cadaselect[1])) { $sbbm_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sbbm) === trim($cadaselect[1])) { $sbbm_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sbbm" value="<?php echo $this->form_encode_input($sbbm) . "\">" . $sbbm_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'] = array(); 
    }

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bm 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $sbbm_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sbbm_1))
          {
              foreach ($this->sbbm_1 as $tmp_sbbm)
              {
                  if (trim($tmp_sbbm) === trim($cadaselect[1])) { $sbbm_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sbbm) === trim($cadaselect[1])) { $sbbm_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sbbm_look))
          {
              $sbbm_look = $this->sbbm;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sbbm\" class=\"css_sbbm_line\" style=\"" .  $sStyleReadLab_sbbm . "\">" . $this->form_encode_input($sbbm_look) . "</span><span id=\"id_read_off_sbbm\" style=\"" . $sStyleReadInp_sbbm . "\">";
   echo " <span id=\"idAjaxSelect_sbbm\"><select class=\"sc-js-input scFormObjectOdd css_sbbm_obj\" style=\"\" id=\"id_sc_field_sbbm\" name=\"sbbm\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['Lookup_sbbm'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sbbm) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sbbm)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sbbm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sbbm_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sbrq']))
    {
        $this->nm_new_label['sbrq'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sbrq = $this->sbrq;
   $sStyleHidden_sbrq = '';
   if (isset($this->nmgp_cmp_hidden['sbrq']) && $this->nmgp_cmp_hidden['sbrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sbrq']);
       $sStyleHidden_sbrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sbrq = 'display: none;';
   $sStyleReadInp_sbrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sbrq']) && $this->nmgp_cmp_readonly['sbrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sbrq']);
       $sStyleReadLab_sbrq = '';
       $sStyleReadInp_sbrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sbrq']) && $this->nmgp_cmp_hidden['sbrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sbrq" value="<?php echo $this->form_encode_input($sbrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sbrq_line" id="hidden_field_data_sbrq" style="<?php echo $sStyleHidden_sbrq; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sbrq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sbrq_label"><span id="id_label_sbrq"><?php echo $this->nm_new_label['sbrq']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbrq'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sbrq"]) &&  $this->nmgp_cmp_readonly["sbrq"] == "on") { 

 ?>
<input type="hidden" name="sbrq" value="<?php echo $this->form_encode_input($sbrq) . "\">" . $sbrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_sbrq" class="sc-ui-readonly-sbrq css_sbrq_line" style="<?php echo $sStyleReadLab_sbrq; ?>"><?php echo $this->form_encode_input($sbrq); ?></span><span id="id_read_off_sbrq" style="white-space: nowrap;<?php echo $sStyleReadInp_sbrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_sbrq_obj" style="" id="id_sc_field_sbrq" type=text name="sbrq" value="<?php echo $this->form_encode_input($sbrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['sbrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['sbrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['sbrq']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sbrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sbrq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sbr']))
    {
        $this->nm_new_label['sbr'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbr'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sbr = $this->sbr;
   $sStyleHidden_sbr = '';
   if (isset($this->nmgp_cmp_hidden['sbr']) && $this->nmgp_cmp_hidden['sbr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sbr']);
       $sStyleHidden_sbr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sbr = 'display: none;';
   $sStyleReadInp_sbr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sbr']) && $this->nmgp_cmp_readonly['sbr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sbr']);
       $sStyleReadLab_sbr = '';
       $sStyleReadInp_sbr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sbr']) && $this->nmgp_cmp_hidden['sbr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sbr" value="<?php echo $this->form_encode_input($sbr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sbr_line" id="hidden_field_data_sbr" style="<?php echo $sStyleHidden_sbr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sbr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sbr_label"><span id="id_label_sbr"><?php echo $this->nm_new_label['sbr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['php_cmp_required']['sbr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sbr"]) &&  $this->nmgp_cmp_readonly["sbr"] == "on") { 

 ?>
<input type="hidden" name="sbr" value="<?php echo $this->form_encode_input($sbr) . "\">" . $sbr . ""; ?>
<?php } else { ?>
<span id="id_read_on_sbr" class="sc-ui-readonly-sbr css_sbr_line" style="<?php echo $sStyleReadLab_sbr; ?>"><?php echo $this->form_encode_input($this->sbr); ?></span><span id="id_read_off_sbr" style="white-space: nowrap;<?php echo $sStyleReadInp_sbr; ?>">
 <input class="sc-js-input scFormObjectOdd css_sbr_obj" style="" id="id_sc_field_sbr" type=text name="sbr" value="<?php echo $this->form_encode_input($sbr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sbr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sbr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qwcgrq']))
    {
        $this->nm_new_label['qwcgrq'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_qwcgrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qwcgrq = $this->qwcgrq;
   $sStyleHidden_qwcgrq = '';
   if (isset($this->nmgp_cmp_hidden['qwcgrq']) && $this->nmgp_cmp_hidden['qwcgrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qwcgrq']);
       $sStyleHidden_qwcgrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qwcgrq = 'display: none;';
   $sStyleReadInp_qwcgrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qwcgrq']) && $this->nmgp_cmp_readonly['qwcgrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qwcgrq']);
       $sStyleReadLab_qwcgrq = '';
       $sStyleReadInp_qwcgrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qwcgrq']) && $this->nmgp_cmp_hidden['qwcgrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qwcgrq" value="<?php echo $this->form_encode_input($qwcgrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qwcgrq_line" id="hidden_field_data_qwcgrq" style="<?php echo $sStyleHidden_qwcgrq; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qwcgrq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_qwcgrq_label"><span id="id_label_qwcgrq"><?php echo $this->nm_new_label['qwcgrq']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qwcgrq"]) &&  $this->nmgp_cmp_readonly["qwcgrq"] == "on") { 

 ?>
<input type="hidden" name="qwcgrq" value="<?php echo $this->form_encode_input($qwcgrq) . "\">" . $qwcgrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_qwcgrq" class="sc-ui-readonly-qwcgrq css_qwcgrq_line" style="<?php echo $sStyleReadLab_qwcgrq; ?>"><?php echo $this->form_encode_input($qwcgrq); ?></span><span id="id_read_off_qwcgrq" style="white-space: nowrap;<?php echo $sStyleReadInp_qwcgrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_qwcgrq_obj" style="" id="id_sc_field_qwcgrq" type=text name="qwcgrq" value="<?php echo $this->form_encode_input($qwcgrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['qwcgrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['qwcgrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['qwcgrq']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qwcgrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qwcgrq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lxr']))
    {
        $this->nm_new_label['lxr'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxr'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lxr = $this->lxr;
   $sStyleHidden_lxr = '';
   if (isset($this->nmgp_cmp_hidden['lxr']) && $this->nmgp_cmp_hidden['lxr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lxr']);
       $sStyleHidden_lxr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lxr = 'display: none;';
   $sStyleReadInp_lxr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lxr']) && $this->nmgp_cmp_readonly['lxr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lxr']);
       $sStyleReadLab_lxr = '';
       $sStyleReadInp_lxr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lxr']) && $this->nmgp_cmp_hidden['lxr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lxr" value="<?php echo $this->form_encode_input($lxr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lxr_line" id="hidden_field_data_lxr" style="<?php echo $sStyleHidden_lxr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lxr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lxr_label"><span id="id_label_lxr"><?php echo $this->nm_new_label['lxr']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lxr"]) &&  $this->nmgp_cmp_readonly["lxr"] == "on") { 

 ?>
<input type="hidden" name="lxr" value="<?php echo $this->form_encode_input($lxr) . "\">" . $lxr . ""; ?>
<?php } else { ?>
<span id="id_read_on_lxr" class="sc-ui-readonly-lxr css_lxr_line" style="<?php echo $sStyleReadLab_lxr; ?>"><?php echo $this->form_encode_input($this->lxr); ?></span><span id="id_read_off_lxr" style="white-space: nowrap;<?php echo $sStyleReadInp_lxr; ?>">
 <input class="sc-js-input scFormObjectOdd css_lxr_obj" style="" id="id_sc_field_lxr" type=text name="lxr" value="<?php echo $this->form_encode_input($lxr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lxr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lxr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lxdh']))
    {
        $this->nm_new_label['lxdh'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxdh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lxdh = $this->lxdh;
   $sStyleHidden_lxdh = '';
   if (isset($this->nmgp_cmp_hidden['lxdh']) && $this->nmgp_cmp_hidden['lxdh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lxdh']);
       $sStyleHidden_lxdh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lxdh = 'display: none;';
   $sStyleReadInp_lxdh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lxdh']) && $this->nmgp_cmp_readonly['lxdh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lxdh']);
       $sStyleReadLab_lxdh = '';
       $sStyleReadInp_lxdh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lxdh']) && $this->nmgp_cmp_hidden['lxdh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lxdh" value="<?php echo $this->form_encode_input($lxdh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lxdh_line" id="hidden_field_data_lxdh" style="<?php echo $sStyleHidden_lxdh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lxdh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lxdh_label"><span id="id_label_lxdh"><?php echo $this->nm_new_label['lxdh']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lxdh"]) &&  $this->nmgp_cmp_readonly["lxdh"] == "on") { 

 ?>
<input type="hidden" name="lxdh" value="<?php echo $this->form_encode_input($lxdh) . "\">" . $lxdh . ""; ?>
<?php } else { ?>
<span id="id_read_on_lxdh" class="sc-ui-readonly-lxdh css_lxdh_line" style="<?php echo $sStyleReadLab_lxdh; ?>"><?php echo $this->form_encode_input($this->lxdh); ?></span><span id="id_read_off_lxdh" style="white-space: nowrap;<?php echo $sStyleReadInp_lxdh; ?>">
 <input class="sc-js-input scFormObjectOdd css_lxdh_obj" style="" id="id_sc_field_lxdh" type=text name="lxdh" value="<?php echo $this->form_encode_input($lxdh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lxdh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lxdh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_email'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_encode_input($this->email); ?></span><span id="id_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=32 maxlength=32 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bz']))
    {
        $this->nm_new_label['bz'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bz'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bz = $this->bz;
   $sStyleHidden_bz = '';
   if (isset($this->nmgp_cmp_hidden['bz']) && $this->nmgp_cmp_hidden['bz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bz']);
       $sStyleHidden_bz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bz = 'display: none;';
   $sStyleReadInp_bz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bz']) && $this->nmgp_cmp_readonly['bz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bz']);
       $sStyleReadLab_bz = '';
       $sStyleReadInp_bz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bz']) && $this->nmgp_cmp_hidden['bz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bz" value="<?php echo $this->form_encode_input($bz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bz_line" id="hidden_field_data_bz" style="<?php echo $sStyleHidden_bz; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bz_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bz_label"><span id="id_label_bz"><?php echo $this->nm_new_label['bz']; ?></span></span><br>
<?php
$bz_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($bz));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bz"]) &&  $this->nmgp_cmp_readonly["bz"] == "on") { 

 ?>
<input type="hidden" name="bz" value="<?php echo $this->form_encode_input($bz) . "\">" . $bz_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_bz" class="sc-ui-readonly-bz css_bz_line" style="<?php echo $sStyleReadLab_bz; ?>"><?php echo $this->form_encode_input($bz_val); ?></span><span id="id_read_off_bz" style="white-space: nowrap;<?php echo $sStyleReadInp_bz; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_bz_obj" style="white-space: pre-wrap;" name="bz" id="id_sc_field_bz" rows="3" cols="36"
 alt="{datatype: 'text', maxLength: 128, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $bz; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bz_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_bz_dumb = ('' == $sStyleHidden_bz) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_bz_dumb" style="<?php echo $sStyleHidden_bz_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>附件信息<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fa']))
    {
        $this->nm_new_label['fa'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_fa'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fa = $this->fa;
   $sStyleHidden_fa = '';
   if (isset($this->nmgp_cmp_hidden['fa']) && $this->nmgp_cmp_hidden['fa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fa']);
       $sStyleHidden_fa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fa = 'display: none;';
   $sStyleReadInp_fa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fa']) && $this->nmgp_cmp_readonly['fa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fa']);
       $sStyleReadLab_fa = '';
       $sStyleReadInp_fa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fa']) && $this->nmgp_cmp_hidden['fa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fa" value="<?php echo $this->form_encode_input($fa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fa_line" id="hidden_field_data_fa" style="<?php echo $sStyleHidden_fa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fa_label"><span id="id_label_fa"><?php echo $this->nm_new_label['fa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fa"]) &&  $this->nmgp_cmp_readonly["fa"] == "on") { 

 ?>
<input type="hidden" name="fa" value="<?php echo $this->form_encode_input($fa) . "\"><img id=\"fa_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_fa\"><a href=\"javascript:nm_mostra_doc('0', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fa, 3)) . "', 'form_cg_cgjh')\">" . $fa . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_fa" class="scFormLinkOdd sc-ui-readonly-fa css_fa_line" style="<?php echo $sStyleReadLab_fa; ?>"><a href="javascript:nm_mostra_doc('0', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fa, 3)); ?>', 'form_cg_cgjh')"><?php echo $this->form_encode_input($this->fa); ?></a></span><span id="id_read_off_fa" style="white-space: nowrap;<?php echo $sStyleReadInp_fa; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-fa" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_fa_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="fa[]" id="id_sc_field_fa" ></span></span>
<span id="chk_ajax_img_fa"<?php if ($this->nmgp_opcao == "novo" || empty($fa)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="fa_limpa" value="<?php echo $fa_limpa . '" '; if ($fa_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="fa_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_fa"><a href="javascript:nm_mostra_doc('0', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fa, 3)); ?>', 'form_cg_cgjh')"><?php echo $fa ?></a></span><div id="id_sc_dragdrop_fa" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
<div id="id_img_loader_fa" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_fa" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bg']))
    {
        $this->nm_new_label['bg'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bg'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bg = $this->bg;
   $sStyleHidden_bg = '';
   if (isset($this->nmgp_cmp_hidden['bg']) && $this->nmgp_cmp_hidden['bg'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bg']);
       $sStyleHidden_bg = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bg = 'display: none;';
   $sStyleReadInp_bg = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bg']) && $this->nmgp_cmp_readonly['bg'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bg']);
       $sStyleReadLab_bg = '';
       $sStyleReadInp_bg = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bg']) && $this->nmgp_cmp_hidden['bg'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bg" value="<?php echo $this->form_encode_input($bg) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bg_line" id="hidden_field_data_bg" style="<?php echo $sStyleHidden_bg; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bg_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bg_label"><span id="id_label_bg"><?php echo $this->nm_new_label['bg']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bg"]) &&  $this->nmgp_cmp_readonly["bg"] == "on") { 

 ?>
<input type="hidden" name="bg" value="<?php echo $this->form_encode_input($bg) . "\"><img id=\"bg_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_bg\"><a href=\"javascript:nm_mostra_doc('1', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_bg, 3)) . "', 'form_cg_cgjh')\">" . $bg . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_bg" class="scFormLinkOdd sc-ui-readonly-bg css_bg_line" style="<?php echo $sStyleReadLab_bg; ?>"><a href="javascript:nm_mostra_doc('1', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_bg, 3)); ?>', 'form_cg_cgjh')"><?php echo $this->form_encode_input($this->bg); ?></a></span><span id="id_read_off_bg" style="white-space: nowrap;<?php echo $sStyleReadInp_bg; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-bg" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_bg_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="bg[]" id="id_sc_field_bg" ></span></span>
<span id="chk_ajax_img_bg"<?php if ($this->nmgp_opcao == "novo" || empty($bg)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="bg_limpa" value="<?php echo $bg_limpa . '" '; if ($bg_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="bg_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_bg"><a href="javascript:nm_mostra_doc('1', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_bg, 3)); ?>', 'form_cg_cgjh')"><?php echo $bg ?></a></span><div id="id_sc_dragdrop_bg" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
<div id="id_img_loader_bg" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_bg" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bg_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bg_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ps']))
    {
        $this->nm_new_label['ps'] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ps'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ps = $this->ps;
   $sStyleHidden_ps = '';
   if (isset($this->nmgp_cmp_hidden['ps']) && $this->nmgp_cmp_hidden['ps'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ps']);
       $sStyleHidden_ps = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ps = 'display: none;';
   $sStyleReadInp_ps = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ps']) && $this->nmgp_cmp_readonly['ps'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ps']);
       $sStyleReadLab_ps = '';
       $sStyleReadInp_ps = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ps']) && $this->nmgp_cmp_hidden['ps'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ps" value="<?php echo $this->form_encode_input($ps) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ps_line" id="hidden_field_data_ps" style="<?php echo $sStyleHidden_ps; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ps_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ps_label"><span id="id_label_ps"><?php echo $this->nm_new_label['ps']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ps"]) &&  $this->nmgp_cmp_readonly["ps"] == "on") { 

 ?>
<input type="hidden" name="ps" value="<?php echo $this->form_encode_input($ps) . "\"><img id=\"ps_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_ps\"><a href=\"javascript:nm_mostra_doc('2', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_ps, 3)) . "', 'form_cg_cgjh')\">" . $ps . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_ps" class="scFormLinkOdd sc-ui-readonly-ps css_ps_line" style="<?php echo $sStyleReadLab_ps; ?>"><a href="javascript:nm_mostra_doc('2', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_ps, 3)); ?>', 'form_cg_cgjh')"><?php echo $this->form_encode_input($this->ps); ?></a></span><span id="id_read_off_ps" style="white-space: nowrap;<?php echo $sStyleReadInp_ps; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-ps" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_ps_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="ps[]" id="id_sc_field_ps" ></span></span>
<span id="chk_ajax_img_ps"<?php if ($this->nmgp_opcao == "novo" || empty($ps)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="ps_limpa" value="<?php echo $ps_limpa . '" '; if ($ps_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="ps_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_ps"><a href="javascript:nm_mostra_doc('2', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_ps, 3)); ?>', 'form_cg_cgjh')"><?php echo $ps ?></a></span><div id="id_sc_dragdrop_ps" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
<div id="id_img_loader_ps" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_ps" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ps_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ps_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['masterValue']);
?>
}
<?php
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cg_cgjh_mob");
 parent.scAjaxDetailHeight("form_cg_cgjh_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cg_cgjh_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cg_cgjh_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh_mob']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<iframe id="sc-id-download-iframe" name="sc_name_download_iframe" style="display: none"></iframe>
</body> 
</html> 
