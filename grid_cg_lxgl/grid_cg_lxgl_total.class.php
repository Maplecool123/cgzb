<?php

class grid_cg_lxgl_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_cg_lxgl_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("zh_cn");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_cg_lxgl']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_cg_lxgl']['campos_busca']))
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
          $sbrq_2 = $Busca_temp['sbrq_input_2']; 
          $this->sbrq_2 = $Busca_temp['sbrq_input_2']; 
          $this->shzt = $Busca_temp['shzt']; 
          $tmp_pos = strpos($this->shzt, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shzt = substr($this->shzt, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(ysje) as sum_ysje from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['contr_total_geral'] = "OK";
   } 

   //-----  zjly
   function quebra_zjly_zjlytj($zjly, $arg_sum_zjly) 
   {
      global $tot_zjly ;  
      $tot_zjly = array() ;  
      $nm_comando = "select count(*), sum(ysje) as sum_ysje from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'])) 
      { 
         $nm_comando .= " where zjly" . $arg_sum_zjly ; 
      } 
      else 
      { 
         $nm_comando .= " and zjly" . $arg_sum_zjly ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_zjly[0] = sc_strip_script($zjly) ; 
      $tot_zjly[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_zjly[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_zjlytj($destino_resumo, &$array_total_zjly)
   {
      global $nada, $nm_lang, $splc;
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cg_lxgl']['where_pesq_filtro'];
   $nmgp_order_by = " order by zjly asc"; 
     $comando  = "select count(*), sum(ysje) as sum_ysje, zjly from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by zjly  " . $nmgp_order_by;
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $zjly      = $registro[2];
         $zjly_orig = $registro[2];
         $conteudo = $registro[2];
         $zjly = $conteudo;
         if (null === $zjly)
         {
             $zjly = '';
         }
         if (null === $zjly_orig)
         {
             $zjly_orig = '';
         }
         $val_grafico_zjly = $zjly;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($zjly_orig))
         {
            //-----  zjly
            if (!isset($array_total_zjly[$zjly_orig]))
            {
               $array_total_zjly[$zjly_orig][0] = $registro[0];
               $array_total_zjly[$zjly_orig][1] = $registro[1];
               $array_total_zjly[$zjly_orig][2] = sc_strip_script($val_grafico_zjly);
               $array_total_zjly[$zjly_orig][3] = $zjly_orig;
            }
            else
            {
               $array_total_zjly[$zjly_orig][0] += $registro[0];
               $array_total_zjly[$zjly_orig][1] += $registro[1];
            }
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
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
