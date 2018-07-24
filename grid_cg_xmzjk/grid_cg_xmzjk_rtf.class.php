<?php

class grid_cg_xmzjk_rtf
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
   function grid_cg_xmzjk_rtf()
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
      $this->Arquivo   .= "_grid_cg_xmzjk";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cg_xmzjk.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_name']);
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
      $this->New_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . "";
      $this->New_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . "";
      $this->New_label['zjbh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zjbh'] . "";
      $this->New_label['xm'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xm'] . "";
      $this->New_label['xb'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xb'] . "";
      $this->New_label['zc'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zc'] . "";
      $this->New_label['yddh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_yddh'] . "";
      $this->New_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_email'] . "";
      $this->New_label['zbggbh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . "";
      $this->New_label['sfzh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_sfzh'] . "";
      $this->New_label['gzdw'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_gzdw'] . "";
      $this->New_label['zy'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zy'] . "";
      $this->New_label['work'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_work'] . "";
      $this->New_label['pc'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "";
      $this->New_label['dlr'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlr'] . "";
      $this->New_label['dlsj'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlsj'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['field_order'] as $Cada_col)
      { 
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
          $SC_Label = (isset($this->New_label['zjbh'])) ? $this->New_label['zjbh'] : ""; 
          if ($Cada_col == "zjbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['xm'])) ? $this->New_label['xm'] : ""; 
          if ($Cada_col == "xm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['xb'])) ? $this->New_label['xb'] : ""; 
          if ($Cada_col == "xb" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zc'])) ? $this->New_label['zc'] : ""; 
          if ($Cada_col == "zc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['yddh'])) ? $this->New_label['yddh'] : ""; 
          if ($Cada_col == "yddh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : ""; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zbggbh'])) ? $this->New_label['zbggbh'] : ""; 
          if ($Cada_col == "zbggbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sfzh'])) ? $this->New_label['sfzh'] : ""; 
          if ($Cada_col == "sfzh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gzdw'])) ? $this->New_label['gzdw'] : ""; 
          if ($Cada_col == "gzdw" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zy'])) ? $this->New_label['zy'] : ""; 
          if ($Cada_col == "zy" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['work'])) ? $this->New_label['work'] : ""; 
          if ($Cada_col == "work" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pc'])) ? $this->New_label['pc'] : ""; 
          if ($Cada_col == "pc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
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
   //----- zjbh
   function NM_export_zjbh()
   {
         $this->zjbh = html_entity_decode($this->zjbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zjbh = strip_tags($this->zjbh);
         if (!NM_is_utf8($this->zjbh))
         {
             $this->zjbh = sc_convert_encoding($this->zjbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zjbh = str_replace('<', '&lt;', $this->zjbh);
         $this->zjbh = str_replace('>', '&gt;', $this->zjbh);
         $this->Texto_tag .= "<td>" . $this->zjbh . "</td>\r\n";
   }
   //----- xm
   function NM_export_xm()
   {
         $this->xm = html_entity_decode($this->xm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xm = strip_tags($this->xm);
         if (!NM_is_utf8($this->xm))
         {
             $this->xm = sc_convert_encoding($this->xm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xm = str_replace('<', '&lt;', $this->xm);
         $this->xm = str_replace('>', '&gt;', $this->xm);
         $this->Texto_tag .= "<td>" . $this->xm . "</td>\r\n";
   }
   //----- xb
   function NM_export_xb()
   {
         $this->xb = html_entity_decode($this->xb, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xb = strip_tags($this->xb);
         if (!NM_is_utf8($this->xb))
         {
             $this->xb = sc_convert_encoding($this->xb, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xb = str_replace('<', '&lt;', $this->xb);
         $this->xb = str_replace('>', '&gt;', $this->xb);
         $this->Texto_tag .= "<td>" . $this->xb . "</td>\r\n";
   }
   //----- zc
   function NM_export_zc()
   {
         $this->zc = html_entity_decode($this->zc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zc = strip_tags($this->zc);
         if (!NM_is_utf8($this->zc))
         {
             $this->zc = sc_convert_encoding($this->zc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zc = str_replace('<', '&lt;', $this->zc);
         $this->zc = str_replace('>', '&gt;', $this->zc);
         $this->Texto_tag .= "<td>" . $this->zc . "</td>\r\n";
   }
   //----- yddh
   function NM_export_yddh()
   {
         $this->yddh = html_entity_decode($this->yddh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->yddh = strip_tags($this->yddh);
         if (!NM_is_utf8($this->yddh))
         {
             $this->yddh = sc_convert_encoding($this->yddh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->yddh = str_replace('<', '&lt;', $this->yddh);
         $this->yddh = str_replace('>', '&gt;', $this->yddh);
         $this->Texto_tag .= "<td>" . $this->yddh . "</td>\r\n";
   }
   //----- email
   function NM_export_email()
   {
         $this->email = html_entity_decode($this->email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->email = strip_tags($this->email);
         if (!NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->email = str_replace('<', '&lt;', $this->email);
         $this->email = str_replace('>', '&gt;', $this->email);
         $this->Texto_tag .= "<td>" . $this->email . "</td>\r\n";
   }
   //----- zbggbh
   function NM_export_zbggbh()
   {
         nmgp_Form_Num_Val($this->zbggbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->zbggbh))
         {
             $this->zbggbh = sc_convert_encoding($this->zbggbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zbggbh = str_replace('<', '&lt;', $this->zbggbh);
         $this->zbggbh = str_replace('>', '&gt;', $this->zbggbh);
         $this->Texto_tag .= "<td>" . $this->zbggbh . "</td>\r\n";
   }
   //----- sfzh
   function NM_export_sfzh()
   {
         $this->sfzh = html_entity_decode($this->sfzh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sfzh = strip_tags($this->sfzh);
         if (!NM_is_utf8($this->sfzh))
         {
             $this->sfzh = sc_convert_encoding($this->sfzh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sfzh = str_replace('<', '&lt;', $this->sfzh);
         $this->sfzh = str_replace('>', '&gt;', $this->sfzh);
         $this->Texto_tag .= "<td>" . $this->sfzh . "</td>\r\n";
   }
   //----- gzdw
   function NM_export_gzdw()
   {
         $this->gzdw = html_entity_decode($this->gzdw, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gzdw = strip_tags($this->gzdw);
         if (!NM_is_utf8($this->gzdw))
         {
             $this->gzdw = sc_convert_encoding($this->gzdw, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gzdw = str_replace('<', '&lt;', $this->gzdw);
         $this->gzdw = str_replace('>', '&gt;', $this->gzdw);
         $this->Texto_tag .= "<td>" . $this->gzdw . "</td>\r\n";
   }
   //----- zy
   function NM_export_zy()
   {
         $this->zy = html_entity_decode($this->zy, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zy = strip_tags($this->zy);
         if (!NM_is_utf8($this->zy))
         {
             $this->zy = sc_convert_encoding($this->zy, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zy = str_replace('<', '&lt;', $this->zy);
         $this->zy = str_replace('>', '&gt;', $this->zy);
         $this->Texto_tag .= "<td>" . $this->zy . "</td>\r\n";
   }
   //----- work
   function NM_export_work()
   {
         $this->work = html_entity_decode($this->work, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->work = strip_tags($this->work);
         if (!NM_is_utf8($this->work))
         {
             $this->work = sc_convert_encoding($this->work, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->work = str_replace('<', '&lt;', $this->work);
         $this->work = str_replace('>', '&gt;', $this->work);
         $this->Texto_tag .= "<td>" . $this->work . "</td>\r\n";
   }
   //----- pc
   function NM_export_pc()
   {
         nmgp_Form_Num_Val($this->pc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->pc))
         {
             $this->pc = sc_convert_encoding($this->pc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->pc = str_replace('<', '&lt;', $this->pc);
         $this->pc = str_replace('>', '&gt;', $this->pc);
         $this->Texto_tag .= "<td>" . $this->pc . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_xmzjk'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_xmzjk_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_xmzjk"> 
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
