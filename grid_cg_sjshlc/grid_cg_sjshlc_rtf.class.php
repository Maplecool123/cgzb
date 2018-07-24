<?php

class grid_cg_sjshlc_rtf
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
   function grid_cg_sjshlc_rtf()
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
      $this->Arquivo   .= "_grid_cg_sjshlc";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cg_sjshlc.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_sjshlc']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_sjshlc']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_sjshlc']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->shbz = $Busca_temp['shbz']; 
          $tmp_pos = strpos($this->shbz, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shbz = substr($this->shbz, 0, $tmp_pos);
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->id_2 = $Busca_temp['id_input_2']; 
          $this->sjbh = $Busca_temp['sjbh']; 
          $tmp_pos = strpos($this->sjbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sjbh = substr($this->sjbh, 0, $tmp_pos);
          }
          $this->sjbh_2 = $Busca_temp['sjbh_input_2']; 
          $this->shlc = $Busca_temp['shlc']; 
          $tmp_pos = strpos($this->shlc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shlc = substr($this->shlc, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT shbz, shyj, fj, tjr, shsj, shzt, id, sjbh, shlc from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT shbz, shyj, fj, tjr, shsj, shzt, id, sjbh, shlc from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['shbz'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_shbz'] . "";
      $this->New_label['shyj'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_shyj'] . "";
      $this->New_label['fj'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_fj'] . "";
      $this->New_label['tjr'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_tjr'] . "";
      $this->New_label['shsj'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_shsj'] . "";
      $this->New_label['shzt'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_shzt'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_id'] . "";
      $this->New_label['sjbh'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_sjbh'] . "";
      $this->New_label['shlc'] = "" . $this->Ini->Nm_lang['lang_cg_sjshlc_fld_shlc'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['shbz'])) ? $this->New_label['shbz'] : ""; 
          if ($Cada_col == "shbz" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shyj'])) ? $this->New_label['shyj'] : ""; 
          if ($Cada_col == "shyj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fj'])) ? $this->New_label['fj'] : ""; 
          if ($Cada_col == "fj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tjr'])) ? $this->New_label['tjr'] : ""; 
          if ($Cada_col == "tjr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shsj'])) ? $this->New_label['shsj'] : ""; 
          if ($Cada_col == "shsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shzt'])) ? $this->New_label['shzt'] : ""; 
          if ($Cada_col == "shzt" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : ""; 
          if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sjbh'])) ? $this->New_label['sjbh'] : ""; 
          if ($Cada_col == "sjbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shlc'])) ? $this->New_label['shlc'] : ""; 
          if ($Cada_col == "shlc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->shbz = $rs->fields[0] ;  
         $this->shyj = $rs->fields[1] ;  
         $this->fj = $rs->fields[2] ;  
         $this->tjr = $rs->fields[3] ;  
         $this->shsj = $rs->fields[4] ;  
         $this->shzt = $rs->fields[5] ;  
         $this->id = $rs->fields[6] ;  
         $this->id = (string)$this->id;
         $this->sjbh = $rs->fields[7] ;  
         $this->sjbh = (string)$this->sjbh;
         $this->shlc = $rs->fields[8] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['field_order'] as $Cada_col)
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
   //----- shbz
   function NM_export_shbz()
   {
         $this->shbz = html_entity_decode($this->shbz, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->shbz = strip_tags($this->shbz);
         if (!NM_is_utf8($this->shbz))
         {
             $this->shbz = sc_convert_encoding($this->shbz, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shbz = str_replace('<', '&lt;', $this->shbz);
         $this->shbz = str_replace('>', '&gt;', $this->shbz);
         $this->Texto_tag .= "<td>" . $this->shbz . "</td>\r\n";
   }
   //----- shyj
   function NM_export_shyj()
   {
         $this->shyj = html_entity_decode($this->shyj, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->shyj = strip_tags($this->shyj);
         if (!NM_is_utf8($this->shyj))
         {
             $this->shyj = sc_convert_encoding($this->shyj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shyj = str_replace('<', '&lt;', $this->shyj);
         $this->shyj = str_replace('>', '&gt;', $this->shyj);
         $this->Texto_tag .= "<td>" . $this->shyj . "</td>\r\n";
   }
   //----- fj
   function NM_export_fj()
   {
         if (!NM_is_utf8($this->fj))
         {
             $this->fj = sc_convert_encoding($this->fj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fj = str_replace('<', '&lt;', $this->fj);
         $this->fj = str_replace('>', '&gt;', $this->fj);
         $this->Texto_tag .= "<td>" . $this->fj . "</td>\r\n";
   }
   //----- tjr
   function NM_export_tjr()
   {
         $this->tjr = html_entity_decode($this->tjr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tjr = strip_tags($this->tjr);
         if (!NM_is_utf8($this->tjr))
         {
             $this->tjr = sc_convert_encoding($this->tjr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tjr = str_replace('<', '&lt;', $this->tjr);
         $this->tjr = str_replace('>', '&gt;', $this->tjr);
         $this->Texto_tag .= "<td>" . $this->tjr . "</td>\r\n";
   }
   //----- shsj
   function NM_export_shsj()
   {
         if (substr($this->shsj, 10, 1) == "-") 
         { 
             $this->shsj = substr($this->shsj, 0, 10) . " " . substr($this->shsj, 11);
         } 
         if (substr($this->shsj, 13, 1) == ".") 
         { 
            $this->shsj = substr($this->shsj, 0, 13) . ":" . substr($this->shsj, 14, 2) . ":" . substr($this->shsj, 17);
         } 
         $conteudo_x = $this->shsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->shsj, "YYYY-MM-DD HH:II:SS");
             $this->shsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->shsj))
         {
             $this->shsj = sc_convert_encoding($this->shsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shsj = str_replace('<', '&lt;', $this->shsj);
         $this->shsj = str_replace('>', '&gt;', $this->shsj);
         $this->Texto_tag .= "<td>" . $this->shsj . "</td>\r\n";
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
         $this->shzt = str_replace('<', '&lt;', $this->shzt);
         $this->shzt = str_replace('>', '&gt;', $this->shzt);
         $this->Texto_tag .= "<td>" . $this->shzt . "</td>\r\n";
   }
   //----- id
   function NM_export_id()
   {
         nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id))
         {
             $this->id = sc_convert_encoding($this->id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id = str_replace('<', '&lt;', $this->id);
         $this->id = str_replace('>', '&gt;', $this->id);
         $this->Texto_tag .= "<td>" . $this->id . "</td>\r\n";
   }
   //----- sjbh
   function NM_export_sjbh()
   {
         nmgp_Form_Num_Val($this->sjbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->sjbh))
         {
             $this->sjbh = sc_convert_encoding($this->sjbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sjbh = str_replace('<', '&lt;', $this->sjbh);
         $this->sjbh = str_replace('>', '&gt;', $this->sjbh);
         $this->Texto_tag .= "<td>" . $this->sjbh . "</td>\r\n";
   }
   //----- shlc
   function NM_export_shlc()
   {
         $this->shlc = html_entity_decode($this->shlc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->shlc = strip_tags($this->shlc);
         if (!NM_is_utf8($this->shlc))
         {
             $this->shlc = sc_convert_encoding($this->shlc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shlc = str_replace('<', '&lt;', $this->shlc);
         $this->shlc = str_replace('>', '&gt;', $this->shlc);
         $this->Texto_tag .= "<td>" . $this->shlc . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_sjshlc'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_sjshlc'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_sjshlc_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_sjshlc"> 
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
