
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
  scEventControl_data["xmbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xmmc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ysje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zjly" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xmfzr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sbbm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sbrq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sbr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qwcgrq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lxr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lxdh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ps" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["xmbh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xmbh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xmmc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xmmc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ysje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ysje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zjly" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zjly" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xmfzr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xmfzr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sbbm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sbbm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sbrq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sbrq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sbr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sbr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qwcgrq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qwcgrq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lxr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lxr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lxdh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lxdh" + iSeqRow]["change"]) {
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
  if ("zjly" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sbbm" + iSeq == fieldName) {
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
  $('#id_sc_field_xmbh' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_xmbh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_xmbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_xmmc' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_xmmc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_xmmc_onfocus(this, iSeqRow) });
  $('#id_sc_field_ysje' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_ysje_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_ysje_onfocus(this, iSeqRow) });
  $('#id_sc_field_zjly' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_zjly_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_zjly_onfocus(this, iSeqRow) });
  $('#id_sc_field_xmfzr' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_xmfzr_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_cgjh_xmfzr_onfocus(this, iSeqRow) });
  $('#id_sc_field_sbrq' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_sbrq_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_sbrq_onfocus(this, iSeqRow) });
  $('#id_sc_field_sbbm' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_sbbm_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_sbbm_onfocus(this, iSeqRow) });
  $('#id_sc_field_sbr' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_sbr_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cg_cgjh_sbr_onfocus(this, iSeqRow) });
  $('#id_sc_field_qwcgrq' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_qwcgrq_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cg_cgjh_qwcgrq_onfocus(this, iSeqRow) });
  $('#id_sc_field_lxr' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_lxr_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cg_cgjh_lxr_onfocus(this, iSeqRow) });
  $('#id_sc_field_lxdh' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_lxdh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_cgjh_lxdh_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_cgjh_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_bz' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_bz_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_cgjh_bz_onfocus(this, iSeqRow) });
  $('#id_sc_field_fa' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_fa_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_cgjh_fa_onfocus(this, iSeqRow) });
  $('#id_sc_field_bg' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_bg_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_cgjh_bg_onfocus(this, iSeqRow) });
  $('#id_sc_field_ps' + iSeqRow).bind('blur', function() { sc_form_cg_cgjh_ps_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_cgjh_ps_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cg_cgjh_xmbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_xmbh();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_xmbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_xmmc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_xmmc();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_xmmc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_ysje_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_ysje();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_ysje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_zjly_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_zjly();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_zjly_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_xmfzr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_xmfzr();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_xmfzr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_sbrq_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_sbrq();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_sbrq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_sbbm_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_sbbm();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_sbbm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_sbr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_sbr();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_sbr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_qwcgrq_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_qwcgrq();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_qwcgrq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_lxr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_lxr();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_lxr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_lxdh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_lxdh();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_lxdh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_email_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_email();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_bz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_cgjh_validate_bz();
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_bz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_fa_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_fa_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_bg_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_bg_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cg_cgjh_ps_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_cg_cgjh_ps_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_sbrq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_sbrq" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['sbrq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_qwcgrq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_qwcgrq" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['qwcgrq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_cjsj" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_cjsj" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['cjsj']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['cjsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['cjsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_fa" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_cg_cgjh_ul_save.php",
    dropZone: $("#hidden_field_data_fa" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'fa'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_fa" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_fa" + iSeqRow);
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
        $("#id_img_loader_fa" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_fa" + iSeqRow).hide();
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
      $("#id_sc_field_fa" + iSeqRow).val("");
      $("#id_sc_field_fa_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_fa_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_fa" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_fa" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_fa" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_fa" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_bg" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_cg_cgjh_ul_save.php",
    dropZone: $("#hidden_field_data_bg" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'bg'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_bg" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_bg" + iSeqRow);
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
        $("#id_img_loader_bg" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_bg" + iSeqRow).hide();
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
      $("#id_sc_field_bg" + iSeqRow).val("");
      $("#id_sc_field_bg_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_bg_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_bg" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_bg" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_bg" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_bg" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_ps" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_cg_cgjh_ul_save.php",
    dropZone: $("#hidden_field_data_ps" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'ps'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_ps" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_ps" + iSeqRow);
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
        $("#id_img_loader_ps" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_ps" + iSeqRow).hide();
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
      $("#id_sc_field_ps" + iSeqRow).val("");
      $("#id_sc_field_ps_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_ps_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_ps" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_ps" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_ps" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_ps" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

