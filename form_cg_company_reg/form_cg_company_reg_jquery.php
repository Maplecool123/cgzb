
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["gsmc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["gsjc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tyshxydm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qylx" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["gsdz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fddbr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zczb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["clrq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["jyfw" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["khyh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["yhdz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["yhzh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lxr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lxrdh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bgdh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["yyzzfile" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["gsmc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gsmc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gsjc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gsjc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tyshxydm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tyshxydm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qylx" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qylx" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gsdz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gsdz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fddbr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fddbr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zczb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zczb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clrq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clrq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jyfw" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jyfw" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["khyh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["khyh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["yhdz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["yhdz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["yhzh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["yhzh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lxr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lxr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lxrdh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lxrdh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bgdh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bgdh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bz" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("qylx" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("khyh" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_gsmc' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_gsmc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_gsmc_onfocus(this, iSeqRow) });
  $('#id_sc_field_gsjc' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_gsjc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_gsjc_onfocus(this, iSeqRow) });
  $('#id_sc_field_tyshxydm' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_tyshxydm_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cg_company_reg_tyshxydm_onfocus(this, iSeqRow) });
  $('#id_sc_field_qylx' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_qylx_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_qylx_onfocus(this, iSeqRow) });
  $('#id_sc_field_gsdz' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_gsdz_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_gsdz_onfocus(this, iSeqRow) });
  $('#id_sc_field_fddbr' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_fddbr_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_company_reg_fddbr_onfocus(this, iSeqRow) });
  $('#id_sc_field_zczb' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_zczb_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_zczb_onfocus(this, iSeqRow) });
  $('#id_sc_field_clrq' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_clrq_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_clrq_onfocus(this, iSeqRow) });
  $('#id_sc_field_jyfw' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_jyfw_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_jyfw_onfocus(this, iSeqRow) });
  $('#id_sc_field_khyh' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_khyh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_khyh_onfocus(this, iSeqRow) });
  $('#id_sc_field_yhdz' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_yhdz_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_yhdz_onfocus(this, iSeqRow) });
  $('#id_sc_field_yhzh' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_yhzh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_yhzh_onfocus(this, iSeqRow) });
  $('#id_sc_field_lxr' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_lxr_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cg_company_reg_lxr_onfocus(this, iSeqRow) });
  $('#id_sc_field_lxrdh' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_lxrdh_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_company_reg_lxrdh_onfocus(this, iSeqRow) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_fax_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cg_company_reg_fax_onfocus(this, iSeqRow) });
  $('#id_sc_field_bgdh' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_bgdh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_company_reg_bgdh_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_company_reg_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_bz' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_bz_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_company_reg_bz_onfocus(this, iSeqRow) });
  $('#id_sc_field_yyzzfile' + iSeqRow).bind('blur', function() { sc_form_cg_company_reg_yyzzfile_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cg_company_reg_yyzzfile_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cg_company_reg_gsmc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_gsmc();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_gsmc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_gsjc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_gsjc();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_gsjc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_tyshxydm_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_tyshxydm();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_tyshxydm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_qylx_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_qylx();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_qylx_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_gsdz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_gsdz();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_gsdz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_fddbr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_fddbr();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_fddbr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_zczb_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_zczb();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_zczb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_clrq_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_clrq();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_clrq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_jyfw_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_jyfw();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_jyfw_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_khyh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_khyh();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_khyh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_yhdz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_yhdz();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_yhdz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_yhzh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_yhzh();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_yhzh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_lxr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_lxr();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_lxr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_lxrdh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_lxrdh();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_lxrdh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_fax_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_fax();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_fax_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_bgdh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_bgdh();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_bgdh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_email_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_email();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_bz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_company_reg_validate_bz();
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_bz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_company_reg_yyzzfile_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_cg_company_reg_yyzzfile_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_clrq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_clrq" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['clrq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_shsj" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_shsj" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['shsj']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['shsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['shsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.position().top - (info.height() - trigger.height()),
          left: trigger.position().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_yyzzfile" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_cg_company_reg_ul_save.php",
    dropZone: $("#hidden_field_data_yyzzfile" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'yyzzfile'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_yyzzfile" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_yyzzfile" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_yyzzfile" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_yyzzfile" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_yyzzfile" + iSeqRow).val("");
      $("#id_sc_field_yyzzfile_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_yyzzfile_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_yyzzfile = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_yyzzfile) ? "none" : "";
      $("#id_ajax_img_yyzzfile" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_yyzzfile" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_yyzzfile) {
        document.F1.temp_out_yyzzfile.value = var_ajax_img_thumb;
        document.F1.temp_out1_yyzzfile.value = var_ajax_img_yyzzfile;
      }
      else if (document.F1.temp_out_yyzzfile) {
        document.F1.temp_out_yyzzfile.value = var_ajax_img_yyzzfile;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_yyzzfile" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_yyzzfile" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_yyzzfile" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_yyzzfile" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

