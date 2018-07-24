<?php

class grid_cg_xmzjk_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_cg_xmzjk_xml()
   {
      $this->nm_data   = new nm_data("zh_cn");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("zh_cn");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_grid_cg_xmzjk";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_cg_xmzjk.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cgbbh = $Busca_temp['cgbbh']; 
          $tmp_pos = strpos($this->cgbbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgbbh = substr($this->cgbbh, 0, $tmp_pos);
          }
          $this->cgbmc = $Busca_temp['cgbmc']; 
          $tmp_pos = strpos($this->cgbmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgbmc = substr($this->cgbmc, 0, $tmp_pos);
          }
          $this->zjbh = $Busca_temp['zjbh']; 
          $tmp_pos = strpos($this->zjbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->zjbh = substr($this->zjbh, 0, $tmp_pos);
          }
          $this->xm = $Busca_temp['xm']; 
          $tmp_pos = strpos($this->xm, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xm = substr($this->xm, 0, $tmp_pos);
          }
          $this->xb = $Busca_temp['xb']; 
          $tmp_pos = strpos($this->xb, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xb = substr($this->xb, 0, $tmp_pos);
          }
          $this->zc = $Busca_temp['zc']; 
          $tmp_pos = strpos($this->zc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->zc = substr($this->zc, 0, $tmp_pos);
          }
          $this->pc = $Busca_temp['pc']; 
          $tmp_pos = strpos($this->pc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->pc = substr($this->pc, 0, $tmp_pos);
          }
          $this->pc_2 = $Busca_temp['pc_input_2']; 
          $this->dlsj = $Busca_temp['dlsj']; 
          $tmp_pos = strpos($this->dlsj, "##@@");
          if ($tmp_pos !== false)
          {
              $this->dlsj = substr($this->dlsj, 0, $tmp_pos);
          }
          $this->dlsj_2 = $Busca_temp['dlsj_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cgbbh, cgbmc, zjbh, xm, xb, zc, yddh, email, zbggbh, sfzh, gzdw, zy, work, pc, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cgbbh, cgbmc, zjbh, xm, xb, zc, yddh, email, zbggbh, sfzh, gzdw, zy, work, pc, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<grid_cg_xmzjk";
         $this->cgbbh = $rs->fields[0] ;  
         $this->cgbmc = $rs->fields[1] ;  
         $this->zjbh = $rs->fields[2] ;  
         $this->xm = $rs->fields[3] ;  
         $this->xb = $rs->fields[4] ;  
         $this->zc = $rs->fields[5] ;  
         $this->yddh = $rs->fields[6] ;  
         $this->email = $rs->fields[7] ;  
         $this->zbggbh = $rs->fields[8] ;  
         $this->zbggbh = (string)$this->zbggbh;
         $this->sfzh = $rs->fields[9] ;  
         $this->gzdw = $rs->fields[10] ;  
         $this->zy = $rs->fields[11] ;  
         $this->work = $rs->fields[12] ;  
         $this->pc = $rs->fields[13] ;  
         $this->pc = (string)$this->pc;
         $this->dlr = $rs->fields[14] ;  
         $this->dlsj = $rs->fields[15] ;  
         $this->id = $rs->fields[16] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- cgbbh
   function NM_export_cgbbh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cgbbh))
         {
             $this->cgbbh = sc_convert_encoding($this->cgbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cgbbh =\"" . $this->trata_dados($this->cgbbh) . "\"";
   }
   //----- cgbmc
   function NM_export_cgbmc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cgbmc))
         {
             $this->cgbmc = sc_convert_encoding($this->cgbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cgbmc =\"" . $this->trata_dados($this->cgbmc) . "\"";
   }
   //----- zjbh
   function NM_export_zjbh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zjbh))
         {
             $this->zjbh = sc_convert_encoding($this->zjbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zjbh =\"" . $this->trata_dados($this->zjbh) . "\"";
   }
   //----- xm
   function NM_export_xm()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xm))
         {
             $this->xm = sc_convert_encoding($this->xm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xm =\"" . $this->trata_dados($this->xm) . "\"";
   }
   //----- xb
   function NM_export_xb()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xb))
         {
             $this->xb = sc_convert_encoding($this->xb, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xb =\"" . $this->trata_dados($this->xb) . "\"";
   }
   //----- zc
   function NM_export_zc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zc))
         {
             $this->zc = sc_convert_encoding($this->zc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zc =\"" . $this->trata_dados($this->zc) . "\"";
   }
   //----- yddh
   function NM_export_yddh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->yddh))
         {
             $this->yddh = sc_convert_encoding($this->yddh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " yddh =\"" . $this->trata_dados($this->yddh) . "\"";
   }
   //----- email
   function NM_export_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " email =\"" . $this->trata_dados($this->email) . "\"";
   }
   //----- zbggbh
   function NM_export_zbggbh()
   {
         nmgp_Form_Num_Val($this->zbggbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zbggbh))
         {
             $this->zbggbh = sc_convert_encoding($this->zbggbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zbggbh =\"" . $this->trata_dados($this->zbggbh) . "\"";
   }
   //----- sfzh
   function NM_export_sfzh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sfzh))
         {
             $this->sfzh = sc_convert_encoding($this->sfzh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sfzh =\"" . $this->trata_dados($this->sfzh) . "\"";
   }
   //----- gzdw
   function NM_export_gzdw()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->gzdw))
         {
             $this->gzdw = sc_convert_encoding($this->gzdw, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " gzdw =\"" . $this->trata_dados($this->gzdw) . "\"";
   }
   //----- zy
   function NM_export_zy()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zy))
         {
             $this->zy = sc_convert_encoding($this->zy, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zy =\"" . $this->trata_dados($this->zy) . "\"";
   }
   //----- work
   function NM_export_work()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->work))
         {
             $this->work = sc_convert_encoding($this->work, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " work =\"" . $this->trata_dados($this->work) . "\"";
   }
   //----- pc
   function NM_export_pc()
   {
         nmgp_Form_Num_Val($this->pc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pc))
         {
             $this->pc = sc_convert_encoding($this->pc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " pc =\"" . $this->trata_dados($this->pc) . "\"";
   }
   //----- dlr
   function NM_export_dlr()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dlr))
         {
             $this->dlr = sc_convert_encoding($this->dlr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dlr =\"" . $this->trata_dados($this->dlr) . "\"";
   }
   //----- dlsj
   function NM_export_dlsj()
   {
         if (substr($this->dlsj, 10, 1) == "-") 
         { 
             $this->dlsj = substr($this->dlsj, 0, 10) . " " . substr($this->dlsj, 11);
         } 
         if (substr($this->dlsj, 13, 1) == ".") 
         { 
            $this->dlsj = substr($this->dlsj, 0, 13) . ":" . substr($this->dlsj, 14, 2) . ":" . substr($this->dlsj, 17);
         } 
         $conteudo_x = $this->dlsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->dlsj, "YYYY-MM-DD HH:II:SS");
             $this->dlsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dlsj))
         {
             $this->dlsj = sc_convert_encoding($this->dlsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dlsj =\"" . $this->trata_dados($this->dlsj) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_xmzjk'] ?> :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_cg_xmzjk_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_xmzjk"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
