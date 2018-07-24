<?php
//
class form_cg_xmzjk_auto_apl
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
   var $zbggbh;
   var $cgbbh;
   var $cgbmc;
   var $zjbh;
   var $xm;
   var $xb;
   var $sfzh;
   var $gzdw;
   var $zy;
   var $work;
   var $zc;
   var $yddh;
   var $email;
   var $pc;
   var $dlr;
   var $dlsj;
   var $dlsj_hora;
   var $xmzjk;
   var $zjrs;
   var $cgfs;
   var $isneed;
   var $isauto;
   var $zdrs;
   var $zsrs;
   var $xzcs;
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
          if (isset($this->NM_ajax_info['param']['cgfs']))
          {
              $this->cgfs = $this->NM_ajax_info['param']['cgfs'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['gzdw']))
          {
              $this->gzdw = $this->NM_ajax_info['param']['gzdw'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['isauto']))
          {
              $this->isauto = $this->NM_ajax_info['param']['isauto'];
          }
          if (isset($this->NM_ajax_info['param']['isneed']))
          {
              $this->isneed = $this->NM_ajax_info['param']['isneed'];
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
          if (isset($this->NM_ajax_info['param']['pc']))
          {
              $this->pc = $this->NM_ajax_info['param']['pc'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sfzh']))
          {
              $this->sfzh = $this->NM_ajax_info['param']['sfzh'];
          }
          if (isset($this->NM_ajax_info['param']['work']))
          {
              $this->work = $this->NM_ajax_info['param']['work'];
          }
          if (isset($this->NM_ajax_info['param']['xb']))
          {
              $this->xb = $this->NM_ajax_info['param']['xb'];
          }
          if (isset($this->NM_ajax_info['param']['xm']))
          {
              $this->xm = $this->NM_ajax_info['param']['xm'];
          }
          if (isset($this->NM_ajax_info['param']['xmzjk']))
          {
              $this->xmzjk = $this->NM_ajax_info['param']['xmzjk'];
          }
          if (isset($this->NM_ajax_info['param']['xzcs']))
          {
              $this->xzcs = $this->NM_ajax_info['param']['xzcs'];
          }
          if (isset($this->NM_ajax_info['param']['yddh']))
          {
              $this->yddh = $this->NM_ajax_info['param']['yddh'];
          }
          if (isset($this->NM_ajax_info['param']['zbggbh']))
          {
              $this->zbggbh = $this->NM_ajax_info['param']['zbggbh'];
          }
          if (isset($this->NM_ajax_info['param']['zc']))
          {
              $this->zc = $this->NM_ajax_info['param']['zc'];
          }
          if (isset($this->NM_ajax_info['param']['zdrs']))
          {
              $this->zdrs = $this->NM_ajax_info['param']['zdrs'];
          }
          if (isset($this->NM_ajax_info['param']['zjbh']))
          {
              $this->zjbh = $this->NM_ajax_info['param']['zjbh'];
          }
          if (isset($this->NM_ajax_info['param']['zjrs']))
          {
              $this->zjrs = $this->NM_ajax_info['param']['zjrs'];
          }
          if (isset($this->NM_ajax_info['param']['zsrs']))
          {
              $this->zsrs = $this->NM_ajax_info['param']['zsrs'];
          }
          if (isset($this->NM_ajax_info['param']['zy']))
          {
              $this->zy = $this->NM_ajax_info['param']['zy'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['embutida_parms']);
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
                 nm_limpa_str_form_cg_xmzjk_auto($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cg_xmzjk_auto_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("zh_cn");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("zh_cn");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cg_xmzjk_auto']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_xmzjk_auto']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_xmzjk_auto'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_xmzjk_auto']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_xmzjk_auto']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cg_xmzjk_auto') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_xmzjk_auto']['label'] = "评标专家库自动生成";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cg_xmzjk_auto")
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
      $this->nm_new_label['zbggbh'] = '' . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . '';
      $this->nm_new_label['cgbbh'] = '' . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . '';
      $this->nm_new_label['cgbmc'] = '' . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . '';
      $this->nm_new_label['pc'] = '' . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . '';

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



      $_SESSION['scriptcase']['error_icon']['form_cg_xmzjk_auto']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cg_xmzjk_auto'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_xmzjk_auto']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->zjbh)){$this->zjbh = $this->nmgp_dados_form['zjbh'];} 
          if (!isset($this->xm)){$this->xm = $this->nmgp_dados_form['xm'];} 
          if (!isset($this->xb)){$this->xb = $this->nmgp_dados_form['xb'];} 
          if (!isset($this->sfzh)){$this->sfzh = $this->nmgp_dados_form['sfzh'];} 
          if (!isset($this->gzdw)){$this->gzdw = $this->nmgp_dados_form['gzdw'];} 
          if (!isset($this->zy)){$this->zy = $this->nmgp_dados_form['zy'];} 
          if (!isset($this->work)){$this->work = $this->nmgp_dados_form['work'];} 
          if (!isset($this->zc)){$this->zc = $this->nmgp_dados_form['zc'];} 
          if (!isset($this->yddh)){$this->yddh = $this->nmgp_dados_form['yddh'];} 
          if (!isset($this->email)){$this->email = $this->nmgp_dados_form['email'];} 
          if (!isset($this->dlr)){$this->dlr = $this->nmgp_dados_form['dlr'];} 
          if (!isset($this->dlsj)){$this->dlsj = $this->nmgp_dados_form['dlsj'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cg_xmzjk_auto", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_cg_xmzjk_auto_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cg_xmzjk_auto_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cg_xmzjk_auto/form_cg_xmzjk_auto_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cg_xmzjk_auto_erro.class.php"); 
      }
      $this->Erro      = new form_cg_xmzjk_auto_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_xmzjk_auto']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
      }
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->zbggbh)) { $this->nm_limpa_alfa($this->zbggbh); }
      if (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
      if (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
      if (isset($this->pc)) { $this->nm_limpa_alfa($this->pc); }
      if (isset($this->xmzjk)) { $this->nm_limpa_alfa($this->xmzjk); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- zbggbh
      $this->field_config['zbggbh']               = array();
      $this->field_config['zbggbh']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['zbggbh']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['zbggbh']['symbol_dec'] = '';
      $this->field_config['zbggbh']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['zbggbh']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- zjrs
      $this->field_config['zjrs']               = array();
      $this->field_config['zjrs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['zjrs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['zjrs']['symbol_dec'] = '';
      $this->field_config['zjrs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['zjrs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pc
      $this->field_config['pc']               = array();
      $this->field_config['pc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pc']['symbol_dec'] = '';
      $this->field_config['pc']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- zdrs
      $this->field_config['zdrs']               = array();
      $this->field_config['zdrs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['zdrs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['zdrs']['symbol_dec'] = '';
      $this->field_config['zdrs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['zdrs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- zsrs
      $this->field_config['zsrs']               = array();
      $this->field_config['zsrs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['zsrs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['zsrs']['symbol_dec'] = '';
      $this->field_config['zsrs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['zsrs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- xzcs
      $this->field_config['xzcs']               = array();
      $this->field_config['xzcs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['xzcs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['xzcs']['symbol_dec'] = '';
      $this->field_config['xzcs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['xzcs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['Gera_log_access'] = false;
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
          if ('validate_zbggbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zbggbh');
          }
          if ('validate_cgbbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbbh');
          }
          if ('validate_cgbmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgbmc');
          }
          if ('validate_zjrs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zjrs');
          }
          if ('validate_pc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pc');
          }
          if ('validate_cgfs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgfs');
          }
          if ('validate_isneed' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'isneed');
          }
          if ('validate_isauto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'isauto');
          }
          if ('validate_zdrs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zdrs');
          }
          if ('validate_zsrs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zsrs');
          }
          if ('validate_xzcs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'xzcs');
          }
          if ('validate_xmzjk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'xmzjk');
          }
          form_cg_xmzjk_auto_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_zbggbh_onchange' == $this->NM_ajax_opcao)
          {
              $this->zbggbh_onChange();
          }
          if ('event_zjbh_onchange' == $this->NM_ajax_opcao)
          {
              $this->zjbh_onChange();
          }
          form_cg_xmzjk_auto_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_cg_xmzjk_auto_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cg_xmzjk_auto_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_atualiz'] == "ok")
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
          form_cg_xmzjk_auto_pack_ajax_response();
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
          form_cg_xmzjk_auto_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_cg_xmzjk_auto', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_cg_xmzjk_auto', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_cg_xmzjk_auto_pack_ajax_response();
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
           case 'zbggbh':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . "";
               break;
           case 'cgbbh':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . "";
               break;
           case 'cgbmc':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . "";
               break;
           case 'zjrs':
               return "专家人数";
               break;
           case 'pc':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "";
               break;
           case 'cgfs':
               return "采购方式";
               break;
           case 'isneed':
               return "是否需要专家组";
               break;
           case 'isauto':
               return "是否随机筛选";
               break;
           case 'zdrs':
               return "最多人数";
               break;
           case 'zsrs':
               return "最少人数";
               break;
           case 'xzcs':
               return "筛选次数限制";
               break;
           case 'xmzjk':
               return "项目专家库";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_id'] . "";
               break;
           case 'zjbh':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zjbh'] . "";
               break;
           case 'xm':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xm'] . "";
               break;
           case 'xb':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_xb'] . "";
               break;
           case 'sfzh':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_sfzh'] . "";
               break;
           case 'gzdw':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_gzdw'] . "";
               break;
           case 'zy':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zy'] . "";
               break;
           case 'work':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_work'] . "";
               break;
           case 'zc':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zc'] . "";
               break;
           case 'yddh':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_yddh'] . "";
               break;
           case 'email':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_email'] . "";
               break;
           case 'dlr':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlr'] . "";
               break;
           case 'dlsj':
               return "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_dlsj'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cg_xmzjk_auto']) || !is_array($this->NM_ajax_info['errList']['geral_form_cg_xmzjk_auto']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cg_xmzjk_auto'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cg_xmzjk_auto'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'zbggbh' == $filtro)
        $this->ValidateField_zbggbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgbbh' == $filtro)
        $this->ValidateField_cgbbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgbmc' == $filtro)
        $this->ValidateField_cgbmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zjrs' == $filtro)
        $this->ValidateField_zjrs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pc' == $filtro)
        $this->ValidateField_pc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgfs' == $filtro)
        $this->ValidateField_cgfs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'isneed' == $filtro)
        $this->ValidateField_isneed($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'isauto' == $filtro)
        $this->ValidateField_isauto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zdrs' == $filtro)
        $this->ValidateField_zdrs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zsrs' == $filtro)
        $this->ValidateField_zsrs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'xzcs' == $filtro)
        $this->ValidateField_xzcs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'xmzjk' == $filtro)
        $this->ValidateField_xmzjk($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_isauto = $this->isauto;
    $original_isneed = $this->isneed;
    $original_pc = $this->pc;
    $original_xzcs = $this->xzcs;
    $original_zdrs = $this->zdrs;
    $original_zjrs = $this->zjrs;
    $original_zsrs = $this->zsrs;
}
     if($this->isneed !='是')
{
  
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "采购方式无需项目评标专家!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cg_xmzjk_auto' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "采购方式无需项目评标专家!";
 }
;	
}

if($this->isauto !='是')
{
  
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "项目评标专家无需自动生成!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cg_xmzjk_auto' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "项目评标专家无需自动生成!";
 }
;	
}



if($this->pc >$this->xzcs )
{
  
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "生成批次超过限制次数要求!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cg_xmzjk_auto' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "生成批次超过限制次数要求!";
 }
;	
}

if($this->zjrs >$this->zdrs )
{
  
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "专家人数超过最大人数要求!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cg_xmzjk_auto' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "专家人数超过最大人数要求!";
 }
;	
}

if($this->zjrs < $this->zsrs )
{
  
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "专家人数低于最少人数要求!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cg_xmzjk_auto' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "专家人数低于最少人数要求!";
 }
;	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_isauto != $this->isauto || (isset($bFlagRead_isauto) && $bFlagRead_isauto)))
    {
        $this->ajax_return_values_isauto(true);
    }
    if (($original_isneed != $this->isneed || (isset($bFlagRead_isneed) && $bFlagRead_isneed)))
    {
        $this->ajax_return_values_isneed(true);
    }
    if (($original_pc != $this->pc || (isset($bFlagRead_pc) && $bFlagRead_pc)))
    {
        $this->ajax_return_values_pc(true);
    }
    if (($original_xzcs != $this->xzcs || (isset($bFlagRead_xzcs) && $bFlagRead_xzcs)))
    {
        $this->ajax_return_values_xzcs(true);
    }
    if (($original_zdrs != $this->zdrs || (isset($bFlagRead_zdrs) && $bFlagRead_zdrs)))
    {
        $this->ajax_return_values_zdrs(true);
    }
    if (($original_zjrs != $this->zjrs || (isset($bFlagRead_zjrs) && $bFlagRead_zjrs)))
    {
        $this->ajax_return_values_zjrs(true);
    }
    if (($original_zsrs != $this->zsrs || (isset($bFlagRead_zsrs) && $bFlagRead_zsrs)))
    {
        $this->ajax_return_values_zsrs(true);
    }
}
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off'; 
      }
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

    function ValidateField_zbggbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->zbggbh, $this->field_config['zbggbh']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->zbggbh != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->zbggbh) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['zbggbh']))
                  {
                      $Campos_Erros['zbggbh'] = array();
                  }
                  $Campos_Erros['zbggbh'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['zbggbh']) || !is_array($this->NM_ajax_info['errList']['zbggbh']))
                  {
                      $this->NM_ajax_info['errList']['zbggbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbggbh'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->zbggbh, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . "; " ; 
                  if (!isset($Campos_Erros['zbggbh']))
                  {
                      $Campos_Erros['zbggbh'] = array();
                  }
                  $Campos_Erros['zbggbh'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['zbggbh']) || !is_array($this->NM_ajax_info['errList']['zbggbh']))
                  {
                      $this->NM_ajax_info['errList']['zbggbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbggbh'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['zbggbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['zbggbh'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_zbggbh'] . "" ; 
              if (!isset($Campos_Erros['zbggbh']))
              {
                  $Campos_Erros['zbggbh'] = array();
              }
              $Campos_Erros['zbggbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['zbggbh']) || !is_array($this->NM_ajax_info['errList']['zbggbh']))
                  {
                      $this->NM_ajax_info['errList']['zbggbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['zbggbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_zbggbh

    function ValidateField_cgbbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['cgbbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['cgbbh'] == "on")) 
      { 
          if ($this->cgbbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['cgbmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['cgbmc'] == "on")) 
      { 
          if ($this->cgbmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . "" ; 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_cgbmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_zjrs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->zjrs, $this->field_config['zjrs']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->zjrs != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->zjrs, 0, 1))
              {
                  $iTestSize++;
              }
              if (strlen($this->zjrs) > $iTestSize)  
              { 
                  $Campos_Crit .= "专家人数: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['zjrs']))
                  {
                      $Campos_Erros['zjrs'] = array();
                  }
                  $Campos_Erros['zjrs'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['zjrs']) || !is_array($this->NM_ajax_info['errList']['zjrs']))
                  {
                      $this->NM_ajax_info['errList']['zjrs'] = array();
                  }
                  $this->NM_ajax_info['errList']['zjrs'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->zjrs, 20, 0, 0, 0, "S") == false)  
              { 
                  $Campos_Crit .= "专家人数; " ; 
                  if (!isset($Campos_Erros['zjrs']))
                  {
                      $Campos_Erros['zjrs'] = array();
                  }
                  $Campos_Erros['zjrs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['zjrs']) || !is_array($this->NM_ajax_info['errList']['zjrs']))
                  {
                      $this->NM_ajax_info['errList']['zjrs'] = array();
                  }
                  $this->NM_ajax_info['errList']['zjrs'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['zjrs']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['zjrs'] == "on") 
           { 
              $Campos_Falta[] = "专家人数" ; 
              if (!isset($Campos_Erros['zjrs']))
              {
                  $Campos_Erros['zjrs'] = array();
              }
              $Campos_Erros['zjrs'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['zjrs']) || !is_array($this->NM_ajax_info['errList']['zjrs']))
                  {
                      $this->NM_ajax_info['errList']['zjrs'] = array();
                  }
                  $this->NM_ajax_info['errList']['zjrs'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_zjrs

    function ValidateField_pc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->pc, $this->field_config['pc']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pc != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->pc) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pc']))
                  {
                      $Campos_Erros['pc'] = array();
                  }
                  $Campos_Erros['pc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pc']) || !is_array($this->NM_ajax_info['errList']['pc']))
                  {
                      $this->NM_ajax_info['errList']['pc'] = array();
                  }
                  $this->NM_ajax_info['errList']['pc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pc, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "; " ; 
                  if (!isset($Campos_Erros['pc']))
                  {
                      $Campos_Erros['pc'] = array();
                  }
                  $Campos_Erros['pc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pc']) || !is_array($this->NM_ajax_info['errList']['pc']))
                  {
                      $this->NM_ajax_info['errList']['pc'] = array();
                  }
                  $this->NM_ajax_info['errList']['pc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['pc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['php_cmp_required']['pc'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_xmzjk_fld_pc'] . "" ; 
              if (!isset($Campos_Erros['pc']))
              {
                  $Campos_Erros['pc'] = array();
              }
              $Campos_Erros['pc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['pc']) || !is_array($this->NM_ajax_info['errList']['pc']))
                  {
                      $this->NM_ajax_info['errList']['pc'] = array();
                  }
                  $this->NM_ajax_info['errList']['pc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_pc

    function ValidateField_cgfs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cgfs) != "")  
          { 
          } 
      } 
    } // ValidateField_cgfs

    function ValidateField_isneed(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->isneed) != "")  
          { 
          } 
      } 
    } // ValidateField_isneed

    function ValidateField_isauto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->isauto) != "")  
          { 
          } 
      } 
    } // ValidateField_isauto

    function ValidateField_zdrs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->zdrs) != "")  
          { 
          } 
      } 
    } // ValidateField_zdrs

    function ValidateField_zsrs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->zsrs) != "")  
          { 
          } 
      } 
    } // ValidateField_zsrs

    function ValidateField_xzcs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->xzcs) != "")  
          { 
          } 
      } 
    } // ValidateField_xzcs

    function ValidateField_xmzjk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->xmzjk) != "")  
          { 
          } 
      } 
    } // ValidateField_xmzjk

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
    $this->nmgp_dados_form['zbggbh'] = $this->zbggbh;
    $this->nmgp_dados_form['cgbbh'] = $this->cgbbh;
    $this->nmgp_dados_form['cgbmc'] = $this->cgbmc;
    $this->nmgp_dados_form['zjrs'] = $this->zjrs;
    $this->nmgp_dados_form['pc'] = $this->pc;
    $this->nmgp_dados_form['cgfs'] = $this->cgfs;
    $this->nmgp_dados_form['isneed'] = $this->isneed;
    $this->nmgp_dados_form['isauto'] = $this->isauto;
    $this->nmgp_dados_form['zdrs'] = $this->zdrs;
    $this->nmgp_dados_form['zsrs'] = $this->zsrs;
    $this->nmgp_dados_form['xzcs'] = $this->xzcs;
    $this->nmgp_dados_form['xmzjk'] = $this->xmzjk;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['zjbh'] = $this->zjbh;
    $this->nmgp_dados_form['xm'] = $this->xm;
    $this->nmgp_dados_form['xb'] = $this->xb;
    $this->nmgp_dados_form['sfzh'] = $this->sfzh;
    $this->nmgp_dados_form['gzdw'] = $this->gzdw;
    $this->nmgp_dados_form['zy'] = $this->zy;
    $this->nmgp_dados_form['work'] = $this->work;
    $this->nmgp_dados_form['zc'] = $this->zc;
    $this->nmgp_dados_form['yddh'] = $this->yddh;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['dlr'] = $this->dlr;
    $this->nmgp_dados_form['dlsj'] = $this->dlsj;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->zbggbh, $this->field_config['zbggbh']['symbol_grp']) ; 
      nm_limpa_numero($this->zjrs, $this->field_config['zjrs']['symbol_grp']) ; 
      nm_limpa_numero($this->pc, $this->field_config['pc']['symbol_grp']) ; 
      nm_limpa_numero($this->zdrs, $this->field_config['zdrs']['symbol_grp']) ; 
      nm_limpa_numero($this->zsrs, $this->field_config['zsrs']['symbol_grp']) ; 
      nm_limpa_numero($this->xzcs, $this->field_config['xzcs']['symbol_grp']) ; 
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
      if ($Nome_Campo == "zbggbh")
      {
          nm_limpa_numero($this->zbggbh, $this->field_config['zbggbh']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "zjrs")
      {
          nm_limpa_numero($this->zjrs, $this->field_config['zjrs']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pc")
      {
          nm_limpa_numero($this->pc, $this->field_config['pc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "zdrs")
      {
          nm_limpa_numero($this->zdrs, $this->field_config['zdrs']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "zsrs")
      {
          nm_limpa_numero($this->zsrs, $this->field_config['zsrs']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "xzcs")
      {
          nm_limpa_numero($this->xzcs, $this->field_config['xzcs']['symbol_grp']) ; 
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
      if (!empty($this->zbggbh) || (!empty($format_fields) && isset($format_fields['zbggbh'])))
      {
          nmgp_Form_Num_Val($this->zbggbh, $this->field_config['zbggbh']['symbol_grp'], $this->field_config['zbggbh']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['zbggbh']['symbol_fmt']) ; 
      }
      if (!empty($this->zjrs) || (!empty($format_fields) && isset($format_fields['zjrs'])))
      {
          nmgp_Form_Num_Val($this->zjrs, $this->field_config['zjrs']['symbol_grp'], $this->field_config['zjrs']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['zjrs']['symbol_fmt']) ; 
      }
      if (!empty($this->pc) || (!empty($format_fields) && isset($format_fields['pc'])))
      {
          nmgp_Form_Num_Val($this->pc, $this->field_config['pc']['symbol_grp'], $this->field_config['pc']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['pc']['symbol_fmt']) ; 
      }
      if (!empty($this->zdrs) || (!empty($format_fields) && isset($format_fields['zdrs'])))
      {
          nmgp_Form_Num_Val($this->zdrs, $this->field_config['zdrs']['symbol_grp'], $this->field_config['zdrs']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['zdrs']['symbol_fmt']) ; 
      }
      if (!empty($this->zsrs) || (!empty($format_fields) && isset($format_fields['zsrs'])))
      {
          nmgp_Form_Num_Val($this->zsrs, $this->field_config['zsrs']['symbol_grp'], $this->field_config['zsrs']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['zsrs']['symbol_fmt']) ; 
      }
      if (!empty($this->xzcs) || (!empty($format_fields) && isset($format_fields['xzcs'])))
      {
          nmgp_Form_Num_Val($this->xzcs, $this->field_config['xzcs']['symbol_grp'], $this->field_config['xzcs']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['xzcs']['symbol_fmt']) ; 
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
          $this->ajax_return_values_zbggbh();
          $this->ajax_return_values_cgbbh();
          $this->ajax_return_values_cgbmc();
          $this->ajax_return_values_zjrs();
          $this->ajax_return_values_pc();
          $this->ajax_return_values_cgfs();
          $this->ajax_return_values_isneed();
          $this->ajax_return_values_isauto();
          $this->ajax_return_values_zdrs();
          $this->ajax_return_values_zsrs();
          $this->ajax_return_values_xzcs();
          $this->ajax_return_values_xmzjk();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_cg_xmzjk_auto_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['embutida_form_full'] = false;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['embutida_form']       = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['embutida_pai']        = "form_cg_xmzjk_auto";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['embutida_form_parms'] = "v_zbggbh?#?" . $this->nmgp_dados_form['zbggbh'] . "?@?NMSC_inicial?#?inicio?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['reg_start'] = "";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['total']);
          }
   } // ajax_return_values

          //----- zbggbh
   function ajax_return_values_zbggbh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zbggbh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zbggbh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zbggbh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
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

          //----- zjrs
   function ajax_return_values_zjrs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zjrs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zjrs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zjrs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pc
   function ajax_return_values_pc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- isneed
   function ajax_return_values_isneed($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("isneed", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->isneed);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['isneed'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- isauto
   function ajax_return_values_isauto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("isauto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->isauto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['isauto'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- zdrs
   function ajax_return_values_zdrs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zdrs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zdrs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zdrs'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- zsrs
   function ajax_return_values_zsrs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zsrs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zsrs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zsrs'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- xzcs
   function ajax_return_values_xzcs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("xzcs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->xzcs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['xzcs'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- xmzjk
   function ajax_return_values_xmzjk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("xmzjk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->xmzjk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['xmzjk'] = array(
                       'row'    => '',
               'type'    => 'text',
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["xmzjk"]))
          {
              $this->nmgp_cmp_hidden["xmzjk"] = "off"; $this->NM_ajax_info['fieldDisplay']['xmzjk'] = 'off';
          }
      }
      else
      {
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']))
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] = $rsc->fields[0];
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opcao'] = '';

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
      if ('incluir' == $this->nmgp_opcao && empty($this->dlr)) {$this->dlr = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "dlr";}  
      $NM_val_form['zbggbh'] = $this->zbggbh;
      $NM_val_form['cgbbh'] = $this->cgbbh;
      $NM_val_form['cgbmc'] = $this->cgbmc;
      $NM_val_form['zjrs'] = $this->zjrs;
      $NM_val_form['pc'] = $this->pc;
      $NM_val_form['cgfs'] = $this->cgfs;
      $NM_val_form['isneed'] = $this->isneed;
      $NM_val_form['isauto'] = $this->isauto;
      $NM_val_form['zdrs'] = $this->zdrs;
      $NM_val_form['zsrs'] = $this->zsrs;
      $NM_val_form['xzcs'] = $this->xzcs;
      $NM_val_form['xmzjk'] = $this->xmzjk;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['zjbh'] = $this->zjbh;
      $NM_val_form['xm'] = $this->xm;
      $NM_val_form['xb'] = $this->xb;
      $NM_val_form['sfzh'] = $this->sfzh;
      $NM_val_form['gzdw'] = $this->gzdw;
      $NM_val_form['zy'] = $this->zy;
      $NM_val_form['work'] = $this->work;
      $NM_val_form['zc'] = $this->zc;
      $NM_val_form['yddh'] = $this->yddh;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['dlr'] = $this->dlr;
      $NM_val_form['dlsj'] = $this->dlsj;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->zbggbh == "")  
      { 
          $this->zbggbh = 0;
          $this->sc_force_zero[] = 'zbggbh';
      } 
      if ($this->pc == "")  
      { 
          $this->pc = 0;
          $this->sc_force_zero[] = 'pc';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cgbbh_before_qstr = $this->cgbbh;
          $this->cgbbh = substr($this->Db->qstr($this->cgbbh), 1, -1); 
          $this->cgbmc_before_qstr = $this->cgbmc;
          $this->cgbmc = substr($this->Db->qstr($this->cgbmc), 1, -1); 
          $this->zjbh_before_qstr = $this->zjbh;
          $this->zjbh = substr($this->Db->qstr($this->zjbh), 1, -1); 
          $this->xm_before_qstr = $this->xm;
          $this->xm = substr($this->Db->qstr($this->xm), 1, -1); 
          $this->xb_before_qstr = $this->xb;
          $this->xb = substr($this->Db->qstr($this->xb), 1, -1); 
          $this->sfzh_before_qstr = $this->sfzh;
          $this->sfzh = substr($this->Db->qstr($this->sfzh), 1, -1); 
          $this->gzdw_before_qstr = $this->gzdw;
          $this->gzdw = substr($this->Db->qstr($this->gzdw), 1, -1); 
          $this->zy_before_qstr = $this->zy;
          $this->zy = substr($this->Db->qstr($this->zy), 1, -1); 
          $this->work_before_qstr = $this->work;
          $this->work = substr($this->Db->qstr($this->work), 1, -1); 
          $this->zc_before_qstr = $this->zc;
          $this->zc = substr($this->Db->qstr($this->zc), 1, -1); 
          $this->yddh_before_qstr = $this->yddh;
          $this->yddh = substr($this->Db->qstr($this->yddh), 1, -1); 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          $this->dlr_before_qstr = $this->dlr;
          $this->dlr = substr($this->Db->qstr($this->dlr), 1, -1); 
          if ($this->dlsj == "")  
          { 
              $this->dlsj = "null"; 
              $NM_val_null[] = "dlsj";
          } 
          $this->xmzjk_before_qstr = $this->xmzjk;
          $this->xmzjk = substr($this->Db->qstr($this->xmzjk), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_cg_xmzjk_auto_pack_ajax_response();
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
              $this->dlsj =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->dlsj_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['dlsj'] = $this->dlsj;
              $this->NM_ajax_changed['dlsj'] = true;
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET zbggbh = $this->zbggbh, cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', pc = $this->pc";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET zbggbh = $this->zbggbh, cgbbh = '$this->cgbbh', cgbmc = '$this->cgbmc', pc = $this->pc";  
              } 
              if (isset($NM_val_form['zjbh']) && $NM_val_form['zjbh'] != $this->nmgp_dados_select['zjbh']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " zjbh = '$this->zjbh'"; 
                  $comando_oracle        .= " zjbh = '$this->zjbh'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['xm']) && $NM_val_form['xm'] != $this->nmgp_dados_select['xm']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " xm = '$this->xm'"; 
                  $comando_oracle        .= " xm = '$this->xm'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['xb']) && $NM_val_form['xb'] != $this->nmgp_dados_select['xb']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " xb = '$this->xb'"; 
                  $comando_oracle        .= " xb = '$this->xb'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['sfzh']) && $NM_val_form['sfzh'] != $this->nmgp_dados_select['sfzh']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " sfzh = '$this->sfzh'"; 
                  $comando_oracle        .= " sfzh = '$this->sfzh'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['gzdw']) && $NM_val_form['gzdw'] != $this->nmgp_dados_select['gzdw']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " gzdw = '$this->gzdw'"; 
                  $comando_oracle        .= " gzdw = '$this->gzdw'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['zy']) && $NM_val_form['zy'] != $this->nmgp_dados_select['zy']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " zy = '$this->zy'"; 
                  $comando_oracle        .= " zy = '$this->zy'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['work']) && $NM_val_form['work'] != $this->nmgp_dados_select['work']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " work = '$this->work'"; 
                  $comando_oracle        .= " work = '$this->work'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['zc']) && $NM_val_form['zc'] != $this->nmgp_dados_select['zc']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " zc = '$this->zc'"; 
                  $comando_oracle        .= " zc = '$this->zc'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['yddh']) && $NM_val_form['yddh'] != $this->nmgp_dados_select['yddh']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " yddh = '$this->yddh'"; 
                  $comando_oracle        .= " yddh = '$this->yddh'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['email']) && $NM_val_form['email'] != $this->nmgp_dados_select['email']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " email = '$this->email'"; 
                  $comando_oracle        .= " email = '$this->email'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
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
                                  form_cg_xmzjk_auto_pack_ajax_response();
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
          $this->zjbh = $this->zjbh_before_qstr;
          $this->xm = $this->xm_before_qstr;
          $this->xb = $this->xb_before_qstr;
          $this->sfzh = $this->sfzh_before_qstr;
          $this->gzdw = $this->gzdw_before_qstr;
          $this->zy = $this->zy_before_qstr;
          $this->work = $this->work_before_qstr;
          $this->zc = $this->zc_before_qstr;
          $this->yddh = $this->yddh_before_qstr;
          $this->email = $this->email_before_qstr;
          $this->dlr = $this->dlr_before_qstr;
          $this->xmzjk = $this->xmzjk_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['zbggbh'])) { $this->zbggbh = $NM_val_form['zbggbh']; }
              elseif (isset($this->zbggbh)) { $this->nm_limpa_alfa($this->zbggbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgbbh'])) { $this->cgbbh = $NM_val_form['cgbbh']; }
              elseif (isset($this->cgbbh)) { $this->nm_limpa_alfa($this->cgbbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgbmc'])) { $this->cgbmc = $NM_val_form['cgbmc']; }
              elseif (isset($this->cgbmc)) { $this->nm_limpa_alfa($this->cgbmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['pc'])) { $this->pc = $NM_val_form['pc']; }
              elseif (isset($this->pc)) { $this->nm_limpa_alfa($this->pc); }
              if     (isset($NM_val_form) && isset($NM_val_form['xmzjk'])) { $this->xmzjk = $NM_val_form['xmzjk']; }
              elseif (isset($this->xmzjk)) { $this->nm_limpa_alfa($this->xmzjk); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('zbggbh', 'cgbbh', 'cgbmc', 'zjrs', 'pc', 'cgfs', 'isneed', 'isauto', 'zdrs', 'zsrs', 'xzcs', 'xmzjk'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
              $this->dlsj =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->dlsj_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cg_xmzjk_auto_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "zbggbh, cgbbh, cgbmc, zjbh, xm, xb, sfzh, gzdw, zy, work, zc, yddh, email, pc, dlr, dlsj) VALUES (" . $NM_seq_auto . "$this->zbggbh, '$this->cgbbh', '$this->cgbmc', '$this->zjbh', '$this->xm', '$this->xb', '$this->sfzh', '$this->gzdw', '$this->zy', '$this->work', '$this->zc', '$this->yddh', '$this->email', $this->pc, '$this->dlr', " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "zbggbh, cgbbh, cgbmc, zjbh, xm, xb, sfzh, gzdw, zy, work, zc, yddh, email, pc, dlr, dlsj) VALUES (" . $NM_seq_auto . "$this->zbggbh, '$this->cgbbh', '$this->cgbmc', '$this->zjbh', '$this->xm', '$this->xb', '$this->sfzh', '$this->gzdw', '$this->zy', '$this->work', '$this->zc', '$this->yddh', '$this->email', $this->pc, '$this->dlr', " . $this->Ini->date_delim . $this->dlsj . $this->Ini->date_delim1 . ")"; 
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
                              form_cg_xmzjk_auto_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
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
                          form_cg_xmzjk_auto_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']);
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
        $_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cgbbh = $this->cgbbh;
    $original_cgbmc = $this->cgbmc;
    $original_pc = $this->pc;
    $original_zbggbh = $this->zbggbh;
    $original_zjrs = $this->zjrs;
}
     $sql  = "delete  from cg_xmzjk where zbggbh='".$this->zbggbh ."' and id<>'".$this->id ."'";

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$sql  = "update  cg_xmzjk 
left join 
(SELECT   zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email   FROM cg_zjk 
WHERE kyzt='是'  ORDER BY RAND()  LIMIT 1)  a  on 1=1
set  cg_xmzjk.zjbh= a.zjbh,cg_xmzjk.xm=a.xm,cg_xmzjk.xb=a.xb,
cg_xmzjk.sfzh=a.sfzh,
cg_xmzjk.gzdw=a.gzdw,
cg_xmzjk.zy=a.zy,
cg_xmzjk.work=a.work,
cg_xmzjk.zc=a.zc,
cg_xmzjk.yddh=a.yddh,
cg_xmzjk.email=a.email  
     where  cg_xmzjk.id='".$this->id ."'";

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;



	
$limit=	$this->zjrs -1;
$sql  = "insert into cg_xmzjk(zbggbh,cgbbh,cgbmc,zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email,pc,dlr,dlsj)
SELECT   '".$this->zbggbh ."' as  zbggbh,'".$this->cgbbh ."' as cgbbh,'".$this->cgbmc ."' as cgbmc, zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email ,'".$this->pc ."' as pc,'".$this->dlr ."' as dlr,NOW() as dlsj  FROM cg_zjk 
WHERE kyzt='是' 
AND NOT EXISTS(SELECT  cg_xmzjk.zjbh from cg_xmzjk where cg_xmzjk.zbggbh='".$this->zbggbh ."' and cg_xmzjk.zjbh=cg_zjk.zjbh)
 ORDER BY RAND()  LIMIT ".$limit;

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cgbbh != $this->cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh)))
    {
        $this->ajax_return_values_cgbbh(true);
    }
    if (($original_cgbmc != $this->cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc)))
    {
        $this->ajax_return_values_cgbmc(true);
    }
    if (($original_pc != $this->pc || (isset($bFlagRead_pc) && $bFlagRead_pc)))
    {
        $this->ajax_return_values_pc(true);
    }
    if (($original_zbggbh != $this->zbggbh || (isset($bFlagRead_zbggbh) && $bFlagRead_zbggbh)))
    {
        $this->ajax_return_values_zbggbh(true);
    }
    if (($original_zjrs != $this->zjrs || (isset($bFlagRead_zjrs) && $bFlagRead_zjrs)))
    {
        $this->ajax_return_values_zjrs(true);
    }
}
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cgbbh = $this->cgbbh;
    $original_cgbmc = $this->cgbmc;
    $original_pc = $this->pc;
    $original_zbggbh = $this->zbggbh;
    $original_zjrs = $this->zjrs;
}
     $sql  = "delete  from cg_xmzjk where zbggbh='".$this->zbggbh ."' and id<>'".$this->id ."'";

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$sql  = "update  cg_xmzjk 
left join 
(SELECT   zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email   FROM cg_zjk 
WHERE kyzt='是'  ORDER BY RAND()  LIMIT 1)  a  on 1=1
set  cg_xmzjk.zjbh= a.zjbh,cg_xmzjk.xm=a.xm,cg_xmzjk.xb=a.xb,
cg_xmzjk.sfzh=a.sfzh,
cg_xmzjk.gzdw=a.gzdw,
cg_xmzjk.zy=a.zy,
cg_xmzjk.work=a.work,
cg_xmzjk.zc=a.zc,
cg_xmzjk.yddh=a.yddh,
cg_xmzjk.email=a.email  
     where  cg_xmzjk.id='".$this->id ."'";

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;



	
$limit=	$this->zjrs -1;
$sql  = "insert into cg_xmzjk(zbggbh,cgbbh,cgbmc,zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email,pc,dlr,dlsj)
SELECT   '".$this->zbggbh ."' as  zbggbh,'".$this->cgbbh ."' as cgbbh,'".$this->cgbmc ."' as cgbmc, zjbh,xm,xb,sfzh,gzdw,zy,work,zc,yddh,email ,'".$this->pc ."' as pc,'".$this->dlr ."' as dlr,NOW()   as dlsj  FROM cg_zjk 
WHERE kyzt='是' 
AND NOT EXISTS(SELECT  cg_xmzjk.zjbh from cg_xmzjk where cg_xmzjk.zbggbh='".$this->zbggbh ."' and cg_xmzjk.zjbh=cg_zjk.zjbh)
 ORDER BY RAND()  LIMIT ".$limit;

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cg_xmzjk_auto_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cgbbh != $this->cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh)))
    {
        $this->ajax_return_values_cgbbh(true);
    }
    if (($original_cgbmc != $this->cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc)))
    {
        $this->ajax_return_values_cgbmc(true);
    }
    if (($original_pc != $this->pc || (isset($bFlagRead_pc) && $bFlagRead_pc)))
    {
        $this->ajax_return_values_pc(true);
    }
    if (($original_zbggbh != $this->zbggbh || (isset($bFlagRead_zbggbh) && $bFlagRead_zbggbh)))
    {
        $this->ajax_return_values_zbggbh(true);
    }
    if (($original_zjrs != $this->zjrs || (isset($bFlagRead_zjrs) && $bFlagRead_zjrs)))
    {
        $this->ajax_return_values_zjrs(true);
    }
}
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off'; 
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['parms'] = ""; 
          $nmgp_select = "SELECT id, zbggbh, cgbbh, cgbmc, zjbh, xm, xb, sfzh, gzdw, zy, work, zc, yddh, email, pc, dlr, dlsj from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['select'] = ""; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter'] = true;
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
              $this->zbggbh = $rs->fields[1] ; 
              $this->nmgp_dados_select['zbggbh'] = $this->zbggbh;
              $this->cgbbh = $rs->fields[2] ; 
              $this->nmgp_dados_select['cgbbh'] = $this->cgbbh;
              $this->cgbmc = $rs->fields[3] ; 
              $this->nmgp_dados_select['cgbmc'] = $this->cgbmc;
              $this->zjbh = $rs->fields[4] ; 
              $this->nmgp_dados_select['zjbh'] = $this->zjbh;
              $this->xm = $rs->fields[5] ; 
              $this->nmgp_dados_select['xm'] = $this->xm;
              $this->xb = $rs->fields[6] ; 
              $this->nmgp_dados_select['xb'] = $this->xb;
              $this->sfzh = $rs->fields[7] ; 
              $this->nmgp_dados_select['sfzh'] = $this->sfzh;
              $this->gzdw = $rs->fields[8] ; 
              $this->nmgp_dados_select['gzdw'] = $this->gzdw;
              $this->zy = $rs->fields[9] ; 
              $this->nmgp_dados_select['zy'] = $this->zy;
              $this->work = $rs->fields[10] ; 
              $this->nmgp_dados_select['work'] = $this->work;
              $this->zc = $rs->fields[11] ; 
              $this->nmgp_dados_select['zc'] = $this->zc;
              $this->yddh = $rs->fields[12] ; 
              $this->nmgp_dados_select['yddh'] = $this->yddh;
              $this->email = $rs->fields[13] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->pc = $rs->fields[14] ; 
              $this->nmgp_dados_select['pc'] = $this->pc;
              $this->dlr = $rs->fields[15] ; 
              $this->nmgp_dados_select['dlr'] = $this->dlr;
              $this->dlsj = $rs->fields[16] ; 
              if (substr($this->dlsj, 10, 1) == "-") 
              { 
                 $this->dlsj = substr($this->dlsj, 0, 10) . " " . substr($this->dlsj, 11);
              } 
              if (substr($this->dlsj, 13, 1) == ".") 
              { 
                 $this->dlsj = substr($this->dlsj, 0, 13) . ":" . substr($this->dlsj, 14, 2) . ":" . substr($this->dlsj, 17);
              } 
              $this->nmgp_dados_select['dlsj'] = $this->dlsj;
              $this->xmzjk = $rs->fields[17] ; 
              $this->nmgp_dados_select['xmzjk'] = $this->xmzjk;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->zbggbh = (string)$this->zbggbh; 
              $this->pc = (string)$this->pc; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_select'] = $this->nmgp_dados_select;
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
              $this->zbggbh = "";  
              $this->cgbbh = "";  
              $this->cgbmc = "";  
              $this->zjbh = "";  
              $this->xm = "";  
              $this->xb = "";  
              $this->sfzh = "";  
              $this->gzdw = "";  
              $this->zy = "";  
              $this->work = "";  
              $this->zc = "";  
              $this->yddh = "";  
              $this->email = "";  
              $this->pc = "";  
              $this->dlr = "";  
              $this->dlsj = "";  
              $this->dlsj_hora = "" ;  
              $this->xmzjk = "";  
              $this->zjrs = "";  
              $this->cgfs = "";  
              $this->isneed = "";  
              $this->isauto = "";  
              $this->zdrs = "";  
              $this->zsrs = "";  
              $this->xzcs = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_xmzjk_auto']['embutida_parms'] = "v_zbggbh?#?" . $this->nmgp_dados_form['zbggbh'] . "?@?NMSC_inicial?#?inicio?@?";
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['dados_select'];
           $this->SC_log_arr['fields']['zbggbh']['0'] =  $nmgp_dados_select['zbggbh'];
           $this->SC_log_arr['fields']['cgbbh']['0'] =  $nmgp_dados_select['cgbbh'];
           $this->SC_log_arr['fields']['cgbmc']['0'] =  $nmgp_dados_select['cgbmc'];
           $this->SC_log_arr['fields']['zjbh']['0'] =  $nmgp_dados_select['zjbh'];
           $this->SC_log_arr['fields']['xm']['0'] =  $nmgp_dados_select['xm'];
           $this->SC_log_arr['fields']['xb']['0'] =  $nmgp_dados_select['xb'];
           $this->SC_log_arr['fields']['sfzh']['0'] =  $nmgp_dados_select['sfzh'];
           $this->SC_log_arr['fields']['gzdw']['0'] =  $nmgp_dados_select['gzdw'];
           $this->SC_log_arr['fields']['zy']['0'] =  $nmgp_dados_select['zy'];
           $this->SC_log_arr['fields']['work']['0'] =  $nmgp_dados_select['work'];
           $this->SC_log_arr['fields']['zc']['0'] =  $nmgp_dados_select['zc'];
           $this->SC_log_arr['fields']['yddh']['0'] =  $nmgp_dados_select['yddh'];
           $this->SC_log_arr['fields']['email']['0'] =  $nmgp_dados_select['email'];
           $this->SC_log_arr['fields']['pc']['0'] =  $nmgp_dados_select['pc'];
           $this->SC_log_arr['fields']['dlr']['0'] =  $nmgp_dados_select['dlr'];
           $this->SC_log_arr['fields']['dlsj']['0'] =  $nmgp_dados_select['dlsj'];
           $this->SC_log_arr['fields']['xmzjk']['0'] =  $nmgp_dados_select['xmzjk'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['zbggbh']['1'] =  $this->zbggbh;
       $this->SC_log_arr['fields']['cgbbh']['1'] =  $this->cgbbh;
       $this->SC_log_arr['fields']['cgbmc']['1'] =  $this->cgbmc;
       $this->SC_log_arr['fields']['zjbh']['1'] =  $this->zjbh;
       $this->SC_log_arr['fields']['xm']['1'] =  $this->xm;
       $this->SC_log_arr['fields']['xb']['1'] =  $this->xb;
       $this->SC_log_arr['fields']['sfzh']['1'] =  $this->sfzh;
       $this->SC_log_arr['fields']['gzdw']['1'] =  $this->gzdw;
       $this->SC_log_arr['fields']['zy']['1'] =  $this->zy;
       $this->SC_log_arr['fields']['work']['1'] =  $this->work;
       $this->SC_log_arr['fields']['zc']['1'] =  $this->zc;
       $this->SC_log_arr['fields']['yddh']['1'] =  $this->yddh;
       $this->SC_log_arr['fields']['email']['1'] =  $this->email;
       $this->SC_log_arr['fields']['pc']['1'] =  $this->pc;
       $this->SC_log_arr['fields']['dlr']['1'] =  $this->dlr;
       $this->SC_log_arr['fields']['dlsj']['1'] =  $this->dlsj;
       $this->SC_log_arr['fields']['xmzjk']['1'] =  $this->xmzjk;
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
function zbggbh_onChange($cgbmc, $cgbbh, $xzcs, $zsrs, $zdrs, $isauto, $isneed, $cgfs, $zbggbh, $pc)
{
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'on';
     
$original_zbggbh = $this->zbggbh;
$original_cgbbh = $this->cgbbh;
$original_cgbmc = $this->cgbmc;
$original_cgfs = $this->cgfs;
$original_isneed = $this->isneed;
$original_isauto = $this->isauto;
$original_zdrs = $this->zdrs;
$original_zsrs = $this->zsrs;
$original_xzcs = $this->xzcs;
$original_pc = $this->pc;
$original_cgbmc = $this->cgbmc;
$original_cgbbh = $this->cgbbh;
$original_xzcs = $this->xzcs;
$original_zsrs = $this->zsrs;
$original_zdrs = $this->zdrs;
$original_isauto = $this->isauto;
$original_isneed = $this->isneed;
$original_cgfs = $this->cgfs;
$original_zbggbh = $this->zbggbh;
$original_pc = $this->pc;

$str_sql="";
if(!empty($this->zbggbh ))
{
	$str_sql = " select cgbbh,cgbmc,cgfs from cg_zbgg  where id='".$this->zbggbh ."' ";
	 
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
		$this->cgbbh  = $this->rs[0][0];
		$this->cgbmc  = $this->rs[0][1];
		$this->cgfs  = $this->rs[0][2];
	}
}

if(!empty($this->cgfs ))
{
	$str_sql = "  select isneed,isauto,zdrs,zsrs,xzcs from dm_xmzjkrule where  cgfs='".$this->cgfs ."' and qyzt='是' ";
	 
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
		$this->isneed  = $this->rs[0][0];
		$this->isauto  = $this->rs[0][1];
		$this->zdrs  = $this->rs[0][2];
		$this->zsrs  = $this->rs[0][3];
	   $this->xzcs  = $this->rs[0][4];
	}
}

	if(!empty($this->zbggbh ))
	{
       
      $nm_select = "select IFNULL(max(pc),0)+1  as pc from cg_xmzjk where   zbggbh='".$this->zbggbh ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->zbggbh !== "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
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
     } 
;
      $this->pc  = $this->rs[0][0];
	}


$modificado_zbggbh = $this->zbggbh;
$modificado_cgbbh = $this->cgbbh;
$modificado_cgbmc = $this->cgbmc;
$modificado_cgfs = $this->cgfs;
$modificado_isneed = $this->isneed;
$modificado_isauto = $this->isauto;
$modificado_zdrs = $this->zdrs;
$modificado_zsrs = $this->zsrs;
$modificado_xzcs = $this->xzcs;
$modificado_pc = $this->pc;
$modificado_cgbmc = $this->cgbmc;
$modificado_cgbbh = $this->cgbbh;
$modificado_xzcs = $this->xzcs;
$modificado_zsrs = $this->zsrs;
$modificado_zdrs = $this->zdrs;
$modificado_isauto = $this->isauto;
$modificado_isneed = $this->isneed;
$modificado_cgfs = $this->cgfs;
$modificado_zbggbh = $this->zbggbh;
$modificado_pc = $this->pc;
$this->nm_formatar_campos('zbggbh', 'cgbbh', 'cgbmc', 'cgfs', 'isneed', 'isauto', 'zdrs', 'zsrs', 'xzcs', 'pc');
if ($original_zbggbh !== $modificado_zbggbh || (isset($bFlagRead_zbggbh) && $bFlagRead_zbggbh))
{
    $this->ajax_return_values_zbggbh(true);
}
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_cgfs !== $modificado_cgfs || (isset($bFlagRead_cgfs) && $bFlagRead_cgfs))
{
    $this->ajax_return_values_cgfs(true);
}
if ($original_isneed !== $modificado_isneed || (isset($bFlagRead_isneed) && $bFlagRead_isneed))
{
    $this->ajax_return_values_isneed(true);
}
if ($original_isauto !== $modificado_isauto || (isset($bFlagRead_isauto) && $bFlagRead_isauto))
{
    $this->ajax_return_values_isauto(true);
}
if ($original_zdrs !== $modificado_zdrs || (isset($bFlagRead_zdrs) && $bFlagRead_zdrs))
{
    $this->ajax_return_values_zdrs(true);
}
if ($original_zsrs !== $modificado_zsrs || (isset($bFlagRead_zsrs) && $bFlagRead_zsrs))
{
    $this->ajax_return_values_zsrs(true);
}
if ($original_xzcs !== $modificado_xzcs || (isset($bFlagRead_xzcs) && $bFlagRead_xzcs))
{
    $this->ajax_return_values_xzcs(true);
}
if ($original_pc !== $modificado_pc || (isset($bFlagRead_pc) && $bFlagRead_pc))
{
    $this->ajax_return_values_pc(true);
}
if ($original_cgbmc !== $modificado_cgbmc || (isset($bFlagRead_cgbmc) && $bFlagRead_cgbmc))
{
    $this->ajax_return_values_cgbmc(true);
}
if ($original_cgbbh !== $modificado_cgbbh || (isset($bFlagRead_cgbbh) && $bFlagRead_cgbbh))
{
    $this->ajax_return_values_cgbbh(true);
}
if ($original_xzcs !== $modificado_xzcs || (isset($bFlagRead_xzcs) && $bFlagRead_xzcs))
{
    $this->ajax_return_values_xzcs(true);
}
if ($original_zsrs !== $modificado_zsrs || (isset($bFlagRead_zsrs) && $bFlagRead_zsrs))
{
    $this->ajax_return_values_zsrs(true);
}
if ($original_zdrs !== $modificado_zdrs || (isset($bFlagRead_zdrs) && $bFlagRead_zdrs))
{
    $this->ajax_return_values_zdrs(true);
}
if ($original_isauto !== $modificado_isauto || (isset($bFlagRead_isauto) && $bFlagRead_isauto))
{
    $this->ajax_return_values_isauto(true);
}
if ($original_isneed !== $modificado_isneed || (isset($bFlagRead_isneed) && $bFlagRead_isneed))
{
    $this->ajax_return_values_isneed(true);
}
if ($original_cgfs !== $modificado_cgfs || (isset($bFlagRead_cgfs) && $bFlagRead_cgfs))
{
    $this->ajax_return_values_cgfs(true);
}
if ($original_zbggbh !== $modificado_zbggbh || (isset($bFlagRead_zbggbh) && $bFlagRead_zbggbh))
{
    $this->ajax_return_values_zbggbh(true);
}
if ($original_pc !== $modificado_pc || (isset($bFlagRead_pc) && $bFlagRead_pc))
{
    $this->ajax_return_values_pc(true);
}
form_cg_xmzjk_auto_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off';
}
function zjbh_onChange($gzdw, $sfzh, $xb, $xm, $zjbh, $email, $yddh, $zc, $work, $zy)
{
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'on';
     
$original_gzdw = $this->gzdw;
$original_sfzh = $this->sfzh;
$original_xb = $this->xb;
$original_xm = $this->xm;
$original_zjbh = $this->zjbh;
$original_email = $this->email;
$original_yddh = $this->yddh;
$original_zc = $this->zc;
$original_work = $this->work;
$original_zy = $this->zy;

$str_sql="";
if(!empty($this->zjbh ))
{
	$str_sql = " select xm,xb,sfzh,gzdw,zy,work,zc,yddh,email  from cg_zjk where zjbh='".$this->zjbh ."' ";
	 
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
		$this->xm  = $this->rs[0][0];
		$this->xb  = $this->rs[0][1];
		$this->sfzh  = $this->rs[0][2];
		$this->gzdw  = $this->rs[0][3];
	   $this->zy  = $this->rs[0][4];
		$this->work  = $this->rs[0][5];
		$this->zc  = $this->rs[0][6];
		$this->yddh  = $this->rs[0][7];
		$this->email  = $this->rs[0][8];
	}
}




$modificado_gzdw = $this->gzdw;
$modificado_sfzh = $this->sfzh;
$modificado_xb = $this->xb;
$modificado_xm = $this->xm;
$modificado_zjbh = $this->zjbh;
$modificado_email = $this->email;
$modificado_yddh = $this->yddh;
$modificado_zc = $this->zc;
$modificado_work = $this->work;
$modificado_zy = $this->zy;
$this->nm_formatar_campos();
if ($original_gzdw !== $modificado_gzdw || (isset($bFlagRead_gzdw) && $bFlagRead_gzdw))
{
    $this->ajax_return_values_gzdw(true);
}
if ($original_sfzh !== $modificado_sfzh || (isset($bFlagRead_sfzh) && $bFlagRead_sfzh))
{
    $this->ajax_return_values_sfzh(true);
}
if ($original_xb !== $modificado_xb || (isset($bFlagRead_xb) && $bFlagRead_xb))
{
    $this->ajax_return_values_xb(true);
}
if ($original_xm !== $modificado_xm || (isset($bFlagRead_xm) && $bFlagRead_xm))
{
    $this->ajax_return_values_xm(true);
}
if ($original_zjbh !== $modificado_zjbh || (isset($bFlagRead_zjbh) && $bFlagRead_zjbh))
{
    $this->ajax_return_values_zjbh(true);
}
if ($original_email !== $modificado_email || (isset($bFlagRead_email) && $bFlagRead_email))
{
    $this->ajax_return_values_email(true);
}
if ($original_yddh !== $modificado_yddh || (isset($bFlagRead_yddh) && $bFlagRead_yddh))
{
    $this->ajax_return_values_yddh(true);
}
if ($original_zc !== $modificado_zc || (isset($bFlagRead_zc) && $bFlagRead_zc))
{
    $this->ajax_return_values_zc(true);
}
if ($original_work !== $modificado_work || (isset($bFlagRead_work) && $bFlagRead_work))
{
    $this->ajax_return_values_work(true);
}
if ($original_zy !== $modificado_zy || (isset($bFlagRead_zy) && $bFlagRead_zy))
{
    $this->ajax_return_values_zy(true);
}
form_cg_xmzjk_auto_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cg_xmzjk_auto']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cg_xmzjk_auto_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_cg_xmzjk_auto_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cg_xmzjk_auto_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "zbggbh", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "zjbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xm", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "sfzh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "gzdw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zy", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "work", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "zc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "yddh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pc", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "zbggbh", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "pc", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cg_xmzjk_auto = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['total'] = $qt_geral_reg_form_cg_xmzjk_auto;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_xmzjk_auto_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_xmzjk_auto_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "zbggbh";$nm_numeric[] = "pc";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['decimal_db'] == ".")
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
      $Nm_datas['dlsj'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['SC_sep_date1'];
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_cg_xmzjk_auto_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cg_xmzjk_auto_fim.php";
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
       form_cg_xmzjk_auto_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_xmzjk_auto']['masterValue']);
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