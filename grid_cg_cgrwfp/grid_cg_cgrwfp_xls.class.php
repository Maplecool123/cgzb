<?php

class grid_cg_cgrwfp_xls
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
   function grid_cg_cgrwfp_xls()
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
      $this->Arquivo   .= "_grid_cg_cgrwfp";
      $this->Arquivo   .= ".xls";
      $this->Tit_doc    = "grid_cg_cgrwfp.xls";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_cgrwfp']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_cgrwfp']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_cgrwfp']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['campos_busca'];
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
          $this->cgybh = $Busca_temp['cgybh']; 
          $tmp_pos = strpos($this->cgybh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgybh = substr($this->cgybh, 0, $tmp_pos);
          }
          $this->cgyxm = $Busca_temp['cgyxm']; 
          $tmp_pos = strpos($this->cgyxm, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgyxm = substr($this->cgyxm, 0, $tmp_pos);
          }
          $this->cgfs = $Busca_temp['cgfs']; 
          $tmp_pos = strpos($this->cgfs, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgfs = substr($this->cgfs, 0, $tmp_pos);
          }
          $this->cgzt = $Busca_temp['cgzt']; 
          $tmp_pos = strpos($this->cgzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cgzt = substr($this->cgzt, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cgbbh, cgbmc, cgys, cgfs, cgyxm, cgylxdh, cgzt, cgybh, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cgbbh, cgbmc, cgys, cgfs, cgyxm, cgylxdh, cgzt, cgybh, dlr, dlsj, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgbbh'] . "";
      $this->New_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgbmc'] . "";
      $this->New_label['cgys'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgys'] . "";
      $this->New_label['cgfs'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgfs'] . "";
      $this->New_label['cgyxm'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgyxm'] . "";
      $this->New_label['cgylxdh'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgylxdh'] . "";
      $this->New_label['cgzt'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgzt'] . "";
      $this->New_label['cgybh'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_cgybh'] . "";
      $this->New_label['dlr'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_dlr'] . "";
      $this->New_label['dlsj'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_dlsj'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_cgrwfp_fld_id'] . "";

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['field_order'] as $Cada_col)
      { 
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
          $SC_Label = (isset($this->New_label['cgys'])) ? $this->New_label['cgys'] : ""; 
          if ($Cada_col == "cgys" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cgyxm'])) ? $this->New_label['cgyxm'] : ""; 
          if ($Cada_col == "cgyxm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cgylxdh'])) ? $this->New_label['cgylxdh'] : ""; 
          if ($Cada_col == "cgylxdh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cgzt'])) ? $this->New_label['cgzt'] : ""; 
          if ($Cada_col == "cgzt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cgybh'])) ? $this->New_label['cgybh'] : ""; 
          if ($Cada_col == "cgybh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['dlr'])) ? $this->New_label['dlr'] : ""; 
          if ($Cada_col == "dlr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['dlsj'])) ? $this->New_label['dlsj'] : ""; 
          if ($Cada_col == "dlsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->cgbbh = $rs->fields[0] ;  
         $this->cgbmc = $rs->fields[1] ;  
         $this->cgys = $rs->fields[2] ;  
         $this->cgys =  str_replace(",", ".", $this->cgys);
         $this->cgys = (string)$this->cgys;
         $this->cgfs = $rs->fields[3] ;  
         $this->cgyxm = $rs->fields[4] ;  
         $this->cgylxdh = $rs->fields[5] ;  
         $this->cgzt = $rs->fields[6] ;  
         $this->cgybh = $rs->fields[7] ;  
         $this->dlr = $rs->fields[8] ;  
         $this->dlsj = $rs->fields[9] ;  
         $this->id = $rs->fields[10] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
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
   //----- cgys
   function NM_export_cgys()
   {
         if (!NM_is_utf8($this->cgys))
         {
             $this->cgys = sc_convert_encoding($this->cgys, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->cgys))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgys);
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
   //----- cgyxm
   function NM_export_cgyxm()
   {
         $this->cgyxm = html_entity_decode($this->cgyxm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgyxm = strip_tags($this->cgyxm);
         if (!NM_is_utf8($this->cgyxm))
         {
             $this->cgyxm = sc_convert_encoding($this->cgyxm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgyxm, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- cgylxdh
   function NM_export_cgylxdh()
   {
         $this->cgylxdh = html_entity_decode($this->cgylxdh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgylxdh = strip_tags($this->cgylxdh);
         if (!NM_is_utf8($this->cgylxdh))
         {
             $this->cgylxdh = sc_convert_encoding($this->cgylxdh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgylxdh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- cgzt
   function NM_export_cgzt()
   {
         $this->cgzt = html_entity_decode($this->cgzt, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgzt = strip_tags($this->cgzt);
         if (!NM_is_utf8($this->cgzt))
         {
             $this->cgzt = sc_convert_encoding($this->cgzt, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgzt, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- cgybh
   function NM_export_cgybh()
   {
         $this->cgybh = html_entity_decode($this->cgybh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cgybh = strip_tags($this->cgybh);
         if (!NM_is_utf8($this->cgybh))
         {
             $this->cgybh = sc_convert_encoding($this->cgybh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cgybh, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- dlr
   function NM_export_dlr()
   {
         $this->dlr = html_entity_decode($this->dlr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dlr = strip_tags($this->dlr);
         if (!NM_is_utf8($this->dlr))
         {
             $this->dlr = sc_convert_encoding($this->dlr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->dlr, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- dlsj
   function NM_export_dlsj()
   {
      if (!empty($this->dlsj))
      {
         if (substr($this->dlsj, 10, 1) == "-") 
         { 
             $this->dlsj = substr($this->dlsj, 0, 10) . " " . substr($this->dlsj, 11);
         } 
         if (substr($this->dlsj, 13, 1) == ".") 
         { 
            $this->dlsj = substr($this->dlsj, 0, 13) . ":" . substr($this->dlsj, 14, 2) . ":" . substr($this->dlsj, 17);
         } 
         $conteudo_x = $this->dlsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->dlsj, "YYYY-MM-DD HH:II:SS");
             $this->dlsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->dlsj))
         {
             $this->dlsj = sc_convert_encoding($this->dlsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->dlsj, PHPExcel_Cell_DataType::TYPE_STRING);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_cgrwfp'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_cgrwfp'] ?> :: Excel</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_cgrwfp_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_cgrwfp"> 
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
