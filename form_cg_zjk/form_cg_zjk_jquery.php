
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
  scEventControl_data["zjbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sfzh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["gzdw" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zy" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["work" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["yddh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lwbz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["kyzt" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["zjbh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zjbh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sfzh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sfzh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gzdw" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gzdw" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zy" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zy" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["work" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["work" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["yddh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["yddh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lwbz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lwbz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kyzt" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kyzt" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("zy" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("work" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("zc" + iSeq == fieldName) {
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
  $('#id_sc_field_zjbh' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_zjbh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_zjbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_xm' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_xm_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_zjk_xm_onfocus(this, iSeqRow) });
  $('#id_sc_field_xb' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_xb_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_zjk_xb_onfocus(this, iSeqRow) });
  $('#id_sc_field_sfzh' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_sfzh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_sfzh_onfocus(this, iSeqRow) });
  $('#id_sc_field_gzdw' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_gzdw_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_gzdw_onfocus(this, iSeqRow) });
  $('#id_sc_field_zy' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_zy_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_zjk_zy_onfocus(this, iSeqRow) });
  $('#id_sc_field_work' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_work_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_work_onfocus(this, iSeqRow) });
  $('#id_sc_field_zc' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_zc_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_zjk_zc_onfocus(this, iSeqRow) });
  $('#id_sc_field_yddh' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_yddh_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_yddh_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_zjk_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_lwbz' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_lwbz_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_lwbz_onfocus(this, iSeqRow) });
  $('#id_sc_field_bz' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_bz_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_zjk_bz_onfocus(this, iSeqRow) });
  $('#id_sc_field_kyzt' + iSeqRow).bind('blur', function() { sc_form_cg_zjk_kyzt_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_zjk_kyzt_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cg_zjk_zjbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_zjbh();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_zjbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_xm_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_xm();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_xm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_xb_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_xb();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_xb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_sfzh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_sfzh();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_sfzh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_gzdw_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_gzdw();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_gzdw_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_zy_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_zy();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_zy_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_work_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_work();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_work_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_zc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_zc();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_zc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_yddh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_yddh();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_yddh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_email_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_email();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_lwbz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_lwbz();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_lwbz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_bz_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_bz();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_bz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_zjk_kyzt_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_zjk_validate_kyzt();
  scCssBlur(oThis);
}

function sc_form_cg_zjk_kyzt_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_dlsj" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dlsj" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['dlsj']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dlsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dlsj']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

