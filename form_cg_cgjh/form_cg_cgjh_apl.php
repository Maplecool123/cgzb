<?php
//
class form_cg_cgjh_apl
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
   var $xmbh;
   var $xmmc;
   var $ysje;
   var $zjly;
   var $zjly_1;
   var $xmfzr;
   var $sbrq;
   var $sbbm;
   var $sbbm_1;
   var $sbr;
   var $qwcgrq;
   var $lxr;
   var $lxdh;
   var $email;
   var $bz;
   var $fa;
   var $fa_scfile_name;
   var $fa_ul_name;
   var $fa_ul_type;
   var $fa_limpa;
   var $fa_salva;
   var $bg;
   var $bg_scfile_name;
   var $bg_ul_name;
   var $bg_ul_type;
   var $bg_limpa;
   var $bg_salva;
   var $ps;
   var $ps_scfile_name;
   var $ps_ul_name;
   var $ps_ul_type;
   var $ps_limpa;
   var $ps_salva;
   var $cjsj;
   var $cjsj_hora;
   var $shzt;
   var $ifjs;
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
          if (isset($this->NM_ajax_info['param']['bg']))
          {
              $this->bg = $this->NM_ajax_info['param']['bg'];
          }
          if (isset($this->NM_ajax_info['param']['bg_limpa']))
          {
              $this->bg_limpa = $this->NM_ajax_info['param']['bg_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['bg_salva']))
          {
              $this->bg_salva = $this->NM_ajax_info['param']['bg_salva'];
          }
          if (isset($this->NM_ajax_info['param']['bg_ul_name']))
          {
              $this->bg_ul_name = $this->NM_ajax_info['param']['bg_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['bg_ul_type']))
          {
              $this->bg_ul_type = $this->NM_ajax_info['param']['bg_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['bz']))
          {
              $this->bz = $this->NM_ajax_info['param']['bz'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['fa']))
          {
              $this->fa = $this->NM_ajax_info['param']['fa'];
          }
          if (isset($this->NM_ajax_info['param']['fa_limpa']))
          {
              $this->fa_limpa = $this->NM_ajax_info['param']['fa_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['fa_salva']))
          {
              $this->fa_salva = $this->NM_ajax_info['param']['fa_salva'];
          }
          if (isset($this->NM_ajax_info['param']['fa_ul_name']))
          {
              $this->fa_ul_name = $this->NM_ajax_info['param']['fa_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['fa_ul_type']))
          {
              $this->fa_ul_type = $this->NM_ajax_info['param']['fa_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['lxdh']))
          {
              $this->lxdh = $this->NM_ajax_info['param']['lxdh'];
          }
          if (isset($this->NM_ajax_info['param']['lxr']))
          {
              $this->lxr = $this->NM_ajax_info['param']['lxr'];
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
          if (isset($this->NM_ajax_info['param']['ps']))
          {
              $this->ps = $this->NM_ajax_info['param']['ps'];
          }
          if (isset($this->NM_ajax_info['param']['ps_limpa']))
          {
              $this->ps_limpa = $this->NM_ajax_info['param']['ps_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['ps_salva']))
          {
              $this->ps_salva = $this->NM_ajax_info['param']['ps_salva'];
          }
          if (isset($this->NM_ajax_info['param']['ps_ul_name']))
          {
              $this->ps_ul_name = $this->NM_ajax_info['param']['ps_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['ps_ul_type']))
          {
              $this->ps_ul_type = $this->NM_ajax_info['param']['ps_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['qwcgrq']))
          {
              $this->qwcgrq = $this->NM_ajax_info['param']['qwcgrq'];
          }
          if (isset($this->NM_ajax_info['param']['sbbm']))
          {
              $this->sbbm = $this->NM_ajax_info['param']['sbbm'];
          }
          if (isset($this->NM_ajax_info['param']['sbr']))
          {
              $this->sbr = $this->NM_ajax_info['param']['sbr'];
          }
          if (isset($this->NM_ajax_info['param']['sbrq']))
          {
              $this->sbrq = $this->NM_ajax_info['param']['sbrq'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['xmbh']))
          {
              $this->xmbh = $this->NM_ajax_info['param']['xmbh'];
          }
          if (isset($this->NM_ajax_info['param']['xmfzr']))
          {
              $this->xmfzr = $this->NM_ajax_info['param']['xmfzr'];
          }
          if (isset($this->NM_ajax_info['param']['xmmc']))
          {
              $this->xmmc = $this->NM_ajax_info['param']['xmmc'];
          }
          if (isset($this->NM_ajax_info['param']['ysje']))
          {
              $this->ysje = $this->NM_ajax_info['param']['ysje'];
          }
          if (isset($this->NM_ajax_info['param']['zjly']))
          {
              $this->zjly = $this->NM_ajax_info['param']['zjly'];
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['embutida_parms']);
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
                 nm_limpa_str_form_cg_cgjh($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cg_cgjh_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("zh_cn");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("zh_cn");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['upload_field_info']['fa'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cg_cgjh',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N0',
      );

      $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['upload_field_info']['bg'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cg_cgjh',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N1',
      );

      $_SESSION['sc_session'][$script_case_init]['form_cg_cgjh']['upload_field_info']['ps'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cg_cgjh',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N2',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_cgjh']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cg_cgjh'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_cgjh']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_cgjh']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cg_cgjh') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cg_cgjh']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_cg_cgjh'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cg_cgjh")
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
      $this->nm_new_label['xmbh'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . '';
      $this->nm_new_label['xmmc'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . '';
      $this->nm_new_label['ysje'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . '';
      $this->nm_new_label['zjly'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_zjly'] . '';
      $this->nm_new_label['xmfzr'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmfzr'] . '';
      $this->nm_new_label['sbrq'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbrq'] . '';
      $this->nm_new_label['sbbm'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbbm'] . '';
      $this->nm_new_label['sbr'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbr'] . '';
      $this->nm_new_label['qwcgrq'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_qwcgrq'] . '';
      $this->nm_new_label['lxr'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxr'] . '';
      $this->nm_new_label['lxdh'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxdh'] . '';
      $this->nm_new_label['email'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_email'] . '';
      $this->nm_new_label['bz'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bz'] . '';
      $this->nm_new_label['fa'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_fa'] . '';
      $this->nm_new_label['bg'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bg'] . '';
      $this->nm_new_label['ps'] = '' . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ps'] . '';

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



      $_SESSION['scriptcase']['error_icon']['form_cg_cgjh']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cg_cgjh'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['fa_ul_name']) && '' != $this->NM_ajax_info['param']['fa_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->fa_ul_name]))
          {
              $this->NM_ajax_info['param']['fa_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->fa_ul_name];
          }
          $this->fa = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['fa_ul_name'];
          $this->fa_scfile_name = substr($this->NM_ajax_info['param']['fa_ul_name'], 12);
          $this->fa_scfile_type = $this->NM_ajax_info['param']['fa_ul_type'];
          $this->fa_ul_name = $this->NM_ajax_info['param']['fa_ul_name'];
          $this->fa_ul_type = $this->NM_ajax_info['param']['fa_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->fa             = sc_convert_encoding($this->fa,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fa_scfile_name = sc_convert_encoding($this->fa_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fa_ul_name     = sc_convert_encoding($this->fa_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->fa_ul_name) && '' != $this->fa_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->fa_ul_name]))
          {
              $this->fa_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->fa_ul_name];
          }
          $this->fa = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->fa_ul_name;
          $this->fa_scfile_name = substr($this->fa_ul_name, 12);
          $this->fa_scfile_type = $this->fa_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->fa             = sc_convert_encoding($this->fa,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fa_scfile_name = sc_convert_encoding($this->fa_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->fa_ul_name     = sc_convert_encoding($this->fa_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->NM_ajax_info['param']['bg_ul_name']) && '' != $this->NM_ajax_info['param']['bg_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->bg_ul_name]))
          {
              $this->NM_ajax_info['param']['bg_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->bg_ul_name];
          }
          $this->bg = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['bg_ul_name'];
          $this->bg_scfile_name = substr($this->NM_ajax_info['param']['bg_ul_name'], 12);
          $this->bg_scfile_type = $this->NM_ajax_info['param']['bg_ul_type'];
          $this->bg_ul_name = $this->NM_ajax_info['param']['bg_ul_name'];
          $this->bg_ul_type = $this->NM_ajax_info['param']['bg_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->bg             = sc_convert_encoding($this->bg,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->bg_scfile_name = sc_convert_encoding($this->bg_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->bg_ul_name     = sc_convert_encoding($this->bg_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->bg_ul_name) && '' != $this->bg_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->bg_ul_name]))
          {
              $this->bg_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->bg_ul_name];
          }
          $this->bg = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->bg_ul_name;
          $this->bg_scfile_name = substr($this->bg_ul_name, 12);
          $this->bg_scfile_type = $this->bg_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->bg             = sc_convert_encoding($this->bg,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->bg_scfile_name = sc_convert_encoding($this->bg_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->bg_ul_name     = sc_convert_encoding($this->bg_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->NM_ajax_info['param']['ps_ul_name']) && '' != $this->NM_ajax_info['param']['ps_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->ps_ul_name]))
          {
              $this->NM_ajax_info['param']['ps_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->ps_ul_name];
          }
          $this->ps = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['ps_ul_name'];
          $this->ps_scfile_name = substr($this->NM_ajax_info['param']['ps_ul_name'], 12);
          $this->ps_scfile_type = $this->NM_ajax_info['param']['ps_ul_type'];
          $this->ps_ul_name = $this->NM_ajax_info['param']['ps_ul_name'];
          $this->ps_ul_type = $this->NM_ajax_info['param']['ps_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->ps             = sc_convert_encoding($this->ps,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->ps_scfile_name = sc_convert_encoding($this->ps_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->ps_ul_name     = sc_convert_encoding($this->ps_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->ps_ul_name) && '' != $this->ps_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->ps_ul_name]))
          {
              $this->ps_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_field_ul_name'][$this->ps_ul_name];
          }
          $this->ps = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->ps_ul_name;
          $this->ps_scfile_name = substr($this->ps_ul_name, 12);
          $this->ps_scfile_type = $this->ps_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->ps             = sc_convert_encoding($this->ps,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->ps_scfile_name = sc_convert_encoding($this->ps_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->ps_ul_name     = sc_convert_encoding($this->ps_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cg_cgjh']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->cjsj)){$this->cjsj = $this->nmgp_dados_form['cjsj'];} 
          if (!isset($this->shzt)){$this->shzt = $this->nmgp_dados_form['shzt'];} 
          if (!isset($this->ifjs)){$this->ifjs = $this->nmgp_dados_form['ifjs'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cg_cgjh", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_cg_cgjh/form_cg_cgjh_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cg_cgjh_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cg_cgjh_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cg_cgjh_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cg_cgjh/form_cg_cgjh_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cg_cgjh_erro.class.php"); 
      }
      $this->Erro      = new form_cg_cgjh_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cg_cgjh']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->xmbh)) { $this->nm_limpa_alfa($this->xmbh); }
      if (isset($this->xmmc)) { $this->nm_limpa_alfa($this->xmmc); }
      if (isset($this->ysje)) { $this->nm_limpa_alfa($this->ysje); }
      if (isset($this->zjly)) { $this->nm_limpa_alfa($this->zjly); }
      if (isset($this->xmfzr)) { $this->nm_limpa_alfa($this->xmfzr); }
      if (isset($this->sbbm)) { $this->nm_limpa_alfa($this->sbbm); }
      if (isset($this->sbr)) { $this->nm_limpa_alfa($this->sbr); }
      if (isset($this->lxr)) { $this->nm_limpa_alfa($this->lxr); }
      if (isset($this->lxdh)) { $this->nm_limpa_alfa($this->lxdh); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->bz)) { $this->nm_limpa_alfa($this->bz); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- ysje
      $this->field_config['ysje']               = array();
      $this->field_config['ysje']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ysje']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ysje']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ysje']['symbol_mon'] = '';
      $this->field_config['ysje']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ysje']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- sbrq
      $this->field_config['sbrq']                 = array();
      $this->field_config['sbrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['sbrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['sbrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'sbrq');
      //-- qwcgrq
      $this->field_config['qwcgrq']                 = array();
      $this->field_config['qwcgrq']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['qwcgrq']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['qwcgrq']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'qwcgrq');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cjsj
      $this->field_config['cjsj']                 = array();
      $this->field_config['cjsj']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['cjsj']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['cjsj']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['cjsj']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'cjsj');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Gera_log_access'] = false;
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
          if ('validate_xmbh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'xmbh');
          }
          if ('validate_xmmc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'xmmc');
          }
          if ('validate_ysje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ysje');
          }
          if ('validate_zjly' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zjly');
          }
          if ('validate_xmfzr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'xmfzr');
          }
          if ('validate_sbbm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sbbm');
          }
          if ('validate_sbrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sbrq');
          }
          if ('validate_sbr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sbr');
          }
          if ('validate_qwcgrq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qwcgrq');
          }
          if ('validate_lxr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lxr');
          }
          if ('validate_lxdh' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lxdh');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_bz' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bz');
          }
          if ('validate_fa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fa');
          }
          if ('validate_bg' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bg');
          }
          if ('validate_ps' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ps');
          }
          form_cg_cgjh_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inline_form_seq'] = $this->sc_seq_row;
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
              form_cg_cgjh_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cg_cgjh']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cg_cgjh_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_atualiz'] == "ok")
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
          form_cg_cgjh_pack_ajax_response();
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
          form_cg_cgjh_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_cg_cgjh', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_cg_cgjh', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_cg_cgjh_pack_ajax_response();
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
           case 'xmbh':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . "";
               break;
           case 'xmmc':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . "";
               break;
           case 'ysje':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . "";
               break;
           case 'zjly':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_zjly'] . "";
               break;
           case 'xmfzr':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmfzr'] . "";
               break;
           case 'sbbm':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbbm'] . "";
               break;
           case 'sbrq':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbrq'] . "";
               break;
           case 'sbr':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbr'] . "";
               break;
           case 'qwcgrq':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_qwcgrq'] . "";
               break;
           case 'lxr':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxr'] . "";
               break;
           case 'lxdh':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxdh'] . "";
               break;
           case 'email':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_email'] . "";
               break;
           case 'bz':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bz'] . "";
               break;
           case 'fa':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_fa'] . "";
               break;
           case 'bg':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bg'] . "";
               break;
           case 'ps':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ps'] . "";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_id'] . "";
               break;
           case 'cjsj':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_cjsj'] . "";
               break;
           case 'shzt':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_shzt'] . "";
               break;
           case 'ifjs':
               return "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ifjs'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cg_cgjh']) || !is_array($this->NM_ajax_info['errList']['geral_form_cg_cgjh']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cg_cgjh'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cg_cgjh'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'xmbh' == $filtro)
        $this->ValidateField_xmbh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'xmmc' == $filtro)
        $this->ValidateField_xmmc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ysje' == $filtro)
        $this->ValidateField_ysje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zjly' == $filtro)
        $this->ValidateField_zjly($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'xmfzr' == $filtro)
        $this->ValidateField_xmfzr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sbbm' == $filtro)
        $this->ValidateField_sbbm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sbrq' == $filtro)
        $this->ValidateField_sbrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sbr' == $filtro)
        $this->ValidateField_sbr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qwcgrq' == $filtro)
        $this->ValidateField_qwcgrq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lxr' == $filtro)
        $this->ValidateField_lxr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lxdh' == $filtro)
        $this->ValidateField_lxdh($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bz' == $filtro)
        $this->ValidateField_bz($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fa' == $filtro)
        $this->ValidateField_fa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bg' == $filtro)
        $this->ValidateField_bg($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ps' == $filtro)
        $this->ValidateField_ps($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_xmbh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmbh']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmbh'] == "on")) 
      { 
          if ($this->xmbh == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . "" ; 
              if (!isset($Campos_Erros['xmbh']))
              {
                  $Campos_Erros['xmbh'] = array();
              }
              $Campos_Erros['xmbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['xmbh']) || !is_array($this->NM_ajax_info['errList']['xmbh']))
                  {
                      $this->NM_ajax_info['errList']['xmbh'] = array();
                  }
                  $this->NM_ajax_info['errList']['xmbh'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->xmbh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['xmbh']))
              {
                  $Campos_Erros['xmbh'] = array();
              }
              $Campos_Erros['xmbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['xmbh']) || !is_array($this->NM_ajax_info['errList']['xmbh']))
              {
                  $this->NM_ajax_info['errList']['xmbh'] = array();
              }
              $this->NM_ajax_info['errList']['xmbh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_xmbh

    function ValidateField_xmmc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmmc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmmc'] == "on")) 
      { 
          if ($this->xmmc == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . "" ; 
              if (!isset($Campos_Erros['xmmc']))
              {
                  $Campos_Erros['xmmc'] = array();
              }
              $Campos_Erros['xmmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['xmmc']) || !is_array($this->NM_ajax_info['errList']['xmmc']))
                  {
                      $this->NM_ajax_info['errList']['xmmc'] = array();
                  }
                  $this->NM_ajax_info['errList']['xmmc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->xmmc) > 64) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['xmmc']))
              {
                  $Campos_Erros['xmmc'] = array();
              }
              $Campos_Erros['xmmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['xmmc']) || !is_array($this->NM_ajax_info['errList']['xmmc']))
              {
                  $this->NM_ajax_info['errList']['xmmc'] = array();
              }
              $this->NM_ajax_info['errList']['xmmc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 64 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_xmmc

    function ValidateField_ysje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['ysje']['symbol_dec']))
      {
          $this->sc_remove_currency($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp'], $this->field_config['ysje']['symbol_mon']); 
          nm_limpa_valor($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp']) ; 
          if ('.' == substr($this->ysje, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ysje, 1)))
              {
                  $this->ysje = '';
              }
              else
              {
                  $this->ysje = '0' . $this->ysje;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ysje != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->ysje) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ysje']))
                  {
                      $Campos_Erros['ysje'] = array();
                  }
                  $Campos_Erros['ysje'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ysje']) || !is_array($this->NM_ajax_info['errList']['ysje']))
                  {
                      $this->NM_ajax_info['errList']['ysje'] = array();
                  }
                  $this->NM_ajax_info['errList']['ysje'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ysje, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . "; " ; 
                  if (!isset($Campos_Erros['ysje']))
                  {
                      $Campos_Erros['ysje'] = array();
                  }
                  $Campos_Erros['ysje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ysje']) || !is_array($this->NM_ajax_info['errList']['ysje']))
                  {
                      $this->NM_ajax_info['errList']['ysje'] = array();
                  }
                  $this->NM_ajax_info['errList']['ysje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['ysje']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['ysje'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ysje'] . "" ; 
              if (!isset($Campos_Erros['ysje']))
              {
                  $Campos_Erros['ysje'] = array();
              }
              $Campos_Erros['ysje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ysje']) || !is_array($this->NM_ajax_info['errList']['ysje']))
                  {
                      $this->NM_ajax_info['errList']['ysje'] = array();
                  }
                  $this->NM_ajax_info['errList']['ysje'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_ysje

    function ValidateField_zjly(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->zjly == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['zjly']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['zjly'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_zjly'] . "" ; 
          if (!isset($Campos_Erros['zjly']))
          {
              $Campos_Erros['zjly'] = array();
          }
          $Campos_Erros['zjly'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['zjly']) || !is_array($this->NM_ajax_info['errList']['zjly']))
          {
              $this->NM_ajax_info['errList']['zjly'] = array();
          }
          $this->NM_ajax_info['errList']['zjly'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->zjly) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly']) && !in_array($this->zjly, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['zjly']))
              {
                  $Campos_Erros['zjly'] = array();
              }
              $Campos_Erros['zjly'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['zjly']) || !is_array($this->NM_ajax_info['errList']['zjly']))
              {
                  $this->NM_ajax_info['errList']['zjly'] = array();
              }
              $this->NM_ajax_info['errList']['zjly'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_zjly

    function ValidateField_xmfzr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmfzr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['xmfzr'] == "on")) 
      { 
          if ($this->xmfzr == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmfzr'] . "" ; 
              if (!isset($Campos_Erros['xmfzr']))
              {
                  $Campos_Erros['xmfzr'] = array();
              }
              $Campos_Erros['xmfzr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['xmfzr']) || !is_array($this->NM_ajax_info['errList']['xmfzr']))
                  {
                      $this->NM_ajax_info['errList']['xmfzr'] = array();
                  }
                  $this->NM_ajax_info['errList']['xmfzr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->xmfzr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmfzr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['xmfzr']))
              {
                  $Campos_Erros['xmfzr'] = array();
              }
              $Campos_Erros['xmfzr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['xmfzr']) || !is_array($this->NM_ajax_info['errList']['xmfzr']))
              {
                  $this->NM_ajax_info['errList']['xmfzr'] = array();
              }
              $this->NM_ajax_info['errList']['xmfzr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_xmfzr

    function ValidateField_sbbm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->sbbm == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbbm']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbbm'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbbm'] . "" ; 
          if (!isset($Campos_Erros['sbbm']))
          {
              $Campos_Erros['sbbm'] = array();
          }
          $Campos_Erros['sbbm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['sbbm']) || !is_array($this->NM_ajax_info['errList']['sbbm']))
          {
              $this->NM_ajax_info['errList']['sbbm'] = array();
          }
          $this->NM_ajax_info['errList']['sbbm'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->sbbm) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm']) && !in_array($this->sbbm, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['sbbm']))
              {
                  $Campos_Erros['sbbm'] = array();
              }
              $Campos_Erros['sbbm'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['sbbm']) || !is_array($this->NM_ajax_info['errList']['sbbm']))
              {
                  $this->NM_ajax_info['errList']['sbbm'] = array();
              }
              $this->NM_ajax_info['errList']['sbbm'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_sbbm

    function ValidateField_sbrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->sbrq, $this->field_config['sbrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['sbrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['sbrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['sbrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['sbrq']['date_sep']) ; 
          if (trim($this->sbrq) != "")  
          { 
              if ($teste_validade->Data($this->sbrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbrq'] . "; " ; 
                  if (!isset($Campos_Erros['sbrq']))
                  {
                      $Campos_Erros['sbrq'] = array();
                  }
                  $Campos_Erros['sbrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sbrq']) || !is_array($this->NM_ajax_info['errList']['sbrq']))
                  {
                      $this->NM_ajax_info['errList']['sbrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['sbrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif ((!$this->NM_ajax_flag || 'validate_sbrq' != $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbrq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbrq'] == "on")) 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbrq'] . "" ; 
              if (!isset($Campos_Erros['sbrq']))
              {
                  $Campos_Erros['sbrq'] = array();
              }
              $Campos_Erros['sbrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['sbrq']) || !is_array($this->NM_ajax_info['errList']['sbrq']))
                  {
                      $this->NM_ajax_info['errList']['sbrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['sbrq'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['sbrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_sbrq

    function ValidateField_sbr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['php_cmp_required']['sbr'] == "on")) 
      { 
          if ($this->sbr == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbr'] . "" ; 
              if (!isset($Campos_Erros['sbr']))
              {
                  $Campos_Erros['sbr'] = array();
              }
              $Campos_Erros['sbr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['sbr']) || !is_array($this->NM_ajax_info['errList']['sbr']))
                  {
                      $this->NM_ajax_info['errList']['sbr'] = array();
                  }
                  $this->NM_ajax_info['errList']['sbr'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sbr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_sbr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sbr']))
              {
                  $Campos_Erros['sbr'] = array();
              }
              $Campos_Erros['sbr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sbr']) || !is_array($this->NM_ajax_info['errList']['sbr']))
              {
                  $this->NM_ajax_info['errList']['sbr'] = array();
              }
              $this->NM_ajax_info['errList']['sbr'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sbr

    function ValidateField_qwcgrq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->qwcgrq, $this->field_config['qwcgrq']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['qwcgrq']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['qwcgrq']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['qwcgrq']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['qwcgrq']['date_sep']) ; 
          if (trim($this->qwcgrq) != "")  
          { 
              if ($teste_validade->Data($this->qwcgrq, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_qwcgrq'] . "; " ; 
                  if (!isset($Campos_Erros['qwcgrq']))
                  {
                      $Campos_Erros['qwcgrq'] = array();
                  }
                  $Campos_Erros['qwcgrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['qwcgrq']) || !is_array($this->NM_ajax_info['errList']['qwcgrq']))
                  {
                      $this->NM_ajax_info['errList']['qwcgrq'] = array();
                  }
                  $this->NM_ajax_info['errList']['qwcgrq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['qwcgrq']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_qwcgrq

    function ValidateField_lxr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lxr) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxr'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_lxdh(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lxdh) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_lxdh'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lxdh']))
              {
                  $Campos_Erros['lxdh'] = array();
              }
              $Campos_Erros['lxdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lxdh']) || !is_array($this->NM_ajax_info['errList']['lxdh']))
              {
                  $this->NM_ajax_info['errList']['lxdh'] = array();
              }
              $this->NM_ajax_info['errList']['lxdh'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lxdh

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email) != "")  
          { 
              if ($teste_validade->Email($this->email) == false)  
              { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_email'] . "; " ; 
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
      } 
    } // ValidateField_email

    function ValidateField_bz(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bz) > 128) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bz'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bz']))
              {
                  $Campos_Erros['bz'] = array();
              }
              $Campos_Erros['bz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bz']) || !is_array($this->NM_ajax_info['errList']['bz']))
              {
                  $this->NM_ajax_info['errList']['bz'] = array();
              }
              $this->NM_ajax_info['errList']['bz'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 128 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bz

    function ValidateField_fa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->fa;
            if (!function_exists('sc_upload_unprotect_chars'))
            {
                include_once 'form_cg_cgjh_doc_name.php';
            }
            $this->fa = sc_upload_unprotect_chars($this->fa);
            $this->fa_scfile_name = sc_upload_unprotect_chars($this->fa_scfile_name);
            if ("" != $this->fa && "S" != $this->fa_limpa && !$teste_validade->ArqExtensao($this->fa, array()))
            {
                $Campos_Crit .= "{lang_cg_cgjh_fld_fa}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['fa']))
                {
                    $Campos_Erros['fa'] = array();
                }
                $Campos_Erros['fa'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['fa']) || !is_array($this->NM_ajax_info['errList']['fa']))
                {
                    $this->NM_ajax_info['errList']['fa'] = array();
                }
                $this->NM_ajax_info['errList']['fa'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_fa

    function ValidateField_bg(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->bg;
            if (!function_exists('sc_upload_unprotect_chars'))
            {
                include_once 'form_cg_cgjh_doc_name.php';
            }
            $this->bg = sc_upload_unprotect_chars($this->bg);
            $this->bg_scfile_name = sc_upload_unprotect_chars($this->bg_scfile_name);
            if ("" != $this->bg && "S" != $this->bg_limpa && !$teste_validade->ArqExtensao($this->bg, array()))
            {
                $Campos_Crit .= "{lang_cg_cgjh_fld_bg}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['bg']))
                {
                    $Campos_Erros['bg'] = array();
                }
                $Campos_Erros['bg'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['bg']) || !is_array($this->NM_ajax_info['errList']['bg']))
                {
                    $this->NM_ajax_info['errList']['bg'] = array();
                }
                $this->NM_ajax_info['errList']['bg'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_bg

    function ValidateField_ps(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->ps;
            if (!function_exists('sc_upload_unprotect_chars'))
            {
                include_once 'form_cg_cgjh_doc_name.php';
            }
            $this->ps = sc_upload_unprotect_chars($this->ps);
            $this->ps_scfile_name = sc_upload_unprotect_chars($this->ps_scfile_name);
            if ("" != $this->ps && "S" != $this->ps_limpa && !$teste_validade->ArqExtensao($this->ps, array()))
            {
                $Campos_Crit .= "{lang_cg_cgjh_fld_ps}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['ps']))
                {
                    $Campos_Erros['ps'] = array();
                }
                $Campos_Erros['ps'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['ps']) || !is_array($this->NM_ajax_info['errList']['ps']))
                {
                    $this->NM_ajax_info['errList']['ps'] = array();
                }
                $this->NM_ajax_info['errList']['ps'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_ps
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
          if ($this->fa == "none") 
          { 
              $this->fa = ""; 
          } 
          if ($this->fa != "") 
          { 
              if (is_file($this->fa))  
              { 
                  if ($this->nmgp_opcao == "incluir")
                  { 
                      $this->SC_DOC_fa = $this->fa;
                  } 
                  else 
                  { 
                      $arq_fa = fopen($this->fa, "r") ; 
                      $reg_fa = fread($arq_fa, filesize($this->fa)) ; 
                      fclose($arq_fa) ;  
                  } 
                  $this->fa =  trim($this->fa_scfile_name) ;  
                  $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
                 if ($this->nmgp_opcao != "incluir")
                 { 
                  if (is_dir($dir_doc))  
                  { 
                      $_test_file = $this->fetchUniqueUploadName($this->fa_scfile_name, $dir_doc, "fa");
                      if (trim($this->fa_scfile_name) != $_test_file)
                      {
                          $this->fa_scfile_name = $_test_file;
                          $this->fa = $_test_file;
                      }
                      $arq_fa = fopen($dir_doc . trim($this->fa_scfile_name), "w") ; 
                      fwrite($arq_fa, $reg_fa) ;  
                      fclose($arq_fa) ;  
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_fa'] . ": " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                      if (!isset($Campos_Erros['fa']))
                      {
                          $Campos_Erros['fa'] = array();
                      }
                      $Campos_Erros['fa'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      if (!isset($this->NM_ajax_info['errList']['fa']) || !is_array($this->NM_ajax_info['errList']['fa']))
                      {
                          $this->NM_ajax_info['errList']['fa'] = array();
                      }
                      $this->NM_ajax_info['errList']['fa'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                  } 
                 } 
              } 
              else 
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_fa'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->fa = "";
                  if (!isset($Campos_Erros['fa']))
                  {
                      $Campos_Erros['fa'] = array();
                  }
                  $Campos_Erros['fa'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['fa']) || !is_array($this->NM_ajax_info['errList']['fa']))
                  {
                      $this->NM_ajax_info['errList']['fa'] = array();
                  }
                  $this->NM_ajax_info['errList']['fa'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
          elseif (!empty($this->fa_salva) && $this->fa_limpa != "S")
          {
              $this->fa = $this->fa_salva;
          }
      } 
      elseif (!empty($this->fa_salva) && $this->fa_limpa != "S")
      {
          $this->fa = $this->fa_salva;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->bg == "none") 
          { 
              $this->bg = ""; 
          } 
          if ($this->bg != "") 
          { 
              if (is_file($this->bg))  
              { 
                  if ($this->nmgp_opcao == "incluir")
                  { 
                      $this->SC_DOC_bg = $this->bg;
                  } 
                  else 
                  { 
                      $arq_bg = fopen($this->bg, "r") ; 
                      $reg_bg = fread($arq_bg, filesize($this->bg)) ; 
                      fclose($arq_bg) ;  
                  } 
                  $this->bg =  trim($this->bg_scfile_name) ;  
                  $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
                 if ($this->nmgp_opcao != "incluir")
                 { 
                  if (is_dir($dir_doc))  
                  { 
                      $_test_file = $this->fetchUniqueUploadName($this->bg_scfile_name, $dir_doc, "bg");
                      if (trim($this->bg_scfile_name) != $_test_file)
                      {
                          $this->bg_scfile_name = $_test_file;
                          $this->bg = $_test_file;
                      }
                      $arq_bg = fopen($dir_doc . trim($this->bg_scfile_name), "w") ; 
                      fwrite($arq_bg, $reg_bg) ;  
                      fclose($arq_bg) ;  
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bg'] . ": " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                      if (!isset($Campos_Erros['bg']))
                      {
                          $Campos_Erros['bg'] = array();
                      }
                      $Campos_Erros['bg'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      if (!isset($this->NM_ajax_info['errList']['bg']) || !is_array($this->NM_ajax_info['errList']['bg']))
                      {
                          $this->NM_ajax_info['errList']['bg'] = array();
                      }
                      $this->NM_ajax_info['errList']['bg'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                  } 
                 } 
              } 
              else 
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_bg'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->bg = "";
                  if (!isset($Campos_Erros['bg']))
                  {
                      $Campos_Erros['bg'] = array();
                  }
                  $Campos_Erros['bg'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['bg']) || !is_array($this->NM_ajax_info['errList']['bg']))
                  {
                      $this->NM_ajax_info['errList']['bg'] = array();
                  }
                  $this->NM_ajax_info['errList']['bg'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
          elseif (!empty($this->bg_salva) && $this->bg_limpa != "S")
          {
              $this->bg = $this->bg_salva;
          }
      } 
      elseif (!empty($this->bg_salva) && $this->bg_limpa != "S")
      {
          $this->bg = $this->bg_salva;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ps == "none") 
          { 
              $this->ps = ""; 
          } 
          if ($this->ps != "") 
          { 
              if (is_file($this->ps))  
              { 
                  if ($this->nmgp_opcao == "incluir")
                  { 
                      $this->SC_DOC_ps = $this->ps;
                  } 
                  else 
                  { 
                      $arq_ps = fopen($this->ps, "r") ; 
                      $reg_ps = fread($arq_ps, filesize($this->ps)) ; 
                      fclose($arq_ps) ;  
                  } 
                  $this->ps =  trim($this->ps_scfile_name) ;  
                  $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
                 if ($this->nmgp_opcao != "incluir")
                 { 
                  if (is_dir($dir_doc))  
                  { 
                      $_test_file = $this->fetchUniqueUploadName($this->ps_scfile_name, $dir_doc, "ps");
                      if (trim($this->ps_scfile_name) != $_test_file)
                      {
                          $this->ps_scfile_name = $_test_file;
                          $this->ps = $_test_file;
                      }
                      $arq_ps = fopen($dir_doc . trim($this->ps_scfile_name), "w") ; 
                      fwrite($arq_ps, $reg_ps) ;  
                      fclose($arq_ps) ;  
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ps'] . ": " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                      if (!isset($Campos_Erros['ps']))
                      {
                          $Campos_Erros['ps'] = array();
                      }
                      $Campos_Erros['ps'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      if (!isset($this->NM_ajax_info['errList']['ps']) || !is_array($this->NM_ajax_info['errList']['ps']))
                      {
                          $this->NM_ajax_info['errList']['ps'] = array();
                      }
                      $this->NM_ajax_info['errList']['ps'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                  } 
                 } 
              } 
              else 
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_cg_cgjh_fld_ps'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->ps = "";
                  if (!isset($Campos_Erros['ps']))
                  {
                      $Campos_Erros['ps'] = array();
                  }
                  $Campos_Erros['ps'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['ps']) || !is_array($this->NM_ajax_info['errList']['ps']))
                  {
                      $this->NM_ajax_info['errList']['ps'] = array();
                  }
                  $this->NM_ajax_info['errList']['ps'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
          elseif (!empty($this->ps_salva) && $this->ps_limpa != "S")
          {
              $this->ps = $this->ps_salva;
          }
      } 
      elseif (!empty($this->ps_salva) && $this->ps_limpa != "S")
      {
          $this->ps = $this->ps_salva;
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
    $this->nmgp_dados_form['xmbh'] = $this->xmbh;
    $this->nmgp_dados_form['xmmc'] = $this->xmmc;
    $this->nmgp_dados_form['ysje'] = $this->ysje;
    $this->nmgp_dados_form['zjly'] = $this->zjly;
    $this->nmgp_dados_form['xmfzr'] = $this->xmfzr;
    $this->nmgp_dados_form['sbbm'] = $this->sbbm;
    $this->nmgp_dados_form['sbrq'] = $this->sbrq;
    $this->nmgp_dados_form['sbr'] = $this->sbr;
    $this->nmgp_dados_form['qwcgrq'] = $this->qwcgrq;
    $this->nmgp_dados_form['lxr'] = $this->lxr;
    $this->nmgp_dados_form['lxdh'] = $this->lxdh;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['bz'] = $this->bz;
    if (empty($this->fa))
    {
        $this->fa = $this->nmgp_dados_form['fa'];
    }
    $this->nmgp_dados_form['fa'] = $this->fa;
    $this->nmgp_dados_form['fa_limpa'] = $this->fa_limpa;
    if (empty($this->bg))
    {
        $this->bg = $this->nmgp_dados_form['bg'];
    }
    $this->nmgp_dados_form['bg'] = $this->bg;
    $this->nmgp_dados_form['bg_limpa'] = $this->bg_limpa;
    if (empty($this->ps))
    {
        $this->ps = $this->nmgp_dados_form['ps'];
    }
    $this->nmgp_dados_form['ps'] = $this->ps;
    $this->nmgp_dados_form['ps_limpa'] = $this->ps_limpa;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['cjsj'] = $this->cjsj;
    $this->nmgp_dados_form['shzt'] = $this->shzt;
    $this->nmgp_dados_form['ifjs'] = $this->ifjs;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      if (!empty($this->field_config['ysje']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp'], $this->field_config['ysje']['symbol_mon']);
         nm_limpa_valor($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp']);
      }
      nm_limpa_data($this->sbrq, $this->field_config['sbrq']['date_sep']) ; 
      nm_limpa_data($this->qwcgrq, $this->field_config['qwcgrq']['date_sep']) ; 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->cjsj, $this->field_config['cjsj']['date_sep']) ; 
      nm_limpa_hora($this->cjsj_hora, $this->field_config['cjsj']['time_sep']) ; 
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
      if ($Nome_Campo == "ysje")
      {
          if (!empty($this->field_config['ysje']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp'], $this->field_config['ysje']['symbol_mon']);
             nm_limpa_valor($this->ysje, $this->field_config['ysje']['symbol_dec'], $this->field_config['ysje']['symbol_grp']);
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
      if (!empty($this->ysje) || (!empty($format_fields) && isset($format_fields['ysje'])))
      {
          nmgp_Form_Num_Val($this->ysje, $this->field_config['ysje']['symbol_grp'], $this->field_config['ysje']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['ysje']['symbol_fmt']) ; 
      }
      if ((!empty($this->sbrq) && 'null' != $this->sbrq) || (!empty($format_fields) && isset($format_fields['sbrq'])))
      {
          nm_volta_data($this->sbrq, $this->field_config['sbrq']['date_format']) ; 
          nmgp_Form_Datas($this->sbrq, $this->field_config['sbrq']['date_format'], $this->field_config['sbrq']['date_sep']) ;  
      }
      elseif ('null' == $this->sbrq || '' == $this->sbrq)
      {
          $this->sbrq = '';
      }
      if ((!empty($this->qwcgrq) && 'null' != $this->qwcgrq) || (!empty($format_fields) && isset($format_fields['qwcgrq'])))
      {
          nm_volta_data($this->qwcgrq, $this->field_config['qwcgrq']['date_format']) ; 
          nmgp_Form_Datas($this->qwcgrq, $this->field_config['qwcgrq']['date_format'], $this->field_config['qwcgrq']['date_sep']) ;  
      }
      elseif ('null' == $this->qwcgrq || '' == $this->qwcgrq)
      {
          $this->qwcgrq = '';
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
      $guarda_format_hora = $this->field_config['sbrq']['date_format'];
      if ($this->sbrq != "")  
      { 
          nm_conv_data($this->sbrq, $this->field_config['sbrq']['date_format']) ; 
          $this->sbrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->sbrq_hora = substr($this->sbrq_hora, 0, -4);
          }
      } 
      if ($this->sbrq == "" && $use_null)  
      { 
          $this->sbrq = "null" ; 
      } 
      $this->field_config['sbrq']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['qwcgrq']['date_format'];
      if ($this->qwcgrq != "")  
      { 
          nm_conv_data($this->qwcgrq, $this->field_config['qwcgrq']['date_format']) ; 
          $this->qwcgrq_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->qwcgrq_hora = substr($this->qwcgrq_hora, 0, -4);
          }
      } 
      if ($this->qwcgrq == "" && $use_null)  
      { 
          $this->qwcgrq = "null" ; 
      } 
      $this->field_config['qwcgrq']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_xmbh();
          $this->ajax_return_values_xmmc();
          $this->ajax_return_values_ysje();
          $this->ajax_return_values_zjly();
          $this->ajax_return_values_xmfzr();
          $this->ajax_return_values_sbbm();
          $this->ajax_return_values_sbrq();
          $this->ajax_return_values_sbr();
          $this->ajax_return_values_qwcgrq();
          $this->ajax_return_values_lxr();
          $this->ajax_return_values_lxdh();
          $this->ajax_return_values_email();
          $this->ajax_return_values_bz();
          $this->ajax_return_values_fa();
          $this->ajax_return_values_bg();
          $this->ajax_return_values_ps();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_cg_cgjh_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- xmbh
   function ajax_return_values_xmbh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("xmbh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->xmbh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['xmbh'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- xmmc
   function ajax_return_values_xmmc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("xmmc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->xmmc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['xmmc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ysje
   function ajax_return_values_ysje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ysje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ysje);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ysje'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- zjly
   function ajax_return_values_zjly($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zjly", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zjly);
              $aLookup = array();
              $this->_tmp_lookup_zjly = $this->zjly;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly'] = array(); 
}
$aLookup[] = array(form_cg_cgjh_pack_protect_string('') => form_cg_cgjh_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_zjly 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_cgjh_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_cgjh_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_zjly'][] = $rs->fields[0];
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
          $sSelComp = "name=\"zjly\"";
          if (isset($this->NM_ajax_info['select_html']['zjly']) && !empty($this->NM_ajax_info['select_html']['zjly']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['zjly'];
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

                  if ($this->zjly == $sValue)
                  {
                      $this->_tmp_lookup_zjly = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['zjly'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['zjly']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['zjly']['valList'][$i] = form_cg_cgjh_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['zjly']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['zjly']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['zjly']['labList'] = $aLabel;
          }
   }

          //----- xmfzr
   function ajax_return_values_xmfzr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("xmfzr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->xmfzr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['xmfzr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sbbm
   function ajax_return_values_sbbm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sbbm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sbbm);
              $aLookup = array();
              $this->_tmp_lookup_sbbm = $this->sbbm;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm'] = array(); 
}
$aLookup[] = array(form_cg_cgjh_pack_protect_string('') => form_cg_cgjh_pack_protect_string('请选择'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_ysje = $this->ysje;
   $old_value_sbrq = $this->sbrq;
   $old_value_qwcgrq = $this->qwcgrq;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ysje = $this->ysje;
   $unformatted_value_sbrq = $this->sbrq;
   $unformatted_value_qwcgrq = $this->qwcgrq;

   $nm_comando = "SELECT mc, mc 
FROM dm_bm 
ORDER BY mc";

   $this->ysje = $old_value_ysje;
   $this->sbrq = $old_value_sbrq;
   $this->qwcgrq = $old_value_qwcgrq;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_cg_cgjh_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_cg_cgjh_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['Lookup_sbbm'][] = $rs->fields[0];
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
          $sSelComp = "name=\"sbbm\"";
          if (isset($this->NM_ajax_info['select_html']['sbbm']) && !empty($this->NM_ajax_info['select_html']['sbbm']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sbbm'];
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

                  if ($this->sbbm == $sValue)
                  {
                      $this->_tmp_lookup_sbbm = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sbbm'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sbbm']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sbbm']['valList'][$i] = form_cg_cgjh_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sbbm']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sbbm']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sbbm']['labList'] = $aLabel;
          }
   }

          //----- sbrq
   function ajax_return_values_sbrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sbrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sbrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sbrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sbr
   function ajax_return_values_sbr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sbr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sbr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sbr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- qwcgrq
   function ajax_return_values_qwcgrq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qwcgrq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qwcgrq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qwcgrq'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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

          //----- lxdh
   function ajax_return_values_lxdh($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lxdh", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lxdh);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lxdh'] = array(
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

          //----- fa
   function ajax_return_values_fa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fa);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->fa, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_fa_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile] = $this->fa;
              $tmp_file_fa = trim(NM_charset_to_utf8($this->fa));
              $tmp_icon_fa = '';
              if ('' != $tmp_file_fa)
              {
                  $tmp_icon_fa = $this->gera_icone($tmp_file_fa);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fa'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($sTmpValue),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('0', '" . $sTmpFile . "', 'form_cg_cgjh')\">" . $tmp_file_fa . "</a>",
               'docIcon' => $tmp_icon_fa,
              );
              if ('navigate_form' == $this->NM_ajax_opcao)
              {
                  $this->NM_ajax_info['fldList']['fa_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          }
   }

          //----- bg
   function ajax_return_values_bg($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bg", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bg);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->bg, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_bg_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile] = $this->bg;
              $tmp_file_bg = trim(NM_charset_to_utf8($this->bg));
              $tmp_icon_bg = '';
              if ('' != $tmp_file_bg)
              {
                  $tmp_icon_bg = $this->gera_icone($tmp_file_bg);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bg'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($sTmpValue),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('1', '" . $sTmpFile . "', 'form_cg_cgjh')\">" . $tmp_file_bg . "</a>",
               'docIcon' => $tmp_icon_bg,
              );
              if ('navigate_form' == $this->NM_ajax_opcao)
              {
                  $this->NM_ajax_info['fldList']['bg_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          }
   }

          //----- ps
   function ajax_return_values_ps($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ps", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ps);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->ps, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_ps_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile] = $this->ps;
              $tmp_file_ps = trim(NM_charset_to_utf8($this->ps));
              $tmp_icon_ps = '';
              if ('' != $tmp_file_ps)
              {
                  $tmp_icon_ps = $this->gera_icone($tmp_file_ps);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ps'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($sTmpValue),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('2', '" . $sTmpFile . "', 'form_cg_cgjh')\">" . $tmp_file_ps . "</a>",
               'docIcon' => $tmp_icon_ps,
              );
              if ('navigate_form' == $this->NM_ajax_opcao)
              {
                  $this->NM_ajax_info['fldList']['ps_salva'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_cg_cgjh']['contr_erro'] = 'on';
 if(empty($this->shzt )){
  $this->shzt ='未提交';
}
$_SESSION['scriptcase']['form_cg_cgjh']['contr_erro'] = 'off'; 
      }
      if (empty($this->cjsj))
      {
          $this->cjsj_hora = $this->cjsj;
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
      $this->ysje = str_replace($sc_parm1, $sc_parm2, $this->ysje); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->ysje = "'" . $this->ysje . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->ysje = str_replace("'", "", $this->ysje); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']))
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] = $rsc->fields[0];
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opcao'] = '';

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
      $NM_val_form['xmbh'] = $this->xmbh;
      $NM_val_form['xmmc'] = $this->xmmc;
      $NM_val_form['ysje'] = $this->ysje;
      $NM_val_form['zjly'] = $this->zjly;
      $NM_val_form['xmfzr'] = $this->xmfzr;
      $NM_val_form['sbbm'] = $this->sbbm;
      $NM_val_form['sbrq'] = $this->sbrq;
      $NM_val_form['sbr'] = $this->sbr;
      $NM_val_form['qwcgrq'] = $this->qwcgrq;
      $NM_val_form['lxr'] = $this->lxr;
      $NM_val_form['lxdh'] = $this->lxdh;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['bz'] = $this->bz;
      $NM_val_form['fa'] = $this->fa;
      $NM_val_form['bg'] = $this->bg;
      $NM_val_form['ps'] = $this->ps;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['cjsj'] = $this->cjsj;
      $NM_val_form['shzt'] = $this->shzt;
      $NM_val_form['ifjs'] = $this->ifjs;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->ysje == "")  
      { 
          $this->ysje = 0;
          $this->sc_force_zero[] = 'ysje';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->xmbh_before_qstr = $this->xmbh;
          $this->xmbh = substr($this->Db->qstr($this->xmbh), 1, -1); 
          $this->xmmc_before_qstr = $this->xmmc;
          $this->xmmc = substr($this->Db->qstr($this->xmmc), 1, -1); 
          $this->zjly_before_qstr = $this->zjly;
          $this->zjly = substr($this->Db->qstr($this->zjly), 1, -1); 
          $this->xmfzr_before_qstr = $this->xmfzr;
          $this->xmfzr = substr($this->Db->qstr($this->xmfzr), 1, -1); 
          if ($this->sbrq == "")  
          { 
              $this->sbrq = "null"; 
              $NM_val_null[] = "sbrq";
          } 
          $this->sbbm_before_qstr = $this->sbbm;
          $this->sbbm = substr($this->Db->qstr($this->sbbm), 1, -1); 
          $this->sbr_before_qstr = $this->sbr;
          $this->sbr = substr($this->Db->qstr($this->sbr), 1, -1); 
          if ($this->qwcgrq == "")  
          { 
              $this->qwcgrq = "null"; 
              $NM_val_null[] = "qwcgrq";
          } 
          $this->lxr_before_qstr = $this->lxr;
          $this->lxr = substr($this->Db->qstr($this->lxr), 1, -1); 
          $this->lxdh_before_qstr = $this->lxdh;
          $this->lxdh = substr($this->Db->qstr($this->lxdh), 1, -1); 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          $this->bz_before_qstr = $this->bz;
          $this->bz = substr($this->Db->qstr($this->bz), 1, -1); 
          $this->fa_original_filename = $this->fa; 
          $this->fa_before_qstr = $this->fa;
          $this->fa = substr($this->Db->qstr($this->fa), 1, -1); 
          $this->bg_original_filename = $this->bg; 
          $this->bg_before_qstr = $this->bg;
          $this->bg = substr($this->Db->qstr($this->bg), 1, -1); 
          $this->ps_original_filename = $this->ps; 
          $this->ps_before_qstr = $this->ps;
          $this->ps = substr($this->Db->qstr($this->ps), 1, -1); 
          if ($this->cjsj == "")  
          { 
              $this->cjsj = "null"; 
              $NM_val_null[] = "cjsj";
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['decimal_db'] == ",") 
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
                 form_cg_cgjh_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where (xmbh = '" . $this->xmbh . "') AND (id <> $this->id)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " " . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'xmbh';
              }
              $rsUni->Close();
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where (xmmc = '" . $this->xmmc . "') AND (id <> $this->id)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " " . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'xmmc';
              }
              $rsUni->Close();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET xmbh = '$this->xmbh', xmmc = '$this->xmmc', ysje = $this->ysje, zjly = '$this->zjly', xmfzr = '$this->xmfzr', sbrq = " . $this->Ini->date_delim . $this->sbrq . $this->Ini->date_delim1 . ", sbbm = '$this->sbbm', sbr = '$this->sbr', qwcgrq = " . $this->Ini->date_delim . $this->qwcgrq . $this->Ini->date_delim1 . ", lxr = '$this->lxr', lxdh = '$this->lxdh', email = '$this->email', bz = '$this->bz'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET xmbh = '$this->xmbh', xmmc = '$this->xmmc', ysje = $this->ysje, zjly = '$this->zjly', xmfzr = '$this->xmfzr', sbrq = " . $this->Ini->date_delim . $this->sbrq . $this->Ini->date_delim1 . ", sbbm = '$this->sbbm', sbr = '$this->sbr', qwcgrq = " . $this->Ini->date_delim . $this->qwcgrq . $this->Ini->date_delim1 . ", lxr = '$this->lxr', lxdh = '$this->lxdh', email = '$this->email', bz = '$this->bz'";  
              } 
              if (isset($NM_val_form['cjsj']) && $NM_val_form['cjsj'] != $this->nmgp_dados_select['cjsj']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " cjsj = " . $this->Ini->date_delim . $this->cjsj . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " cjsj = " . $this->Ini->date_delim . $this->cjsj . $this->Ini->date_delim1 . ""; 
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
              $temp_cmd_sql = "";
              if ($this->fa_limpa == "S") 
              { 
                  if ($this->fa != "null") 
                  { 
                      $this->fa = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", fa = '" . $this->fa . "'"; 
                      $comando_oracle .= ", fa = '" . $this->fa . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " fa = '" . $this->fa . "'"; 
                     $comando_oracle .= " fa = '" . $this->fa . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->fa = "";
              } 
              else 
              { 
                  if ($this->fa != "none" && $this->fa != "") 
                  { 
                      $NM_conteudo =  $this->fa;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", fa = '$NM_conteudo'" ; 
                          $comando_oracle .= ", fa = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " fa = '$NM_conteudo'" ; 
                          $comando_oracle .= " fa = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "fa";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              $temp_cmd_sql = "";
              if ($this->bg_limpa == "S") 
              { 
                  if ($this->bg != "null") 
                  { 
                      $this->bg = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", bg = '" . $this->bg . "'"; 
                      $comando_oracle .= ", bg = '" . $this->bg . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " bg = '" . $this->bg . "'"; 
                     $comando_oracle .= " bg = '" . $this->bg . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->bg = "";
              } 
              else 
              { 
                  if ($this->bg != "none" && $this->bg != "") 
                  { 
                      $NM_conteudo =  $this->bg;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", bg = '$NM_conteudo'" ; 
                          $comando_oracle .= ", bg = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " bg = '$NM_conteudo'" ; 
                          $comando_oracle .= " bg = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "bg";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              $temp_cmd_sql = "";
              if ($this->ps_limpa == "S") 
              { 
                  if ($this->ps != "null") 
                  { 
                      $this->ps = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", ps = '" . $this->ps . "'"; 
                      $comando_oracle .= ", ps = '" . $this->ps . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " ps = '" . $this->ps . "'"; 
                     $comando_oracle .= " ps = '" . $this->ps . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->ps = "";
              } 
              else 
              { 
                  if ($this->ps != "none" && $this->ps != "") 
                  { 
                      $NM_conteudo =  $this->ps;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", ps = '$NM_conteudo'" ; 
                          $comando_oracle .= ", ps = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " ps = '$NM_conteudo'" ; 
                          $comando_oracle .= " ps = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "ps";
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
                                  form_cg_cgjh_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->fa_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['fa_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->bg_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['bg_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->ps_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['ps_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->xmbh = $this->xmbh_before_qstr;
          $this->xmmc = $this->xmmc_before_qstr;
          $this->zjly = $this->zjly_before_qstr;
          $this->xmfzr = $this->xmfzr_before_qstr;
          $this->sbbm = $this->sbbm_before_qstr;
          $this->sbr = $this->sbr_before_qstr;
          $this->lxr = $this->lxr_before_qstr;
          $this->lxdh = $this->lxdh_before_qstr;
          $this->email = $this->email_before_qstr;
          $this->bz = $this->bz_before_qstr;
          $this->fa = $this->fa_before_qstr;
          $this->bg = $this->bg_before_qstr;
          $this->ps = $this->ps_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['xmbh'])) { $this->xmbh = $NM_val_form['xmbh']; }
              elseif (isset($this->xmbh)) { $this->nm_limpa_alfa($this->xmbh); }
              if     (isset($NM_val_form) && isset($NM_val_form['xmmc'])) { $this->xmmc = $NM_val_form['xmmc']; }
              elseif (isset($this->xmmc)) { $this->nm_limpa_alfa($this->xmmc); }
              if     (isset($NM_val_form) && isset($NM_val_form['ysje'])) { $this->ysje = $NM_val_form['ysje']; }
              elseif (isset($this->ysje)) { $this->nm_limpa_alfa($this->ysje); }
              if     (isset($NM_val_form) && isset($NM_val_form['zjly'])) { $this->zjly = $NM_val_form['zjly']; }
              elseif (isset($this->zjly)) { $this->nm_limpa_alfa($this->zjly); }
              if     (isset($NM_val_form) && isset($NM_val_form['xmfzr'])) { $this->xmfzr = $NM_val_form['xmfzr']; }
              elseif (isset($this->xmfzr)) { $this->nm_limpa_alfa($this->xmfzr); }
              if     (isset($NM_val_form) && isset($NM_val_form['sbbm'])) { $this->sbbm = $NM_val_form['sbbm']; }
              elseif (isset($this->sbbm)) { $this->nm_limpa_alfa($this->sbbm); }
              if     (isset($NM_val_form) && isset($NM_val_form['sbr'])) { $this->sbr = $NM_val_form['sbr']; }
              elseif (isset($this->sbr)) { $this->nm_limpa_alfa($this->sbr); }
              if     (isset($NM_val_form) && isset($NM_val_form['lxr'])) { $this->lxr = $NM_val_form['lxr']; }
              elseif (isset($this->lxr)) { $this->nm_limpa_alfa($this->lxr); }
              if     (isset($NM_val_form) && isset($NM_val_form['lxdh'])) { $this->lxdh = $NM_val_form['lxdh']; }
              elseif (isset($this->lxdh)) { $this->nm_limpa_alfa($this->lxdh); }
              if     (isset($NM_val_form) && isset($NM_val_form['email'])) { $this->email = $NM_val_form['email']; }
              elseif (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
              if     (isset($NM_val_form) && isset($NM_val_form['bz'])) { $this->bz = $NM_val_form['bz']; }
              elseif (isset($this->bz)) { $this->nm_limpa_alfa($this->bz); }

              $this->nm_formatar_campos();

              $bChange_fa = false;
              if (isset($this->fa_original_filename) && '' != $this->fa_original_filename && $this->fa_original_filename != $this->fa)
              {
                  $sTmpOrig_fa = $this->fa;
                  $this->fa    = $this->fa_original_filename;
                  $bChange_fa  = true;
              }

              $bChange_bg = false;
              if (isset($this->bg_original_filename) && '' != $this->bg_original_filename && $this->bg_original_filename != $this->bg)
              {
                  $sTmpOrig_bg = $this->bg;
                  $this->bg    = $this->bg_original_filename;
                  $bChange_bg  = true;
              }

              $bChange_ps = false;
              if (isset($this->ps_original_filename) && '' != $this->ps_original_filename && $this->ps_original_filename != $this->ps)
              {
                  $sTmpOrig_ps = $this->ps;
                  $this->ps    = $this->ps_original_filename;
                  $bChange_ps  = true;
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('xmbh', 'xmmc', 'ysje', 'zjly', 'xmfzr', 'sbbm', 'sbrq', 'sbr', 'qwcgrq', 'lxr', 'lxdh', 'email', 'bz', 'fa', 'bg', 'ps'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if ($bChange_fa)
              {
                  $this->fa                   = $sTmpOrig_fa;
                  $this->fa_original_filename = '';
              }

              if ($bChange_bg)
              {
                  $this->bg                   = $sTmpOrig_bg;
                  $this->bg_original_filename = '';
              }

              if ($bChange_ps)
              {
                  $this->ps                   = $sTmpOrig_ps;
                  $this->ps_original_filename = '';
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
              $this->cjsj =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->cjsj_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where xmbh = '" . $this->xmbh . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " " . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmbh'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'xmbh';
              }
              $rsUni->Close();
              $Cmd_Unique = "select count(*) from " . $this->Ini->nm_tabela . " where xmmc = '" . $this->xmmc . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " " . $this->Ini->Nm_lang['lang_cg_cgjh_fld_xmmc'] . ""); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'xmmc';
              }
              $rsUni->Close();
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cg_cgjh_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $dir_file = $this->Ini->path_doc . "cglx" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->fa_scfile_name, $dir_file, "fa");
              if (trim($this->fa_scfile_name) != $_test_file)
              {
                  $this->fa_scfile_name = $_test_file;
                  $this->fa = $_test_file;
              }
              $dir_file = $this->Ini->path_doc . "cglx" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->bg_scfile_name, $dir_file, "bg");
              if (trim($this->bg_scfile_name) != $_test_file)
              {
                  $this->bg_scfile_name = $_test_file;
                  $this->bg = $_test_file;
              }
              $dir_file = $this->Ini->path_doc . "cglx" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->ps_scfile_name, $dir_file, "ps");
              if (trim($this->ps_scfile_name) != $_test_file)
              {
                  $this->ps_scfile_name = $_test_file;
                  $this->ps = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "xmbh, xmmc, ysje, zjly, xmfzr, sbrq, sbbm, sbr, qwcgrq, lxr, lxdh, email, bz, fa, bg, ps, cjsj, shzt, ifjs) VALUES (" . $NM_seq_auto . "'$this->xmbh', '$this->xmmc', $this->ysje, '$this->zjly', '$this->xmfzr', " . $this->Ini->date_delim . $this->sbrq . $this->Ini->date_delim1 . ", '$this->sbbm', '$this->sbr', " . $this->Ini->date_delim . $this->qwcgrq . $this->Ini->date_delim1 . ", '$this->lxr', '$this->lxdh', '$this->email', '$this->bz', '$this->fa', '$this->bg', '$this->ps', " . $this->Ini->date_delim . $this->cjsj . $this->Ini->date_delim1 . ", '$this->shzt', '$this->ifjs')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "xmbh, xmmc, ysje, zjly, xmfzr, sbrq, sbbm, sbr, qwcgrq, lxr, lxdh, email, bz, fa, bg, ps, cjsj, shzt, ifjs) VALUES (" . $NM_seq_auto . "'$this->xmbh', '$this->xmmc', $this->ysje, '$this->zjly', '$this->xmfzr', " . $this->Ini->date_delim . $this->sbrq . $this->Ini->date_delim1 . ", '$this->sbbm', '$this->sbr', " . $this->Ini->date_delim . $this->qwcgrq . $this->Ini->date_delim1 . ", '$this->lxr', '$this->lxdh', '$this->email', '$this->bz', '$this->fa', '$this->bg', '$this->ps', " . $this->Ini->date_delim . $this->cjsj . $this->Ini->date_delim1 . ", '$this->shzt', '$this->ifjs')"; 
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
                              form_cg_cgjh_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']);
              }

              $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
              $arq_fa = fopen($this->SC_DOC_fa, "r") ; 
              $reg_fa = fread($arq_fa, filesize($this->SC_DOC_fa)) ; 
              fclose($arq_fa) ;  
              $arq_fa = fopen($dir_doc . trim($this->fa_scfile_name), "w") ; 
              fwrite($arq_fa, $reg_fa) ;  
              fclose($arq_fa) ;  
              $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
              $arq_bg = fopen($this->SC_DOC_bg, "r") ; 
              $reg_bg = fread($arq_bg, filesize($this->SC_DOC_bg)) ; 
              fclose($arq_bg) ;  
              $arq_bg = fopen($dir_doc . trim($this->bg_scfile_name), "w") ; 
              fwrite($arq_bg, $reg_bg) ;  
              fclose($arq_bg) ;  
              $dir_doc = $this->Ini->path_doc . "cglx" . "/"; 
              $arq_ps = fopen($this->SC_DOC_ps, "r") ; 
              $reg_ps = fread($arq_ps, filesize($this->SC_DOC_ps)) ; 
              fclose($arq_ps) ;  
              $arq_ps = fopen($dir_doc . trim($this->ps_scfile_name), "w") ; 
              fwrite($arq_ps, $reg_ps) ;  
              fclose($arq_ps) ;  
              $this->sc_evento = "insert"; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['decimal_db'] == ",") 
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
                          form_cg_cgjh_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['fa'] = ""; 
      $this->fa_limpa = ""; 
      $this->fa_salva = ""; 
      $this->nmgp_dados_form['bg'] = ""; 
      $this->bg_limpa = ""; 
      $this->bg_salva = ""; 
      $this->nmgp_dados_form['ps'] = ""; 
      $this->ps_limpa = ""; 
      $this->ps_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['parms'] = ""; 
          $nmgp_select = "SELECT id, xmbh, xmmc, ysje, zjly, xmfzr, sbrq, sbbm, sbr, qwcgrq, lxr, lxdh, email, bz, fa, bg, ps, cjsj, shzt, ifjs from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['select'] = ""; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter'] = true;
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
              $this->xmbh = $rs->fields[1] ; 
              $this->nmgp_dados_select['xmbh'] = $this->xmbh;
              $this->xmmc = $rs->fields[2] ; 
              $this->nmgp_dados_select['xmmc'] = $this->xmmc;
              $this->ysje = $rs->fields[3] ; 
              $this->nmgp_dados_select['ysje'] = $this->ysje;
              $this->zjly = $rs->fields[4] ; 
              $this->nmgp_dados_select['zjly'] = $this->zjly;
              $this->xmfzr = $rs->fields[5] ; 
              $this->nmgp_dados_select['xmfzr'] = $this->xmfzr;
              $this->sbrq = $rs->fields[6] ; 
              $this->nmgp_dados_select['sbrq'] = $this->sbrq;
              $this->sbbm = $rs->fields[7] ; 
              $this->nmgp_dados_select['sbbm'] = $this->sbbm;
              $this->sbr = $rs->fields[8] ; 
              $this->nmgp_dados_select['sbr'] = $this->sbr;
              $this->qwcgrq = $rs->fields[9] ; 
              $this->nmgp_dados_select['qwcgrq'] = $this->qwcgrq;
              $this->lxr = $rs->fields[10] ; 
              $this->nmgp_dados_select['lxr'] = $this->lxr;
              $this->lxdh = $rs->fields[11] ; 
              $this->nmgp_dados_select['lxdh'] = $this->lxdh;
              $this->email = $rs->fields[12] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->bz = $rs->fields[13] ; 
              $this->nmgp_dados_select['bz'] = $this->bz;
              $this->fa = $rs->fields[14] ; 
              $this->nmgp_dados_select['fa'] = $this->fa;
              $this->bg = $rs->fields[15] ; 
              $this->nmgp_dados_select['bg'] = $this->bg;
              $this->ps = $rs->fields[16] ; 
              $this->nmgp_dados_select['ps'] = $this->ps;
              $this->cjsj = $rs->fields[17] ; 
              if (substr($this->cjsj, 10, 1) == "-") 
              { 
                 $this->cjsj = substr($this->cjsj, 0, 10) . " " . substr($this->cjsj, 11);
              } 
              if (substr($this->cjsj, 13, 1) == ".") 
              { 
                 $this->cjsj = substr($this->cjsj, 0, 13) . ":" . substr($this->cjsj, 14, 2) . ":" . substr($this->cjsj, 17);
              } 
              $this->nmgp_dados_select['cjsj'] = $this->cjsj;
              $this->shzt = $rs->fields[18] ; 
              $this->nmgp_dados_select['shzt'] = $this->shzt;
              $this->ifjs = $rs->fields[19] ; 
              $this->nmgp_dados_select['ifjs'] = $this->ifjs;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->ysje = (string)$this->ysje; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sub_dir'][0]  = "cglx";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sub_dir'][1]  = "cglx";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sub_dir'][2]  = "cglx";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select'] = $this->nmgp_dados_select;
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
              $this->xmbh = "";  
              $this->xmmc = "";  
              $this->ysje = "";  
              $this->zjly = "";  
              $this->xmfzr = "";  
              $this->sbrq = "";  
              $this->sbrq_hora = "" ;  
              $this->sbbm = "";  
              $this->sbr = "" . $_SESSION['usr_name'] . "";  
              $this->qwcgrq = "";  
              $this->qwcgrq_hora = "" ;  
              $this->lxr = "";  
              $this->lxdh = "";  
              $this->email = "";  
              $this->bz = "";  
              $this->fa = "";  
              $this->fa_ul_name = "" ;  
              $this->fa_ul_type = "" ;  
              $this->bg = "";  
              $this->bg_ul_name = "" ;  
              $this->bg_ul_type = "" ;  
              $this->ps = "";  
              $this->ps_ul_name = "" ;  
              $this->ps_ul_type = "" ;  
              $this->cjsj = "";  
              $this->cjsj_hora = "" ;  
              $this->shzt = "";  
              $this->ifjs = "";  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select'];
                  $this->xmbh = $this->nmgp_dados_select['xmbh'];  
                  $this->xmmc = $this->nmgp_dados_select['xmmc'];  
                  $this->ysje = $this->nmgp_dados_select['ysje'];  
                  $this->zjly = $this->nmgp_dados_select['zjly'];  
                  $this->xmfzr = $this->nmgp_dados_select['xmfzr'];  
                  $this->sbrq = $this->nmgp_dados_select['sbrq'];  
                  $this->sbbm = $this->nmgp_dados_select['sbbm'];  
                  $this->sbr = $this->nmgp_dados_select['sbr'];  
                  $this->qwcgrq = $this->nmgp_dados_select['qwcgrq'];  
                  $this->lxr = $this->nmgp_dados_select['lxr'];  
                  $this->lxdh = $this->nmgp_dados_select['lxdh'];  
                  $this->email = $this->nmgp_dados_select['email'];  
                  $this->bz = $this->nmgp_dados_select['bz'];  
                  $this->fa = $this->nmgp_dados_select['fa'];  
                  $this->bg = $this->nmgp_dados_select['bg'];  
                  $this->ps = $this->nmgp_dados_select['ps'];  
                  $this->cjsj = $this->nmgp_dados_select['cjsj'];  
                  $this->shzt = $this->nmgp_dados_select['shzt'];  
                  $this->ifjs = $this->nmgp_dados_select['ifjs'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['foreign_key'] as $sFKName => $sFKValue)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['dados_select'];
           $this->SC_log_arr['fields']['xmbh']['0'] =  $nmgp_dados_select['xmbh'];
           $this->SC_log_arr['fields']['xmmc']['0'] =  $nmgp_dados_select['xmmc'];
           $this->SC_log_arr['fields']['ysje']['0'] =  $nmgp_dados_select['ysje'];
           $this->SC_log_arr['fields']['zjly']['0'] =  $nmgp_dados_select['zjly'];
           $this->SC_log_arr['fields']['xmfzr']['0'] =  $nmgp_dados_select['xmfzr'];
           $this->SC_log_arr['fields']['sbrq']['0'] =  $nmgp_dados_select['sbrq'];
           $this->SC_log_arr['fields']['sbbm']['0'] =  $nmgp_dados_select['sbbm'];
           $this->SC_log_arr['fields']['sbr']['0'] =  $nmgp_dados_select['sbr'];
           $this->SC_log_arr['fields']['qwcgrq']['0'] =  $nmgp_dados_select['qwcgrq'];
           $this->SC_log_arr['fields']['lxr']['0'] =  $nmgp_dados_select['lxr'];
           $this->SC_log_arr['fields']['lxdh']['0'] =  $nmgp_dados_select['lxdh'];
           $this->SC_log_arr['fields']['email']['0'] =  $nmgp_dados_select['email'];
           $this->SC_log_arr['fields']['bz']['0'] =  $nmgp_dados_select['bz'];
           $this->SC_log_arr['fields']['fa']['0'] =  $nmgp_dados_select['fa'];
           $this->SC_log_arr['fields']['bg']['0'] =  $nmgp_dados_select['bg'];
           $this->SC_log_arr['fields']['ps']['0'] =  $nmgp_dados_select['ps'];
           $this->SC_log_arr['fields']['cjsj']['0'] =  $nmgp_dados_select['cjsj'];
           $this->SC_log_arr['fields']['shzt']['0'] =  $nmgp_dados_select['shzt'];
           $this->SC_log_arr['fields']['ifjs']['0'] =  $nmgp_dados_select['ifjs'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['xmbh']['1'] =  $this->xmbh;
       $this->SC_log_arr['fields']['xmmc']['1'] =  $this->xmmc;
       $this->SC_log_arr['fields']['ysje']['1'] =  $this->ysje;
       $this->SC_log_arr['fields']['zjly']['1'] =  $this->zjly;
       $this->SC_log_arr['fields']['xmfzr']['1'] =  $this->xmfzr;
       $this->SC_log_arr['fields']['sbrq']['1'] =  $this->sbrq;
       $this->SC_log_arr['fields']['sbbm']['1'] =  $this->sbbm;
       $this->SC_log_arr['fields']['sbr']['1'] =  $this->sbr;
       $this->SC_log_arr['fields']['qwcgrq']['1'] =  $this->qwcgrq;
       $this->SC_log_arr['fields']['lxr']['1'] =  $this->lxr;
       $this->SC_log_arr['fields']['lxdh']['1'] =  $this->lxdh;
       $this->SC_log_arr['fields']['email']['1'] =  $this->email;
       $this->SC_log_arr['fields']['bz']['1'] =  $this->bz;
       $this->SC_log_arr['fields']['fa']['1'] =  $this->fa;
       $this->SC_log_arr['fields']['bg']['1'] =  $this->bg;
       $this->SC_log_arr['fields']['ps']['1'] =  $this->ps;
       $this->SC_log_arr['fields']['cjsj']['1'] =  $this->cjsj;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cg_cgjh_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->fa != "" && $this->fa != "none")   
   { 
       $sTmpExtension = pathinfo($this->fa, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_fa = 'sc_fa_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile_fa] = $this->fa;
   } 
   if ($this->bg != "" && $this->bg != "none")   
   { 
       $sTmpExtension = pathinfo($this->bg, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_bg = 'sc_bg_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile_bg] = $this->bg;
   } 
   if ($this->ps != "" && $this->ps != "none")   
   { 
       $sTmpExtension = pathinfo($this->ps, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_ps = 'sc_ps_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['download_filenames'][$sTmpFile_ps] = $this->ps;
   } 
    include_once("form_cg_cgjh_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cg_cgjh_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "xmbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xmmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ysje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_zjly($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "zjly", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xmfzr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sbbm($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sbbm", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "sbr", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "qwcgrq", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxdh", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "fa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bg", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ps", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "xmbh", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xmmc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ysje", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_zjly($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "zjly", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "xmfzr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sbbm($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sbbm", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "sbr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lxdh", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "fa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bg", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ps", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cg_cgjh = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['total'] = $qt_geral_reg_form_cg_cgjh;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_cgjh_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cg_cgjh_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "ysje";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['decimal_db'] == ".")
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
      $Nm_datas['sbrq'] = "date";$Nm_datas['qwcgrq'] = "date";$Nm_datas['cjsj'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['SC_sep_date1'];
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
   function SC_lookup_zjly($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_zjly WHERE (mc LIKE '%$campo%')" ; 
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
   function SC_lookup_sbbm($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT mc, mc FROM dm_bm WHERE (mc LIKE '%$campo%')" ; 
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_cg_cgjh_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cg_cgjh_fim.php";
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
       form_cg_cgjh_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cg_cgjh']['masterValue']);
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
