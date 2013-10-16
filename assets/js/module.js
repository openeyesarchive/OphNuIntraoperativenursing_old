
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'),function() {
	});

	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	handleButton($('#et_print'),function(e) {
		e.preventDefault();
		printIFrameUrl(OE_print_url, null);
	});

	$('#entered_or_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}

		$('#Element_OphNuIntraoperativenursing_Items_entered_or').val(h+":"+m);
	});

	$('#time_out_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
		
		$('#Element_OphNuIntraoperativenursing_Items_time_out').val(h+":"+m);
	});

	$('#surgery_start_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
		
		$('#Element_OphNuIntraoperativenursing_Items_surgery_start').val(h+":"+m);
	});

	$('#surgery_stop_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
		
		$('#Element_OphNuIntraoperativenursing_Items_surgery_stop').val(h+":"+m);
	});

	$('#sign_out_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
		
		$('#Element_OphNuIntraoperativenursing_Items_sign_out').val(h+":"+m);
	});

	$('#left_or_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
		
		$('#Element_OphNuIntraoperativenursing_Items_left_or').val(h+":"+m);
	});

	$('#inserted_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
	 
		$('#Element_OphNuIntraoperativenursing_Details_inserted_time').val(h+":"+m);
	});

	$('#removal_now').click(function(e) {
		e.preventDefault();

		var d = new Date;

		var h = String(d.getHours());
		if (h.length <2) {
			h = "0"+h;
		}
		var m = String(d.getMinutes());
		if (m.length <2) {
			m = "0"+m;
		}
	 
		$('#Element_OphNuIntraoperativenursing_Details_removal_time').val(h+":"+m);
	});

	$('input[name="Element_OphNuIntraoperativenursing_Details[grounding_pad]"]').click(function(e) {
		if ($('#Element_OphNuIntraoperativenursing_Details_grounding_pad_1').is(':checked')) {
			$('#Element_OphNuIntraoperativenursing_Details_location_id').show();
		} else {
			$('#Element_OphNuIntraoperativenursing_Details_location_id').hide();
		}
	});

	$('input[name="Element_OphNuIntraoperativenursing_Details[nasal_or_throat_pack_id]"]').click(function(e) {
		if ($('#Element_OphNuIntraoperativenursing_Details_nasal_or_throat_pack_id_1').is(':checked') || $('#Element_OphNuIntraoperativenursing_Details_nasal_or_throat_pack_id_2').is(':checked')) {
			$('#div_Element_OphNuIntraoperativenursing_Details_inserted_time').show();
			$('#div_Element_OphNuIntraoperativenursing_Details_removal_time').show();
		} else {
			$('#div_Element_OphNuIntraoperativenursing_Details_inserted_time').hide();
			$('#div_Element_OphNuIntraoperativenursing_Details_removal_time').hide();
		}
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
