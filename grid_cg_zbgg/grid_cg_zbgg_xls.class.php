<?php

class grid_cg_zbgg_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $Arquivo;
   var $Tit_doc;
   //---- 
   function grid_cg_zbgg_xls()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_col    = 0;
      $this->nm_data    = new nm_data("zh_cn");
      $this->Arquivo    = "sc_xls";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_cg_zbgg";
      $this->Arquivo   .= ".xls";
      $this->Tit_doc    = "grid_cg_zbgg.xls";
      $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );;
      $this->Xls_dados = new PHPExcel();
      $this->Xls_dados->setActiveSheetIndex(0);
      $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
      if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
      {
          $this->Nm_ActiveSheet->setRightToLeft(true);
      }
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_zbgg']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_zbgg']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_zbgg']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['campos_busca'];
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
          $this->cgfs = $Busca_temp['cgfs']; 
          $tmp_pos = strpos($this->cgfs, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgfs = substr($this->cgfs, 0, $tmp_pos);
          }
          $this->shzt = $Busca_temp['shzt']; 
          $tmp_pos = strpos($this->shzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shzt = substr($this->shzt, 0, $tmp_pos);
          }
          $this->zbkssj = $Busca_temp['zbkssj']; 
          $tmp_pos = strpos($this->zbkssj, "##@@");
          if ($tmp_pos !== false)
          {
              $this->zbkssj = substr($this->zbkssj, 0, $tmp_pos);
          }
          $this->zbkssj_2 = $Busca_temp['zbkssj_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->Sub_Consultas[] = "splcxx";
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id, cgbbh, cgbmc, bzj, bsf, zbkssj, shzt, cgfs, bskssj, bsjssj, xckssj, xcjssj, zbjssj, lxr, bgdh, yddh, fax, email, postcode, dz, kfh, yhzh, xmsm from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id, cgbbh, cgbmc, bzj, bsf, zbkssj, shzt, cgfs, bskssj, bsjssj, xckssj, xcjssj, zbjssj, lxr, bgdh, yddh, fax, email, postcode, dz, kfh, yhzh, xmsm from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_id'] . "";
      $this->New_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_cgbbh'] . "";
      $this->New_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_cgbmc'] . "";
      $this->New_label['bzj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_bzj'] . "";
      $this->New_label['bsf'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_bsf'] . "";
      $this->New_label['zbkssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_zbkssj'] . "";
      $this->New_label['shzt'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_shzt'] . "";
      $this->New_label['cgfs'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_cgfs'] . "";
      $this->New_label['bskssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_bskssj'] . "";
      $this->New_label['bsjssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_bsjssj'] . "";
      $this->New_label['xckssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_xckssj'] . "";
      $this->New_label['xcjssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_xcjssj'] . "";
      $this->New_label['zbjssj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_zbjssj'] . "";
      $this->New_label['lxr'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_lxr'] . "";
      $this->New_label['bgdh'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_bgdh'] . "";
      $this->New_label['yddh'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_yddh'] . "";
      $this->New_label['fax'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_fax'] . "";
      $this->New_label['email'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_email'] . "";
      $this->New_label['postcode'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_postcode'] . "";
      $this->New_label['dz'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_dz'] . "";
      $this->New_label['kfh'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_kfh'] . "";
      $this->New_label['yhzh'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_yhzh'] . "";
      $this->New_label['xmsm'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_xmsm'] . "";
      $this->New_label['wzqd'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_wzqd'] . "";
      $this->New_label['zbfile'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_zbfile'] . "";
      $this->New_label['ybqy'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_ybqy'] . "";
      $this->New_label['shsj'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_shsj'] . "";
      $this->New_label['sfjs'] = "" . $this->Ini->Nm_lang['lang_cg_zbgg_fld_sfjs'] . "";

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : ""; 
          if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cgbbh'])) ? $this->New_label['cgbbh'] : ""; 
          if ($Cada_col == "cgbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cgbmc'])) ? $this->New_label['cgbmc'] : ""; 
          if ($Cada_col == "cgbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['bzj'])) ? $this->New_label['bzj'] : ""; 
          if ($Cada_col == "bzj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['bsf'])) ? $this->New_label['bsf'] : ""; 
          if ($Cada_col == "bsf" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['zbkssj'])) ? $this->New_label['zbkssj'] : ""; 
          if ($Cada_col == "zbkssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['shzt'])) ? $this->New_label['shzt'] : ""; 
          if ($Cada_col == "shzt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['splc'])) ? $this->New_label['splc'] : "操作"; 
          if ($Cada_col == "splc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cgfs'])) ? $this->New_label['cgfs'] : ""; 
          if ($Cada_col == "cgfs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['bskssj'])) ? $this->New_label['bskssj'] : ""; 
          if ($Cada_col == "bskssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['bsjssj'])) ? $this->New_label['bsjssj'] : ""; 
          if ($Cada_col == "bsjssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['xckssj'])) ? $this->New_label['xckssj'] : ""; 
          if ($Cada_col == "xckssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['xcjssj'])) ? $this->New_label['xcjssj'] : ""; 
          if ($Cada_col == "xcjssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['zbjssj'])) ? $this->New_label['zbjssj'] : ""; 
          if ($Cada_col == "zbjssj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['lxr'])) ? $this->New_label['lxr'] : ""; 
          if ($Cada_col == "lxr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['bgdh'])) ? $this->New_label['bgdh'] : ""; 
          if ($Cada_col == "bgdh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['yddh'])) ? $this->New_label['yddh'] : ""; 
          if ($Cada_col == "yddh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['fax'])) ? $this->New_label['fax'] : ""; 
          if ($Cada_col == "fax" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : ""; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['postcode'])) ? $this->New_label['postcode'] : ""; 
          if ($Cada_col == "postcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['dz'])) ? $this->New_label['dz'] : ""; 
          if ($Cada_col == "dz" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['kfh'])) ? $this->New_label['kfh'] : ""; 
          if ($Cada_col == "kfh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['yhzh'])) ? $this->New_label['yhzh'] : ""; 
          if ($Cada_col == "yhzh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['xmsm'])) ? $this->New_label['xmsm'] : ""; 
          if ($Cada_col == "xmsm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->cgbbh = $rs->fields[1] ;  
         $this->cgbmc = $rs->fields[2] ;  
         $this->bzj = $rs->fields[3] ;  
         $this->bzj =  str_replace(",", ".", $this->bzj);
         $this->bzj = (string)$this->bzj;
         $this->bsf = $rs->fields[4] ;  
         $this->bsf =  str_replace(",", ".", $this->bsf);
         $this->bsf = (string)$this->bsf;
         $this->zbkssj = $rs->fields[5] ;  
         $this->shzt = $rs->fields[6] ;  
         $this->cgfs = $rs->fields[7] ;  
         $this->bskssj = $rs->fields[8] ;  
         $this->bsjssj = $rs->fields[9] ;  
         $this->xckssj = $rs->fields[10] ;  
         $this->xcjssj = $rs->fields[11] ;  
         $this->zbjssj = $rs->fields[12] ;  
         $this->lxr = $rs->fields[13] ;  
         $this->bgdh = $rs->fields[14] ;  
         $this->yddh = $rs->fields[15] ;  
         $this->fax = $rs->fields[16] ;  
         $this->email = $rs->fields[17] ;  
         $this->postcode = $rs->fields[18] ;  
         $this->dz = $rs->fields[19] ;  
         $this->kfh = $rs->fields[20] ;  
         $this->yhzh = $rs->fields[21] ;  
         $this->xmsm = $rs->fields[22] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cg_zbgg']['contr_erro'] = 'on';
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
			  $bm="项目采购部门";  
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
$_SESSION['scriptcase']['grid_cg_zbgg']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['field_order'] as $Cada_col)
         { 
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if (isset($this->NM_Row_din[$this->Xls_row]))
         { 
             $this->Nm_ActiveSheet->getRowDimension($this->Xls_row)->setRowHeight($this->NM_Row_din[$this->Xls_row]);
         } 
         $rs->MoveNext();
      }
      if (isset($this->NM_Col_din))
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      $rs->Close();
      $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
      $objWriter->save($this->Xls_f);
   }
   //----- id
   function NM_export_id()
   {
         if (!NM_is_utf8($this->id))
         {
             $this->id = sc_convert_encoding($this->id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->id))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->id);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgbbh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgbmc, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- bzj
   function NM_export_bzj()
   {
         if (!NM_is_utf8($this->bzj))
         {
             $this->bzj = sc_convert_encoding($this->bzj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->bzj))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->bzj);
         $this->Xls_col++;
   }
   //----- bsf
   function NM_export_bsf()
   {
         if (!NM_is_utf8($this->bsf))
         {
             $this->bsf = sc_convert_encoding($this->bsf, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->bsf))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->bsf);
         $this->Xls_col++;
   }
   //----- zbkssj
   function NM_export_zbkssj()
   {
      if (!empty($this->zbkssj))
      {
         if (substr($this->zbkssj, 10, 1) == "-") 
         { 
             $this->zbkssj = substr($this->zbkssj, 0, 10) . " " . substr($this->zbkssj, 11);
         } 
         if (substr($this->zbkssj, 13, 1) == ".") 
         { 
            $this->zbkssj = substr($this->zbkssj, 0, 13) . ":" . substr($this->zbkssj, 14, 2) . ":" . substr($this->zbkssj, 17);
         } 
         $conteudo_x = $this->zbkssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->zbkssj, "YYYY-MM-DD HH:II:SS");
             $this->zbkssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->zbkssj))
         {
             $this->zbkssj = sc_convert_encoding($this->zbkssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->zbkssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->shzt, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->splc, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- cgfs
   function NM_export_cgfs()
   {
         $this->cgfs = html_entity_decode($this->cgfs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgfs = strip_tags($this->cgfs);
         if (!NM_is_utf8($this->cgfs))
         {
             $this->cgfs = sc_convert_encoding($this->cgfs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgfs, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- bskssj
   function NM_export_bskssj()
   {
      if (!empty($this->bskssj))
      {
         if (substr($this->bskssj, 10, 1) == "-") 
         { 
             $this->bskssj = substr($this->bskssj, 0, 10) . " " . substr($this->bskssj, 11);
         } 
         if (substr($this->bskssj, 13, 1) == ".") 
         { 
            $this->bskssj = substr($this->bskssj, 0, 13) . ":" . substr($this->bskssj, 14, 2) . ":" . substr($this->bskssj, 17);
         } 
         $conteudo_x = $this->bskssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->bskssj, "YYYY-MM-DD HH:II:SS");
             $this->bskssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->bskssj))
         {
             $this->bskssj = sc_convert_encoding($this->bskssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->bskssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- bsjssj
   function NM_export_bsjssj()
   {
      if (!empty($this->bsjssj))
      {
         if (substr($this->bsjssj, 10, 1) == "-") 
         { 
             $this->bsjssj = substr($this->bsjssj, 0, 10) . " " . substr($this->bsjssj, 11);
         } 
         if (substr($this->bsjssj, 13, 1) == ".") 
         { 
            $this->bsjssj = substr($this->bsjssj, 0, 13) . ":" . substr($this->bsjssj, 14, 2) . ":" . substr($this->bsjssj, 17);
         } 
         $conteudo_x = $this->bsjssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->bsjssj, "YYYY-MM-DD HH:II:SS");
             $this->bsjssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->bsjssj))
         {
             $this->bsjssj = sc_convert_encoding($this->bsjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->bsjssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- xckssj
   function NM_export_xckssj()
   {
      if (!empty($this->xckssj))
      {
         if (substr($this->xckssj, 10, 1) == "-") 
         { 
             $this->xckssj = substr($this->xckssj, 0, 10) . " " . substr($this->xckssj, 11);
         } 
         if (substr($this->xckssj, 13, 1) == ".") 
         { 
            $this->xckssj = substr($this->xckssj, 0, 13) . ":" . substr($this->xckssj, 14, 2) . ":" . substr($this->xckssj, 17);
         } 
         $conteudo_x = $this->xckssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->xckssj, "YYYY-MM-DD HH:II:SS");
             $this->xckssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->xckssj))
         {
             $this->xckssj = sc_convert_encoding($this->xckssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->xckssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- xcjssj
   function NM_export_xcjssj()
   {
      if (!empty($this->xcjssj))
      {
         if (substr($this->xcjssj, 10, 1) == "-") 
         { 
             $this->xcjssj = substr($this->xcjssj, 0, 10) . " " . substr($this->xcjssj, 11);
         } 
         if (substr($this->xcjssj, 13, 1) == ".") 
         { 
            $this->xcjssj = substr($this->xcjssj, 0, 13) . ":" . substr($this->xcjssj, 14, 2) . ":" . substr($this->xcjssj, 17);
         } 
         $conteudo_x = $this->xcjssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->xcjssj, "YYYY-MM-DD HH:II:SS");
             $this->xcjssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->xcjssj))
         {
             $this->xcjssj = sc_convert_encoding($this->xcjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->xcjssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- zbjssj
   function NM_export_zbjssj()
   {
      if (!empty($this->zbjssj))
      {
         if (substr($this->zbjssj, 10, 1) == "-") 
         { 
             $this->zbjssj = substr($this->zbjssj, 0, 10) . " " . substr($this->zbjssj, 11);
         } 
         if (substr($this->zbjssj, 13, 1) == ".") 
         { 
            $this->zbjssj = substr($this->zbjssj, 0, 13) . ":" . substr($this->zbjssj, 14, 2) . ":" . substr($this->zbjssj, 17);
         } 
         $conteudo_x = $this->zbjssj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->zbjssj, "YYYY-MM-DD HH:II:SS");
             $this->zbjssj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->zbjssj))
         {
             $this->zbjssj = sc_convert_encoding($this->zbjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->zbjssj, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->lxr, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- bgdh
   function NM_export_bgdh()
   {
         $this->bgdh = html_entity_decode($this->bgdh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->bgdh = strip_tags($this->bgdh);
         if (!NM_is_utf8($this->bgdh))
         {
             $this->bgdh = sc_convert_encoding($this->bgdh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->bgdh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->yddh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- fax
   function NM_export_fax()
   {
         $this->fax = html_entity_decode($this->fax, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fax = strip_tags($this->fax);
         if (!NM_is_utf8($this->fax))
         {
             $this->fax = sc_convert_encoding($this->fax, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->fax, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
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
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->email, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- postcode
   function NM_export_postcode()
   {
         $this->postcode = html_entity_decode($this->postcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->postcode = strip_tags($this->postcode);
         if (!NM_is_utf8($this->postcode))
         {
             $this->postcode = sc_convert_encoding($this->postcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->postcode, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- dz
   function NM_export_dz()
   {
         $this->dz = html_entity_decode($this->dz, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dz = strip_tags($this->dz);
         if (!NM_is_utf8($this->dz))
         {
             $this->dz = sc_convert_encoding($this->dz, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->dz, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- kfh
   function NM_export_kfh()
   {
         $this->kfh = html_entity_decode($this->kfh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kfh = strip_tags($this->kfh);
         if (!NM_is_utf8($this->kfh))
         {
             $this->kfh = sc_convert_encoding($this->kfh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->kfh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- yhzh
   function NM_export_yhzh()
   {
         $this->yhzh = html_entity_decode($this->yhzh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->yhzh = strip_tags($this->yhzh);
         if (!NM_is_utf8($this->yhzh))
         {
             $this->yhzh = sc_convert_encoding($this->yhzh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->yhzh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- xmsm
   function NM_export_xmsm()
   {
         $this->xmsm = html_entity_decode($this->xmsm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->xmsm = strip_tags($this->xmsm);
         if (!NM_is_utf8($this->xmsm))
         {
             $this->xmsm = sc_convert_encoding($this->xmsm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->xmsm, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_zbgg'] ?> :: Excel</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fdown" method="get" action="grid_cg_zbgg_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_zbgg"> 
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
