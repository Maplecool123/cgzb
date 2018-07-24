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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_company'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_company'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cg_company_reg/form_cg_company_reg_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cg_company_reg_sajax_js.php");
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
<?php

include_once('form_cg_company_reg_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
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
 include_once("form_cg_company_reg_js0.php");
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
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['insert_validation']; ?>">
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
<input type="hidden" name="yyzzfile_salva" value="<?php  echo $this->form_encode_input($this->yyzzfile) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cg_company_reg'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cg_company_reg'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_company'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_company'] . ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "提交保存", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="yyzzfile_ul_name" id="id_sc_field_yyzzfile_ul_name" value="<?php echo $this->form_encode_input($this->yyzzfile_ul_name);?>">
<input type="hidden" name="yyzzfile_ul_type" id="id_sc_field_yyzzfile_ul_type" value="<?php echo $this->form_encode_input($this->yyzzfile_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['gsmc']))
    {
        $this->nm_new_label['gsmc'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gsmc = $this->gsmc;
   $sStyleHidden_gsmc = '';
   if (isset($this->nmgp_cmp_hidden['gsmc']) && $this->nmgp_cmp_hidden['gsmc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gsmc']);
       $sStyleHidden_gsmc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gsmc = 'display: none;';
   $sStyleReadInp_gsmc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gsmc']) && $this->nmgp_cmp_readonly['gsmc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gsmc']);
       $sStyleReadLab_gsmc = '';
       $sStyleReadInp_gsmc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gsmc']) && $this->nmgp_cmp_hidden['gsmc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="gsmc" value="<?php echo $this->form_encode_input($gsmc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_gsmc_label" id="hidden_field_label_gsmc" style="<?php echo $sStyleHidden_gsmc; ?>"><span id="id_label_gsmc"><?php echo $this->nm_new_label['gsmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_gsmc_line" id="hidden_field_data_gsmc" style="<?php echo $sStyleHidden_gsmc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gsmc_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="gsmc" value="<?php echo $this->form_encode_input($gsmc); ?>"><span id="id_ajax_label_gsmc"><?php echo nl2br($gsmc); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gsmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gsmc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['gsjc']))
    {
        $this->nm_new_label['gsjc'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsjc'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gsjc = $this->gsjc;
   $sStyleHidden_gsjc = '';
   if (isset($this->nmgp_cmp_hidden['gsjc']) && $this->nmgp_cmp_hidden['gsjc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gsjc']);
       $sStyleHidden_gsjc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gsjc = 'display: none;';
   $sStyleReadInp_gsjc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gsjc']) && $this->nmgp_cmp_readonly['gsjc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gsjc']);
       $sStyleReadLab_gsjc = '';
       $sStyleReadInp_gsjc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gsjc']) && $this->nmgp_cmp_hidden['gsjc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="gsjc" value="<?php echo $this->form_encode_input($gsjc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_gsjc_label" id="hidden_field_label_gsjc" style="<?php echo $sStyleHidden_gsjc; ?>"><span id="id_label_gsjc"><?php echo $this->nm_new_label['gsjc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsjc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsjc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_gsjc_line" id="hidden_field_data_gsjc" style="<?php echo $sStyleHidden_gsjc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gsjc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gsjc"]) &&  $this->nmgp_cmp_readonly["gsjc"] == "on") { 

 ?>
<input type="hidden" name="gsjc" value="<?php echo $this->form_encode_input($gsjc) . "\">" . $gsjc . ""; ?>
<?php } else { ?>
<span id="id_read_on_gsjc" class="sc-ui-readonly-gsjc css_gsjc_line" style="<?php echo $sStyleReadLab_gsjc; ?>"><?php echo $this->form_encode_input($this->gsjc); ?></span><span id="id_read_off_gsjc" style="white-space: nowrap;<?php echo $sStyleReadInp_gsjc; ?>">
 <input class="sc-js-input scFormObjectOdd css_gsjc_obj" style="" id="id_sc_field_gsjc" type=text name="gsjc" value="<?php echo $this->form_encode_input($gsjc) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gsjc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gsjc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tyshxydm']))
    {
        $this->nm_new_label['tyshxydm'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_tyshxydm'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tyshxydm = $this->tyshxydm;
   $sStyleHidden_tyshxydm = '';
   if (isset($this->nmgp_cmp_hidden['tyshxydm']) && $this->nmgp_cmp_hidden['tyshxydm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tyshxydm']);
       $sStyleHidden_tyshxydm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tyshxydm = 'display: none;';
   $sStyleReadInp_tyshxydm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tyshxydm']) && $this->nmgp_cmp_readonly['tyshxydm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tyshxydm']);
       $sStyleReadLab_tyshxydm = '';
       $sStyleReadInp_tyshxydm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tyshxydm']) && $this->nmgp_cmp_hidden['tyshxydm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tyshxydm" value="<?php echo $this->form_encode_input($tyshxydm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tyshxydm_label" id="hidden_field_label_tyshxydm" style="<?php echo $sStyleHidden_tyshxydm; ?>"><span id="id_label_tyshxydm"><?php echo $this->nm_new_label['tyshxydm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['tyshxydm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['tyshxydm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tyshxydm_line" id="hidden_field_data_tyshxydm" style="<?php echo $sStyleHidden_tyshxydm; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tyshxydm_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tyshxydm"]) &&  $this->nmgp_cmp_readonly["tyshxydm"] == "on") { 

 ?>
<input type="hidden" name="tyshxydm" value="<?php echo $this->form_encode_input($tyshxydm) . "\">" . $tyshxydm . ""; ?>
<?php } else { ?>
<span id="id_read_on_tyshxydm" class="sc-ui-readonly-tyshxydm css_tyshxydm_line" style="<?php echo $sStyleReadLab_tyshxydm; ?>"><?php echo $this->form_encode_input($this->tyshxydm); ?></span><span id="id_read_off_tyshxydm" style="white-space: nowrap;<?php echo $sStyleReadInp_tyshxydm; ?>">
 <input class="sc-js-input scFormObjectOdd css_tyshxydm_obj" style="" id="id_sc_field_tyshxydm" type=text name="tyshxydm" value="<?php echo $this->form_encode_input($tyshxydm) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tyshxydm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tyshxydm_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['qylx']))
   {
       $this->nm_new_label['qylx'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_qylx'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qylx = $this->qylx;
   $sStyleHidden_qylx = '';
   if (isset($this->nmgp_cmp_hidden['qylx']) && $this->nmgp_cmp_hidden['qylx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qylx']);
       $sStyleHidden_qylx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qylx = 'display: none;';
   $sStyleReadInp_qylx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qylx']) && $this->nmgp_cmp_readonly['qylx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qylx']);
       $sStyleReadLab_qylx = '';
       $sStyleReadInp_qylx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qylx']) && $this->nmgp_cmp_hidden['qylx'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="qylx" value="<?php echo $this->form_encode_input($this->qylx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qylx_label" id="hidden_field_label_qylx" style="<?php echo $sStyleHidden_qylx; ?>"><span id="id_label_qylx"><?php echo $this->nm_new_label['qylx']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['qylx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['qylx'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_qylx_line" id="hidden_field_data_qylx" style="<?php echo $sStyleHidden_qylx; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qylx_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qylx"]) &&  $this->nmgp_cmp_readonly["qylx"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array(); 
    }

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_qylx 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'][] = $rs->fields[0];
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
   $qylx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->qylx_1))
          {
              foreach ($this->qylx_1 as $tmp_qylx)
              {
                  if (trim($tmp_qylx) === trim($cadaselect[1])) { $qylx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->qylx) === trim($cadaselect[1])) { $qylx_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="qylx" value="<?php echo $this->form_encode_input($qylx) . "\">" . $qylx_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'] = array(); 
    }

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_qylx 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'][] = $rs->fields[0];
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
   $qylx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->qylx_1))
          {
              foreach ($this->qylx_1 as $tmp_qylx)
              {
                  if (trim($tmp_qylx) === trim($cadaselect[1])) { $qylx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->qylx) === trim($cadaselect[1])) { $qylx_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($qylx_look))
          {
              $qylx_look = $this->qylx;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_qylx\" class=\"css_qylx_line\" style=\"" .  $sStyleReadLab_qylx . "\">" . $this->form_encode_input($qylx_look) . "</span><span id=\"id_read_off_qylx\" style=\"" . $sStyleReadInp_qylx . "\">";
   echo " <span id=\"idAjaxSelect_qylx\"><select class=\"sc-js-input scFormObjectOdd css_qylx_obj\" style=\"\" id=\"id_sc_field_qylx\" name=\"qylx\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_qylx'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->qylx) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->qylx)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qylx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qylx_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['gsdz']))
    {
        $this->nm_new_label['gsdz'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsdz'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gsdz = $this->gsdz;
   $sStyleHidden_gsdz = '';
   if (isset($this->nmgp_cmp_hidden['gsdz']) && $this->nmgp_cmp_hidden['gsdz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gsdz']);
       $sStyleHidden_gsdz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gsdz = 'display: none;';
   $sStyleReadInp_gsdz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gsdz']) && $this->nmgp_cmp_readonly['gsdz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gsdz']);
       $sStyleReadLab_gsdz = '';
       $sStyleReadInp_gsdz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gsdz']) && $this->nmgp_cmp_hidden['gsdz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="gsdz" value="<?php echo $this->form_encode_input($gsdz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_gsdz_label" id="hidden_field_label_gsdz" style="<?php echo $sStyleHidden_gsdz; ?>"><span id="id_label_gsdz"><?php echo $this->nm_new_label['gsdz']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsdz']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['gsdz'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_gsdz_line" id="hidden_field_data_gsdz" style="<?php echo $sStyleHidden_gsdz; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gsdz_line" style="vertical-align: top;padding: 0px">
<?php
$gsdz_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($gsdz));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gsdz"]) &&  $this->nmgp_cmp_readonly["gsdz"] == "on") { 

 ?>
<input type="hidden" name="gsdz" value="<?php echo $this->form_encode_input($gsdz) . "\">" . $gsdz_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_gsdz" class="sc-ui-readonly-gsdz css_gsdz_line" style="<?php echo $sStyleReadLab_gsdz; ?>"><?php echo $this->form_encode_input($gsdz_val); ?></span><span id="id_read_off_gsdz" style="white-space: nowrap;<?php echo $sStyleReadInp_gsdz; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_gsdz_obj" style="white-space: pre-wrap;" name="gsdz" id="id_sc_field_gsdz" rows="2" cols="36"
 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $gsdz; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gsdz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gsdz_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fddbr']))
    {
        $this->nm_new_label['fddbr'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_fddbr'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fddbr = $this->fddbr;
   $sStyleHidden_fddbr = '';
   if (isset($this->nmgp_cmp_hidden['fddbr']) && $this->nmgp_cmp_hidden['fddbr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fddbr']);
       $sStyleHidden_fddbr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fddbr = 'display: none;';
   $sStyleReadInp_fddbr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fddbr']) && $this->nmgp_cmp_readonly['fddbr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fddbr']);
       $sStyleReadLab_fddbr = '';
       $sStyleReadInp_fddbr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fddbr']) && $this->nmgp_cmp_hidden['fddbr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fddbr" value="<?php echo $this->form_encode_input($fddbr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fddbr_label" id="hidden_field_label_fddbr" style="<?php echo $sStyleHidden_fddbr; ?>"><span id="id_label_fddbr"><?php echo $this->nm_new_label['fddbr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['fddbr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['fddbr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fddbr_line" id="hidden_field_data_fddbr" style="<?php echo $sStyleHidden_fddbr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fddbr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fddbr"]) &&  $this->nmgp_cmp_readonly["fddbr"] == "on") { 

 ?>
<input type="hidden" name="fddbr" value="<?php echo $this->form_encode_input($fddbr) . "\">" . $fddbr . ""; ?>
<?php } else { ?>
<span id="id_read_on_fddbr" class="sc-ui-readonly-fddbr css_fddbr_line" style="<?php echo $sStyleReadLab_fddbr; ?>"><?php echo $this->form_encode_input($this->fddbr); ?></span><span id="id_read_off_fddbr" style="white-space: nowrap;<?php echo $sStyleReadInp_fddbr; ?>">
 <input class="sc-js-input scFormObjectOdd css_fddbr_obj" style="" id="id_sc_field_fddbr" type=text name="fddbr" value="<?php echo $this->form_encode_input($fddbr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fddbr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fddbr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zczb']))
    {
        $this->nm_new_label['zczb'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zczb = $this->zczb;
   $sStyleHidden_zczb = '';
   if (isset($this->nmgp_cmp_hidden['zczb']) && $this->nmgp_cmp_hidden['zczb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zczb']);
       $sStyleHidden_zczb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zczb = 'display: none;';
   $sStyleReadInp_zczb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zczb']) && $this->nmgp_cmp_readonly['zczb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zczb']);
       $sStyleReadLab_zczb = '';
       $sStyleReadInp_zczb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zczb']) && $this->nmgp_cmp_hidden['zczb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zczb" value="<?php echo $this->form_encode_input($zczb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_zczb_label" id="hidden_field_label_zczb" style="<?php echo $sStyleHidden_zczb; ?>"><span id="id_label_zczb"><?php echo $this->nm_new_label['zczb']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['zczb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['zczb'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_zczb_line" id="hidden_field_data_zczb" style="<?php echo $sStyleHidden_zczb; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zczb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zczb"]) &&  $this->nmgp_cmp_readonly["zczb"] == "on") { 

 ?>
<input type="hidden" name="zczb" value="<?php echo $this->form_encode_input($zczb) . "\">" . $zczb . ""; ?>
<?php } else { ?>
<span id="id_read_on_zczb" class="sc-ui-readonly-zczb css_zczb_line" style="<?php echo $sStyleReadLab_zczb; ?>"><?php echo $this->form_encode_input($this->zczb); ?></span><span id="id_read_off_zczb" style="white-space: nowrap;<?php echo $sStyleReadInp_zczb; ?>">
 <input class="sc-js-input scFormObjectOdd css_zczb_obj" style="" id="id_sc_field_zczb" type=text name="zczb" value="<?php echo $this->form_encode_input($zczb) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['zczb']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['zczb']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['zczb']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zczb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zczb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['clrq']))
    {
        $this->nm_new_label['clrq'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_clrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clrq = $this->clrq;
   $sStyleHidden_clrq = '';
   if (isset($this->nmgp_cmp_hidden['clrq']) && $this->nmgp_cmp_hidden['clrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clrq']);
       $sStyleHidden_clrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clrq = 'display: none;';
   $sStyleReadInp_clrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clrq']) && $this->nmgp_cmp_readonly['clrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clrq']);
       $sStyleReadLab_clrq = '';
       $sStyleReadInp_clrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clrq']) && $this->nmgp_cmp_hidden['clrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clrq" value="<?php echo $this->form_encode_input($clrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_clrq_label" id="hidden_field_label_clrq" style="<?php echo $sStyleHidden_clrq; ?>"><span id="id_label_clrq"><?php echo $this->nm_new_label['clrq']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['clrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['clrq'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_clrq_line" id="hidden_field_data_clrq" style="<?php echo $sStyleHidden_clrq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clrq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clrq"]) &&  $this->nmgp_cmp_readonly["clrq"] == "on") { 

 ?>
<input type="hidden" name="clrq" value="<?php echo $this->form_encode_input($clrq) . "\">" . $clrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_clrq" class="sc-ui-readonly-clrq css_clrq_line" style="<?php echo $sStyleReadLab_clrq; ?>"><?php echo $this->form_encode_input($clrq); ?></span><span id="id_read_off_clrq" style="white-space: nowrap;<?php echo $sStyleReadInp_clrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_clrq_obj" style="" id="id_sc_field_clrq" type=text name="clrq" value="<?php echo $this->form_encode_input($clrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['clrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['clrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['clrq']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clrq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jyfw']))
    {
        $this->nm_new_label['jyfw'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_jyfw'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jyfw = $this->jyfw;
   $sStyleHidden_jyfw = '';
   if (isset($this->nmgp_cmp_hidden['jyfw']) && $this->nmgp_cmp_hidden['jyfw'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jyfw']);
       $sStyleHidden_jyfw = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jyfw = 'display: none;';
   $sStyleReadInp_jyfw = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jyfw']) && $this->nmgp_cmp_readonly['jyfw'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jyfw']);
       $sStyleReadLab_jyfw = '';
       $sStyleReadInp_jyfw = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jyfw']) && $this->nmgp_cmp_hidden['jyfw'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jyfw" value="<?php echo $this->form_encode_input($jyfw) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jyfw_label" id="hidden_field_label_jyfw" style="<?php echo $sStyleHidden_jyfw; ?>"><span id="id_label_jyfw"><?php echo $this->nm_new_label['jyfw']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['jyfw']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['jyfw'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_jyfw_line" id="hidden_field_data_jyfw" style="<?php echo $sStyleHidden_jyfw; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jyfw_line" style="vertical-align: top;padding: 0px">
<?php
$jyfw_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($jyfw));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jyfw"]) &&  $this->nmgp_cmp_readonly["jyfw"] == "on") { 

 ?>
<input type="hidden" name="jyfw" value="<?php echo $this->form_encode_input($jyfw) . "\">" . $jyfw_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_jyfw" class="sc-ui-readonly-jyfw css_jyfw_line" style="<?php echo $sStyleReadLab_jyfw; ?>"><?php echo $this->form_encode_input($jyfw_val); ?></span><span id="id_read_off_jyfw" style="white-space: nowrap;<?php echo $sStyleReadInp_jyfw; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_jyfw_obj" style="white-space: pre-wrap;" name="jyfw" id="id_sc_field_jyfw" rows="2" cols="36"
 alt="{datatype: 'text', maxLength: 128, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $jyfw; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jyfw_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jyfw_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['khyh']))
   {
       $this->nm_new_label['khyh'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_khyh'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $khyh = $this->khyh;
   $sStyleHidden_khyh = '';
   if (isset($this->nmgp_cmp_hidden['khyh']) && $this->nmgp_cmp_hidden['khyh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['khyh']);
       $sStyleHidden_khyh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_khyh = 'display: none;';
   $sStyleReadInp_khyh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['khyh']) && $this->nmgp_cmp_readonly['khyh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['khyh']);
       $sStyleReadLab_khyh = '';
       $sStyleReadInp_khyh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['khyh']) && $this->nmgp_cmp_hidden['khyh'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="khyh" value="<?php echo $this->form_encode_input($this->khyh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_khyh_label" id="hidden_field_label_khyh" style="<?php echo $sStyleHidden_khyh; ?>"><span id="id_label_khyh"><?php echo $this->nm_new_label['khyh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['khyh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['khyh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_khyh_line" id="hidden_field_data_khyh" style="<?php echo $sStyleHidden_khyh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_khyh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["khyh"]) &&  $this->nmgp_cmp_readonly["khyh"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array(); 
    }

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bank 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'][] = $rs->fields[0];
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
   $khyh_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->khyh_1))
          {
              foreach ($this->khyh_1 as $tmp_khyh)
              {
                  if (trim($tmp_khyh) === trim($cadaselect[1])) { $khyh_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->khyh) === trim($cadaselect[1])) { $khyh_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="khyh" value="<?php echo $this->form_encode_input($khyh) . "\">" . $khyh_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'] = array(); 
    }

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bank 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'][] = $rs->fields[0];
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
   $khyh_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->khyh_1))
          {
              foreach ($this->khyh_1 as $tmp_khyh)
              {
                  if (trim($tmp_khyh) === trim($cadaselect[1])) { $khyh_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->khyh) === trim($cadaselect[1])) { $khyh_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($khyh_look))
          {
              $khyh_look = $this->khyh;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_khyh\" class=\"css_khyh_line\" style=\"" .  $sStyleReadLab_khyh . "\">" . $this->form_encode_input($khyh_look) . "</span><span id=\"id_read_off_khyh\" style=\"" . $sStyleReadInp_khyh . "\">";
   echo " <span id=\"idAjaxSelect_khyh\"><select class=\"sc-js-input scFormObjectOdd css_khyh_obj\" style=\"\" id=\"id_sc_field_khyh\" name=\"khyh\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['Lookup_khyh'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->khyh) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->khyh)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_khyh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_khyh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['yhdz']))
    {
        $this->nm_new_label['yhdz'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhdz'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $yhdz = $this->yhdz;
   $sStyleHidden_yhdz = '';
   if (isset($this->nmgp_cmp_hidden['yhdz']) && $this->nmgp_cmp_hidden['yhdz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['yhdz']);
       $sStyleHidden_yhdz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_yhdz = 'display: none;';
   $sStyleReadInp_yhdz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['yhdz']) && $this->nmgp_cmp_readonly['yhdz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['yhdz']);
       $sStyleReadLab_yhdz = '';
       $sStyleReadInp_yhdz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['yhdz']) && $this->nmgp_cmp_hidden['yhdz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="yhdz" value="<?php echo $this->form_encode_input($yhdz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_yhdz_label" id="hidden_field_label_yhdz" style="<?php echo $sStyleHidden_yhdz; ?>"><span id="id_label_yhdz"><?php echo $this->nm_new_label['yhdz']; ?></span></TD>
    <TD class="scFormDataOdd css_yhdz_line" id="hidden_field_data_yhdz" style="<?php echo $sStyleHidden_yhdz; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_yhdz_line" style="vertical-align: top;padding: 0px">
<?php
$yhdz_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($yhdz));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["yhdz"]) &&  $this->nmgp_cmp_readonly["yhdz"] == "on") { 

 ?>
<input type="hidden" name="yhdz" value="<?php echo $this->form_encode_input($yhdz) . "\">" . $yhdz_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_yhdz" class="sc-ui-readonly-yhdz css_yhdz_line" style="<?php echo $sStyleReadLab_yhdz; ?>"><?php echo $this->form_encode_input($yhdz_val); ?></span><span id="id_read_off_yhdz" style="white-space: nowrap;<?php echo $sStyleReadInp_yhdz; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_yhdz_obj" style="white-space: pre-wrap;" name="yhdz" id="id_sc_field_yhdz" rows="2" cols="36"
 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $yhdz; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_yhdz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_yhdz_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['yhzh']))
    {
        $this->nm_new_label['yhzh'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $yhzh = $this->yhzh;
   $sStyleHidden_yhzh = '';
   if (isset($this->nmgp_cmp_hidden['yhzh']) && $this->nmgp_cmp_hidden['yhzh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['yhzh']);
       $sStyleHidden_yhzh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_yhzh = 'display: none;';
   $sStyleReadInp_yhzh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['yhzh']) && $this->nmgp_cmp_readonly['yhzh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['yhzh']);
       $sStyleReadLab_yhzh = '';
       $sStyleReadInp_yhzh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['yhzh']) && $this->nmgp_cmp_hidden['yhzh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="yhzh" value="<?php echo $this->form_encode_input($yhzh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_yhzh_label" id="hidden_field_label_yhzh" style="<?php echo $sStyleHidden_yhzh; ?>"><span id="id_label_yhzh"><?php echo $this->nm_new_label['yhzh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['yhzh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['yhzh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_yhzh_line" id="hidden_field_data_yhzh" style="<?php echo $sStyleHidden_yhzh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_yhzh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["yhzh"]) &&  $this->nmgp_cmp_readonly["yhzh"] == "on") { 

 ?>
<input type="hidden" name="yhzh" value="<?php echo $this->form_encode_input($yhzh) . "\">" . $yhzh . ""; ?>
<?php } else { ?>
<span id="id_read_on_yhzh" class="sc-ui-readonly-yhzh css_yhzh_line" style="<?php echo $sStyleReadLab_yhzh; ?>"><?php echo $this->form_encode_input($this->yhzh); ?></span><span id="id_read_off_yhzh" style="white-space: nowrap;<?php echo $sStyleReadInp_yhzh; ?>">
 <input class="sc-js-input scFormObjectOdd css_yhzh_obj" style="" id="id_sc_field_yhzh" type=text name="yhzh" value="<?php echo $this->form_encode_input($yhzh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_yhzh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_yhzh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lxr']))
    {
        $this->nm_new_label['lxr'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxr'] . "";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lxr_label" id="hidden_field_label_lxr" style="<?php echo $sStyleHidden_lxr; ?>"><span id="id_label_lxr"><?php echo $this->nm_new_label['lxr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['lxr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['lxr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_lxr_line" id="hidden_field_data_lxr" style="<?php echo $sStyleHidden_lxr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lxr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lxr"]) &&  $this->nmgp_cmp_readonly["lxr"] == "on") { 

 ?>
<input type="hidden" name="lxr" value="<?php echo $this->form_encode_input($lxr) . "\">" . $lxr . ""; ?>
<?php } else { ?>
<span id="id_read_on_lxr" class="sc-ui-readonly-lxr css_lxr_line" style="<?php echo $sStyleReadLab_lxr; ?>"><?php echo $this->form_encode_input($this->lxr); ?></span><span id="id_read_off_lxr" style="white-space: nowrap;<?php echo $sStyleReadInp_lxr; ?>">
 <input class="sc-js-input scFormObjectOdd css_lxr_obj" style="" id="id_sc_field_lxr" type=text name="lxr" value="<?php echo $this->form_encode_input($lxr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lxr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lxr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['lxrdh']))
    {
        $this->nm_new_label['lxrdh'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxrdh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lxrdh = $this->lxrdh;
   $sStyleHidden_lxrdh = '';
   if (isset($this->nmgp_cmp_hidden['lxrdh']) && $this->nmgp_cmp_hidden['lxrdh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lxrdh']);
       $sStyleHidden_lxrdh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lxrdh = 'display: none;';
   $sStyleReadInp_lxrdh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lxrdh']) && $this->nmgp_cmp_readonly['lxrdh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lxrdh']);
       $sStyleReadLab_lxrdh = '';
       $sStyleReadInp_lxrdh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lxrdh']) && $this->nmgp_cmp_hidden['lxrdh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lxrdh" value="<?php echo $this->form_encode_input($lxrdh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lxrdh_label" id="hidden_field_label_lxrdh" style="<?php echo $sStyleHidden_lxrdh; ?>"><span id="id_label_lxrdh"><?php echo $this->nm_new_label['lxrdh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['lxrdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['lxrdh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_lxrdh_line" id="hidden_field_data_lxrdh" style="<?php echo $sStyleHidden_lxrdh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lxrdh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lxrdh"]) &&  $this->nmgp_cmp_readonly["lxrdh"] == "on") { 

 ?>
<input type="hidden" name="lxrdh" value="<?php echo $this->form_encode_input($lxrdh) . "\">" . $lxrdh . ""; ?>
<?php } else { ?>
<span id="id_read_on_lxrdh" class="sc-ui-readonly-lxrdh css_lxrdh_line" style="<?php echo $sStyleReadLab_lxrdh; ?>"><?php echo $this->form_encode_input($this->lxrdh); ?></span><span id="id_read_off_lxrdh" style="white-space: nowrap;<?php echo $sStyleReadInp_lxrdh; ?>">
 <input class="sc-js-input scFormObjectOdd css_lxrdh_obj" style="" id="id_sc_field_lxrdh" type=text name="lxrdh" value="<?php echo $this->form_encode_input($lxrdh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lxrdh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lxrdh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fax']))
    {
        $this->nm_new_label['fax'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_fax'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fax = $this->fax;
   $sStyleHidden_fax = '';
   if (isset($this->nmgp_cmp_hidden['fax']) && $this->nmgp_cmp_hidden['fax'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fax']);
       $sStyleHidden_fax = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fax = 'display: none;';
   $sStyleReadInp_fax = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fax']) && $this->nmgp_cmp_readonly['fax'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fax']);
       $sStyleReadLab_fax = '';
       $sStyleReadInp_fax = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fax']) && $this->nmgp_cmp_hidden['fax'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fax" value="<?php echo $this->form_encode_input($fax) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fax_label" id="hidden_field_label_fax" style="<?php echo $sStyleHidden_fax; ?>"><span id="id_label_fax"><?php echo $this->nm_new_label['fax']; ?></span></TD>
    <TD class="scFormDataOdd css_fax_line" id="hidden_field_data_fax" style="<?php echo $sStyleHidden_fax; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fax_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fax"]) &&  $this->nmgp_cmp_readonly["fax"] == "on") { 

 ?>
<input type="hidden" name="fax" value="<?php echo $this->form_encode_input($fax) . "\">" . $fax . ""; ?>
<?php } else { ?>
<span id="id_read_on_fax" class="sc-ui-readonly-fax css_fax_line" style="<?php echo $sStyleReadLab_fax; ?>"><?php echo $this->form_encode_input($this->fax); ?></span><span id="id_read_off_fax" style="white-space: nowrap;<?php echo $sStyleReadInp_fax; ?>">
 <input class="sc-js-input scFormObjectOdd css_fax_obj" style="" id="id_sc_field_fax" type=text name="fax" value="<?php echo $this->form_encode_input($fax) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fax_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fax_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['bgdh']))
    {
        $this->nm_new_label['bgdh'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_bgdh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bgdh = $this->bgdh;
   $sStyleHidden_bgdh = '';
   if (isset($this->nmgp_cmp_hidden['bgdh']) && $this->nmgp_cmp_hidden['bgdh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bgdh']);
       $sStyleHidden_bgdh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bgdh = 'display: none;';
   $sStyleReadInp_bgdh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bgdh']) && $this->nmgp_cmp_readonly['bgdh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bgdh']);
       $sStyleReadLab_bgdh = '';
       $sStyleReadInp_bgdh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bgdh']) && $this->nmgp_cmp_hidden['bgdh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bgdh" value="<?php echo $this->form_encode_input($bgdh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bgdh_label" id="hidden_field_label_bgdh" style="<?php echo $sStyleHidden_bgdh; ?>"><span id="id_label_bgdh"><?php echo $this->nm_new_label['bgdh']; ?></span></TD>
    <TD class="scFormDataOdd css_bgdh_line" id="hidden_field_data_bgdh" style="<?php echo $sStyleHidden_bgdh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bgdh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bgdh"]) &&  $this->nmgp_cmp_readonly["bgdh"] == "on") { 

 ?>
<input type="hidden" name="bgdh" value="<?php echo $this->form_encode_input($bgdh) . "\">" . $bgdh . ""; ?>
<?php } else { ?>
<span id="id_read_on_bgdh" class="sc-ui-readonly-bgdh css_bgdh_line" style="<?php echo $sStyleReadLab_bgdh; ?>"><?php echo $this->form_encode_input($this->bgdh); ?></span><span id="id_read_off_bgdh" style="white-space: nowrap;<?php echo $sStyleReadInp_bgdh; ?>">
 <input class="sc-js-input scFormObjectOdd css_bgdh_obj" style="" id="id_sc_field_bgdh" type=text name="bgdh" value="<?php echo $this->form_encode_input($bgdh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bgdh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bgdh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_email'] . "";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_email_label" id="hidden_field_label_email" style="<?php echo $sStyleHidden_email; ?>"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['php_cmp_required']['email'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_encode_input($this->email); ?></span><span id="id_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=32 maxlength=32 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['bz']))
    {
        $this->nm_new_label['bz'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_bz'] . "";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bz_label" id="hidden_field_label_bz" style="<?php echo $sStyleHidden_bz; ?>"><span id="id_label_bz"><?php echo $this->nm_new_label['bz']; ?></span></TD>
    <TD class="scFormDataOdd css_bz_line" id="hidden_field_data_bz" style="<?php echo $sStyleHidden_bz; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bz_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bz"]) &&  $this->nmgp_cmp_readonly["bz"] == "on") { 

 ?>
<input type="hidden" name="bz" value="<?php echo $this->form_encode_input($bz) . "\">" . $bz . ""; ?>
<?php } else { ?>
<span id="id_read_on_bz" class="sc-ui-readonly-bz css_bz_line" style="<?php echo $sStyleReadLab_bz; ?>"><?php echo $this->form_encode_input($this->bz); ?></span><span id="id_read_off_bz" style="white-space: nowrap;<?php echo $sStyleReadInp_bz; ?>">
 <input class="sc-js-input scFormObjectOdd css_bz_obj" style="" id="id_sc_field_bz" type=text name="bz" value="<?php echo $this->form_encode_input($bz) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bz_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['yyzzfile']))
    {
        $this->nm_new_label['yyzzfile'] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $yyzzfile = $this->yyzzfile;
   $sStyleHidden_yyzzfile = '';
   if (isset($this->nmgp_cmp_hidden['yyzzfile']) && $this->nmgp_cmp_hidden['yyzzfile'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['yyzzfile']);
       $sStyleHidden_yyzzfile = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_yyzzfile = 'display: none;';
   $sStyleReadInp_yyzzfile = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['yyzzfile']) && $this->nmgp_cmp_readonly['yyzzfile'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['yyzzfile']);
       $sStyleReadLab_yyzzfile = '';
       $sStyleReadInp_yyzzfile = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['yyzzfile']) && $this->nmgp_cmp_hidden['yyzzfile'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="yyzzfile" value="<?php echo $this->form_encode_input($yyzzfile) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_yyzzfile_label" id="hidden_field_label_yyzzfile" style="<?php echo $sStyleHidden_yyzzfile; ?>"><span id="id_label_yyzzfile"><?php echo $this->nm_new_label['yyzzfile']; ?></span></TD>
    <TD class="scFormDataOdd css_yyzzfile_line" id="hidden_field_data_yyzzfile" style="<?php echo $sStyleHidden_yyzzfile; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_yyzzfile_line" style="vertical-align: top;padding: 0px">
 <script>var var_ajax_img_yyzzfile = '<?php echo $out_yyzzfile; ?>';</script><?php if (!empty($out_yyzzfile)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_yyzzfile, '" . $this->nmgp_return_img['yyzzfile'][0] . "', '" . $this->nmgp_return_img['yyzzfile'][1] . "')\"><img id=\"id_ajax_img_yyzzfile\" border=\"0\" src=\"$out_yyzzfile\"></a> &nbsp;" . "<span id=\"txt_ajax_img_yyzzfile\">" . $yyzzfile . "</span>"; if (!empty($yyzzfile)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_yyzzfile\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_yyzzfile\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["yyzzfile"]) &&  $this->nmgp_cmp_readonly["yyzzfile"] == "on") { 

 ?>
<img id=\"yyzzfile_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="yyzzfile" value="<?php echo $this->form_encode_input($yyzzfile) . "\">" . $yyzzfile . ""; ?>
<?php } else { ?>
<span id="id_read_off_yyzzfile" style="white-space: nowrap;<?php echo $sStyleReadInp_yyzzfile; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-yyzzfile" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_yyzzfile_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="yyzzfile[]" id="id_sc_field_yyzzfile" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_yyzzfile"<?php if ($this->nmgp_opcao == "novo" || empty($yyzzfile)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="yyzzfile_limpa" value="<?php echo $yyzzfile_limpa . '" '; if ($yyzzfile_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="yyzzfile_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_yyzzfile" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_yyzzfile" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_yyzzfile" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<span class="scFormPopupBubble" style="vertical-align: top; display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">营业执照扫描件，格式jpg;png</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">营业执照扫描件，格式jpg;png</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_yyzzfile_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_yyzzfile_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
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
  $nm_sc_blocos_da_pag = array(0);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cg_company_reg");
 parent.scAjaxDetailHeight("form_cg_company_reg", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cg_company_reg", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cg_company_reg", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['sc_modal'])
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
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
