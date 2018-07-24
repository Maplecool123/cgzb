<?php

class grid_cg_shbz_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_cg_shbz_rtf()
   {
      $this->nm_data   = new nm_data("zh_cn");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_cg_shbz";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cg_shbz.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_shbz']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_shbz']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_shbz']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->ms = $Busca_temp['ms']; 
          $tmp_pos = strpos($this->ms, "##@@");
          if ($tmp_pos !== false)
          {
              $this->ms = substr($this->ms, 0, $tmp_pos);
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->id_2 = $Busca_temp['id_input_2']; 
          $this->lcbh = $Busca_temp['lcbh']; 
          $tmp_pos = strpos($this->lcbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->lcbh = substr($this->lcbh, 0, $tmp_pos);
          }
          $this->bzmc = $Busca_temp['bzmc']; 
          $tmp_pos = strpos($this->bzmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->bzmc = substr($this->bzmc, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['where_pesq_filtro'];
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_cg_shbz']['contr_erro'] = 'on';
if (!isset($_SESSION['v_lcbbh'])) {$_SESSION['v_lcbbh'] = "";}
if (!isset($this->sc_temp_v_lcbbh)) {$this->sc_temp_v_lcbbh = (isset($_SESSION['v_lcbbh'])) ? $_SESSION['v_lcbbh'] : "";}
if (!isset($_SESSION['v_lcmc'])) {$_SESSION['v_lcmc'] = "";}
if (!isset($this->sc_temp_v_lcmc)) {$this->sc_temp_v_lcmc = (isset($_SESSION['v_lcmc'])) ? $_SESSION['v_lcmc'] : "";}
 	$this->sc_temp_v_lcmc="";
 	$str_sql = " select lcmc from cg_shlc where lcbh='".$this->sc_temp_v_lcbbh."' "; 
	 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
	if(!empty($this->rs )){
		$this->sc_temp_v_lcmc = $this->rs[0][0];
    }
if (isset($this->sc_temp_v_lcmc)) {$_SESSION['v_lcmc'] = $this->sc_temp_v_lcmc;}
if (isset($this->sc_temp_v_lcbbh)) {$_SESSION['v_lcbbh'] = $this->sc_temp_v_lcbbh;}
$_SESSION['scriptcase']['grid_cg_shbz']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT bzmc, isqs, isjs, yhlx, bmlx, isgdyh, gdyh, listorder, lcbh, ms, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT bzmc, isqs, isjs, yhlx, bmlx, isgdyh, gdyh, listorder, lcbh, ms, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['bzmc'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_bzmc'] . "";
      $this->New_label['isqs'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_isqs'] . "";
      $this->New_label['isjs'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_isjs'] . "";
      $this->New_label['yhlx'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_yhlx'] . "";
      $this->New_label['bmlx'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_bmlx'] . "";
      $this->New_label['isgdyh'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_isgdyh'] . "";
      $this->New_label['gdyh'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_gdyh'] . "";
      $this->New_label['listorder'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_listorder'] . "";
      $this->New_label['lcbh'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_lcbh'] . "";
      $this->New_label['ms'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_ms'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_id'] . "";
      $this->New_label['issend'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_issend'] . "";
      $this->New_label['isprocess'] = "" . $this->Ini->Nm_lang['lang_cg_shbz_fld_isprocess'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['bzmc'])) ? $this->New_label['bzmc'] : ""; 
          if ($Cada_col == "bzmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isqs'])) ? $this->New_label['isqs'] : ""; 
          if ($Cada_col == "isqs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isjs'])) ? $this->New_label['isjs'] : ""; 
          if ($Cada_col == "isjs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['yhlx'])) ? $this->New_label['yhlx'] : ""; 
          if ($Cada_col == "yhlx" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bmlx'])) ? $this->New_label['bmlx'] : ""; 
          if ($Cada_col == "bmlx" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isgdyh'])) ? $this->New_label['isgdyh'] : ""; 
          if ($Cada_col == "isgdyh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gdyh'])) ? $this->New_label['gdyh'] : ""; 
          if ($Cada_col == "gdyh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['listorder'])) ? $this->New_label['listorder'] : ""; 
          if ($Cada_col == "listorder" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lcbh'])) ? $this->New_label['lcbh'] : ""; 
          if ($Cada_col == "lcbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ms'])) ? $this->New_label['ms'] : ""; 
          if ($Cada_col == "ms" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->bzmc = $rs->fields[0] ;  
         $this->isqs = $rs->fields[1] ;  
         $this->isjs = $rs->fields[2] ;  
         $this->yhlx = $rs->fields[3] ;  
         $this->bmlx = $rs->fields[4] ;  
         $this->isgdyh = $rs->fields[5] ;  
         $this->gdyh = $rs->fields[6] ;  
         $this->listorder = $rs->fields[7] ;  
         $this->listorder = (string)$this->listorder;
         $this->lcbh = $rs->fields[8] ;  
         $this->ms = $rs->fields[9] ;  
         $this->id = $rs->fields[10] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- bzmc
   function NM_export_bzmc()
   {
         $this->bzmc = html_entity_decode($this->bzmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bzmc = strip_tags($this->bzmc);
         if (!NM_is_utf8($this->bzmc))
         {
             $this->bzmc = sc_convert_encoding($this->bzmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bzmc = str_replace('<', '&lt;', $this->bzmc);
         $this->bzmc = str_replace('>', '&gt;', $this->bzmc);
         $this->Texto_tag .= "<td>" . $this->bzmc . "</td>\r\n";
   }
   //----- isqs
   function NM_export_isqs()
   {
         $this->isqs = html_entity_decode($this->isqs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isqs = strip_tags($this->isqs);
         if (!NM_is_utf8($this->isqs))
         {
             $this->isqs = sc_convert_encoding($this->isqs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isqs = str_replace('<', '&lt;', $this->isqs);
         $this->isqs = str_replace('>', '&gt;', $this->isqs);
         $this->Texto_tag .= "<td>" . $this->isqs . "</td>\r\n";
   }
   //----- isjs
   function NM_export_isjs()
   {
         $this->isjs = html_entity_decode($this->isjs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isjs = strip_tags($this->isjs);
         if (!NM_is_utf8($this->isjs))
         {
             $this->isjs = sc_convert_encoding($this->isjs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isjs = str_replace('<', '&lt;', $this->isjs);
         $this->isjs = str_replace('>', '&gt;', $this->isjs);
         $this->Texto_tag .= "<td>" . $this->isjs . "</td>\r\n";
   }
   //----- yhlx
   function NM_export_yhlx()
   {
         $this->yhlx = html_entity_decode($this->yhlx, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->yhlx = strip_tags($this->yhlx);
         if (!NM_is_utf8($this->yhlx))
         {
             $this->yhlx = sc_convert_encoding($this->yhlx, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->yhlx = str_replace('<', '&lt;', $this->yhlx);
         $this->yhlx = str_replace('>', '&gt;', $this->yhlx);
         $this->Texto_tag .= "<td>" . $this->yhlx . "</td>\r\n";
   }
   //----- bmlx
   function NM_export_bmlx()
   {
         $this->bmlx = html_entity_decode($this->bmlx, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bmlx = strip_tags($this->bmlx);
         if (!NM_is_utf8($this->bmlx))
         {
             $this->bmlx = sc_convert_encoding($this->bmlx, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->bmlx = str_replace('<', '&lt;', $this->bmlx);
         $this->bmlx = str_replace('>', '&gt;', $this->bmlx);
         $this->Texto_tag .= "<td>" . $this->bmlx . "</td>\r\n";
   }
   //----- isgdyh
   function NM_export_isgdyh()
   {
         $this->isgdyh = html_entity_decode($this->isgdyh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isgdyh = strip_tags($this->isgdyh);
         if (!NM_is_utf8($this->isgdyh))
         {
             $this->isgdyh = sc_convert_encoding($this->isgdyh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isgdyh = str_replace('<', '&lt;', $this->isgdyh);
         $this->isgdyh = str_replace('>', '&gt;', $this->isgdyh);
         $this->Texto_tag .= "<td>" . $this->isgdyh . "</td>\r\n";
   }
   //----- gdyh
   function NM_export_gdyh()
   {
         $this->gdyh = html_entity_decode($this->gdyh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gdyh = strip_tags($this->gdyh);
         if (!NM_is_utf8($this->gdyh))
         {
             $this->gdyh = sc_convert_encoding($this->gdyh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gdyh = str_replace('<', '&lt;', $this->gdyh);
         $this->gdyh = str_replace('>', '&gt;', $this->gdyh);
         $this->Texto_tag .= "<td>" . $this->gdyh . "</td>\r\n";
   }
   //----- listorder
   function NM_export_listorder()
   {
         nmgp_Form_Num_Val($this->listorder, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->listorder))
         {
             $this->listorder = sc_convert_encoding($this->listorder, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->listorder = str_replace('<', '&lt;', $this->listorder);
         $this->listorder = str_replace('>', '&gt;', $this->listorder);
         $this->Texto_tag .= "<td>" . $this->listorder . "</td>\r\n";
   }
   //----- lcbh
   function NM_export_lcbh()
   {
         $this->lcbh = html_entity_decode($this->lcbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lcbh = strip_tags($this->lcbh);
         if (!NM_is_utf8($this->lcbh))
         {
             $this->lcbh = sc_convert_encoding($this->lcbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lcbh = str_replace('<', '&lt;', $this->lcbh);
         $this->lcbh = str_replace('>', '&gt;', $this->lcbh);
         $this->Texto_tag .= "<td>" . $this->lcbh . "</td>\r\n";
   }
   //----- ms
   function NM_export_ms()
   {
         $this->ms = html_entity_decode($this->ms, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ms = strip_tags($this->ms);
         if (!NM_is_utf8($this->ms))
         {
             $this->ms = sc_convert_encoding($this->ms, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ms = str_replace('<', '&lt;', $this->ms);
         $this->ms = str_replace('>', '&gt;', $this->ms);
         $this->Texto_tag .= "<td>" . $this->ms . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_shbz'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_shbz'] ?> :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_cg_shbz_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_shbz"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
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
