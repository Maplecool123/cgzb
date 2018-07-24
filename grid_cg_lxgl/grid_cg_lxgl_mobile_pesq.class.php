<?php

class grid_cg_lxgl_pesq
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
   function grid_cg_lxgl_pesq()
   {
      $this->sbrq_opc_bi[] = "TP";
      $this->sbrq_opc_bi[] = "HJ";
      $this->sbrq_opc_bi[] = "OT";
      $this->sbrq_opc_bi[] = "U7";
      $this->sbrq_opc_bi[] = "SP";
      $this->sbrq_opc_bi[] = "US";
      $this->sbrq_opc_bi[] = "MM";
      $this->sbrq_opc_bi[] = "UM";
      $this->sbrq_opc_bi[] = "CY";
      $this->sbrq_opc_bi[] = "LY";
      $this->sbrq_opc_bi[] = "M24";
      $this->sbrq_opc_bi[] = "M18";
      $this->sbrq_opc_bi[] = "YY";
      $this->sbrq_opc_bi[] = "M6";
      $this->sbrq_opc_bi[] = "M3";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['path_libs_php'] = $this->Ini->path_lib_php;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['opcao'] = "igual";
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
                  $Opt_filter .= "<option value=\"\">" . grid_cg_lxgl_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_cg_lxgl_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_cg_lxgl_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
                  $Opt_filter .= "<option value=\"\">" .  grid_cg_lxgl_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_cg_lxgl_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_cg_lxgl_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
      if ($this->NM_ajax_opcao == 'autocomp_xmbh')
      {
          $xmbh = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_xmbh($xmbh);
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
      if ($this->NM_ajax_opcao == 'autocomp_xmmc')
      {
          $xmmc = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_xmmc($xmmc);
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
      if ($this->NM_ajax_opcao == 'autocomp_xmfzr')
      {
          $xmfzr = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_xmfzr($xmfzr);
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
   function lookup_ajax_xmbh($xmbh)
   {
      $xmbh = substr($this->Db->qstr($xmbh), 1, -1);
            $xmbh_look = substr($this->Db->qstr($xmbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmbh from " . $this->Ini->nm_tabela . " where  xmbh like '%" . $xmbh . "%'"; 
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
   
   function lookup_ajax_xmmc($xmmc)
   {
      $xmmc = substr($this->Db->qstr($xmmc), 1, -1);
            $xmmc_look = substr($this->Db->qstr($xmmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmmc from " . $this->Ini->nm_tabela . " where  xmmc like '%" . $xmmc . "%'"; 
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
   
   function lookup_ajax_xmfzr($xmfzr)
   {
      $xmfzr = substr($this->Db->qstr($xmfzr), 1, -1);
            $xmfzr_look = substr($this->Db->qstr($xmfzr), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmfzr from " . $this->Ini->nm_tabela . " where  xmfzr like '%" . $xmfzr . "%'"; 
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
      $Nm_datas[] = "sbrq";$Nm_datas[] = "qwcgrq";$Nm_datas[] = "cjsj";$Nm_numeric[] = "id";$Nm_numeric[] = "ysje";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['decimal_db'] == ".")
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
      $Nm_datas[] = "sbrq";$Nm_datas[] = "qwcgrq";$Nm_datas[] = "cjsj";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_datas))
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['SC_sep_date1'];
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
         $nome_sum = "cg_lxgl.$nome";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
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
 <TITLE> - </TITLE>
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
 <TITLE> - </TITLE>
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_cg_lxgl/grid_cg_lxgl_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
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
 <script type="text/javascript" src="grid_cg_lxgl_ajax_search.js"></script>
 <script type="text/javascript" src="grid_cg_lxgl_ajax.js"></script>
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
    $Msg_Inval = sc_convert_encoding("Inválido", $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_sbrq_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_sbrq_dia').value + '/';
          var_dt_ini += document.getElementById('SC_sbrq_mes').value + '/';
          var_dt_ini += document.getElementById('SC_sbrq_ano').value;
          document.getElementById('sc_sbrq_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_sbrq_dia').value = aParts[0];
          document.getElementById('SC_sbrq_mes').value = aParts[1];
          document.getElementById('SC_sbrq_ano').value = aParts[2];
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

  $("#sc_sbrq_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_sbrq_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_sbrq_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_sbrq_input_2_ano').value;
          document.getElementById('sc_sbrq_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_sbrq_input_2_dia').value = aParts[0];
          document.getElementById('SC_sbrq_input_2_mes').value = aParts[1];
          document.getElementById('SC_sbrq_input_2_ano').value = aParts[2];
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
      if (nm_nome_obj == "sbrq")
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
  str_out += 'SC_xmbh_cond#NMF#' + search_get_sel_txt('SC_xmbh_cond') + '@NMF@';
  str_out += 'SC_xmbh#NMF#' + search_get_text('SC_xmbh') + '@NMF@';
  str_out += 'id_ac_xmbh#NMF#' + search_get_text('id_ac_xmbh') + '@NMF@';
  str_out += 'SC_xmmc_cond#NMF#' + search_get_sel_txt('SC_xmmc_cond') + '@NMF@';
  str_out += 'SC_xmmc#NMF#' + search_get_text('SC_xmmc') + '@NMF@';
  str_out += 'id_ac_xmmc#NMF#' + search_get_text('id_ac_xmmc') + '@NMF@';
  str_out += 'SC_xmfzr_cond#NMF#' + search_get_sel_txt('SC_xmfzr_cond') + '@NMF@';
  str_out += 'SC_xmfzr#NMF#' + search_get_text('SC_xmfzr') + '@NMF@';
  str_out += 'id_ac_xmfzr#NMF#' + search_get_text('id_ac_xmfzr') + '@NMF@';
  str_out += 'SC_zjly_cond#NMF#' + search_get_sel_txt('SC_zjly_cond') + '@NMF@';
  str_out += 'SC_zjly#NMF#' + search_get_checkbox('SC_zjly') + '@NMF@';
  str_out += 'SC_sbbm_cond#NMF#' + search_get_sel_txt('SC_sbbm_cond') + '@NMF@';
  str_out += 'SC_sbbm#NMF#' + search_get_checkbox('SC_sbbm') + '@NMF@';
  str_out += 'SC_sbrq_cond#NMF#' + search_get_sel_txt('SC_sbrq_cond') + '@NMF@';
  opc = search_get_sel_txt('SC_sbrq_cond');
  if (opc != "TP" && opc != "HJ" && opc != "OT" && opc != "U7" && opc != "SP" && opc != "US" && opc != "MM" && opc != "UM" && opc != "AM" && opc != "PS" && opc != "SS" && opc != "P3" && opc != "PM" && opc != "P7" && opc != "CY" && opc != "LY" && opc != "YY" && opc != "M6" && opc != "M3" && opc != "M18" && opc != "M24")
  {
      str_out += 'SC_sbrq_dia#NMF#' + search_get_sel_txt('SC_sbrq_dia') + '@NMF@';
      str_out += 'SC_sbrq_mes#NMF#' + search_get_sel_txt('SC_sbrq_mes') + '@NMF@';
      str_out += 'SC_sbrq_ano#NMF#' + search_get_sel_txt('SC_sbrq_ano') + '@NMF@';
      str_out += 'SC_sbrq_input_2_dia#NMF#' + search_get_sel_txt('SC_sbrq_input_2_dia') + '@NMF@';
      str_out += 'SC_sbrq_input_2_mes#NMF#' + search_get_sel_txt('SC_sbrq_input_2_mes') + '@NMF@';
      str_out += 'SC_sbrq_input_2_ano#NMF#' + search_get_sel_txt('SC_sbrq_input_2_ano') + '@NMF@';
  }
  str_out += 'SC_shzt_cond#NMF#' + search_get_sel_txt('SC_shzt_cond') + '@NMF@';
  str_out += 'SC_shzt#NMF#' + search_get_checkbox('SC_shzt') + '@NMF@';
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
   $("#id_ac_xmbh").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_xmbh",
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
       $("#SC_xmbh").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_xmbh").val( $(this).val() );
       }
     }
   });
   $("#id_ac_xmmc").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_xmmc",
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
       $("#SC_xmmc").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_xmmc").val( $(this).val() );
       }
     }
   });
   $("#id_ac_xmfzr").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_xmfzr",
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
       $("#SC_xmfzr").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_xmfzr").val( $(this).val() );
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
        	<td id="lin1_col1" class="scFilterHeaderFont"><span><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_lxgl'] ?></span></td>
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
             $xmbh_cond, $xmbh, $xmbh_autocomp,
             $xmmc_cond, $xmmc, $xmmc_autocomp,
             $xmfzr_cond, $xmfzr, $xmfzr_autocomp,
             $zjly_cond, $zjly,
             $sbbm_cond, $sbbm,
             $sbrq_cond, $sbrq, $sbrq_dia, $sbrq_mes, $sbrq_ano, $sbrq_input_2_dia, $sbrq_input_2_mes, $sbrq_input_2_ano,
             $shzt_cond, $shzt,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->New_label['ysje'] = "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_ysje'] . "";
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
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_cg_lxgl", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $xmbh = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmbh']; 
          $xmbh_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmbh_cond']; 
          $xmmc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmmc']; 
          $xmmc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmmc_cond']; 
          $xmfzr = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmfzr']; 
          $xmfzr_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmfzr_cond']; 
          $zjly = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['zjly']; 
          $zjly_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['zjly_cond']; 
          $sbbm = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbbm']; 
          $sbbm_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbbm_cond']; 
          $sbrq_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_dia']; 
          $sbrq_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_mes']; 
          $sbrq_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_ano']; 
          $sbrq_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_dia']; 
          $sbrq_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_mes']; 
          $sbrq_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_ano']; 
          $sbrq_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_cond']; 
          $shzt = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['shzt']; 
          $shzt_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['shzt_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['NM_operador']; 
      } 
      if (!isset($xmbh_cond) || empty($xmbh_cond))
      {
         $xmbh_cond = "qp";
      }
      if (!isset($xmmc_cond) || empty($xmmc_cond))
      {
         $xmmc_cond = "qp";
      }
      if (!isset($xmfzr_cond) || empty($xmfzr_cond))
      {
         $xmfzr_cond = "qp";
      }
      if (!isset($zjly_cond) || empty($zjly_cond))
      {
         $zjly_cond = "qp";
      }
      if (!isset($sbbm_cond) || empty($sbbm_cond))
      {
         $sbbm_cond = "qp";
      }
      if (!isset($sbrq_cond) || empty($sbrq_cond))
      {
         $sbrq_cond = "TP";
      }
      if (!isset($shzt_cond) || empty($shzt_cond))
      {
         $shzt_cond = "qp";
      }
      if (isset($sbrq_cond) && in_array($sbrq_cond, $this->sbrq_opc_bi))
      {
         $Temp_cond = $sbrq_cond;
         $this->process_cond_bi($Temp_cond, $BI_data1, $BI_data2);
         $sbrq_dia = substr($BI_data1, 0, 2);
         $sbrq_mes = substr($BI_data1, 2, 2);
         $sbrq_ano = substr($BI_data1, 4);
         $sbrq_input_2_dia = substr($BI_data2, 0, 2);
         $sbrq_input_2_mes = substr($BI_data2, 2, 2);
         $sbrq_input_2_ano = substr($BI_data2, 4);
         $Script_BI .= "  formata_bi_sbrq('" . $sbrq_cond . "');\r\n";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_xmbh = (in_array($xmbh_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_xmmc = (in_array($xmmc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_xmfzr = (in_array($xmfzr_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_zjly = (in_array($zjly_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_sbbm = (in_array($sbbm_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_sbrq = (in_array($sbrq_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_shzt = (in_array($shzt_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_sbrq = ('bw' == $sbrq_cond) ? $display_aberto : $display_fechado;

      // zjly
      if (is_array($zjly) && !empty($zjly))
      {
         $tmp_array = array();
         $zjly_val_str = "";
         foreach ($zjly as $tmp_val_cmp)
         {
            if ("" != $zjly_val_str)
            {
               $zjly_val_str .= ", ";
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
            $zjly_val_str .= "'$tmp_val_cmp'";
         }
         $zjly = $tmp_array;
      }
      else
      {
         $zjly_val_str = "''";
      }
      // sbbm
      if (is_array($sbbm) && !empty($sbbm))
      {
         $tmp_array = array();
         $sbbm_val_str = "";
         foreach ($sbbm as $tmp_val_cmp)
         {
            if ("" != $sbbm_val_str)
            {
               $sbbm_val_str .= ", ";
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
            $sbbm_val_str .= "'$tmp_val_cmp'";
         }
         $sbbm = $tmp_array;
      }
      else
      {
         $sbbm_val_str = "''";
      }
      // shzt
      if (is_array($shzt) && !empty($shzt))
      {
         $tmp_array = array();
         $shzt_val_str = "";
         foreach ($shzt as $tmp_val_cmp)
         {
            if ("" != $shzt_val_str)
            {
               $shzt_val_str .= ", ";
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
            $shzt_val_str .= "'$tmp_val_cmp'";
         }
         $shzt = $tmp_array;
      }
      else
      {
         $shzt_val_str = "''";
      }
      if (!isset($xmbh) || $xmbh == "")
      {
          $xmbh = "";
      }
      if (isset($xmbh) && !empty($xmbh))
      {
         $tmp_pos = strpos($xmbh, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $xmbh = substr($xmbh, 0, $tmp_pos);
         }
      }
      if (!isset($xmmc) || $xmmc == "")
      {
          $xmmc = "";
      }
      if (isset($xmmc) && !empty($xmmc))
      {
         $tmp_pos = strpos($xmmc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $xmmc = substr($xmmc, 0, $tmp_pos);
         }
      }
      if (!isset($xmfzr) || $xmfzr == "")
      {
          $xmfzr = "";
      }
      if (isset($xmfzr) && !empty($xmfzr))
      {
         $tmp_pos = strpos($xmfzr, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $xmfzr = substr($xmfzr, 0, $tmp_pos);
         }
      }
      if (!isset($zjly) || $zjly == "")
      {
          $zjly = array();
      }
      if (!isset($sbbm) || $sbbm == "")
      {
          $sbbm = array();
      }
      if (!isset($sbrq) || $sbrq == "")
      {
          $sbrq = "";
      }
      if (isset($sbrq) && !empty($sbrq))
      {
         $tmp_pos = strpos($sbrq, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $sbrq = substr($sbrq, 0, $tmp_pos);
         }
      }
      if (!isset($shzt) || $shzt == "")
      {
          $shzt = array();
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
   if (is_file("grid_cg_lxgl_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_lxgl_help.txt"); 
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
   if (is_file("grid_cg_lxgl_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_lxgl_help.txt"); 
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



   
    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['xmbh'])) ? $this->New_label['xmbh'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmbh'] . "";
 $nmgp_tab_label .= "xmbh?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectOdd" id="SC_xmbh_cond" name="xmbh_cond" onChange="nm_campos_between(document.getElementById('id_vis_xmbh'), this, 'xmbh')">
       <OPTION value="qp" <?php if ("qp" == $xmbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $xmbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $xmbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $xmbh_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_xmbh"  <?php echo $str_hide_xmbh?>><?php
      $xmbh_look = substr($this->Db->qstr($xmbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmbh from " . $this->Ini->nm_tabela . " where xmbh = '$xmbh_look'"; 
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
      if (isset($nmgp_def_dados[0][$xmbh]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$xmbh];
      }
      else
      {
          $sAutocompValue = $xmbh;
      }
?>
<INPUT  type="text" id="SC_xmbh" name="xmbh" value="<?php echo NM_encode_input($xmbh) ?>" size=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_xmbh" name="xmbh_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelEven" > <?php
 $SC_Label = (isset($this->New_label['xmmc'])) ? $this->New_label['xmmc'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmmc'] . "";
 $nmgp_tab_label .= "xmmc?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectEven" id="SC_xmmc_cond" name="xmmc_cond" onChange="nm_campos_between(document.getElementById('id_vis_xmmc'), this, 'xmmc')">
       <OPTION value="qp" <?php if ("qp" == $xmmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $xmmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $xmmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $xmmc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_xmmc"  <?php echo $str_hide_xmmc?>><?php
      $xmmc_look = substr($this->Db->qstr($xmmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmmc from " . $this->Ini->nm_tabela . " where xmmc = '$xmmc_look'"; 
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
      if (isset($nmgp_def_dados[0][$xmmc]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$xmmc];
      }
      else
      {
          $sAutocompValue = $xmmc;
      }
?>
<INPUT  type="text" id="SC_xmmc" name="xmmc" value="<?php echo NM_encode_input($xmmc) ?>" size=32 alt="{datatype: 'text', maxLength: 64, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_xmmc" name="xmmc_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['xmfzr'])) ? $this->New_label['xmfzr'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_xmfzr'] . "";
 $nmgp_tab_label .= "xmfzr?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectOdd" id="SC_xmfzr_cond" name="xmfzr_cond" onChange="nm_campos_between(document.getElementById('id_vis_xmfzr'), this, 'xmfzr')">
       <OPTION value="qp" <?php if ("qp" == $xmfzr_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $xmfzr_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $xmfzr_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $xmfzr_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_xmfzr"  <?php echo $str_hide_xmfzr?>><?php
      $xmfzr_look = substr($this->Db->qstr($xmfzr), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmfzr from " . $this->Ini->nm_tabela . " where xmfzr = '$xmfzr_look'"; 
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
      if (isset($nmgp_def_dados[0][$xmfzr]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$xmfzr];
      }
      else
      {
          $sAutocompValue = $xmfzr;
      }
?>
<INPUT  type="text" id="SC_xmfzr" name="xmfzr" value="<?php echo NM_encode_input($xmfzr) ?>" size=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_xmfzr" name="xmfzr_autocomp" size="32" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 32, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelEven" > <?php
 $SC_Label = (isset($this->New_label['zjly'])) ? $this->New_label['zjly'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_zjly'] . "";
 $nmgp_tab_label .= "zjly?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectEven" id="SC_zjly_cond" name="zjly_cond" onChange="nm_campos_between(document.getElementById('id_vis_zjly'), this, 'zjly')">
       <OPTION value="qp" <?php if ("qp" == $zjly_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $zjly_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $zjly_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $zjly_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_zjly"  <?php echo $str_hide_zjly?>>
<?php
      $zjly_look = substr($this->Db->qstr($zjly), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT mc, mc  FROM dm_zjly  ORDER BY mc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['zjly'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['zjly'][] = trim($rs->fields[0]);
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
      echo "<span id=\"idAjaxCheckbox_zjly\">\r\n";
      echo "        <TABLE border=\"0px\" cellpadding=\"0px\">\r\n";
      echo "         <TR>\r\n";
      if (!isset($zjly) || !is_array($zjly))
      {
         $zjly = array();
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
            foreach ($zjly as $Dados)
            {
                if ($Dados === $nm_opc_cod)
                {
                    $tmp_cmp_sel = "checked";
                    break;
                }
            }
            echo "          <TD class=\"scFilterFieldFontEven\">\r\n";
            echo "           <INPUT class=\"scFilterObjectEven\" type=\"checkbox\" id=\"SC_zjly\" name=\"zjly[]\" value=\"" . NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val) . "\" $tmp_cmp_sel $tmp_cmp_click>$nm_opc_val\r\n";
            echo "          </TD>\r\n";
            $i++;
            if (2 == $i && $j < sizeof($nm_opcoes) - 1)
            {
               echo "         </TR>\r\n";
               echo "         <TR>\r\n";
               $i = 0;
            }
         }
      }
      echo "         </TR>\r\n";
     echo "         <TR>\r\n";
     echo "          <TD colspan=2>\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_all.gif\" ALIGN=\"absmiddle\" onClick=\"nm_marca_check('zjly', 'N'); return false;\" style=\"cursor: pointer\">&nbsp;\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_none.gif\" ALIGN=\"absmiddle\" onClick=\"nm_limpa_check('zjly', 'N'); return false;\" style=\"cursor: pointer\">\r\n";
     echo "         </TR>\r\n";
      echo "        </TABLE>\r\n";
      echo "</span>\r\n";
?>
         </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['sbbm'])) ? $this->New_label['sbbm'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbbm'] . "";
 $nmgp_tab_label .= "sbbm?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectOdd" id="SC_sbbm_cond" name="sbbm_cond" onChange="nm_campos_between(document.getElementById('id_vis_sbbm'), this, 'sbbm')">
       <OPTION value="qp" <?php if ("qp" == $sbbm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $sbbm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $sbbm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $sbbm_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_sbbm"  <?php echo $str_hide_sbbm?>>
<?php
      $sbbm_look = substr($this->Db->qstr($sbbm), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT mc, mc  FROM dm_bm  ORDER BY mc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['sbbm'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['sbbm'][] = trim($rs->fields[0]);
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
      echo "<span id=\"idAjaxCheckbox_sbbm\">\r\n";
      echo "        <TABLE border=\"0px\" cellpadding=\"0px\">\r\n";
      echo "         <TR>\r\n";
      if (!isset($sbbm) || !is_array($sbbm))
      {
         $sbbm = array();
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
            foreach ($sbbm as $Dados)
            {
                if ($Dados === $nm_opc_cod)
                {
                    $tmp_cmp_sel = "checked";
                    break;
                }
            }
            echo "          <TD class=\"scFilterFieldFontOdd\">\r\n";
            echo "           <INPUT class=\"scFilterObjectOdd\" type=\"checkbox\" id=\"SC_sbbm\" name=\"sbbm[]\" value=\"" . NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val) . "\" $tmp_cmp_sel $tmp_cmp_click>$nm_opc_val\r\n";
            echo "          </TD>\r\n";
            $i++;
            if (2 == $i && $j < sizeof($nm_opcoes) - 1)
            {
               echo "         </TR>\r\n";
               echo "         <TR>\r\n";
               $i = 0;
            }
         }
      }
      echo "         </TR>\r\n";
     echo "         <TR>\r\n";
     echo "          <TD colspan=2>\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_all.gif\" ALIGN=\"absmiddle\" onClick=\"nm_marca_check('sbbm', 'N'); return false;\" style=\"cursor: pointer\">&nbsp;\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_none.gif\" ALIGN=\"absmiddle\" onClick=\"nm_limpa_check('sbbm', 'N'); return false;\" style=\"cursor: pointer\">\r\n";
     echo "         </TR>\r\n";
      echo "        </TABLE>\r\n";
      echo "</span>\r\n";
?>
         </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelEven" > <?php
 $SC_Label = (isset($this->New_label['sbrq'])) ? $this->New_label['sbrq'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbrq'] . "";
 $nmgp_tab_label .= "sbrq?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectEven" id="SC_sbrq_cond" name="sbrq_cond" onChange="nm_campos_between(document.getElementById('id_vis_sbrq'), this, 'sbrq')">
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_spec'] ?>">
       <OPTION value="TP" <?php if ("TP" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_ever'] ?></OPTION>
       <OPTION value="HJ" <?php if ("HJ" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_tday'] ?></OPTION>
       <OPTION value="OT" <?php if ("OT" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_yest'] ?></OPTION>
       <OPTION value="U7" <?php if ("U7" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lst7'] ?></OPTION>
       <OPTION value="SP" <?php if ("SP" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw'] ?></OPTION>
       <OPTION value="US" <?php if ("US" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw_bsnd'] ?></OPTION>
       <OPTION value="MM" <?php if ("MM" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_this_mnth'] ?></OPTION>
       <OPTION value="UM" <?php if ("UM" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_mnth'] ?></OPTION>
       <OPTION value="CY" <?php if ("CY" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_curr_year'] ?></OPTION>
       <OPTION value="LY" <?php if ("LY" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_year'] ?></OPTION>
       <OPTION value="M24" <?php if ("M24" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_24mo'] ?></OPTION>
       <OPTION value="M18" <?php if ("M18" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_18mo'] ?></OPTION>
       <OPTION value="YY" <?php if ("YY" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_12mo'] ?></OPTION>
       <OPTION value="M6" <?php if ("M6" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_06mo'] ?></OPTION>
       <OPTION value="M3" <?php if ("M3" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_03mo'] ?></OPTION>
       <optgroup label="<?php echo $this->Ini->Nm_lang['lang_srch_nrml'] ?>">
       <OPTION value="eq" <?php if ("eq" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $sbrq_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_sbrq"  <?php echo $str_hide_sbrq?>>
<SPAN id="Nm_bi_dados_sbrq" style="display:none"></SPAN>
<SPAN id="opc_bi_TP_sbrq"  style="display:''">

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
  $Arr_format = $Arr_D;
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
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_dia" name="sbrq_dia" value="<?php echo NM_encode_input($sbrq_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.sbrq_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_mes" name="sbrq_mes" value="<?php echo NM_encode_input($sbrq_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.sbrq_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_ano" name="sbrq_ano" value="<?php echo NM_encode_input($sbrq_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
<INPUT type="hidden" id="sc_sbrq_jq">
        <SPAN id="id_css_sbrq"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                  <BR>
        <SPAN id="id_vis_sbrq"  <?php echo $str_display_sbrq; ?> class="scFilterFieldFontEven">
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
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_input_2_dia" name="sbrq_input_2_dia" value="<?php echo NM_encode_input($sbrq_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.sbrq_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_input_2_mes" name="sbrq_input_2_mes" value="<?php echo NM_encode_input($sbrq_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.sbrq_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_sbrq_input_2_ano" name="sbrq_input_2_ano" value="<?php echo NM_encode_input($sbrq_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
         <INPUT type="hidden" id="sc_sbrq_jq2">
         </SPAN>
         </SPAN>
 </TD>
   



   </tr><tr>



   
    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['shzt'])) ? $this->New_label['shzt'] : "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_shzt'] . "";
 $nmgp_tab_label .= "shzt?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectOdd" id="SC_shzt_cond" name="shzt_cond" onChange="nm_campos_between(document.getElementById('id_vis_shzt'), this, 'shzt')">
       <OPTION value="qp" <?php if ("qp" == $shzt_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="np" <?php if ("np" == $shzt_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_not_like'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $shzt_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ep" <?php if ("ep" == $shzt_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_empty'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_shzt"  <?php echo $str_hide_shzt?>>
<?php
      $shzt_look = substr($this->Db->qstr($shzt), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT mc, mc  FROM dm_shzt  ORDER BY mc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['shzt'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['shzt'][] = trim($rs->fields[0]);
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
      echo "<span id=\"idAjaxCheckbox_shzt\">\r\n";
      echo "        <TABLE border=\"0px\" cellpadding=\"0px\">\r\n";
      echo "         <TR>\r\n";
      if (!isset($shzt) || !is_array($shzt))
      {
         $shzt = array();
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
            foreach ($shzt as $Dados)
            {
                if ($Dados === $nm_opc_cod)
                {
                    $tmp_cmp_sel = "checked";
                    break;
                }
            }
            echo "          <TD class=\"scFilterFieldFontOdd\">\r\n";
            echo "           <INPUT class=\"scFilterObjectOdd\" type=\"checkbox\" id=\"SC_shzt\" name=\"shzt[]\" value=\"" . NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val) . "\" $tmp_cmp_sel $tmp_cmp_click>$nm_opc_val\r\n";
            echo "          </TD>\r\n";
            $i++;
            if (2 == $i && $j < sizeof($nm_opcoes) - 1)
            {
               echo "         </TR>\r\n";
               echo "         <TR>\r\n";
               $i = 0;
            }
         }
      }
      echo "         </TR>\r\n";
     echo "         <TR>\r\n";
     echo "          <TD colspan=2>\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_all.gif\" ALIGN=\"absmiddle\" onClick=\"nm_marca_check('shzt', 'N'); return false;\" style=\"cursor: pointer\">&nbsp;\r\n";
     echo "           <IMG SRC=\"" . $this->Ini->path_img_global . "/img_select_none.gif\" ALIGN=\"absmiddle\" onClick=\"nm_limpa_check('shzt', 'N'); return false;\" style=\"cursor: pointer\">\r\n";
     echo "         </TR>\r\n";
      echo "        </TABLE>\r\n";
      echo "</span>\r\n";
?>
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
   if (is_file("grid_cg_lxgl_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_lxgl_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (is_file("grid_cg_lxgl_help.txt"))
   {
      $Arq_WebHelp = file("grid_cg_lxgl_help.txt"); 
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start'] == 'filter' && $nm_apl_dependente != 1)
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
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['start'] == 'filter')
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['orig_pesq'] == "grid")
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
   nm_campos_between(document.getElementById('id_vis_xmbh'), document.F1.xmbh_cond, 'xmbh');
   document.F1.xmbh.value = "";
   document.F1.xmbh_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_xmmc'), document.F1.xmmc_cond, 'xmmc');
   document.F1.xmmc.value = "";
   document.F1.xmmc_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_xmfzr'), document.F1.xmfzr_cond, 'xmfzr');
   document.F1.xmfzr.value = "";
   document.F1.xmfzr_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_zjly'), document.F1.zjly_cond, 'zjly');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'zjly[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
   nm_campos_between(document.getElementById('id_vis_sbbm'), document.F1.sbbm_cond, 'sbbm');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'sbbm[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
   var opc_bi = document.F1.sbrq_cond.value;
   if (opc_bi == 'TP' || opc_bi == 'HJ' || opc_bi == 'OT' || opc_bi == 'U7' || opc_bi == 'SP' || opc_bi == 'US' || opc_bi == 'MM' || opc_bi == 'UM' || opc_bi == 'CY' || opc_bi == 'LY' || opc_bi == 'M24' || opc_bi == 'M18' || opc_bi == 'YY' || opc_bi == 'M6' || opc_bi == 'M3')
   {
       document.F1.sbrq_cond.value = 'TP';
   }
   nm_campos_between(document.getElementById('id_vis_sbrq'), document.F1.sbrq_cond, 'sbrq');
   document.F1.sbrq_dia.value = "";
   document.F1.sbrq_mes.value = "";
   document.F1.sbrq_ano.value = "";
   document.F1.sbrq_input_2_dia.value = "";
   document.F1.sbrq_input_2_mes.value = "";
   document.F1.sbrq_input_2_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_shzt'), document.F1.shzt_cond, 'shzt');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'shzt[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
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
    $('#SC_sbrq_dia').bind('change', function() {sc_grid_cg_lxgl_valida_dia(this)});
    $('#SC_sbrq_input_2_dia').bind('change', function() {sc_grid_cg_lxgl_valida_dia(this)});
    $('#SC_sbrq_input_2_mes').bind('change', function() {sc_grid_cg_lxgl_valida_mes(this)});
    $('#SC_sbrq_mes').bind('change', function() {sc_grid_cg_lxgl_valida_mes(this)});
 }
 function sc_grid_cg_lxgl_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_cg_lxgl_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
function formata_bi_sbrq(opc)
{
   if (opc != "TP" && opc != "HJ" && opc != "OT" && opc != "U7" && opc != "SP" && opc != "US" && opc != "MM" && opc != "UM" && opc != "AM" && opc != "PS" && opc != "SS" && opc != "P3" && opc != "PM" && opc != "P7" && opc != "CY" && opc != "LY" && opc != "YY" && opc != "M6" && opc != "M3" && opc != "M18" && opc != "M24")
   {
       document.getElementById('Nm_bi_dados_sbrq').style.display = 'none';
       document.getElementById('opc_bi_TP_sbrq').style.display = '';
       return;
   }
   if (opc == "TP")
   {
       document.getElementById('Nm_bi_dados_sbrq').style.display = 'none';
       document.getElementById('opc_bi_TP_sbrq').style.display = 'none';
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
       $date_format_show .= ($Cada_d == "d") ? "document.F1.sbrq_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.sbrq_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.sbrq_ano.value" : "";
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
       $date_format_show .= ($Cada_d == "d") ? "document.F1.sbrq_input_2_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.sbrq_input_2_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.sbrq_input_2_ano.value" : "";
       $Prim = false;
   }
?> 
   saida += <?php echo $date_format_show ?>;
   }
   document.getElementById('Nm_bi_dados_sbrq').innerHTML = saida;
   document.getElementById('opc_bi_TP_sbrq').style.display = 'none';
   document.getElementById('Nm_bi_dados_sbrq').style.display = '';
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
       $NM_patch   = "cgzb/grid_cg_lxgl";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] = "";
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'];
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
          $NM_patch .= "grid_cg_lxgl/";
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
      $tp_fields['SC_xmbh_cond'] = 'cond';
      $tp_fields['SC_xmbh'] = 'text_aut';
      $tp_fields['id_ac_xmbh'] = 'text_aut';
      $tp_fields['SC_xmmc_cond'] = 'cond';
      $tp_fields['SC_xmmc'] = 'text_aut';
      $tp_fields['id_ac_xmmc'] = 'text_aut';
      $tp_fields['SC_xmfzr_cond'] = 'cond';
      $tp_fields['SC_xmfzr'] = 'text_aut';
      $tp_fields['id_ac_xmfzr'] = 'text_aut';
      $tp_fields['SC_zjly_cond'] = 'cond';
      $tp_fields['SC_zjly'] = 'checkbox';
      $tp_fields['SC_sbbm_cond'] = 'cond';
      $tp_fields['SC_sbbm'] = 'checkbox';
      $tp_fields['SC_sbrq_cond'] = 'cond';
      $tp_fields['SC_sbrq_dia'] = 'text';
      $tp_fields['SC_sbrq_mes'] = 'text';
      $tp_fields['SC_sbrq_ano'] = 'text';
      $tp_fields['SC_sbrq_input_2_dia'] = 'text';
      $tp_fields['SC_sbrq_input_2_mes'] = 'text';
      $tp_fields['SC_sbrq_input_2_ano'] = 'text';
      $tp_fields['SC_shzt_cond'] = 'cond';
      $tp_fields['SC_shzt'] = 'checkbox';
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
                  if ($Cada_cmp[0] == 'SC_sbrq_cond')
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
      global $xmbh_cond, $xmbh, $xmbh_autocomp,
             $xmmc_cond, $xmmc, $xmmc_autocomp,
             $xmfzr_cond, $xmfzr, $xmfzr_autocomp,
             $zjly_cond, $zjly,
             $sbbm_cond, $sbbm,
             $sbrq_cond, $sbrq, $sbrq_dia, $sbrq_mes, $sbrq_ano, $sbrq_input_2_dia, $sbrq_input_2_mes, $sbrq_input_2_ano,
             $shzt_cond, $shzt, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($xmbh_autocomp) && empty($xmbh))
      {
          $xmbh = $xmbh_autocomp;
      }
      if (!empty($xmmc_autocomp) && empty($xmmc))
      {
          $xmmc = $xmmc_autocomp;
      }
      if (!empty($xmfzr_autocomp) && empty($xmfzr))
      {
          $xmfzr = $xmfzr_autocomp;
      }
      $xmbh_cond_salva = $xmbh_cond; 
      if (!isset($xmbh_input_2) || $xmbh_input_2 == "")
      {
          $xmbh_input_2 = $xmbh;
      }
      $xmmc_cond_salva = $xmmc_cond; 
      if (!isset($xmmc_input_2) || $xmmc_input_2 == "")
      {
          $xmmc_input_2 = $xmmc;
      }
      $xmfzr_cond_salva = $xmfzr_cond; 
      if (!isset($xmfzr_input_2) || $xmfzr_input_2 == "")
      {
          $xmfzr_input_2 = $xmfzr;
      }
      $zjly_cond_salva = $zjly_cond; 
      if (!isset($zjly_input_2) || $zjly_input_2 == "")
      {
          $zjly_input_2 = $zjly;
      }
      $sbbm_cond_salva = $sbbm_cond; 
      if (!isset($sbbm_input_2) || $sbbm_input_2 == "")
      {
          $sbbm_input_2 = $sbbm;
      }
      $sbrq_cond_salva = $sbrq_cond; 
      if (!isset($sbrq_input_2_dia) || $sbrq_input_2_dia == "")
      {
          $sbrq_input_2_dia = $sbrq_dia;
      }
      if (!isset($sbrq_input_2_mes) || $sbrq_input_2_mes == "")
      {
          $sbrq_input_2_mes = $sbrq_mes;
      }
      if (!isset($sbrq_input_2_ano) || $sbrq_input_2_ano == "")
      {
          $sbrq_input_2_ano = $sbrq_ano;
      }
      $shzt_cond_salva = $shzt_cond; 
      if (!isset($shzt_input_2) || $shzt_input_2 == "")
      {
          $shzt_input_2 = $shzt;
      }
      if (is_array($zjly)) {
          foreach ($zjly as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if (trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['zjly'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_zjly'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      if (is_array($sbbm)) {
          foreach ($sbbm as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if (trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['sbbm'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_sbbm'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      if (is_array($shzt)) {
          foreach ($shzt as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if (trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['psq_check_ret']['shzt'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_cg_lxgl_fld_shzt'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmbh'] = $xmbh; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmbh_cond'] = $xmbh_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmmc'] = $xmmc; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmmc_cond'] = $xmmc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmfzr'] = $xmfzr; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['xmfzr_cond'] = $xmfzr_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['zjly'] = $zjly; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['zjly_cond'] = $zjly_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbbm'] = $sbbm; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbbm_cond'] = $sbbm_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_dia'] = $sbrq_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_mes'] = $sbrq_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_ano'] = $sbrq_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_dia'] = $sbrq_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_mes'] = $sbrq_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2_ano'] = $sbrq_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_cond'] = $sbrq_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['shzt'] = $shzt; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['shzt_cond'] = $shzt_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $xmbh_look = substr($this->Db->qstr($xmbh), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmbh from " . $this->Ini->nm_tabela . " where xmbh = '$xmbh_look'"; 
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
          $this->cmp_formatado['xmbh'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['xmbh'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['xmbh'] = $xmbh;
      }
      $xmmc_look = substr($this->Db->qstr($xmmc), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmmc from " . $this->Ini->nm_tabela . " where xmmc = '$xmmc_look'"; 
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
          $this->cmp_formatado['xmmc'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['xmmc'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['xmmc'] = $xmmc;
      }
      $xmfzr_look = substr($this->Db->qstr($xmfzr), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct xmfzr from " . $this->Ini->nm_tabela . " where xmfzr = '$xmfzr_look'"; 
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
          $this->cmp_formatado['xmfzr'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['xmfzr'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['xmfzr'] = $xmfzr;
      }
      $this->cmp_formatado['zjly'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['zjly'];
      $this->cmp_formatado['zjly_input_2'] = $zjly_input_2;
      $this->cmp_formatado['sbbm'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbbm'];
      $this->cmp_formatado['sbbm_input_2'] = $sbbm_input_2;
      $this->cmp_formatado['shzt'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['shzt'];
      $this->cmp_formatado['shzt_input_2'] = $shzt_input_2;

      //----- $xmbh
      $this->Date_part = false;
      if (isset($xmbh) || $xmbh_cond == "nu" || $xmbh_cond == "nn" || $xmbh_cond == "ep" || $xmbh_cond == "ne")
      {
         $this->monta_condicao("xmbh", $xmbh_cond, $xmbh, "", "xmbh");
      }

      //----- $xmmc
      $this->Date_part = false;
      if (isset($xmmc) || $xmmc_cond == "nu" || $xmmc_cond == "nn" || $xmmc_cond == "ep" || $xmmc_cond == "ne")
      {
         $this->monta_condicao("xmmc", $xmmc_cond, $xmmc, "", "xmmc");
      }

      //----- $xmfzr
      $this->Date_part = false;
      if (isset($xmfzr) || $xmfzr_cond == "nu" || $xmfzr_cond == "nn" || $xmfzr_cond == "ep" || $xmfzr_cond == "ne")
      {
         $this->monta_condicao("xmfzr", $xmfzr_cond, $xmfzr, "", "xmfzr");
      }

      //----- $zjly
      $this->Date_part = false;
      $zjly = $zjly; 
      $nm_aspas = "'";
      if (count($zjly) != 0)
      {
         foreach ($zjly as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($zjly[$i]);
            }
         }
      }
      if (count($zjly) != 0)
      {
         $this->and_or();
         if (strtoupper($zjly_cond) == "DF" || strtoupper($zjly_cond) == "NP")
         {
             $this->comando        .= " zjly not in (";
             $this->comando_sum    .= " cg_lxgl.zjly not in (";
             $this->comando_filtro .= " zjly not in (";
         }
         else
         {
             $this->comando        .= " zjly in (";
             $this->comando_sum    .= " cg_lxgl.zjly in (";
             $this->comando_filtro .= " zjly in (";
         }
         $x                     = count($zjly);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($zjly as $i => $dados)
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
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label['zjly'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }

      //----- $sbbm
      $this->Date_part = false;
      $sbbm = $sbbm; 
      $nm_aspas = "'";
      if (count($sbbm) != 0)
      {
         foreach ($sbbm as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($sbbm[$i]);
            }
         }
      }
      if (count($sbbm) != 0)
      {
         $this->and_or();
         if (strtoupper($sbbm_cond) == "DF" || strtoupper($sbbm_cond) == "NP")
         {
             $this->comando        .= " sbbm not in (";
             $this->comando_sum    .= " cg_lxgl.sbbm not in (";
             $this->comando_filtro .= " sbbm not in (";
         }
         else
         {
             $this->comando        .= " sbbm in (";
             $this->comando_sum    .= " cg_lxgl.sbbm in (";
             $this->comando_filtro .= " sbbm in (";
         }
         $x                     = count($sbbm);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($sbbm as $i => $dados)
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
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label['sbbm'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }

      //----- $sbrq
      $this->Date_part = false;
      if ($sbrq_cond != "TP")
      {
          $sbrq_cond = strtoupper($sbrq_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $sbrq_ano;
          $Dtxt .= $sbrq_mes;
          $Dtxt .= $sbrq_dia;
          $val[0]['ano'] = $sbrq_ano;
          $val[0]['mes'] = $sbrq_mes;
          $val[0]['dia'] = $sbrq_dia;
          if ($sbrq_cond == "BW")
          {
              $val[1]['ano'] = $sbrq_input_2_ano;
              $val[1]['mes'] = $sbrq_input_2_mes;
              $val[1]['dia'] = $sbrq_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DT", "DATE", $sbrq_cond , "", "data");
          $sbrq = $val[0];
          $this->cmp_formatado['sbrq'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['sbrq'], "YYYY-MM-DD");
          $this->cmp_formatado['sbrq'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($sbrq_cond == "BW")
          {
              $sbrq_input_2     = $val[1];
              $this->cmp_formatado['sbrq_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']['sbrq_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['sbrq_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['sbrq_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $sbrq_cond == "NU" || $sbrq_cond == "NN"|| $sbrq_cond == "EP"|| $sbrq_cond == "NE")
          {
              $this->monta_condicao("sbrq", $sbrq_cond, $sbrq, $sbrq_input_2, 'sbrq', 'DATE');
          }
      }

      //----- $shzt
      $this->Date_part = false;
      $shzt = $shzt; 
      $nm_aspas = "'";
      if (count($shzt) != 0)
      {
         foreach ($shzt as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($shzt[$i]);
            }
         }
      }
      if (count($shzt) != 0)
      {
         $this->and_or();
         if (strtoupper($shzt_cond) == "DF" || strtoupper($shzt_cond) == "NP")
         {
             $this->comando        .= " shzt not in (";
             $this->comando_sum    .= " cg_lxgl.shzt not in (";
             $this->comando_filtro .= " shzt not in (";
         }
         else
         {
             $this->comando        .= " shzt in (";
             $this->comando_sum    .= " cg_lxgl.shzt in (";
             $this->comando_filtro .= " shzt in (";
         }
         $x                     = count($shzt);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($shzt as $i => $dados)
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
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $nmgp_tab_label['shzt'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_fast'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_interativ'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['interativ_search'] = array();
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['fast_search']);

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
