
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
  scEventControl_data["zbggbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgbbh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgbmc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zjrs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cgfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["isneed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["isauto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zdrs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zsrs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xzcs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xmzjk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["zbggbh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zbggbh" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["zjrs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zjrs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgfs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgfs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["isneed" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["isneed" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["isauto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["isauto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zdrs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zdrs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zsrs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zsrs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xzcs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xzcs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xmzjk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xmzjk" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  if ("zbggbh" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("zjbh" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_zbggbh' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_zbggbh_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cg_xmzjk_auto_zbggbh_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cg_xmzjk_auto_zbggbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgbbh' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_cgbbh_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_xmzjk_auto_cgbbh_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgbmc' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_cgbmc_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_xmzjk_auto_cgbmc_onfocus(this, iSeqRow) });
  $('#id_sc_field_pc' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_pc_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_cg_xmzjk_auto_pc_onfocus(this, iSeqRow) });
  $('#id_sc_field_xmzjk' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_xmzjk_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cg_xmzjk_auto_xmzjk_onfocus(this, iSeqRow) });
  $('#id_sc_field_zjrs' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_zjrs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_xmzjk_auto_zjrs_onfocus(this, iSeqRow) });
  $('#id_sc_field_cgfs' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_cgfs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_xmzjk_auto_cgfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_isneed' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_isneed_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cg_xmzjk_auto_isneed_onfocus(this, iSeqRow) });
  $('#id_sc_field_isauto' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_isauto_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cg_xmzjk_auto_isauto_onfocus(this, iSeqRow) });
  $('#id_sc_field_zdrs' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_zdrs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_xmzjk_auto_zdrs_onfocus(this, iSeqRow) });
  $('#id_sc_field_zsrs' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_zsrs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_xmzjk_auto_zsrs_onfocus(this, iSeqRow) });
  $('#id_sc_field_xzcs' + iSeqRow).bind('blur', function() { sc_form_cg_xmzjk_auto_xzcs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cg_xmzjk_auto_xzcs_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cg_xmzjk_auto_zbggbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_zbggbh();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_zbggbh_onchange(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_event_zbggbh_onchange();
}

function sc_form_cg_xmzjk_auto_zbggbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_cgbbh_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_cgbbh();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_cgbbh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_cgbmc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_cgbmc();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_cgbmc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_pc_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_pc();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_pc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_xmzjk_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_xmzjk();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_xmzjk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_zjrs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_zjrs();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_zjrs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_cgfs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_cgfs();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_cgfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_isneed_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_isneed();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_isneed_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_isauto_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_isauto();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_isauto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_zdrs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_zdrs();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_zdrs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_zsrs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_zsrs();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_zsrs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cg_xmzjk_auto_xzcs_onblur(oThis, iSeqRow) {
  do_ajax_form_cg_xmzjk_auto_validate_xzcs();
  scCssBlur(oThis);
}

function sc_form_cg_xmzjk_auto_xzcs_onfocus(oThis, iSeqRow) {
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

