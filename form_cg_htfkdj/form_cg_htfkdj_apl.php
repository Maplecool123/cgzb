<?php
//
class form_cg_htfkdj_apl
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
   var $cgbbh;
   var $cgbmc;
   var $htmc;
   var $htbh;
   var $htje;
   var $fkje;
   var $fkzb;
   var $fkjd;
   var $fklx;
   var $fklx_1;
   var $sjfkrq;
   var $fkdjrq;
   var $fjfile;
   var $fjfile_scfile_name;
   var $fjfile_ul_name;
   var $fjfile_ul_type;
   var $fjfile_limpa;
   var $fjfile_salva;
   var $dlr;
   var $dlsj;
   var $dlsj_hora;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
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
          if (isset($this->NM_ajax_info['param']['cgbbh']))
          {
              $this->cgbbh = $this->NM_ajax_info['param']['cgbbh'];
          }
          if (isset($this->NM_ajax_info['param']['cgbmc']))
          {
              $this->cgbmc = $this->NM_ajax_info['param']['cgbmc'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fjfile']))
          {
              $this->fjfile = $this->NM_ajax_info['param']['fjfile'];
          }
          if (isset($this->NM_ajax_info['param']['fjfile_limpa']))
          {
              $this->fjfile_limpa = $this->NM_ajax_info['param']['fjfile_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['fjfile_salva']))
          {
              $this->fjfile_salva = $this->NM_ajax_info['param']['fjfile_salva'];
          }
          if (isset($this->NM_ajax_info['param']['fjfile_ul_name']))
          {
              $this->fjfile_ul_name = $this->NM_ajax_info['param']['fjfile_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['fjfile_ul_type']))
          {
              $this->fjfile_ul_type = $this->NM_ajax_info['param']['fjfile_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['fkdjrq']))
          {
              $this->fkdjrq = $this->NM_ajax_info['param']['fkdjrq'];
          }
          if (isset($this->NM_ajax_info['param']['fkjd']))
          {
              $this->fkjd = $this->NM_ajax_info['param']['fkjd'];
          }
          if (isset($this->NM_ajax_info['param']['fkje']))
          {
              $this->fkje = $this->NM_ajax_info['param']['fkje'];
          }
          if (isset($this->NM_ajax_info['param']['fklx']))
          {
              $this->fklx = $this->NM_ajax_info['param']['fklx'];
          }
          if (isset($this->NM_ajax_info['param']['fkzb']))
          {
              $this->fkzb = $this->NM_ajax_info['param']['fkzb'];
          }
          if (isset($this->NM_ajax_info['param']['htbh']))
          {
              $this->htbh = $this->NM_ajax_info['param']['htbh'];
          }
          if (isset($this->NM_ajax_info['param']['htje']))
          {
              $this->htje = $this->NM_ajax_info['param']['htje'];
          }
          if (isset($this->NM_ajax_info['param']['htmc']))
          {
              $this->htmc = $this->NM_ajax_info['param']['htmc'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sjfkrq']))
          {
              $this->sjfkrq = $this->NM_ajax_info['param']['sjfkrq'];
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
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['embutida_parms']);
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
                 nm_limpa_str_form_cg_htfkdj($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cg_htfkdj_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("zh_cn");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("zh_cn");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_cg_htfkdj']['upload_field_info']['fjfile'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cg_htfkdj',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N0',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_htfkdj']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_htfkdj'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htfkdj']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htfkdj']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cg_htfkdj') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htfkdj']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htfkdj'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cg_htfkdj")
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
      $this->nm_new_label['cgbbh'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbbh'] . '';
      $this->nm_new_label['cgbmc'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbmc'] . '';
      $this->nm_new_label['htmc'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htmc'] . '';
      $this->nm_new_label['htbh'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htbh'] . '';
      $this->nm_new_label['htje'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . '';
      $this->nm_new_label['fkje'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . '';
      $this->nm_new_label['fkzb'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . '';
      $this->nm_new_label['fkjd'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . '';
      $this->nm_new_label['fklx'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fklx'] . '';
      $this->nm_new_label['sjfkrq'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_sjfkrq'] . '';
      $this->nm_new_label['fkdjrq'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkdjrq'] . '';
      $this->nm_new_label['fjfile'] = '' . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . '';

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



      $_SESSION['scriptcase']['error_icon']['form_cg_htfkdj']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cg_htfkdj'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['fjfile_ul_name']) && '' != $this->NM_ajax_info['param']['fjfile_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_field_ul_name'][$this->fjfile_ul_name]))
          {
              $this->NM_ajax_info['param']['fjfile_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_field_ul_name'][$this->fjfile_ul_name];
          }
          $this->fjfile = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['fjfile_ul_name'];
          $this->fjfile_scfile_name = substr($this->NM_ajax_info['param']['fjfile_ul_name'], 12);
          $this->fjfile_scfile_type = $this->NM_ajax_info['param']['fjfile_ul_type'];
          $this->fjfile_ul_name = $this->NM_ajax_info['param']['fjfile_ul_name'];
          $this->fjfile_ul_type = $this->NM_ajax_info['param']['fjfile_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->fjfile             = sc_convert_encoding($this->fjfile,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fjfile_scfile_name = sc_convert_encoding($this->fjfile_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fjfile_ul_name     = sc_convert_encoding($this->fjfile_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->fjfile_ul_name) && '' != $this->fjfile_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_field_ul_name'][$this->fjfile_ul_name]))
          {
              $this->fjfile_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_field_ul_name'][$this->fjfile_ul_name];
          }
          $this->fjfile = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->fjfile_ul_name;
          $this->fjfile_scfile_name = substr($this->fjfile_ul_name, 12);
          $this->fjfile_scfile_type = $this->fjfile_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->fjfile             = sc_convert_encoding($this->fjfile,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fjfile_scfile_name = sc_convert_encoding($this->fjfile_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fjfile_ul_name     = sc_convert_encoding($this->fjfile_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htfkdj']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->dlr)){$this->dlr = $this->nmgp_dados_form['dlr'];} 
          if (!isset($this->dlsj)){$this->dlsj = $this->nmgp_dados_form['dlsj'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cg_htfkdj", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_cg_htfkdj/form_cg_htfkdj_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cg_htfkdj_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cg_htfkdj_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cg_htfkdj_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cg_htfkdj/form_cg_htfkdj_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cg_htfkdj_erro.class.php"); 
      }
      $this->Erro      = new form_cg_htfkdj_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htfkdj']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
      if (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
      if (isset($this->htmc)) { $this->nm_limpa_alfa($this->htmc); }
      if (isset($this->htbh)) { $this->nm_limpa_alfa($this->htbh); }
      if (isset($this->htje)) { $this->nm_limpa_alfa($this->htje); }
      if (isset($this->fkje)) { $this->nm_limpa_alfa($this->fkje); }
      if (isset($this->fkzb)) { $this->nm_limpa_alfa($this->fkzb); }
      if (isset($this->fkjd)) { $this->nm_limpa_alfa($this->fkjd); }
      if (isset($this->fklx)) { $this->nm_limpa_alfa($this->fklx); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- htje
      $this->field_config['htje']               = array();
      $this->field_config['htje']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['htje']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['htje']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['htje']['symbol_mon'] = '';
      $this->field_config['htje']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['htje']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fkje
      $this->field_config['fkje']               = array();
      $this->field_config['fkje']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['fkje']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['fkje']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['fkje']['symbol_mon'] = '';
      $this->field_config['fkje']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['fkje']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fkzb
      $this->field_config['fkzb']               = array();
      $this->field_config['fkzb']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['fkzb']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['fkzb']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['fkzb']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['fkzb']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fkjd
      $this->field_config['fkjd']               = array();
      $this->field_config['fkjd']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['fkjd']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['fkjd']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['fkjd']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['fkjd']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- sjfkrq
      $this->field_config['sjfkrq']                 = array();
      $this->field_config['sjfkrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['sjfkrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['sjfkrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'sjfkrq');
      //-- fkdjrq
      $this->field_config['fkdjrq']                 = array();
      $this->field_config['fkdjrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fkdjrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fkdjrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fkdjrq');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dlsj
      $this->field_config['dlsj']                 = array();
      $this->field_config['dlsj']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['dlsj']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dlsj']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['dlsj']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'dlsj');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Gera_log_access'] = false;
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
          if ('validate_htbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htbh');
          }
          if ('validate_htmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htmc');
          }
          if ('validate_cgbbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbbh');
          }
          if ('validate_cgbmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbmc');
          }
          if ('validate_htje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htje');
          }
          if ('validate_fkje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fkje');
          }
          if ('validate_fkzb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fkzb');
          }
          if ('validate_fkjd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fkjd');
          }
          if ('validate_fklx' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fklx');
          }
          if ('validate_sjfkrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sjfkrq');
          }
          if ('validate_fkdjrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fkdjrq');
          }
          if ('validate_fjfile' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fjfile');
          }
          form_cg_htfkdj_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_fkje_onchange' == $this->NM_ajax_opcao)
          {
              $this->fkje_onChange();
          }
          if ('event_htbh_onchange' == $this->NM_ajax_opcao)
          {
              $this->htbh_onChange();
          }
          form_cg_htfkdj_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inline_form_seq'] = $this->sc_seq_row;
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
              form_cg_htfkdj_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cg_htfkdj']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cg_htfkdj_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_cg_htfkdj_pack_ajax_response();
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
          form_cg_htfkdj_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_cg_htfkdj', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_cg_htfkdj', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_cg_htfkdj_pack_ajax_response();
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
           case 'htbh':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htbh'] . "";
               break;
           case 'htmc':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htmc'] . "";
               break;
           case 'cgbbh':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbbh'] . "";
               break;
           case 'cgbmc':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbmc'] . "";
               break;
           case 'htje':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . "";
               break;
           case 'fkje':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . "";
               break;
           case 'fkzb':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . "";
               break;
           case 'fkjd':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . "";
               break;
           case 'fklx':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fklx'] . "";
               break;
           case 'sjfkrq':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_sjfkrq'] . "";
               break;
           case 'fkdjrq':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkdjrq'] . "";
               break;
           case 'fjfile':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . "";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_id'] . "";
               break;
           case 'dlr':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_dlr'] . "";
               break;
           case 'dlsj':
               return "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_dlsj'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cg_htfkdj']) || !is_array($this->NM_ajax_info['errList']['geral_form_cg_htfkdj']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cg_htfkdj'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cg_htfkdj'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'htbh' == $filtro)
        $this->ValidateField_htbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htmc' == $filtro)
        $this->ValidateField_htmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgbbh' == $filtro)
        $this->ValidateField_cgbbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgbmc' == $filtro)
        $this->ValidateField_cgbmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htje' == $filtro)
        $this->ValidateField_htje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fkje' == $filtro)
        $this->ValidateField_fkje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fkzb' == $filtro)
        $this->ValidateField_fkzb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fkjd' == $filtro)
        $this->ValidateField_fkjd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fklx' == $filtro)
        $this->ValidateField_fklx($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sjfkrq' == $filtro)
        $this->ValidateField_sjfkrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fkdjrq' == $filtro)
        $this->ValidateField_fkdjrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fjfile' == $filtro)
        $this->ValidateField_fjfile($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_htbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htbh'] == "on")) 
      { 
          if ($this->htbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htbh'] . "" ; 
              if (!isset($Campos_Erros['htbh']))
              {
                  $Campos_Erros['htbh'] = array();
              }
              $Campos_Erros['htbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['htbh']) || !is_array($this->NM_ajax_info['errList']['htbh']))
                  {
                      $this->NM_ajax_info['errList']['htbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['htbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->htbh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['htbh']))
              {
                  $Campos_Erros['htbh'] = array();
              }
              $Campos_Erros['htbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['htbh']) || !is_array($this->NM_ajax_info['errList']['htbh']))
              {
                  $this->NM_ajax_info['errList']['htbh'] = array();
              }
              $this->NM_ajax_info['errList']['htbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_htbh

    function ValidateField_htmc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htmc'] == "on")) 
      { 
          if ($this->htmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htmc'] . "" ; 
              if (!isset($Campos_Erros['htmc']))
              {
                  $Campos_Erros['htmc'] = array();
              }
              $Campos_Erros['htmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['htmc']) || !is_array($this->NM_ajax_info['errList']['htmc']))
                  {
                      $this->NM_ajax_info['errList']['htmc'] = array();
                  }
                  $this->NM_ajax_info['errList']['htmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->htmc) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['htmc']))
              {
                  $Campos_Erros['htmc'] = array();
              }
              $Campos_Erros['htmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['htmc']) || !is_array($this->NM_ajax_info['errList']['htmc']))
              {
                  $this->NM_ajax_info['errList']['htmc'] = array();
              }
              $this->NM_ajax_info['errList']['htmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_htmc

    function ValidateField_cgbbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbbh'] == "on")) 
      { 
          if ($this->cgbbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbbh'] . "" ; 
              if (!isset($Campos_Erros['cgbbh']))
              {
                  $Campos_Erros['cgbbh'] = array();
              }
              $Campos_Erros['cgbbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgbbh']) || !is_array($this->NM_ajax_info['errList']['cgbbh']))
                  {
                      $this->NM_ajax_info['errList']['cgbbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgbbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgbbh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgbbh']))
              {
                  $Campos_Erros['cgbbh'] = array();
              }
              $Campos_Erros['cgbbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgbbh']) || !is_array($this->NM_ajax_info['errList']['cgbbh']))
              {
                  $this->NM_ajax_info['errList']['cgbbh'] = array();
              }
              $this->NM_ajax_info['errList']['cgbbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgbbh

    function ValidateField_cgbmc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['cgbmc'] == "on")) 
      { 
          if ($this->cgbmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbmc'] . "" ; 
              if (!isset($Campos_Erros['cgbmc']))
              {
                  $Campos_Erros['cgbmc'] = array();
              }
              $Campos_Erros['cgbmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgbmc']) || !is_array($this->NM_ajax_info['errList']['cgbmc']))
                  {
                      $this->NM_ajax_info['errList']['cgbmc'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgbmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgbmc) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_cgbmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgbmc']))
              {
                  $Campos_Erros['cgbmc'] = array();
              }
              $Campos_Erros['cgbmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgbmc']) || !is_array($this->NM_ajax_info['errList']['cgbmc']))
              {
                  $this->NM_ajax_info['errList']['cgbmc'] = array();
              }
              $this->NM_ajax_info['errList']['cgbmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgbmc

    function ValidateField_htje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['htje']['symbol_dec']))
      {
          $this->sc_remove_currency($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp'], $this->field_config['htje']['symbol_mon']); 
          nm_limpa_valor($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp']) ; 
          if ('.' == substr($this->htje, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->htje, 1)))
              {
                  $this->htje = '';
              }
              else
              {
                  $this->htje = '0' . $this->htje;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->htje != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->htje) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['htje']))
                  {
                      $Campos_Erros['htje'] = array();
                  }
                  $Campos_Erros['htje'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['htje']) || !is_array($this->NM_ajax_info['errList']['htje']))
                  {
                      $this->NM_ajax_info['errList']['htje'] = array();
                  }
                  $this->NM_ajax_info['errList']['htje'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->htje, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . "; " ; 
                  if (!isset($Campos_Erros['htje']))
                  {
                      $Campos_Erros['htje'] = array();
                  }
                  $Campos_Erros['htje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['htje']) || !is_array($this->NM_ajax_info['errList']['htje']))
                  {
                      $this->NM_ajax_info['errList']['htje'] = array();
                  }
                  $this->NM_ajax_info['errList']['htje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['htje'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_htje'] . "" ; 
              if (!isset($Campos_Erros['htje']))
              {
                  $Campos_Erros['htje'] = array();
              }
              $Campos_Erros['htje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['htje']) || !is_array($this->NM_ajax_info['errList']['htje']))
                  {
                      $this->NM_ajax_info['errList']['htje'] = array();
                  }
                  $this->NM_ajax_info['errList']['htje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_htje

    function ValidateField_fkje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['fkje']['symbol_dec']))
      {
          $this->sc_remove_currency($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp'], $this->field_config['fkje']['symbol_mon']); 
          nm_limpa_valor($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp']) ; 
          if ('.' == substr($this->fkje, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->fkje, 1)))
              {
                  $this->fkje = '';
              }
              else
              {
                  $this->fkje = '0' . $this->fkje;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fkje != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->fkje) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fkje']))
                  {
                      $Campos_Erros['fkje'] = array();
                  }
                  $Campos_Erros['fkje'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fkje']) || !is_array($this->NM_ajax_info['errList']['fkje']))
                  {
                      $this->NM_ajax_info['errList']['fkje'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkje'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fkje, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . "; " ; 
                  if (!isset($Campos_Erros['fkje']))
                  {
                      $Campos_Erros['fkje'] = array();
                  }
                  $Campos_Erros['fkje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fkje']) || !is_array($this->NM_ajax_info['errList']['fkje']))
                  {
                      $this->NM_ajax_info['errList']['fkje'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkje'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkje'] . "" ; 
              if (!isset($Campos_Erros['fkje']))
              {
                  $Campos_Erros['fkje'] = array();
              }
              $Campos_Erros['fkje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fkje']) || !is_array($this->NM_ajax_info['errList']['fkje']))
                  {
                      $this->NM_ajax_info['errList']['fkje'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_fkje

    function ValidateField_fkzb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['fkzb']['symbol_dec']))
      {
          nm_limpa_valor($this->fkzb, $this->field_config['fkzb']['symbol_dec'], $this->field_config['fkzb']['symbol_grp']) ; 
          if ('.' == substr($this->fkzb, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->fkzb, 1)))
              {
                  $this->fkzb = '';
              }
              else
              {
                  $this->fkzb = '0' . $this->fkzb;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fkzb != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->fkzb) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fkzb']))
                  {
                      $Campos_Erros['fkzb'] = array();
                  }
                  $Campos_Erros['fkzb'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fkzb']) || !is_array($this->NM_ajax_info['errList']['fkzb']))
                  {
                      $this->NM_ajax_info['errList']['fkzb'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkzb'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fkzb, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . "; " ; 
                  if (!isset($Campos_Erros['fkzb']))
                  {
                      $Campos_Erros['fkzb'] = array();
                  }
                  $Campos_Erros['fkzb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fkzb']) || !is_array($this->NM_ajax_info['errList']['fkzb']))
                  {
                      $this->NM_ajax_info['errList']['fkzb'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkzb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkzb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkzb'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkzb'] . "" ; 
              if (!isset($Campos_Erros['fkzb']))
              {
                  $Campos_Erros['fkzb'] = array();
              }
              $Campos_Erros['fkzb'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fkzb']) || !is_array($this->NM_ajax_info['errList']['fkzb']))
                  {
                      $this->NM_ajax_info['errList']['fkzb'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkzb'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_fkzb

    function ValidateField_fkjd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['fkjd']['symbol_dec']))
      {
          nm_limpa_valor($this->fkjd, $this->field_config['fkjd']['symbol_dec'], $this->field_config['fkjd']['symbol_grp']) ; 
          if ('.' == substr($this->fkjd, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->fkjd, 1)))
              {
                  $this->fkjd = '';
              }
              else
              {
                  $this->fkjd = '0' . $this->fkjd;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fkjd != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->fkjd) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fkjd']))
                  {
                      $Campos_Erros['fkjd'] = array();
                  }
                  $Campos_Erros['fkjd'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fkjd']) || !is_array($this->NM_ajax_info['errList']['fkjd']))
                  {
                      $this->NM_ajax_info['errList']['fkjd'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkjd'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fkjd, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . "; " ; 
                  if (!isset($Campos_Erros['fkjd']))
                  {
                      $Campos_Erros['fkjd'] = array();
                  }
                  $Campos_Erros['fkjd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fkjd']) || !is_array($this->NM_ajax_info['errList']['fkjd']))
                  {
                      $this->NM_ajax_info['errList']['fkjd'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkjd'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkjd']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fkjd'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkjd'] . "" ; 
              if (!isset($Campos_Erros['fkjd']))
              {
                  $Campos_Erros['fkjd'] = array();
              }
              $Campos_Erros['fkjd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fkjd']) || !is_array($this->NM_ajax_info['errList']['fkjd']))
                  {
                      $this->NM_ajax_info['errList']['fkjd'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkjd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_fkjd

    function ValidateField_fklx(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->fklx == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fklx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['php_cmp_required']['fklx'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fklx'] . "" ; 
          if (!isset($Campos_Erros['fklx']))
          {
              $Campos_Erros['fklx'] = array();
          }
          $Campos_Erros['fklx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['fklx']) || !is_array($this->NM_ajax_info['errList']['fklx']))
          {
              $this->NM_ajax_info['errList']['fklx'] = array();
          }
          $this->NM_ajax_info['errList']['fklx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->fklx) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']) && !in_array($this->fklx, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['fklx']))
              {
                  $Campos_Erros['fklx'] = array();
              }
              $Campos_Erros['fklx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['fklx']) || !is_array($this->NM_ajax_info['errList']['fklx']))
              {
                  $this->NM_ajax_info['errList']['fklx'] = array();
              }
              $this->NM_ajax_info['errList']['fklx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_fklx

    function ValidateField_sjfkrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->sjfkrq, $this->field_config['sjfkrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['sjfkrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['sjfkrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['sjfkrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['sjfkrq']['date_sep']) ; 
          if (trim($this->sjfkrq) != "")  
          { 
              if ($teste_validade->Data($this->sjfkrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_sjfkrq'] . "; " ; 
                  if (!isset($Campos_Erros['sjfkrq']))
                  {
                      $Campos_Erros['sjfkrq'] = array();
                  }
                  $Campos_Erros['sjfkrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sjfkrq']) || !is_array($this->NM_ajax_info['errList']['sjfkrq']))
                  {
                      $this->NM_ajax_info['errList']['sjfkrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['sjfkrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['sjfkrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_sjfkrq

    function ValidateField_fkdjrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fkdjrq, $this->field_config['fkdjrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fkdjrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fkdjrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fkdjrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fkdjrq']['date_sep']) ; 
          if (trim($this->fkdjrq) != "")  
          { 
              if ($teste_validade->Data($this->fkdjrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fkdjrq'] . "; " ; 
                  if (!isset($Campos_Erros['fkdjrq']))
                  {
                      $Campos_Erros['fkdjrq'] = array();
                  }
                  $Campos_Erros['fkdjrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fkdjrq']) || !is_array($this->NM_ajax_info['errList']['fkdjrq']))
                  {
                      $this->NM_ajax_info['errList']['fkdjrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['fkdjrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fkdjrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_fkdjrq

    function ValidateField_fjfile(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->fjfile;
            if (!function_exists('sc_upload_unprotect_chars'))
            {
                include_once 'form_cg_htfkdj_doc_name.php';
            }
            $this->fjfile = sc_upload_unprotect_chars($this->fjfile);
            $this->fjfile_scfile_name = sc_upload_unprotect_chars($this->fjfile_scfile_name);
            if ("" != $this->fjfile && "S" != $this->fjfile_limpa && !$teste_validade->ArqExtensao($this->fjfile, array()))
            {
                $Campos_Crit .= "{lang_cg_htfkdj_fld_fjfile}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['fjfile']))
                {
                    $Campos_Erros['fjfile'] = array();
                }
                $Campos_Erros['fjfile'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['fjfile']) || !is_array($this->NM_ajax_info['errList']['fjfile']))
                {
                    $this->NM_ajax_info['errList']['fjfile'] = array();
                }
                $this->NM_ajax_info['errList']['fjfile'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_fjfile
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
          if ($this->fjfile == "none") 
          { 
              $this->fjfile = ""; 
          } 
          if ($this->fjfile != "") 
          { 
              if (is_file($this->fjfile))  
              { 
                  if ($this->nmgp_opcao == "incluir")
                  { 
                      $this->SC_DOC_fjfile = $this->fjfile;
                  } 
                  else 
                  { 
                      $arq_fjfile = fopen($this->fjfile, "r") ; 
                      $reg_fjfile = fread($arq_fjfile, filesize($this->fjfile)) ; 
                      fclose($arq_fjfile) ;  
                  } 
                  $this->fjfile =  trim($this->fjfile_scfile_name) ;  
                  $dir_doc = $this->Ini->path_doc . "htfk" . "/"; 
                 if ($this->nmgp_opcao != "incluir")
                 { 
                  if (is_dir($dir_doc))  
                  { 
                      $_test_file = $this->fetchUniqueUploadName($this->fjfile_scfile_name, $dir_doc, "fjfile");
                      if (trim($this->fjfile_scfile_name) != $_test_file)
                      {
                          $this->fjfile_scfile_name = $_test_file;
                          $this->fjfile = $_test_file;
                      }
                      $arq_fjfile = fopen($dir_doc . trim($this->fjfile_scfile_name), "w") ; 
                      fwrite($arq_fjfile, $reg_fjfile) ;  
                      fclose($arq_fjfile) ;  
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . ": " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                      if (!isset($Campos_Erros['fjfile']))
                      {
                          $Campos_Erros['fjfile'] = array();
                      }
                      $Campos_Erros['fjfile'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      if (!isset($this->NM_ajax_info['errList']['fjfile']) || !is_array($this->NM_ajax_info['errList']['fjfile']))
                      {
                          $this->NM_ajax_info['errList']['fjfile'] = array();
                      }
                      $this->NM_ajax_info['errList']['fjfile'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                  } 
                 } 
              } 
              else 
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->fjfile = "";
                  if (!isset($Campos_Erros['fjfile']))
                  {
                      $Campos_Erros['fjfile'] = array();
                  }
                  $Campos_Erros['fjfile'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['fjfile']) || !is_array($this->NM_ajax_info['errList']['fjfile']))
                  {
                      $this->NM_ajax_info['errList']['fjfile'] = array();
                  }
                  $this->NM_ajax_info['errList']['fjfile'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
          elseif (!empty($this->fjfile_salva) && $this->fjfile_limpa != "S")
          {
              $this->fjfile = $this->fjfile_salva;
          }
      } 
      elseif (!empty($this->fjfile_salva) && $this->fjfile_limpa != "S")
      {
          $this->fjfile = $this->fjfile_salva;
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
    $this->nmgp_dados_form['htbh'] = $this->htbh;
    $this->nmgp_dados_form['htmc'] = $this->htmc;
    $this->nmgp_dados_form['cgbbh'] = $this->cgbbh;
    $this->nmgp_dados_form['cgbmc'] = $this->cgbmc;
    $this->nmgp_dados_form['htje'] = $this->htje;
    $this->nmgp_dados_form['fkje'] = $this->fkje;
    $this->nmgp_dados_form['fkzb'] = $this->fkzb;
    $this->nmgp_dados_form['fkjd'] = $this->fkjd;
    $this->nmgp_dados_form['fklx'] = $this->fklx;
    $this->nmgp_dados_form['sjfkrq'] = $this->sjfkrq;
    $this->nmgp_dados_form['fkdjrq'] = $this->fkdjrq;
    if (empty($this->fjfile))
    {
        $this->fjfile = $this->nmgp_dados_form['fjfile'];
    }
    $this->nmgp_dados_form['fjfile'] = $this->fjfile;
    $this->nmgp_dados_form['fjfile_limpa'] = $this->fjfile_limpa;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['dlr'] = $this->dlr;
    $this->nmgp_dados_form['dlsj'] = $this->dlsj;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      if (!empty($this->field_config['htje']['symbol_dec']))
      {
         $this->sc_remove_currency($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp'], $this->field_config['htje']['symbol_mon']);
         nm_limpa_valor($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp']);
      }
      if (!empty($this->field_config['fkje']['symbol_dec']))
      {
         $this->sc_remove_currency($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp'], $this->field_config['fkje']['symbol_mon']);
         nm_limpa_valor($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp']);
      }
      if (!empty($this->field_config['fkzb']['symbol_dec']))
      {
         nm_limpa_valor($this->fkzb, $this->field_config['fkzb']['symbol_dec'], $this->field_config['fkzb']['symbol_grp']);
      }
      if (!empty($this->field_config['fkjd']['symbol_dec']))
      {
         nm_limpa_valor($this->fkjd, $this->field_config['fkjd']['symbol_dec'], $this->field_config['fkjd']['symbol_grp']);
      }
      nm_limpa_data($this->sjfkrq, $this->field_config['sjfkrq']['date_sep']) ; 
      nm_limpa_data($this->fkdjrq, $this->field_config['fkdjrq']['date_sep']) ; 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->dlsj, $this->field_config['dlsj']['date_sep']) ; 
      nm_limpa_hora($this->dlsj_hora, $this->field_config['dlsj']['time_sep']) ; 
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
      if ($Nome_Campo == "htje")
      {
          if (!empty($this->field_config['htje']['symbol_dec']))
          {
             $this->sc_remove_currency($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp'], $this->field_config['htje']['symbol_mon']);
             nm_limpa_valor($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fkje")
      {
          if (!empty($this->field_config['fkje']['symbol_dec']))
          {
             $this->sc_remove_currency($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp'], $this->field_config['fkje']['symbol_mon']);
             nm_limpa_valor($this->fkje, $this->field_config['fkje']['symbol_dec'], $this->field_config['fkje']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fkzb")
      {
          if (!empty($this->field_config['fkzb']['symbol_dec']))
          {
             nm_limpa_valor($this->fkzb, $this->field_config['fkzb']['symbol_dec'], $this->field_config['fkzb']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fkjd")
      {
          if (!empty($this->field_config['fkjd']['symbol_dec']))
          {
             nm_limpa_valor($this->fkjd, $this->field_config['fkjd']['symbol_dec'], $this->field_config['fkjd']['symbol_grp']);
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
      if (!empty($this->htje) || (!empty($format_fields) && isset($format_fields['htje'])))
      {
          nmgp_Form_Num_Val($this->htje, $this->field_config['htje']['symbol_grp'], $this->field_config['htje']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['htje']['symbol_fmt']) ; 
      }
      if (!empty($this->fkje) || (!empty($format_fields) && isset($format_fields['fkje'])))
      {
          nmgp_Form_Num_Val($this->fkje, $this->field_config['fkje']['symbol_grp'], $this->field_config['fkje']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['fkje']['symbol_fmt']) ; 
      }
      if (!empty($this->fkzb) || (!empty($format_fields) && isset($format_fields['fkzb'])))
      {
          nmgp_Form_Num_Val($this->fkzb, $this->field_config['fkzb']['symbol_grp'], $this->field_config['fkzb']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['fkzb']['symbol_fmt']) ; 
      }
      if (!empty($this->fkjd) || (!empty($format_fields) && isset($format_fields['fkjd'])))
      {
          nmgp_Form_Num_Val($this->fkjd, $this->field_config['fkjd']['symbol_grp'], $this->field_config['fkjd']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['fkjd']['symbol_fmt']) ; 
      }
      if ((!empty($this->sjfkrq) && 'null' != $this->sjfkrq) || (!empty($format_fields) && isset($format_fields['sjfkrq'])))
      {
          nm_volta_data($this->sjfkrq, $this->field_config['sjfkrq']['date_format']) ; 
          nmgp_Form_Datas($this->sjfkrq, $this->field_config['sjfkrq']['date_format'], $this->field_config['sjfkrq']['date_sep']) ;  
      }
      elseif ('null' == $this->sjfkrq || '' == $this->sjfkrq)
      {
          $this->sjfkrq = '';
      }
      if ((!empty($this->fkdjrq) && 'null' != $this->fkdjrq) || (!empty($format_fields) && isset($format_fields['fkdjrq'])))
      {
          nm_volta_data($this->fkdjrq, $this->field_config['fkdjrq']['date_format']) ; 
          nmgp_Form_Datas($this->fkdjrq, $this->field_config['fkdjrq']['date_format'], $this->field_config['fkdjrq']['date_sep']) ;  
      }
      elseif ('null' == $this->fkdjrq || '' == $this->fkdjrq)
      {
          $this->fkdjrq = '';
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
      $guarda_format_hora = $this->field_config['sjfkrq']['date_format'];
      if ($this->sjfkrq != "")  
      { 
          nm_conv_data($this->sjfkrq, $this->field_config['sjfkrq']['date_format']) ; 
          $this->sjfkrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->sjfkrq_hora = substr($this->sjfkrq_hora, 0, -4);
          }
      } 
      if ($this->sjfkrq == "" && $use_null)  
      { 
          $this->sjfkrq = "null" ; 
      } 
      $this->field_config['sjfkrq']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fkdjrq']['date_format'];
      if ($this->fkdjrq != "")  
      { 
          nm_conv_data($this->fkdjrq, $this->field_config['fkdjrq']['date_format']) ; 
          $this->fkdjrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fkdjrq_hora = substr($this->fkdjrq_hora, 0, -4);
          }
      } 
      if ($this->fkdjrq == "" && $use_null)  
      { 
          $this->fkdjrq = "null" ; 
      } 
      $this->field_config['fkdjrq']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_htbh();
          $this->ajax_return_values_htmc();
          $this->ajax_return_values_cgbbh();
          $this->ajax_return_values_cgbmc();
          $this->ajax_return_values_htje();
          $this->ajax_return_values_fkje();
          $this->ajax_return_values_fkzb();
          $this->ajax_return_values_fkjd();
          $this->ajax_return_values_fklx();
          $this->ajax_return_values_sjfkrq();
          $this->ajax_return_values_fkdjrq();
          $this->ajax_return_values_fjfile();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_cg_htfkdj_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- htbh
   function ajax_return_values_htbh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("htbh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->htbh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['htbh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- htmc
   function ajax_return_values_htmc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("htmc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->htmc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['htmc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cgbbh
   function ajax_return_values_cgbbh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgbbh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgbbh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgbbh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cgbmc
   function ajax_return_values_cgbmc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgbmc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgbmc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgbmc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- htje
   function ajax_return_values_htje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("htje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->htje);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['htje'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fkje
   function ajax_return_values_fkje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fkje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fkje);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fkje'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fkzb
   function ajax_return_values_fkzb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fkzb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fkzb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fkzb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fkjd
   function ajax_return_values_fkjd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fkjd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fkjd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fkjd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fklx
   function ajax_return_values_fklx($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fklx", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fklx);
              $aLookup = array();
              $this->_tmp_lookup_fklx = $this->fklx;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'] = array(); 
}
$aLookup[] = array(form_cg_htfkdj_pack_protect_string('') => form_cg_htfkdj_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_htje = $this->htje;
   $old_value_fkje = $this->fkje;
   $old_value_fkzb = $this->fkzb;
   $old_value_fkjd = $this->fkjd;
   $old_value_sjfkrq = $this->sjfkrq;
   $old_value_fkdjrq = $this->fkdjrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_fkje = $this->fkje;
   $unformatted_value_fkzb = $this->fkzb;
   $unformatted_value_fkjd = $this->fkjd;
   $unformatted_value_sjfkrq = $this->sjfkrq;
   $unformatted_value_fkdjrq = $this->fkdjrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_fklx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->fkje = $old_value_fkje;
   $this->fkzb = $old_value_fkzb;
   $this->fkjd = $old_value_fkjd;
   $this->sjfkrq = $old_value_sjfkrq;
   $this->fkdjrq = $old_value_fkdjrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_htfkdj_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_htfkdj_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['Lookup_fklx'][] = $rs->fields[0];
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
          $sSelComp = "name=\"fklx\"";
          if (isset($this->NM_ajax_info['select_html']['fklx']) && !empty($this->NM_ajax_info['select_html']['fklx']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['fklx'];
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

                  if ($this->fklx == $sValue)
                  {
                      $this->_tmp_lookup_fklx = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['fklx'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fklx']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fklx']['valList'][$i] = form_cg_htfkdj_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fklx']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fklx']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fklx']['labList'] = $aLabel;
          }
   }

          //----- sjfkrq
   function ajax_return_values_sjfkrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sjfkrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sjfkrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sjfkrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fkdjrq
   function ajax_return_values_fkdjrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fkdjrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fkdjrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fkdjrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fjfile
   function ajax_return_values_fjfile($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fjfile", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fjfile);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->fjfile, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_fjfile_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames'][$sTmpFile] = $this->fjfile;
              $tmp_file_fjfile = trim(NM_charset_to_utf8($this->fjfile));
              $tmp_icon_fjfile = '';
              if ('' != $tmp_file_fjfile)
              {
                  $tmp_icon_fjfile = $this->gera_icone($tmp_file_fjfile);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fjfile'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($sTmpValue),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('0', '" . $sTmpFile . "', 'form_cg_htfkdj')\">" . $tmp_file_fjfile . "</a>",
               'docIcon' => $tmp_icon_fjfile,
              );
              if ('navigate_form' == $this->NM_ajax_opcao)
              {
                  $this->NM_ajax_info['fldList']['fjfile_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['upload_dir'][$fieldName][] = $newName;
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
      $this->htje = str_replace($sc_parm1, $sc_parm2, $this->htje); 
      $this->fkje = str_replace($sc_parm1, $sc_parm2, $this->fkje); 
      $this->fkzb = str_replace($sc_parm1, $sc_parm2, $this->fkzb); 
      $this->fkjd = str_replace($sc_parm1, $sc_parm2, $this->fkjd); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->htje = "'" . $this->htje . "'";
      $this->fkje = "'" . $this->fkje . "'";
      $this->fkzb = "'" . $this->fkzb . "'";
      $this->fkjd = "'" . $this->fkjd . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->htje = str_replace("'", "", $this->htje); 
      $this->fkje = str_replace("'", "", $this->fkje); 
      $this->fkzb = str_replace("'", "", $this->fkzb); 
      $this->fkjd = str_replace("'", "", $this->fkjd); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']))
          {
               $sc_where_pos = " WHERE ((id < $this->id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opcao'] = '';

   }

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
      $NM_val_form['htbh'] = $this->htbh;
      $NM_val_form['htmc'] = $this->htmc;
      $NM_val_form['cgbbh'] = $this->cgbbh;
      $NM_val_form['cgbmc'] = $this->cgbmc;
      $NM_val_form['htje'] = $this->htje;
      $NM_val_form['fkje'] = $this->fkje;
      $NM_val_form['fkzb'] = $this->fkzb;
      $NM_val_form['fkjd'] = $this->fkjd;
      $NM_val_form['fklx'] = $this->fklx;
      $NM_val_form['sjfkrq'] = $this->sjfkrq;
      $NM_val_form['fkdjrq'] = $this->fkdjrq;
      $NM_val_form['fjfile'] = $this->fjfile;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['dlr'] = $this->dlr;
      $NM_val_form['dlsj'] = $this->dlsj;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->htje == "")  
      { 
          $this->htje = 0;
          $this->sc_force_zero[] = 'htje';
      } 
      if ($this->fkje == "")  
      { 
          $this->fkje = 0;
          $this->sc_force_zero[] = 'fkje';
      } 
      if ($this->fkzb == "")  
      { 
          $this->fkzb = 0;
          $this->sc_force_zero[] = 'fkzb';
      } 
      if ($this->fkjd == "")  
      { 
          $this->fkjd = 0;
          $this->sc_force_zero[] = 'fkjd';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cgbbh_before_qstr = $this->cgbbh;
          $this->cgbbh = substr($this->Db->qstr($this->cgbbh), 1, -1); 
          $this->cgbmc_before_qstr = $this->cgbmc;
          $this->cgbmc = substr($this->Db->qstr($this->cgbmc), 1, -1); 
          $this->htmc_before_qstr = $this->htmc;
          $this->htmc = substr($this->Db->qstr($this->htmc), 1, -1); 
          $this->htbh_before_qstr = $this->htbh;
          $this->htbh = substr($this->Db->qstr($this->htbh), 1, -1); 
          $this->fklx_before_qstr = $this->fklx;
          $this->fklx = substr($this->Db->qstr($this->fklx), 1, -1); 
          if ($this->sjfkrq == "")  
          { 
              $this->sjfkrq = "null"; 
              $NM_val_null[] = "sjfkrq";
          } 
          if ($this->fkdjrq == "")  
          { 
              $this->fkdjrq = "null"; 
              $NM_val_null[] = "fkdjrq";
          } 
          $this->fjfile_original_filename = $this->fjfile; 
          $this->fjfile_before_qstr = $this->fjfile;
          $this->fjfile = substr($this->Db->qstr($this->fjfile), 1, -1); 
          $this->dlr_before_qstr = $this->dlr;
          $this->dlr = substr($this->Db->qstr($this->dlr), 1, -1); 
          if ($this->dlsj == "")  
          { 
              $this->dlsj = "null"; 
              $NM_val_null[] = "dlsj";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['decimal_db'] == ",") 
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
                 form_cg_htfkdj_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where (fjfile = '" . $this->fjfile . "') AND (id <> $this->id)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " " . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'fjfile';
              }
              $rsUni->Close();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', htmc = '$this->htmc', htbh = '$this->htbh', htje = $this->htje, fkje = $this->fkje, fkzb = $this->fkzb, fkjd = $this->fkjd, fklx = '$this->fklx', sjfkrq = " . $this->Ini->date_delim . $this->sjfkrq . $this->Ini->date_delim1 . ", fkdjrq = " . $this->Ini->date_delim . $this->fkdjrq . $this->Ini->date_delim1 . "";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', htmc = '$this->htmc', htbh = '$this->htbh', htje = $this->htje, fkje = $this->fkje, fkzb = $this->fkzb, fkjd = $this->fkjd, fklx = '$this->fklx', sjfkrq = " . $this->Ini->date_delim . $this->sjfkrq . $this->Ini->date_delim1 . ", fkdjrq = " . $this->Ini->date_delim . $this->fkdjrq . $this->Ini->date_delim1 . "";  
              } 
              if (isset($NM_val_form['dlr']) && $NM_val_form['dlr'] != $this->nmgp_dados_select['dlr']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dlr = '$this->dlr'"; 
                  $comando_oracle        .= " dlr = '$this->dlr'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dlsj']) && $NM_val_form['dlsj'] != $this->nmgp_dados_select['dlsj']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dlsj = " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " dlsj = " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->fjfile_limpa == "S") 
              { 
                  if ($this->fjfile != "null") 
                  { 
                      $this->fjfile = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", fjfile = '" . $this->fjfile . "'"; 
                      $comando_oracle .= ", fjfile = '" . $this->fjfile . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " fjfile = '" . $this->fjfile . "'"; 
                     $comando_oracle .= " fjfile = '" . $this->fjfile . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->fjfile = "";
              } 
              else 
              { 
                  if ($this->fjfile != "none" && $this->fjfile != "") 
                  { 
                      $NM_conteudo =  $this->fjfile;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", fjfile = '$NM_conteudo'" ; 
                          $comando_oracle .= ", fjfile = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " fjfile = '$NM_conteudo'" ; 
                          $comando_oracle .= " fjfile = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "fjfile";
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
                                  form_cg_htfkdj_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->fjfile_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['fjfile_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->cgbbh = $this->cgbbh_before_qstr;
          $this->cgbmc = $this->cgbmc_before_qstr;
          $this->htmc = $this->htmc_before_qstr;
          $this->htbh = $this->htbh_before_qstr;
          $this->fklx = $this->fklx_before_qstr;
          $this->fjfile = $this->fjfile_before_qstr;
          $this->dlr = $this->dlr_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['cgbbh'])) { $this->cgbbh = $NM_val_form['cgbbh']; }
              elseif (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgbmc'])) { $this->cgbmc = $NM_val_form['cgbmc']; }
              elseif (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['htmc'])) { $this->htmc = $NM_val_form['htmc']; }
              elseif (isset($this->htmc)) { $this->nm_limpa_alfa($this->htmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['htbh'])) { $this->htbh = $NM_val_form['htbh']; }
              elseif (isset($this->htbh)) { $this->nm_limpa_alfa($this->htbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['htje'])) { $this->htje = $NM_val_form['htje']; }
              elseif (isset($this->htje)) { $this->nm_limpa_alfa($this->htje); }
              if     (isset($NM_val_form) && isset($NM_val_form['fkje'])) { $this->fkje = $NM_val_form['fkje']; }
              elseif (isset($this->fkje)) { $this->nm_limpa_alfa($this->fkje); }
              if     (isset($NM_val_form) && isset($NM_val_form['fkzb'])) { $this->fkzb = $NM_val_form['fkzb']; }
              elseif (isset($this->fkzb)) { $this->nm_limpa_alfa($this->fkzb); }
              if     (isset($NM_val_form) && isset($NM_val_form['fkjd'])) { $this->fkjd = $NM_val_form['fkjd']; }
              elseif (isset($this->fkjd)) { $this->nm_limpa_alfa($this->fkjd); }
              if     (isset($NM_val_form) && isset($NM_val_form['fklx'])) { $this->fklx = $NM_val_form['fklx']; }
              elseif (isset($this->fklx)) { $this->nm_limpa_alfa($this->fklx); }

              $this->nm_formatar_campos();

              $bChange_fjfile = false;
              if (isset($this->fjfile_original_filename) && '' != $this->fjfile_original_filename && $this->fjfile_original_filename != $this->fjfile)
              {
                  $sTmpOrig_fjfile = $this->fjfile;
                  $this->fjfile    = $this->fjfile_original_filename;
                  $bChange_fjfile  = true;
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('htbh', 'htmc', 'cgbbh', 'cgbmc', 'htje', 'fkje', 'fkzb', 'fkjd', 'fklx', 'sjfkrq', 'fkdjrq', 'fjfile'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if ($bChange_fjfile)
              {
                  $this->fjfile                   = $sTmpOrig_fjfile;
                  $this->fjfile_original_filename = '';
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['decimal_db'] == ",") 
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
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where fjfile = '" . $this->fjfile . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " " . $this->Ini->Nm_lang['lang_cg_htfkdj_fld_fjfile'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'fjfile';
              }
              $rsUni->Close();
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cg_htfkdj_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $dir_file = $this->Ini->path_doc . "htfk" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->fjfile_scfile_name, $dir_file, "fjfile");
              if (trim($this->fjfile_scfile_name) != $_test_file)
              {
                  $this->fjfile_scfile_name = $_test_file;
                  $this->fjfile = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cgbbh, cgbmc, htmc, htbh, htje, fkje, fkzb, fkjd, fklx, sjfkrq, fkdjrq, fjfile, dlr, dlsj) VALUES (" . $NM_seq_auto . "'$this->cgbbh', '$this->cgbmc', '$this->htmc', '$this->htbh', $this->htje, $this->fkje, $this->fkzb, $this->fkjd, '$this->fklx', " . $this->Ini->date_delim . $this->sjfkrq . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fkdjrq . $this->Ini->date_delim1 . ", '$this->fjfile', '$this->dlr', " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cgbbh, cgbmc, htmc, htbh, htje, fkje, fkzb, fkjd, fklx, sjfkrq, fkdjrq, fjfile, dlr, dlsj) VALUES (" . $NM_seq_auto . "'$this->cgbbh', '$this->cgbmc', '$this->htmc', '$this->htbh', $this->htje, $this->fkje, $this->fkzb, $this->fkjd, '$this->fklx', " . $this->Ini->date_delim . $this->sjfkrq . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fkdjrq . $this->Ini->date_delim1 . ", '$this->fjfile', '$this->dlr', " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ")"; 
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
                              form_cg_htfkdj_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']);
              }

              $dir_doc = $this->Ini->path_doc . "htfk" . "/"; 
              $arq_fjfile = fopen($this->SC_DOC_fjfile, "r") ; 
              $reg_fjfile = fread($arq_fjfile, filesize($this->SC_DOC_fjfile)) ; 
              fclose($arq_fjfile) ;  
              $arq_fjfile = fopen($dir_doc . trim($this->fjfile_scfile_name), "w") ; 
              fwrite($arq_fjfile, $reg_fjfile) ;  
              fclose($arq_fjfile) ;  
              $this->sc_evento = "insert"; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['decimal_db'] == ",") 
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
                          form_cg_htfkdj_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']);
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['fjfile'] = ""; 
      $this->fjfile_limpa = ""; 
      $this->fjfile_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['parms'] = ""; 
          $nmgp_select = "SELECT id, cgbbh, cgbmc, htmc, htbh, htje, fkje, fkzb, fkjd, fklx, sjfkrq, fkdjrq, fjfile, dlr, dlsj from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter'] = true;
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
              $this->cgbbh = $rs->fields[1] ; 
              $this->nmgp_dados_select['cgbbh'] = $this->cgbbh;
              $this->cgbmc = $rs->fields[2] ; 
              $this->nmgp_dados_select['cgbmc'] = $this->cgbmc;
              $this->htmc = $rs->fields[3] ; 
              $this->nmgp_dados_select['htmc'] = $this->htmc;
              $this->htbh = $rs->fields[4] ; 
              $this->nmgp_dados_select['htbh'] = $this->htbh;
              $this->htje = $rs->fields[5] ; 
              $this->nmgp_dados_select['htje'] = $this->htje;
              $this->fkje = $rs->fields[6] ; 
              $this->nmgp_dados_select['fkje'] = $this->fkje;
              $this->fkzb = $rs->fields[7] ; 
              $this->nmgp_dados_select['fkzb'] = $this->fkzb;
              $this->fkjd = $rs->fields[8] ; 
              $this->nmgp_dados_select['fkjd'] = $this->fkjd;
              $this->fklx = $rs->fields[9] ; 
              $this->nmgp_dados_select['fklx'] = $this->fklx;
              $this->sjfkrq = $rs->fields[10] ; 
              $this->nmgp_dados_select['sjfkrq'] = $this->sjfkrq;
              $this->fkdjrq = $rs->fields[11] ; 
              $this->nmgp_dados_select['fkdjrq'] = $this->fkdjrq;
              $this->fjfile = $rs->fields[12] ; 
              $this->nmgp_dados_select['fjfile'] = $this->fjfile;
              $this->dlr = $rs->fields[13] ; 
              $this->nmgp_dados_select['dlr'] = $this->dlr;
              $this->dlsj = $rs->fields[14] ; 
              if (substr($this->dlsj, 10, 1) == "-") 
              { 
                 $this->dlsj = substr($this->dlsj, 0, 10) . " " . substr($this->dlsj, 11);
              } 
              if (substr($this->dlsj, 13, 1) == ".") 
              { 
                 $this->dlsj = substr($this->dlsj, 0, 13) . ":" . substr($this->dlsj, 14, 2) . ":" . substr($this->dlsj, 17);
              } 
              $this->nmgp_dados_select['dlsj'] = $this->dlsj;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->htje = (string)$this->htje; 
              $this->fkje = (string)$this->fkje; 
              $this->fkzb = (string)$this->fkzb; 
              $this->fkjd = (string)$this->fkjd; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sub_dir'][0]  = "htfk";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
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
              $this->cgbbh = "";  
              $this->cgbmc = "";  
              $this->htmc = "";  
              $this->htbh = "";  
              $this->htje = "";  
              $this->fkje = "";  
              $this->fkzb = "";  
              $this->fkjd = "";  
              $this->fklx = "";  
              $this->sjfkrq = "";  
              $this->sjfkrq_hora = "" ;  
              $this->fkdjrq = "";  
              $this->fkdjrq_hora = "" ;  
              $this->fjfile = "";  
              $this->fjfile_ul_name = "" ;  
              $this->fjfile_ul_type = "" ;  
              $this->dlr = "";  
              $this->dlsj = "";  
              $this->dlsj_hora = "" ;  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select'];
                  $this->cgbbh = $this->nmgp_dados_select['cgbbh'];  
                  $this->cgbmc = $this->nmgp_dados_select['cgbmc'];  
                  $this->htmc = $this->nmgp_dados_select['htmc'];  
                  $this->htbh = $this->nmgp_dados_select['htbh'];  
                  $this->htje = $this->nmgp_dados_select['htje'];  
                  $this->fkje = $this->nmgp_dados_select['fkje'];  
                  $this->fkzb = $this->nmgp_dados_select['fkzb'];  
                  $this->fkjd = $this->nmgp_dados_select['fkjd'];  
                  $this->fklx = $this->nmgp_dados_select['fklx'];  
                  $this->sjfkrq = $this->nmgp_dados_select['sjfkrq'];  
                  $this->fkdjrq = $this->nmgp_dados_select['fkdjrq'];  
                  $this->fjfile = $this->nmgp_dados_select['fjfile'];  
                  $this->dlr = $this->nmgp_dados_select['dlr'];  
                  $this->dlsj = $this->nmgp_dados_select['dlsj'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['foreign_key'] as $sFKName => $sFKValue)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['dados_select'];
           $this->SC_log_arr['fields']['cgbbh']['0'] =  $nmgp_dados_select['cgbbh'];
           $this->SC_log_arr['fields']['cgbmc']['0'] =  $nmgp_dados_select['cgbmc'];
           $this->SC_log_arr['fields']['htmc']['0'] =  $nmgp_dados_select['htmc'];
           $this->SC_log_arr['fields']['htbh']['0'] =  $nmgp_dados_select['htbh'];
           $this->SC_log_arr['fields']['htje']['0'] =  $nmgp_dados_select['htje'];
           $this->SC_log_arr['fields']['fkje']['0'] =  $nmgp_dados_select['fkje'];
           $this->SC_log_arr['fields']['fkzb']['0'] =  $nmgp_dados_select['fkzb'];
           $this->SC_log_arr['fields']['fkjd']['0'] =  $nmgp_dados_select['fkjd'];
           $this->SC_log_arr['fields']['fklx']['0'] =  $nmgp_dados_select['fklx'];
           $this->SC_log_arr['fields']['sjfkrq']['0'] =  $nmgp_dados_select['sjfkrq'];
           $this->SC_log_arr['fields']['fkdjrq']['0'] =  $nmgp_dados_select['fkdjrq'];
           $this->SC_log_arr['fields']['fjfile']['0'] =  $nmgp_dados_select['fjfile'];
           $this->SC_log_arr['fields']['dlr']['0'] =  $nmgp_dados_select['dlr'];
           $this->SC_log_arr['fields']['dlsj']['0'] =  $nmgp_dados_select['dlsj'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['cgbbh']['1'] =  $this->cgbbh;
       $this->SC_log_arr['fields']['cgbmc']['1'] =  $this->cgbmc;
       $this->SC_log_arr['fields']['htmc']['1'] =  $this->htmc;
       $this->SC_log_arr['fields']['htbh']['1'] =  $this->htbh;
       $this->SC_log_arr['fields']['htje']['1'] =  $this->htje;
       $this->SC_log_arr['fields']['fkje']['1'] =  $this->fkje;
       $this->SC_log_arr['fields']['fkzb']['1'] =  $this->fkzb;
       $this->SC_log_arr['fields']['fkjd']['1'] =  $this->fkjd;
       $this->SC_log_arr['fields']['fklx']['1'] =  $this->fklx;
       $this->SC_log_arr['fields']['sjfkrq']['1'] =  $this->sjfkrq;
       $this->SC_log_arr['fields']['fkdjrq']['1'] =  $this->fkdjrq;
       $this->SC_log_arr['fields']['fjfile']['1'] =  $this->fjfile;
       $this->SC_log_arr['fields']['dlr']['1'] =  $this->dlr;
       $this->SC_log_arr['fields']['dlsj']['1'] =  $this->dlsj;
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
 function gera_icone($doc) 
 {
    $cam_icone = "";
    $path =  $this->Ini->root . $this->Ini->path_icones . "/";
    if (is_dir($path))
    {
        $nm_icones = nm_list_icon($path); 
        $nm_tipo = strtolower(substr($doc, strrpos($doc, ".") + 1));
        if (isset($nm_icones[$nm_tipo]) && !empty($nm_icones[$nm_tipo]))
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones[$nm_tipo];
        }
        else
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones["default"];
        }
    }
    return $cam_icone;
 } 
//
function fkje_onChange($fkzb, $fkje, $htje)
{
$_SESSION['scriptcase']['form_cg_htfkdj']['contr_erro'] = 'on';
     
$original_fkje = $this->fkje;
$original_htje = $this->htje;
$original_fkzb = $this->fkzb;
$original_fkzb = $this->fkzb;
$original_fkje = $this->fkje;
$original_htje = $this->htje;

if(!empty($this->fkje )&&!empty($this->htje ))
 {
	$this->fkzb =$this->fkje *100/$this->htje ;
 }

$modificado_fkje = $this->fkje;
$modificado_htje = $this->htje;
$modificado_fkzb = $this->fkzb;
$modificado_fkzb = $this->fkzb;
$modificado_fkje = $this->fkje;
$modificado_htje = $this->htje;
$this->nm_formatar_campos('fkje', 'htje', 'fkzb');
if ($original_fkje !== $modificado_fkje || (isset($bFlagRead_fkje) && $bFlagRead_fkje))
{
    $this->ajax_return_values_fkje(true);
}
if ($original_htje !== $modificado_htje || (isset($bFlagRead_htje) && $bFlagRead_htje))
{
    $this->ajax_return_values_htje(true);
}
if ($original_fkzb !== $modificado_fkzb || (isset($bFlagRead_fkzb) && $bFlagRead_fkzb))
{
    $this->ajax_return_values_fkzb(true);
}
if ($original_fkzb !== $modificado_fkzb || (isset($bFlagRead_fkzb) && $bFlagRead_fkzb))
{
    $this->ajax_return_values_fkzb(true);
}
if ($original_fkje !== $modificado_fkje || (isset($bFlagRead_fkje) && $bFlagRead_fkje))
{
    $this->ajax_return_values_fkje(true);
}
if ($original_htje !== $modificado_htje || (isset($bFlagRead_htje) && $bFlagRead_htje))
{
    $this->ajax_return_values_htje(true);
}
form_cg_htfkdj_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_cg_htfkdj']['contr_erro'] = 'off';
}
function htbh_onChange($htje, $htbh, $htmc, $cgbmc, $cgbbh)
{
$_SESSION['scriptcase']['form_cg_htfkdj']['contr_erro'] = 'on';
     
$original_htbh = $this->htbh;
$original_htmc = $this->htmc;
$original_cgbbh = $this->cgbbh;
$original_cgbmc = $this->cgbmc;
$original_htje = $this->htje;
$original_htje = $this->htje;
$original_htbh = $this->htbh;
$original_htmc = $this->htmc;
$original_cgbmc = $this->cgbmc;
$original_cgbbh = $this->cgbbh;

if(!empty($this->htbh ))
{
     
      $nm_select = "
select htmc,cgbbh,cgbmc,htje from cg_htgl where htbh='".$this->htbh ."' "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]);
                 $rx->fields[3] = (strpos(strtolower($rx->fields[3]), "e")) ? (float)$rx->fields[3] : $rx->fields[3];
                 $rx->fields[3] = (string)$rx->fields[3];
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
    $this->htmc  = $this->rs[0][0];
	 $this->cgbbh  = $this->rs[0][1];
	 $this->cgbmc  = $this->rs[0][2];
	 $this->htje  = $this->rs[0][3];
}

$modificado_htbh = $this->htbh;
$modificado_htmc = $this->htmc;
$modificado_cgbbh = $this->cgbbh;
$modificado_cgbmc = $this->cgbmc;
$modificado_htje = $this->htje;
$modificado_htje = $this->htje;
$modificado_htbh = $this->htbh;
$modificado_htmc = $this->htmc;
$modificado_cgbmc = $this->cgbmc;
$modificado_cgbbh = $this->cgbbh;
$this->nm_formatar_campos('htbh', 'htmc', 'cgbbh', 'cgbmc', 'htje');
if ($original_htbh !== $modificado_htbh || (isset($bFlagRead_htbh) && $bFlagRead_htbh))
{
    $this->ajax_return_values_htbh(true);
}
if ($original_htmc !== $modificado_htmc || (isset($bFlagRead_htmc) && $bFlagRead_htmc))
{
    $this->ajax_return_values_htmc(true);
}
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_htje !== $modificado_htje || (isset($bFlagRead_htje) && $bFlagRead_htje))
{
    $this->ajax_return_values_htje(true);
}
if ($original_htje !== $modificado_htje || (isset($bFlagRead_htje) && $bFlagRead_htje))
{
    $this->ajax_return_values_htje(true);
}
if ($original_htbh !== $modificado_htbh || (isset($bFlagRead_htbh) && $bFlagRead_htbh))
{
    $this->ajax_return_values_htbh(true);
}
if ($original_htmc !== $modificado_htmc || (isset($bFlagRead_htmc) && $bFlagRead_htmc))
{
    $this->ajax_return_values_htmc(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
form_cg_htfkdj_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cg_htfkdj']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cg_htfkdj_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->fjfile != "" && $this->fjfile != "none")   
   { 
       $sTmpExtension = pathinfo($this->fjfile, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_fjfile = 'sc_fjfile_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['download_filenames'][$sTmpFile_fjfile] = $this->fjfile;
   } 
    include_once("form_cg_htfkdj_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cg_htfkdj_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "cgbbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgbmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkzb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkjd", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_fklx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "fklx", $arg_search, $data_lookup);
          }
      }
      {
          $this->SC_monta_condicao($comando, "sjfkrq", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "fkdjrq", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fjfile", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dlr", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "dlsj", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgbbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgbmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkzb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fkjd", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_fklx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "fklx", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fjfile", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cg_htfkdj = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['total'] = $qt_geral_reg_form_cg_htfkdj;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_htfkdj_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_htfkdj_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "htje";$nm_numeric[] = "fkje";$nm_numeric[] = "fkzb";$nm_numeric[] = "fkjd";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['decimal_db'] == ".")
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
      $Nm_datas['sjfkrq'] = "date";$Nm_datas['fkdjrq'] = "date";$Nm_datas['dlsj'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['SC_sep_date1'];
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
   function SC_lookup_fklx($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_fklx WHERE (mc LIKE '%$campo%')" ; 
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_cg_htfkdj_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cg_htfkdj_fim.php";
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
       form_cg_htfkdj_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htfkdj']['masterValue']);
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
}
?>
