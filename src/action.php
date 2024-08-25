<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/ini.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/func.php';

$info_text3 = NULL;
$_backend_failed = NULL;
$db = false;
$_db_rows = array();
$type = isset( $_POST['registration_type'] ) ? $_POST['registration_type'] : 'exch';

$query = mysql_query( "SELECT `fieldtype`, `mandatory`, `name`, `regexp` FROM `inputs_$type`" );


// print_r($_POST);
// print_r($_backend_failed);

$row_test = mysql_fetch_assoc( $query );

// print_r($row_test);

// foreach ($_POST as $key => $value) {
// 	echo "Key: $key, Value: $value<br>";
// }

while ( $_row = mysql_fetch_assoc( $query ) ) {
	$key = $_row['name'];
	$regexp = isset($_row['regexp']) ? '/' . $_row['regexp'] . '/' : '';

	// print_r($regexp . "   ");
	// print_r($_row);
	// print_r($key);

	// print_r($key);

	if ( isset( $_POST[ $key ] ) ) {
		$val = $_POST[ $key ];

		// print_r($val);

		$_row['fieldtype'] = (int) $_row['fieldtype'];
		if ( in_array( $_row['fieldtype'], [1, 2, 3, 4, 6], true ) ) {
			if ( $_row['fieldtype'] === 4 ) {
				$val = is_array( $val ) ? implode( ',', $val ) : '';
			}
			$val = clear_hyphen( str_replace( '’', "'", stripslashes( strip_tags( trim( $val ) ) ) ) );



			// *********************//
			// print_r("$key  ");

			// if ( $key == 'banking_account1') {
			// 	$_backend_failed[] = $key;
			// }

			// *******************//


			// switch ($i) {
			// 	case 0:
			// 		echo "i equals 0";
			// 		break;
			// 	case 1:
			// 		echo "i equals 1";
			// 		break;
			// 	case 2:
			// 		echo "i equals 2";
			// 		break;
			// 	default:
			// 	   echo "i is not equal to 0, 1 or 2";
			// }

			// if ( $val == '' && $_row['mandatory'] ) {
			// 	$_backend_failed[] = $key;
			// 	continue;
			// } 


			// if ( $val !== '' ) {	
			// 	if ( in_array( $_row['name'], $_iban_fields ) ) {
			// 		if (!validateUAIBAN($val)) {
			// 			$_backend_failed[] = $key;
			// 			continue;
			// 		}
			// 	} else if ($_row['regexp']) {
			// 		if (!preg_match($_row['regexp'], $val)) {
			// 			$_backend_failed[] = $key;
			// 			continue;
			// 		}
			// 	}
			// } else ($_row['mandatory']) {
			// 	$_backend_failed[] = $key;
			// 	continue;
			// }

			

			if ($val == '' && $_row['mandatory']) {
				$_backend_failed[] = $key;
				continue;
			}

			if ($val !== '') {
				if ( in_array( $_row['name'], $_iban_fields ) ) {
					if (!validateUAIBAN($val)) {
						$_backend_failed[] = $key;
						continue;
					}
				} else if (isset($regexp) && $regexp !== "" ) {
					if (!preg_match($regexp, $val)) {
						$_backend_failed[] = $key;
						continue;
					}
				}
			}

			$_db_rows[ $_row['name'] ] = $val;
		}
	}
}

// print_r($_backend_failed);

if ( ! empty( $_db_rows ) && empty( $_backend_failed ) ) {
	$db = mysql_query( 'INSERT INTO users SET ' . db_set_array( $_db_rows ) );

	unset($_SESSION['form_data']);
	unset($_SESSION['backend_failed']);

	$info_text3 = 'Анкету отримано!';
} else {
	$_SESSION['form_data'] = $_POST;
    $_SESSION['backend_failed'] = $_backend_failed;

	$info_text3 = 'Сталася помилка! Перевірте поля форми';
}

?>
<!DOCTYPE html>
<html class="no-js" lang="uk-UA">

<head>
	<meta charset="utf-8">
	<title>Action</title>
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
			// console.log(html);
			html.className = html.className.replace(/\bno-js\b/, 'js')
			// console.log(html.className);
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

					<?php
						if ( empty($_backend_failed) ) {
							echo '<h1>' . $info_text3 . '</h1>' . "\n";
						} else {
							include 'html/redirect-popup.html';
							echo '<h1>' . $info_text3 . '</h1>' . "\n";
						}
					?>

				</div>
			</div> <!-- end .card -->
		</div> <!-- end .row -->



	</div> <!-- end form-wrapper -->

</div>

<script src="/js/helpers.js"></script>
</body>

</html>