<?php

class grid_cg_xmzjk_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function grid_cg_xmzjk_pesq()
   {
      $this->dlsj_opc_bi[] = "TP";
      $this->dlsj_opc_bi[] = "HJ";
      $this->dlsj_opc_bi[] = "OT";
      $this->dlsj_opc_bi[] = "U7";
      $this->dlsj_opc_bi[] = "SP";
      $this->dlsj_opc_bi[] = "US";
      $this->dlsj_opc_bi[] = "MM";
      $this->dlsj_opc_bi[] = "UM";
      $this->dlsj_opc_bi[] = "CY";
      $this->dlsj_opc_bi[] = "LY";
      $this->dlsj_opc_bi[] = "M24";
      $this->dlsj_opc_bi[] = "M18";
      $this->dlsj_opc_bi[] = "YY";
      $this->dlsj_opc_bi[] = "M6";
      $this->dlsj_opc_bi[] = "M3";
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->init();
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("zh_cn");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_filter_save")
      {
          $this->salva_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . grid_cg_xmzjk_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_cg_xmzjk_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_cg_xmzjk_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }

      if ($this->NM_ajax_opcao == "ajax_filter_delete")
      {
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  grid_cg_xmzjk_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_cg_xmzjk_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_cg_xmzjk_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }
      if ($this->NM_ajax_opcao == "ajax_filter_select")
      {
          $this->Arr_result = $this->recupera_filtro();
      }

      if ($this->NM_ajax_opcao == "ajax_ch_bi_search")
      {
          $Campo_bi = "SC_" . $Campo_bi;
          $this->process_cond_bi($Opc_bi, $BI_data1, $BI_data2);
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_dia", 'value' => substr($BI_data1, 0, 2));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_mes", 'value' => substr($BI_data1, 2, 2));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_ano", 'value' => substr($BI_data1, 4));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_dia", 'value' => substr($BI_data2, 0, 2));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_mes", 'value' => substr($BI_data2, 2, 2));
          $this->Arr_result['ch_bi'][] = array('field' => $Campo_bi . "_input_2_ano", 'value' => substr($BI_data2, 4));
      }
      if ($this->NM_ajax_opcao == 'autocomp_cgbbh')
      {
          $cgbbh = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cgbbh($cgbbh);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_cgbmc')
      {
          $cgbmc = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cgbmc($cgbmc);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_zjbh')
      {
          $zjbh = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_zjbh($zjbh);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_xm')
      {
          $xm = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_xm($xm);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_pc')
      {
          $pc = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_pc($pc);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
   }
   function lookup_ajax_cgbbh($cgbbh)
   {
      $cgbbh = substr($this->Db->qstr($cgbbh), 1, -1);
            $cgbbh_look = substr($this->Db->qstr($cgbbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbbh from " . $this->Ini->nm_tabela . " where  cgbbh like '%" . $cgbbh . "%'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_cgbmc($cgbmc)
   {
      $cgbmc = substr($this->Db->qstr($cgbmc), 1, -1);
            $cgbmc_look = substr($this->Db->qstr($cgbmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbmc from " . $this->Ini->nm_tabela . " where  cgbmc like '%" . $cgbmc . "%'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_zjbh($zjbh)
   {
      $zjbh = substr($this->Db->qstr($zjbh), 1, -1);
            $zjbh_look = substr($this->Db->qstr($zjbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct zjbh from " . $this->Ini->nm_tabela . " where  zjbh like '%" . $zjbh . "%'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_xm($xm)
   {
      $xm = substr($this->Db->qstr($xm), 1, -1);
            $xm_look = substr($this->Db->qstr($xm), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xm from " . $this->Ini->nm_tabela . " where  xm like '%" . $xm . "%'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_pc($pc)
   {
      $pc = substr($this->Db->qstr($pc), 1, -1);
            $pc_look = substr($this->Db->qstr($pc), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where  pc like '%" . $pc . "%'"; 
      }
      else
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where  pc like '%" . $pc . "%'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          scriptcase_error_display($this->Campos_Mens_erro, ""); 
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where ";
         $this->comando_sum .= " and ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "id";$Nm_numeric[] = "zbggbh";$Nm_numeric[] = "pc";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      $Nm_datas[] = "dlsj";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_datas))
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['SC_sep_date1'];
          }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "cg_xmzjk.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " like ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not like ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str = "";
               $nm_cond  = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       $Bi_opcs = array("TP", "HJ", "OT", "U7", "SP", "US", "MM", "UM", "AM", "PS", "SS", "P3", "PM", "P7", "CY", "LY", "YY", "M6", "M3", "M18", "M24");
       if (in_array($cond, $Bi_opcs))
       {
           $this->process_cond_bi($cond, $BI_data1, $BI_data2);
           $cond = strtoupper($cond);
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", substr($BI_data1, 4),    $out_dt1);
               $out_dt1 = str_replace("mm",   substr($BI_data1, 2, 2), $out_dt1);
               $out_dt1 = str_replace("dd",   substr($BI_data1, 0, 2), $out_dt1);
               $out_dt1 = str_replace("hh",   "00", $out_dt1);
               $out_dt1 = str_replace("ii",   "00", $out_dt1);
               $out_dt1 = str_replace("ss",   "00", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", substr($BI_data2, 4),    $out_dt2);
               $out_dt2 = str_replace("mm",   substr($BI_data2, 2, 2), $out_dt2);
               $out_dt2 = str_replace("dd",   substr($BI_data2, 0, 2), $out_dt2);
               $out_dt2 = str_replace("hh",   "23", $out_dt2);
               $out_dt2 = str_replace("ii",   "59", $out_dt2);
               $out_dt2 = str_replace("ss",   "59", $out_dt2);
               if ($tp_nd == "datahora")
               {
                   $cond = "BW";
               }
           }
           else
           {
               $out_dt1 = substr($BI_data1, 4) . "-" . substr($BI_data1, 2, 2) . "-" . substr($BI_data1, 0, 2);
               $out_dt2 = substr($BI_data2, 4) . "-" . substr($BI_data2, 2, 2) . "-" . substr($BI_data2, 0, 2);
               if ($tsql == "DATETIME")
               {
                   if ($cond != "BW")
                   {
                       $out_dt2 = $out_dt1;
                       $cond    = "BW";
                   }
                   $out_dt1 .= " 00:00:00";
                   $out_dt2 .= " 23:59:59";
               }
           }
           $val = array();
           $val[0] = $out_dt1;
           $val[1] = $out_dt2;
           return;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_xmzjk'] ?></TITLE>
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
</HEAD>
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_xmzjk'] ?></TITLE>
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
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_cg_xmzjk/grid_cg_xmzjk_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_cg_xmzjk_ajax_search.js"></script>
 <script type="text/javascript" src="grid_cg_xmzjk_ajax.js"></script>
 <script type="text/javascript">
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_dlsj_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_dlsj_dia').value + '/';
          var_dt_ini += document.getElementById('SC_dlsj_mes').value + '/';
          var_dt_ini += document.getElementById('SC_dlsj_ano').value;
          document.getElementById('sc_dlsj_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_dlsj_dia').value = aParts[0];
          document.getElementById('SC_dlsj_mes').value = aParts[1];
          document.getElementById('SC_dlsj_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_dlsj_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_dlsj_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_dlsj_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_dlsj_input_2_ano').value;
          document.getElementById('sc_dlsj_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_dlsj_input_2_dia').value = aParts[0];
          document.getElementById('SC_dlsj_input_2_mes').value = aParts[1];
          document.getElementById('SC_dlsj_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>'],
    dayNamesMin: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd


 $(function() {

   SC_carga_evt_jquery();
   $('input:text.sc-js-input').listen();
   scJQCalendarAdd('');
 });
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  opc = nm_cond.value;
  if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
  {
      xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = 'none'");
      ajax_ch_bi_search(nm_nome_obj, nm_cond.value);
  }
  else
  {
      if (nm_nome_obj == "dlsj")
      {
          xx = eval("document.getElementById('Nm_bi_dados_" + nm_nome_obj + "').style.display = 'none'");
          xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = ''");
      }
  }
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  var str_out = "";
  str_out += 'SC_cgbbh_cond#NMF#' + search_get_sel_txt('SC_cgbbh_cond') + '@NMF@';
  str_out += 'SC_cgbbh#NMF#' + search_get_text('SC_cgbbh') + '@NMF@';
  str_out += 'id_ac_cgbbh#NMF#' + search_get_text('id_ac_cgbbh') + '@NMF@';
  str_out += 'SC_cgbmc_cond#NMF#' + search_get_sel_txt('SC_cgbmc_cond') + '@NMF@';
  str_out += 'SC_cgbmc#NMF#' + search_get_text('SC_cgbmc') + '@NMF@';
  str_out += 'id_ac_cgbmc#NMF#' + search_get_text('id_ac_cgbmc') + '@NMF@';
  str_out += 'SC_zjbh_cond#NMF#' + search_get_sel_txt('SC_zjbh_cond') + '@NMF@';
  str_out += 'SC_zjbh#NMF#' + search_get_text('SC_zjbh') + '@NMF@';
  str_out += 'id_ac_zjbh#NMF#' + search_get_text('id_ac_zjbh') + '@NMF@';
  str_out += 'SC_xm_cond#NMF#' + search_get_sel_txt('SC_xm_cond') + '@NMF@';
  str_out += 'SC_xm#NMF#' + search_get_text('SC_xm') + '@NMF@';
  str_out += 'id_ac_xm#NMF#' + search_get_text('id_ac_xm') + '@NMF@';
  str_out += 'SC_xb_cond#NMF#' + search_get_sel_txt('SC_xb_cond') + '@NMF@';
  str_out += 'SC_xb#NMF#' + search_get_checkbox('SC_xb') + '@NMF@';
  str_out += 'SC_zc_cond#NMF#' + search_get_sel_txt('SC_zc_cond') + '@NMF@';
  str_out += 'SC_zc#NMF#' + search_get_checkbox('SC_zc') + '@NMF@';
  str_out += 'SC_pc_cond#NMF#' + search_get_sel_txt('SC_pc_cond') + '@NMF@';
  str_out += 'SC_pc#NMF#' + search_get_text('SC_pc') + '@NMF@';
  str_out += 'id_ac_pc#NMF#' + search_get_text('id_ac_pc') + '@NMF@';
  str_out += 'SC_pc_input_2#NMF#' + search_get_text('SC_pc_input_2') + '@NMF@';
  str_out += 'SC_dlsj_cond#NMF#' + search_get_sel_txt('SC_dlsj_cond') + '@NMF@';
  opc = search_get_sel_txt('SC_dlsj_cond');
  if (opc != "TP" && opc != "HJ" && opc != "OT" && opc != "U7" && opc != "SP" && opc != "US" && opc != "MM" && opc != "UM" && opc != "AM" && opc != "PS" && opc != "SS" && opc != "P3" && opc != "PM" && opc != "P7" && opc != "CY" && opc != "LY" && opc != "YY" && opc != "M6" && opc != "M3" && opc != "M18" && opc != "M24")
  {
      str_out += 'SC_dlsj_dia#NMF#' + search_get_sel_txt('SC_dlsj_dia') + '@NMF@';
      str_out += 'SC_dlsj_mes#NMF#' + search_get_sel_txt('SC_dlsj_mes') + '@NMF@';
      str_out += 'SC_dlsj_ano#NMF#' + search_get_sel_txt('SC_dlsj_ano') + '@NMF@';
      str_out += 'SC_dlsj_input_2_dia#NMF#' + search_get_sel_txt('SC_dlsj_input_2_dia') + '@NMF@';
      str_out += 'SC_dlsj_input_2_mes#NMF#' + search_get_sel_txt('SC_dlsj_input_2_mes') + '@NMF@';
      str_out += 'SC_dlsj_input_2_ano#NMF#' + search_get_sel_txt('SC_dlsj_input_2_ano') + '@NMF@';
  }
  str_out += 'SC_dlsj_hor#NMF#' + search_get_sel_txt('SC_dlsj_hor') + '@NMF@';
  str_out += 'SC_dlsj_min#NMF#' + search_get_sel_txt('SC_dlsj_min') + '@NMF@';
  str_out += 'SC_dlsj_seg#NMF#' + search_get_sel_txt('SC_dlsj_seg') + '@NMF@';
  str_out += 'SC_dlsj_input_2_hor#NMF#' + search_get_sel_txt('SC_dlsj_input_2_hor') + '@NMF@';
  str_out += 'SC_dlsj_input_2_min#NMF#' + search_get_sel_txt('SC_dlsj_input_2_min') + '@NMF@';
  str_out += 'SC_dlsj_input_2_seg#NMF#' + search_get_sel_txt('SC_dlsj_input_2_seg') + '@NMF@';
  str_out += 'NM_operador#NMF#' + search_get_text('SC_NM_operador');
  str_out  = str_out.replace(/[+]/g, "__NM_PLUS__");
  var save_name = search_get_text('SC_nmgp_save_name_' + pos);
  var save_opt  = search_get_sel_txt('SC_nmgp_save_option_' + pos);
  ajax_save_filter(save_name, save_opt, str_out, pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  ajax_select_filter(obj_sel.options[index].value);
 }
 function nm_submit_filter_del(pos)
 {
  if (pos == 'top')
  {
      obj_sel = document.F1.elements['NM_filters_del_top'];
  }
  if (pos == 'bot')
  {
      obj_sel = document.F1.elements['NM_filters_del_bot'];
  }
  index   = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  parm = obj_sel.options[index].value;
  ajax_delete_filter(parm);
 }
 function nm_marca_check(check_obj, tem_seq)
 {
    seq = 0;
    len_check = document.F1.elements.length;
    for (i = 0; i < len_check; i++)
    {
        tst_obj = check_obj + "[]";
        if (tem_seq == "S")
        {
            tst_obj = check_obj + "[" + seq + "]";
        }
        if (document.F1.elements[i].name == tst_obj)
        {
            document.F1.elements[i].checked = true;
            seq++;
        }
    }
 }
 function nm_limpa_check(check_obj, tem_seq)
 {
    seq = 0;
    len_check = document.F1.elements.length;
    for (i = 0; i < len_check; i++)
    {
        tst_obj = check_obj + "[]";
        if (tem_seq == "S")
        {
            tst_obj = check_obj + "[" + seq + "]";
        }
        if (document.F1.elements[i].name == tst_obj)
        {
            document.F1.elements[i].checked = false;
            seq++;
        }
    }
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
   $("#id_ac_cgbbh").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_cgbbh",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_cgbbh").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_cgbbh").val( $(this).val() );
       }
     }
   });
   $("#id_ac_cgbmc").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_cgbmc",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_cgbmc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_cgbmc").val( $(this).val() );
       }
     }
   });
   $("#id_ac_zjbh").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_zjbh",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_zjbh").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_zjbh").val( $(this).val() );
       }
     }
   });
   $("#id_ac_xm").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_xm",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_xm").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_xm").val( $(this).val() );
       }
     }
   });
   $("#id_ac_pc").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_pc",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_pc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_pc").val( $(this).val() );
       }
     }
   });
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" >
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFilterHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFilterHeaderFont"><span><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_xmzjk'] ?></span></td>
            <td id="lin1_col2" class="scFilterHeaderFont"><span><?php echo $nm_data_fixa; ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $cgbbh_cond, $cgbbh, $cgbbh_autocomp,
             $cgbmc_cond, $cgbmc, $cgbmc_autocomp,
             $zjbh_cond, $zjbh, $zjbh_autocomp,
             $xm_cond, $xm, $xm_autocomp,
             $xb_cond, $xb,
             $zc_cond, $zc,
             $pc_cond, $pc, $pc_input_2, $pc_autocomp,
             $dlsj_cond, $dlsj, $dlsj_dia, $dlsj_mes, $dlsj_ano, $dlsj_hor, $dlsj_min, $dlsj_seg, $dlsj_input_2_dia, $dlsj_input_2_mes, $dlsj_input_2_ano, $dlsj_input_2_min, $dlsj_input_2_hor, $dlsj_input_2_seg,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->New_label['yddh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_yddh'] . "";
      $this->New_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_email'] . "";
      $this->New_label['zbggbh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . "";
      $this->New_label['sfzh'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_sfzh'] . "";
      $this->New_label['gzdw'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_gzdw'] . "";
      $this->New_label['zy'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zy'] . "";
      $this->New_label['work'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_work'] . "";
      $this->New_label['dlr'] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlr'] . "";
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_cg_xmzjk", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $cgbbh = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbbh']; 
          $cgbbh_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbbh_cond']; 
          $cgbmc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbmc']; 
          $cgbmc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbmc_cond']; 
          $zjbh = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zjbh']; 
          $zjbh_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zjbh_cond']; 
          $xm = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xm']; 
          $xm_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xm_cond']; 
          $xb = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xb']; 
          $xb_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xb_cond']; 
          $zc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zc']; 
          $zc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zc_cond']; 
          $pc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc']; 
          $pc_input_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc_input_2']; 
          $pc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc_cond']; 
          $dlsj_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_dia']; 
          $dlsj_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_mes']; 
          $dlsj_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_ano']; 
          $dlsj_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_dia']; 
          $dlsj_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_mes']; 
          $dlsj_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_ano']; 
          $dlsj_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_hor']; 
          $dlsj_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_min']; 
          $dlsj_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_seg']; 
          $dlsj_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_hor']; 
          $dlsj_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_min']; 
          $dlsj_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_seg']; 
          $dlsj_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['NM_operador']; 
      } 
      if (!isset($cgbbh_cond) || empty($cgbbh_cond))
      {
         $cgbbh_cond = "qp";
      }
      if (!isset($cgbmc_cond) || empty($cgbmc_cond))
      {
         $cgbmc_cond = "qp";
      }
      if (!isset($zjbh_cond) || empty($zjbh_cond))
      {
         $zjbh_cond = "qp";
      }
      if (!isset($xm_cond) || empty($xm_cond))
      {
         $xm_cond = "qp";
      }
      if (!isset($xb_cond) || empty($xb_cond))
      {
         $xb_cond = "qp";
      }
      if (!isset($zc_cond) || empty($zc_cond))
      {
         $zc_cond = "qp";
      }
      if (!isset($pc_cond) || empty($pc_cond))
      {
         $pc_cond = "gt";
      }
      if (!isset($dlsj_cond) || empty($dlsj_cond))
      {
         $dlsj_cond = "TP";
      }
      if (isset($dlsj_cond) && in_array($dlsj_cond, $this->dlsj_opc_bi))
      {
         $Temp_cond = $dlsj_cond;
         $this->process_cond_bi($Temp_cond, $BI_data1, $BI_data2);
         $dlsj_dia = substr($BI_data1, 0, 2);
         $dlsj_mes = substr($BI_data1, 2, 2);
         $dlsj_ano = substr($BI_data1, 4);
         $dlsj_input_2_dia = substr($BI_data2, 0, 2);
         $dlsj_input_2_mes = substr($BI_data2, 2, 2);
         $dlsj_input_2_ano = substr($BI_data2, 4);
         $Script_BI .= "  formata_bi_dlsj('" . $dlsj_cond . "');\r\n";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_cgbbh = (in_array($cgbbh_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cgbmc = (in_array($cgbmc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_zjbh = (in_array($zjbh_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_xm = (in_array($xm_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_xb = (in_array($xb_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_zc = (in_array($zc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_pc = (in_array($pc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_dlsj = (in_array($dlsj_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_pc = ('bw' == $pc_cond) ? $display_aberto : $display_fechado;
      $str_display_dlsj = ('bw' == $dlsj_cond) ? $display_aberto : $display_fechado;

      // xb
      if (is_array($xb) && !empty($xb))
      {
         $tmp_array = array();
         $xb_val_str = "";
         foreach ($xb as $tmp_val_cmp)
         {
            if ("" != $xb_val_str)
            {
               $xb_val_str .= ", ";
            }
            $tmp_pos = strpos($tmp_val_cmp, "##@@");
            if ($tmp_pos === false)
            {
                $tmp_array[] = $tmp_val_cmp;
            }
            else
            {
                $tmp_val_cmp = substr($tmp_val_cmp, 0, $tmp_pos);
                $tmp_array[] = $tmp_val_cmp;
            }
            $xb_val_str .= "'$tmp_val_cmp'";
         }
         $xb = $tmp_array;
      }
      else
      {
         $xb_val_str = "''";
      }
      // zc
      if (is_array($zc) && !empty($zc))
      {
         $tmp_array = array();
         $zc_val_str = "";
         foreach ($zc as $tmp_val_cmp)
         {
            if ("" != $zc_val_str)
            {
               $zc_val_str .= ", ";
            }
            $tmp_pos = strpos($tmp_val_cmp, "##@@");
            if ($tmp_pos === false)
            {
                $tmp_array[] = $tmp_val_cmp;
            }
            else
            {
                $tmp_val_cmp = substr($tmp_val_cmp, 0, $tmp_pos);
                $tmp_array[] = $tmp_val_cmp;
            }
            $zc_val_str .= "'$tmp_val_cmp'";
         }
         $zc = $tmp_array;
      }
      else
      {
         $zc_val_str = "''";
      }
      if (!isset($cgbbh) || $cgbbh == "")
      {
          $cgbbh = "";
      }
      if (isset($cgbbh) && !empty($cgbbh))
      {
         $tmp_pos = strpos($cgbbh, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cgbbh = substr($cgbbh, 0, $tmp_pos);
         }
      }
      if (!isset($cgbmc) || $cgbmc == "")
      {
          $cgbmc = "";
      }
      if (isset($cgbmc) && !empty($cgbmc))
      {
         $tmp_pos = strpos($cgbmc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cgbmc = substr($cgbmc, 0, $tmp_pos);
         }
      }
      if (!isset($zjbh) || $zjbh == "")
      {
          $zjbh = "";
      }
      if (isset($zjbh) && !empty($zjbh))
      {
         $tmp_pos = strpos($zjbh, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $zjbh = substr($zjbh, 0, $tmp_pos);
         }
      }
      if (!isset($xm) || $xm == "")
      {
          $xm = "";
      }
      if (isset($xm) && !empty($xm))
      {
         $tmp_pos = strpos($xm, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $xm = substr($xm, 0, $tmp_pos);
         }
      }
      if (!isset($xb) || $xb == "")
      {
          $xb = array();
      }
      if (!isset($zc) || $zc == "")
      {
          $zc = array();
      }
      if (!isset($pc) || $pc == "")
      {
          $pc = "";
      }
      if (isset($pc) && !empty($pc))
      {
         $tmp_pos = strpos($pc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $pc = substr($pc, 0, $tmp_pos);
         }
      }
      if (!isset($dlsj) || $dlsj == "")
      {
          $dlsj = "";
      }
      if (isset($dlsj) && !empty($dlsj))
      {
         $tmp_pos = strpos($dlsj, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $dlsj = substr($dlsj, 0, $tmp_pos);
         }
      }
?>
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
<?php
   if (is_file("grid_cg_xmzjk_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_xmzjk_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_top" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_top').style.display = 'none'", "document.getElementById('Salvar_filters_top').style.display = 'none'", "Cancel_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_top" name="nmgp_save_name_top" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('top')", "nm_save_form('top')", "Save_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_top" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_top">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_top" name="NM_filters_del_top" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('top')", "nm_submit_filter_del('top')", "Exc_filtro_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
<?php
   if (is_file("grid_cg_xmzjk_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_xmzjk_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_top" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_top').style.display = 'none'", "document.getElementById('Salvar_filters_top').style.display = 'none'", "Cancel_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_top" name="nmgp_save_name_top" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('top')", "nm_save_form('top')", "Save_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_top" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_top">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_top" name="NM_filters_del_top" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('top')", "nm_submit_filter_del('top')", "Exc_filtro_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
 ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['cgbbh'])) ? $this->New_label['cgbbh'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_cgbbh_cond" name="cgbbh_cond" onChange="nm_campos_between(document.getElementById('id_vis_cgbbh'), this, 'cgbbh')">
       <OPTION value="qp" <?php if ("qp" == $cgbbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $cgbbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $cgbbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $cgbbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_cgbbh" <?php echo $str_hide_cgbbh?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['cgbbh'])) ? $this->New_label['cgbbh'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . "";
 $nmgp_tab_label .= "cgbbh?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $cgbbh_look = substr($this->Db->qstr($cgbbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbbh from " . $this->Ini->nm_tabela . " where cgbbh = '$cgbbh_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$cgbbh]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cgbbh];
      }
      else
      {
          $sAutocompValue = $cgbbh;
      }
?>
<INPUT  type="text" id="SC_cgbbh" name="cgbbh" value="<?php echo NM_encode_input($cgbbh) ?>" size=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_cgbbh" name="cgbbh_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['cgbmc'])) ? $this->New_label['cgbmc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_cgbmc_cond" name="cgbmc_cond" onChange="nm_campos_between(document.getElementById('id_vis_cgbmc'), this, 'cgbmc')">
       <OPTION value="qp" <?php if ("qp" == $cgbmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $cgbmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $cgbmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $cgbmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_cgbmc" <?php echo $str_hide_cgbmc?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['cgbmc'])) ? $this->New_label['cgbmc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . "";
 $nmgp_tab_label .= "cgbmc?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $cgbmc_look = substr($this->Db->qstr($cgbmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbmc from " . $this->Ini->nm_tabela . " where cgbmc = '$cgbmc_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$cgbmc]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cgbmc];
      }
      else
      {
          $sAutocompValue = $cgbmc;
      }
?>
<INPUT  type="text" id="SC_cgbmc" name="cgbmc" value="<?php echo NM_encode_input($cgbmc) ?>" size=32 alt="{datatype: 'text', maxLength: 64, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_cgbmc" name="cgbmc_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['zjbh'])) ? $this->New_label['zjbh'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zjbh'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_zjbh_cond" name="zjbh_cond" onChange="nm_campos_between(document.getElementById('id_vis_zjbh'), this, 'zjbh')">
       <OPTION value="qp" <?php if ("qp" == $zjbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $zjbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $zjbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $zjbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_zjbh" <?php echo $str_hide_zjbh?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['zjbh'])) ? $this->New_label['zjbh'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zjbh'] . "";
 $nmgp_tab_label .= "zjbh?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $zjbh_look = substr($this->Db->qstr($zjbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct zjbh from " . $this->Ini->nm_tabela . " where zjbh = '$zjbh_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$zjbh]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$zjbh];
      }
      else
      {
          $sAutocompValue = $zjbh;
      }
?>
<INPUT  type="text" id="SC_zjbh" name="zjbh" value="<?php echo NM_encode_input($zjbh) ?>" size=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_zjbh" name="zjbh_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['xm'])) ? $this->New_label['xm'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xm'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_xm_cond" name="xm_cond" onChange="nm_campos_between(document.getElementById('id_vis_xm'), this, 'xm')">
       <OPTION value="qp" <?php if ("qp" == $xm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $xm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $xm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $xm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_xm" <?php echo $str_hide_xm?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['xm'])) ? $this->New_label['xm'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xm'] . "";
 $nmgp_tab_label .= "xm?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $xm_look = substr($this->Db->qstr($xm), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xm from " . $this->Ini->nm_tabela . " where xm = '$xm_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$xm]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$xm];
      }
      else
      {
          $sAutocompValue = $xm;
      }
?>
<INPUT  type="text" id="SC_xm" name="xm" value="<?php echo NM_encode_input($xm) ?>" size=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_xm" name="xm_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['xb'])) ? $this->New_label['xb'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xb'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_xb_cond" name="xb_cond" onChange="nm_campos_between(document.getElementById('id_vis_xb'), this, 'xb')">
       <OPTION value="qp" <?php if ("qp" == $xb_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $xb_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $xb_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $xb_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_xb" <?php echo $str_hide_xb?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['xb'])) ? $this->New_label['xb'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xb'] . "";
 $nmgp_tab_label .= "xb?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
 
<?php
  if (!isset($xb)) {$xb = explode("", $xb);}
 ?>
 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['xb'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['xb'][] = "男";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['xb'][] = "女";
 ?>

<TABLE style="padding: 0px; spacing: 0px; border-width: 0px;"><TR>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_xb" name="xb[]" value="男##@@男"  <?php if (in_array("男", $xb))  { echo " checked" ;} ?>>男</TD>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_xb" name="xb[]" value="女##@@女"  <?php if (in_array("女", $xb))  { echo " checked" ;} ?>>女</TD>
</TR><TR>
 <TD colspan=2>
  <IMG SRC="<?php echo $this->Ini->path_img_global;?>/img_select_all.gif" ALIGN="absmiddle" onClick="nm_marca_check('xb', 'N'); return false;" style="cursor: pointer">&nbsp;
  <IMG SRC="<?php echo $this->Ini->path_img_global;?>/img_select_none.gif" ALIGN="absmiddle" onClick="nm_limpa_check('xb', 'N'); return false;" style="cursor: pointer">
 </TD>
</TR></TABLE>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['zc'])) ? $this->New_label['zc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zc'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_zc_cond" name="zc_cond" onChange="nm_campos_between(document.getElementById('id_vis_zc'), this, 'zc')">
       <OPTION value="qp" <?php if ("qp" == $zc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $zc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $zc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $zc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_zc" <?php echo $str_hide_zc?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['zc'])) ? $this->New_label['zc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zc'] . "";
 $nmgp_tab_label .= "zc?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
      $zc_look = substr($this->Db->qstr($zc), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT zc, zc  FROM dm_zc  ORDER BY zc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['zc'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['zc'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      $i = 0;
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      echo "<span id=\"idAjaxCheckbox_zc\">\r\n";
      echo "        <TABLE border=\"0px\" cellpadding=\"0px\">\r\n";
      echo "         <TR>\r\n";
      if (!isset($zc) || !is_array($zc))
      {
         $zc = array();
      }
      for ($j = 0; $j < sizeof($nm_opcoes); $j++)
      {
         if (!empty($nm_opcoes[$j]))
         {
            $temp_bug_list = explode("?#?", $nm_opcoes[$j]);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            $tmp_cmp_click = "";
            $tmp_cmp_sel = "";
            foreach ($zc as $Dados)
            {
                if ($Dados === $nm_opc_cod)
                {
                    $tmp_cmp_sel = "checked";
                    break;
                }
            }
            echo "          <TD class=\"scFilterFieldFontEven\">\r\n";
            echo "           <INPUT class=\"scFilterObjectEven\" type=\"checkbox\" id=\"SC_zc\" name=\"zc[]\" value=\"" . NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val) . "\" $tmp_cmp_sel $tmp_cmp_click>$nm_opc_val\r\n";
            echo "          </TD>\r\n";
            $i++;
            if (3 == $i && $j < sizeof($nm_opcoes) - 1)
            {
               echo "         </TR>\r\n";
               echo "         <TR>\r\n";
               $i = 0;
            }
         }
      }
      echo "         </TR>\r\n";
     echo "         <TR>\r\n";
     echo "          <TD colspan=3>\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_all.gif\" ALIGN=\"absmiddle\" onClick=\"nm_marca_check('zc', 'N'); return false;\" style=\"cursor: pointer\">&nbsp;\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_none.gif\" ALIGN=\"absmiddle\" onClick=\"nm_limpa_check('zc', 'N'); return false;\" style=\"cursor: pointer\">\r\n";
     echo "         </TR>\r\n";
      echo "        </TABLE>\r\n";
      echo "</span>\r\n";
?>
        
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['pc'])) ? $this->New_label['pc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_pc_cond" name="pc_cond" onChange="nm_campos_between(document.getElementById('id_vis_pc'), this, 'pc')">
       <OPTION value="gt" <?php if ("gt" == $pc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $pc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $pc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $pc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_pc" <?php echo $str_hide_pc?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['pc'])) ? $this->New_label['pc'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "";
 $nmgp_tab_label .= "pc?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $pc_look = substr($this->Db->qstr($pc), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($pc))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where pc = $pc_look"; 
      }
      else
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where pc = $pc_look"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      if (isset($nmgp_def_dados[0][$pc]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$pc];
      }
      else
      {
          $sAutocompValue = $pc;
      }
?>
<INPUT  type="text" id="SC_pc" name="pc" value="<?php echo NM_encode_input($pc) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_pc" name="pc_autocomp" size="11" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">
        </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_pc"  <?php echo $str_display_pc; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <INPUT type="text" id="SC_pc_input_2" name="pc_input_2" value="<?php echo NM_encode_input($pc_input_2) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input sc-js-input sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['dlsj'])) ? $this->New_label['dlsj'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlsj'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_dlsj_cond" name="dlsj_cond" onChange="nm_campos_between(document.getElementById('id_vis_dlsj'), this, 'dlsj')">
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_spec'] ?>">
       <OPTION value="TP" <?php if ("TP" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_ever'] ?></OPTION>
       <OPTION value="HJ" <?php if ("HJ" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_tday'] ?></OPTION>
       <OPTION value="OT" <?php if ("OT" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_yest'] ?></OPTION>
       <OPTION value="U7" <?php if ("U7" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lst7'] ?></OPTION>
       <OPTION value="SP" <?php if ("SP" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw'] ?></OPTION>
       <OPTION value="US" <?php if ("US" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw_bsnd'] ?></OPTION>
       <OPTION value="MM" <?php if ("MM" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_this_mnth'] ?></OPTION>
       <OPTION value="UM" <?php if ("UM" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_mnth'] ?></OPTION>
       <OPTION value="CY" <?php if ("CY" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_curr_year'] ?></OPTION>
       <OPTION value="LY" <?php if ("LY" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_year'] ?></OPTION>
       <OPTION value="M24" <?php if ("M24" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_24mo'] ?></OPTION>
       <OPTION value="M18" <?php if ("M18" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_18mo'] ?></OPTION>
       <OPTION value="YY" <?php if ("YY" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_12mo'] ?></OPTION>
       <OPTION value="M6" <?php if ("M6" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_06mo'] ?></OPTION>
       <OPTION value="M3" <?php if ("M3" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_03mo'] ?></OPTION>
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_nrml'] ?>">
       <OPTION value="eq" <?php if ("eq" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $dlsj_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven"><SPAN id="Nm_bi_dados_dlsj" style="display:none"></SPAN>
      <TABLE  id="opc_bi_TP_dlsj"  style=display:  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_dlsj" <?php echo $str_hide_dlsj?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['dlsj'])) ? $this->New_label['dlsj'] : "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlsj'] . "";
 $nmgp_tab_label .= "dlsj?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "(" . $date_format_show .  ")";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_dia" name="dlsj_dia" value="<?php echo NM_encode_input($dlsj_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dlsj_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_mes" name="dlsj_mes" value="<?php echo NM_encode_input($dlsj_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dlsj_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_ano" name="dlsj_ano" value="<?php echo NM_encode_input($dlsj_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
<INPUT type="hidden" id="sc_dlsj_jq">
        <SPAN id="id_css_dlsj"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_dlsj"  <?php echo $str_display_dlsj; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_input_2_dia" name="dlsj_input_2_dia" value="<?php echo NM_encode_input($dlsj_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dlsj_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_input_2_mes" name="dlsj_input_2_mes" value="<?php echo NM_encode_input($dlsj_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dlsj_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dlsj_input_2_ano" name="dlsj_input_2_ano" value="<?php echo NM_encode_input($dlsj_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
         <INPUT type="hidden" id="sc_dlsj_jq2">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot')" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_cg_xmzjk_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_xmzjk_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('bot')", "nm_save_form('bot')", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('bot')", "nm_submit_filter_del('bot')", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot')" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_cg_xmzjk_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_xmzjk_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('bot')", "nm_save_form('bot')", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('bot')", "nm_submit_filter_del('bot')", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_xmzjk']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="./" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
<?php
   if (empty($this->NM_fil_ant))
   {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
   }
?>
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   nm_campos_between(document.getElementById('id_vis_cgbbh'), document.F1.cgbbh_cond, 'cgbbh');
   document.F1.cgbbh.value = "";
   document.F1.cgbbh_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_cgbmc'), document.F1.cgbmc_cond, 'cgbmc');
   document.F1.cgbmc.value = "";
   document.F1.cgbmc_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_zjbh'), document.F1.zjbh_cond, 'zjbh');
   document.F1.zjbh.value = "";
   document.F1.zjbh_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_xm'), document.F1.xm_cond, 'xm');
   document.F1.xm.value = "";
   document.F1.xm_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_xb'), document.F1.xb_cond, 'xb');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'xb[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
   nm_campos_between(document.getElementById('id_vis_zc'), document.F1.zc_cond, 'zc');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'zc[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
   nm_campos_between(document.getElementById('id_vis_pc'), document.F1.pc_cond, 'pc');
   document.F1.pc.value = "";
   document.F1.pc_autocomp.value = "";
   document.F1.pc_input_2.value = "";
   var opc_bi = document.F1.dlsj_cond.value;
   if (opc_bi == 'TP' || opc_bi == 'HJ' || opc_bi == 'OT' || opc_bi == 'U7' || opc_bi == 'SP' || opc_bi == 'US' || opc_bi == 'MM' || opc_bi == 'UM' || opc_bi == 'CY' || opc_bi == 'LY' || opc_bi == 'M24' || opc_bi == 'M18' || opc_bi == 'YY' || opc_bi == 'M6' || opc_bi == 'M3')
   {
       document.F1.dlsj_cond.value = 'TP';
   }
   nm_campos_between(document.getElementById('id_vis_dlsj'), document.F1.dlsj_cond, 'dlsj');
   document.F1.dlsj_dia.value = "";
   document.F1.dlsj_mes.value = "";
   document.F1.dlsj_ano.value = "";
   document.F1.dlsj_input_2_dia.value = "";
   document.F1.dlsj_input_2_mes.value = "";
   document.F1.dlsj_input_2_ano.value = "";
 }
function nm_tabula(obj, tam, cond)
{
   if (obj.value.length == tam)
   {
       for (i=0; i < document.F1.elements.length;i++)
       {
            if (document.F1.elements[i].name == obj.name)
            {
                i++;
                campo = document.F1.elements[i].name;
                campo2 = campo.lastIndexOf('_input_2');
                if (document.F1.elements[i].type == 'text' && (campo2 == -1 || cond == 'bw'))
                {
                    eval('document.F1.' + campo + '.focus()');
                }
                break;
            }
       }
   }
}
 function SC_carga_evt_jquery()
 {
    $('#SC_dlsj_dia').bind('change', function() {sc_grid_cg_xmzjk_valida_dia(this)});
    $('#SC_dlsj_input_2_dia').bind('change', function() {sc_grid_cg_xmzjk_valida_dia(this)});
    $('#SC_dlsj_input_2_mes').bind('change', function() {sc_grid_cg_xmzjk_valida_mes(this)});
    $('#SC_dlsj_mes').bind('change', function() {sc_grid_cg_xmzjk_valida_mes(this)});
 }
 function sc_grid_cg_xmzjk_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_cg_xmzjk_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
function formata_bi_dlsj(opc)
{
   if (opc != "TP" && opc != "HJ" && opc != "OT" && opc != "U7" && opc != "SP" && opc != "US" && opc != "MM" && opc != "UM" && opc != "AM" && opc != "PS" && opc != "SS" && opc != "P3" && opc != "PM" && opc != "P7" && opc != "CY" && opc != "LY" && opc != "YY" && opc != "M6" && opc != "M3" && opc != "M18" && opc != "M24")
   {
       document.getElementById('Nm_bi_dados_dlsj').style.display = 'none';
       document.getElementById('opc_bi_TP_dlsj').style.display = '';
       return;
   }
   if (opc == "TP")
   {
       document.getElementById('Nm_bi_dados_dlsj').style.display = 'none';
       document.getElementById('opc_bi_TP_dlsj').style.display = 'none';
       return;
   }
<?php
   $date_format_show = "";
   $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
   $Str_date = str_replace("y", "Y", $Str_date);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
        $Char = substr($Str_date, $I, 1);
        if ($Char != $Ult)
        {
            $Arr_D[] = $Char;
        }
        $Ult = $Char;
   }
   $Prim = true;
   foreach ($Arr_D as $Cada_d)
   {
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.dlsj_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.dlsj_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.dlsj_ano.value" : "";
       $Prim = false;
   }
?> 
   saida = <?php echo $date_format_show ?>;
   if (opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       saida += "  ";
<?php
   $date_format_show = "";
   $Prim = true;
   foreach ($Arr_D as $Cada_d)
   {
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.dlsj_input_2_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.dlsj_input_2_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.dlsj_input_2_ano.value" : "";
       $Prim = false;
   }
?> 
   saida += <?php echo $date_format_show ?>;
   }
   document.getElementById('Nm_bi_dados_dlsj').innerHTML = saida;
   document.getElementById('opc_bi_TP_dlsj').style.display = 'none';
   document.getElementById('Nm_bi_dados_dlsj').style.display = '';
}
<?php
  echo $Script_BI;
?>
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "cgzb/grid_cg_xmzjk";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("zh_cn");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro()
   {
      global $NM_filters_save, $nmgp_save_name, $nmgp_save_option, $script_case_init;
          $NM_filters_save = str_replace("__NM_PLUS__", "+", $NM_filters_save);
          $NM_str_filter  = "SC_V8_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = sc_convert_encoding($nmgp_save_name, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $NM_str_filter  .= $NM_filters_save;
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "cgzb/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "grid_cg_xmzjk/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = sc_convert_encoding($NM_str_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
   }
   function recupera_filtro()
   {
      global $NM_filters, $NM_operador, $script_case_init;
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = sc_convert_encoding($NM_filters, "UTF-8", $_SESSION['scriptcase']['charset']);
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
      $return_fields = array();
      $tp_fields     = array();
      $tb_fields_esp = array();
      $tp_fields['SC_cgbbh_cond'] = 'cond';
      $tp_fields['SC_cgbbh'] = 'text_aut';
      $tp_fields['id_ac_cgbbh'] = 'text_aut';
      $tp_fields['SC_cgbmc_cond'] = 'cond';
      $tp_fields['SC_cgbmc'] = 'text_aut';
      $tp_fields['id_ac_cgbmc'] = 'text_aut';
      $tp_fields['SC_zjbh_cond'] = 'cond';
      $tp_fields['SC_zjbh'] = 'text_aut';
      $tp_fields['id_ac_zjbh'] = 'text_aut';
      $tp_fields['SC_xm_cond'] = 'cond';
      $tp_fields['SC_xm'] = 'text_aut';
      $tp_fields['id_ac_xm'] = 'text_aut';
      $tp_fields['SC_xb_cond'] = 'cond';
      $tp_fields['SC_xb'] = 'checkbox';
      $tp_fields['SC_zc_cond'] = 'cond';
      $tp_fields['SC_zc'] = 'checkbox';
      $tp_fields['SC_pc_cond'] = 'cond';
      $tp_fields['SC_pc'] = 'text_aut';
      $tp_fields['id_ac_pc'] = 'text_aut';
      $tp_fields['SC_pc_input_2'] = 'text';
      $tp_fields['SC_dlsj_cond'] = 'cond';
      $tp_fields['SC_dlsj_dia'] = 'text';
      $tp_fields['SC_dlsj_mes'] = 'text';
      $tp_fields['SC_dlsj_ano'] = 'text';
      $tp_fields['SC_dlsj_input_2_dia'] = 'text';
      $tp_fields['SC_dlsj_input_2_mes'] = 'text';
      $tp_fields['SC_dlsj_input_2_ano'] = 'text';
      $tp_fields['SC_dlsj_hor'] = 'text';
      $tp_fields['SC_dlsj_min'] = 'text';
      $tp_fields['SC_dlsj_seg'] = 'text';
      $tp_fields['SC_dlsj_input_2_hor'] = 'text';
      $tp_fields['SC_dlsj_input_2_min'] = 'text';
      $tp_fields['SC_dlsj_input_2_seg'] = 'text';
      if (is_file($NM_patch))
      {
          $SC_V8    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              $SC_V8 = true;
          }
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6" || substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tb_fields_esp[$Cada_cmp[0]]))
              {
                  $Cada_cmp[0] = $tb_fields_esp[$Cada_cmp[0]];
              }
              if (!$SC_V8 && substr($Cada_cmp[0], 0, 11) != "div_ac_lab_" && substr($Cada_cmp[0], 0, 6) != "id_ac_" && substr($Cada_cmp[0], 0, 11) != "NM_operador")
              {
                  $Cada_cmp[0] = "SC_" . $Cada_cmp[0];
              }
              if (!isset($tp_fields[$Cada_cmp[0]]))
              {
                  continue;
              }
              $list   = array();
              $list_a = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[]   = $Cada_val;
                          $tmp_pos  = strpos($Cada_val, "##@@");
                          $val_a    = ($tmp_pos !== false) ?  substr($Cada_val, $tmp_pos + 4) : $Cada_val;
                          $list_a[] = array('opt' => $Cada_val, 'value' => $val_a);
                      }
                  }
              }
              else
              {
                  $list[0] = $Cada_cmp[1];
              }
              if ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $return_fields['set_dselect'][] = array('field' => $Cada_cmp[0], 'value' => $list_a);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'fil_order')
              {
                  $return_fields['set_fil_order'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'selmult')
              {
                  $return_fields['set_selmult'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'checkbox')
              {
                  $return_fields['set_checkbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              else
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  if ($tp_fields[$Cada_cmp[0]] == 'html')
                  {
                      $return_fields['set_html'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'radio')
                  {
                      $return_fields['set_radio'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif (isset($temp) && ($temp . "_dia" == $Cada_cmp[0] || $temp . "_mes" == $Cada_cmp[0] || $temp . "_ano" == $Cada_cmp[0] || $temp . "_input_2_dia" == $Cada_cmp[0] || $temp . "_input_2_mes" == $Cada_cmp[0] || $temp . "_input_2_ano" == $Cada_cmp[0]))
                  {
                      continue;
                  }
                  else
                  {
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  if ($Cada_cmp[0] == 'SC_dlsj_cond')
                  {
                      $opc = $Cada_cmp[1];
                      if ($opc == "TP" || $opc == "HJ" || $opc == "OT" || $opc == "U7" || $opc == "SP" || $opc == "US" || $opc == "MM" || $opc == "UM" || $opc == "AM" || $opc == "PS" || $opc == "SS" || $opc == "P3" || $opc == "PM" || $opc == "P7" || $opc == "CY" || $opc == "LY" || $opc == "YY" || $opc == "M6" || $opc == "M3" || $opc == "M18" || $opc == "M24")
                      {
                          $temp = substr($Cada_cmp[0], 0, -5);
                          $this->process_cond_bi($opc, $BI_data1, $BI_data2);
                          $return_fields['set_val'][] = array('field' => $temp . "_dia", 'value' => substr($BI_data1, 0, 2));
                          $return_fields['set_val'][] = array('field' => $temp . "_mes", 'value' => substr($BI_data1, 2, 2));
                          $return_fields['set_val'][] = array('field' => $temp . "_ano", 'value' => substr($BI_data1, 4));
                          $return_fields['set_val'][] = array('field' => $temp . "_input_2_dia", 'value' => substr($BI_data2, 0, 2));
                          $return_fields['set_val'][] = array('field' => $temp . "_input_2_mes", 'value' => substr($BI_data2, 2, 2));
                          $return_fields['set_val'][] = array('field' => $temp . "_input_2_ano", 'value' => substr($BI_data2, 4));
                      }
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
      }
      return $return_fields;
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = sc_convert_encoding($NM_filters_del, "UTF-8", $_SESSION['scriptcase']['charset']);
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $cgbbh_cond, $cgbbh, $cgbbh_autocomp,
             $cgbmc_cond, $cgbmc, $cgbmc_autocomp,
             $zjbh_cond, $zjbh, $zjbh_autocomp,
             $xm_cond, $xm, $xm_autocomp,
             $xb_cond, $xb,
             $zc_cond, $zc,
             $pc_cond, $pc, $pc_input_2, $pc_autocomp,
             $dlsj_cond, $dlsj, $dlsj_dia, $dlsj_mes, $dlsj_ano, $dlsj_hor, $dlsj_min, $dlsj_seg, $dlsj_input_2_dia, $dlsj_input_2_mes, $dlsj_input_2_ano, $dlsj_input_2_min, $dlsj_input_2_hor, $dlsj_input_2_seg, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($cgbbh_autocomp) && empty($cgbbh))
      {
          $cgbbh = $cgbbh_autocomp;
      }
      if (!empty($cgbmc_autocomp) && empty($cgbmc))
      {
          $cgbmc = $cgbmc_autocomp;
      }
      if (!empty($zjbh_autocomp) && empty($zjbh))
      {
          $zjbh = $zjbh_autocomp;
      }
      if (!empty($xm_autocomp) && empty($xm))
      {
          $xm = $xm_autocomp;
      }
      if (!empty($pc_autocomp) && empty($pc))
      {
          $pc = $pc_autocomp;
      }
      $cgbbh_cond_salva = $cgbbh_cond; 
      if (!isset($cgbbh_input_2) || $cgbbh_input_2 == "")
      {
          $cgbbh_input_2 = $cgbbh;
      }
      $cgbmc_cond_salva = $cgbmc_cond; 
      if (!isset($cgbmc_input_2) || $cgbmc_input_2 == "")
      {
          $cgbmc_input_2 = $cgbmc;
      }
      $zjbh_cond_salva = $zjbh_cond; 
      if (!isset($zjbh_input_2) || $zjbh_input_2 == "")
      {
          $zjbh_input_2 = $zjbh;
      }
      $xm_cond_salva = $xm_cond; 
      if (!isset($xm_input_2) || $xm_input_2 == "")
      {
          $xm_input_2 = $xm;
      }
      $xb_cond_salva = $xb_cond; 
      if (!isset($xb_input_2) || $xb_input_2 == "")
      {
          $xb_input_2 = $xb;
      }
      $zc_cond_salva = $zc_cond; 
      if (!isset($zc_input_2) || $zc_input_2 == "")
      {
          $zc_input_2 = $zc;
      }
      $pc_cond_salva = $pc_cond; 
      if (!isset($pc_input_2) || $pc_input_2 == "")
      {
          $pc_input_2 = $pc;
      }
      $dlsj_cond_salva = $dlsj_cond; 
      if (!isset($dlsj_input_2_dia) || $dlsj_input_2_dia == "")
      {
          $dlsj_input_2_dia = $dlsj_dia;
      }
      if (!isset($dlsj_input_2_mes) || $dlsj_input_2_mes == "")
      {
          $dlsj_input_2_mes = $dlsj_mes;
      }
      if (!isset($dlsj_input_2_ano) || $dlsj_input_2_ano == "")
      {
          $dlsj_input_2_ano = $dlsj_ano;
      }
      if (!isset($dlsj_input_2_hor) || $dlsj_input_2_hor == "")
      {
          $dlsj_input_2_hor = $dlsj_hor;
      }
      if (!isset($dlsj_input_2_min) || $dlsj_input_2_min == "")
      {
          $dlsj_input_2_min = $dlsj_min;
      }
      if (!isset($dlsj_input_2_seg) || $dlsj_input_2_seg == "")
      {
          $dlsj_input_2_seg = $dlsj_seg;
      }
      if (is_array($xb)) {
          foreach ($xb as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if (trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['xb'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xb'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      if (is_array($zc)) {
          foreach ($zc as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if (trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['psq_check_ret']['zc'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zc'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      if ($pc_cond != "in")
      {
          nm_limpa_numero($pc, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $pc);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $pc = implode(",", $Nm_sc_valores);
      }
      if ($pc_cond != "in")
      {
          nm_limpa_numero($pc_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbbh'] = $cgbbh; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbbh_cond'] = $cgbbh_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbmc'] = $cgbmc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['cgbmc_cond'] = $cgbmc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zjbh'] = $zjbh; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zjbh_cond'] = $zjbh_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xm'] = $xm; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xm_cond'] = $xm_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xb'] = $xb; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xb_cond'] = $xb_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zc'] = $zc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zc_cond'] = $zc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc'] = $pc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc_input_2'] = $pc_input_2; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['pc_cond'] = $pc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_dia'] = $dlsj_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_mes'] = $dlsj_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_ano'] = $dlsj_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_dia'] = $dlsj_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_mes'] = $dlsj_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_ano'] = $dlsj_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_hor'] = $dlsj_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_min'] = $dlsj_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_seg'] = $dlsj_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_hor'] = $dlsj_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_min'] = $dlsj_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2_seg'] = $dlsj_input_2_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_cond'] = $dlsj_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($pc_cond != "in" && $pc_cond != "bw" && !empty($pc) && !is_numeric($pc))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : " . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "";
      }
      if ($pc_cond == "bw" && ((!empty($pc) && !is_numeric($pc)) || (!empty($pc_input_2) && !is_numeric($pc_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : " . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "";
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $cgbbh_look = substr($this->Db->qstr($cgbbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbbh from " . $this->Ini->nm_tabela . " where cgbbh = '$cgbbh_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cgbbh'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cgbbh'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['cgbbh'] = $cgbbh;
      }
      $cgbmc_look = substr($this->Db->qstr($cgbmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct cgbmc from " . $this->Ini->nm_tabela . " where cgbmc = '$cgbmc_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cgbmc'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cgbmc'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['cgbmc'] = $cgbmc;
      }
      $zjbh_look = substr($this->Db->qstr($zjbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct zjbh from " . $this->Ini->nm_tabela . " where zjbh = '$zjbh_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['zjbh'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['zjbh'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['zjbh'] = $zjbh;
      }
      $xm_look = substr($this->Db->qstr($xm), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xm from " . $this->Ini->nm_tabela . " where xm = '$xm_look'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['xm'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['xm'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['xm'] = $xm;
      }
      $this->cmp_formatado['xb'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['xb'];
      $this->cmp_formatado['xb_input_2'] = $xb_input_2;
      $this->cmp_formatado['zc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['zc'];
      $this->cmp_formatado['zc_input_2'] = $zc_input_2;
      $pc_look = substr($this->Db->qstr($pc), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($pc))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where pc = $pc_look"; 
      }
      else
      {
          $nm_comando = "select distinct pc from " . $this->Ini->nm_tabela . " where pc = $pc_look"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['pc'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['pc'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['pc'] = $pc;
      }
      $Conteudo = $pc_input_2;
      if (strtoupper($pc_cond) != "II" && strtoupper($pc_cond) != "QP" && strtoupper($pc_cond) != "NP" && strtoupper($pc_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['pc_input_2'] = $Conteudo;

      //----- $cgbbh
      $this->Date_part = false;
      if (isset($cgbbh) || $cgbbh_cond == "nu" || $cgbbh_cond == "nn" || $cgbbh_cond == "ep" || $cgbbh_cond == "ne")
      {
         $this->monta_condicao("cgbbh", $cgbbh_cond, $cgbbh, "", "cgbbh");
      }

      //----- $cgbmc
      $this->Date_part = false;
      if (isset($cgbmc) || $cgbmc_cond == "nu" || $cgbmc_cond == "nn" || $cgbmc_cond == "ep" || $cgbmc_cond == "ne")
      {
         $this->monta_condicao("cgbmc", $cgbmc_cond, $cgbmc, "", "cgbmc");
      }

      //----- $zjbh
      $this->Date_part = false;
      if (isset($zjbh) || $zjbh_cond == "nu" || $zjbh_cond == "nn" || $zjbh_cond == "ep" || $zjbh_cond == "ne")
      {
         $this->monta_condicao("zjbh", $zjbh_cond, $zjbh, "", "zjbh");
      }

      //----- $xm
      $this->Date_part = false;
      if (isset($xm) || $xm_cond == "nu" || $xm_cond == "nn" || $xm_cond == "ep" || $xm_cond == "ne")
      {
         $this->monta_condicao("xm", $xm_cond, $xm, "", "xm");
      }

      //----- $xb
      $this->Date_part = false;
      $xb = $xb; 
      $nm_aspas = "'";
      if (count($xb) != 0)
      {
         foreach ($xb as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($xb[$i]);
            }
         }
      }
      if (count($xb) != 0)
      {
         $this->and_or();
         if (strtoupper($xb_cond) == "DF" || strtoupper($xb_cond) == "NP")
         {
             $this->comando        .= " xb not in (";
             $this->comando_sum    .= " cg_xmzjk.xb not in (";
             $this->comando_filtro .= " xb not in (";
         }
         else
         {
             $this->comando        .= " xb in (";
             $this->comando_sum    .= " cg_xmzjk.xb in (";
             $this->comando_filtro .= " xb in (";
         }
         $x                     = count($xb);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($xb as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if ($tmp_pos === false)
            {
               $res_lookup = $dados;
            }
            else
            {
                $res_lookup = substr($dados, $tmp_pos + 4);
                $dados = substr($dados, 0, $tmp_pos);
            }
            $this->comando        .= $nm_aspas . $dados . $nm_aspas;
            $this->comando_sum    .= $nm_aspas . $dados . $nm_aspas;
            $this->comando_filtro .= $nm_aspas . $dados . $nm_aspas;
            $nm_cond              .= $res_lookup;
            if ($xx != ($x - 1))
            {
               $this->comando        .= ",";
               $this->comando_sum    .= ",";
               $this->comando_filtro .= ",";
               $nm_cond              .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
            }
            $xx++;
         }
         $this->comando        .= ")";
         $this->comando_sum    .= ")";
         $this->comando_filtro .= ")";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label['xb'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }

      //----- $zc
      $this->Date_part = false;
      $zc = $zc; 
      $nm_aspas = "'";
      if (count($zc) != 0)
      {
         foreach ($zc as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($zc[$i]);
            }
         }
      }
      if (count($zc) != 0)
      {
         $this->and_or();
         if (strtoupper($zc_cond) == "DF" || strtoupper($zc_cond) == "NP")
         {
             $this->comando        .= " zc not in (";
             $this->comando_sum    .= " cg_xmzjk.zc not in (";
             $this->comando_filtro .= " zc not in (";
         }
         else
         {
             $this->comando        .= " zc in (";
             $this->comando_sum    .= " cg_xmzjk.zc in (";
             $this->comando_filtro .= " zc in (";
         }
         $x                     = count($zc);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($zc as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if ($tmp_pos === false)
            {
               $res_lookup = $dados;
            }
            else
            {
                $res_lookup = substr($dados, $tmp_pos + 4);
                $dados = substr($dados, 0, $tmp_pos);
            }
            $this->comando        .= $nm_aspas . $dados . $nm_aspas;
            $this->comando_sum    .= $nm_aspas . $dados . $nm_aspas;
            $this->comando_filtro .= $nm_aspas . $dados . $nm_aspas;
            $nm_cond              .= $res_lookup;
            if ($xx != ($x - 1))
            {
               $this->comando        .= ",";
               $this->comando_sum    .= ",";
               $this->comando_filtro .= ",";
               $nm_cond              .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
            }
            $xx++;
         }
         $this->comando        .= ")";
         $this->comando_sum    .= ")";
         $this->comando_filtro .= ")";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $nmgp_tab_label['zc'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }

      //----- $pc
      $this->Date_part = false;
      if (isset($pc) || $pc_cond == "nu" || $pc_cond == "nn" || $pc_cond == "ep" || $pc_cond == "ne")
      {
         $this->monta_condicao("pc", $pc_cond, $pc, $pc_input_2, "pc");
      }

      //----- $dlsj
      $this->Date_part = false;
      if ($dlsj_cond != "TP")
      {
          $dlsj_cond = strtoupper($dlsj_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $dlsj_ano;
          $Dtxt .= $dlsj_mes;
          $Dtxt .= $dlsj_dia;
          $Dtxt .= $dlsj_hor;
          $Dtxt .= $dlsj_min;
          $Dtxt .= $dlsj_seg;
          $val[0]['ano'] = $dlsj_ano;
          $val[0]['mes'] = $dlsj_mes;
          $val[0]['dia'] = $dlsj_dia;
          $val[0]['hor'] = $dlsj_hor;
          $val[0]['min'] = $dlsj_min;
          $val[0]['seg'] = $dlsj_seg;
          if ($dlsj_cond == "BW")
          {
              $val[1]['ano'] = $dlsj_input_2_ano;
              $val[1]['mes'] = $dlsj_input_2_mes;
              $val[1]['dia'] = $dlsj_input_2_dia;
              $val[1]['hor'] = $dlsj_input_2_hor;
              $val[1]['min'] = $dlsj_input_2_min;
              $val[1]['seg'] = $dlsj_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "DATETIME", $dlsj_cond , "", "datahora");
          $dlsj = $val[0];
          $this->cmp_formatado['dlsj'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['dlsj'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['dlsj'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          if ($dlsj_cond == "BW")
          {
              $dlsj_input_2     = $val[1];
              $this->cmp_formatado['dlsj_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']['dlsj_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['dlsj_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['dlsj_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          }
          if (!empty($Dtxt) || $dlsj_cond == "NU" || $dlsj_cond == "NN"|| $dlsj_cond == "EP"|| $dlsj_cond == "NE")
          {
              $this->monta_condicao("dlsj", $dlsj_cond, $dlsj, $dlsj_input_2, 'dlsj', 'DATETIME');
          }
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_fast'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_interativ'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['interativ_search'] = array();
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk']['fast_search']);

      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

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
   function process_cond_bi(&$cond, &$data1, &$data2)
   {

      $data1 = "";
      $data2 = "";
      if ($cond == "TP")
      {
          return;
      }
      if ($cond == "HJ")
      {
          $data1  = date('d');
          $data1 .= date('m');
          $data1 .= date('Y');
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "eq";
      }
      if ($cond == "OT")
      {
          $Temp = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 1, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "eq";
      }
      if ($cond == "AM")
      {
          $Temp = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", 1, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "eq";
      }
      if ($cond == "U7")
      {
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 6, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "bw";
      }
      if ($cond == "P7" || $cond == "P3")
      {
          $incr   = ($cond == "P7") ? 6 : 29;
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $incr, 0, 0);
          $data1  = date('d');
          $data1 .= date('m');
          $data1 .= date('Y');
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "SP" || $cond == "US")
      {
          $incr   = ($cond == "SP") ? 6 : 4;
          $Temps  = date('w') + 6;
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", $Temps, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $Temp   = $this->nm_data->CalculaData($Temp , "aaaa-mm-dd", "+", $incr, 0, 0);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "PS" || $cond == "SS")
      {
          $incr   = ($cond == "PS") ? 4 : 6;
          $Temps  = (date('w') == 0) ? 1 : 8 - date('w');
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $Temps, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $Temp   = $this->nm_data->CalculaData($Temp , "aaaa-mm-dd", "+", $incr, 0, 0);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "MM" || $cond == "UM")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          if ($cond == "UM")
          {
              $Temp_mes--;
              if ($Temp_mes == 0)
              {
                  $Temp_mes = 12;
                  $Temp_ano--;
              }
              $Temp_dia = 31;
              if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
              {
                  $Temp_dia = 30;
              }
              if ($Temp_mes == 2)
              {
                  $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
              }
          }
          else
          {
              $Temp_dia = date('d');
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $cond   = "bw";
      }
      if ($cond == "PM")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          $Temp_mes++;
          if ($Temp_mes == 13)
          {
              $Temp_mes = 1;
              $Temp_ano++;
          }
          $Temp_dia = 31;
          if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
          {
              $Temp_dia = 30;
          }
          if ($Temp_mes == 2)
          {
              $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $cond   = "bw";
      }
      if ($cond == "CY")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y');
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "bw";
      }
      if ($cond == "LY")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y') - 1;
          $data2  = 31;
          $data2 .= 12;
          $data2 .= date('Y') - 1;
          $cond   = "bw";
      }
      if ($cond == "YY" || $cond == "M3" || $cond == "M6" || $cond == "M18" || $cond == "M24")
      {
          $Temp_mes = date('m') - 1;
          $Temp_ano = date('Y');
          if ($Temp_mes == 0)
          {
              $Temp_mes = 12;
              $Temp_ano--;
          }
          $Temp_dia = 31;
          if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
          {
              $Temp_dia = 30;
          }
          if ($Temp_mes == 2)
          {
              $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $incr   = ($cond == "YY") ? 12 : substr($cond, 1);
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 0, $incr, 0);
          $data1  = "01";
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
   }
}

?>
