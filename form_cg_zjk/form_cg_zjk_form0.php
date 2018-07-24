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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_zjk'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_zjk'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cg_zjk/form_cg_zjk_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cg_zjk_sajax_js.php");
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

include_once('form_cg_zjk_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['recarga'];
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
 include_once("form_cg_zjk_js0.php");
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
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['insert_validation']; ?>">
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
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cg_zjk'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cg_zjk'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_zjk'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_zjk'] . ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R")
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zjbh']))
    {
        $this->nm_new_label['zjbh'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_zjbh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zjbh = $this->zjbh;
   $sStyleHidden_zjbh = '';
   if (isset($this->nmgp_cmp_hidden['zjbh']) && $this->nmgp_cmp_hidden['zjbh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zjbh']);
       $sStyleHidden_zjbh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zjbh = 'display: none;';
   $sStyleReadInp_zjbh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zjbh']) && $this->nmgp_cmp_readonly['zjbh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zjbh']);
       $sStyleReadLab_zjbh = '';
       $sStyleReadInp_zjbh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zjbh']) && $this->nmgp_cmp_hidden['zjbh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zjbh" value="<?php echo $this->form_encode_input($zjbh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_zjbh_label" id="hidden_field_label_zjbh" style="<?php echo $sStyleHidden_zjbh; ?>"><span id="id_label_zjbh"><?php echo $this->nm_new_label['zjbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['zjbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['zjbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_zjbh_line" id="hidden_field_data_zjbh" style="<?php echo $sStyleHidden_zjbh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zjbh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zjbh"]) &&  $this->nmgp_cmp_readonly["zjbh"] == "on") { 

 ?>
<input type="hidden" name="zjbh" value="<?php echo $this->form_encode_input($zjbh) . "\">" . $zjbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_zjbh" class="sc-ui-readonly-zjbh css_zjbh_line" style="<?php echo $sStyleReadLab_zjbh; ?>"><?php echo $this->form_encode_input($this->zjbh); ?></span><span id="id_read_off_zjbh" style="white-space: nowrap;<?php echo $sStyleReadInp_zjbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_zjbh_obj" style="" id="id_sc_field_zjbh" type=text name="zjbh" value="<?php echo $this->form_encode_input($zjbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zjbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zjbh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['xm']))
    {
        $this->nm_new_label['xm'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_xm'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xm = $this->xm;
   $sStyleHidden_xm = '';
   if (isset($this->nmgp_cmp_hidden['xm']) && $this->nmgp_cmp_hidden['xm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xm']);
       $sStyleHidden_xm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xm = 'display: none;';
   $sStyleReadInp_xm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xm']) && $this->nmgp_cmp_readonly['xm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xm']);
       $sStyleReadLab_xm = '';
       $sStyleReadInp_xm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xm']) && $this->nmgp_cmp_hidden['xm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xm" value="<?php echo $this->form_encode_input($xm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_xm_label" id="hidden_field_label_xm" style="<?php echo $sStyleHidden_xm; ?>"><span id="id_label_xm"><?php echo $this->nm_new_label['xm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['xm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['xm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_xm_line" id="hidden_field_data_xm" style="<?php echo $sStyleHidden_xm; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xm_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xm"]) &&  $this->nmgp_cmp_readonly["xm"] == "on") { 

 ?>
<input type="hidden" name="xm" value="<?php echo $this->form_encode_input($xm) . "\">" . $xm . ""; ?>
<?php } else { ?>
<span id="id_read_on_xm" class="sc-ui-readonly-xm css_xm_line" style="<?php echo $sStyleReadLab_xm; ?>"><?php echo $this->form_encode_input($this->xm); ?></span><span id="id_read_off_xm" style="white-space: nowrap;<?php echo $sStyleReadInp_xm; ?>">
 <input class="sc-js-input scFormObjectOdd css_xm_obj" style="" id="id_sc_field_xm" type=text name="xm" value="<?php echo $this->form_encode_input($xm) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xm_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['xb']))
    {
        $this->nm_new_label['xb'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_xb'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xb = $this->xb;
   $sStyleHidden_xb = '';
   if (isset($this->nmgp_cmp_hidden['xb']) && $this->nmgp_cmp_hidden['xb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xb']);
       $sStyleHidden_xb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xb = 'display: none;';
   $sStyleReadInp_xb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xb']) && $this->nmgp_cmp_readonly['xb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xb']);
       $sStyleReadLab_xb = '';
       $sStyleReadInp_xb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xb']) && $this->nmgp_cmp_hidden['xb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xb" value="<?php echo $this->form_encode_input($xb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_xb_label" id="hidden_field_label_xb" style="<?php echo $sStyleHidden_xb; ?>"><span id="id_label_xb"><?php echo $this->nm_new_label['xb']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['xb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['xb'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_xb_line" id="hidden_field_data_xb" style="<?php echo $sStyleHidden_xb; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xb"]) &&  $this->nmgp_cmp_readonly["xb"] == "on") { 

 if ("男" == $this->xb) { $xb_look = "男";} 
 if ("女" == $this->xb) { $xb_look = "女";} 
?>
<input type="hidden" name="xb" value="<?php echo $this->form_encode_input($xb) . "\">" . $xb_look . ""; ?>
<?php } else { ?>

<?php

 if ("男" == $this->xb) { $xb_look = "男";} 
 if ("女" == $this->xb) { $xb_look = "女";} 
?>
<span id="id_read_on_xb"  class="css_xb_line" style="<?php echo $sStyleReadLab_xb; ?>"><?php echo $this->form_encode_input($xb_look); ?></span><span id="id_read_off_xb" style="<?php echo $sStyleReadInp_xb; ?>"><div id="idAjaxRadio_xb" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_xb_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="xb" value="男"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_xb'][] = '男'; ?>
<?php  if ("男" == $this->xb)  { echo " checked" ;} ?>  onClick="" >男</TD>
  <TD class="scFormDataFontOdd css_xb_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="xb" value="女"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_xb'][] = '女'; ?>
<?php  if ("女" == $this->xb)  { echo " checked" ;} ?>  onClick="" >女</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['sfzh']))
    {
        $this->nm_new_label['sfzh'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_sfzh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sfzh = $this->sfzh;
   $sStyleHidden_sfzh = '';
   if (isset($this->nmgp_cmp_hidden['sfzh']) && $this->nmgp_cmp_hidden['sfzh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sfzh']);
       $sStyleHidden_sfzh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sfzh = 'display: none;';
   $sStyleReadInp_sfzh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sfzh']) && $this->nmgp_cmp_readonly['sfzh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sfzh']);
       $sStyleReadLab_sfzh = '';
       $sStyleReadInp_sfzh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sfzh']) && $this->nmgp_cmp_hidden['sfzh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sfzh" value="<?php echo $this->form_encode_input($sfzh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sfzh_label" id="hidden_field_label_sfzh" style="<?php echo $sStyleHidden_sfzh; ?>"><span id="id_label_sfzh"><?php echo $this->nm_new_label['sfzh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['sfzh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['sfzh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_sfzh_line" id="hidden_field_data_sfzh" style="<?php echo $sStyleHidden_sfzh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sfzh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sfzh"]) &&  $this->nmgp_cmp_readonly["sfzh"] == "on") { 

 ?>
<input type="hidden" name="sfzh" value="<?php echo $this->form_encode_input($sfzh) . "\">" . $sfzh . ""; ?>
<?php } else { ?>
<span id="id_read_on_sfzh" class="sc-ui-readonly-sfzh css_sfzh_line" style="<?php echo $sStyleReadLab_sfzh; ?>"><?php echo $this->form_encode_input($this->sfzh); ?></span><span id="id_read_off_sfzh" style="white-space: nowrap;<?php echo $sStyleReadInp_sfzh; ?>">
 <input class="sc-js-input scFormObjectOdd css_sfzh_obj" style="" id="id_sc_field_sfzh" type=text name="sfzh" value="<?php echo $this->form_encode_input($sfzh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sfzh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sfzh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['gzdw']))
    {
        $this->nm_new_label['gzdw'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_gzdw'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gzdw = $this->gzdw;
   $sStyleHidden_gzdw = '';
   if (isset($this->nmgp_cmp_hidden['gzdw']) && $this->nmgp_cmp_hidden['gzdw'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gzdw']);
       $sStyleHidden_gzdw = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gzdw = 'display: none;';
   $sStyleReadInp_gzdw = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gzdw']) && $this->nmgp_cmp_readonly['gzdw'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gzdw']);
       $sStyleReadLab_gzdw = '';
       $sStyleReadInp_gzdw = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gzdw']) && $this->nmgp_cmp_hidden['gzdw'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="gzdw" value="<?php echo $this->form_encode_input($gzdw) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_gzdw_label" id="hidden_field_label_gzdw" style="<?php echo $sStyleHidden_gzdw; ?>"><span id="id_label_gzdw"><?php echo $this->nm_new_label['gzdw']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['gzdw']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['gzdw'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_gzdw_line" id="hidden_field_data_gzdw" style="<?php echo $sStyleHidden_gzdw; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gzdw_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gzdw"]) &&  $this->nmgp_cmp_readonly["gzdw"] == "on") { 

 ?>
<input type="hidden" name="gzdw" value="<?php echo $this->form_encode_input($gzdw) . "\">" . $gzdw . ""; ?>
<?php } else { ?>
<span id="id_read_on_gzdw" class="sc-ui-readonly-gzdw css_gzdw_line" style="<?php echo $sStyleReadLab_gzdw; ?>"><?php echo $this->form_encode_input($this->gzdw); ?></span><span id="id_read_off_gzdw" style="white-space: nowrap;<?php echo $sStyleReadInp_gzdw; ?>">
 <input class="sc-js-input scFormObjectOdd css_gzdw_obj" style="" id="id_sc_field_gzdw" type=text name="gzdw" value="<?php echo $this->form_encode_input($gzdw) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gzdw_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gzdw_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['zy']))
   {
       $this->nm_new_label['zy'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_zy'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zy = $this->zy;
   $sStyleHidden_zy = '';
   if (isset($this->nmgp_cmp_hidden['zy']) && $this->nmgp_cmp_hidden['zy'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zy']);
       $sStyleHidden_zy = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zy = 'display: none;';
   $sStyleReadInp_zy = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zy']) && $this->nmgp_cmp_readonly['zy'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zy']);
       $sStyleReadLab_zy = '';
       $sStyleReadInp_zy = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zy']) && $this->nmgp_cmp_hidden['zy'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zy" value="<?php echo $this->form_encode_input($this->zy) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_zy_label" id="hidden_field_label_zy" style="<?php echo $sStyleHidden_zy; ?>"><span id="id_label_zy"><?php echo $this->nm_new_label['zy']; ?></span></TD>
    <TD class="scFormDataOdd css_zy_line" id="hidden_field_data_zy" style="<?php echo $sStyleHidden_zy; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zy_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zy"]) &&  $this->nmgp_cmp_readonly["zy"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT mc, mc 
FROM dm_zyfl 
ORDER BY mc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'][] = $rs->fields[0];
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
   $zy_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zy_1))
          {
              foreach ($this->zy_1 as $tmp_zy)
              {
                  if (trim($tmp_zy) === trim($cadaselect[1])) { $zy_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zy) === trim($cadaselect[1])) { $zy_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="zy" value="<?php echo $this->form_encode_input($zy) . "\">" . $zy_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT mc, mc 
FROM dm_zyfl 
ORDER BY mc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'][] = $rs->fields[0];
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
   $zy_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zy_1))
          {
              foreach ($this->zy_1 as $tmp_zy)
              {
                  if (trim($tmp_zy) === trim($cadaselect[1])) { $zy_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zy) === trim($cadaselect[1])) { $zy_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($zy_look))
          {
              $zy_look = $this->zy;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_zy\" class=\"css_zy_line\" style=\"" .  $sStyleReadLab_zy . "\">" . $this->form_encode_input($zy_look) . "</span><span id=\"id_read_off_zy\" style=\"" . $sStyleReadInp_zy . "\">";
   echo " <span id=\"idAjaxSelect_zy\"><select class=\"sc-js-input scFormObjectOdd css_zy_obj\" style=\"\" id=\"id_sc_field_zy\" name=\"zy\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zy'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->zy) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->zy)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zy_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zy_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['work']))
   {
       $this->nm_new_label['work'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_work'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $work = $this->work;
   $sStyleHidden_work = '';
   if (isset($this->nmgp_cmp_hidden['work']) && $this->nmgp_cmp_hidden['work'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['work']);
       $sStyleHidden_work = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_work = 'display: none;';
   $sStyleReadInp_work = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['work']) && $this->nmgp_cmp_readonly['work'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['work']);
       $sStyleReadLab_work = '';
       $sStyleReadInp_work = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['work']) && $this->nmgp_cmp_hidden['work'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="work" value="<?php echo $this->form_encode_input($this->work) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_work_label" id="hidden_field_label_work" style="<?php echo $sStyleHidden_work; ?>"><span id="id_label_work"><?php echo $this->nm_new_label['work']; ?></span></TD>
    <TD class="scFormDataOdd css_work_line" id="hidden_field_data_work" style="<?php echo $sStyleHidden_work; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_work_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["work"]) &&  $this->nmgp_cmp_readonly["work"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT mc, mc 
FROM dm_work 
ORDER BY mc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'][] = $rs->fields[0];
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
   $work_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->work_1))
          {
              foreach ($this->work_1 as $tmp_work)
              {
                  if (trim($tmp_work) === trim($cadaselect[1])) { $work_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->work) === trim($cadaselect[1])) { $work_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="work" value="<?php echo $this->form_encode_input($work) . "\">" . $work_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT mc, mc 
FROM dm_work 
ORDER BY mc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'][] = $rs->fields[0];
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
   $work_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->work_1))
          {
              foreach ($this->work_1 as $tmp_work)
              {
                  if (trim($tmp_work) === trim($cadaselect[1])) { $work_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->work) === trim($cadaselect[1])) { $work_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($work_look))
          {
              $work_look = $this->work;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_work\" class=\"css_work_line\" style=\"" .  $sStyleReadLab_work . "\">" . $this->form_encode_input($work_look) . "</span><span id=\"id_read_off_work\" style=\"" . $sStyleReadInp_work . "\">";
   echo " <span id=\"idAjaxSelect_work\"><select class=\"sc-js-input scFormObjectOdd css_work_obj\" style=\"\" id=\"id_sc_field_work\" name=\"work\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_work'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->work) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->work)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_work_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_work_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['zc']))
   {
       $this->nm_new_label['zc'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_zc'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zc = $this->zc;
   $sStyleHidden_zc = '';
   if (isset($this->nmgp_cmp_hidden['zc']) && $this->nmgp_cmp_hidden['zc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zc']);
       $sStyleHidden_zc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zc = 'display: none;';
   $sStyleReadInp_zc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zc']) && $this->nmgp_cmp_readonly['zc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zc']);
       $sStyleReadLab_zc = '';
       $sStyleReadInp_zc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zc']) && $this->nmgp_cmp_hidden['zc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zc" value="<?php echo $this->form_encode_input($this->zc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_zc_label" id="hidden_field_label_zc" style="<?php echo $sStyleHidden_zc; ?>"><span id="id_label_zc"><?php echo $this->nm_new_label['zc']; ?></span></TD>
    <TD class="scFormDataOdd css_zc_line" id="hidden_field_data_zc" style="<?php echo $sStyleHidden_zc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zc"]) &&  $this->nmgp_cmp_readonly["zc"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT zc, zc 
FROM dm_zc 
ORDER BY zc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'][] = $rs->fields[0];
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
   $zc_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zc_1))
          {
              foreach ($this->zc_1 as $tmp_zc)
              {
                  if (trim($tmp_zc) === trim($cadaselect[1])) { $zc_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zc) === trim($cadaselect[1])) { $zc_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="zc" value="<?php echo $this->form_encode_input($zc) . "\">" . $zc_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'] = array(); 
    }

   $old_value_lwbz = $this->lwbz;
   $this->nm_tira_formatacao();


   $unformatted_value_lwbz = $this->lwbz;

   $nm_comando = "SELECT zc, zc 
FROM dm_zc 
ORDER BY zc";

   $this->lwbz = $old_value_lwbz;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'][] = $rs->fields[0];
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
   $zc_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zc_1))
          {
              foreach ($this->zc_1 as $tmp_zc)
              {
                  if (trim($tmp_zc) === trim($cadaselect[1])) { $zc_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zc) === trim($cadaselect[1])) { $zc_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($zc_look))
          {
              $zc_look = $this->zc;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_zc\" class=\"css_zc_line\" style=\"" .  $sStyleReadLab_zc . "\">" . $this->form_encode_input($zc_look) . "</span><span id=\"id_read_off_zc\" style=\"" . $sStyleReadInp_zc . "\">";
   echo " <span id=\"idAjaxSelect_zc\"><select class=\"sc-js-input scFormObjectOdd css_zc_obj\" style=\"\" id=\"id_sc_field_zc\" name=\"zc\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_zc'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->zc) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->zc)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['yddh']))
    {
        $this->nm_new_label['yddh'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_yddh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $yddh = $this->yddh;
   $sStyleHidden_yddh = '';
   if (isset($this->nmgp_cmp_hidden['yddh']) && $this->nmgp_cmp_hidden['yddh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['yddh']);
       $sStyleHidden_yddh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_yddh = 'display: none;';
   $sStyleReadInp_yddh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['yddh']) && $this->nmgp_cmp_readonly['yddh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['yddh']);
       $sStyleReadLab_yddh = '';
       $sStyleReadInp_yddh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['yddh']) && $this->nmgp_cmp_hidden['yddh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="yddh" value="<?php echo $this->form_encode_input($yddh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_yddh_label" id="hidden_field_label_yddh" style="<?php echo $sStyleHidden_yddh; ?>"><span id="id_label_yddh"><?php echo $this->nm_new_label['yddh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['yddh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['yddh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_yddh_line" id="hidden_field_data_yddh" style="<?php echo $sStyleHidden_yddh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_yddh_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["yddh"]) &&  $this->nmgp_cmp_readonly["yddh"] == "on") { 

 ?>
<input type="hidden" name="yddh" value="<?php echo $this->form_encode_input($yddh) . "\">" . $yddh . ""; ?>
<?php } else { ?>
<span id="id_read_on_yddh" class="sc-ui-readonly-yddh css_yddh_line" style="<?php echo $sStyleReadLab_yddh; ?>"><?php echo $this->form_encode_input($this->yddh); ?></span><span id="id_read_off_yddh" style="white-space: nowrap;<?php echo $sStyleReadInp_yddh; ?>">
 <input class="sc-js-input scFormObjectOdd css_yddh_obj" style="" id="id_sc_field_yddh" type=text name="yddh" value="<?php echo $this->form_encode_input($yddh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_yddh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_yddh_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_email'] . "";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_email_label" id="hidden_field_label_email" style="<?php echo $sStyleHidden_email; ?>"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['email'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lwbz']))
    {
        $this->nm_new_label['lwbz'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_lwbz'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lwbz = $this->lwbz;
   $sStyleHidden_lwbz = '';
   if (isset($this->nmgp_cmp_hidden['lwbz']) && $this->nmgp_cmp_hidden['lwbz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lwbz']);
       $sStyleHidden_lwbz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lwbz = 'display: none;';
   $sStyleReadInp_lwbz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lwbz']) && $this->nmgp_cmp_readonly['lwbz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lwbz']);
       $sStyleReadLab_lwbz = '';
       $sStyleReadInp_lwbz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lwbz']) && $this->nmgp_cmp_hidden['lwbz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lwbz" value="<?php echo $this->form_encode_input($lwbz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lwbz_label" id="hidden_field_label_lwbz" style="<?php echo $sStyleHidden_lwbz; ?>"><span id="id_label_lwbz"><?php echo $this->nm_new_label['lwbz']; ?></span></TD>
    <TD class="scFormDataOdd css_lwbz_line" id="hidden_field_data_lwbz" style="<?php echo $sStyleHidden_lwbz; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lwbz_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lwbz"]) &&  $this->nmgp_cmp_readonly["lwbz"] == "on") { 

 ?>
<input type="hidden" name="lwbz" value="<?php echo $this->form_encode_input($lwbz) . "\">" . $lwbz . ""; ?>
<?php } else { ?>
<span id="id_read_on_lwbz" class="sc-ui-readonly-lwbz css_lwbz_line" style="<?php echo $sStyleReadLab_lwbz; ?>"><?php echo $this->form_encode_input($this->lwbz); ?></span><span id="id_read_off_lwbz" style="white-space: nowrap;<?php echo $sStyleReadInp_lwbz; ?>">
 <input class="sc-js-input scFormObjectOdd css_lwbz_obj" style="" id="id_sc_field_lwbz" type=text name="lwbz" value="<?php echo $this->form_encode_input($lwbz) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['lwbz']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['lwbz']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['lwbz']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lwbz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lwbz_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['bz']))
    {
        $this->nm_new_label['bz'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_bz'] . "";
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
    if (!isset($this->nm_new_label['kyzt']))
    {
        $this->nm_new_label['kyzt'] = "" . $this->Ini->Nm_lang['lang_cg_zjk_fld_kyzt'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kyzt = $this->kyzt;
   $sStyleHidden_kyzt = '';
   if (isset($this->nmgp_cmp_hidden['kyzt']) && $this->nmgp_cmp_hidden['kyzt'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kyzt']);
       $sStyleHidden_kyzt = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kyzt = 'display: none;';
   $sStyleReadInp_kyzt = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kyzt']) && $this->nmgp_cmp_readonly['kyzt'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kyzt']);
       $sStyleReadLab_kyzt = '';
       $sStyleReadInp_kyzt = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kyzt']) && $this->nmgp_cmp_hidden['kyzt'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kyzt" value="<?php echo $this->form_encode_input($kyzt) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kyzt_label" id="hidden_field_label_kyzt" style="<?php echo $sStyleHidden_kyzt; ?>"><span id="id_label_kyzt"><?php echo $this->nm_new_label['kyzt']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['kyzt']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['php_cmp_required']['kyzt'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_kyzt_line" id="hidden_field_data_kyzt" style="<?php echo $sStyleHidden_kyzt; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kyzt_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kyzt"]) &&  $this->nmgp_cmp_readonly["kyzt"] == "on") { 

 if ("是" == $this->kyzt) { $kyzt_look = "是";} 
 if ("否" == $this->kyzt) { $kyzt_look = "否";} 
?>
<input type="hidden" name="kyzt" value="<?php echo $this->form_encode_input($kyzt) . "\">" . $kyzt_look . ""; ?>
<?php } else { ?>

<?php

 if ("是" == $this->kyzt) { $kyzt_look = "是";} 
 if ("否" == $this->kyzt) { $kyzt_look = "否";} 
?>
<span id="id_read_on_kyzt"  class="css_kyzt_line" style="<?php echo $sStyleReadLab_kyzt; ?>"><?php echo $this->form_encode_input($kyzt_look); ?></span><span id="id_read_off_kyzt" style="<?php echo $sStyleReadInp_kyzt; ?>"><div id="idAjaxRadio_kyzt" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_kyzt_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="kyzt" value="是"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_kyzt'][] = '是'; ?>
<?php  if ("是" == $this->kyzt)  { echo " checked" ;} ?>  onClick="" >是</TD>
  <TD class="scFormDataFontOdd css_kyzt_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="kyzt" value="否"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['Lookup_kyzt'][] = '否'; ?>
<?php  if ("否" == $this->kyzt)  { echo " checked" ;} ?>  onClick="" >否</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kyzt_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kyzt_text"></span></td></tr></table></td></tr></table></TD>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cg_zjk");
 parent.scAjaxDetailHeight("form_cg_zjk", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cg_zjk", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cg_zjk", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_zjk']['sc_modal'])
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
