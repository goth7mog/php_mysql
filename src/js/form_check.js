function submitForm2(form, action) {
	let i, element, result;
	if ( typeof action !== 'undefined' ) {
		form.action = action;
	}
	form.target = '';
	for ( i=0; i < form.length; i++ ) {
		element = form[i];
		if ( element.type === 'file' ) {
			element.value = '';
		}
	}
	result = checkForm2(form);
	if ( result ) {
		$(form).find(':input:not([type="hidden"]):hidden').prop('disabled', true);
	}
	return result;
}

function setBankMandatory(form_id) {
	let bank_usd_all_filled = true,
		bank_eur_all_filled = true,
		bank_usd_inputs = $( '#' + form_id + ' [id^="bank_usd_"]' ),
		bank_eur_inputs = $( '#' + form_id + ' [id^="bank_eur_"]' );

	if ( typeof bank_usd_inputs === 'undefined' || typeof bank_eur_inputs === 'undefined' ) {
		return;
	}

	// "Банківські реквізити" форми USD / EUR: обов'язкова до заповнення принаймні одна з форм
	bank_usd_inputs.data( 'mandatory', true );
	bank_eur_inputs.data( 'mandatory', true );

	bank_usd_inputs.each( function() {
		if ( $(this).val().trim() === '' ) {
			bank_usd_all_filled = false;
			return false;
		}
	});

	bank_eur_inputs.each( function() {
		if ( $(this).val().trim() === '' ) {
			bank_eur_all_filled = false;
			return false;
		}
	});

	if ( bank_usd_all_filled ) {
		bank_eur_inputs.data( 'mandatory', false );
	}

	if ( bank_eur_all_filled ) {
		bank_usd_inputs.data( 'mandatory', false );
	}
}

function checkForm2(form) {
	let agree_block = document.getElementById( 'agree_block' ),
		agree_cb = document.getElementById( 'agree_cb' ),
		result = true,
		i, element;

	setBankMandatory(form.id);

	for ( i=0; i < form.length; i++ ) {
		element = form[i];
		if ( ! checkElement2(element) ) {
			result = false;
		}
	}
	if ( agree_cb && ! agree_cb.checked ) {
		$( agree_block ).addClass( 'field-error' );
		result = false;
	}
	if ( ! result ) {
		$( '#error_msg' ).show();
		$( '#code_error_msg' ).hide();
	}
	return result;
}

function checkElement2(element) {
	if ( element.type === 'text' || element.type === 'textarea' ) {
		clearField2(element);
		if ( $(element).is( ':hidden' ) ) { // обнуляем значения "невидимых" полей text || textarea
			return true;
		}
		element.value = element.value.trim();
		if ( ! element.value ) { // атрибут "data-mandatory" элемента input равен "true", если данное поле является обязательным для заполнения
			if ( $(element).data( 'mandatory' ) ) {
				elementError2(element);
				return false;
			}
		} else {
			if ( $(element).data( 'regexp' ) ) { // атрибут "data-regexp" элемента input равен значению регулярного выражения (если таковое задано) для данного поля
				let regex = new RegExp( $(element).data( 'regexp' ), 'i' );
				if ( regex.test( element.value ) === false ) {
					elementError2(element);
					return false;
				}
			}
			return elementSpecialValidate2(element);
		}
	}
	if ( $(element).is( ':visible' ) ) {
		if ( element.type === 'select-one' ) {
			clearField2(element);
			if ( element.selectedIndex < 1 && ! element.value ) {
				elementError2(element);
				return false;
			}
		}
		if ( element.type === 'checkbox' && ! element.name.startsWith('signer_permanent_license') ) {
			clearField2(element);
			if ( ! $( 'input[name="' + element.name + '"]' ).is( ':checked' ) ) {
				elementError2(element);
				return false;
			}
		}
	}

	return true;
}

function elementSpecialValidate2(element) { // text || textarea
	let ua_iban_names = ['banking_account1', 'banking_account2', 'banking_account3'];

	if ( ua_iban_names.includes(element.name) && ! validateUAIBAN(element.value) ) {
		elementError2(element);
		return false;
	}

	return true;
}

function elementError2(element, custom_text) {
	$(element).addClass( 'field-error' );
	let errorLayer = $( '[data-validation_info="' + element.name + '"]' );
	if ( typeof custom_text !== 'undefined' ) {
		errorLayer.html( custom_text );
	}
	errorLayer.removeClass( 'd-none' );
}

function clearField2(element) {
	$( element ).removeClass( 'field-error' );
	$('[data-validation_info="' + element.name + '"]').addClass( 'd-none' );
	$('[data-backend_info="' + element.name + '"]').addClass( 'd-none' );
}

function validateUAIBAN(iban) {
	iban = iban.replace(/[\s-]/g, '');

	if (iban.length === 27) {
		iban = 'UA' + iban;
	}

	let regex = /^UA[0-9]{27}$/i;
	if (!regex.test(iban)) {
		return false;
	}

	iban = iban.substr(4) + iban.substr(0, 4);

	let remainder = 0, numericIban = '', charCode, i;
	for (i = 0; i < iban.length; i++) {
		charCode = iban.charCodeAt(i);
		if (charCode >= 65 && charCode <= 90) {
			numericIban += (charCode - 55).toString();
		} else {
			numericIban += iban.charAt(i);
		}
	}

	for (i = 0; i < numericIban.length; i++) {
		remainder = (parseInt(remainder.toString() + numericIban.charAt(i)) % 97);
	}

	return remainder === 1;
}

$(function() {
	let form_inputs = $('.js_element_handle');

	form_inputs.on('focusout', function(){
		checkElement2(this);
	});

	form_inputs.on('focus', function(){
		clearField2(this);
		$('#error_msg').slideUp(400);
	});
});