<?php

class grid_cg_zbgg_xml
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
   function grid_cg_zbgg_xml()
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
      $this->Arquivo     .= "_grid_cg_zbgg";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_cg_zbgg.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
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
         $this->xml_registro = "<grid_cg_zbgg";
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
   //----- id
   function NM_export_id()
   {
         nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id))
         {
             $this->id = sc_convert_encoding($this->id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id =\"" . $this->trata_dados($this->id) . "\"";
   }
   //----- cgbbh
   function NM_export_cgbbh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cgbbh))
         {
             $this->cgbbh = sc_convert_encoding($this->cgbbh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cgbbh =\"" . $this->trata_dados($this->cgbbh) . "\"";
   }
   //----- cgbmc
   function NM_export_cgbmc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cgbmc))
         {
             $this->cgbmc = sc_convert_encoding($this->cgbmc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cgbmc =\"" . $this->trata_dados($this->cgbmc) . "\"";
   }
   //----- bzj
   function NM_export_bzj()
   {
         nmgp_Form_Num_Val($this->bzj, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bzj))
         {
             $this->bzj = sc_convert_encoding($this->bzj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " bzj =\"" . $this->trata_dados($this->bzj) . "\"";
   }
   //----- bsf
   function NM_export_bsf()
   {
         nmgp_Form_Num_Val($this->bsf, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bsf))
         {
             $this->bsf = sc_convert_encoding($this->bsf, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " bsf =\"" . $this->trata_dados($this->bsf) . "\"";
   }
   //----- zbkssj
   function NM_export_zbkssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zbkssj))
         {
             $this->zbkssj = sc_convert_encoding($this->zbkssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zbkssj =\"" . $this->trata_dados($this->zbkssj) . "\"";
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
   //----- cgfs
   function NM_export_cgfs()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cgfs))
         {
             $this->cgfs = sc_convert_encoding($this->cgfs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cgfs =\"" . $this->trata_dados($this->cgfs) . "\"";
   }
   //----- bskssj
   function NM_export_bskssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bskssj))
         {
             $this->bskssj = sc_convert_encoding($this->bskssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " bskssj =\"" . $this->trata_dados($this->bskssj) . "\"";
   }
   //----- bsjssj
   function NM_export_bsjssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bsjssj))
         {
             $this->bsjssj = sc_convert_encoding($this->bsjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " bsjssj =\"" . $this->trata_dados($this->bsjssj) . "\"";
   }
   //----- xckssj
   function NM_export_xckssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xckssj))
         {
             $this->xckssj = sc_convert_encoding($this->xckssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xckssj =\"" . $this->trata_dados($this->xckssj) . "\"";
   }
   //----- xcjssj
   function NM_export_xcjssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xcjssj))
         {
             $this->xcjssj = sc_convert_encoding($this->xcjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xcjssj =\"" . $this->trata_dados($this->xcjssj) . "\"";
   }
   //----- zbjssj
   function NM_export_zbjssj()
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
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zbjssj))
         {
             $this->zbjssj = sc_convert_encoding($this->zbjssj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zbjssj =\"" . $this->trata_dados($this->zbjssj) . "\"";
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
   //----- bgdh
   function NM_export_bgdh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bgdh))
         {
             $this->bgdh = sc_convert_encoding($this->bgdh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " bgdh =\"" . $this->trata_dados($this->bgdh) . "\"";
   }
   //----- yddh
   function NM_export_yddh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->yddh))
         {
             $this->yddh = sc_convert_encoding($this->yddh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " yddh =\"" . $this->trata_dados($this->yddh) . "\"";
   }
   //----- fax
   function NM_export_fax()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fax))
         {
             $this->fax = sc_convert_encoding($this->fax, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fax =\"" . $this->trata_dados($this->fax) . "\"";
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
   //----- postcode
   function NM_export_postcode()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->postcode))
         {
             $this->postcode = sc_convert_encoding($this->postcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " postcode =\"" . $this->trata_dados($this->postcode) . "\"";
   }
   //----- dz
   function NM_export_dz()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dz))
         {
             $this->dz = sc_convert_encoding($this->dz, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dz =\"" . $this->trata_dados($this->dz) . "\"";
   }
   //----- kfh
   function NM_export_kfh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->kfh))
         {
             $this->kfh = sc_convert_encoding($this->kfh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " kfh =\"" . $this->trata_dados($this->kfh) . "\"";
   }
   //----- yhzh
   function NM_export_yhzh()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->yhzh))
         {
             $this->yhzh = sc_convert_encoding($this->yhzh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " yhzh =\"" . $this->trata_dados($this->yhzh) . "\"";
   }
   //----- xmsm
   function NM_export_xmsm()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->xmsm))
         {
             $this->xmsm = sc_convert_encoding($this->xmsm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " xmsm =\"" . $this->trata_dados($this->xmsm) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_zbgg'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_cg_zbgg'] ?> :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_cg_zbgg_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cg_zbgg"> 
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
