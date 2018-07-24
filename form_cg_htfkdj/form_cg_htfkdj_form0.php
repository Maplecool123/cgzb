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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htfkdj'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htfkdj'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cg_htfkdj/form_cg_htfkdj_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cg_htfkdj_sajax_js.php");
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

include_once('form_cg_htfkdj_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['recarga'];
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
 include_once("form_cg_htfkdj_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['insert_validation']; ?>">
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
<input type="hidden" name="fjfile_salva" value="<?php  echo $this->form_encode_input($this->fjfile) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cg_htfkdj'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cg_htfkdj'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htfkdj'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htfkdj'] . ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R")
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="fjfile_ul_name" id="id_sc_field_fjfile_ul_name" value="<?php echo $this->form_encode_input($this->fjfile_ul_name);?>">
<input type="hidden" name="fjfile_ul_type" id="id_sc_field_fjfile_ul_type" value="<?php echo $this->form_encode_input($this->fjfile_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['htbh']))
    {
        $this->nm_new_label['htbh'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htbh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $htbh = $this->htbh;
   $sStyleHidden_htbh = '';
   if (isset($this->nmgp_cmp_hidden['htbh']) && $this->nmgp_cmp_hidden['htbh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['htbh']);
       $sStyleHidden_htbh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_htbh = 'display: none;';
   $sStyleReadInp_htbh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['htbh']) && $this->nmgp_cmp_readonly['htbh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['htbh']);
       $sStyleReadLab_htbh = '';
       $sStyleReadInp_htbh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['htbh']) && $this->nmgp_cmp_hidden['htbh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="htbh" value="<?php echo $this->form_encode_input($htbh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_htbh_label" id="hidden_field_label_htbh" style="<?php echo $sStyleHidden_htbh; ?>"><span id="id_label_htbh"><?php echo $this->nm_new_label['htbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_htbh_line" id="hidden_field_data_htbh" style="<?php echo $sStyleHidden_htbh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htbh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htbh"]) &&  $this->nmgp_cmp_readonly["htbh"] == "on") { 

 ?>
<input type="hidden" name="htbh" value="<?php echo $this->form_encode_input($htbh) . "\">" . $htbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_htbh" class="sc-ui-readonly-htbh css_htbh_line" style="<?php echo $sStyleReadLab_htbh; ?>"><?php echo $this->form_encode_input($this->htbh); ?></span><span id="id_read_off_htbh" style="white-space: nowrap;<?php echo $sStyleReadInp_htbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_htbh_obj" style="" id="id_sc_field_htbh" type=text name="htbh" value="<?php echo $this->form_encode_input($htbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php
   $Sc_iframe_master = ($this->Embutida_form) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_cg_htfkdj*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_cg_htgl"]) && $this->Ini->sc_lig_md5["grid_cg_htgl"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,htbh,htbh*scoutnm_evt_ret_busca*scinsc_form_cg_htfkdj_htbh_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_cg_htfkdj@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,htbh,htbh*scoutnm_evt_ret_busca*scinsc_form_cg_htfkdj_htbh_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_cg_htgl_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_cg_htgl_cons_psq. "', '" . $Md5_Lig . "')", "cap_htbh", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htbh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['htmc']))
    {
        $this->nm_new_label['htmc'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htmc'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $htmc = $this->htmc;
   $sStyleHidden_htmc = '';
   if (isset($this->nmgp_cmp_hidden['htmc']) && $this->nmgp_cmp_hidden['htmc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['htmc']);
       $sStyleHidden_htmc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_htmc = 'display: none;';
   $sStyleReadInp_htmc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['htmc']) && $this->nmgp_cmp_readonly['htmc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['htmc']);
       $sStyleReadLab_htmc = '';
       $sStyleReadInp_htmc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['htmc']) && $this->nmgp_cmp_hidden['htmc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="htmc" value="<?php echo $this->form_encode_input($htmc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_htmc_label" id="hidden_field_label_htmc" style="<?php echo $sStyleHidden_htmc; ?>"><span id="id_label_htmc"><?php echo $this->nm_new_label['htmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_htmc_line" id="hidden_field_data_htmc" style="<?php echo $sStyleHidden_htmc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htmc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htmc"]) &&  $this->nmgp_cmp_readonly["htmc"] == "on") { 

 ?>
<input type="hidden" name="htmc" value="<?php echo $this->form_encode_input($htmc) . "\">" . $htmc . ""; ?>
<?php } else { ?>
<span id="id_read_on_htmc" class="sc-ui-readonly-htmc css_htmc_line" style="<?php echo $sStyleReadLab_htmc; ?>"><?php echo $this->form_encode_input($this->htmc); ?></span><span id="id_read_off_htmc" style="white-space: nowrap;<?php echo $sStyleReadInp_htmc; ?>">
 <input class="sc-js-input scFormObjectOdd css_htmc_obj" style="" id="id_sc_field_htmc" type=text name="htmc" value="<?php echo $this->form_encode_input($htmc) ?>"
 size=50 maxlength=64 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htmc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgbbh']))
    {
        $this->nm_new_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbbh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgbbh = $this->cgbbh;
   $sStyleHidden_cgbbh = '';
   if (isset($this->nmgp_cmp_hidden['cgbbh']) && $this->nmgp_cmp_hidden['cgbbh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgbbh']);
       $sStyleHidden_cgbbh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgbbh = 'display: none;';
   $sStyleReadInp_cgbbh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgbbh']) && $this->nmgp_cmp_readonly['cgbbh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgbbh']);
       $sStyleReadLab_cgbbh = '';
       $sStyleReadInp_cgbbh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgbbh']) && $this->nmgp_cmp_hidden['cgbbh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgbbh" value="<?php echo $this->form_encode_input($cgbbh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cgbbh_label" id="hidden_field_label_cgbbh" style="<?php echo $sStyleHidden_cgbbh; ?>"><span id="id_label_cgbbh"><?php echo $this->nm_new_label['cgbbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cgbbh_line" id="hidden_field_data_cgbbh" style="<?php echo $sStyleHidden_cgbbh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgbbh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgbbh"]) &&  $this->nmgp_cmp_readonly["cgbbh"] == "on") { 

 ?>
<input type="hidden" name="cgbbh" value="<?php echo $this->form_encode_input($cgbbh) . "\">" . $cgbbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgbbh" class="sc-ui-readonly-cgbbh css_cgbbh_line" style="<?php echo $sStyleReadLab_cgbbh; ?>"><?php echo $this->form_encode_input($this->cgbbh); ?></span><span id="id_read_off_cgbbh" style="white-space: nowrap;<?php echo $sStyleReadInp_cgbbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgbbh_obj" style="" id="id_sc_field_cgbbh" type=text name="cgbbh" value="<?php echo $this->form_encode_input($cgbbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgbbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgbbh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cgbmc']))
    {
        $this->nm_new_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbmc'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgbmc = $this->cgbmc;
   $sStyleHidden_cgbmc = '';
   if (isset($this->nmgp_cmp_hidden['cgbmc']) && $this->nmgp_cmp_hidden['cgbmc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgbmc']);
       $sStyleHidden_cgbmc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgbmc = 'display: none;';
   $sStyleReadInp_cgbmc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgbmc']) && $this->nmgp_cmp_readonly['cgbmc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgbmc']);
       $sStyleReadLab_cgbmc = '';
       $sStyleReadInp_cgbmc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgbmc']) && $this->nmgp_cmp_hidden['cgbmc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgbmc" value="<?php echo $this->form_encode_input($cgbmc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cgbmc_label" id="hidden_field_label_cgbmc" style="<?php echo $sStyleHidden_cgbmc; ?>"><span id="id_label_cgbmc"><?php echo $this->nm_new_label['cgbmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cgbmc_line" id="hidden_field_data_cgbmc" style="<?php echo $sStyleHidden_cgbmc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgbmc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgbmc"]) &&  $this->nmgp_cmp_readonly["cgbmc"] == "on") { 

 ?>
<input type="hidden" name="cgbmc" value="<?php echo $this->form_encode_input($cgbmc) . "\">" . $cgbmc . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgbmc" class="sc-ui-readonly-cgbmc css_cgbmc_line" style="<?php echo $sStyleReadLab_cgbmc; ?>"><?php echo $this->form_encode_input($this->cgbmc); ?></span><span id="id_read_off_cgbmc" style="white-space: nowrap;<?php echo $sStyleReadInp_cgbmc; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgbmc_obj" style="" id="id_sc_field_cgbmc" type=text name="cgbmc" value="<?php echo $this->form_encode_input($cgbmc) ?>"
 size=50 maxlength=64 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgbmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgbmc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['htje']))
    {
        $this->nm_new_label['htje'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $htje = $this->htje;
   $sStyleHidden_htje = '';
   if (isset($this->nmgp_cmp_hidden['htje']) && $this->nmgp_cmp_hidden['htje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['htje']);
       $sStyleHidden_htje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_htje = 'display: none;';
   $sStyleReadInp_htje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['htje']) && $this->nmgp_cmp_readonly['htje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['htje']);
       $sStyleReadLab_htje = '';
       $sStyleReadInp_htje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['htje']) && $this->nmgp_cmp_hidden['htje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="htje" value="<?php echo $this->form_encode_input($htje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_htje_label" id="hidden_field_label_htje" style="<?php echo $sStyleHidden_htje; ?>"><span id="id_label_htje"><?php echo $this->nm_new_label['htje']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htje'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_htje_line" id="hidden_field_data_htje" style="<?php echo $sStyleHidden_htje; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htje_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htje"]) &&  $this->nmgp_cmp_readonly["htje"] == "on") { 

 ?>
<input type="hidden" name="htje" value="<?php echo $this->form_encode_input($htje) . "\">" . $htje . ""; ?>
<?php } else { ?>
<span id="id_read_on_htje" class="sc-ui-readonly-htje css_htje_line" style="<?php echo $sStyleReadLab_htje; ?>"><?php echo $this->form_encode_input($this->htje); ?></span><span id="id_read_off_htje" style="white-space: nowrap;<?php echo $sStyleReadInp_htje; ?>">
 <input class="sc-js-input scFormObjectOdd css_htje_obj" style="" id="id_sc_field_htje" type=text name="htje" value="<?php echo $this->form_encode_input($htje) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['htje']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['htje']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['htje']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htje_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fkje']))
    {
        $this->nm_new_label['fkje'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fkje = $this->fkje;
   $sStyleHidden_fkje = '';
   if (isset($this->nmgp_cmp_hidden['fkje']) && $this->nmgp_cmp_hidden['fkje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fkje']);
       $sStyleHidden_fkje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fkje = 'display: none;';
   $sStyleReadInp_fkje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fkje']) && $this->nmgp_cmp_readonly['fkje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fkje']);
       $sStyleReadLab_fkje = '';
       $sStyleReadInp_fkje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fkje']) && $this->nmgp_cmp_hidden['fkje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fkje" value="<?php echo $this->form_encode_input($fkje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fkje_label" id="hidden_field_label_fkje" style="<?php echo $sStyleHidden_fkje; ?>"><span id="id_label_fkje"><?php echo $this->nm_new_label['fkje']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkje'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fkje_line" id="hidden_field_data_fkje" style="<?php echo $sStyleHidden_fkje; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fkje_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fkje"]) &&  $this->nmgp_cmp_readonly["fkje"] == "on") { 

 ?>
<input type="hidden" name="fkje" value="<?php echo $this->form_encode_input($fkje) . "\">" . $fkje . ""; ?>
<?php } else { ?>
<span id="id_read_on_fkje" class="sc-ui-readonly-fkje css_fkje_line" style="<?php echo $sStyleReadLab_fkje; ?>"><?php echo $this->form_encode_input($this->fkje); ?></span><span id="id_read_off_fkje" style="white-space: nowrap;<?php echo $sStyleReadInp_fkje; ?>">
 <input class="sc-js-input scFormObjectOdd css_fkje_obj" style="" id="id_sc_field_fkje" type=text name="fkje" value="<?php echo $this->form_encode_input($fkje) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['fkje']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fkje']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fkje']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fkje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fkje_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fkzb']))
    {
        $this->nm_new_label['fkzb'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fkzb = $this->fkzb;
   $sStyleHidden_fkzb = '';
   if (isset($this->nmgp_cmp_hidden['fkzb']) && $this->nmgp_cmp_hidden['fkzb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fkzb']);
       $sStyleHidden_fkzb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fkzb = 'display: none;';
   $sStyleReadInp_fkzb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fkzb']) && $this->nmgp_cmp_readonly['fkzb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fkzb']);
       $sStyleReadLab_fkzb = '';
       $sStyleReadInp_fkzb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fkzb']) && $this->nmgp_cmp_hidden['fkzb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fkzb" value="<?php echo $this->form_encode_input($fkzb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fkzb_label" id="hidden_field_label_fkzb" style="<?php echo $sStyleHidden_fkzb; ?>"><span id="id_label_fkzb"><?php echo $this->nm_new_label['fkzb']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkzb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkzb'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fkzb_line" id="hidden_field_data_fkzb" style="<?php echo $sStyleHidden_fkzb; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fkzb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fkzb"]) &&  $this->nmgp_cmp_readonly["fkzb"] == "on") { 

 ?>
<input type="hidden" name="fkzb" value="<?php echo $this->form_encode_input($fkzb) . "\">" . $fkzb . ""; ?>
<?php } else { ?>
<span id="id_read_on_fkzb" class="sc-ui-readonly-fkzb css_fkzb_line" style="<?php echo $sStyleReadLab_fkzb; ?>"><?php echo $this->form_encode_input($this->fkzb); ?></span><span id="id_read_off_fkzb" style="white-space: nowrap;<?php echo $sStyleReadInp_fkzb; ?>">
 <input class="sc-js-input scFormObjectOdd css_fkzb_obj" style="" id="id_sc_field_fkzb" type=text name="fkzb" value="<?php echo $this->form_encode_input($fkzb) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['fkzb']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fkzb']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fkzb']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="css_fkzb_label">&nbsp;百分比
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fkzb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fkzb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fkjd']))
    {
        $this->nm_new_label['fkjd'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fkjd = $this->fkjd;
   $sStyleHidden_fkjd = '';
   if (isset($this->nmgp_cmp_hidden['fkjd']) && $this->nmgp_cmp_hidden['fkjd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fkjd']);
       $sStyleHidden_fkjd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fkjd = 'display: none;';
   $sStyleReadInp_fkjd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fkjd']) && $this->nmgp_cmp_readonly['fkjd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fkjd']);
       $sStyleReadLab_fkjd = '';
       $sStyleReadInp_fkjd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fkjd']) && $this->nmgp_cmp_hidden['fkjd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fkjd" value="<?php echo $this->form_encode_input($fkjd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fkjd_label" id="hidden_field_label_fkjd" style="<?php echo $sStyleHidden_fkjd; ?>"><span id="id_label_fkjd"><?php echo $this->nm_new_label['fkjd']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkjd']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkjd'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fkjd_line" id="hidden_field_data_fkjd" style="<?php echo $sStyleHidden_fkjd; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fkjd_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fkjd"]) &&  $this->nmgp_cmp_readonly["fkjd"] == "on") { 

 ?>
<input type="hidden" name="fkjd" value="<?php echo $this->form_encode_input($fkjd) . "\">" . $fkjd . ""; ?>
<?php } else { ?>
<span id="id_read_on_fkjd" class="sc-ui-readonly-fkjd css_fkjd_line" style="<?php echo $sStyleReadLab_fkjd; ?>"><?php echo $this->form_encode_input($this->fkjd); ?></span><span id="id_read_off_fkjd" style="white-space: nowrap;<?php echo $sStyleReadInp_fkjd; ?>">
 <input class="sc-js-input scFormObjectOdd css_fkjd_obj" style="" id="id_sc_field_fkjd" type=text name="fkjd" value="<?php echo $this->form_encode_input($fkjd) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['fkjd']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fkjd']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fkjd']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="css_fkjd_label">&nbsp;百分比
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fkjd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fkjd_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fklx']))
   {
       $this->nm_new_label['fklx'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fklx'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fklx = $this->fklx;
   $sStyleHidden_fklx = '';
   if (isset($this->nmgp_cmp_hidden['fklx']) && $this->nmgp_cmp_hidden['fklx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fklx']);
       $sStyleHidden_fklx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fklx = 'display: none;';
   $sStyleReadInp_fklx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fklx']) && $this->nmgp_cmp_readonly['fklx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fklx']);
       $sStyleReadLab_fklx = '';
       $sStyleReadInp_fklx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fklx']) && $this->nmgp_cmp_hidden['fklx'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fklx" value="<?php echo $this->form_encode_input($this->fklx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fklx_label" id="hidden_field_label_fklx" style="<?php echo $sStyleHidden_fklx; ?>"><span id="id_label_fklx"><?php echo $this->nm_new_label['fklx']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fklx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fklx'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fklx_line" id="hidden_field_data_fklx" style="<?php echo $sStyleHidden_fklx; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fklx_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fklx"]) &&  $this->nmgp_cmp_readonly["fklx"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array(); 
    }

   $old_value_htje = $this->htje;
   $old_value_fkje = $this->fkje;
   $old_value_fkzb = $this->fkzb;
   $old_value_fkjd = $this->fkjd;
   $old_value_sjfkrq = $this->sjfkrq;
   $old_value_fkdjrq = $this->fkdjrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_fkje = $this->fkje;
   $unformatted_value_fkzb = $this->fkzb;
   $unformatted_value_fkjd = $this->fkjd;
   $unformatted_value_sjfkrq = $this->sjfkrq;
   $unformatted_value_fkdjrq = $this->fkdjrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_fklx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->fkje = $old_value_fkje;
   $this->fkzb = $old_value_fkzb;
   $this->fkjd = $old_value_fkjd;
   $this->sjfkrq = $old_value_sjfkrq;
   $this->fkdjrq = $old_value_fkdjrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'][] = $rs->fields[0];
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
   $fklx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fklx_1))
          {
              foreach ($this->fklx_1 as $tmp_fklx)
              {
                  if (trim($tmp_fklx) === trim($cadaselect[1])) { $fklx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fklx) === trim($cadaselect[1])) { $fklx_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="fklx" value="<?php echo $this->form_encode_input($fklx) . "\">" . $fklx_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array(); 
    }

   $old_value_htje = $this->htje;
   $old_value_fkje = $this->fkje;
   $old_value_fkzb = $this->fkzb;
   $old_value_fkjd = $this->fkjd;
   $old_value_sjfkrq = $this->sjfkrq;
   $old_value_fkdjrq = $this->fkdjrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_fkje = $this->fkje;
   $unformatted_value_fkzb = $this->fkzb;
   $unformatted_value_fkjd = $this->fkjd;
   $unformatted_value_sjfkrq = $this->sjfkrq;
   $unformatted_value_fkdjrq = $this->fkdjrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_fklx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->fkje = $old_value_fkje;
   $this->fkzb = $old_value_fkzb;
   $this->fkjd = $old_value_fkjd;
   $this->sjfkrq = $old_value_sjfkrq;
   $this->fkdjrq = $old_value_fkdjrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'][] = $rs->fields[0];
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
   $fklx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fklx_1))
          {
              foreach ($this->fklx_1 as $tmp_fklx)
              {
                  if (trim($tmp_fklx) === trim($cadaselect[1])) { $fklx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fklx) === trim($cadaselect[1])) { $fklx_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($fklx_look))
          {
              $fklx_look = $this->fklx;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_fklx\" class=\"css_fklx_line\" style=\"" .  $sStyleReadLab_fklx . "\">" . $this->form_encode_input($fklx_look) . "</span><span id=\"id_read_off_fklx\" style=\"" . $sStyleReadInp_fklx . "\">";
   echo " <span id=\"idAjaxSelect_fklx\"><select class=\"sc-js-input scFormObjectOdd css_fklx_obj\" style=\"\" id=\"id_sc_field_fklx\" name=\"fklx\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->fklx) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->fklx)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fklx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fklx_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['sjfkrq']))
    {
        $this->nm_new_label['sjfkrq'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_sjfkrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sjfkrq = $this->sjfkrq;
   $sStyleHidden_sjfkrq = '';
   if (isset($this->nmgp_cmp_hidden['sjfkrq']) && $this->nmgp_cmp_hidden['sjfkrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sjfkrq']);
       $sStyleHidden_sjfkrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sjfkrq = 'display: none;';
   $sStyleReadInp_sjfkrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sjfkrq']) && $this->nmgp_cmp_readonly['sjfkrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sjfkrq']);
       $sStyleReadLab_sjfkrq = '';
       $sStyleReadInp_sjfkrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sjfkrq']) && $this->nmgp_cmp_hidden['sjfkrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sjfkrq" value="<?php echo $this->form_encode_input($sjfkrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sjfkrq_label" id="hidden_field_label_sjfkrq" style="<?php echo $sStyleHidden_sjfkrq; ?>"><span id="id_label_sjfkrq"><?php echo $this->nm_new_label['sjfkrq']; ?></span></TD>
    <TD class="scFormDataOdd css_sjfkrq_line" id="hidden_field_data_sjfkrq" style="<?php echo $sStyleHidden_sjfkrq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sjfkrq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sjfkrq"]) &&  $this->nmgp_cmp_readonly["sjfkrq"] == "on") { 

 ?>
<input type="hidden" name="sjfkrq" value="<?php echo $this->form_encode_input($sjfkrq) . "\">" . $sjfkrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_sjfkrq" class="sc-ui-readonly-sjfkrq css_sjfkrq_line" style="<?php echo $sStyleReadLab_sjfkrq; ?>"><?php echo $this->form_encode_input($sjfkrq); ?></span><span id="id_read_off_sjfkrq" style="white-space: nowrap;<?php echo $sStyleReadInp_sjfkrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_sjfkrq_obj" style="" id="id_sc_field_sjfkrq" type=text name="sjfkrq" value="<?php echo $this->form_encode_input($sjfkrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['sjfkrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['sjfkrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['sjfkrq']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sjfkrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sjfkrq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fkdjrq']))
    {
        $this->nm_new_label['fkdjrq'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkdjrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fkdjrq = $this->fkdjrq;
   $sStyleHidden_fkdjrq = '';
   if (isset($this->nmgp_cmp_hidden['fkdjrq']) && $this->nmgp_cmp_hidden['fkdjrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fkdjrq']);
       $sStyleHidden_fkdjrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fkdjrq = 'display: none;';
   $sStyleReadInp_fkdjrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fkdjrq']) && $this->nmgp_cmp_readonly['fkdjrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fkdjrq']);
       $sStyleReadLab_fkdjrq = '';
       $sStyleReadInp_fkdjrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fkdjrq']) && $this->nmgp_cmp_hidden['fkdjrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fkdjrq" value="<?php echo $this->form_encode_input($fkdjrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fkdjrq_label" id="hidden_field_label_fkdjrq" style="<?php echo $sStyleHidden_fkdjrq; ?>"><span id="id_label_fkdjrq"><?php echo $this->nm_new_label['fkdjrq']; ?></span></TD>
    <TD class="scFormDataOdd css_fkdjrq_line" id="hidden_field_data_fkdjrq" style="<?php echo $sStyleHidden_fkdjrq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fkdjrq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fkdjrq"]) &&  $this->nmgp_cmp_readonly["fkdjrq"] == "on") { 

 ?>
<input type="hidden" name="fkdjrq" value="<?php echo $this->form_encode_input($fkdjrq) . "\">" . $fkdjrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_fkdjrq" class="sc-ui-readonly-fkdjrq css_fkdjrq_line" style="<?php echo $sStyleReadLab_fkdjrq; ?>"><?php echo $this->form_encode_input($fkdjrq); ?></span><span id="id_read_off_fkdjrq" style="white-space: nowrap;<?php echo $sStyleReadInp_fkdjrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_fkdjrq_obj" style="" id="id_sc_field_fkdjrq" type=text name="fkdjrq" value="<?php echo $this->form_encode_input($fkdjrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fkdjrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fkdjrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['fkdjrq']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fkdjrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fkdjrq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fjfile']))
    {
        $this->nm_new_label['fjfile'] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fjfile = $this->fjfile;
   $sStyleHidden_fjfile = '';
   if (isset($this->nmgp_cmp_hidden['fjfile']) && $this->nmgp_cmp_hidden['fjfile'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fjfile']);
       $sStyleHidden_fjfile = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fjfile = 'display: none;';
   $sStyleReadInp_fjfile = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fjfile']) && $this->nmgp_cmp_readonly['fjfile'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fjfile']);
       $sStyleReadLab_fjfile = '';
       $sStyleReadInp_fjfile = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fjfile']) && $this->nmgp_cmp_hidden['fjfile'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fjfile" value="<?php echo $this->form_encode_input($fjfile) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fjfile_label" id="hidden_field_label_fjfile" style="<?php echo $sStyleHidden_fjfile; ?>"><span id="id_label_fjfile"><?php echo $this->nm_new_label['fjfile']; ?></span></TD>
    <TD class="scFormDataOdd css_fjfile_line" id="hidden_field_data_fjfile" style="<?php echo $sStyleHidden_fjfile; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fjfile_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fjfile"]) &&  $this->nmgp_cmp_readonly["fjfile"] == "on") { 

 ?>
<input type="hidden" name="fjfile" value="<?php echo $this->form_encode_input($fjfile) . "\"><img id=\"fjfile_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_fjfile\"><a href=\"javascript:nm_mostra_doc('0', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fjfile, 3)) . "', 'form_cg_htfkdj')\">" . $fjfile . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_fjfile" class="scFormLinkOdd sc-ui-readonly-fjfile css_fjfile_line" style="<?php echo $sStyleReadLab_fjfile; ?>"><a href="javascript:nm_mostra_doc('0', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fjfile, 3)); ?>', 'form_cg_htfkdj')"><?php echo $this->form_encode_input($this->fjfile); ?></a></span><span id="id_read_off_fjfile" style="white-space: nowrap;<?php echo $sStyleReadInp_fjfile; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-fjfile" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_fjfile_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="fjfile[]" id="id_sc_field_fjfile" ></span></span>
<span id="chk_ajax_img_fjfile"<?php if ($this->nmgp_opcao == "novo" || empty($fjfile)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="fjfile_limpa" value="<?php echo $fjfile_limpa . '" '; if ($fjfile_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="fjfile_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_fjfile"><a href="javascript:nm_mostra_doc('0', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_fjfile, 3)); ?>', 'form_cg_htfkdj')"><?php echo $fjfile ?></a></span><div id="id_sc_dragdrop_fjfile" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
<div id="id_img_loader_fjfile" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_fjfile" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fjfile_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fjfile_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cg_htfkdj");
 parent.scAjaxDetailHeight("form_cg_htfkdj", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cg_htfkdj", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cg_htfkdj", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_modal'])
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
<iframe id="sc-id-download-iframe" name="sc_name_download_iframe" style="display: none"></iframe>
</body> 
</html> 
