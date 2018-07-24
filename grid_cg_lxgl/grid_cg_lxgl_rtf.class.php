<?php

class grid_cg_lxgl_rtf
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
   function grid_cg_lxgl_rtf()
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
      $this->Arquivo   .= "_grid_cg_lxgl";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cg_lxgl.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->xmbh = $Busca_temp['xmbh']; 
          $tmp_pos = strpos($this->xmbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmbh = substr($this->xmbh, 0, $tmp_pos);
          }
          $this->xmmc = $Busca_temp['xmmc']; 
          $tmp_pos = strpos($this->xmmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmmc = substr($this->xmmc, 0, $tmp_pos);
          }
          $this->xmfzr = $Busca_temp['xmfzr']; 
          $tmp_pos = strpos($this->xmfzr, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmfzr = substr($this->xmfzr, 0, $tmp_pos);
          }
          $this->zjly = $Busca_temp['zjly']; 
          $tmp_pos = strpos($this->zjly, "##@@");
          if ($tmp_pos !== false)
          {
              $this->zjly = substr($this->zjly, 0, $tmp_pos);
          }
          $this->sbbm = $Busca_temp['sbbm']; 
          $tmp_pos = strpos($this->sbbm, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sbbm = substr($this->sbbm, 0, $tmp_pos);
          }
          $this->sbrq = $Busca_temp['sbrq']; 
          $tmp_pos = strpos($this->sbrq, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sbrq = substr($this->sbrq, 0, $tmp_pos);
          }
          $this->sbrq_2 = $Busca_temp['sbrq_input_2']; 
          $this->shzt = $Busca_temp['shzt']; 
          $tmp_pos = strpos($this->shzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shzt = substr($this->shzt, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->Sub_Consultas[] = "splcxx";
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT xmbh, xmmc, ysje, zjly, xmfzr, sbbm, sbrq, shzt, ysly, sbr, qwcgrq, lxr, lxdh, email, cjsj, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT xmbh, xmmc, ysje, zjly, xmfzr, sbbm, sbrq, shzt, ysly, sbr, qwcgrq, lxr, lxdh, email, cjsj, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['xmbh'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmbh'] . "";
      $this->New_label['xmmc'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmmc'] . "";
      $this->New_label['ysje'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_ysje'] . "";
      $this->New_label['zjly'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_zjly'] . "";
      $this->New_label['xmfzr'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmfzr'] . "";
      $this->New_label['sbbm'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbbm'] . "";
      $this->New_label['sbrq'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbrq'] . "";
      $this->New_label['shzt'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_shzt'] . "";
      $this->New_label['ysly'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_ysly'] . "";
      $this->New_label['sbr'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbr'] . "";
      $this->New_label['qwcgrq'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_qwcgrq'] . "";
      $this->New_label['lxr'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_lxr'] . "";
      $this->New_label['lxdh'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_lxdh'] . "";
      $this->New_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_email'] . "";
      $this->New_label['cjsj'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_cjsj'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_id'] . "";
      $this->New_label['bz'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_bz'] . "";
      $this->New_label['fa'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_fa'] . "";
      $this->New_label['bg'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_bg'] . "";
      $this->New_label['ps'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_ps'] . "";
      $this->New_label['ifjs'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_ifjs'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['xmbh'])) ? $this->New_label['xmbh'] : ""; 
          if ($Cada_col == "xmbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['xmmc'])) ? $this->New_label['xmmc'] : ""; 
          if ($Cada_col == "xmmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ysje'])) ? $this->New_label['ysje'] : ""; 
          if ($Cada_col == "ysje" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zjly'])) ? $this->New_label['zjly'] : ""; 
          if ($Cada_col == "zjly" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['xmfzr'])) ? $this->New_label['xmfzr'] : ""; 
          if ($Cada_col == "xmfzr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sbbm'])) ? $this->New_label['sbbm'] : ""; 
          if ($Cada_col == "sbbm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sbrq'])) ? $this->New_label['sbrq'] : ""; 
          if ($Cada_col == "sbrq" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shzt'])) ? $this->New_label['shzt'] : ""; 
          if ($Cada_col == "shzt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['splc'])) ? $this->New_label['splc'] : "操作"; 
          if ($Cada_col == "splc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ysly'])) ? $this->New_label['ysly'] : ""; 
          if ($Cada_col == "ysly" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sbr'])) ? $this->New_label['sbr'] : ""; 
          if ($Cada_col == "sbr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['qwcgrq'])) ? $this->New_label['qwcgrq'] : ""; 
          if ($Cada_col == "qwcgrq" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['lxdh'])) ? $this->New_label['lxdh'] : ""; 
          if ($Cada_col == "lxdh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cjsj'])) ? $this->New_label['cjsj'] : ""; 
          if ($Cada_col == "cjsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->xmbh = $rs->fields[0] ;  
         $this->xmmc = $rs->fields[1] ;  
         $this->ysje = $rs->fields[2] ;  
         $this->ysje =  str_replace(",", ".", $this->ysje);
         $this->ysje = (string)$this->ysje;
         $this->zjly = $rs->fields[3] ;  
         $this->xmfzr = $rs->fields[4] ;  
         $this->sbbm = $rs->fields[5] ;  
         $this->sbrq = $rs->fields[6] ;  
         $this->shzt = $rs->fields[7] ;  
         $this->ysly = $rs->fields[8] ;  
         $this->sbr = $rs->fields[9] ;  
         $this->qwcgrq = $rs->fields[10] ;  
         $this->lxr = $rs->fields[11] ;  
         $this->lxdh = $rs->fields[12] ;  
         $this->email = $rs->fields[13] ;  
         $this->cjsj = $rs->fields[14] ;  
         $this->id = $rs->fields[15] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cg_lxgl']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_priv_admin'])) {$_SESSION['usr_priv_admin'] = "";}
if (!isset($this->sc_temp_usr_priv_admin)) {$this->sc_temp_usr_priv_admin = (isset($_SESSION['usr_priv_admin'])) ? $_SESSION['usr_priv_admin'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($_SESSION['v_shlc'])) {$_SESSION['v_shlc'] = "";}
if (!isset($this->sc_temp_v_shlc)) {$this->sc_temp_v_shlc = (isset($_SESSION['v_shlc'])) ? $_SESSION['v_shlc'] : "";}
  $this->splc ='';
 $bzmc='';
if(($this->shzt !='通过')&&($this->shzt !='未通过'))
{

	
 	$str_sql = " select  bzmc,ms,isqs,isjs,yhlx,bmlx,isgdyh,gdyh  from cg_shbz where lcbh='".$this->sc_temp_v_shlc."' 
and  not exists(select s.id from  cg_sjshlc s where s.sjbh='".$this->id ."' and s.shlc='".$this->sc_temp_v_shlc."' and s.shbz=cg_shbz.bzmc)
and  not exists(select s.id from  cg_sjshlc s where s.sjbh='".$this->id ."' and s.shlc='".$this->sc_temp_v_shlc."' and  s.shzt='不通过')
order by listorder limit 1 ";
	 
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
		$bzmc = $this->rs[0][0];
		$ms = $this->rs[0][1];
	    $isqs = $this->rs[0][2];
		$isjs = $this->rs[0][3];
	    $yhlx = $this->rs[0][4];
	    $bmlx = $this->rs[0][5];
		$isgdyh = $this->rs[0][6];
		$gdyh = $this->rs[0][7];
		if($isgdyh=='是'){
			  if(!empty($gdyh)&&($gdyh==$this->sc_temp_usr_login))
			  {
				     $this->splc =$bzmc;
			  }
		   	
			
		}
		else {
		   $bm='';
		  if(!empty($bmlx)&&($bmlx=='本部门'))
		  {
			  $bm=$this->sbbm ;  
	      }else {			  
			  $bm= $bmlx;
		  }
		       
			
		  if(!empty($bm))
		  {
				 	$sql = "select id from cg_staff where bm='".$bm."' and zw='".$yhlx."' and kyzt='是' and ygbh='".$this->sc_temp_usr_login."'";
					  
      $nm_select = $sql; 
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
							if(!empty($this->rs[0][0])){
								 $this->splc =$bzmc;
							}
					 }
		  } 

				
				
		}
		
		
			   if($this->sc_temp_usr_priv_admin){
			     $this->splc =$bzmc;
			   }
	  
	}
}else {
	$this->splc ='';
}
if (isset($this->sc_temp_v_shlc)) {$_SESSION['v_shlc'] = $this->sc_temp_v_shlc;}
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_priv_admin)) {$_SESSION['usr_priv_admin'] = $this->sc_temp_usr_priv_admin;}
$_SESSION['scriptcase']['grid_cg_lxgl']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['field_order'] as $Cada_col)
         { 
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
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
   //----- xmbh
   function NM_export_xmbh()
   {
         $this->xmbh = html_entity_decode($this->xmbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xmbh = strip_tags($this->xmbh);
         if (!NM_is_utf8($this->xmbh))
         {
             $this->xmbh = sc_convert_encoding($this->xmbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xmbh = str_replace('<', '&lt;', $this->xmbh);
         $this->xmbh = str_replace('>', '&gt;', $this->xmbh);
         $this->Texto_tag .= "<td>" . $this->xmbh . "</td>\r\n";
   }
   //----- xmmc
   function NM_export_xmmc()
   {
         $this->xmmc = html_entity_decode($this->xmmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xmmc = strip_tags($this->xmmc);
         if (!NM_is_utf8($this->xmmc))
         {
             $this->xmmc = sc_convert_encoding($this->xmmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xmmc = str_replace('<', '&lt;', $this->xmmc);
         $this->xmmc = str_replace('>', '&gt;', $this->xmmc);
         $this->Texto_tag .= "<td>" . $this->xmmc . "</td>\r\n";
   }
   //----- ysje
   function NM_export_ysje()
   {
         nmgp_Form_Num_Val($this->ysje, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->ysje))
         {
             $this->ysje = sc_convert_encoding($this->ysje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ysje = str_replace('<', '&lt;', $this->ysje);
         $this->ysje = str_replace('>', '&gt;', $this->ysje);
         $this->Texto_tag .= "<td>" . $this->ysje . "</td>\r\n";
   }
   //----- zjly
   function NM_export_zjly()
   {
         $this->zjly = html_entity_decode($this->zjly, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zjly = strip_tags($this->zjly);
         if (!NM_is_utf8($this->zjly))
         {
             $this->zjly = sc_convert_encoding($this->zjly, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zjly = str_replace('<', '&lt;', $this->zjly);
         $this->zjly = str_replace('>', '&gt;', $this->zjly);
         $this->Texto_tag .= "<td>" . $this->zjly . "</td>\r\n";
   }
   //----- xmfzr
   function NM_export_xmfzr()
   {
         $this->xmfzr = html_entity_decode($this->xmfzr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xmfzr = strip_tags($this->xmfzr);
         if (!NM_is_utf8($this->xmfzr))
         {
             $this->xmfzr = sc_convert_encoding($this->xmfzr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xmfzr = str_replace('<', '&lt;', $this->xmfzr);
         $this->xmfzr = str_replace('>', '&gt;', $this->xmfzr);
         $this->Texto_tag .= "<td>" . $this->xmfzr . "</td>\r\n";
   }
   //----- sbbm
   function NM_export_sbbm()
   {
         $this->sbbm = html_entity_decode($this->sbbm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sbbm = strip_tags($this->sbbm);
         if (!NM_is_utf8($this->sbbm))
         {
             $this->sbbm = sc_convert_encoding($this->sbbm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sbbm = str_replace('<', '&lt;', $this->sbbm);
         $this->sbbm = str_replace('>', '&gt;', $this->sbbm);
         $this->Texto_tag .= "<td>" . $this->sbbm . "</td>\r\n";
   }
   //----- sbrq
   function NM_export_sbrq()
   {
         $conteudo_x = $this->sbrq;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->sbrq, "YYYY-MM-DD");
             $this->sbrq = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->sbrq))
         {
             $this->sbrq = sc_convert_encoding($this->sbrq, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sbrq = str_replace('<', '&lt;', $this->sbrq);
         $this->sbrq = str_replace('>', '&gt;', $this->sbrq);
         $this->Texto_tag .= "<td>" . $this->sbrq . "</td>\r\n";
   }
   //----- shzt
   function NM_export_shzt()
   {
         $this->shzt = html_entity_decode($this->shzt, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->shzt = strip_tags($this->shzt);
         if (!NM_is_utf8($this->shzt))
         {
             $this->shzt = sc_convert_encoding($this->shzt, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shzt = str_replace('<', '&lt;', $this->shzt);
         $this->shzt = str_replace('>', '&gt;', $this->shzt);
         $this->Texto_tag .= "<td>" . $this->shzt . "</td>\r\n";
   }
   //----- splc
   function NM_export_splc()
   {
         $this->splc = html_entity_decode($this->splc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->splc = strip_tags($this->splc);
         if (!NM_is_utf8($this->splc))
         {
             $this->splc = sc_convert_encoding($this->splc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->splc = str_replace('<', '&lt;', $this->splc);
         $this->splc = str_replace('>', '&gt;', $this->splc);
         $this->Texto_tag .= "<td>" . $this->splc . "</td>\r\n";
   }
   //----- ysly
   function NM_export_ysly()
   {
         $this->ysly = html_entity_decode($this->ysly, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ysly = strip_tags($this->ysly);
         if (!NM_is_utf8($this->ysly))
         {
             $this->ysly = sc_convert_encoding($this->ysly, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ysly = str_replace('<', '&lt;', $this->ysly);
         $this->ysly = str_replace('>', '&gt;', $this->ysly);
         $this->Texto_tag .= "<td>" . $this->ysly . "</td>\r\n";
   }
   //----- sbr
   function NM_export_sbr()
   {
         $this->sbr = html_entity_decode($this->sbr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sbr = strip_tags($this->sbr);
         if (!NM_is_utf8($this->sbr))
         {
             $this->sbr = sc_convert_encoding($this->sbr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sbr = str_replace('<', '&lt;', $this->sbr);
         $this->sbr = str_replace('>', '&gt;', $this->sbr);
         $this->Texto_tag .= "<td>" . $this->sbr . "</td>\r\n";
   }
   //----- qwcgrq
   function NM_export_qwcgrq()
   {
         $conteudo_x = $this->qwcgrq;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->qwcgrq, "YYYY-MM-DD");
             $this->qwcgrq = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->qwcgrq))
         {
             $this->qwcgrq = sc_convert_encoding($this->qwcgrq, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->qwcgrq = str_replace('<', '&lt;', $this->qwcgrq);
         $this->qwcgrq = str_replace('>', '&gt;', $this->qwcgrq);
         $this->Texto_tag .= "<td>" . $this->qwcgrq . "</td>\r\n";
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
   //----- lxdh
   function NM_export_lxdh()
   {
         $this->lxdh = html_entity_decode($this->lxdh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lxdh = strip_tags($this->lxdh);
         if (!NM_is_utf8($this->lxdh))
         {
             $this->lxdh = sc_convert_encoding($this->lxdh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lxdh = str_replace('<', '&lt;', $this->lxdh);
         $this->lxdh = str_replace('>', '&gt;', $this->lxdh);
         $this->Texto_tag .= "<td>" . $this->lxdh . "</td>\r\n";
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
   //----- cjsj
   function NM_export_cjsj()
   {
         if (substr($this->cjsj, 10, 1) == "-") 
         { 
             $this->cjsj = substr($this->cjsj, 0, 10) . " " . substr($this->cjsj, 11);
         } 
         if (substr($this->cjsj, 13, 1) == ".") 
         { 
            $this->cjsj = substr($this->cjsj, 0, 13) . ":" . substr($this->cjsj, 14, 2) . ":" . substr($this->cjsj, 17);
         } 
         $conteudo_x = $this->cjsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->cjsj, "YYYY-MM-DD HH:II:SS");
             $this->cjsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->cjsj))
         {
             $this->cjsj = sc_convert_encoding($this->cjsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cjsj = str_replace('<', '&lt;', $this->cjsj);
         $this->cjsj = str_replace('>', '&gt;', $this->cjsj);
         $this->Texto_tag .= "<td>" . $this->cjsj . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_lxgl'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_lxgl_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_lxgl"> 
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
