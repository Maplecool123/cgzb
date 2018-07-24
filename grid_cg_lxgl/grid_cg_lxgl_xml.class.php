<?php

class grid_cg_lxgl_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_cg_lxgl_xml()
   {
      $this->nm_data   = new nm_data("zh_cn");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("zh_cn");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_grid_cg_lxgl";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_cg_lxgl.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cg_lxgl']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->xmbh = $Busca_temp['xmbh']; 
          $tmp_pos = strpos($this->xmbh, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmbh = substr($this->xmbh, 0, $tmp_pos);
          }
          $this->xmmc = $Busca_temp['xmmc']; 
          $tmp_pos = strpos($this->xmmc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmmc = substr($this->xmmc, 0, $tmp_pos);
          }
          $this->xmfzr = $Busca_temp['xmfzr']; 
          $tmp_pos = strpos($this->xmfzr, "##@@");
          if ($tmp_pos !== false)
          {
              $this->xmfzr = substr($this->xmfzr, 0, $tmp_pos);
          }
          $this->zjly = $Busca_temp['zjly']; 
          $tmp_pos = strpos($this->zjly, "##@@");
          if ($tmp_pos !== false)
          {
              $this->zjly = substr($this->zjly, 0, $tmp_pos);
          }
          $this->sbbm = $Busca_temp['sbbm']; 
          $tmp_pos = strpos($this->sbbm, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sbbm = substr($this->sbbm, 0, $tmp_pos);
          }
          $this->sbrq = $Busca_temp['sbrq']; 
          $tmp_pos = strpos($this->sbrq, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sbrq = substr($this->sbrq, 0, $tmp_pos);
          }
          $this->sbrq_2 = $Busca_temp['sbrq_input_2']; 
          $this->shzt = $Busca_temp['shzt']; 
          $tmp_pos = strpos($this->shzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shzt = substr($this->shzt, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->Sub_Consultas[] = "splcxx";
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT xmbh, xmmc, ysje, zjly, xmfzr, sbbm, sbrq, shzt, ysly, sbr, qwcgrq, lxr, lxdh, email, cjsj, id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT xmbh, xmmc, ysje, zjly, xmfzr, sbbm, sbrq, shzt, ysly, sbr, qwcgrq, lxr, lxdh, email, cjsj, id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<grid_cg_lxgl";
         $this->xmbh = $rs->fields[0] ;  
         $this->xmmc = $rs->fields[1] ;  
         $this->ysje = $rs->fields[2] ;  
         $this->ysje =  str_replace(",", ".", $this->ysje);
         $this->ysje = (string)$this->ysje;
         $this->zjly = $rs->fields[3] ;  
         $this->xmfzr = $rs->fields[4] ;  
         $this->sbbm = $rs->fields[5] ;  
         $this->sbrq = $rs->fields[6] ;  
         $this->shzt = $rs->fields[7] ;  
         $this->ysly = $rs->fields[8] ;  
         $this->sbr = $rs->fields[9] ;  
         $this->qwcgrq = $rs->fields[10] ;  
         $this->lxr = $rs->fields[11] ;  
         $this->lxdh = $rs->fields[12] ;  
         $this->email = $rs->fields[13] ;  
         $this->cjsj = $rs->fields[14] ;  
         $this->id = $rs->fields[15] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cg_lxgl']['contr_erro'] = 'on';
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
			  $bm=$this->sbbm ;  
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
$_SESSION['scriptcase']['grid_cg_lxgl']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['field_order'] as $Cada_col)
         { 
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- xmbh
   function NM_export_xmbh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xmbh))
         {
             $this->xmbh = sc_convert_encoding($this->xmbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xmbh =\"" . $this->trata_dados($this->xmbh) . "\"";
   }
   //----- xmmc
   function NM_export_xmmc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xmmc))
         {
             $this->xmmc = sc_convert_encoding($this->xmmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xmmc =\"" . $this->trata_dados($this->xmmc) . "\"";
   }
   //----- ysje
   function NM_export_ysje()
   {
         nmgp_Form_Num_Val($this->ysje, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ysje))
         {
             $this->ysje = sc_convert_encoding($this->ysje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ysje =\"" . $this->trata_dados($this->ysje) . "\"";
   }
   //----- zjly
   function NM_export_zjly()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zjly))
         {
             $this->zjly = sc_convert_encoding($this->zjly, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zjly =\"" . $this->trata_dados($this->zjly) . "\"";
   }
   //----- xmfzr
   function NM_export_xmfzr()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xmfzr))
         {
             $this->xmfzr = sc_convert_encoding($this->xmfzr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xmfzr =\"" . $this->trata_dados($this->xmfzr) . "\"";
   }
   //----- sbbm
   function NM_export_sbbm()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sbbm))
         {
             $this->sbbm = sc_convert_encoding($this->sbbm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sbbm =\"" . $this->trata_dados($this->sbbm) . "\"";
   }
   //----- sbrq
   function NM_export_sbrq()
   {
         $conteudo_x = $this->sbrq;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->sbrq, "YYYY-MM-DD");
             $this->sbrq = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sbrq))
         {
             $this->sbrq = sc_convert_encoding($this->sbrq, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sbrq =\"" . $this->trata_dados($this->sbrq) . "\"";
   }
   //----- shzt
   function NM_export_shzt()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->shzt))
         {
             $this->shzt = sc_convert_encoding($this->shzt, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " shzt =\"" . $this->trata_dados($this->shzt) . "\"";
   }
   //----- splc
   function NM_export_splc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->splc))
         {
             $this->splc = sc_convert_encoding($this->splc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " splc =\"" . $this->trata_dados($this->splc) . "\"";
   }
   //----- ysly
   function NM_export_ysly()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ysly))
         {
             $this->ysly = sc_convert_encoding($this->ysly, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ysly =\"" . $this->trata_dados($this->ysly) . "\"";
   }
   //----- sbr
   function NM_export_sbr()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sbr))
         {
             $this->sbr = sc_convert_encoding($this->sbr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sbr =\"" . $this->trata_dados($this->sbr) . "\"";
   }
   //----- qwcgrq
   function NM_export_qwcgrq()
   {
         $conteudo_x = $this->qwcgrq;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->qwcgrq, "YYYY-MM-DD");
             $this->qwcgrq = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->qwcgrq))
         {
             $this->qwcgrq = sc_convert_encoding($this->qwcgrq, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " qwcgrq =\"" . $this->trata_dados($this->qwcgrq) . "\"";
   }
   //----- lxr
   function NM_export_lxr()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->lxr))
         {
             $this->lxr = sc_convert_encoding($this->lxr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " lxr =\"" . $this->trata_dados($this->lxr) . "\"";
   }
   //----- lxdh
   function NM_export_lxdh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->lxdh))
         {
             $this->lxdh = sc_convert_encoding($this->lxdh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " lxdh =\"" . $this->trata_dados($this->lxdh) . "\"";
   }
   //----- email
   function NM_export_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " email =\"" . $this->trata_dados($this->email) . "\"";
   }
   //----- cjsj
   function NM_export_cjsj()
   {
         if (substr($this->cjsj, 10, 1) == "-") 
         { 
             $this->cjsj = substr($this->cjsj, 0, 10) . " " . substr($this->cjsj, 11);
         } 
         if (substr($this->cjsj, 13, 1) == ".") 
         { 
            $this->cjsj = substr($this->cjsj, 0, 13) . ":" . substr($this->cjsj, 14, 2) . ":" . substr($this->cjsj, 17);
         } 
         $conteudo_x = $this->cjsj;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->cjsj, "YYYY-MM-DD HH:II:SS");
             $this->cjsj = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cjsj))
         {
             $this->cjsj = sc_convert_encoding($this->cjsj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cjsj =\"" . $this->trata_dados($this->cjsj) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_lxgl'] ?> :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_cg_lxgl_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_lxgl"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
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
