<?php
//
class form_cg_company_reg_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id;
   var $gsmc;
   var $gsjc;
   var $tyshxydm;
   var $qylx;
   var $qylx_1;
   var $gsdz;
   var $fddbr;
   var $zczb;
   var $clrq;
   var $jyfw;
   var $khyh;
   var $khyh_1;
   var $yhdz;
   var $yhzh;
   var $lxr;
   var $lxrdh;
   var $fax;
   var $bgdh;
   var $email;
   var $bz;
   var $yyzzfile;
   var $yyzzfile_scfile_name;
   var $yyzzfile_ul_name;
   var $yyzzfile_scfile_type;
   var $yyzzfile_ul_type;
   var $yyzzfile_limpa;
   var $yyzzfile_salva;
   var $out_yyzzfile;
   var $shzt;
   var $shr;
   var $shyj;
   var $shsj;
   var $shsj_hora;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['bgdh']))
          {
              $this->bgdh = $this->NM_ajax_info['param']['bgdh'];
          }
          if (isset($this->NM_ajax_info['param']['bz']))
          {
              $this->bz = $this->NM_ajax_info['param']['bz'];
          }
          if (isset($this->NM_ajax_info['param']['clrq']))
          {
              $this->clrq = $this->NM_ajax_info['param']['clrq'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['fax']))
          {
              $this->fax = $this->NM_ajax_info['param']['fax'];
          }
          if (isset($this->NM_ajax_info['param']['fddbr']))
          {
              $this->fddbr = $this->NM_ajax_info['param']['fddbr'];
          }
          if (isset($this->NM_ajax_info['param']['gsdz']))
          {
              $this->gsdz = $this->NM_ajax_info['param']['gsdz'];
          }
          if (isset($this->NM_ajax_info['param']['gsjc']))
          {
              $this->gsjc = $this->NM_ajax_info['param']['gsjc'];
          }
          if (isset($this->NM_ajax_info['param']['gsmc']))
          {
              $this->gsmc = $this->NM_ajax_info['param']['gsmc'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['jyfw']))
          {
              $this->jyfw = $this->NM_ajax_info['param']['jyfw'];
          }
          if (isset($this->NM_ajax_info['param']['khyh']))
          {
              $this->khyh = $this->NM_ajax_info['param']['khyh'];
          }
          if (isset($this->NM_ajax_info['param']['lxr']))
          {
              $this->lxr = $this->NM_ajax_info['param']['lxr'];
          }
          if (isset($this->NM_ajax_info['param']['lxrdh']))
          {
              $this->lxrdh = $this->NM_ajax_info['param']['lxrdh'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['qylx']))
          {
              $this->qylx = $this->NM_ajax_info['param']['qylx'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tyshxydm']))
          {
              $this->tyshxydm = $this->NM_ajax_info['param']['tyshxydm'];
          }
          if (isset($this->NM_ajax_info['param']['yhdz']))
          {
              $this->yhdz = $this->NM_ajax_info['param']['yhdz'];
          }
          if (isset($this->NM_ajax_info['param']['yhzh']))
          {
              $this->yhzh = $this->NM_ajax_info['param']['yhzh'];
          }
          if (isset($this->NM_ajax_info['param']['yyzzfile']))
          {
              $this->yyzzfile = $this->NM_ajax_info['param']['yyzzfile'];
          }
          if (isset($this->NM_ajax_info['param']['yyzzfile_limpa']))
          {
              $this->yyzzfile_limpa = $this->NM_ajax_info['param']['yyzzfile_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['yyzzfile_salva']))
          {
              $this->yyzzfile_salva = $this->NM_ajax_info['param']['yyzzfile_salva'];
          }
          if (isset($this->NM_ajax_info['param']['yyzzfile_ul_name']))
          {
              $this->yyzzfile_ul_name = $this->NM_ajax_info['param']['yyzzfile_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['yyzzfile_ul_type']))
          {
              $this->yyzzfile_ul_type = $this->NM_ajax_info['param']['yyzzfile_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['zczb']))
          {
              $this->zczb = $this->NM_ajax_info['param']['zczb'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->v_gsmc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_gsmc'] = $this->v_gsmc;
      }
      if (isset($_POST["v_gsmc"])) 
      {
          $_SESSION['v_gsmc'] = $this->v_gsmc;
      }
      if (isset($_GET["v_gsmc"])) 
      {
          $_SESSION['v_gsmc'] = $this->v_gsmc;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_company_reg']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cg_company_reg']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_cg_company_reg_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->v_gsmc)) 
          {
              $_SESSION['v_gsmc'] = $this->v_gsmc;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->v_gsmc)) 
          {
              $_SESSION['v_gsmc'] = $this->v_gsmc;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cg_company_reg_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("zh_cn");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['initialize'])
          {
              $_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'on';
 

$_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'off';
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob'][$I_conf]  = $Conf_opt;
              }
          }
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("zh_cn");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_cg_company_reg_mob']['upload_field_info']['yyzzfile'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cg_company_reg_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(jpg|png)$/i',
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_company_reg_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_company_reg_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_company_reg_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_company_reg_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cg_company_reg_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_company_reg_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_company'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cg_company_reg_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['gsmc'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . '';
      $this->nm_new_label['gsjc'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_gsjc'] . '';
      $this->nm_new_label['tyshxydm'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_tyshxydm'] . '';
      $this->nm_new_label['qylx'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_qylx'] . '';
      $this->nm_new_label['gsdz'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_gsdz'] . '';
      $this->nm_new_label['fddbr'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_fddbr'] . '';
      $this->nm_new_label['zczb'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . '';
      $this->nm_new_label['clrq'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_clrq'] . '';
      $this->nm_new_label['jyfw'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_jyfw'] . '';
      $this->nm_new_label['khyh'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_khyh'] . '';
      $this->nm_new_label['yhdz'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_yhdz'] . '';
      $this->nm_new_label['yhzh'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . '';
      $this->nm_new_label['lxr'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_lxr'] . '';
      $this->nm_new_label['lxrdh'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_lxrdh'] . '';
      $this->nm_new_label['fax'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_fax'] . '';
      $this->nm_new_label['bgdh'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_bgdh'] . '';
      $this->nm_new_label['email'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_email'] . '';
      $this->nm_new_label['bz'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_bz'] . '';
      $this->nm_new_label['yyzzfile'] = '' . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_cg_company_reg_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cg_company_reg_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['yyzzfile_ul_name']) && '' != $this->NM_ajax_info['param']['yyzzfile_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_field_ul_name'][$this->yyzzfile_ul_name]))
          {
              $this->NM_ajax_info['param']['yyzzfile_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_field_ul_name'][$this->yyzzfile_ul_name];
          }
          $this->yyzzfile = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['yyzzfile_ul_name'];
          $this->yyzzfile_scfile_name = substr($this->NM_ajax_info['param']['yyzzfile_ul_name'], 12);
          $this->yyzzfile_scfile_type = $this->NM_ajax_info['param']['yyzzfile_ul_type'];
          $this->yyzzfile_ul_name = $this->NM_ajax_info['param']['yyzzfile_ul_name'];
          $this->yyzzfile_ul_type = $this->NM_ajax_info['param']['yyzzfile_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->yyzzfile             = sc_convert_encoding($this->yyzzfile,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->yyzzfile_scfile_name = sc_convert_encoding($this->yyzzfile_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->yyzzfile_ul_name     = sc_convert_encoding($this->yyzzfile_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->yyzzfile_ul_name) && '' != $this->yyzzfile_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_field_ul_name'][$this->yyzzfile_ul_name]))
          {
              $this->yyzzfile_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_field_ul_name'][$this->yyzzfile_ul_name];
          }
          $this->yyzzfile = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->yyzzfile_ul_name;
          $this->yyzzfile_scfile_name = substr($this->yyzzfile_ul_name, 12);
          $this->yyzzfile_scfile_type = $this->yyzzfile_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->yyzzfile             = sc_convert_encoding($this->yyzzfile,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->yyzzfile_scfile_name = sc_convert_encoding($this->yyzzfile_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->yyzzfile_ul_name     = sc_convert_encoding($this->yyzzfile_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_company_reg_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->shzt)){$this->shzt = $this->nmgp_dados_form['shzt'];} 
          if (!isset($this->shr)){$this->shr = $this->nmgp_dados_form['shr'];} 
          if (!isset($this->shyj)){$this->shyj = $this->nmgp_dados_form['shyj'];} 
          if (!isset($this->shsj)){$this->shsj = $this->nmgp_dados_form['shsj'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cg_company_reg_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_cg_company_reg/form_cg_company_reg_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cg_company_reg_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cg_company_reg_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cg_company_reg_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_cg_company_reg/form_cg_company_reg_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cg_company_reg_mob_erro.class.php"); 
      }
      $this->Erro      = new form_cg_company_reg_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_company_reg_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->gsmc)) { $this->nm_limpa_alfa($this->gsmc); }
      if (isset($this->gsjc)) { $this->nm_limpa_alfa($this->gsjc); }
      if (isset($this->tyshxydm)) { $this->nm_limpa_alfa($this->tyshxydm); }
      if (isset($this->qylx)) { $this->nm_limpa_alfa($this->qylx); }
      if (isset($this->gsdz)) { $this->nm_limpa_alfa($this->gsdz); }
      if (isset($this->fddbr)) { $this->nm_limpa_alfa($this->fddbr); }
      if (isset($this->zczb)) { $this->nm_limpa_alfa($this->zczb); }
      if (isset($this->jyfw)) { $this->nm_limpa_alfa($this->jyfw); }
      if (isset($this->khyh)) { $this->nm_limpa_alfa($this->khyh); }
      if (isset($this->yhdz)) { $this->nm_limpa_alfa($this->yhdz); }
      if (isset($this->yhzh)) { $this->nm_limpa_alfa($this->yhzh); }
      if (isset($this->lxr)) { $this->nm_limpa_alfa($this->lxr); }
      if (isset($this->lxrdh)) { $this->nm_limpa_alfa($this->lxrdh); }
      if (isset($this->fax)) { $this->nm_limpa_alfa($this->fax); }
      if (isset($this->bgdh)) { $this->nm_limpa_alfa($this->bgdh); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->bz)) { $this->nm_limpa_alfa($this->bz); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- zczb
      $this->field_config['zczb']               = array();
      $this->field_config['zczb']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['zczb']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['zczb']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['zczb']['symbol_mon'] = '';
      $this->field_config['zczb']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['zczb']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- clrq
      $this->field_config['clrq']                 = array();
      $this->field_config['clrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['clrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['clrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'clrq');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- shsj
      $this->field_config['shsj']                 = array();
      $this->field_config['shsj']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['shsj']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['shsj']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['shsj']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'shsj');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_gsmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gsmc');
          }
          if ('validate_gsjc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gsjc');
          }
          if ('validate_tyshxydm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tyshxydm');
          }
          if ('validate_qylx' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qylx');
          }
          if ('validate_gsdz' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gsdz');
          }
          if ('validate_fddbr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fddbr');
          }
          if ('validate_zczb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zczb');
          }
          if ('validate_clrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'clrq');
          }
          if ('validate_jyfw' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jyfw');
          }
          if ('validate_khyh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'khyh');
          }
          if ('validate_yhdz' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'yhdz');
          }
          if ('validate_yhzh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'yhzh');
          }
          if ('validate_lxr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lxr');
          }
          if ('validate_lxrdh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lxrdh');
          }
          if ('validate_fax' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fax');
          }
          if ('validate_bgdh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bgdh');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_bz' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bz');
          }
          if ('validate_yyzzfile' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'yyzzfile');
          }
          form_cg_company_reg_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_cg_company_reg_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cg_company_reg_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_cg_company_reg_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_cg_company_reg_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_cg_company_reg_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_cg_company_reg_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_cg_company_reg_mob_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'gsmc':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . "";
               break;
           case 'gsjc':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsjc'] . "";
               break;
           case 'tyshxydm':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_tyshxydm'] . "";
               break;
           case 'qylx':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_qylx'] . "";
               break;
           case 'gsdz':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsdz'] . "";
               break;
           case 'fddbr':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_fddbr'] . "";
               break;
           case 'zczb':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . "";
               break;
           case 'clrq':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_clrq'] . "";
               break;
           case 'jyfw':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_jyfw'] . "";
               break;
           case 'khyh':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_khyh'] . "";
               break;
           case 'yhdz':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhdz'] . "";
               break;
           case 'yhzh':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . "";
               break;
           case 'lxr':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxr'] . "";
               break;
           case 'lxrdh':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxrdh'] . "";
               break;
           case 'fax':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_fax'] . "";
               break;
           case 'bgdh':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_bgdh'] . "";
               break;
           case 'email':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_email'] . "";
               break;
           case 'bz':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_bz'] . "";
               break;
           case 'yyzzfile':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . "";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_id'] . "";
               break;
           case 'shzt':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_shzt'] . "";
               break;
           case 'shr':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_shr'] . "";
               break;
           case 'shyj':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_shyj'] . "";
               break;
           case 'shsj':
               return "" . $this->Ini->Nm_lang['lang_cg_company_fld_shsj'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_cg_company_reg_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_cg_company_reg_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cg_company_reg_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cg_company_reg_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'gsmc' == $filtro)
        $this->ValidateField_gsmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gsjc' == $filtro)
        $this->ValidateField_gsjc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tyshxydm' == $filtro)
        $this->ValidateField_tyshxydm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qylx' == $filtro)
        $this->ValidateField_qylx($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gsdz' == $filtro)
        $this->ValidateField_gsdz($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fddbr' == $filtro)
        $this->ValidateField_fddbr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zczb' == $filtro)
        $this->ValidateField_zczb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'clrq' == $filtro)
        $this->ValidateField_clrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jyfw' == $filtro)
        $this->ValidateField_jyfw($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'khyh' == $filtro)
        $this->ValidateField_khyh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'yhdz' == $filtro)
        $this->ValidateField_yhdz($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'yhzh' == $filtro)
        $this->ValidateField_yhzh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lxr' == $filtro)
        $this->ValidateField_lxr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lxrdh' == $filtro)
        $this->ValidateField_lxrdh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fax' == $filtro)
        $this->ValidateField_fax($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bgdh' == $filtro)
        $this->ValidateField_bgdh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bz' == $filtro)
        $this->ValidateField_bz($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'yyzzfile' == $filtro)
        $this->ValidateField_yyzzfile($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
//-- converter datas   
      $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_gsmc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsmc'] == "on")) 
      { 
          if ($this->gsmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . "" ; 
              if (!isset($Campos_Erros['gsmc']))
              {
                  $Campos_Erros['gsmc'] = array();
              }
              $Campos_Erros['gsmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['gsmc']) || !is_array($this->NM_ajax_info['errList']['gsmc']))
                  {
                      $this->NM_ajax_info['errList']['gsmc'] = array();
                  }
                  $this->NM_ajax_info['errList']['gsmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->gsmc) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['gsmc']))
              {
                  $Campos_Erros['gsmc'] = array();
              }
              $Campos_Erros['gsmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['gsmc']) || !is_array($this->NM_ajax_info['errList']['gsmc']))
              {
                  $this->NM_ajax_info['errList']['gsmc'] = array();
              }
              $this->NM_ajax_info['errList']['gsmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_gsmc

    function ValidateField_gsjc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsjc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsjc'] == "on")) 
      { 
          if ($this->gsjc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsjc'] . "" ; 
              if (!isset($Campos_Erros['gsjc']))
              {
                  $Campos_Erros['gsjc'] = array();
              }
              $Campos_Erros['gsjc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['gsjc']) || !is_array($this->NM_ajax_info['errList']['gsjc']))
                  {
                      $this->NM_ajax_info['errList']['gsjc'] = array();
                  }
                  $this->NM_ajax_info['errList']['gsjc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->gsjc) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsjc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['gsjc']))
              {
                  $Campos_Erros['gsjc'] = array();
              }
              $Campos_Erros['gsjc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['gsjc']) || !is_array($this->NM_ajax_info['errList']['gsjc']))
              {
                  $this->NM_ajax_info['errList']['gsjc'] = array();
              }
              $this->NM_ajax_info['errList']['gsjc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_gsjc

    function ValidateField_tyshxydm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['tyshxydm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['tyshxydm'] == "on")) 
      { 
          if ($this->tyshxydm == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_tyshxydm'] . "" ; 
              if (!isset($Campos_Erros['tyshxydm']))
              {
                  $Campos_Erros['tyshxydm'] = array();
              }
              $Campos_Erros['tyshxydm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tyshxydm']) || !is_array($this->NM_ajax_info['errList']['tyshxydm']))
                  {
                      $this->NM_ajax_info['errList']['tyshxydm'] = array();
                  }
                  $this->NM_ajax_info['errList']['tyshxydm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tyshxydm) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_tyshxydm'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tyshxydm']))
              {
                  $Campos_Erros['tyshxydm'] = array();
              }
              $Campos_Erros['tyshxydm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tyshxydm']) || !is_array($this->NM_ajax_info['errList']['tyshxydm']))
              {
                  $this->NM_ajax_info['errList']['tyshxydm'] = array();
              }
              $this->NM_ajax_info['errList']['tyshxydm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_tyshxydm

    function ValidateField_qylx(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->qylx == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['qylx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['qylx'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_qylx'] . "" ; 
          if (!isset($Campos_Erros['qylx']))
          {
              $Campos_Erros['qylx'] = array();
          }
          $Campos_Erros['qylx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['qylx']) || !is_array($this->NM_ajax_info['errList']['qylx']))
          {
              $this->NM_ajax_info['errList']['qylx'] = array();
          }
          $this->NM_ajax_info['errList']['qylx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->qylx) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx']) && !in_array($this->qylx, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['qylx']))
              {
                  $Campos_Erros['qylx'] = array();
              }
              $Campos_Erros['qylx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['qylx']) || !is_array($this->NM_ajax_info['errList']['qylx']))
              {
                  $this->NM_ajax_info['errList']['qylx'] = array();
              }
              $this->NM_ajax_info['errList']['qylx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_qylx

    function ValidateField_gsdz(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsdz']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['gsdz'] == "on")) 
      { 
          if ($this->gsdz == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsdz'] . "" ; 
              if (!isset($Campos_Erros['gsdz']))
              {
                  $Campos_Erros['gsdz'] = array();
              }
              $Campos_Erros['gsdz'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['gsdz']) || !is_array($this->NM_ajax_info['errList']['gsdz']))
                  {
                      $this->NM_ajax_info['errList']['gsdz'] = array();
                  }
                  $this->NM_ajax_info['errList']['gsdz'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->gsdz) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_gsdz'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['gsdz']))
              {
                  $Campos_Erros['gsdz'] = array();
              }
              $Campos_Erros['gsdz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['gsdz']) || !is_array($this->NM_ajax_info['errList']['gsdz']))
              {
                  $this->NM_ajax_info['errList']['gsdz'] = array();
              }
              $this->NM_ajax_info['errList']['gsdz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_gsdz

    function ValidateField_fddbr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['fddbr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['fddbr'] == "on")) 
      { 
          if ($this->fddbr == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_fddbr'] . "" ; 
              if (!isset($Campos_Erros['fddbr']))
              {
                  $Campos_Erros['fddbr'] = array();
              }
              $Campos_Erros['fddbr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fddbr']) || !is_array($this->NM_ajax_info['errList']['fddbr']))
                  {
                      $this->NM_ajax_info['errList']['fddbr'] = array();
                  }
                  $this->NM_ajax_info['errList']['fddbr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fddbr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_fddbr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fddbr']))
              {
                  $Campos_Erros['fddbr'] = array();
              }
              $Campos_Erros['fddbr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fddbr']) || !is_array($this->NM_ajax_info['errList']['fddbr']))
              {
                  $this->NM_ajax_info['errList']['fddbr'] = array();
              }
              $this->NM_ajax_info['errList']['fddbr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fddbr

    function ValidateField_zczb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['zczb']['symbol_dec']))
      {
          $this->sc_remove_currency($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp'], $this->field_config['zczb']['symbol_mon']); 
          nm_limpa_valor($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp']) ; 
          if ('.' == substr($this->zczb, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->zczb, 1)))
              {
                  $this->zczb = '';
              }
              else
              {
                  $this->zczb = '0' . $this->zczb;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->zczb != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->zczb) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['zczb']))
                  {
                      $Campos_Erros['zczb'] = array();
                  }
                  $Campos_Erros['zczb'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['zczb']) || !is_array($this->NM_ajax_info['errList']['zczb']))
                  {
                      $this->NM_ajax_info['errList']['zczb'] = array();
                  }
                  $this->NM_ajax_info['errList']['zczb'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->zczb, 4, 2, -0, 999999, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . "; " ; 
                  if (!isset($Campos_Erros['zczb']))
                  {
                      $Campos_Erros['zczb'] = array();
                  }
                  $Campos_Erros['zczb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['zczb']) || !is_array($this->NM_ajax_info['errList']['zczb']))
                  {
                      $this->NM_ajax_info['errList']['zczb'] = array();
                  }
                  $this->NM_ajax_info['errList']['zczb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['zczb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['zczb'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_zczb'] . "" ; 
              if (!isset($Campos_Erros['zczb']))
              {
                  $Campos_Erros['zczb'] = array();
              }
              $Campos_Erros['zczb'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['zczb']) || !is_array($this->NM_ajax_info['errList']['zczb']))
                  {
                      $this->NM_ajax_info['errList']['zczb'] = array();
                  }
                  $this->NM_ajax_info['errList']['zczb'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_zczb

    function ValidateField_clrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->clrq, $this->field_config['clrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['clrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['clrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['clrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['clrq']['date_sep']) ; 
          if (trim($this->clrq) != "")  
          { 
              if ($teste_validade->Data($this->clrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_clrq'] . "; " ; 
                  if (!isset($Campos_Erros['clrq']))
                  {
                      $Campos_Erros['clrq'] = array();
                  }
                  $Campos_Erros['clrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['clrq']) || !is_array($this->NM_ajax_info['errList']['clrq']))
                  {
                      $this->NM_ajax_info['errList']['clrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['clrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif ((!$this->NM_ajax_flag || 'validate_clrq' != $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['clrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['clrq'] == "on")) 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_clrq'] . "" ; 
              if (!isset($Campos_Erros['clrq']))
              {
                  $Campos_Erros['clrq'] = array();
              }
              $Campos_Erros['clrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['clrq']) || !is_array($this->NM_ajax_info['errList']['clrq']))
                  {
                      $this->NM_ajax_info['errList']['clrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['clrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['clrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_clrq

    function ValidateField_jyfw(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['jyfw']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['jyfw'] == "on")) 
      { 
          if ($this->jyfw == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_jyfw'] . "" ; 
              if (!isset($Campos_Erros['jyfw']))
              {
                  $Campos_Erros['jyfw'] = array();
              }
              $Campos_Erros['jyfw'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['jyfw']) || !is_array($this->NM_ajax_info['errList']['jyfw']))
                  {
                      $this->NM_ajax_info['errList']['jyfw'] = array();
                  }
                  $this->NM_ajax_info['errList']['jyfw'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->jyfw) > 128) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_jyfw'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['jyfw']))
              {
                  $Campos_Erros['jyfw'] = array();
              }
              $Campos_Erros['jyfw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['jyfw']) || !is_array($this->NM_ajax_info['errList']['jyfw']))
              {
                  $this->NM_ajax_info['errList']['jyfw'] = array();
              }
              $this->NM_ajax_info['errList']['jyfw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_jyfw

    function ValidateField_khyh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->khyh == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['khyh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['khyh'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_khyh'] . "" ; 
          if (!isset($Campos_Erros['khyh']))
          {
              $Campos_Erros['khyh'] = array();
          }
          $Campos_Erros['khyh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['khyh']) || !is_array($this->NM_ajax_info['errList']['khyh']))
          {
              $this->NM_ajax_info['errList']['khyh'] = array();
          }
          $this->NM_ajax_info['errList']['khyh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->khyh) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh']) && !in_array($this->khyh, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['khyh']))
              {
                  $Campos_Erros['khyh'] = array();
              }
              $Campos_Erros['khyh'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['khyh']) || !is_array($this->NM_ajax_info['errList']['khyh']))
              {
                  $this->NM_ajax_info['errList']['khyh'] = array();
              }
              $this->NM_ajax_info['errList']['khyh'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_khyh

    function ValidateField_yhdz(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->yhdz) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhdz'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['yhdz']))
              {
                  $Campos_Erros['yhdz'] = array();
              }
              $Campos_Erros['yhdz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['yhdz']) || !is_array($this->NM_ajax_info['errList']['yhdz']))
              {
                  $this->NM_ajax_info['errList']['yhdz'] = array();
              }
              $this->NM_ajax_info['errList']['yhdz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_yhdz

    function ValidateField_yhzh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['yhzh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['yhzh'] == "on")) 
      { 
          if ($this->yhzh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . "" ; 
              if (!isset($Campos_Erros['yhzh']))
              {
                  $Campos_Erros['yhzh'] = array();
              }
              $Campos_Erros['yhzh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['yhzh']) || !is_array($this->NM_ajax_info['errList']['yhzh']))
                  {
                      $this->NM_ajax_info['errList']['yhzh'] = array();
                  }
                  $this->NM_ajax_info['errList']['yhzh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->yhzh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['yhzh']))
              {
                  $Campos_Erros['yhzh'] = array();
              }
              $Campos_Erros['yhzh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['yhzh']) || !is_array($this->NM_ajax_info['errList']['yhzh']))
              {
                  $this->NM_ajax_info['errList']['yhzh'] = array();
              }
              $this->NM_ajax_info['errList']['yhzh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->yhzh ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->yhzh, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yhzh'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['yhzh']))
              {
                  $Campos_Erros['yhzh'] = array();
              }
              $Campos_Erros['yhzh'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['yhzh']) || !is_array($this->NM_ajax_info['errList']['yhzh']))
              {
                  $this->NM_ajax_info['errList']['yhzh'] = array();
              }
              $this->NM_ajax_info['errList']['yhzh'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_yhzh

    function ValidateField_lxr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['lxr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['lxr'] == "on")) 
      { 
          if ($this->lxr == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxr'] . "" ; 
              if (!isset($Campos_Erros['lxr']))
              {
                  $Campos_Erros['lxr'] = array();
              }
              $Campos_Erros['lxr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lxr']) || !is_array($this->NM_ajax_info['errList']['lxr']))
                  {
                      $this->NM_ajax_info['errList']['lxr'] = array();
                  }
                  $this->NM_ajax_info['errList']['lxr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lxr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lxr']))
              {
                  $Campos_Erros['lxr'] = array();
              }
              $Campos_Erros['lxr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lxr']) || !is_array($this->NM_ajax_info['errList']['lxr']))
              {
                  $this->NM_ajax_info['errList']['lxr'] = array();
              }
              $this->NM_ajax_info['errList']['lxr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lxr

    function ValidateField_lxrdh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['lxrdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['lxrdh'] == "on")) 
      { 
          if ($this->lxrdh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxrdh'] . "" ; 
              if (!isset($Campos_Erros['lxrdh']))
              {
                  $Campos_Erros['lxrdh'] = array();
              }
              $Campos_Erros['lxrdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lxrdh']) || !is_array($this->NM_ajax_info['errList']['lxrdh']))
                  {
                      $this->NM_ajax_info['errList']['lxrdh'] = array();
                  }
                  $this->NM_ajax_info['errList']['lxrdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lxrdh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_lxrdh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lxrdh']))
              {
                  $Campos_Erros['lxrdh'] = array();
              }
              $Campos_Erros['lxrdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lxrdh']) || !is_array($this->NM_ajax_info['errList']['lxrdh']))
              {
                  $this->NM_ajax_info['errList']['lxrdh'] = array();
              }
              $this->NM_ajax_info['errList']['lxrdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lxrdh

    function ValidateField_fax(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fax) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_fax'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fax']))
              {
                  $Campos_Erros['fax'] = array();
              }
              $Campos_Erros['fax'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fax']) || !is_array($this->NM_ajax_info['errList']['fax']))
              {
                  $this->NM_ajax_info['errList']['fax'] = array();
              }
              $this->NM_ajax_info['errList']['fax'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fax

    function ValidateField_bgdh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bgdh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_bgdh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bgdh']))
              {
                  $Campos_Erros['bgdh'] = array();
              }
              $Campos_Erros['bgdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bgdh']) || !is_array($this->NM_ajax_info['errList']['bgdh']))
              {
                  $this->NM_ajax_info['errList']['bgdh'] = array();
              }
              $this->NM_ajax_info['errList']['bgdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bgdh

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email) != "")  
          { 
              if ($teste_validade->Email($this->email) == false)  
              { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_email'] . "; " ; 
                  if (!isset($Campos_Erros['email']))
                  {
                      $Campos_Erros['email'] = array();
                  }
                  $Campos_Erros['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                      {
                          $this->NM_ajax_info['errList']['email'] = array();
                      }
                      $this->NM_ajax_info['errList']['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['php_cmp_required']['email'] == "on") 
          { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_company_fld_email'] . "" ; 
              if (!isset($Campos_Erros['email']))
              {
                  $Campos_Erros['email'] = array();
              }
              $Campos_Erros['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                  {
                      $this->NM_ajax_info['errList']['email'] = array();
                  }
                  $this->NM_ajax_info['errList']['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
    } // ValidateField_email

    function ValidateField_bz(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bz) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_bz'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bz']))
              {
                  $Campos_Erros['bz'] = array();
              }
              $Campos_Erros['bz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bz']) || !is_array($this->NM_ajax_info['errList']['bz']))
              {
                  $this->NM_ajax_info['errList']['bz'] = array();
              }
              $this->NM_ajax_info['errList']['bz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bz

    function ValidateField_yyzzfile(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->yyzzfile;
            if ("" != $this->yyzzfile && "S" != $this->yyzzfile_limpa && !$teste_validade->ArqExtensao($this->yyzzfile, array('jpg', 'png')))
            {
                $Campos_Crit .= "{lang_cg_company_fld_yyzzfile}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['yyzzfile']))
                {
                    $Campos_Erros['yyzzfile'] = array();
                }
                $Campos_Erros['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['yyzzfile']) || !is_array($this->NM_ajax_info['errList']['yyzzfile']))
                {
                    $this->NM_ajax_info['errList']['yyzzfile'] = array();
                }
                $this->NM_ajax_info['errList']['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_yyzzfile
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->yyzzfile == "none") 
          { 
              $this->yyzzfile = ""; 
          } 
          if ($this->yyzzfile != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_cg_company_reg_mob_doc_name.php';
              }
              $this->yyzzfile = sc_upload_unprotect_chars($this->yyzzfile);
              $this->yyzzfile_scfile_name = sc_upload_unprotect_chars($this->yyzzfile_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->yyzzfile_scfile_type = substr($this->yyzzfile_scfile_type, 0, strpos($this->yyzzfile_scfile_type, ";")) ; 
              } 
              if ($this->yyzzfile_scfile_type == "image/pjpeg" || $this->yyzzfile_scfile_type == "image/jpeg" || $this->yyzzfile_scfile_type == "image/gif" ||  
                  $this->yyzzfile_scfile_type == "image/png" || $this->yyzzfile_scfile_type == "image/x-png" || $this->yyzzfile_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->yyzzfile))  
                  { 
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_yyzzfile = $this->yyzzfile;
                      } 
                      else 
                      { 
                          $arq_yyzzfile = fopen($this->yyzzfile, "r") ; 
                          $reg_yyzzfile = fread($arq_yyzzfile, filesize($this->yyzzfile)) ; 
                          fclose($arq_yyzzfile) ;  
                      } 
                      $this->yyzzfile =  trim($this->yyzzfile_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "yyzz" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (is_dir($dir_img))  
                      { 
                          $_test_file = $this->fetchUniqueUploadName($this->yyzzfile_scfile_name, $dir_img, "yyzzfile");
                          if (trim($this->yyzzfile_scfile_name) != $_test_file)
                          {
                              $this->yyzzfile_scfile_name = $_test_file;
                              $this->yyzzfile = $_test_file;
                          }
                          $arq_yyzzfile = fopen($dir_img . trim($this->yyzzfile_scfile_name), "w") ; 
                          fwrite($arq_yyzzfile, $reg_yyzzfile) ;  
                          fclose($arq_yyzzfile) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . ": " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                          $this->yyzzfile = "";
                          if (!isset($Campos_Erros['yyzzfile']))
                          {
                              $Campos_Erros['yyzzfile'] = array();
                          }
                          $Campos_Erros['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                          if (!isset($this->NM_ajax_info['errList']['yyzzfile']) || !is_array($this->NM_ajax_info['errList']['yyzzfile']))
                          {
                              $this->NM_ajax_info['errList']['yyzzfile'] = array();
                          }
                          $this->NM_ajax_info['errList']['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->yyzzfile = "";
                      if (!isset($Campos_Erros['yyzzfile']))
                      {
                          $Campos_Erros['yyzzfile'] = array();
                      }
                      $Campos_Erros['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['yyzzfile']) || !is_array($this->NM_ajax_info['errList']['yyzzfile']))
                      {
                          $this->NM_ajax_info['errList']['yyzzfile'] = array();
                      }
                      $this->NM_ajax_info['errList']['yyzzfile'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->yyzzfile = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_company_fld_yyzzfile'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['yyzzfile']))
                      {
                          $Campos_Erros['yyzzfile'] = array();
                      }
                      $Campos_Erros['yyzzfile'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['yyzzfile']) || !is_array($this->NM_ajax_info['errList']['yyzzfile']))
                      {
                          $this->NM_ajax_info['errList']['yyzzfile'] = array();
                      }
                      $this->NM_ajax_info['errList']['yyzzfile'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->yyzzfile_salva) && $this->yyzzfile_limpa != "S")
          {
              $this->yyzzfile = $this->yyzzfile_salva;
          }
      } 
      elseif (!empty($this->yyzzfile_salva) && $this->yyzzfile_limpa != "S")
      {
          $this->yyzzfile = $this->yyzzfile_salva;
      }
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['gsmc'] = $this->gsmc;
    $this->nmgp_dados_form['gsjc'] = $this->gsjc;
    $this->nmgp_dados_form['tyshxydm'] = $this->tyshxydm;
    $this->nmgp_dados_form['qylx'] = $this->qylx;
    $this->nmgp_dados_form['gsdz'] = $this->gsdz;
    $this->nmgp_dados_form['fddbr'] = $this->fddbr;
    $this->nmgp_dados_form['zczb'] = $this->zczb;
    $this->nmgp_dados_form['clrq'] = $this->clrq;
    $this->nmgp_dados_form['jyfw'] = $this->jyfw;
    $this->nmgp_dados_form['khyh'] = $this->khyh;
    $this->nmgp_dados_form['yhdz'] = $this->yhdz;
    $this->nmgp_dados_form['yhzh'] = $this->yhzh;
    $this->nmgp_dados_form['lxr'] = $this->lxr;
    $this->nmgp_dados_form['lxrdh'] = $this->lxrdh;
    $this->nmgp_dados_form['fax'] = $this->fax;
    $this->nmgp_dados_form['bgdh'] = $this->bgdh;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['bz'] = $this->bz;
    if (empty($this->yyzzfile))
    {
        $this->yyzzfile = $this->nmgp_dados_form['yyzzfile'];
    }
    $this->nmgp_dados_form['yyzzfile'] = $this->yyzzfile;
    $this->nmgp_dados_form['yyzzfile_limpa'] = $this->yyzzfile_limpa;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['shzt'] = $this->shzt;
    $this->nmgp_dados_form['shr'] = $this->shr;
    $this->nmgp_dados_form['shyj'] = $this->shyj;
    $this->nmgp_dados_form['shsj'] = $this->shsj;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      if (!empty($this->field_config['zczb']['symbol_dec']))
      {
         $this->sc_remove_currency($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp'], $this->field_config['zczb']['symbol_mon']);
         nm_limpa_valor($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp']);
      }
      nm_limpa_data($this->clrq, $this->field_config['clrq']['date_sep']) ; 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->shsj, $this->field_config['shsj']['date_sep']) ; 
      nm_limpa_hora($this->shsj_hora, $this->field_config['shsj']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "zczb")
      {
          if (!empty($this->field_config['zczb']['symbol_dec']))
          {
             $this->sc_remove_currency($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp'], $this->field_config['zczb']['symbol_mon']);
             nm_limpa_valor($this->zczb, $this->field_config['zczb']['symbol_dec'], $this->field_config['zczb']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->zczb) || (!empty($format_fields) && isset($format_fields['zczb'])))
      {
          nmgp_Form_Num_Val($this->zczb, $this->field_config['zczb']['symbol_grp'], $this->field_config['zczb']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['zczb']['symbol_fmt']) ; 
      }
      if ((!empty($this->clrq) && 'null' != $this->clrq) || (!empty($format_fields) && isset($format_fields['clrq'])))
      {
          nm_volta_data($this->clrq, $this->field_config['clrq']['date_format']) ; 
          nmgp_Form_Datas($this->clrq, $this->field_config['clrq']['date_format'], $this->field_config['clrq']['date_sep']) ;  
      }
      elseif ('null' == $this->clrq || '' == $this->clrq)
      {
          $this->clrq = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['clrq']['date_format'];
      if ($this->clrq != "")  
      { 
          nm_conv_data($this->clrq, $this->field_config['clrq']['date_format']) ; 
          $this->clrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->clrq_hora = substr($this->clrq_hora, 0, -4);
          }
      } 
      if ($this->clrq == "" && $use_null)  
      { 
          $this->clrq = "null" ; 
      } 
      $this->field_config['clrq']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_gsmc();
          $this->ajax_return_values_gsjc();
          $this->ajax_return_values_tyshxydm();
          $this->ajax_return_values_qylx();
          $this->ajax_return_values_gsdz();
          $this->ajax_return_values_fddbr();
          $this->ajax_return_values_zczb();
          $this->ajax_return_values_clrq();
          $this->ajax_return_values_jyfw();
          $this->ajax_return_values_khyh();
          $this->ajax_return_values_yhdz();
          $this->ajax_return_values_yhzh();
          $this->ajax_return_values_lxr();
          $this->ajax_return_values_lxrdh();
          $this->ajax_return_values_fax();
          $this->ajax_return_values_bgdh();
          $this->ajax_return_values_email();
          $this->ajax_return_values_bz();
          $this->ajax_return_values_yyzzfile();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_cg_company_reg_mob_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- gsmc
   function ajax_return_values_gsmc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gsmc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gsmc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['gsmc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- gsjc
   function ajax_return_values_gsjc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gsjc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gsjc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['gsjc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tyshxydm
   function ajax_return_values_tyshxydm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tyshxydm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tyshxydm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tyshxydm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- qylx
   function ajax_return_values_qylx($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qylx", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qylx);
              $aLookup = array();
              $this->_tmp_lookup_qylx = $this->qylx;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx'] = array(); 
}
$aLookup[] = array(form_cg_company_reg_mob_pack_protect_string('') => form_cg_company_reg_mob_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_qylx 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_company_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_company_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_qylx'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"qylx\"";
          if (isset($this->NM_ajax_info['select_html']['qylx']) && !empty($this->NM_ajax_info['select_html']['qylx']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['qylx'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->qylx == $sValue)
                  {
                      $this->_tmp_lookup_qylx = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['qylx'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['qylx']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['qylx']['valList'][$i] = form_cg_company_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['qylx']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['qylx']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['qylx']['labList'] = $aLabel;
          }
   }

          //----- gsdz
   function ajax_return_values_gsdz($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gsdz", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gsdz);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['gsdz'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fddbr
   function ajax_return_values_fddbr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fddbr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fddbr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fddbr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- zczb
   function ajax_return_values_zczb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zczb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zczb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zczb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- clrq
   function ajax_return_values_clrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("clrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->clrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['clrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- jyfw
   function ajax_return_values_jyfw($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jyfw", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jyfw);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jyfw'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- khyh
   function ajax_return_values_khyh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("khyh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->khyh);
              $aLookup = array();
              $this->_tmp_lookup_khyh = $this->khyh;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh'] = array(); 
}
$aLookup[] = array(form_cg_company_reg_mob_pack_protect_string('') => form_cg_company_reg_mob_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_zczb = $this->zczb;
   $old_value_clrq = $this->clrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_zczb = $this->zczb;
   $unformatted_value_clrq = $this->clrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bank 
ORDER BY mc";

   $this->zczb = $old_value_zczb;
   $this->clrq = $old_value_clrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_company_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_company_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['Lookup_khyh'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"khyh\"";
          if (isset($this->NM_ajax_info['select_html']['khyh']) && !empty($this->NM_ajax_info['select_html']['khyh']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['khyh'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->khyh == $sValue)
                  {
                      $this->_tmp_lookup_khyh = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['khyh'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['khyh']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['khyh']['valList'][$i] = form_cg_company_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['khyh']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['khyh']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['khyh']['labList'] = $aLabel;
          }
   }

          //----- yhdz
   function ajax_return_values_yhdz($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("yhdz", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->yhdz);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['yhdz'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- yhzh
   function ajax_return_values_yhzh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("yhzh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->yhzh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['yhzh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lxr
   function ajax_return_values_lxr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lxr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lxr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lxr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lxrdh
   function ajax_return_values_lxrdh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lxrdh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lxrdh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lxrdh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fax
   function ajax_return_values_fax($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fax", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fax);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fax'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- bgdh
   function ajax_return_values_bgdh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bgdh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bgdh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bgdh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bz
   function ajax_return_values_bz($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bz", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bz);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bz'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- yyzzfile
   function ajax_return_values_yyzzfile($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("yyzzfile", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->yyzzfile);
              $aLookup = array();
   $out_yyzzfile = '';
   $out1_yyzzfile = '';
   if ($this->yyzzfile != "" && $this->yyzzfile != "none")   
   { 
       $path_yyzzfile = $this->Ini->root . $this->Ini->path_imagens . "yyzz" . "/" . $this->yyzzfile;
       $md5_yyzzfile  = md5("yyzz" . $this->yyzzfile);
       if (is_file($path_yyzzfile))  
       { 
           $NM_ler_img = true;
           $out_yyzzfile = $this->Ini->path_imag_temp . "/sc_yyzzfile_" . $md5_yyzzfile . ".gif" ;  
           $out1_yyzzfile = $out_yyzzfile; 
           if (is_file($this->Ini->root . $out_yyzzfile))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_yyzzfile) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_yyzzfile = fopen($path_yyzzfile, "r") ; 
               $reg_yyzzfile = fread($tmp_yyzzfile, filesize($path_yyzzfile)) ; 
               fclose($tmp_yyzzfile) ;  
               $arq_yyzzfile = fopen($this->Ini->root . $out_yyzzfile, "w") ;  
               fwrite($arq_yyzzfile, $reg_yyzzfile) ;  
               fclose($arq_yyzzfile) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_yyzzfile);
           $this->nmgp_return_img['yyzzfile'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['yyzzfile'][1] = $sc_obj_img->getWidth();
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['yyzzfile'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_yyzzfile,
               'imgOrig' => $out1_yyzzfile,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_gsmc = $this->gsmc;
}
if (!isset($this->sc_temp_v_gsmc)) {$this->sc_temp_v_gsmc = (isset($_SESSION['v_gsmc'])) ? $_SESSION['v_gsmc'] : "";}
  if(empty($this->gsmc )){
   $this->gsmc =$this->sc_temp_v_gsmc;
 }



if (isset($this->sc_temp_v_gsmc)) { $_SESSION['v_gsmc'] = $this->sc_temp_v_gsmc;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_gsmc != $this->gsmc || (isset($bFlagRead_gsmc) && $bFlagRead_gsmc)))
    {
        $this->ajax_return_values_gsmc(true);
    }
}
$_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->shsj))
      {
          $this->shsj_hora = $this->shsj;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->zczb = str_replace($sc_parm1, $sc_parm2, $this->zczb); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->zczb = "'" . $this->zczb . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->zczb = str_replace("'", "", $this->zczb); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['gsmc'] = $this->gsmc;
      $NM_val_form['gsjc'] = $this->gsjc;
      $NM_val_form['tyshxydm'] = $this->tyshxydm;
      $NM_val_form['qylx'] = $this->qylx;
      $NM_val_form['gsdz'] = $this->gsdz;
      $NM_val_form['fddbr'] = $this->fddbr;
      $NM_val_form['zczb'] = $this->zczb;
      $NM_val_form['clrq'] = $this->clrq;
      $NM_val_form['jyfw'] = $this->jyfw;
      $NM_val_form['khyh'] = $this->khyh;
      $NM_val_form['yhdz'] = $this->yhdz;
      $NM_val_form['yhzh'] = $this->yhzh;
      $NM_val_form['lxr'] = $this->lxr;
      $NM_val_form['lxrdh'] = $this->lxrdh;
      $NM_val_form['fax'] = $this->fax;
      $NM_val_form['bgdh'] = $this->bgdh;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['bz'] = $this->bz;
      $NM_val_form['yyzzfile'] = $this->yyzzfile;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['shzt'] = $this->shzt;
      $NM_val_form['shr'] = $this->shr;
      $NM_val_form['shyj'] = $this->shyj;
      $NM_val_form['shsj'] = $this->shsj;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->zczb == "")  
      { 
          $this->zczb = 0;
          $this->sc_force_zero[] = 'zczb';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->gsmc_before_qstr = $this->gsmc;
          $this->gsmc = substr($this->Db->qstr($this->gsmc), 1, -1); 
          $this->gsjc_before_qstr = $this->gsjc;
          $this->gsjc = substr($this->Db->qstr($this->gsjc), 1, -1); 
          $this->tyshxydm_before_qstr = $this->tyshxydm;
          $this->tyshxydm = substr($this->Db->qstr($this->tyshxydm), 1, -1); 
          $this->qylx_before_qstr = $this->qylx;
          $this->qylx = substr($this->Db->qstr($this->qylx), 1, -1); 
          $this->gsdz_before_qstr = $this->gsdz;
          $this->gsdz = substr($this->Db->qstr($this->gsdz), 1, -1); 
          $this->fddbr_before_qstr = $this->fddbr;
          $this->fddbr = substr($this->Db->qstr($this->fddbr), 1, -1); 
          if ($this->clrq == "")  
          { 
              $this->clrq = "null"; 
              $NM_val_null[] = "clrq";
          } 
          $this->jyfw_before_qstr = $this->jyfw;
          $this->jyfw = substr($this->Db->qstr($this->jyfw), 1, -1); 
          $this->khyh_before_qstr = $this->khyh;
          $this->khyh = substr($this->Db->qstr($this->khyh), 1, -1); 
          $this->yhdz_before_qstr = $this->yhdz;
          $this->yhdz = substr($this->Db->qstr($this->yhdz), 1, -1); 
          $this->yhzh_before_qstr = $this->yhzh;
          $this->yhzh = substr($this->Db->qstr($this->yhzh), 1, -1); 
          $this->lxr_before_qstr = $this->lxr;
          $this->lxr = substr($this->Db->qstr($this->lxr), 1, -1); 
          $this->lxrdh_before_qstr = $this->lxrdh;
          $this->lxrdh = substr($this->Db->qstr($this->lxrdh), 1, -1); 
          $this->fax_before_qstr = $this->fax;
          $this->fax = substr($this->Db->qstr($this->fax), 1, -1); 
          $this->bgdh_before_qstr = $this->bgdh;
          $this->bgdh = substr($this->Db->qstr($this->bgdh), 1, -1); 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          $this->bz_before_qstr = $this->bz;
          $this->bz = substr($this->Db->qstr($this->bz), 1, -1); 
          $this->yyzzfile_before_qstr = $this->yyzzfile;
          $this->yyzzfile = substr($this->Db->qstr($this->yyzzfile), 1, -1); 
          $this->shzt_before_qstr = $this->shzt;
          $this->shzt = substr($this->Db->qstr($this->shzt), 1, -1); 
          $this->shr_before_qstr = $this->shr;
          $this->shr = substr($this->Db->qstr($this->shr), 1, -1); 
          $this->shyj_before_qstr = $this->shyj;
          $this->shyj = substr($this->Db->qstr($this->shyj), 1, -1); 
          if ($this->shsj == "")  
          { 
              $this->shsj = "null"; 
              $NM_val_null[] = "shsj";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_cg_company_reg_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where (gsmc = '" . $this->gsmc . "') AND (id <> $this->id)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " " . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'gsmc';
              }
              $rsUni->Close();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET gsmc = '$this->gsmc', gsjc = '$this->gsjc', tyshxydm = '$this->tyshxydm', qylx = '$this->qylx', gsdz = '$this->gsdz', fddbr = '$this->fddbr', zczb = $this->zczb, clrq = " . $this->Ini->date_delim . $this->clrq . $this->Ini->date_delim1 . ", jyfw = '$this->jyfw', khyh = '$this->khyh', yhdz = '$this->yhdz', yhzh = '$this->yhzh', lxr = '$this->lxr', lxrdh = '$this->lxrdh', fax = '$this->fax', bgdh = '$this->bgdh', email = '$this->email', bz = '$this->bz'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET gsmc = '$this->gsmc', gsjc = '$this->gsjc', tyshxydm = '$this->tyshxydm', qylx = '$this->qylx', gsdz = '$this->gsdz', fddbr = '$this->fddbr', zczb = $this->zczb, clrq = " . $this->Ini->date_delim . $this->clrq . $this->Ini->date_delim1 . ", jyfw = '$this->jyfw', khyh = '$this->khyh', yhdz = '$this->yhdz', yhzh = '$this->yhzh', lxr = '$this->lxr', lxrdh = '$this->lxrdh', fax = '$this->fax', bgdh = '$this->bgdh', email = '$this->email', bz = '$this->bz'";  
              } 
              if (isset($NM_val_form['shzt']) && $NM_val_form['shzt'] != $this->nmgp_dados_select['shzt']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " shzt = '$this->shzt'"; 
                  $comando_oracle        .= " shzt = '$this->shzt'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['shr']) && $NM_val_form['shr'] != $this->nmgp_dados_select['shr']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " shr = '$this->shr'"; 
                  $comando_oracle        .= " shr = '$this->shr'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['shyj']) && $NM_val_form['shyj'] != $this->nmgp_dados_select['shyj']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " shyj = '$this->shyj'"; 
                  $comando_oracle        .= " shyj = '$this->shyj'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['shsj']) && $NM_val_form['shsj'] != $this->nmgp_dados_select['shsj']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " shsj = " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " shsj = " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->yyzzfile_limpa == "S") 
              { 
                  if ($this->yyzzfile != "null") 
                  { 
                      $this->yyzzfile = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", yyzzfile = '" . $this->yyzzfile . "'"; 
                      $comando_oracle .= ", yyzzfile = '" . $this->yyzzfile . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " yyzzfile = '" . $this->yyzzfile . "'"; 
                     $comando_oracle .= " yyzzfile = '" . $this->yyzzfile . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->yyzzfile = "";
              } 
              else 
              { 
                  if ($this->yyzzfile != "none" && $this->yyzzfile != "") 
                  { 
                      $NM_conteudo =  $this->yyzzfile;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", yyzzfile = '$NM_conteudo'" ; 
                          $comando_oracle .= ", yyzzfile = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " yyzzfile = '$NM_conteudo'" ; 
                          $comando_oracle .= " yyzzfile = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "yyzzfile";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id = $this->id ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_cg_company_reg_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->yyzzfile_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['yyzzfile_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->gsmc = $this->gsmc_before_qstr;
          $this->gsjc = $this->gsjc_before_qstr;
          $this->tyshxydm = $this->tyshxydm_before_qstr;
          $this->qylx = $this->qylx_before_qstr;
          $this->gsdz = $this->gsdz_before_qstr;
          $this->fddbr = $this->fddbr_before_qstr;
          $this->jyfw = $this->jyfw_before_qstr;
          $this->khyh = $this->khyh_before_qstr;
          $this->yhdz = $this->yhdz_before_qstr;
          $this->yhzh = $this->yhzh_before_qstr;
          $this->lxr = $this->lxr_before_qstr;
          $this->lxrdh = $this->lxrdh_before_qstr;
          $this->fax = $this->fax_before_qstr;
          $this->bgdh = $this->bgdh_before_qstr;
          $this->email = $this->email_before_qstr;
          $this->bz = $this->bz_before_qstr;
          $this->yyzzfile = $this->yyzzfile_before_qstr;
          $this->shzt = $this->shzt_before_qstr;
          $this->shr = $this->shr_before_qstr;
          $this->shyj = $this->shyj_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['gsmc'])) { $this->gsmc = $NM_val_form['gsmc']; }
              elseif (isset($this->gsmc)) { $this->nm_limpa_alfa($this->gsmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['gsjc'])) { $this->gsjc = $NM_val_form['gsjc']; }
              elseif (isset($this->gsjc)) { $this->nm_limpa_alfa($this->gsjc); }
              if     (isset($NM_val_form) && isset($NM_val_form['tyshxydm'])) { $this->tyshxydm = $NM_val_form['tyshxydm']; }
              elseif (isset($this->tyshxydm)) { $this->nm_limpa_alfa($this->tyshxydm); }
              if     (isset($NM_val_form) && isset($NM_val_form['qylx'])) { $this->qylx = $NM_val_form['qylx']; }
              elseif (isset($this->qylx)) { $this->nm_limpa_alfa($this->qylx); }
              if     (isset($NM_val_form) && isset($NM_val_form['gsdz'])) { $this->gsdz = $NM_val_form['gsdz']; }
              elseif (isset($this->gsdz)) { $this->nm_limpa_alfa($this->gsdz); }
              if     (isset($NM_val_form) && isset($NM_val_form['fddbr'])) { $this->fddbr = $NM_val_form['fddbr']; }
              elseif (isset($this->fddbr)) { $this->nm_limpa_alfa($this->fddbr); }
              if     (isset($NM_val_form) && isset($NM_val_form['zczb'])) { $this->zczb = $NM_val_form['zczb']; }
              elseif (isset($this->zczb)) { $this->nm_limpa_alfa($this->zczb); }
              if     (isset($NM_val_form) && isset($NM_val_form['jyfw'])) { $this->jyfw = $NM_val_form['jyfw']; }
              elseif (isset($this->jyfw)) { $this->nm_limpa_alfa($this->jyfw); }
              if     (isset($NM_val_form) && isset($NM_val_form['khyh'])) { $this->khyh = $NM_val_form['khyh']; }
              elseif (isset($this->khyh)) { $this->nm_limpa_alfa($this->khyh); }
              if     (isset($NM_val_form) && isset($NM_val_form['yhdz'])) { $this->yhdz = $NM_val_form['yhdz']; }
              elseif (isset($this->yhdz)) { $this->nm_limpa_alfa($this->yhdz); }
              if     (isset($NM_val_form) && isset($NM_val_form['yhzh'])) { $this->yhzh = $NM_val_form['yhzh']; }
              elseif (isset($this->yhzh)) { $this->nm_limpa_alfa($this->yhzh); }
              if     (isset($NM_val_form) && isset($NM_val_form['lxr'])) { $this->lxr = $NM_val_form['lxr']; }
              elseif (isset($this->lxr)) { $this->nm_limpa_alfa($this->lxr); }
              if     (isset($NM_val_form) && isset($NM_val_form['lxrdh'])) { $this->lxrdh = $NM_val_form['lxrdh']; }
              elseif (isset($this->lxrdh)) { $this->nm_limpa_alfa($this->lxrdh); }
              if     (isset($NM_val_form) && isset($NM_val_form['fax'])) { $this->fax = $NM_val_form['fax']; }
              elseif (isset($this->fax)) { $this->nm_limpa_alfa($this->fax); }
              if     (isset($NM_val_form) && isset($NM_val_form['bgdh'])) { $this->bgdh = $NM_val_form['bgdh']; }
              elseif (isset($this->bgdh)) { $this->nm_limpa_alfa($this->bgdh); }
              if     (isset($NM_val_form) && isset($NM_val_form['email'])) { $this->email = $NM_val_form['email']; }
              elseif (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
              if     (isset($NM_val_form) && isset($NM_val_form['bz'])) { $this->bz = $NM_val_form['bz']; }
              elseif (isset($this->bz)) { $this->nm_limpa_alfa($this->bz); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('gsmc', 'gsjc', 'tyshxydm', 'qylx', 'gsdz', 'fddbr', 'zczb', 'clrq', 'jyfw', 'khyh', 'yhdz', 'yhzh', 'lxr', 'lxrdh', 'fax', 'bgdh', 'email', 'bz', 'yyzzfile'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where gsmc = '" . $this->gsmc . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " " . $this->Ini->Nm_lang['lang_cg_company_fld_gsmc'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'gsmc';
              }
              $rsUni->Close();
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cg_company_reg_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $dir_file = $this->Ini->root . $this->Ini->path_imagens . "yyzz" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->yyzzfile_scfile_name, $dir_file, "yyzzfile");
              if (trim($this->yyzzfile_scfile_name) != $_test_file)
              {
                  $this->yyzzfile_scfile_name = $_test_file;
                  $this->yyzzfile = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "gsmc, gsjc, tyshxydm, qylx, gsdz, fddbr, zczb, clrq, jyfw, khyh, yhdz, yhzh, lxr, lxrdh, fax, bgdh, email, bz, yyzzfile, shzt, shr, shyj, shsj) VALUES (" . $NM_seq_auto . "'$this->gsmc', '$this->gsjc', '$this->tyshxydm', '$this->qylx', '$this->gsdz', '$this->fddbr', $this->zczb, " . $this->Ini->date_delim . $this->clrq . $this->Ini->date_delim1 . ", '$this->jyfw', '$this->khyh', '$this->yhdz', '$this->yhzh', '$this->lxr', '$this->lxrdh', '$this->fax', '$this->bgdh', '$this->email', '$this->bz', '$this->yyzzfile', '$this->shzt', '$this->shr', '$this->shyj', " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "gsmc, gsjc, tyshxydm, qylx, gsdz, fddbr, zczb, clrq, jyfw, khyh, yhdz, yhzh, lxr, lxrdh, fax, bgdh, email, bz, yyzzfile, shzt, shr, shyj, shsj) VALUES (" . $NM_seq_auto . "'$this->gsmc', '$this->gsjc', '$this->tyshxydm', '$this->qylx', '$this->gsdz', '$this->fddbr', $this->zczb, " . $this->Ini->date_delim . $this->clrq . $this->Ini->date_delim1 . ", '$this->jyfw', '$this->khyh', '$this->yhdz', '$this->yhzh', '$this->lxr', '$this->lxrdh', '$this->fax', '$this->bgdh', '$this->email', '$this->bz', '$this->yyzzfile', '$this->shzt', '$this->shr', '$this->shyj', " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ")"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_cg_company_reg_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "yyzz" . "/"; 
              $arq_yyzzfile = fopen($this->SC_IMG_yyzzfile, "r") ; 
              $reg_yyzzfile = fread($arq_yyzzfile, filesize($this->SC_IMG_yyzzfile)) ; 
              fclose($arq_yyzzfile) ;  
              $arq_yyzzfile = fopen($dir_img . trim($this->yyzzfile_scfile_name), "w") ; 
              fwrite($arq_yyzzfile, $reg_yyzzfile) ;  
              fclose($arq_yyzzfile) ;  
              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_cg_company_reg_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'on';
  if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('sec_Login') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['form_cg_company_reg_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['yyzzfile'] = ""; 
      $this->yyzzfile_limpa = ""; 
      $this->yyzzfile_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['parms'] = ""; 
          $nmgp_select = "SELECT id, gsmc, gsjc, tyshxydm, qylx, gsdz, fddbr, zczb, clrq, jyfw, khyh, yhdz, yhzh, lxr, lxrdh, fax, bgdh, email, bz, yyzzfile, shzt, shr, shyj, shsj from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "id = $this->id"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->gsmc = $rs->fields[1] ; 
              $this->nmgp_dados_select['gsmc'] = $this->gsmc;
              $this->gsjc = $rs->fields[2] ; 
              $this->nmgp_dados_select['gsjc'] = $this->gsjc;
              $this->tyshxydm = $rs->fields[3] ; 
              $this->nmgp_dados_select['tyshxydm'] = $this->tyshxydm;
              $this->qylx = $rs->fields[4] ; 
              $this->nmgp_dados_select['qylx'] = $this->qylx;
              $this->gsdz = $rs->fields[5] ; 
              $this->nmgp_dados_select['gsdz'] = $this->gsdz;
              $this->fddbr = $rs->fields[6] ; 
              $this->nmgp_dados_select['fddbr'] = $this->fddbr;
              $this->zczb = $rs->fields[7] ; 
              $this->nmgp_dados_select['zczb'] = $this->zczb;
              $this->clrq = $rs->fields[8] ; 
              $this->nmgp_dados_select['clrq'] = $this->clrq;
              $this->jyfw = $rs->fields[9] ; 
              $this->nmgp_dados_select['jyfw'] = $this->jyfw;
              $this->khyh = $rs->fields[10] ; 
              $this->nmgp_dados_select['khyh'] = $this->khyh;
              $this->yhdz = $rs->fields[11] ; 
              $this->nmgp_dados_select['yhdz'] = $this->yhdz;
              $this->yhzh = $rs->fields[12] ; 
              $this->nmgp_dados_select['yhzh'] = $this->yhzh;
              $this->lxr = $rs->fields[13] ; 
              $this->nmgp_dados_select['lxr'] = $this->lxr;
              $this->lxrdh = $rs->fields[14] ; 
              $this->nmgp_dados_select['lxrdh'] = $this->lxrdh;
              $this->fax = $rs->fields[15] ; 
              $this->nmgp_dados_select['fax'] = $this->fax;
              $this->bgdh = $rs->fields[16] ; 
              $this->nmgp_dados_select['bgdh'] = $this->bgdh;
              $this->email = $rs->fields[17] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->bz = $rs->fields[18] ; 
              $this->nmgp_dados_select['bz'] = $this->bz;
              $this->yyzzfile = $rs->fields[19] ; 
              $this->nmgp_dados_select['yyzzfile'] = $this->yyzzfile;
              $this->shzt = $rs->fields[20] ; 
              $this->nmgp_dados_select['shzt'] = $this->shzt;
              $this->shr = $rs->fields[21] ; 
              $this->nmgp_dados_select['shr'] = $this->shr;
              $this->shyj = $rs->fields[22] ; 
              $this->nmgp_dados_select['shyj'] = $this->shyj;
              $this->shsj = $rs->fields[23] ; 
              if (substr($this->shsj, 10, 1) == "-") 
              { 
                 $this->shsj = substr($this->shsj, 0, 10) . " " . substr($this->shsj, 11);
              } 
              if (substr($this->shsj, 13, 1) == ".") 
              { 
                 $this->shsj = substr($this->shsj, 0, 13) . ":" . substr($this->shsj, 14, 2) . ":" . substr($this->shsj, 17);
              } 
              $this->nmgp_dados_select['shsj'] = $this->shsj;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->zczb = (string)$this->zczb; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sub_dir'][0]  = "yyzz";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['reg_start'] < $qt_geral_reg_form_cg_company_reg_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->gsmc = "";  
              $this->gsjc = "";  
              $this->tyshxydm = "";  
              $this->qylx = "";  
              $this->gsdz = "";  
              $this->fddbr = "";  
              $this->zczb = "";  
              $this->clrq = "";  
              $this->clrq_hora = "" ;  
              $this->jyfw = "";  
              $this->khyh = "";  
              $this->yhdz = "";  
              $this->yhzh = "";  
              $this->lxr = "";  
              $this->lxrdh = "";  
              $this->fax = "";  
              $this->bgdh = "";  
              $this->email = "";  
              $this->bz = "";  
              $this->yyzzfile = "";  
              $this->yyzzfile_ul_name = "" ;  
              $this->yyzzfile_ul_type = "" ;  
              $this->shzt = "";  
              $this->shr = "";  
              $this->shyj = "";  
              $this->shsj = "";  
              $this->shsj_hora = "" ;  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select'];
                  $this->gsmc = $this->nmgp_dados_select['gsmc'];  
                  $this->gsjc = $this->nmgp_dados_select['gsjc'];  
                  $this->tyshxydm = $this->nmgp_dados_select['tyshxydm'];  
                  $this->qylx = $this->nmgp_dados_select['qylx'];  
                  $this->gsdz = $this->nmgp_dados_select['gsdz'];  
                  $this->fddbr = $this->nmgp_dados_select['fddbr'];  
                  $this->zczb = $this->nmgp_dados_select['zczb'];  
                  $this->clrq = $this->nmgp_dados_select['clrq'];  
                  $this->jyfw = $this->nmgp_dados_select['jyfw'];  
                  $this->khyh = $this->nmgp_dados_select['khyh'];  
                  $this->yhdz = $this->nmgp_dados_select['yhdz'];  
                  $this->yhzh = $this->nmgp_dados_select['yhzh'];  
                  $this->lxr = $this->nmgp_dados_select['lxr'];  
                  $this->lxrdh = $this->nmgp_dados_select['lxrdh'];  
                  $this->fax = $this->nmgp_dados_select['fax'];  
                  $this->bgdh = $this->nmgp_dados_select['bgdh'];  
                  $this->email = $this->nmgp_dados_select['email'];  
                  $this->bz = $this->nmgp_dados_select['bz'];  
                  $this->yyzzfile = $this->nmgp_dados_select['yyzzfile'];  
                  $this->shzt = $this->nmgp_dados_select['shzt'];  
                  $this->shr = $this->nmgp_dados_select['shr'];  
                  $this->shyj = $this->nmgp_dados_select['shyj'];  
                  $this->shsj = $this->nmgp_dados_select['shsj'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
  }
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['id'] =  $this->id;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['dados_select'];
           $this->SC_log_arr['fields']['gsmc']['0'] =  $nmgp_dados_select['gsmc'];
           $this->SC_log_arr['fields']['gsjc']['0'] =  $nmgp_dados_select['gsjc'];
           $this->SC_log_arr['fields']['tyshxydm']['0'] =  $nmgp_dados_select['tyshxydm'];
           $this->SC_log_arr['fields']['qylx']['0'] =  $nmgp_dados_select['qylx'];
           $this->SC_log_arr['fields']['gsdz']['0'] =  $nmgp_dados_select['gsdz'];
           $this->SC_log_arr['fields']['fddbr']['0'] =  $nmgp_dados_select['fddbr'];
           $this->SC_log_arr['fields']['zczb']['0'] =  $nmgp_dados_select['zczb'];
           $this->SC_log_arr['fields']['clrq']['0'] =  $nmgp_dados_select['clrq'];
           $this->SC_log_arr['fields']['jyfw']['0'] =  $nmgp_dados_select['jyfw'];
           $this->SC_log_arr['fields']['khyh']['0'] =  $nmgp_dados_select['khyh'];
           $this->SC_log_arr['fields']['yhdz']['0'] =  $nmgp_dados_select['yhdz'];
           $this->SC_log_arr['fields']['yhzh']['0'] =  $nmgp_dados_select['yhzh'];
           $this->SC_log_arr['fields']['lxr']['0'] =  $nmgp_dados_select['lxr'];
           $this->SC_log_arr['fields']['lxrdh']['0'] =  $nmgp_dados_select['lxrdh'];
           $this->SC_log_arr['fields']['fax']['0'] =  $nmgp_dados_select['fax'];
           $this->SC_log_arr['fields']['bgdh']['0'] =  $nmgp_dados_select['bgdh'];
           $this->SC_log_arr['fields']['email']['0'] =  $nmgp_dados_select['email'];
           $this->SC_log_arr['fields']['bz']['0'] =  $nmgp_dados_select['bz'];
           $this->SC_log_arr['fields']['yyzzfile']['0'] =  $nmgp_dados_select['yyzzfile'];
           $this->SC_log_arr['fields']['shzt']['0'] =  $nmgp_dados_select['shzt'];
           $this->SC_log_arr['fields']['shr']['0'] =  $nmgp_dados_select['shr'];
           $this->SC_log_arr['fields']['shyj']['0'] =  $nmgp_dados_select['shyj'];
           $this->SC_log_arr['fields']['shsj']['0'] =  $nmgp_dados_select['shsj'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['gsmc']['1'] =  $this->gsmc;
       $this->SC_log_arr['fields']['gsjc']['1'] =  $this->gsjc;
       $this->SC_log_arr['fields']['tyshxydm']['1'] =  $this->tyshxydm;
       $this->SC_log_arr['fields']['qylx']['1'] =  $this->qylx;
       $this->SC_log_arr['fields']['gsdz']['1'] =  $this->gsdz;
       $this->SC_log_arr['fields']['fddbr']['1'] =  $this->fddbr;
       $this->SC_log_arr['fields']['zczb']['1'] =  $this->zczb;
       $this->SC_log_arr['fields']['clrq']['1'] =  $this->clrq;
       $this->SC_log_arr['fields']['jyfw']['1'] =  $this->jyfw;
       $this->SC_log_arr['fields']['khyh']['1'] =  $this->khyh;
       $this->SC_log_arr['fields']['yhdz']['1'] =  $this->yhdz;
       $this->SC_log_arr['fields']['yhzh']['1'] =  $this->yhzh;
       $this->SC_log_arr['fields']['lxr']['1'] =  $this->lxr;
       $this->SC_log_arr['fields']['lxrdh']['1'] =  $this->lxrdh;
       $this->SC_log_arr['fields']['fax']['1'] =  $this->fax;
       $this->SC_log_arr['fields']['bgdh']['1'] =  $this->bgdh;
       $this->SC_log_arr['fields']['email']['1'] =  $this->email;
       $this->SC_log_arr['fields']['bz']['1'] =  $this->bz;
       $this->SC_log_arr['fields']['yyzzfile']['1'] =  $this->yyzzfile;
       $this->SC_log_arr['fields']['shzt']['1'] =  $this->shzt;
       $this->SC_log_arr['fields']['shr']['1'] =  $this->shr;
       $this->SC_log_arr['fields']['shyj']['1'] =  $this->shyj;
       $this->SC_log_arr['fields']['shsj']['1'] =  $this->shsj;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cg_company_reg_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_yyzzfile = "";  
   } 
   else 
   { 
       $out_yyzzfile = $this->yyzzfile;  
   } 
   if ($this->yyzzfile != "" && $this->yyzzfile != "none")   
   { 
       $path_yyzzfile = $this->Ini->root . $this->Ini->path_imagens . "yyzz" . "/" . $this->yyzzfile;
       $md5_yyzzfile  = md5("yyzz" . $this->yyzzfile);
       if (is_file($path_yyzzfile))  
       { 
           $NM_ler_img = true;
           $out_yyzzfile = $this->Ini->path_imag_temp . "/sc_yyzzfile_" . $md5_yyzzfile . ".gif" ;  
           if (is_file($this->Ini->root . $out_yyzzfile))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_yyzzfile) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_yyzzfile = fopen($path_yyzzfile, "r") ; 
               $reg_yyzzfile = fread($tmp_yyzzfile, filesize($path_yyzzfile)) ; 
               fclose($tmp_yyzzfile) ;  
               $arq_yyzzfile = fopen($this->Ini->root . $out_yyzzfile, "w") ;  
               fwrite($arq_yyzzfile, $reg_yyzzfile) ;  
               fclose($arq_yyzzfile) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_yyzzfile);
           $this->nmgp_return_img['yyzzfile'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['yyzzfile'][1] = $sc_obj_img->getWidth();
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_yyzzfile;
       if (isset($temp_out_yyzzfile))
       {
           $out_yyzzfile = $temp_out_yyzzfile;
       }
   }
    include_once("form_cg_company_reg_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

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

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cg_company_reg_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsjc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tyshxydm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_qylx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "qylx", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsdz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fddbr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zczb", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "clrq", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jyfw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_khyh($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "khyh", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yhdz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yhzh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxrdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fax", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bgdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yyzzfile", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "shzt", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "shr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "shyj", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "shsj", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsjc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tyshxydm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_qylx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "qylx", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gsdz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fddbr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zczb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jyfw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_khyh($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "khyh", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yhdz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yhzh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxrdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fax", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bgdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bz", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yyzzfile", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_cg_company_reg_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['total'] = $qt_geral_reg_form_cg_company_reg_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_company_reg_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_company_reg_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "zczb";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      $Nm_datas['clrq'] = "date";$Nm_datas['shsj'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_qylx($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_qylx WHERE (mc LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_khyh($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_bank WHERE (mc LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_cg_company_reg_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cg_company_reg_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_cg_company_reg_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_company_reg_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_cg_company_reg_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       form_cg_company_reg_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
