<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/ini.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/func.php';


$type = 'exch';
$type_title = 'Інші біржові торги';
$prev_nested = false;
$bank_blocks_maxnum = 3;
$agent_blocks_maxnum = BROKER_COUNT;
// $_backend_failed = ['banking_account1', 'company_phone'];
$_backend_failed = isset($_SESSION['backend_failed']) ? $_SESSION['backend_failed'] : [];
// $_backend_failed = [];
$_form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
// print_r($_SESSION['backend_failed']);

// print_r($_SESSION['form_data']);
// print_r($_SESSION['backend_failed']);

// print_r($_form_data);


$_test = true;


// print_r(empty($_form_data) && $_test);
// print_r(empty($_form_data) === true);
// print_r(!empty($_form_data));





// unset($_SESSION['form_data']);
// unset($_SESSION['backend_failed']);

// -- >> для тестирования >> -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
// if ( isset($_SESSION['form_data']) && !empty($_SESSION['form_data'])) {

// }



if ( empty($_form_data) && empty($_backend_failed) && $_test ) {
	$accreditation_sections = array( '«Скраплений газ»', '«Нафтопродукти»' );
	$accreditation_period = '12';

	$company_fullname_ukr = 'Товариство з обмеженою відповідальністю "ТЕСТ"';
	$company_fullname_eng = '"TEST" Company Limited';
	$company_shortname_ukr = 'ТОВ "ТЕСТ"';
	$company_shortname_eng = '"TEST" Co Ltd';
	$company_constituent_doc = 'статуту';
	$company_ownership_form = '«Державна»';
	$company_legal_address_code = '01001';
	$company_legal_address_country = 'Україна';
	$company_legal_address_oblast = 'Київська';
	$company_legal_address_city = 'Київ';
	$company_legal_address_district = 'Київський';
	$company_legal_address_street = 'Хрещатик';
	$company_legal_address_dom = '22';
	$company_legal_address_korpus = '';
	$company_legal_address_office = '1';
	$company_legal_address_eng = '22 Khreshchatyk St., office 1, Kyiv, Ukraine, 01001';
	$company_mailing_address_code = '01001';
	$company_mailing_address_country = 'Україна';
	$company_mailing_address_oblast = 'Київська';
	$company_mailing_address_city = 'Київ';
	$company_mailing_address_district = 'Київський';
	$company_mailing_address_street = 'Хрещатик';
	$company_mailing_address_dom = '22';
	$company_mailing_address_korpus = '';
	$company_mailing_address_office = '1';
	$company_phone = '+380501234567';
	$company_fax = '+380501112233';
	$company_email = 'ueex@tt.localhost';
	$company_code = '12345678';
	$company_vat_number = '1234567890';
	$company_tax_number = '0987654321';
	$company_eic = '21Х0000000012345';

	$bank_name_ukr1 = 'Акціонерне товариство «Державний експортно-імпортний банк України»';
	$bank_name_eng1 = 'Joint Stock Company "State Export-Import Bank of Ukraine"';
	$bank_address1 = 'м. Київ, вул. Антоновича, 127';
	$banking_account1 = 'UA213223130000026007233566001';
	// $bank_code1 = '322313';
	$bank_blocks_num = 1;

	$ceo_fullname_nom = 'Керівник Віталій Олександрович';
	$ceo_fullname_gen = 'Керівника Віталія Олександровича';
	$ceo_position_nom = 'директор';
	$ceo_position_gen = 'директора';
	$ceo_document_type = 'паспорт';
	$ceo_address = 'м. Кременчук, вул. Мироненко, 1, кв. 2';
	$ceo_passport_series = 'АА';
	$ceo_passport_number = '123456';
	$ceo_passport_authority = 'Дніпровським РВ ПГУ УМВС України у м. Кременчуці';
	$ceo_passport_date = '20.10.1990';
	$ceo_id_num = '1234567890';

	$signer_fullname_nom = 'Керівник Віталій Олександрович';
	$signer_fullname_gen = 'Керівника Віталія Олександровича';
	$signer_fullname_eng = 'Kerivnyk Vitaliy Oleksandrovich';
	$signer_position_nom = 'директор';
	$signer_position_gen = 'директора';
	$signer_position_eng = 'head';
	$signer_document_type = 'паспорт';
	$signer_address = 'м. Кременчук, вул. Мироненко, 1, кв. 2';
	$signer_passport_series = 'АА';
	$signer_passport_number = '123456';
	$signer_passport_authority = 'Дніпровським РВ ПГУ УМВС України у м. Кременчуці';
	$signer_passport_date = '20.10.1990';
	$signer_id_num = '1234567890';

	$agent_fullname_nom1 = 'Брокер Галина Миколаївна';
	$agent_fullname_gen1 = 'Брокера Галини Миколаївни';
	$agent_fullname_acc1 = 'Брокера Галину Миколаївну';
	$agent_fullname_eng1 = 'Broker Galina Mykolaivna';
	$agent_position1 = 'фінансовий директор';
	$agent_position_eng1 = 'financial director';
	$agent_document_type1 = 'паспорт';
	$agent_passport_series1 = 'ББ';
	$agent_passport_number1 = '112233';
	$agent_passport_authority1 = 'Комсомольським РВ ПГУ УМВС України у м. Кременчуці';
	$agent_passport_date1 = '01.01.1990';
	$agent_id1 = '1122334455';
	$agent_address1 = 'Полтавська область, м. Кременчук, вул. Ломоносова, 2, кв. 3';
	$agent_email1 = 'broker1@tt.localhost';
	$agent_work_phone1 = '+380501111111';
	$agent_mobile_phone1 = '+380501111112';

	$agent_fullname_nom2 = 'Брокер Сергій Олександрович';
	$agent_fullname_gen2 = 'Брокера Сергія Олександровича';
	$agent_fullname_acc2 = 'Брокера Сергія Олександровича';
	$agent_fullname_eng2 = 'Broker Sergiy Oleksandrovych';
	$agent_position2 = 'головний бухгалтер';
	$agent_position_eng2 = 'chief accountant';
	$agent_document_type2 = 'ID-картка';
	$agent_id_card_number2 = '123456789';
	$agent_id_card_date2 = '10.10.2010';
	$agent_id_card_authority2 = '1234';
	$agent_id2 = '6677889900';
	$agent_address2 = 'Полтавська область, м. Кременчук, вул. Ломоносова, 4, кв. 5';
	$agent_email2 = 'broker2@tt.localhost';
	$agent_work_phone2 = '+380502222221';
	$agent_mobile_phone2 = '+380502222222';

	$agent_blocks_num = 2;
}

// -- << для тестирования << -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --


$h1 = 'Заява-анкета <span>(для юридичних осіб або фізичних осіб-підприємців)</span>';
$intro_text = '';
$info_text1 = 'Підтверджуємо, що надані документи в електронному вигляді автентичні оригіналам. Несемо відповідальність за достовірність наданої інформації.';
$info_text2 = '';
$info_text3 = 'Будь ласка, відкорегуйте поля анкети, виділені червоним кольором, та відправте анкету ще раз.';

?>
<!DOCTYPE html>
<html class="no-js" lang="uk-UA">

<head>
	<meta charset="utf-8">
	<title>Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="/css/dore.light.blueyale.css">
	<link rel="stylesheet" href="/css/main.css">
	<script>(function (html) {
			html.className = html.className.replace(/\bno-js\b/, 'js')
		})(document.documentElement);</script>
	<script src="/js/vendor/jquery-3.3.1.min.js"></script>
</head>

<body id="app-container" class="menu-default">

<br><br>
<div class="form-wrapper form-wrapper-ap">

	<div class="row">

		<div class="col-12 form-content" style="margin: auto;">
			<div class="card">
				<div class="card-body">

					<h1 class="mb-1"><?php echo $h1; ?></h1>
					<p class="lead text-yellow">"<?php echo $type_title; ?>"</p>
					<p><?php echo $intro_text; ?></p>

				</div>
			</div> <!-- end .card -->

			<form name="apform" id="apform" method="post" action="action.php" enctype="multipart/form-data" onSubmit="return submitForm2(this);">
			<!-- <form name="apform" id="apform" method="post" action="action.php" enctype="multipart/form-data"> -->
				<div class="card mb-4">
					<div class="card-body">

						<?php

						$newcard_field_arr = array( 'company_info', 'bank_details1', 'ceo_info', 'agent_info1', 'documents_list' );
						$bank_details_headers = array( 'bank_details1', 'bank_details2', 'bank_details3' );
						$bank_details_footers = array( 'banking_account1', 'banking_account2', 'banking_account3' );
						$agent_info_headers = get_agent_info_headers();
						$agent_info_footers = $agent_docs = get_agent_docs();

						// *** Вывод полей формы
						$fcount = $doc_num = 0;
						$query_form = mysql_query( "SELECT * FROM inputs_$type ORDER BY ord ASC" );
						while ( $row_form = mysql_fetch_assoc( $query_form ) ) {

						$fcount++;
						$backend_info = false;

						// print_r("Key: " . $row_form['name'] . "<br>");

						// ****8**** //

						if ( !empty($_form_data) && !empty($_backend_failed) ) {
							$key = $row_form['name'];
							// print_r('here');
							// print_r($key);
							$field_name = $_form_data[$key];
							$agent_blocks_num = $_form_data['agent_blocks_num'];
							$bank_blocks_num = $_form_data['bank_blocks_num'];
							// print_r($field_name);
						} else if ( $_test === true ) {
							$field_name = ${$row_form['name']};
						}


						// ****8**** //



						$class_form_label = $class_form_field = '';
						$query_subfields = mysql_query( "SELECT name FROM inputs_$type WHERE parent=" . $row_form['name'] );

						if ( $row_form['parent'] ) {
							$class_form_label .= ' label-nested';
						} elseif ( $prev_nested ) {
							$class_form_label = $class_form_field .= ' mt-2';
						}

						if ( in_array( $row_form['name'], $newcard_field_arr ) ) { ?>

					</div>
				</div> <!-- end .card -->

				<div class="card mb-4">
					<div class="card-body">
						<?php }

						if ( $row_form['fieldtype'] == 5 ) {
							continue;
						}

						if ( ! $bank_blocks_num ) {
							$bank_blocks_num = 1;
						}
						if ( in_array( $row_form['name'], $bank_details_headers ) ) {
							$field_id = extract_number_from_end( $row_form['name'] );
							if ( $field_id > $bank_blocks_num ) {
								echo '<div id="bank_block' . $field_id . '" class="bank-block" style="display: none">';
							} else {
								echo '<div id="bank_block' . $field_id . '" class="bank-block">';
							}
							$bank_field = true;
						}
						if ( ! $agent_blocks_num ) {
							$agent_blocks_num = 1;
						}
						if ( in_array( $row_form['name'], $agent_info_headers ) ) {
							$field_id = str_replace( 'agent_info', '', $row_form['name'] );
							if ( $field_id > $agent_blocks_num ) {
								echo '<div id="agent_block' . $field_id . '" class="agent-block" style="display: none">';
							} else {
								echo '<div id="agent_block' . $field_id . '" class="agent-block">';
							}
						}

						if ( $row_form['fieldtype'] == 0 && $row_form['header'] ) {
							echo '<h2 class="section-title">' . $row_form['descr'] . '</h2>' . "\n";
						} else {

							if ( $row_form['fieldtype'] == 0 ) {
								echo '<h4 class="group-title ' . $row_form['name'] . '">' . $row_form['descr'] . ':</h4>' . "\n";
							} else {
								echo '<div class="form-group row row-field-type' . $row_form['fieldtype'] . '">
				<label' . ( $row_form['fieldtype'] != 6 ? ' for="' . $row_form['name'] . '"' : '' ) . ' class="' . ( ( $row_form['fieldtype'] != 5 || in_array( $row_form['name'], $agent_docs ) || $row_form['name'] == 'signer_doc_dsc' ) ? 'col-sm-3' : 'col-sm-4' ) . ' col-form-label' . $class_form_label . ' ' . $row_form['name'] . '">' . $row_form['descr'] . '</label>' . "\n";
							}

							$css_element = array();
							$css_element['class'] = isset( $form_fieldtype_class[ $row_form['fieldtype'] ] ) ? $form_fieldtype_class[ $row_form['fieldtype'] ] : '';
							$css_element['front'] = in_array( $row_form['fieldtype'], [ 1 ] ) ? 'js_element_handle' : '';
							$css_element['width'] = ( in_array( $row_form['fieldtype'], [ 1, 2, 3 ] ) && $row_form['pctwidth'] ) ? 'width-' . $row_form['pctwidth'] : '';
							$css_element['error'] = in_array( $row_form['name'], $_backend_failed ) ? 'field-error' : '';
							$css_element = implode( ' ', $css_element );

							// -- input[type="text"]
							if ( $row_form['fieldtype'] == 1 ) {
								// атрибут "data-regexp" элемента input равен значению регулярного выражения (если таковое задано) для данного поля
								// атрибут "data-mandatory" элемента input равен "true", если данное поле является обязательным для заполнения
								echo '<div class="col-sm-9 col-form-field' . $class_form_field . '">';
								echo '<input type="text" id="' . $row_form['name'] . '" name="' . $row_form['name'] . '" maxlength="255" value="' . htmlspecialchars( stripslashes( $field_name ) ) . '" class="' . $css_element . '" data-regexp="' . $row_form['regexp'] . '" data-mandatory="' . ( $row_form['mandatory'] == 1 ? 'true' : 'false' ) . '">';
								if ( $row_form['note'] ) { // если у поля есть примечание, вставляем примечание
									echo '<span class="note">' . $row_form['note'] . '</span>';
								}
								if ( in_array( $row_form['name'], $_iban_fields ) && in_array( $row_form['name'], $_backend_failed ) ) {
									echo '<div class="note text-red" data-backend_info="' . $row_form['name'] . '">IBAN введено з помилкою</div>';
									$backend_info = true;
								}
								if ( $row_form['validation_info'] ) {
									echo '<div class="note text-red' . ( ( in_array( $row_form['name'], $_backend_failed ) && ! $backend_info ) ? '' : ' d-none' ) . '" data-validation_info="' . $row_form['name'] . '">' . $row_form['validation_info'] . '</div>';
								}
								echo '</div>' . "\n";
							} // -- textarea
							elseif ( $row_form['fieldtype'] == 2 ) {
								// атрибут "data-regexp" элемента input равен значению регулярного выражения (если таковое задано) для данного поля
								// атрибут "data-mandatory" элемента input равен "true", если данное поле является обязательным для заполнения
								echo '<div class="col-sm-9 col-form-field' . $class_form_field . '"><textarea id="' . $row_form['name'] . '" name="' . $row_form['name'] . '" rows="2" class="' . $css_element . '" onFocus="clearField(this)" data-regexp="' . $row_form['regexp'] . '" data-mandatory="' . ( $row_form['mandatory'] == 1 ? 'true' : 'false' ) . '">' . htmlspecialchars( stripslashes( $field_name ) ) . '</textarea>';
								if ( $row_form['note'] ) { // если у поля есть примечание, вставляем примечание
									echo '<span class="note">' . $row_form['note'] . '</span>';
								}
								echo '</div>' . "\n";
							} // -- select
							elseif ( $row_form['fieldtype'] == 3 ) {
								$options = explode( ',', $row_form['value'] );
								echo '<div class="col-sm-9 col-form-field' . $class_form_field . '"><select id="' . $row_form['name'] . '" name="' . $row_form['name'] . '" class="' . $css_element . '" onFocus="clearField(this)"><option></option>';
								for ( $i = 0; $i < sizeof( $options ); $i++ ) {
									$options[ $i ] = trim( $options[ $i ] );
									echo '<option' . ( $field_name == $options[ $i ] ? ' selected' : '' ) . '>' . $options[ $i ] . '</option>' . "\n";
								}
								echo '</select>' . "\n";
								if ( $row_form['note'] ) { // если у поля есть примечание, вставляем примечание
									echo '<div class="note">' . $row_form['note'] . '</div>' . "\n";
								}
								echo '</div>' . "\n";
							} // -- checkbox (single/multiple)
							elseif ( $row_form['fieldtype'] == 4 ) {
								$options = explode( ',', $row_form['value'] );
								echo '<div class="col-sm-9 col-form-field' . $class_form_field . '">' . "\n";
								for ( $i = 0; $i < sizeof( $options ); $i++ ) {
									$options[ $i ] = trim( $options[ $i ] );
									echo '<div class="custom-control custom-checkbox"><input type="checkbox" id="' . $row_form['name'] . '-' . ( $i + 1 ) . '" name="' . $row_form['name'] . '[]" class="' . $css_element . ( sizeof( $options ) > 1 ? ' checkbox-multiple' : ' checkbox-single' ) . '" value="' . ( get_magic_quotes_gpc() ? $options[ $i ] : addslashes( $options[ $i ] ) ) . '" onFocus="clearField(document.getElementsByName(\'' . $row_form['name'] . '[]\'))"' . ' data-mandatory="' . ( $row_form['mandatory'] == 1 ? 'true' : 'false' ) . '"' . ( is_array( $field_name ) && in_array( $options[ $i ], $field_name ) ? ' checked' : '' ) . '><label for="' . $row_form['name'] . '-' . ( $i + 1 ) . '">&nbsp;' . $options[ $i ] . '</label></div>' . "\n";
								}
								if ( $row_form['note'] ) { // если у поля есть примечание, вставляем примечание
									echo '<div class="note">' . $row_form['note'] . '</div>' . "\n";
								}
								echo '</div>' . "\n";
							} // -- input[type="file"]
							elseif ( $row_form['fieldtype'] == 5 ) {
							} // -- input[type="radio"]
							elseif ( $row_form['fieldtype'] == 6 ) {
								$options = explode( ',', $row_form['value'] );
								echo '<div class="col-sm-9 col-form-field' . $class_form_field . '">' . "\n";
								for ( $i = 0; $i < sizeof( $options ); $i++ ) {
									$options[ $i ] = trim( $options[ $i ] );
									echo '<div class="form-check"><input type="radio" id="' . $row_form['name'] . '-' . translit( $options[ $i ] ) . '" name="' . $row_form['name'] . '" class="' . $css_element . '" value="' . $options[ $i ] . '"' . ( $field_name == $options[ $i ] || ( ! $field_name && $i === 0 ) ? ' checked' : '' ) . '><label for="' . $row_form['name'] . '-' . translit( $options[ $i ] ) . '" class="form-check-label">' . $options[ $i ] . '</label></div>' . "\n";
								}
								echo '</div>' . "\n";
							}

							if ( $row_form['fieldtype'] != 0 ) {
								echo '</div>' . "\n"; // end .form-group.row
							}
						}
						$prev_nested = $row_form['parent'] ? true : false; // флаг для следующей строки (показывает, что предыдущая была вложенной)

						if ( in_array( $row_form['name'], $bank_details_footers ) ) {
							echo '</div>' . "\n"; // end .bank-block
							$bank_field = false;
						}
						if ( $row_form['name'] == $bank_details_footers[ sizeof( $bank_details_footers ) - 1 ] ) {
							echo '<div class="block-controls"><a href="#" onClick="bankAccounts(\'add\'); return false;" id="add_account_link"><i class="simple-icon-plus"></i>додати рахунок</a><a href="#" onClick="bankAccounts(\'delete\'); return false;" id="del_account_link"><i class="simple-icon-minus"></i>видалити рахунок</a></div>' . "\n";
						}
						if ( in_array( $row_form['name'], $agent_info_footers ) ) {
							echo '</div>' . "\n"; // end .agent-block
						}
						if ( $row_form['name'] == $agent_info_footers[ sizeof( $agent_info_footers ) - 1 ] ) {
							echo '<div class="block-controls"><a href="#" onClick="agentsInfo(\'add\'); return false;" id="add_agent_link"><i class="simple-icon-plus"></i>додати особу</a><a href="#" onClick="agentsInfo(\'delete\'); return false;" id="del_agent_link"><i class="simple-icon-minus"></i>видалити особу</a></div>' . "\n";
						}
						}
						?>

					</div>
				</div> <!-- end .card -->

				<div class="card mb-4">
					<div class="card-body">

						<h2>Підтвердження клієнтських даних</h2>

						<div id="agree_block" class="alert alert-info form-check" role="alert">
							<input type="checkbox" autocomplete="off" id="agree_cb" name="agree" value="1" class="form-check-input" onClick="clearField(document.getElementById('agree_block'));">
							<label for="agree_cb" class="form-check-label"><?php echo $info_text1; ?></label>
						</div>

						<div id="error_msg" class="alert alert-error" role="alert" style="display: none"><i class="simple-icon-note"></i><span class="text-red"><?php echo $info_text3; ?></span></div>

						<div class="info-text-bottom"><?php echo $info_text2; ?></div>

						<div class="field-submit text-center mb-3">
							<button type="submit" id="submit_btn" name="submit_action" value="Send" class="btn btn-primary">Відправити</button>
						</div>
						<input type="hidden" name="bank_blocks_num" value="<?php echo $bank_blocks_num; ?>">
						<input type="hidden" name="agent_blocks_num" value="<?php echo $agent_blocks_num; ?>">
						<input type="hidden" name="registration_type" value="<?php echo $type; ?>">

					</div> <!-- end .card-body -->
				</div> <!-- end .card -->
			</form>

		</div> <!-- end .col -->

		<script>
			// ***************//
			document.addEventListener('DOMContentLoaded', function() {
				document.getElementById('agree_cb').checked = false;
			});
			// document.getElementById('agree_cb').checked = false;

			<?php if (!empty($_backend_failed)) {?>

				$(document).ready(function() {
					$("#error_msg").css({
						"position": "fixed",
						"top": "0",
						"left": "0",
						"width": "100%",
						"text-align": "center",
						"z-index": "1000"
					});

					$("#error_msg").show();
					
					setTimeout(function() {
						// $("#error_msg").hide();
						$("#error_msg").slideUp(400);
					}, 2500);
				});

			<?php }?>

			<?php
			echo "var bank_blocks_maxnum = '$bank_blocks_maxnum';\n";
			echo "var agent_blocks_maxnum = $agent_blocks_maxnum;\n";
			?>
			bankAccounts();
			agentsInfo();

			function clearField(field) {
				$(field).removeClass('field-error');
				$('#error_msg').slideUp(400);
			}

			function bankAccounts(action) {
				var f = document.apform,
					bank_blocks_num = f.bank_blocks_num.value;
				if (action == 'add' && bank_blocks_num < bank_blocks_maxnum) {
					bank_blocks_num++;
					$('#bank_block' + bank_blocks_num).show();
					f.bank_blocks_num.value = bank_blocks_num;
				}
				if (action == 'delete' && bank_blocks_num > 1) {
					$('#bank_block' + bank_blocks_num).hide();
					bank_blocks_num--;
					f.bank_blocks_num.value = bank_blocks_num;
				}
				if (f.bank_blocks_num.value < bank_blocks_maxnum) {
					$('#add_account_link').show();
				} else {
					$('#add_account_link').hide();
				}
				if (f.bank_blocks_num.value > 1) {
					$('#del_account_link').show();
				} else {
					$('#del_account_link').hide();
				}
			}

			function agentsInfo(action) {
				let f = document.apform,
					agent_blocks_num = parseInt(f.agent_blocks_num.value);
				if (action === 'add' && agent_blocks_num < agent_blocks_maxnum) {
					agent_blocks_num++;
					$('#agent_block' + agent_blocks_num).show();
					f.agent_blocks_num.value = agent_blocks_num;
				}
				if (action === 'delete' && agent_blocks_num > 1) {
					$('#agent_block' + agent_blocks_num).hide();
					agent_blocks_num--;
					f.agent_blocks_num.value = agent_blocks_num;
				}
				agent_blocks_num = parseInt(f.agent_blocks_num.value);
				if (agent_blocks_num < agent_blocks_maxnum) {
					$('#add_agent_link').show();
				} else {
					$('#add_agent_link').hide();
				}
				if (agent_blocks_num > 1) {
					$('#del_agent_link').show();
				} else {
					$('#del_agent_link').hide();
				}
			}

			// *** Показывать/скрывать поля при переключении radio-button "Тип документа"
			$('#apform input[name="ceo_document_type"]').change(function () {
				toggleDocumentData($(this).val(), '[class*="ceo_passport_"]', '[class*="ceo_id_card_"]');
			});
			$('#apform input[name="signer_document_type"]').change(function () {
				toggleDocumentData($(this).val(), '[class*="signer_passport_"]', '[class*="signer_id_card_"]');
			});
			<?php for ( $i = 1; $i <= BROKER_COUNT; $i++ ) { ?>
			$('#apform input[name="agent_document_type<?php echo $i; ?>"]').change(function () {
				toggleDocumentData($(this).val(), '[class*="agent_passport_"][class$="<?php echo $i; ?>"]', '[class*="agent_id_card_"][class$="<?php echo $i; ?>"]');
			});
			<?php } ?>

			function toggleDocumentData(val, passportGroupClass, idcardGroupClass) {
				var $passportGroup = $('#apform label.col-form-label' + passportGroupClass),
					$idcardGroup = $('#apform label.col-form-label' + idcardGroupClass),
					$passportGroupTitle = $('#apform h4.group-title' + passportGroupClass),
					$idcardGroupTitle = $('#apform h4.group-title' + idcardGroupClass);
				if (val == 'ID-картка') {
					$idcardGroupTitle.show();
					$idcardGroup.parent('.form-group').show();
					$passportGroupTitle.hide();
					$passportGroup.parent('.form-group').hide();
				} else {
					$passportGroupTitle.show();
					$passportGroup.parent('.form-group').show();
					$idcardGroupTitle.hide();
					$idcardGroup.parent('.form-group').hide();
				}
			}

			toggleDocumentData($('#apform input[name="ceo_document_type"]:checked').val(), '[class*="ceo_passport_"]', '[class*="ceo_id_card_"]');
			toggleDocumentData($('#apform input[name="signer_document_type"]:checked').val(), '[class*="signer_passport_"]', '[class*="signer_id_card_"]');
			<?php for ( $i = 1; $i <= BROKER_COUNT; $i++ ) { ?>
			toggleDocumentData($('#apform input[name="agent_document_type<?php echo $i; ?>"]:checked').val(), '[class*="agent_passport_"][class$="<?php echo $i; ?>"]', '[class*="agent_id_card_"][class$="<?php echo $i; ?>"]');
			<?php } ?>
		</script>

	</div> <!-- end .row -->

</div> <!-- end form-wrapper -->

<script src="/js/form_check.js?ver=<?php echo time(); ?>"></script>
</body>

</html>