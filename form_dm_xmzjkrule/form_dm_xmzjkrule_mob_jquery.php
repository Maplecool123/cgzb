
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
  scEventControl_data["cgfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["isneed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["isauto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zdrs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zsrs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["xzcs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qyzt" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
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
  if (scEventControl_data["qyzt" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qyzt" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("cgfs" + iSeq == fieldName) {
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
  $('#id_sc_field_cgfs' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_cgfs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dm_xmzjkrule_cgfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_isneed' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_isneed_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dm_xmzjkrule_isneed_onfocus(this, iSeqRow) });
  $('#id_sc_field_isauto' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_isauto_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dm_xmzjkrule_isauto_onfocus(this, iSeqRow) });
  $('#id_sc_field_zdrs' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_zdrs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dm_xmzjkrule_zdrs_onfocus(this, iSeqRow) });
  $('#id_sc_field_zsrs' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_zsrs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dm_xmzjkrule_zsrs_onfocus(this, iSeqRow) });
  $('#id_sc_field_xzcs' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_xzcs_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dm_xmzjkrule_xzcs_onfocus(this, iSeqRow) });
  $('#id_sc_field_qyzt' + iSeqRow).bind('blur', function() { sc_form_dm_xmzjkrule_qyzt_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dm_xmzjkrule_qyzt_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_dm_xmzjkrule_cgfs_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_cgfs();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_cgfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_isneed_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_isneed();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_isneed_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_isauto_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_isauto();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_isauto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_zdrs_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_zdrs();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_zdrs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_zsrs_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_zsrs();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_zsrs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_xzcs_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_xzcs();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_xzcs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dm_xmzjkrule_qyzt_onblur(oThis, iSeqRow) {
  do_ajax_form_dm_xmzjkrule_mob_validate_qyzt();
  scCssBlur(oThis);
}

function sc_form_dm_xmzjkrule_qyzt_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
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
