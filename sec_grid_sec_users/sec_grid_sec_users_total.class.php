<?php

class sec_grid_sec_users_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function sec_grid_sec_users_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("zh_cn");
      if (isset($_SESSION['sc_session'][$this->sc_page]['sec_grid_sec_users']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['sec_grid_sec_users']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->login = $Busca_temp['login']; 
          $tmp_pos = strpos($this->login, "##@@");
          if ($tmp_pos !== false)
          {
              $this->login = substr($this->login, 0, $tmp_pos);
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false)
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
          $this->email = $Busca_temp['email']; 
          $tmp_pos = strpos($this->email, "##@@");
          if ($tmp_pos !== false)
          {
              $this->email = substr($this->email, 0, $tmp_pos);
          }
          $this->active = $Busca_temp['active']; 
          $tmp_pos = strpos($this->active, "##@@");
          if ($tmp_pos !== false)
          {
              $this->active = substr($this->active, 0, $tmp_pos);
          }
          $this->priv_admin = $Busca_temp['priv_admin']; 
          $tmp_pos = strpos($this->priv_admin, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_admin = substr($this->priv_admin, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['sec_grid_sec_users']['contr_total_geral'] = "OK";
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
