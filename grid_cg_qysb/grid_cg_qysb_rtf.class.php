<?php

class grid_cg_qysb_rtf
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
   function grid_cg_qysb_rtf()
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
      $this->Arquivo   .= "_grid_cg_qysb";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cg_qysb.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_qysb']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_qysb']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_qysb']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['campos_busca'];
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
          $this->qymc = $Busca_temp['qymc']; 
          $tmp_pos = strpos($this->qymc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->qymc = substr($this->qymc, 0, $tmp_pos);
          }
          $this->lxr = $Busca_temp['lxr']; 
          $tmp_pos = strpos($this->lxr, "##@@");
          if ($tmp_pos !== false)
          {
              $this->lxr = substr($this->lxr, 0, $tmp_pos);
          }
          $this->qylogin = $Busca_temp['qylogin']; 
          $tmp_pos = strpos($this->qylogin, "##@@");
          if ($tmp_pos !== false)
          {
              $this->qylogin = substr($this->qylogin, 0, $tmp_pos);
          }
          $this->kyzt = $Busca_temp['kyzt']; 
          $tmp_pos = strpos($this->kyzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->kyzt = substr($this->kyzt, 0, $tmp_pos);
          }
          $this->isbsxz = $Busca_temp['isbsxz']; 
          $tmp_pos = strpos($this->isbsxz, "##@@");
          if ($tmp_pos !== false)
          {
              $this->isbsxz = substr($this->isbsxz, 0, $tmp_pos);
          }
          $this->istb = $Busca_temp['istb']; 
          $tmp_pos = strpos($this->istb, "##@@");
          if ($tmp_pos !== false)
          {
              $this->istb = substr($this->istb, 0, $tmp_pos);
          }
          $this->isrw = $Busca_temp['isrw']; 
          $tmp_pos = strpos($this->isrw, "##@@");
          if ($tmp_pos !== false)
          {
              $this->isrw = substr($this->isrw, 0, $tmp_pos);
          }
          $this->isqualified = $Busca_temp['isqualified']; 
          $tmp_pos = strpos($this->isqualified, "##@@");
          if ($tmp_pos !== false)
          {
              $this->isqualified = substr($this->isqualified, 0, $tmp_pos);
          }
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cgbmc, qymc, isbsxz, istb, isrw, isqualified, kyzt, cgbbh, qylogin, lxr, sm, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cgbmc, qymc, isbsxz, istb, isrw, isqualified, kyzt, cgbbh, qylogin, lxr, sm, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_cgbmc'] . "";
      $this->New_label['qymc'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_qymc'] . "";
      $this->New_label['isbsxz'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_isbsxz'] . "";
      $this->New_label['istb'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_istb'] . "";
      $this->New_label['isrw'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_isrw'] . "";
      $this->New_label['isqualified'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_isqualified'] . "";
      $this->New_label['kyzt'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_kyzt'] . "";
      $this->New_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_cgbbh'] . "";
      $this->New_label['qylogin'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_qylogin'] . "";
      $this->New_label['lxr'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_lxr'] . "";
      $this->New_label['sm'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_sm'] . "";
      $this->New_label['dlr'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_dlr'] . "";
      $this->New_label['dlsj'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_dlsj'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_id'] . "";
      $this->New_label['zbggbh'] = "" . $this->Ini->Nm_lang['lang_cg_qysb_fld_zbggbh'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['cgbmc'])) ? $this->New_label['cgbmc'] : ""; 
          if ($Cada_col == "cgbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['qymc'])) ? $this->New_label['qymc'] : ""; 
          if ($Cada_col == "qymc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isbsxz'])) ? $this->New_label['isbsxz'] : ""; 
          if ($Cada_col == "isbsxz" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['istb'])) ? $this->New_label['istb'] : ""; 
          if ($Cada_col == "istb" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isrw'])) ? $this->New_label['isrw'] : ""; 
          if ($Cada_col == "isrw" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['isqualified'])) ? $this->New_label['isqualified'] : ""; 
          if ($Cada_col == "isqualified" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kyzt'])) ? $this->New_label['kyzt'] : ""; 
          if ($Cada_col == "kyzt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['spgl'])) ? $this->New_label['spgl'] : "操作"; 
          if ($Cada_col == "spgl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cgbbh'])) ? $this->New_label['cgbbh'] : ""; 
          if ($Cada_col == "cgbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['qylogin'])) ? $this->New_label['qylogin'] : ""; 
          if ($Cada_col == "qylogin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lxr'])) ? $this->New_label['lxr'] : ""; 
          if ($Cada_col == "lxr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sm'])) ? $this->New_label['sm'] : ""; 
          if ($Cada_col == "sm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dlr'])) ? $this->New_label['dlr'] : ""; 
          if ($Cada_col == "dlr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dlsj'])) ? $this->New_label['dlsj'] : ""; 
          if ($Cada_col == "dlsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->cgbmc = $rs->fields[0] ;  
         $this->qymc = $rs->fields[1] ;  
         $this->isbsxz = $rs->fields[2] ;  
         $this->istb = $rs->fields[3] ;  
         $this->isrw = $rs->fields[4] ;  
         $this->isqualified = $rs->fields[5] ;  
         $this->kyzt = $rs->fields[6] ;  
         $this->cgbbh = $rs->fields[7] ;  
         $this->qylogin = $rs->fields[8] ;  
         $this->lxr = $rs->fields[9] ;  
         $this->sm = $rs->fields[10] ;  
         $this->dlr = $rs->fields[11] ;  
         $this->dlsj = $rs->fields[12] ;  
         $this->id = $rs->fields[13] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cg_qysb']['contr_erro'] = 'on';
 $this->spgl ='申报管理';

$_SESSION['scriptcase']['grid_cg_qysb']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['field_order'] as $Cada_col)
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
   //----- cgbmc
   function NM_export_cgbmc()
   {
         $this->cgbmc = html_entity_decode($this->cgbmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgbmc = strip_tags($this->cgbmc);
         if (!NM_is_utf8($this->cgbmc))
         {
             $this->cgbmc = sc_convert_encoding($this->cgbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cgbmc = str_replace('<', '&lt;', $this->cgbmc);
         $this->cgbmc = str_replace('>', '&gt;', $this->cgbmc);
         $this->Texto_tag .= "<td>" . $this->cgbmc . "</td>\r\n";
   }
   //----- qymc
   function NM_export_qymc()
   {
         $this->qymc = html_entity_decode($this->qymc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->qymc = strip_tags($this->qymc);
         if (!NM_is_utf8($this->qymc))
         {
             $this->qymc = sc_convert_encoding($this->qymc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->qymc = str_replace('<', '&lt;', $this->qymc);
         $this->qymc = str_replace('>', '&gt;', $this->qymc);
         $this->Texto_tag .= "<td>" . $this->qymc . "</td>\r\n";
   }
   //----- isbsxz
   function NM_export_isbsxz()
   {
         $this->isbsxz = html_entity_decode($this->isbsxz, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isbsxz = strip_tags($this->isbsxz);
         if (!NM_is_utf8($this->isbsxz))
         {
             $this->isbsxz = sc_convert_encoding($this->isbsxz, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isbsxz = str_replace('<', '&lt;', $this->isbsxz);
         $this->isbsxz = str_replace('>', '&gt;', $this->isbsxz);
         $this->Texto_tag .= "<td>" . $this->isbsxz . "</td>\r\n";
   }
   //----- istb
   function NM_export_istb()
   {
         $this->istb = html_entity_decode($this->istb, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->istb = strip_tags($this->istb);
         if (!NM_is_utf8($this->istb))
         {
             $this->istb = sc_convert_encoding($this->istb, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->istb = str_replace('<', '&lt;', $this->istb);
         $this->istb = str_replace('>', '&gt;', $this->istb);
         $this->Texto_tag .= "<td>" . $this->istb . "</td>\r\n";
   }
   //----- isrw
   function NM_export_isrw()
   {
         $this->isrw = html_entity_decode($this->isrw, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isrw = strip_tags($this->isrw);
         if (!NM_is_utf8($this->isrw))
         {
             $this->isrw = sc_convert_encoding($this->isrw, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isrw = str_replace('<', '&lt;', $this->isrw);
         $this->isrw = str_replace('>', '&gt;', $this->isrw);
         $this->Texto_tag .= "<td>" . $this->isrw . "</td>\r\n";
   }
   //----- isqualified
   function NM_export_isqualified()
   {
         $this->isqualified = html_entity_decode($this->isqualified, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->isqualified = strip_tags($this->isqualified);
         if (!NM_is_utf8($this->isqualified))
         {
             $this->isqualified = sc_convert_encoding($this->isqualified, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->isqualified = str_replace('<', '&lt;', $this->isqualified);
         $this->isqualified = str_replace('>', '&gt;', $this->isqualified);
         $this->Texto_tag .= "<td>" . $this->isqualified . "</td>\r\n";
   }
   //----- kyzt
   function NM_export_kyzt()
   {
         $this->kyzt = html_entity_decode($this->kyzt, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kyzt = strip_tags($this->kyzt);
         if (!NM_is_utf8($this->kyzt))
         {
             $this->kyzt = sc_convert_encoding($this->kyzt, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kyzt = str_replace('<', '&lt;', $this->kyzt);
         $this->kyzt = str_replace('>', '&gt;', $this->kyzt);
         $this->Texto_tag .= "<td>" . $this->kyzt . "</td>\r\n";
   }
   //----- spgl
   function NM_export_spgl()
   {
         $this->spgl = html_entity_decode($this->spgl, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->spgl = strip_tags($this->spgl);
         if (!NM_is_utf8($this->spgl))
         {
             $this->spgl = sc_convert_encoding($this->spgl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->spgl = str_replace('<', '&lt;', $this->spgl);
         $this->spgl = str_replace('>', '&gt;', $this->spgl);
         $this->Texto_tag .= "<td>" . $this->spgl . "</td>\r\n";
   }
   //----- cgbbh
   function NM_export_cgbbh()
   {
         $this->cgbbh = html_entity_decode($this->cgbbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgbbh = strip_tags($this->cgbbh);
         if (!NM_is_utf8($this->cgbbh))
         {
             $this->cgbbh = sc_convert_encoding($this->cgbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cgbbh = str_replace('<', '&lt;', $this->cgbbh);
         $this->cgbbh = str_replace('>', '&gt;', $this->cgbbh);
         $this->Texto_tag .= "<td>" . $this->cgbbh . "</td>\r\n";
   }
   //----- qylogin
   function NM_export_qylogin()
   {
         $this->qylogin = html_entity_decode($this->qylogin, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->qylogin = strip_tags($this->qylogin);
         if (!NM_is_utf8($this->qylogin))
         {
             $this->qylogin = sc_convert_encoding($this->qylogin, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->qylogin = str_replace('<', '&lt;', $this->qylogin);
         $this->qylogin = str_replace('>', '&gt;', $this->qylogin);
         $this->Texto_tag .= "<td>" . $this->qylogin . "</td>\r\n";
   }
   //----- lxr
   function NM_export_lxr()
   {
         $this->lxr = html_entity_decode($this->lxr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lxr = strip_tags($this->lxr);
         if (!NM_is_utf8($this->lxr))
         {
             $this->lxr = sc_convert_encoding($this->lxr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lxr = str_replace('<', '&lt;', $this->lxr);
         $this->lxr = str_replace('>', '&gt;', $this->lxr);
         $this->Texto_tag .= "<td>" . $this->lxr . "</td>\r\n";
   }
   //----- sm
   function NM_export_sm()
   {
         $this->sm = html_entity_decode($this->sm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sm = strip_tags($this->sm);
         if (!NM_is_utf8($this->sm))
         {
             $this->sm = sc_convert_encoding($this->sm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sm = str_replace('<', '&lt;', $this->sm);
         $this->sm = str_replace('>', '&gt;', $this->sm);
         $this->Texto_tag .= "<td>" . $this->sm . "</td>\r\n";
   }
   //----- dlr
   function NM_export_dlr()
   {
         $this->dlr = html_entity_decode($this->dlr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dlr = strip_tags($this->dlr);
         if (!NM_is_utf8($this->dlr))
         {
             $this->dlr = sc_convert_encoding($this->dlr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dlr = str_replace('<', '&lt;', $this->dlr);
         $this->dlr = str_replace('>', '&gt;', $this->dlr);
         $this->Texto_tag .= "<td>" . $this->dlr . "</td>\r\n";
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
         if (!NM_is_utf8($this->dlsj))
         {
             $this->dlsj = sc_convert_encoding($this->dlsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dlsj = str_replace('<', '&lt;', $this->dlsj);
         $this->dlsj = str_replace('>', '&gt;', $this->dlsj);
         $this->Texto_tag .= "<td>" . $this->dlsj . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_qysb'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_menu_cg_qysb'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_qysb_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_qysb"> 
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
