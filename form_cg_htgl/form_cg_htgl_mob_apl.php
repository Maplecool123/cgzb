<?php
//
class form_cg_htgl_mob_apl
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
   var $cgbbh;
   var $cgbmc;
   var $cgybh;
   var $cgyxm;
   var $cgylxdh;
   var $cgfs;
   var $htmc;
   var $htbh;
   var $htlx;
   var $htlx_1;
   var $htje;
   var $qdrq;
   var $qydw;
   var $qydwlxr;
   var $qydwlxrdh;
   var $zbj;
   var $zbdqrq;
   var $shsj;
   var $shsj_hora;
   var $shzt;
   var $ifjs;
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
          if (isset($this->NM_ajax_info['param']['cgbbh']))
          {
              $this->cgbbh = $this->NM_ajax_info['param']['cgbbh'];
          }
          if (isset($this->NM_ajax_info['param']['cgbmc']))
          {
              $this->cgbmc = $this->NM_ajax_info['param']['cgbmc'];
          }
          if (isset($this->NM_ajax_info['param']['cgfs']))
          {
              $this->cgfs = $this->NM_ajax_info['param']['cgfs'];
          }
          if (isset($this->NM_ajax_info['param']['cgybh']))
          {
              $this->cgybh = $this->NM_ajax_info['param']['cgybh'];
          }
          if (isset($this->NM_ajax_info['param']['cgylxdh']))
          {
              $this->cgylxdh = $this->NM_ajax_info['param']['cgylxdh'];
          }
          if (isset($this->NM_ajax_info['param']['cgyxm']))
          {
              $this->cgyxm = $this->NM_ajax_info['param']['cgyxm'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['htbh']))
          {
              $this->htbh = $this->NM_ajax_info['param']['htbh'];
          }
          if (isset($this->NM_ajax_info['param']['htje']))
          {
              $this->htje = $this->NM_ajax_info['param']['htje'];
          }
          if (isset($this->NM_ajax_info['param']['htlx']))
          {
              $this->htlx = $this->NM_ajax_info['param']['htlx'];
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
          if (isset($this->NM_ajax_info['param']['qdrq']))
          {
              $this->qdrq = $this->NM_ajax_info['param']['qdrq'];
          }
          if (isset($this->NM_ajax_info['param']['qydw']))
          {
              $this->qydw = $this->NM_ajax_info['param']['qydw'];
          }
          if (isset($this->NM_ajax_info['param']['qydwlxr']))
          {
              $this->qydwlxr = $this->NM_ajax_info['param']['qydwlxr'];
          }
          if (isset($this->NM_ajax_info['param']['qydwlxrdh']))
          {
              $this->qydwlxrdh = $this->NM_ajax_info['param']['qydwlxrdh'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['zbdqrq']))
          {
              $this->zbdqrq = $this->NM_ajax_info['param']['zbdqrq'];
          }
          if (isset($this->NM_ajax_info['param']['zbj']))
          {
              $this->zbj = $this->NM_ajax_info['param']['zbj'];
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_htgl']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cg_htgl']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cg_htgl']['embutida_parms']);
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
                 nm_limpa_str_form_cg_htgl_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cg_htgl_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("zh_cn");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("zh_cn");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cg_htgl_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_htgl_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_htgl_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htgl_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htgl_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cg_htgl_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_htgl_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_htgl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cg_htgl_mob")
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
      $this->nm_new_label['cgbbh'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbbh'] . '';
      $this->nm_new_label['cgbmc'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbmc'] . '';
      $this->nm_new_label['cgybh'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgybh'] . '';
      $this->nm_new_label['cgyxm'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgyxm'] . '';
      $this->nm_new_label['cgylxdh'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgylxdh'] . '';
      $this->nm_new_label['cgfs'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgfs'] . '';
      $this->nm_new_label['htmc'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_htmc'] . '';
      $this->nm_new_label['htbh'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_htbh'] . '';
      $this->nm_new_label['htlx'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_htlx'] . '';
      $this->nm_new_label['htje'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . '';
      $this->nm_new_label['qdrq'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_qdrq'] . '';
      $this->nm_new_label['qydw'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydw'] . '';
      $this->nm_new_label['qydwlxr'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxr'] . '';
      $this->nm_new_label['qydwlxrdh'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxrdh'] . '';
      $this->nm_new_label['zbj'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbj'] . '';
      $this->nm_new_label['zbdqrq'] = '' . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbdqrq'] . '';

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


      $_SESSION['scriptcase']['error_icon']['form_cg_htgl_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cg_htgl_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_htgl_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->shsj)){$this->shsj = $this->nmgp_dados_form['shsj'];} 
          if (!isset($this->shzt)){$this->shzt = $this->nmgp_dados_form['shzt'];} 
          if (!isset($this->ifjs)){$this->ifjs = $this->nmgp_dados_form['ifjs'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cg_htgl_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_cg_htgl/form_cg_htgl_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cg_htgl_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cg_htgl_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cg_htgl_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cg_htgl/form_cg_htgl_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cg_htgl_mob_erro.class.php"); 
      }
      $this->Erro      = new form_cg_htgl_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_htgl_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
      if (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
      if (isset($this->cgybh)) { $this->nm_limpa_alfa($this->cgybh); }
      if (isset($this->cgyxm)) { $this->nm_limpa_alfa($this->cgyxm); }
      if (isset($this->cgylxdh)) { $this->nm_limpa_alfa($this->cgylxdh); }
      if (isset($this->cgfs)) { $this->nm_limpa_alfa($this->cgfs); }
      if (isset($this->htmc)) { $this->nm_limpa_alfa($this->htmc); }
      if (isset($this->htbh)) { $this->nm_limpa_alfa($this->htbh); }
      if (isset($this->htlx)) { $this->nm_limpa_alfa($this->htlx); }
      if (isset($this->htje)) { $this->nm_limpa_alfa($this->htje); }
      if (isset($this->qydw)) { $this->nm_limpa_alfa($this->qydw); }
      if (isset($this->qydwlxr)) { $this->nm_limpa_alfa($this->qydwlxr); }
      if (isset($this->qydwlxrdh)) { $this->nm_limpa_alfa($this->qydwlxrdh); }
      if (isset($this->zbj)) { $this->nm_limpa_alfa($this->zbj); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select'];
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
      //-- qdrq
      $this->field_config['qdrq']                 = array();
      $this->field_config['qdrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['qdrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['qdrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'qdrq');
      //-- zbj
      $this->field_config['zbj']               = array();
      $this->field_config['zbj']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['zbj']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['zbj']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['zbj']['symbol_mon'] = '';
      $this->field_config['zbj']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['zbj']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- zbdqrq
      $this->field_config['zbdqrq']                 = array();
      $this->field_config['zbdqrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['zbdqrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['zbdqrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'zbdqrq');
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Gera_log_access'] = false;
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
          if ('validate_cgbbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbbh');
          }
          if ('validate_cgbmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbmc');
          }
          if ('validate_cgybh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgybh');
          }
          if ('validate_cgyxm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgyxm');
          }
          if ('validate_cgylxdh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgylxdh');
          }
          if ('validate_cgfs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgfs');
          }
          if ('validate_htmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htmc');
          }
          if ('validate_htbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htbh');
          }
          if ('validate_htlx' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htlx');
          }
          if ('validate_htje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'htje');
          }
          if ('validate_qdrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qdrq');
          }
          if ('validate_qydw' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qydw');
          }
          if ('validate_qydwlxr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qydwlxr');
          }
          if ('validate_qydwlxrdh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qydwlxrdh');
          }
          if ('validate_zbj' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zbj');
          }
          if ('validate_zbdqrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zbdqrq');
          }
          form_cg_htgl_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_cgbbh_onchange' == $this->NM_ajax_opcao)
          {
              $this->cgbbh_onChange();
          }
          if ('event_qydw_onchange' == $this->NM_ajax_opcao)
          {
              $this->qydw_onChange();
          }
          form_cg_htgl_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_cg_htgl_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cg_htgl_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cg_htgl_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_cg_htgl_mob_pack_ajax_response();
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
          form_cg_htgl_mob_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_cg_htgl_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_cg_htgl_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_cg_htgl_mob_pack_ajax_response();
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
           case 'cgbbh':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbbh'] . "";
               break;
           case 'cgbmc':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbmc'] . "";
               break;
           case 'cgybh':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgybh'] . "";
               break;
           case 'cgyxm':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgyxm'] . "";
               break;
           case 'cgylxdh':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgylxdh'] . "";
               break;
           case 'cgfs':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgfs'] . "";
               break;
           case 'htmc':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htmc'] . "";
               break;
           case 'htbh':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htbh'] . "";
               break;
           case 'htlx':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htlx'] . "";
               break;
           case 'htje':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . "";
               break;
           case 'qdrq':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qdrq'] . "";
               break;
           case 'qydw':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydw'] . "";
               break;
           case 'qydwlxr':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxr'] . "";
               break;
           case 'qydwlxrdh':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxrdh'] . "";
               break;
           case 'zbj':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbj'] . "";
               break;
           case 'zbdqrq':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbdqrq'] . "";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_id'] . "";
               break;
           case 'shsj':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_shsj'] . "";
               break;
           case 'shzt':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_shzt'] . "";
               break;
           case 'ifjs':
               return "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_ifjs'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cg_htgl_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_cg_htgl_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cg_htgl_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cg_htgl_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'cgbbh' == $filtro)
        $this->ValidateField_cgbbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgbmc' == $filtro)
        $this->ValidateField_cgbmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgybh' == $filtro)
        $this->ValidateField_cgybh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgyxm' == $filtro)
        $this->ValidateField_cgyxm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgylxdh' == $filtro)
        $this->ValidateField_cgylxdh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgfs' == $filtro)
        $this->ValidateField_cgfs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htmc' == $filtro)
        $this->ValidateField_htmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htbh' == $filtro)
        $this->ValidateField_htbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htlx' == $filtro)
        $this->ValidateField_htlx($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'htje' == $filtro)
        $this->ValidateField_htje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qdrq' == $filtro)
        $this->ValidateField_qdrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qydw' == $filtro)
        $this->ValidateField_qydw($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qydwlxr' == $filtro)
        $this->ValidateField_qydwlxr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qydwlxrdh' == $filtro)
        $this->ValidateField_qydwlxrdh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zbj' == $filtro)
        $this->ValidateField_zbj($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zbdqrq' == $filtro)
        $this->ValidateField_zbdqrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_cgbbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbbh'] == "on")) 
      { 
          if ($this->cgbbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbbh'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgbmc'] == "on")) 
      { 
          if ($this->cgbmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbmc'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgbmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_cgybh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgybh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgybh'] == "on")) 
      { 
          if ($this->cgybh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgybh'] . "" ; 
              if (!isset($Campos_Erros['cgybh']))
              {
                  $Campos_Erros['cgybh'] = array();
              }
              $Campos_Erros['cgybh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgybh']) || !is_array($this->NM_ajax_info['errList']['cgybh']))
                  {
                      $this->NM_ajax_info['errList']['cgybh'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgybh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgybh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgybh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgybh']))
              {
                  $Campos_Erros['cgybh'] = array();
              }
              $Campos_Erros['cgybh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgybh']) || !is_array($this->NM_ajax_info['errList']['cgybh']))
              {
                  $this->NM_ajax_info['errList']['cgybh'] = array();
              }
              $this->NM_ajax_info['errList']['cgybh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgybh

    function ValidateField_cgyxm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgyxm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgyxm'] == "on")) 
      { 
          if ($this->cgyxm == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgyxm'] . "" ; 
              if (!isset($Campos_Erros['cgyxm']))
              {
                  $Campos_Erros['cgyxm'] = array();
              }
              $Campos_Erros['cgyxm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgyxm']) || !is_array($this->NM_ajax_info['errList']['cgyxm']))
                  {
                      $this->NM_ajax_info['errList']['cgyxm'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgyxm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgyxm) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgyxm'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgyxm']))
              {
                  $Campos_Erros['cgyxm'] = array();
              }
              $Campos_Erros['cgyxm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgyxm']) || !is_array($this->NM_ajax_info['errList']['cgyxm']))
              {
                  $this->NM_ajax_info['errList']['cgyxm'] = array();
              }
              $this->NM_ajax_info['errList']['cgyxm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgyxm

    function ValidateField_cgylxdh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgylxdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgylxdh'] == "on")) 
      { 
          if ($this->cgylxdh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgylxdh'] . "" ; 
              if (!isset($Campos_Erros['cgylxdh']))
              {
                  $Campos_Erros['cgylxdh'] = array();
              }
              $Campos_Erros['cgylxdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgylxdh']) || !is_array($this->NM_ajax_info['errList']['cgylxdh']))
                  {
                      $this->NM_ajax_info['errList']['cgylxdh'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgylxdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgylxdh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgylxdh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgylxdh']))
              {
                  $Campos_Erros['cgylxdh'] = array();
              }
              $Campos_Erros['cgylxdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgylxdh']) || !is_array($this->NM_ajax_info['errList']['cgylxdh']))
              {
                  $this->NM_ajax_info['errList']['cgylxdh'] = array();
              }
              $this->NM_ajax_info['errList']['cgylxdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgylxdh

    function ValidateField_cgfs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgfs']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['cgfs'] == "on")) 
      { 
          if ($this->cgfs == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgfs'] . "" ; 
              if (!isset($Campos_Erros['cgfs']))
              {
                  $Campos_Erros['cgfs'] = array();
              }
              $Campos_Erros['cgfs'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cgfs']) || !is_array($this->NM_ajax_info['errList']['cgfs']))
                  {
                      $this->NM_ajax_info['errList']['cgfs'] = array();
                  }
                  $this->NM_ajax_info['errList']['cgfs'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgfs) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_cgfs'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgfs']))
              {
                  $Campos_Erros['cgfs'] = array();
              }
              $Campos_Erros['cgfs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgfs']) || !is_array($this->NM_ajax_info['errList']['cgfs']))
              {
                  $this->NM_ajax_info['errList']['cgfs'] = array();
              }
              $this->NM_ajax_info['errList']['cgfs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgfs

    function ValidateField_htmc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htmc'] == "on")) 
      { 
          if ($this->htmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htmc'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_htbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htbh'] == "on")) 
      { 
          if ($this->htbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htbh'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_htlx(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->htlx == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htlx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htlx'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htlx'] . "" ; 
          if (!isset($Campos_Erros['htlx']))
          {
              $Campos_Erros['htlx'] = array();
          }
          $Campos_Erros['htlx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['htlx']) || !is_array($this->NM_ajax_info['errList']['htlx']))
          {
              $this->NM_ajax_info['errList']['htlx'] = array();
          }
          $this->NM_ajax_info['errList']['htlx'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->htlx) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']) && !in_array($this->htlx, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['htlx']))
              {
                  $Campos_Erros['htlx'] = array();
              }
              $Campos_Erros['htlx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['htlx']) || !is_array($this->NM_ajax_info['errList']['htlx']))
              {
                  $this->NM_ajax_info['errList']['htlx'] = array();
              }
              $this->NM_ajax_info['errList']['htlx'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_htlx

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
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->htje, 4, 2, -0, 999999, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . "; " ; 
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['htje'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_htje'] . "" ; 
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

    function ValidateField_qdrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->qdrq, $this->field_config['qdrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['qdrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['qdrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['qdrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['qdrq']['date_sep']) ; 
          if (trim($this->qdrq) != "")  
          { 
              if ($teste_validade->Data($this->qdrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qdrq'] . "; " ; 
                  if (!isset($Campos_Erros['qdrq']))
                  {
                      $Campos_Erros['qdrq'] = array();
                  }
                  $Campos_Erros['qdrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['qdrq']) || !is_array($this->NM_ajax_info['errList']['qdrq']))
                  {
                      $this->NM_ajax_info['errList']['qdrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['qdrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif ((!$this->NM_ajax_flag || 'validate_qdrq' != $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qdrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qdrq'] == "on")) 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qdrq'] . "" ; 
              if (!isset($Campos_Erros['qdrq']))
              {
                  $Campos_Erros['qdrq'] = array();
              }
              $Campos_Erros['qdrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['qdrq']) || !is_array($this->NM_ajax_info['errList']['qdrq']))
                  {
                      $this->NM_ajax_info['errList']['qdrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['qdrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['qdrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_qdrq

    function ValidateField_qydw(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydw']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydw'] == "on")) 
      { 
          if ($this->qydw == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydw'] . "" ; 
              if (!isset($Campos_Erros['qydw']))
              {
                  $Campos_Erros['qydw'] = array();
              }
              $Campos_Erros['qydw'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['qydw']) || !is_array($this->NM_ajax_info['errList']['qydw']))
                  {
                      $this->NM_ajax_info['errList']['qydw'] = array();
                  }
                  $this->NM_ajax_info['errList']['qydw'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->qydw) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydw'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['qydw']))
              {
                  $Campos_Erros['qydw'] = array();
              }
              $Campos_Erros['qydw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['qydw']) || !is_array($this->NM_ajax_info['errList']['qydw']))
              {
                  $this->NM_ajax_info['errList']['qydw'] = array();
              }
              $this->NM_ajax_info['errList']['qydw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_qydw

    function ValidateField_qydwlxr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxr'] == "on")) 
      { 
          if ($this->qydwlxr == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxr'] . "" ; 
              if (!isset($Campos_Erros['qydwlxr']))
              {
                  $Campos_Erros['qydwlxr'] = array();
              }
              $Campos_Erros['qydwlxr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['qydwlxr']) || !is_array($this->NM_ajax_info['errList']['qydwlxr']))
                  {
                      $this->NM_ajax_info['errList']['qydwlxr'] = array();
                  }
                  $this->NM_ajax_info['errList']['qydwlxr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->qydwlxr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['qydwlxr']))
              {
                  $Campos_Erros['qydwlxr'] = array();
              }
              $Campos_Erros['qydwlxr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['qydwlxr']) || !is_array($this->NM_ajax_info['errList']['qydwlxr']))
              {
                  $this->NM_ajax_info['errList']['qydwlxr'] = array();
              }
              $this->NM_ajax_info['errList']['qydwlxr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_qydwlxr

    function ValidateField_qydwlxrdh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxrdh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['php_cmp_required']['qydwlxrdh'] == "on")) 
      { 
          if ($this->qydwlxrdh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxrdh'] . "" ; 
              if (!isset($Campos_Erros['qydwlxrdh']))
              {
                  $Campos_Erros['qydwlxrdh'] = array();
              }
              $Campos_Erros['qydwlxrdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['qydwlxrdh']) || !is_array($this->NM_ajax_info['errList']['qydwlxrdh']))
                  {
                      $this->NM_ajax_info['errList']['qydwlxrdh'] = array();
                  }
                  $this->NM_ajax_info['errList']['qydwlxrdh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->qydwlxrdh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_qydwlxrdh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['qydwlxrdh']))
              {
                  $Campos_Erros['qydwlxrdh'] = array();
              }
              $Campos_Erros['qydwlxrdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['qydwlxrdh']) || !is_array($this->NM_ajax_info['errList']['qydwlxrdh']))
              {
                  $this->NM_ajax_info['errList']['qydwlxrdh'] = array();
              }
              $this->NM_ajax_info['errList']['qydwlxrdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_qydwlxrdh

    function ValidateField_zbj(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->zbj == "")  
      { 
          $this->zbj = 0;
          $this->sc_force_zero[] = 'zbj';
      } 
      if (!empty($this->field_config['zbj']['symbol_dec']))
      {
          $this->sc_remove_currency($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp'], $this->field_config['zbj']['symbol_mon']); 
          nm_limpa_valor($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp']) ; 
          if ('.' == substr($this->zbj, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->zbj, 1)))
              {
                  $this->zbj = '';
              }
              else
              {
                  $this->zbj = '0' . $this->zbj;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->zbj != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->zbj) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbj'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['zbj']))
                  {
                      $Campos_Erros['zbj'] = array();
                  }
                  $Campos_Erros['zbj'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['zbj']) || !is_array($this->NM_ajax_info['errList']['zbj']))
                  {
                      $this->NM_ajax_info['errList']['zbj'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbj'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->zbj, 4, 2, -0, 999999, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbj'] . "; " ; 
                  if (!isset($Campos_Erros['zbj']))
                  {
                      $Campos_Erros['zbj'] = array();
                  }
                  $Campos_Erros['zbj'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['zbj']) || !is_array($this->NM_ajax_info['errList']['zbj']))
                  {
                      $this->NM_ajax_info['errList']['zbj'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbj'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_zbj

    function ValidateField_zbdqrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->zbdqrq, $this->field_config['zbdqrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['zbdqrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['zbdqrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['zbdqrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['zbdqrq']['date_sep']) ; 
          if (trim($this->zbdqrq) != "")  
          { 
              if ($teste_validade->Data($this->zbdqrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_htgl_fld_zbdqrq'] . "; " ; 
                  if (!isset($Campos_Erros['zbdqrq']))
                  {
                      $Campos_Erros['zbdqrq'] = array();
                  }
                  $Campos_Erros['zbdqrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['zbdqrq']) || !is_array($this->NM_ajax_info['errList']['zbdqrq']))
                  {
                      $this->NM_ajax_info['errList']['zbdqrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbdqrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['zbdqrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_zbdqrq

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
    $this->nmgp_dados_form['cgbbh'] = $this->cgbbh;
    $this->nmgp_dados_form['cgbmc'] = $this->cgbmc;
    $this->nmgp_dados_form['cgybh'] = $this->cgybh;
    $this->nmgp_dados_form['cgyxm'] = $this->cgyxm;
    $this->nmgp_dados_form['cgylxdh'] = $this->cgylxdh;
    $this->nmgp_dados_form['cgfs'] = $this->cgfs;
    $this->nmgp_dados_form['htmc'] = $this->htmc;
    $this->nmgp_dados_form['htbh'] = $this->htbh;
    $this->nmgp_dados_form['htlx'] = $this->htlx;
    $this->nmgp_dados_form['htje'] = $this->htje;
    $this->nmgp_dados_form['qdrq'] = $this->qdrq;
    $this->nmgp_dados_form['qydw'] = $this->qydw;
    $this->nmgp_dados_form['qydwlxr'] = $this->qydwlxr;
    $this->nmgp_dados_form['qydwlxrdh'] = $this->qydwlxrdh;
    $this->nmgp_dados_form['zbj'] = $this->zbj;
    $this->nmgp_dados_form['zbdqrq'] = $this->zbdqrq;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['shsj'] = $this->shsj;
    $this->nmgp_dados_form['shzt'] = $this->shzt;
    $this->nmgp_dados_form['ifjs'] = $this->ifjs;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_form'] = $this->nmgp_dados_form;
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
      nm_limpa_data($this->qdrq, $this->field_config['qdrq']['date_sep']) ; 
      if (!empty($this->field_config['zbj']['symbol_dec']))
      {
         $this->sc_remove_currency($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp'], $this->field_config['zbj']['symbol_mon']);
         nm_limpa_valor($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp']);
      }
      nm_limpa_data($this->zbdqrq, $this->field_config['zbdqrq']['date_sep']) ; 
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
      if ($Nome_Campo == "htje")
      {
          if (!empty($this->field_config['htje']['symbol_dec']))
          {
             $this->sc_remove_currency($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp'], $this->field_config['htje']['symbol_mon']);
             nm_limpa_valor($this->htje, $this->field_config['htje']['symbol_dec'], $this->field_config['htje']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "zbj")
      {
          if (!empty($this->field_config['zbj']['symbol_dec']))
          {
             $this->sc_remove_currency($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp'], $this->field_config['zbj']['symbol_mon']);
             nm_limpa_valor($this->zbj, $this->field_config['zbj']['symbol_dec'], $this->field_config['zbj']['symbol_grp']);
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
      if ((!empty($this->qdrq) && 'null' != $this->qdrq) || (!empty($format_fields) && isset($format_fields['qdrq'])))
      {
          nm_volta_data($this->qdrq, $this->field_config['qdrq']['date_format']) ; 
          nmgp_Form_Datas($this->qdrq, $this->field_config['qdrq']['date_format'], $this->field_config['qdrq']['date_sep']) ;  
      }
      elseif ('null' == $this->qdrq || '' == $this->qdrq)
      {
          $this->qdrq = '';
      }
      if (!empty($this->zbj) || (!empty($format_fields) && isset($format_fields['zbj'])))
      {
          nmgp_Form_Num_Val($this->zbj, $this->field_config['zbj']['symbol_grp'], $this->field_config['zbj']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['zbj']['symbol_fmt']) ; 
      }
      if ((!empty($this->zbdqrq) && 'null' != $this->zbdqrq) || (!empty($format_fields) && isset($format_fields['zbdqrq'])))
      {
          nm_volta_data($this->zbdqrq, $this->field_config['zbdqrq']['date_format']) ; 
          nmgp_Form_Datas($this->zbdqrq, $this->field_config['zbdqrq']['date_format'], $this->field_config['zbdqrq']['date_sep']) ;  
      }
      elseif ('null' == $this->zbdqrq || '' == $this->zbdqrq)
      {
          $this->zbdqrq = '';
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
      $guarda_format_hora = $this->field_config['qdrq']['date_format'];
      if ($this->qdrq != "")  
      { 
          nm_conv_data($this->qdrq, $this->field_config['qdrq']['date_format']) ; 
          $this->qdrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->qdrq_hora = substr($this->qdrq_hora, 0, -4);
          }
      } 
      if ($this->qdrq == "" && $use_null)  
      { 
          $this->qdrq = "null" ; 
      } 
      $this->field_config['qdrq']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['zbdqrq']['date_format'];
      if ($this->zbdqrq != "")  
      { 
          nm_conv_data($this->zbdqrq, $this->field_config['zbdqrq']['date_format']) ; 
          $this->zbdqrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->zbdqrq_hora = substr($this->zbdqrq_hora, 0, -4);
          }
      } 
      if ($this->zbdqrq == "" && $use_null)  
      { 
          $this->zbdqrq = "null" ; 
      } 
      $this->field_config['zbdqrq']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_cgbbh();
          $this->ajax_return_values_cgbmc();
          $this->ajax_return_values_cgybh();
          $this->ajax_return_values_cgyxm();
          $this->ajax_return_values_cgylxdh();
          $this->ajax_return_values_cgfs();
          $this->ajax_return_values_htmc();
          $this->ajax_return_values_htbh();
          $this->ajax_return_values_htlx();
          $this->ajax_return_values_htje();
          $this->ajax_return_values_qdrq();
          $this->ajax_return_values_qydw();
          $this->ajax_return_values_qydwlxr();
          $this->ajax_return_values_qydwlxrdh();
          $this->ajax_return_values_zbj();
          $this->ajax_return_values_zbdqrq();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_cg_htgl_mob_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cgybh
   function ajax_return_values_cgybh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgybh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgybh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgybh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cgyxm
   function ajax_return_values_cgyxm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgyxm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgyxm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgyxm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cgylxdh
   function ajax_return_values_cgylxdh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgylxdh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgylxdh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgylxdh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cgfs
   function ajax_return_values_cgfs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgfs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cgfs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cgfs'] = array(
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

          //----- htlx
   function ajax_return_values_htlx($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("htlx", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->htlx);
              $aLookup = array();
              $this->_tmp_lookup_htlx = $this->htlx;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'] = array(); 
}
$aLookup[] = array(form_cg_htgl_mob_pack_protect_string('') => form_cg_htgl_mob_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_htje = $this->htje;
   $old_value_qdrq = $this->qdrq;
   $old_value_zbj = $this->zbj;
   $old_value_zbdqrq = $this->zbdqrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_htje = $this->htje;
   $unformatted_value_qdrq = $this->qdrq;
   $unformatted_value_zbj = $this->zbj;
   $unformatted_value_zbdqrq = $this->zbdqrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_htlx 
ORDER BY mc";

   $this->htje = $old_value_htje;
   $this->qdrq = $old_value_qdrq;
   $this->zbj = $old_value_zbj;
   $this->zbdqrq = $old_value_zbdqrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_htgl_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_htgl_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['Lookup_htlx'][] = $rs->fields[0];
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
          $sSelComp = "name=\"htlx\"";
          if (isset($this->NM_ajax_info['select_html']['htlx']) && !empty($this->NM_ajax_info['select_html']['htlx']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['htlx'];
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

                  if ($this->htlx == $sValue)
                  {
                      $this->_tmp_lookup_htlx = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['htlx'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['htlx']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['htlx']['valList'][$i] = form_cg_htgl_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['htlx']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['htlx']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['htlx']['labList'] = $aLabel;
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

          //----- qdrq
   function ajax_return_values_qdrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qdrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qdrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qdrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- qydw
   function ajax_return_values_qydw($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qydw", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qydw);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qydw'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- qydwlxr
   function ajax_return_values_qydwlxr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qydwlxr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qydwlxr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qydwlxr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- qydwlxrdh
   function ajax_return_values_qydwlxrdh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qydwlxrdh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qydwlxrdh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qydwlxrdh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- zbj
   function ajax_return_values_zbj($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zbj", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zbj);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zbj'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- zbdqrq
   function ajax_return_values_zbdqrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zbdqrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zbdqrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zbdqrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->zbj = str_replace($sc_parm1, $sc_parm2, $this->zbj); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->htje = "'" . $this->htje . "'";
      $this->zbj = "'" . $this->zbj . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->htje = str_replace("'", "", $this->htje); 
      $this->zbj = str_replace("'", "", $this->zbj); 
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
      $NM_val_form['cgbbh'] = $this->cgbbh;
      $NM_val_form['cgbmc'] = $this->cgbmc;
      $NM_val_form['cgybh'] = $this->cgybh;
      $NM_val_form['cgyxm'] = $this->cgyxm;
      $NM_val_form['cgylxdh'] = $this->cgylxdh;
      $NM_val_form['cgfs'] = $this->cgfs;
      $NM_val_form['htmc'] = $this->htmc;
      $NM_val_form['htbh'] = $this->htbh;
      $NM_val_form['htlx'] = $this->htlx;
      $NM_val_form['htje'] = $this->htje;
      $NM_val_form['qdrq'] = $this->qdrq;
      $NM_val_form['qydw'] = $this->qydw;
      $NM_val_form['qydwlxr'] = $this->qydwlxr;
      $NM_val_form['qydwlxrdh'] = $this->qydwlxrdh;
      $NM_val_form['zbj'] = $this->zbj;
      $NM_val_form['zbdqrq'] = $this->zbdqrq;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['shsj'] = $this->shsj;
      $NM_val_form['shzt'] = $this->shzt;
      $NM_val_form['ifjs'] = $this->ifjs;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->htje == "")  
      { 
          $this->htje = 0;
          $this->sc_force_zero[] = 'htje';
      } 
      if ($this->zbj == "")  
      { 
          $this->zbj = 0;
          $this->sc_force_zero[] = 'zbj';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cgbbh_before_qstr = $this->cgbbh;
          $this->cgbbh = substr($this->Db->qstr($this->cgbbh), 1, -1); 
          $this->cgbmc_before_qstr = $this->cgbmc;
          $this->cgbmc = substr($this->Db->qstr($this->cgbmc), 1, -1); 
          $this->cgybh_before_qstr = $this->cgybh;
          $this->cgybh = substr($this->Db->qstr($this->cgybh), 1, -1); 
          $this->cgyxm_before_qstr = $this->cgyxm;
          $this->cgyxm = substr($this->Db->qstr($this->cgyxm), 1, -1); 
          $this->cgylxdh_before_qstr = $this->cgylxdh;
          $this->cgylxdh = substr($this->Db->qstr($this->cgylxdh), 1, -1); 
          $this->cgfs_before_qstr = $this->cgfs;
          $this->cgfs = substr($this->Db->qstr($this->cgfs), 1, -1); 
          $this->htmc_before_qstr = $this->htmc;
          $this->htmc = substr($this->Db->qstr($this->htmc), 1, -1); 
          $this->htbh_before_qstr = $this->htbh;
          $this->htbh = substr($this->Db->qstr($this->htbh), 1, -1); 
          $this->htlx_before_qstr = $this->htlx;
          $this->htlx = substr($this->Db->qstr($this->htlx), 1, -1); 
          if ($this->qdrq == "")  
          { 
              $this->qdrq = "null"; 
              $NM_val_null[] = "qdrq";
          } 
          $this->qydw_before_qstr = $this->qydw;
          $this->qydw = substr($this->Db->qstr($this->qydw), 1, -1); 
          $this->qydwlxr_before_qstr = $this->qydwlxr;
          $this->qydwlxr = substr($this->Db->qstr($this->qydwlxr), 1, -1); 
          $this->qydwlxrdh_before_qstr = $this->qydwlxrdh;
          $this->qydwlxrdh = substr($this->Db->qstr($this->qydwlxrdh), 1, -1); 
          if ($this->zbdqrq == "")  
          { 
              $this->zbdqrq = "null"; 
              $NM_val_null[] = "zbdqrq";
          } 
          if ($this->shsj == "")  
          { 
              $this->shsj = "null"; 
              $NM_val_null[] = "shsj";
          } 
          $this->shzt_before_qstr = $this->shzt;
          $this->shzt = substr($this->Db->qstr($this->shzt), 1, -1); 
          $this->ifjs_before_qstr = $this->ifjs;
          $this->ifjs = substr($this->Db->qstr($this->ifjs), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['decimal_db'] == ",") 
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
                 form_cg_htgl_mob_pack_ajax_response();
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
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', cgybh = '$this->cgybh', cgyxm = '$this->cgyxm', cgylxdh = '$this->cgylxdh', cgfs = '$this->cgfs', htmc = '$this->htmc', htbh = '$this->htbh', htlx = '$this->htlx', htje = $this->htje, qdrq = " . $this->Ini->date_delim . $this->qdrq . $this->Ini->date_delim1 . ", qydw = '$this->qydw', qydwlxr = '$this->qydwlxr', qydwlxrdh = '$this->qydwlxrdh', zbj = $this->zbj, zbdqrq = " . $this->Ini->date_delim . $this->zbdqrq . $this->Ini->date_delim1 . "";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', cgybh = '$this->cgybh', cgyxm = '$this->cgyxm', cgylxdh = '$this->cgylxdh', cgfs = '$this->cgfs', htmc = '$this->htmc', htbh = '$this->htbh', htlx = '$this->htlx', htje = $this->htje, qdrq = " . $this->Ini->date_delim . $this->qdrq . $this->Ini->date_delim1 . ", qydw = '$this->qydw', qydwlxr = '$this->qydwlxr', qydwlxrdh = '$this->qydwlxrdh', zbj = $this->zbj, zbdqrq = " . $this->Ini->date_delim . $this->zbdqrq . $this->Ini->date_delim1 . "";  
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
              if (isset($NM_val_form['ifjs']) && $NM_val_form['ifjs'] != $this->nmgp_dados_select['ifjs']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ifjs = '$this->ifjs'"; 
                  $comando_oracle        .= " ifjs = '$this->ifjs'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
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
                                  form_cg_htgl_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->cgbbh = $this->cgbbh_before_qstr;
          $this->cgbmc = $this->cgbmc_before_qstr;
          $this->cgybh = $this->cgybh_before_qstr;
          $this->cgyxm = $this->cgyxm_before_qstr;
          $this->cgylxdh = $this->cgylxdh_before_qstr;
          $this->cgfs = $this->cgfs_before_qstr;
          $this->htmc = $this->htmc_before_qstr;
          $this->htbh = $this->htbh_before_qstr;
          $this->htlx = $this->htlx_before_qstr;
          $this->qydw = $this->qydw_before_qstr;
          $this->qydwlxr = $this->qydwlxr_before_qstr;
          $this->qydwlxrdh = $this->qydwlxrdh_before_qstr;
          $this->shzt = $this->shzt_before_qstr;
          $this->ifjs = $this->ifjs_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgbbh'])) { $this->cgbbh = $NM_val_form['cgbbh']; }
              elseif (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgbmc'])) { $this->cgbmc = $NM_val_form['cgbmc']; }
              elseif (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgybh'])) { $this->cgybh = $NM_val_form['cgybh']; }
              elseif (isset($this->cgybh)) { $this->nm_limpa_alfa($this->cgybh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgyxm'])) { $this->cgyxm = $NM_val_form['cgyxm']; }
              elseif (isset($this->cgyxm)) { $this->nm_limpa_alfa($this->cgyxm); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgylxdh'])) { $this->cgylxdh = $NM_val_form['cgylxdh']; }
              elseif (isset($this->cgylxdh)) { $this->nm_limpa_alfa($this->cgylxdh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgfs'])) { $this->cgfs = $NM_val_form['cgfs']; }
              elseif (isset($this->cgfs)) { $this->nm_limpa_alfa($this->cgfs); }
              if     (isset($NM_val_form) && isset($NM_val_form['htmc'])) { $this->htmc = $NM_val_form['htmc']; }
              elseif (isset($this->htmc)) { $this->nm_limpa_alfa($this->htmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['htbh'])) { $this->htbh = $NM_val_form['htbh']; }
              elseif (isset($this->htbh)) { $this->nm_limpa_alfa($this->htbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['htlx'])) { $this->htlx = $NM_val_form['htlx']; }
              elseif (isset($this->htlx)) { $this->nm_limpa_alfa($this->htlx); }
              if     (isset($NM_val_form) && isset($NM_val_form['htje'])) { $this->htje = $NM_val_form['htje']; }
              elseif (isset($this->htje)) { $this->nm_limpa_alfa($this->htje); }
              if     (isset($NM_val_form) && isset($NM_val_form['qydw'])) { $this->qydw = $NM_val_form['qydw']; }
              elseif (isset($this->qydw)) { $this->nm_limpa_alfa($this->qydw); }
              if     (isset($NM_val_form) && isset($NM_val_form['qydwlxr'])) { $this->qydwlxr = $NM_val_form['qydwlxr']; }
              elseif (isset($this->qydwlxr)) { $this->nm_limpa_alfa($this->qydwlxr); }
              if     (isset($NM_val_form) && isset($NM_val_form['qydwlxrdh'])) { $this->qydwlxrdh = $NM_val_form['qydwlxrdh']; }
              elseif (isset($this->qydwlxrdh)) { $this->nm_limpa_alfa($this->qydwlxrdh); }
              if     (isset($NM_val_form) && isset($NM_val_form['zbj'])) { $this->zbj = $NM_val_form['zbj']; }
              elseif (isset($this->zbj)) { $this->nm_limpa_alfa($this->zbj); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('cgbbh', 'cgbmc', 'cgybh', 'cgyxm', 'cgylxdh', 'cgfs', 'htmc', 'htbh', 'htlx', 'htje', 'qdrq', 'qydw', 'qydwlxr', 'qydwlxrdh', 'zbj', 'zbdqrq'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['decimal_db'] == ",") 
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
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cg_htgl_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cgbbh, cgbmc, cgybh, cgyxm, cgylxdh, cgfs, htmc, htbh, htlx, htje, qdrq, qydw, qydwlxr, qydwlxrdh, zbj, zbdqrq, shsj, shzt, ifjs) VALUES (" . $NM_seq_auto . "'$this->cgbbh', '$this->cgbmc', '$this->cgybh', '$this->cgyxm', '$this->cgylxdh', '$this->cgfs', '$this->htmc', '$this->htbh', '$this->htlx', $this->htje, " . $this->Ini->date_delim . $this->qdrq . $this->Ini->date_delim1 . ", '$this->qydw', '$this->qydwlxr', '$this->qydwlxrdh', $this->zbj, " . $this->Ini->date_delim . $this->zbdqrq . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ", '$this->shzt', '$this->ifjs')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cgbbh, cgbmc, cgybh, cgyxm, cgylxdh, cgfs, htmc, htbh, htlx, htje, qdrq, qydw, qydwlxr, qydwlxrdh, zbj, zbdqrq, shsj, shzt, ifjs) VALUES (" . $NM_seq_auto . "'$this->cgbbh', '$this->cgbmc', '$this->cgybh', '$this->cgyxm', '$this->cgylxdh', '$this->cgfs', '$this->htmc', '$this->htbh', '$this->htlx', $this->htje, " . $this->Ini->date_delim . $this->qdrq . $this->Ini->date_delim1 . ", '$this->qydw', '$this->qydwlxr', '$this->qydwlxrdh', $this->zbj, " . $this->Ini->date_delim . $this->zbdqrq . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->shsj . $this->Ini->date_delim1 . ", '$this->shzt', '$this->ifjs')"; 
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
                              form_cg_htgl_mob_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['decimal_db'] == ",") 
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
                          form_cg_htgl_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['parms'] = ""; 
          $nmgp_select = "SELECT id, cgbbh, cgbmc, cgybh, cgyxm, cgylxdh, cgfs, htmc, htbh, htlx, htje, qdrq, qydw, qydwlxr, qydwlxrdh, zbj, zbdqrq, shsj, shzt, ifjs from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter'] = true;
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
              $this->cgybh = $rs->fields[3] ; 
              $this->nmgp_dados_select['cgybh'] = $this->cgybh;
              $this->cgyxm = $rs->fields[4] ; 
              $this->nmgp_dados_select['cgyxm'] = $this->cgyxm;
              $this->cgylxdh = $rs->fields[5] ; 
              $this->nmgp_dados_select['cgylxdh'] = $this->cgylxdh;
              $this->cgfs = $rs->fields[6] ; 
              $this->nmgp_dados_select['cgfs'] = $this->cgfs;
              $this->htmc = $rs->fields[7] ; 
              $this->nmgp_dados_select['htmc'] = $this->htmc;
              $this->htbh = $rs->fields[8] ; 
              $this->nmgp_dados_select['htbh'] = $this->htbh;
              $this->htlx = $rs->fields[9] ; 
              $this->nmgp_dados_select['htlx'] = $this->htlx;
              $this->htje = $rs->fields[10] ; 
              $this->nmgp_dados_select['htje'] = $this->htje;
              $this->qdrq = $rs->fields[11] ; 
              $this->nmgp_dados_select['qdrq'] = $this->qdrq;
              $this->qydw = $rs->fields[12] ; 
              $this->nmgp_dados_select['qydw'] = $this->qydw;
              $this->qydwlxr = $rs->fields[13] ; 
              $this->nmgp_dados_select['qydwlxr'] = $this->qydwlxr;
              $this->qydwlxrdh = $rs->fields[14] ; 
              $this->nmgp_dados_select['qydwlxrdh'] = $this->qydwlxrdh;
              $this->zbj = $rs->fields[15] ; 
              $this->nmgp_dados_select['zbj'] = $this->zbj;
              $this->zbdqrq = $rs->fields[16] ; 
              $this->nmgp_dados_select['zbdqrq'] = $this->zbdqrq;
              $this->shsj = $rs->fields[17] ; 
              if (substr($this->shsj, 10, 1) == "-") 
              { 
                 $this->shsj = substr($this->shsj, 0, 10) . " " . substr($this->shsj, 11);
              } 
              if (substr($this->shsj, 13, 1) == ".") 
              { 
                 $this->shsj = substr($this->shsj, 0, 13) . ":" . substr($this->shsj, 14, 2) . ":" . substr($this->shsj, 17);
              } 
              $this->nmgp_dados_select['shsj'] = $this->shsj;
              $this->shzt = $rs->fields[18] ; 
              $this->nmgp_dados_select['shzt'] = $this->shzt;
              $this->ifjs = $rs->fields[19] ; 
              $this->nmgp_dados_select['ifjs'] = $this->ifjs;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->htje = (string)$this->htje; 
              $this->zbj = (string)$this->zbj; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['reg_start'] < $qt_geral_reg_form_cg_htgl_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opcao']   = '';
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
              $this->cgybh = "";  
              $this->cgyxm = "";  
              $this->cgylxdh = "";  
              $this->cgfs = "";  
              $this->htmc = "";  
              $this->htbh = "";  
              $this->htlx = "";  
              $this->htje = "";  
              $this->qdrq = "";  
              $this->qdrq_hora = "" ;  
              $this->qydw = "";  
              $this->qydwlxr = "";  
              $this->qydwlxrdh = "";  
              $this->zbj = "0";  
              $this->zbdqrq = "";  
              $this->zbdqrq_hora = "" ;  
              $this->shsj = "";  
              $this->shsj_hora = "" ;  
              $this->shzt = "";  
              $this->ifjs = "";  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select'];
                  $this->cgbbh = $this->nmgp_dados_select['cgbbh'];  
                  $this->cgbmc = $this->nmgp_dados_select['cgbmc'];  
                  $this->cgybh = $this->nmgp_dados_select['cgybh'];  
                  $this->cgyxm = $this->nmgp_dados_select['cgyxm'];  
                  $this->cgylxdh = $this->nmgp_dados_select['cgylxdh'];  
                  $this->cgfs = $this->nmgp_dados_select['cgfs'];  
                  $this->htmc = $this->nmgp_dados_select['htmc'];  
                  $this->htbh = $this->nmgp_dados_select['htbh'];  
                  $this->htlx = $this->nmgp_dados_select['htlx'];  
                  $this->htje = $this->nmgp_dados_select['htje'];  
                  $this->qdrq = $this->nmgp_dados_select['qdrq'];  
                  $this->qydw = $this->nmgp_dados_select['qydw'];  
                  $this->qydwlxr = $this->nmgp_dados_select['qydwlxr'];  
                  $this->qydwlxrdh = $this->nmgp_dados_select['qydwlxrdh'];  
                  $this->zbj = $this->nmgp_dados_select['zbj'];  
                  $this->zbdqrq = $this->nmgp_dados_select['zbdqrq'];  
                  $this->shsj = $this->nmgp_dados_select['shsj'];  
                  $this->shzt = $this->nmgp_dados_select['shzt'];  
                  $this->ifjs = $this->nmgp_dados_select['ifjs'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['foreign_key'] as $sFKName => $sFKValue)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['dados_select'];
           $this->SC_log_arr['fields']['cgbbh']['0'] =  $nmgp_dados_select['cgbbh'];
           $this->SC_log_arr['fields']['cgbmc']['0'] =  $nmgp_dados_select['cgbmc'];
           $this->SC_log_arr['fields']['cgybh']['0'] =  $nmgp_dados_select['cgybh'];
           $this->SC_log_arr['fields']['cgyxm']['0'] =  $nmgp_dados_select['cgyxm'];
           $this->SC_log_arr['fields']['cgylxdh']['0'] =  $nmgp_dados_select['cgylxdh'];
           $this->SC_log_arr['fields']['cgfs']['0'] =  $nmgp_dados_select['cgfs'];
           $this->SC_log_arr['fields']['htmc']['0'] =  $nmgp_dados_select['htmc'];
           $this->SC_log_arr['fields']['htbh']['0'] =  $nmgp_dados_select['htbh'];
           $this->SC_log_arr['fields']['htlx']['0'] =  $nmgp_dados_select['htlx'];
           $this->SC_log_arr['fields']['htje']['0'] =  $nmgp_dados_select['htje'];
           $this->SC_log_arr['fields']['qdrq']['0'] =  $nmgp_dados_select['qdrq'];
           $this->SC_log_arr['fields']['qydw']['0'] =  $nmgp_dados_select['qydw'];
           $this->SC_log_arr['fields']['qydwlxr']['0'] =  $nmgp_dados_select['qydwlxr'];
           $this->SC_log_arr['fields']['qydwlxrdh']['0'] =  $nmgp_dados_select['qydwlxrdh'];
           $this->SC_log_arr['fields']['zbj']['0'] =  $nmgp_dados_select['zbj'];
           $this->SC_log_arr['fields']['zbdqrq']['0'] =  $nmgp_dados_select['zbdqrq'];
           $this->SC_log_arr['fields']['shsj']['0'] =  $nmgp_dados_select['shsj'];
           $this->SC_log_arr['fields']['shzt']['0'] =  $nmgp_dados_select['shzt'];
           $this->SC_log_arr['fields']['ifjs']['0'] =  $nmgp_dados_select['ifjs'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['cgbbh']['1'] =  $this->cgbbh;
       $this->SC_log_arr['fields']['cgbmc']['1'] =  $this->cgbmc;
       $this->SC_log_arr['fields']['cgybh']['1'] =  $this->cgybh;
       $this->SC_log_arr['fields']['cgyxm']['1'] =  $this->cgyxm;
       $this->SC_log_arr['fields']['cgylxdh']['1'] =  $this->cgylxdh;
       $this->SC_log_arr['fields']['cgfs']['1'] =  $this->cgfs;
       $this->SC_log_arr['fields']['htmc']['1'] =  $this->htmc;
       $this->SC_log_arr['fields']['htbh']['1'] =  $this->htbh;
       $this->SC_log_arr['fields']['htlx']['1'] =  $this->htlx;
       $this->SC_log_arr['fields']['htje']['1'] =  $this->htje;
       $this->SC_log_arr['fields']['qdrq']['1'] =  $this->qdrq;
       $this->SC_log_arr['fields']['qydw']['1'] =  $this->qydw;
       $this->SC_log_arr['fields']['qydwlxr']['1'] =  $this->qydwlxr;
       $this->SC_log_arr['fields']['qydwlxrdh']['1'] =  $this->qydwlxrdh;
       $this->SC_log_arr['fields']['zbj']['1'] =  $this->zbj;
       $this->SC_log_arr['fields']['zbdqrq']['1'] =  $this->zbdqrq;
       $this->SC_log_arr['fields']['shsj']['1'] =  $this->shsj;
       $this->SC_log_arr['fields']['shzt']['1'] =  $this->shzt;
       $this->SC_log_arr['fields']['ifjs']['1'] =  $this->ifjs;
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
function cgbbh_onChange($cgfs, $cgylxdh, $cgyxm, $cgybh, $cgbmc, $cgbbh)
{
$_SESSION['scriptcase']['form_cg_htgl_mob']['contr_erro'] = 'on';
     
$original_cgbbh = $this->cgbbh;
$original_cgbmc = $this->cgbmc;
$original_cgybh = $this->cgybh;
$original_cgyxm = $this->cgyxm;
$original_cgylxdh = $this->cgylxdh;
$original_cgfs = $this->cgfs;
$original_cgfs = $this->cgfs;
$original_cgylxdh = $this->cgylxdh;
$original_cgyxm = $this->cgyxm;
$original_cgybh = $this->cgybh;
$original_cgbmc = $this->cgbmc;
$original_cgbbh = $this->cgbbh;

if(!empty($this->cgbbh ))
{
     
      $nm_select = "
select cgbbh,cgbmc,cgybh,cgyxm,cgylxdh,cgfs from  cg_cgrwfp  where cgbbh='".$this->cgbbh ."' "; 
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
    $this->cgbmc  = $this->rs[0][0];
	 $this->cgbmc  = $this->rs[0][1];
	 $this->cgybh  = $this->rs[0][2];
	 $this->cgyxm  = $this->rs[0][3];
	 $this->cgylxdh  = $this->rs[0][4];
	 $this->cgfs  = $this->rs[0][5];
}

$modificado_cgbbh = $this->cgbbh;
$modificado_cgbmc = $this->cgbmc;
$modificado_cgybh = $this->cgybh;
$modificado_cgyxm = $this->cgyxm;
$modificado_cgylxdh = $this->cgylxdh;
$modificado_cgfs = $this->cgfs;
$modificado_cgfs = $this->cgfs;
$modificado_cgylxdh = $this->cgylxdh;
$modificado_cgyxm = $this->cgyxm;
$modificado_cgybh = $this->cgybh;
$modificado_cgbmc = $this->cgbmc;
$modificado_cgbbh = $this->cgbbh;
$this->nm_formatar_campos('cgbbh', 'cgbmc', 'cgybh', 'cgyxm', 'cgylxdh', 'cgfs');
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_cgybh !== $modificado_cgybh || (isset($bFlagRead_cgybh) && $bFlagRead_cgybh))
{
    $this->ajax_return_values_cgybh(true);
}
if ($original_cgyxm !== $modificado_cgyxm || (isset($bFlagRead_cgyxm) && $bFlagRead_cgyxm))
{
    $this->ajax_return_values_cgyxm(true);
}
if ($original_cgylxdh !== $modificado_cgylxdh || (isset($bFlagRead_cgylxdh) && $bFlagRead_cgylxdh))
{
    $this->ajax_return_values_cgylxdh(true);
}
if ($original_cgfs !== $modificado_cgfs || (isset($bFlagRead_cgfs) && $bFlagRead_cgfs))
{
    $this->ajax_return_values_cgfs(true);
}
if ($original_cgfs !== $modificado_cgfs || (isset($bFlagRead_cgfs) && $bFlagRead_cgfs))
{
    $this->ajax_return_values_cgfs(true);
}
if ($original_cgylxdh !== $modificado_cgylxdh || (isset($bFlagRead_cgylxdh) && $bFlagRead_cgylxdh))
{
    $this->ajax_return_values_cgylxdh(true);
}
if ($original_cgyxm !== $modificado_cgyxm || (isset($bFlagRead_cgyxm) && $bFlagRead_cgyxm))
{
    $this->ajax_return_values_cgyxm(true);
}
if ($original_cgybh !== $modificado_cgybh || (isset($bFlagRead_cgybh) && $bFlagRead_cgybh))
{
    $this->ajax_return_values_cgybh(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
form_cg_htgl_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cg_htgl_mob']['contr_erro'] = 'off';
}
function qydw_onChange($qydwlxrdh, $qydwlxr, $qydw)
{
$_SESSION['scriptcase']['form_cg_htgl_mob']['contr_erro'] = 'on';
     
$original_qydw = $this->qydw;
$original_qydwlxr = $this->qydwlxr;
$original_qydwlxrdh = $this->qydwlxrdh;
$original_qydwlxrdh = $this->qydwlxrdh;
$original_qydwlxr = $this->qydwlxr;
$original_qydw = $this->qydw;

if(!empty($this->qydw ))
{
     
      $nm_select = "
select  lxr,lxrdh from cg_company  where gsmc='".$this->qydw ."' "; 
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
    $this->qydwlxr  = $this->rs[0][0];
	 $this->qydwlxrdh  = $this->rs[0][1];
}

$modificado_qydw = $this->qydw;
$modificado_qydwlxr = $this->qydwlxr;
$modificado_qydwlxrdh = $this->qydwlxrdh;
$modificado_qydwlxrdh = $this->qydwlxrdh;
$modificado_qydwlxr = $this->qydwlxr;
$modificado_qydw = $this->qydw;
$this->nm_formatar_campos('qydw', 'qydwlxr', 'qydwlxrdh');
if ($original_qydw !== $modificado_qydw || (isset($bFlagRead_qydw) && $bFlagRead_qydw))
{
    $this->ajax_return_values_qydw(true);
}
if ($original_qydwlxr !== $modificado_qydwlxr || (isset($bFlagRead_qydwlxr) && $bFlagRead_qydwlxr))
{
    $this->ajax_return_values_qydwlxr(true);
}
if ($original_qydwlxrdh !== $modificado_qydwlxrdh || (isset($bFlagRead_qydwlxrdh) && $bFlagRead_qydwlxrdh))
{
    $this->ajax_return_values_qydwlxrdh(true);
}
if ($original_qydwlxrdh !== $modificado_qydwlxrdh || (isset($bFlagRead_qydwlxrdh) && $bFlagRead_qydwlxrdh))
{
    $this->ajax_return_values_qydwlxrdh(true);
}
if ($original_qydwlxr !== $modificado_qydwlxr || (isset($bFlagRead_qydwlxr) && $bFlagRead_qydwlxr))
{
    $this->ajax_return_values_qydwlxr(true);
}
if ($original_qydw !== $modificado_qydw || (isset($bFlagRead_qydw) && $bFlagRead_qydw))
{
    $this->ajax_return_values_qydw(true);
}
form_cg_htgl_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cg_htgl_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cg_htgl_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_cg_htgl_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cg_htgl_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "cgybh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgyxm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgylxdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgfs", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_htlx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "htlx", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htje", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "qdrq", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydwlxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydwlxrdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zbj", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "zbdqrq", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "shsj", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "shzt", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ifjs", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "cgybh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgyxm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgylxdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cgfs", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_htlx($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "htlx", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "htje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydwlxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qydwlxrdh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zbj", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cg_htgl_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['total'] = $qt_geral_reg_form_cg_htgl_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_htgl_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_htgl_mob_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "htje";$nm_numeric[] = "zbj";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['decimal_db'] == ".")
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
      $Nm_datas['qdrq'] = "date";$Nm_datas['zbdqrq'] = "date";$Nm_datas['shsj'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['SC_sep_date1'];
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
   function SC_lookup_htlx($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_htlx WHERE (mc LIKE '%$campo%')" ; 
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_cg_htgl_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cg_htgl_mob_fim.php";
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
       form_cg_htgl_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_htgl_mob']['masterValue']);
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
