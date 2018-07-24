<?php

class grid_eval_plan_rtf
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
   function grid_eval_plan_rtf()
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
      $this->Arquivo   .= "_grid_eval_plan";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_eval_plan.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_eval_plan']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_eval_plan']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_eval_plan']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cpbmc = $Busca_temp['cpbmc']; 
          $tmp_pos = strpos($this->cpbmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cpbmc = substr($this->cpbmc, 0, $tmp_pos);
          }
          $this->p_cgbbh = $Busca_temp['p_cgbbh']; 
          $tmp_pos = strpos($this->p_cgbbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->p_cgbbh = substr($this->p_cgbbh, 0, $tmp_pos);
          }
          $this->p_cgbmc = $Busca_temp['p_cgbmc']; 
          $tmp_pos = strpos($this->p_cgbmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->p_cgbmc = substr($this->p_cgbmc, 0, $tmp_pos);
          }
          $this->p_qymc = $Busca_temp['p_qymc']; 
          $tmp_pos = strpos($this->p_qymc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->p_qymc = substr($this->p_qymc, 0, $tmp_pos);
          }
          $this->p_tjsj = $Busca_temp['p_tjsj']; 
          $tmp_pos = strpos($this->p_tjsj, "##@@");
          if ($tmp_pos !== false)
          {
              $this->p_tjsj = substr($this->p_tjsj, 0, $tmp_pos);
          }
          $this->p_tjsj_2 = $Busca_temp['p_tjsj_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT b.mc as cpbmc, p.cgbbh as p_cgbbh, p.cgbmc as p_cgbmc, p.qymc as p_qymc, p.begintime as p_begintime, p.endtime as p_endtime, p.tjsj as p_tjsj, p.cpbbh as p_cpbbh, p.tbbh as p_tbbh, p.zbggbh as p_zbggbh, p.tjr as p_tjr, p.id as p_id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT b.mc as cpbmc, p.cgbbh as p_cgbbh, p.cgbmc as p_cgbmc, p.qymc as p_qymc, p.begintime as p_begintime, p.endtime as p_endtime, p.tjsj as p_tjsj, p.cpbbh as p_cpbbh, p.tbbh as p_tbbh, p.zbggbh as p_zbggbh, p.tjr as p_tjr, p.id as p_id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['cpbmc'] = "" . $this->Ini->Nm_lang['lang_eval_cpresult_fld_cpbmc'] . "";
      $this->New_label['p_cgbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cgbbh'] . "";
      $this->New_label['p_cgbmc'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cgbmc'] . "";
      $this->New_label['p_qymc'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_qymc'] . "";
      $this->New_label['p_begintime'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_begintime'] . "";
      $this->New_label['p_endtime'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_endtime'] . "";
      $this->New_label['p_tjsj'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_tjsj'] . "";
      $this->New_label['p_cpbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cpbbh'] . "";
      $this->New_label['p_tbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_tbbh'] . "";
      $this->New_label['p_zbggbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_zbggbh'] . "";
      $this->New_label['p_tjr'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_tjr'] . "";
      $this->New_label['p_isremind'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_isremind'] . "";
      $this->New_label['p_remindtime'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_isremind'] . "";
      $this->New_label['p_autoid'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_autoid'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['cpbmc'])) ? $this->New_label['cpbmc'] : ""; 
          if ($Cada_col == "cpbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_cgbbh'])) ? $this->New_label['p_cgbbh'] : ""; 
          if ($Cada_col == "p_cgbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_cgbmc'])) ? $this->New_label['p_cgbmc'] : ""; 
          if ($Cada_col == "p_cgbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_qymc'])) ? $this->New_label['p_qymc'] : ""; 
          if ($Cada_col == "p_qymc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_begintime'])) ? $this->New_label['p_begintime'] : ""; 
          if ($Cada_col == "p_begintime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_endtime'])) ? $this->New_label['p_endtime'] : ""; 
          if ($Cada_col == "p_endtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_tjsj'])) ? $this->New_label['p_tjsj'] : ""; 
          if ($Cada_col == "p_tjsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_cpbbh'])) ? $this->New_label['p_cpbbh'] : ""; 
          if ($Cada_col == "p_cpbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_tbbh'])) ? $this->New_label['p_tbbh'] : ""; 
          if ($Cada_col == "p_tbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_zbggbh'])) ? $this->New_label['p_zbggbh'] : ""; 
          if ($Cada_col == "p_zbggbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p_tjr'])) ? $this->New_label['p_tjr'] : ""; 
          if ($Cada_col == "p_tjr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->cpbmc = $rs->fields[0] ;  
         $this->p_cgbbh = $rs->fields[1] ;  
         $this->p_cgbmc = $rs->fields[2] ;  
         $this->p_qymc = $rs->fields[3] ;  
         $this->p_begintime = $rs->fields[4] ;  
         $this->p_endtime = $rs->fields[5] ;  
         $this->p_tjsj = $rs->fields[6] ;  
         $this->p_cpbbh = $rs->fields[7] ;  
         $this->p_cpbbh = (string)$this->p_cpbbh;
         $this->p_tbbh = $rs->fields[8] ;  
         $this->p_tbbh = (string)$this->p_tbbh;
         $this->p_zbggbh = $rs->fields[9] ;  
         $this->p_zbggbh = (string)$this->p_zbggbh;
         $this->p_tjr = $rs->fields[10] ;  
         $this->p_id = $rs->fields[11] ;  
         $this->p_id = (string)$this->p_id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['field_order'] as $Cada_col)
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
   //----- cpbmc
   function NM_export_cpbmc()
   {
         $this->cpbmc = html_entity_decode($this->cpbmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cpbmc = strip_tags($this->cpbmc);
         if (!NM_is_utf8($this->cpbmc))
         {
             $this->cpbmc = sc_convert_encoding($this->cpbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cpbmc = str_replace('<', '&lt;', $this->cpbmc);
         $this->cpbmc = str_replace('>', '&gt;', $this->cpbmc);
         $this->Texto_tag .= "<td>" . $this->cpbmc . "</td>\r\n";
   }
   //----- p_cgbbh
   function NM_export_p_cgbbh()
   {
         $this->p_cgbbh = html_entity_decode($this->p_cgbbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_cgbbh = strip_tags($this->p_cgbbh);
         if (!NM_is_utf8($this->p_cgbbh))
         {
             $this->p_cgbbh = sc_convert_encoding($this->p_cgbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_cgbbh = str_replace('<', '&lt;', $this->p_cgbbh);
         $this->p_cgbbh = str_replace('>', '&gt;', $this->p_cgbbh);
         $this->Texto_tag .= "<td>" . $this->p_cgbbh . "</td>\r\n";
   }
   //----- p_cgbmc
   function NM_export_p_cgbmc()
   {
         $this->p_cgbmc = html_entity_decode($this->p_cgbmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_cgbmc = strip_tags($this->p_cgbmc);
         if (!NM_is_utf8($this->p_cgbmc))
         {
             $this->p_cgbmc = sc_convert_encoding($this->p_cgbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_cgbmc = str_replace('<', '&lt;', $this->p_cgbmc);
         $this->p_cgbmc = str_replace('>', '&gt;', $this->p_cgbmc);
         $this->Texto_tag .= "<td>" . $this->p_cgbmc . "</td>\r\n";
   }
   //----- p_qymc
   function NM_export_p_qymc()
   {
         $this->p_qymc = html_entity_decode($this->p_qymc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_qymc = strip_tags($this->p_qymc);
         if (!NM_is_utf8($this->p_qymc))
         {
             $this->p_qymc = sc_convert_encoding($this->p_qymc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_qymc = str_replace('<', '&lt;', $this->p_qymc);
         $this->p_qymc = str_replace('>', '&gt;', $this->p_qymc);
         $this->Texto_tag .= "<td>" . $this->p_qymc . "</td>\r\n";
   }
   //----- p_begintime
   function NM_export_p_begintime()
   {
         if (substr($this->p_begintime, 10, 1) == "-") 
         { 
             $this->p_begintime = substr($this->p_begintime, 0, 10) . " " . substr($this->p_begintime, 11);
         } 
         if (substr($this->p_begintime, 13, 1) == ".") 
         { 
            $this->p_begintime = substr($this->p_begintime, 0, 13) . ":" . substr($this->p_begintime, 14, 2) . ":" . substr($this->p_begintime, 17);
         } 
         $conteudo_x = $this->p_begintime;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->p_begintime, "YYYY-MM-DD HH:II:SS");
             $this->p_begintime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->p_begintime))
         {
             $this->p_begintime = sc_convert_encoding($this->p_begintime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_begintime = str_replace('<', '&lt;', $this->p_begintime);
         $this->p_begintime = str_replace('>', '&gt;', $this->p_begintime);
         $this->Texto_tag .= "<td>" . $this->p_begintime . "</td>\r\n";
   }
   //----- p_endtime
   function NM_export_p_endtime()
   {
         if (substr($this->p_endtime, 10, 1) == "-") 
         { 
             $this->p_endtime = substr($this->p_endtime, 0, 10) . " " . substr($this->p_endtime, 11);
         } 
         if (substr($this->p_endtime, 13, 1) == ".") 
         { 
            $this->p_endtime = substr($this->p_endtime, 0, 13) . ":" . substr($this->p_endtime, 14, 2) . ":" . substr($this->p_endtime, 17);
         } 
         $conteudo_x = $this->p_endtime;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->p_endtime, "YYYY-MM-DD HH:II:SS");
             $this->p_endtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->p_endtime))
         {
             $this->p_endtime = sc_convert_encoding($this->p_endtime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_endtime = str_replace('<', '&lt;', $this->p_endtime);
         $this->p_endtime = str_replace('>', '&gt;', $this->p_endtime);
         $this->Texto_tag .= "<td>" . $this->p_endtime . "</td>\r\n";
   }
   //----- p_tjsj
   function NM_export_p_tjsj()
   {
         if (substr($this->p_tjsj, 10, 1) == "-") 
         { 
             $this->p_tjsj = substr($this->p_tjsj, 0, 10) . " " . substr($this->p_tjsj, 11);
         } 
         if (substr($this->p_tjsj, 13, 1) == ".") 
         { 
            $this->p_tjsj = substr($this->p_tjsj, 0, 13) . ":" . substr($this->p_tjsj, 14, 2) . ":" . substr($this->p_tjsj, 17);
         } 
         $conteudo_x = $this->p_tjsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->p_tjsj, "YYYY-MM-DD HH:II:SS");
             $this->p_tjsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->p_tjsj))
         {
             $this->p_tjsj = sc_convert_encoding($this->p_tjsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_tjsj = str_replace('<', '&lt;', $this->p_tjsj);
         $this->p_tjsj = str_replace('>', '&gt;', $this->p_tjsj);
         $this->Texto_tag .= "<td>" . $this->p_tjsj . "</td>\r\n";
   }
   //----- p_cpbbh
   function NM_export_p_cpbbh()
   {
         nmgp_Form_Num_Val($this->p_cpbbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->p_cpbbh))
         {
             $this->p_cpbbh = sc_convert_encoding($this->p_cpbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_cpbbh = str_replace('<', '&lt;', $this->p_cpbbh);
         $this->p_cpbbh = str_replace('>', '&gt;', $this->p_cpbbh);
         $this->Texto_tag .= "<td>" . $this->p_cpbbh . "</td>\r\n";
   }
   //----- p_tbbh
   function NM_export_p_tbbh()
   {
         nmgp_Form_Num_Val($this->p_tbbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->p_tbbh))
         {
             $this->p_tbbh = sc_convert_encoding($this->p_tbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_tbbh = str_replace('<', '&lt;', $this->p_tbbh);
         $this->p_tbbh = str_replace('>', '&gt;', $this->p_tbbh);
         $this->Texto_tag .= "<td>" . $this->p_tbbh . "</td>\r\n";
   }
   //----- p_zbggbh
   function NM_export_p_zbggbh()
   {
         nmgp_Form_Num_Val($this->p_zbggbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->p_zbggbh))
         {
             $this->p_zbggbh = sc_convert_encoding($this->p_zbggbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_zbggbh = str_replace('<', '&lt;', $this->p_zbggbh);
         $this->p_zbggbh = str_replace('>', '&gt;', $this->p_zbggbh);
         $this->Texto_tag .= "<td>" . $this->p_zbggbh . "</td>\r\n";
   }
   //----- p_tjr
   function NM_export_p_tjr()
   {
         $this->p_tjr = html_entity_decode($this->p_tjr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_tjr = strip_tags($this->p_tjr);
         if (!NM_is_utf8($this->p_tjr))
         {
             $this->p_tjr = sc_convert_encoding($this->p_tjr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p_tjr = str_replace('<', '&lt;', $this->p_tjr);
         $this->p_tjr = str_replace('>', '&gt;', $this->p_tjr);
         $this->Texto_tag .= "<td>" . $this->p_tjr . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_eval_plan'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_eval_plan'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_eval_plan_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_eval_plan"> 
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
