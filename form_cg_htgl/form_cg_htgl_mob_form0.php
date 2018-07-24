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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htgl'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htgl'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cg_htgl/form_cg_htgl_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cg_htgl_mob_sajax_js.php");
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

include_once('form_cg_htgl_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['recarga'];
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
 include_once("form_cg_htgl_mob_js0.php");
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
               action="form_cg_htgl_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['insert_validation']; ?>">
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
<input type="hidden" name="id" value="<?php  echo $this->form_encode_input($this->id) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cg_htgl_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cg_htgl_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htgl'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htgl'] . ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][2] : "";
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
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "提交保存", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['cgbbh']))
    {
        $this->nm_new_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbbh'] . "";
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

    <TD class="scFormDataOdd css_cgbbh_line" id="hidden_field_data_cgbbh" style="<?php echo $sStyleHidden_cgbbh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgbbh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgbbh_label"><span id="id_label_cgbbh"><?php echo $this->nm_new_label['cgbbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgbbh"]) &&  $this->nmgp_cmp_readonly["cgbbh"] == "on") { 

 ?>
<input type="hidden" name="cgbbh" value="<?php echo $this->form_encode_input($cgbbh) . "\">" . $cgbbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgbbh" class="sc-ui-readonly-cgbbh css_cgbbh_line" style="<?php echo $sStyleReadLab_cgbbh; ?>"><?php echo $this->form_encode_input($this->cgbbh); ?></span><span id="id_read_off_cgbbh" style="white-space: nowrap;<?php echo $sStyleReadInp_cgbbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgbbh_obj" style="" id="id_sc_field_cgbbh" type=text name="cgbbh" value="<?php echo $this->form_encode_input($cgbbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php
   $Sc_iframe_master = ($this->Embutida_form) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_cg_htgl*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_cg_cgb"]) && $this->Ini->sc_lig_md5["grid_cg_cgb"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,cgbbh,b_cgbbh*scoutnm_evt_ret_busca*scinsc_form_cg_htgl_mob_cgbbh_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_cg_htgl_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,cgbbh,b_cgbbh*scoutnm_evt_ret_busca*scinsc_form_cg_htgl_mob_cgbbh_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_cg_cgb_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_cg_cgb_cons_psq. "', '" . $Md5_Lig . "')", "cap_cgbbh", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgbbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgbbh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgbmc']))
    {
        $this->nm_new_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbmc'] . "";
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

    <TD class="scFormDataOdd css_cgbmc_line" id="hidden_field_data_cgbmc" style="<?php echo $sStyleHidden_cgbmc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgbmc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgbmc_label"><span id="id_label_cgbmc"><?php echo $this->nm_new_label['cgbmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="cgbmc" value="<?php echo $this->form_encode_input($cgbmc); ?>"><span id="id_ajax_label_cgbmc"><?php echo nl2br($cgbmc); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgbmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgbmc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgybh']))
    {
        $this->nm_new_label['cgybh'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgybh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgybh = $this->cgybh;
   $sStyleHidden_cgybh = '';
   if (isset($this->nmgp_cmp_hidden['cgybh']) && $this->nmgp_cmp_hidden['cgybh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgybh']);
       $sStyleHidden_cgybh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgybh = 'display: none;';
   $sStyleReadInp_cgybh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgybh']) && $this->nmgp_cmp_readonly['cgybh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgybh']);
       $sStyleReadLab_cgybh = '';
       $sStyleReadInp_cgybh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgybh']) && $this->nmgp_cmp_hidden['cgybh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgybh" value="<?php echo $this->form_encode_input($cgybh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cgybh_line" id="hidden_field_data_cgybh" style="<?php echo $sStyleHidden_cgybh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgybh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgybh_label"><span id="id_label_cgybh"><?php echo $this->nm_new_label['cgybh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgybh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgybh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgybh"]) &&  $this->nmgp_cmp_readonly["cgybh"] == "on") { 

 ?>
<input type="hidden" name="cgybh" value="<?php echo $this->form_encode_input($cgybh) . "\">" . $cgybh . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgybh" class="sc-ui-readonly-cgybh css_cgybh_line" style="<?php echo $sStyleReadLab_cgybh; ?>"><?php echo $this->form_encode_input($this->cgybh); ?></span><span id="id_read_off_cgybh" style="white-space: nowrap;<?php echo $sStyleReadInp_cgybh; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgybh_obj" style="" id="id_sc_field_cgybh" type=text name="cgybh" value="<?php echo $this->form_encode_input($cgybh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgybh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgybh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgyxm']))
    {
        $this->nm_new_label['cgyxm'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgyxm'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgyxm = $this->cgyxm;
   $sStyleHidden_cgyxm = '';
   if (isset($this->nmgp_cmp_hidden['cgyxm']) && $this->nmgp_cmp_hidden['cgyxm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgyxm']);
       $sStyleHidden_cgyxm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgyxm = 'display: none;';
   $sStyleReadInp_cgyxm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgyxm']) && $this->nmgp_cmp_readonly['cgyxm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgyxm']);
       $sStyleReadLab_cgyxm = '';
       $sStyleReadInp_cgyxm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgyxm']) && $this->nmgp_cmp_hidden['cgyxm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgyxm" value="<?php echo $this->form_encode_input($cgyxm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cgyxm_line" id="hidden_field_data_cgyxm" style="<?php echo $sStyleHidden_cgyxm; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgyxm_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgyxm_label"><span id="id_label_cgyxm"><?php echo $this->nm_new_label['cgyxm']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgyxm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgyxm'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgyxm"]) &&  $this->nmgp_cmp_readonly["cgyxm"] == "on") { 

 ?>
<input type="hidden" name="cgyxm" value="<?php echo $this->form_encode_input($cgyxm) . "\">" . $cgyxm . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgyxm" class="sc-ui-readonly-cgyxm css_cgyxm_line" style="<?php echo $sStyleReadLab_cgyxm; ?>"><?php echo $this->form_encode_input($this->cgyxm); ?></span><span id="id_read_off_cgyxm" style="white-space: nowrap;<?php echo $sStyleReadInp_cgyxm; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgyxm_obj" style="" id="id_sc_field_cgyxm" type=text name="cgyxm" value="<?php echo $this->form_encode_input($cgyxm) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgyxm_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgyxm_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgylxdh']))
    {
        $this->nm_new_label['cgylxdh'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgylxdh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgylxdh = $this->cgylxdh;
   $sStyleHidden_cgylxdh = '';
   if (isset($this->nmgp_cmp_hidden['cgylxdh']) && $this->nmgp_cmp_hidden['cgylxdh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgylxdh']);
       $sStyleHidden_cgylxdh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgylxdh = 'display: none;';
   $sStyleReadInp_cgylxdh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgylxdh']) && $this->nmgp_cmp_readonly['cgylxdh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgylxdh']);
       $sStyleReadLab_cgylxdh = '';
       $sStyleReadInp_cgylxdh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgylxdh']) && $this->nmgp_cmp_hidden['cgylxdh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgylxdh" value="<?php echo $this->form_encode_input($cgylxdh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cgylxdh_line" id="hidden_field_data_cgylxdh" style="<?php echo $sStyleHidden_cgylxdh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgylxdh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgylxdh_label"><span id="id_label_cgylxdh"><?php echo $this->nm_new_label['cgylxdh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgylxdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgylxdh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgylxdh"]) &&  $this->nmgp_cmp_readonly["cgylxdh"] == "on") { 

 ?>
<input type="hidden" name="cgylxdh" value="<?php echo $this->form_encode_input($cgylxdh) . "\">" . $cgylxdh . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgylxdh" class="sc-ui-readonly-cgylxdh css_cgylxdh_line" style="<?php echo $sStyleReadLab_cgylxdh; ?>"><?php echo $this->form_encode_input($this->cgylxdh); ?></span><span id="id_read_off_cgylxdh" style="white-space: nowrap;<?php echo $sStyleReadInp_cgylxdh; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgylxdh_obj" style="" id="id_sc_field_cgylxdh" type=text name="cgylxdh" value="<?php echo $this->form_encode_input($cgylxdh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgylxdh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgylxdh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgfs']))
    {
        $this->nm_new_label['cgfs'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgfs'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgfs = $this->cgfs;
   $sStyleHidden_cgfs = '';
   if (isset($this->nmgp_cmp_hidden['cgfs']) && $this->nmgp_cmp_hidden['cgfs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgfs']);
       $sStyleHidden_cgfs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgfs = 'display: none;';
   $sStyleReadInp_cgfs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgfs']) && $this->nmgp_cmp_readonly['cgfs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgfs']);
       $sStyleReadLab_cgfs = '';
       $sStyleReadInp_cgfs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgfs']) && $this->nmgp_cmp_hidden['cgfs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgfs" value="<?php echo $this->form_encode_input($cgfs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cgfs_line" id="hidden_field_data_cgfs" style="<?php echo $sStyleHidden_cgfs; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgfs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cgfs_label"><span id="id_label_cgfs"><?php echo $this->nm_new_label['cgfs']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgfs']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgfs'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgfs"]) &&  $this->nmgp_cmp_readonly["cgfs"] == "on") { 

 ?>
<input type="hidden" name="cgfs" value="<?php echo $this->form_encode_input($cgfs) . "\">" . $cgfs . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgfs" class="sc-ui-readonly-cgfs css_cgfs_line" style="<?php echo $sStyleReadLab_cgfs; ?>"><?php echo $this->form_encode_input($this->cgfs); ?></span><span id="id_read_off_cgfs" style="white-space: nowrap;<?php echo $sStyleReadInp_cgfs; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgfs_obj" style="" id="id_sc_field_cgfs" type=text name="cgfs" value="<?php echo $this->form_encode_input($cgfs) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgfs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgfs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['htmc']))
    {
        $this->nm_new_label['htmc'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htmc'] . "";
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

    <TD class="scFormDataOdd css_htmc_line" id="hidden_field_data_htmc" style="<?php echo $sStyleHidden_htmc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htmc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_htmc_label"><span id="id_label_htmc"><?php echo $this->nm_new_label['htmc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htmc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htmc"]) &&  $this->nmgp_cmp_readonly["htmc"] == "on") { 

 ?>
<input type="hidden" name="htmc" value="<?php echo $this->form_encode_input($htmc) . "\">" . $htmc . ""; ?>
<?php } else { ?>
<span id="id_read_on_htmc" class="sc-ui-readonly-htmc css_htmc_line" style="<?php echo $sStyleReadLab_htmc; ?>"><?php echo $this->form_encode_input($this->htmc); ?></span><span id="id_read_off_htmc" style="white-space: nowrap;<?php echo $sStyleReadInp_htmc; ?>">
 <input class="sc-js-input scFormObjectOdd css_htmc_obj" style="" id="id_sc_field_htmc" type=text name="htmc" value="<?php echo $this->form_encode_input($htmc) ?>"
 size=50 maxlength=64 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htmc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htmc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['htbh']))
    {
        $this->nm_new_label['htbh'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htbh'] . "";
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

    <TD class="scFormDataOdd css_htbh_line" id="hidden_field_data_htbh" style="<?php echo $sStyleHidden_htbh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htbh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_htbh_label"><span id="id_label_htbh"><?php echo $this->nm_new_label['htbh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htbh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htbh"]) &&  $this->nmgp_cmp_readonly["htbh"] == "on") { 

 ?>
<input type="hidden" name="htbh" value="<?php echo $this->form_encode_input($htbh) . "\">" . $htbh . ""; ?>
<?php } else { ?>
<span id="id_read_on_htbh" class="sc-ui-readonly-htbh css_htbh_line" style="<?php echo $sStyleReadLab_htbh; ?>"><?php echo $this->form_encode_input($this->htbh); ?></span><span id="id_read_off_htbh" style="white-space: nowrap;<?php echo $sStyleReadInp_htbh; ?>">
 <input class="sc-js-input scFormObjectOdd css_htbh_obj" style="" id="id_sc_field_htbh" type=text name="htbh" value="<?php echo $this->form_encode_input($htbh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htbh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htbh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['htlx']))
   {
       $this->nm_new_label['htlx'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htlx'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $htlx = $this->htlx;
   $sStyleHidden_htlx = '';
   if (isset($this->nmgp_cmp_hidden['htlx']) && $this->nmgp_cmp_hidden['htlx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['htlx']);
       $sStyleHidden_htlx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_htlx = 'display: none;';
   $sStyleReadInp_htlx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['htlx']) && $this->nmgp_cmp_readonly['htlx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['htlx']);
       $sStyleReadLab_htlx = '';
       $sStyleReadInp_htlx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['htlx']) && $this->nmgp_cmp_hidden['htlx'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="htlx" value="<?php echo $this->form_encode_input($this->htlx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_htlx_line" id="hidden_field_data_htlx" style="<?php echo $sStyleHidden_htlx; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htlx_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_htlx_label"><span id="id_label_htlx"><?php echo $this->nm_new_label['htlx']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htlx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htlx'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htlx"]) &&  $this->nmgp_cmp_readonly["htlx"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array(); 
    }

   $old_value_htje = $this->htje;
   $old_value_qdrq = $this->qdrq;
   $old_value_zbj = $this->zbj;
   $old_value_zbdqrq = $this->zbdqrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_qdrq = $this->qdrq;
   $unformatted_value_zbj = $this->zbj;
   $unformatted_value_zbdqrq = $this->zbdqrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_htlx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->qdrq = $old_value_qdrq;
   $this->zbj = $old_value_zbj;
   $this->zbdqrq = $old_value_zbdqrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'][] = $rs->fields[0];
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
   $htlx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->htlx_1))
          {
              foreach ($this->htlx_1 as $tmp_htlx)
              {
                  if (trim($tmp_htlx) === trim($cadaselect[1])) { $htlx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->htlx) === trim($cadaselect[1])) { $htlx_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="htlx" value="<?php echo $this->form_encode_input($htlx) . "\">" . $htlx_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array(); 
    }

   $old_value_htje = $this->htje;
   $old_value_qdrq = $this->qdrq;
   $old_value_zbj = $this->zbj;
   $old_value_zbdqrq = $this->zbdqrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_qdrq = $this->qdrq;
   $unformatted_value_zbj = $this->zbj;
   $unformatted_value_zbdqrq = $this->zbdqrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_htlx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->qdrq = $old_value_qdrq;
   $this->zbj = $old_value_zbj;
   $this->zbdqrq = $old_value_zbdqrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'][] = $rs->fields[0];
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
   $htlx_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->htlx_1))
          {
              foreach ($this->htlx_1 as $tmp_htlx)
              {
                  if (trim($tmp_htlx) === trim($cadaselect[1])) { $htlx_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->htlx) === trim($cadaselect[1])) { $htlx_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($htlx_look))
          {
              $htlx_look = $this->htlx;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_htlx\" class=\"css_htlx_line\" style=\"" .  $sStyleReadLab_htlx . "\">" . $this->form_encode_input($htlx_look) . "</span><span id=\"id_read_off_htlx\" style=\"" . $sStyleReadInp_htlx . "\">";
   echo " <span id=\"idAjaxSelect_htlx\"><select class=\"sc-js-input scFormObjectOdd css_htlx_obj\" style=\"\" id=\"id_sc_field_htlx\" name=\"htlx\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'][] = ''; 
   echo "  <option value=\"\">请选择</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->htlx) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->htlx)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htlx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htlx_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['htje']))
    {
        $this->nm_new_label['htje'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . "";
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

    <TD class="scFormDataOdd css_htje_line" id="hidden_field_data_htje" style="<?php echo $sStyleHidden_htje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_htje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_htje_label"><span id="id_label_htje"><?php echo $this->nm_new_label['htje']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htje'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["htje"]) &&  $this->nmgp_cmp_readonly["htje"] == "on") { 

 ?>
<input type="hidden" name="htje" value="<?php echo $this->form_encode_input($htje) . "\">" . $htje . ""; ?>
<?php } else { ?>
<span id="id_read_on_htje" class="sc-ui-readonly-htje css_htje_line" style="<?php echo $sStyleReadLab_htje; ?>"><?php echo $this->form_encode_input($this->htje); ?></span><span id="id_read_off_htje" style="white-space: nowrap;<?php echo $sStyleReadInp_htje; ?>">
 <input class="sc-js-input scFormObjectOdd css_htje_obj" style="" id="id_sc_field_htje" type=text name="htje" value="<?php echo $this->form_encode_input($htje) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['htje']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['htje']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['htje']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_htje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_htje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qdrq']))
    {
        $this->nm_new_label['qdrq'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qdrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qdrq = $this->qdrq;
   $sStyleHidden_qdrq = '';
   if (isset($this->nmgp_cmp_hidden['qdrq']) && $this->nmgp_cmp_hidden['qdrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qdrq']);
       $sStyleHidden_qdrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qdrq = 'display: none;';
   $sStyleReadInp_qdrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qdrq']) && $this->nmgp_cmp_readonly['qdrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qdrq']);
       $sStyleReadLab_qdrq = '';
       $sStyleReadInp_qdrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qdrq']) && $this->nmgp_cmp_hidden['qdrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qdrq" value="<?php echo $this->form_encode_input($qdrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qdrq_line" id="hidden_field_data_qdrq" style="<?php echo $sStyleHidden_qdrq; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qdrq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_qdrq_label"><span id="id_label_qdrq"><?php echo $this->nm_new_label['qdrq']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qdrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qdrq'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qdrq"]) &&  $this->nmgp_cmp_readonly["qdrq"] == "on") { 

 ?>
<input type="hidden" name="qdrq" value="<?php echo $this->form_encode_input($qdrq) . "\">" . $qdrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_qdrq" class="sc-ui-readonly-qdrq css_qdrq_line" style="<?php echo $sStyleReadLab_qdrq; ?>"><?php echo $this->form_encode_input($qdrq); ?></span><span id="id_read_off_qdrq" style="white-space: nowrap;<?php echo $sStyleReadInp_qdrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_qdrq_obj" style="" id="id_sc_field_qdrq" type=text name="qdrq" value="<?php echo $this->form_encode_input($qdrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['qdrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['qdrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['qdrq']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qdrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qdrq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qydw']))
    {
        $this->nm_new_label['qydw'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydw'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qydw = $this->qydw;
   $sStyleHidden_qydw = '';
   if (isset($this->nmgp_cmp_hidden['qydw']) && $this->nmgp_cmp_hidden['qydw'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qydw']);
       $sStyleHidden_qydw = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qydw = 'display: none;';
   $sStyleReadInp_qydw = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qydw']) && $this->nmgp_cmp_readonly['qydw'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qydw']);
       $sStyleReadLab_qydw = '';
       $sStyleReadInp_qydw = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qydw']) && $this->nmgp_cmp_hidden['qydw'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qydw" value="<?php echo $this->form_encode_input($qydw) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qydw_line" id="hidden_field_data_qydw" style="<?php echo $sStyleHidden_qydw; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qydw_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_qydw_label"><span id="id_label_qydw"><?php echo $this->nm_new_label['qydw']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydw']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydw'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qydw"]) &&  $this->nmgp_cmp_readonly["qydw"] == "on") { 

 ?>
<input type="hidden" name="qydw" value="<?php echo $this->form_encode_input($qydw) . "\">" . $qydw . ""; ?>
<?php } else { ?>
<span id="id_read_on_qydw" class="sc-ui-readonly-qydw css_qydw_line" style="<?php echo $sStyleReadLab_qydw; ?>"><?php echo $this->form_encode_input($this->qydw); ?></span><span id="id_read_off_qydw" style="white-space: nowrap;<?php echo $sStyleReadInp_qydw; ?>">
 <input class="sc-js-input scFormObjectOdd css_qydw_obj" style="" id="id_sc_field_qydw" type=text name="qydw" value="<?php echo $this->form_encode_input($qydw) ?>"
 size=32 maxlength=64 alt="{datatype: 'text', maxLength: 64, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php
   $Sc_iframe_master = ($this->Embutida_form) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_cg_htgl*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_cg_company"]) && $this->Ini->sc_lig_md5["grid_cg_company"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,qydw,gsmc*scoutnm_evt_ret_busca*scinsc_form_cg_htgl_mob_qydw_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_cg_htgl_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,qydw,gsmc*scoutnm_evt_ret_busca*scinsc_form_cg_htgl_mob_qydw_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_cg_company_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_cg_company_cons_psq. "', '" . $Md5_Lig . "')", "cap_qydw", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qydw_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qydw_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qydwlxr']))
    {
        $this->nm_new_label['qydwlxr'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxr'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qydwlxr = $this->qydwlxr;
   $sStyleHidden_qydwlxr = '';
   if (isset($this->nmgp_cmp_hidden['qydwlxr']) && $this->nmgp_cmp_hidden['qydwlxr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qydwlxr']);
       $sStyleHidden_qydwlxr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qydwlxr = 'display: none;';
   $sStyleReadInp_qydwlxr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qydwlxr']) && $this->nmgp_cmp_readonly['qydwlxr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qydwlxr']);
       $sStyleReadLab_qydwlxr = '';
       $sStyleReadInp_qydwlxr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qydwlxr']) && $this->nmgp_cmp_hidden['qydwlxr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qydwlxr" value="<?php echo $this->form_encode_input($qydwlxr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qydwlxr_line" id="hidden_field_data_qydwlxr" style="<?php echo $sStyleHidden_qydwlxr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qydwlxr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_qydwlxr_label"><span id="id_label_qydwlxr"><?php echo $this->nm_new_label['qydwlxr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qydwlxr"]) &&  $this->nmgp_cmp_readonly["qydwlxr"] == "on") { 

 ?>
<input type="hidden" name="qydwlxr" value="<?php echo $this->form_encode_input($qydwlxr) . "\">" . $qydwlxr . ""; ?>
<?php } else { ?>
<span id="id_read_on_qydwlxr" class="sc-ui-readonly-qydwlxr css_qydwlxr_line" style="<?php echo $sStyleReadLab_qydwlxr; ?>"><?php echo $this->form_encode_input($this->qydwlxr); ?></span><span id="id_read_off_qydwlxr" style="white-space: nowrap;<?php echo $sStyleReadInp_qydwlxr; ?>">
 <input class="sc-js-input scFormObjectOdd css_qydwlxr_obj" style="" id="id_sc_field_qydwlxr" type=text name="qydwlxr" value="<?php echo $this->form_encode_input($qydwlxr) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qydwlxr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qydwlxr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qydwlxrdh']))
    {
        $this->nm_new_label['qydwlxrdh'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxrdh'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qydwlxrdh = $this->qydwlxrdh;
   $sStyleHidden_qydwlxrdh = '';
   if (isset($this->nmgp_cmp_hidden['qydwlxrdh']) && $this->nmgp_cmp_hidden['qydwlxrdh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qydwlxrdh']);
       $sStyleHidden_qydwlxrdh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qydwlxrdh = 'display: none;';
   $sStyleReadInp_qydwlxrdh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qydwlxrdh']) && $this->nmgp_cmp_readonly['qydwlxrdh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qydwlxrdh']);
       $sStyleReadLab_qydwlxrdh = '';
       $sStyleReadInp_qydwlxrdh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qydwlxrdh']) && $this->nmgp_cmp_hidden['qydwlxrdh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qydwlxrdh" value="<?php echo $this->form_encode_input($qydwlxrdh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qydwlxrdh_line" id="hidden_field_data_qydwlxrdh" style="<?php echo $sStyleHidden_qydwlxrdh; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qydwlxrdh_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_qydwlxrdh_label"><span id="id_label_qydwlxrdh"><?php echo $this->nm_new_label['qydwlxrdh']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxrdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxrdh'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qydwlxrdh"]) &&  $this->nmgp_cmp_readonly["qydwlxrdh"] == "on") { 

 ?>
<input type="hidden" name="qydwlxrdh" value="<?php echo $this->form_encode_input($qydwlxrdh) . "\">" . $qydwlxrdh . ""; ?>
<?php } else { ?>
<span id="id_read_on_qydwlxrdh" class="sc-ui-readonly-qydwlxrdh css_qydwlxrdh_line" style="<?php echo $sStyleReadLab_qydwlxrdh; ?>"><?php echo $this->form_encode_input($this->qydwlxrdh); ?></span><span id="id_read_off_qydwlxrdh" style="white-space: nowrap;<?php echo $sStyleReadInp_qydwlxrdh; ?>">
 <input class="sc-js-input scFormObjectOdd css_qydwlxrdh_obj" style="" id="id_sc_field_qydwlxrdh" type=text name="qydwlxrdh" value="<?php echo $this->form_encode_input($qydwlxrdh) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qydwlxrdh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qydwlxrdh_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zbj']))
    {
        $this->nm_new_label['zbj'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbj'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zbj = $this->zbj;
   $sStyleHidden_zbj = '';
   if (isset($this->nmgp_cmp_hidden['zbj']) && $this->nmgp_cmp_hidden['zbj'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zbj']);
       $sStyleHidden_zbj = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zbj = 'display: none;';
   $sStyleReadInp_zbj = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zbj']) && $this->nmgp_cmp_readonly['zbj'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zbj']);
       $sStyleReadLab_zbj = '';
       $sStyleReadInp_zbj = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zbj']) && $this->nmgp_cmp_hidden['zbj'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zbj" value="<?php echo $this->form_encode_input($zbj) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zbj_line" id="hidden_field_data_zbj" style="<?php echo $sStyleHidden_zbj; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zbj_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zbj_label"><span id="id_label_zbj"><?php echo $this->nm_new_label['zbj']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zbj"]) &&  $this->nmgp_cmp_readonly["zbj"] == "on") { 

 ?>
<input type="hidden" name="zbj" value="<?php echo $this->form_encode_input($zbj) . "\">" . $zbj . ""; ?>
<?php } else { ?>
<span id="id_read_on_zbj" class="sc-ui-readonly-zbj css_zbj_line" style="<?php echo $sStyleReadLab_zbj; ?>"><?php echo $this->form_encode_input($this->zbj); ?></span><span id="id_read_off_zbj" style="white-space: nowrap;<?php echo $sStyleReadInp_zbj; ?>">
 <input class="sc-js-input scFormObjectOdd css_zbj_obj" style="" id="id_sc_field_zbj" type=text name="zbj" value="<?php echo $this->form_encode_input($zbj) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['zbj']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['zbj']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['zbj']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zbj_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zbj_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zbdqrq']))
    {
        $this->nm_new_label['zbdqrq'] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbdqrq'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zbdqrq = $this->zbdqrq;
   $sStyleHidden_zbdqrq = '';
   if (isset($this->nmgp_cmp_hidden['zbdqrq']) && $this->nmgp_cmp_hidden['zbdqrq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zbdqrq']);
       $sStyleHidden_zbdqrq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zbdqrq = 'display: none;';
   $sStyleReadInp_zbdqrq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zbdqrq']) && $this->nmgp_cmp_readonly['zbdqrq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zbdqrq']);
       $sStyleReadLab_zbdqrq = '';
       $sStyleReadInp_zbdqrq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zbdqrq']) && $this->nmgp_cmp_hidden['zbdqrq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zbdqrq" value="<?php echo $this->form_encode_input($zbdqrq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zbdqrq_line" id="hidden_field_data_zbdqrq" style="<?php echo $sStyleHidden_zbdqrq; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zbdqrq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zbdqrq_label"><span id="id_label_zbdqrq"><?php echo $this->nm_new_label['zbdqrq']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zbdqrq"]) &&  $this->nmgp_cmp_readonly["zbdqrq"] == "on") { 

 ?>
<input type="hidden" name="zbdqrq" value="<?php echo $this->form_encode_input($zbdqrq) . "\">" . $zbdqrq . ""; ?>
<?php } else { ?>
<span id="id_read_on_zbdqrq" class="sc-ui-readonly-zbdqrq css_zbdqrq_line" style="<?php echo $sStyleReadLab_zbdqrq; ?>"><?php echo $this->form_encode_input($zbdqrq); ?></span><span id="id_read_off_zbdqrq" style="white-space: nowrap;<?php echo $sStyleReadInp_zbdqrq; ?>">
 <input class="sc-js-input scFormObjectOdd css_zbdqrq_obj" style="" id="id_sc_field_zbdqrq" type=text name="zbdqrq" value="<?php echo $this->form_encode_input($zbdqrq) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['zbdqrq']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['zbdqrq']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['zbdqrq']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zbdqrq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zbdqrq_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cg_htgl_mob");
 parent.scAjaxDetailHeight("form_cg_htgl_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cg_htgl_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cg_htgl_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_modal'])
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
</body> 
</html> 
