<?php

class grid_dzcp_oklist_byzjbh_rtf
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
   function grid_dzcp_oklist_byzjbh_rtf()
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
      $this->Arquivo   .= "_grid_dzcp_oklist_byzjbh";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_dzcp_oklist_byzjbh.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dzcp_oklist_byzjbh']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_dzcp_oklist_byzjbh']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_dzcp_oklist_byzjbh']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cpbmc, cgbmc, qymc, begintime, endtime, cpbbh, zbggbh, cgbbh, tjsj, id from (select p.id,p.cpbbh, b.mc as cpbmc, p.tbbh, p.zbggbh, p.cgbbh, p.cgbmc, p.qymc,p.begintime,p.endtime,p.tjsj from  eval_plan p,eval_cpb b where p.cpbbh=b.id     			  and    NOW()>=p.begintime  		    and NOW()<=p.endtime  			  and exists (select j.id from cg_xmzjk as j    			     where j.zjbh='000006' and j.zbggbh=p.zbggbh   			  )    			 and  EXISTS(select z.id from  eval_zjtjzgyj as z   		  where z.zjbh='000006' 			 and z.planbh = p.id)) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cpbmc, cgbmc, qymc, begintime, endtime, cpbbh, zbggbh, cgbbh, tjsj, id from (select p.id,p.cpbbh, b.mc as cpbmc, p.tbbh, p.zbggbh, p.cgbbh, p.cgbmc, p.qymc,p.begintime,p.endtime,p.tjsj from  eval_plan p,eval_cpb b where p.cpbbh=b.id     			  and    NOW()>=p.begintime  		    and NOW()<=p.endtime  			  and exists (select j.id from cg_xmzjk as j    			     where j.zjbh='000006' and j.zbggbh=p.zbggbh   			  )    			 and  EXISTS(select z.id from  eval_zjtjzgyj as z   		  where z.zjbh='000006' 			 and z.planbh = p.id)) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['cpbmc'] = "" . $this->Ini->Nm_lang['lang_eval_cpresult_fld_cpbmc'] . "";
      $this->New_label['cgbmc'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cgbmc'] . "";
      $this->New_label['qymc'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_qymc'] . "";
      $this->New_label['begintime'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_begintime'] . "";
      $this->New_label['endtime'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_endtime'] . "";
      $this->New_label['cpbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cpbbh'] . "";
      $this->New_label['zbggbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_zbggbh'] . "";
      $this->New_label['cgbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_cgbbh'] . "";
      $this->New_label['tjsj'] = "" . $this->Ini->Nm_lang['lang_eval_cpb_fld_tjsj'] . "";
      $this->New_label['tbbh'] = "" . $this->Ini->Nm_lang['lang_eval_plan_fld_tbbh'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['cpbmc'])) ? $this->New_label['cpbmc'] : ""; 
          if ($Cada_col == "cpbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cgbmc'])) ? $this->New_label['cgbmc'] : ""; 
          if ($Cada_col == "cgbmc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['qymc'])) ? $this->New_label['qymc'] : ""; 
          if ($Cada_col == "qymc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['begintime'])) ? $this->New_label['begintime'] : ""; 
          if ($Cada_col == "begintime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['endtime'])) ? $this->New_label['endtime'] : ""; 
          if ($Cada_col == "endtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cpbbh'])) ? $this->New_label['cpbbh'] : ""; 
          if ($Cada_col == "cpbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zbggbh'])) ? $this->New_label['zbggbh'] : ""; 
          if ($Cada_col == "zbggbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cgbbh'])) ? $this->New_label['cgbbh'] : ""; 
          if ($Cada_col == "cgbbh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tjsj'])) ? $this->New_label['tjsj'] : ""; 
          if ($Cada_col == "tjsj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->cpbmc = $rs->fields[0] ;  
         $this->cgbmc = $rs->fields[1] ;  
         $this->qymc = $rs->fields[2] ;  
         $this->begintime = $rs->fields[3] ;  
         $this->endtime = $rs->fields[4] ;  
         $this->cpbbh = $rs->fields[5] ;  
         $this->cpbbh = (string)$this->cpbbh;
         $this->zbggbh = $rs->fields[6] ;  
         $this->zbggbh = (string)$this->zbggbh;
         $this->cgbbh = $rs->fields[7] ;  
         $this->tjsj = $rs->fields[8] ;  
         $this->id = $rs->fields[9] ;  
         $this->id = (string)$this->id;
         //----- lookup - cpbbh
         $this->look_cpbbh = $this->cpbbh; 
         $this->Lookup->lookup_cpbbh($this->look_cpbbh, $this->cpbbh) ; 
         $this->look_cpbbh = ($this->look_cpbbh == "&nbsp;") ? "" : $this->look_cpbbh; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_dzcp_oklist_byzjbh']['contr_erro'] = 'on';
 
 
$_SESSION['scriptcase']['grid_dzcp_oklist_byzjbh']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['field_order'] as $Cada_col)
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
   //----- cpbmc
   function NM_export_cpbmc()
   {
         $this->cpbmc = html_entity_decode($this->cpbmc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cpbmc = strip_tags($this->cpbmc);
         if (!NM_is_utf8($this->cpbmc))
         {
             $this->cpbmc = sc_convert_encoding($this->cpbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cpbmc = str_replace('<', '&lt;', $this->cpbmc);
         $this->cpbmc = str_replace('>', '&gt;', $this->cpbmc);
         $this->Texto_tag .= "<td>" . $this->cpbmc . "</td>\r\n";
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
         $this->cgbmc = str_replace('<', '&lt;', $this->cgbmc);
         $this->cgbmc = str_replace('>', '&gt;', $this->cgbmc);
         $this->Texto_tag .= "<td>" . $this->cgbmc . "</td>\r\n";
   }
   //----- qymc
   function NM_export_qymc()
   {
         $this->qymc = html_entity_decode($this->qymc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->qymc = strip_tags($this->qymc);
         if (!NM_is_utf8($this->qymc))
         {
             $this->qymc = sc_convert_encoding($this->qymc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->qymc = str_replace('<', '&lt;', $this->qymc);
         $this->qymc = str_replace('>', '&gt;', $this->qymc);
         $this->Texto_tag .= "<td>" . $this->qymc . "</td>\r\n";
   }
   //----- begintime
   function NM_export_begintime()
   {
         if (substr($this->begintime, 10, 1) == "-") 
         { 
             $this->begintime = substr($this->begintime, 0, 10) . " " . substr($this->begintime, 11);
         } 
         if (substr($this->begintime, 13, 1) == ".") 
         { 
            $this->begintime = substr($this->begintime, 0, 13) . ":" . substr($this->begintime, 14, 2) . ":" . substr($this->begintime, 17);
         } 
         $conteudo_x = $this->begintime;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->begintime, "YYYY-MM-DD HH:II:SS");
             $this->begintime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->begintime))
         {
             $this->begintime = sc_convert_encoding($this->begintime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->begintime = str_replace('<', '&lt;', $this->begintime);
         $this->begintime = str_replace('>', '&gt;', $this->begintime);
         $this->Texto_tag .= "<td>" . $this->begintime . "</td>\r\n";
   }
   //----- endtime
   function NM_export_endtime()
   {
         if (substr($this->endtime, 10, 1) == "-") 
         { 
             $this->endtime = substr($this->endtime, 0, 10) . " " . substr($this->endtime, 11);
         } 
         if (substr($this->endtime, 13, 1) == ".") 
         { 
            $this->endtime = substr($this->endtime, 0, 13) . ":" . substr($this->endtime, 14, 2) . ":" . substr($this->endtime, 17);
         } 
         $conteudo_x = $this->endtime;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->endtime, "YYYY-MM-DD HH:II:SS");
             $this->endtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->endtime))
         {
             $this->endtime = sc_convert_encoding($this->endtime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->endtime = str_replace('<', '&lt;', $this->endtime);
         $this->endtime = str_replace('>', '&gt;', $this->endtime);
         $this->Texto_tag .= "<td>" . $this->endtime . "</td>\r\n";
   }
   //----- cpbbh
   function NM_export_cpbbh()
   {
         $this->look_cpbbh = html_entity_decode($this->look_cpbbh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_cpbbh = strip_tags($this->look_cpbbh);
         if (!NM_is_utf8($this->look_cpbbh))
         {
             $this->look_cpbbh = sc_convert_encoding($this->look_cpbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_cpbbh = str_replace('<', '&lt;', $this->look_cpbbh);
         $this->look_cpbbh = str_replace('>', '&gt;', $this->look_cpbbh);
         $this->Texto_tag .= "<td>" . $this->look_cpbbh . "</td>\r\n";
   }
   //----- zbggbh
   function NM_export_zbggbh()
   {
         nmgp_Form_Num_Val($this->zbggbh, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->zbggbh))
         {
             $this->zbggbh = sc_convert_encoding($this->zbggbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zbggbh = str_replace('<', '&lt;', $this->zbggbh);
         $this->zbggbh = str_replace('>', '&gt;', $this->zbggbh);
         $this->Texto_tag .= "<td>" . $this->zbggbh . "</td>\r\n";
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
         $this->cgbbh = str_replace('<', '&lt;', $this->cgbbh);
         $this->cgbbh = str_replace('>', '&gt;', $this->cgbbh);
         $this->Texto_tag .= "<td>" . $this->cgbbh . "</td>\r\n";
   }
   //----- tjsj
   function NM_export_tjsj()
   {
         if (substr($this->tjsj, 10, 1) == "-") 
         { 
             $this->tjsj = substr($this->tjsj, 0, 10) . " " . substr($this->tjsj, 11);
         } 
         if (substr($this->tjsj, 13, 1) == ".") 
         { 
            $this->tjsj = substr($this->tjsj, 0, 13) . ":" . substr($this->tjsj, 14, 2) . ":" . substr($this->tjsj, 17);
         } 
         $conteudo_x = $this->tjsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->tjsj, "YYYY-MM-DD HH:II:SS");
             $this->tjsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->tjsj))
         {
             $this->tjsj = sc_convert_encoding($this->tjsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tjsj = str_replace('<', '&lt;', $this->tjsj);
         $this->tjsj = str_replace('>', '&gt;', $this->tjsj);
         $this->Texto_tag .= "<td>" . $this->tjsj . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dzcp_oklist_byzjbh'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_menu_dzcp_oklist_byzjbh'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_dzcp_oklist_byzjbh_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_dzcp_oklist_byzjbh"> 
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
