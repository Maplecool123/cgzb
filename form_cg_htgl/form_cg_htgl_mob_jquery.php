
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
  scEventControl_data["cgbbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgbmc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgybh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgyxm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgylxdh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["htmc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["htbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["htlx" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["htje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qdrq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qydw" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qydwlxr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qydwlxrdh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zbj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zbdqrq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cgbbh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgbbh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgbmc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgbmc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgybh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgybh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgyxm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgyxm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgylxdh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgylxdh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgfs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgfs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["htmc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["htmc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["htbh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["htbh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["htlx" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["htlx" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["htje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["htje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qdrq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qdrq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qydw" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qydw" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qydwlxr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qydwlxr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qydwlxrdh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qydwlxrdh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zbj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zbj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zbdqrq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zbdqrq" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("htlx" + iSeq == fieldName) {
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
  if ("cgbbh" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("qydw" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_cgbbh' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgbbh_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cg_htgl_cgbbh_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_htgl_cgbbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgbmc' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgbmc_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_htgl_cgbmc_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgybh' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgybh_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_htgl_cgybh_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgyxm' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgyxm_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_htgl_cgyxm_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgylxdh' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgylxdh_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cg_htgl_cgylxdh_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgfs' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_cgfs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_cgfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_htmc' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_htmc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_htmc_onfocus(this, iSeqRow) });
  $('#id_sc_field_htbh' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_htbh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_htbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_htlx' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_htlx_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_htlx_onfocus(this, iSeqRow) });
  $('#id_sc_field_htje' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_htje_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_htje_onfocus(this, iSeqRow) });
  $('#id_sc_field_qdrq' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_qdrq_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_qdrq_onfocus(this, iSeqRow) });
  $('#id_sc_field_qydw' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_qydw_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cg_htgl_qydw_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_htgl_qydw_onfocus(this, iSeqRow) });
  $('#id_sc_field_qydwlxr' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_qydwlxr_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cg_htgl_qydwlxr_onfocus(this, iSeqRow) });
  $('#id_sc_field_qydwlxrdh' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_qydwlxrdh_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cg_htgl_qydwlxrdh_onfocus(this, iSeqRow) });
  $('#id_sc_field_zbj' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_zbj_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cg_htgl_zbj_onfocus(this, iSeqRow) });
  $('#id_sc_field_zbdqrq' + iSeqRow).bind('blur', function() { sc_form_cg_htgl_zbdqrq_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cg_htgl_zbdqrq_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cg_htgl_cgbbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgbbh();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgbbh_onchange(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_event_cgbbh_onchange();
}

function sc_form_cg_htgl_cgbbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_cgbmc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgbmc();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgbmc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_cgybh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgybh();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgybh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_cgyxm_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgyxm();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgyxm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_cgylxdh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgylxdh();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgylxdh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_cgfs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_cgfs();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_cgfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_htmc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_htmc();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_htmc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_htbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_htbh();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_htbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_htlx_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_htlx();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_htlx_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_htje_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_htje();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_htje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_qdrq_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_qdrq();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_qdrq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_qydw_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_qydw();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_qydw_onchange(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_event_qydw_onchange();
}

function sc_form_cg_htgl_qydw_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_qydwlxr_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_qydwlxr();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_qydwlxr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_qydwlxrdh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_qydwlxrdh();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_qydwlxrdh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_zbj_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_zbj();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_zbj_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_htgl_zbdqrq_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_htgl_mob_validate_zbdqrq();
  scCssBlur(oThis);
}

function sc_form_cg_htgl_zbdqrq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_qdrq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_qdrq" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['qdrq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_zbdqrq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_zbdqrq" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['zbdqrq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
