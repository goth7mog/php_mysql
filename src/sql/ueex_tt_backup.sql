-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 19 2023 г., 13:56
-- Версия сервера: 5.5.62-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ueex_tt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `inputs_exch`
--

CREATE TABLE `inputs_exch` (
  `ord` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `descr` text NOT NULL,
  `fieldtype` int(1) NOT NULL DEFAULT '1',
  `parent` varchar(255) NOT NULL DEFAULT '',
  `header` int(1) NOT NULL DEFAULT '0',
  `mandatory` int(1) NOT NULL DEFAULT '1',
  `pctwidth` tinyint(3) UNSIGNED NOT NULL DEFAULT '100',
  `note` varchar(255) NOT NULL DEFAULT '',
  `regexp` varchar(255) NOT NULL DEFAULT '',
  `validation_info` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `inputs_exch`
--

INSERT INTO `inputs_exch` (`ord`, `name`, `value`, `descr`, `fieldtype`, `parent`, `header`, `mandatory`, `pctwidth`, `note`, `regexp`, `validation_info`) VALUES
(4, 'company_info', '', 'Інформація про компанію', 0, '', 1, 1, 100, '', '', ''),
(5, 'company_fullname_ukr', '', 'Назва компанії (повна)', 1, '', 0, 1, 75, '(українською мовою)', '', ''),
(6, 'company_fullname_eng', '', '', 1, '', 0, 0, 75, '(англійською мовою)', '', ''),
(7, 'company_shortname_ukr', '', 'Назва компанії (скорочена)', 1, '', 0, 1, 75, '(українською мовою)', '', ''),
(8, 'company_shortname_eng', '', '', 1, '', 0, 0, 75, '(англійською мовою)', '', ''),
(9, 'company_constituent_doc', '', 'Компанія діє на підставі', 1, '', 0, 1, 50, '(назва документа у родовому відмінку)', '', ''),
(10, 'company_ownership_form', '', 'Форма власності', 1, '', 0, 1, 100, '', '', ''),
(11, 'company_legal_address', '', 'Юридична адреса', 0, '', 0, 1, 100, '', '', ''),
(12, 'company_legal_address_code', '', 'Індекс', 1, 'company_legal_address', 0, 1, 50, '', '^[0-9]+$', ''),
(13, 'company_legal_address_country', '', 'Країна', 1, 'company_legal_address', 0, 1, 50, '', '', ''),
(14, 'company_legal_address_oblast', '', 'Область', 1, 'company_legal_address', 0, 0, 50, '', '', ''),
(15, 'company_legal_address_city', '', 'Місто', 1, 'company_legal_address', 0, 1, 50, '', '', ''),
(16, 'company_legal_address_district', '', 'Район', 1, 'company_legal_address', 0, 0, 50, '', '', ''),
(17, 'company_legal_address_street', '', 'Вулиця', 1, 'company_legal_address', 0, 1, 50, '', '', ''),
(18, 'company_legal_address_dom', '', 'Будинок', 1, 'company_legal_address', 0, 1, 50, '', '', ''),
(19, 'company_legal_address_korpus', '', 'Корпус', 1, 'company_legal_address', 0, 0, 50, '(заповнюється у разі наявності)', '', ''),
(20, 'company_legal_address_office', '', 'Офіс (кім.)', 1, 'company_legal_address', 0, 0, 50, '(заповнюється у разі наявності)', '', ''),
(21, 'company_legal_address_eng', '', 'Юридична адреса (на англ. мові)', 2, '', 0, 0, 100, '', '', ''),
(22, 'company_mailing_address', '', 'Поштова адреса', 0, '', 0, 1, 100, '', '', ''),
(23, 'company_mailing_address_code', '', 'Індекс', 1, 'company_mailing_address', 0, 1, 50, '', '^[0-9]+$', ''),
(24, 'company_mailing_address_country', '', 'Країна', 1, 'company_mailing_address', 0, 1, 50, '', '', ''),
(25, 'company_mailing_address_oblast', '', 'Область', 1, 'company_mailing_address', 0, 0, 50, '', '', ''),
(26, 'company_mailing_address_city', '', 'Місто', 1, 'company_mailing_address', 0, 1, 50, '', '', ''),
(27, 'company_mailing_address_district', '', 'Район', 1, 'company_mailing_address', 0, 0, 50, '', '', ''),
(28, 'company_mailing_address_street', '', 'Вулиця', 1, 'company_mailing_address', 0, 1, 50, '', '', ''),
(29, 'company_mailing_address_dom', '', 'Будинок', 1, 'company_mailing_address', 0, 1, 50, '', '', ''),
(30, 'company_mailing_address_korpus', '', 'Корпус', 1, 'company_mailing_address', 0, 0, 50, '(заповнюється у разі наявності)', '', ''),
(31, 'company_mailing_address_office', '', 'Офіс (кім.)', 1, 'company_mailing_address', 0, 0, 50, '(заповнюється у разі наявності)', '', ''),
(32, 'company_phone', '', 'Телефон', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(33, 'company_fax', '', 'Телефон/факс', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(34, 'company_email', '', 'E-mail', 1, '', 0, 1, 50, '', '^[0-9a-z_-]+(\\.[0-9a-z_-]+)*@[0-9a-z-]+(\\.[0-9a-z-]+)+$', ''),
(35, 'company_code', '', 'Код за ЄДРПОУ', 1, '', 0, 1, 50, '', '^[0-9]+$', ''),
(36, 'company_tax_number', '', 'Індивідуальний податковий номер', 1, '', 0, 0, 50, '', '^[0-9]+$', ''),
(38, 'bank_details1', '', 'Поточний (розрахунковий) рахунок – 1', 0, '', 1, 1, 100, '', '', ''),
(39, 'bank_name_ukr1', '', 'Назва банку', 1, '', 0, 1, 75, '(українською мовою)', '', ''),
(40, 'bank_name_eng1', '', '', 1, '', 0, 0, 75, '(англійською мовою)', '', ''),
(41, 'bank_address1', '', 'Адреса банку', 1, '', 0, 1, 100, '', '', ''),
(42, 'banking_account1', '', 'Поточний рахунок', 1, '', 0, 1, 50, '', '^(UA)?[0-9]{27}$', 'Вкажіть рахунок у форматі IBAN'),
(43, 'bank_code1', '', 'МФО', 1, '', 0, 1, 50, '', '^[0-9]{6}$', ''),
(44, 'bank_details2', '', 'Поточний рахунок – 2', 0, '', 1, 1, 100, '', '', ''),
(45, 'bank_name_ukr2', '', 'Назва банку', 1, '', 0, 1, 75, '(українською мовою)', '', ''),
(46, 'bank_name_eng2', '', '', 1, '', 0, 0, 75, '(англійською мовою)', '', ''),
(47, 'bank_address2', '', 'Адреса банку', 1, '', 0, 1, 100, '', '', ''),
(48, 'banking_account2', '', 'Поточний рахунок', 1, '', 0, 1, 50, '', '^(UA)?[0-9]{27}$', 'Вкажіть рахунок у форматі IBAN'),
(49, 'bank_code2', '', 'МФО', 1, '', 0, 1, 50, '', '^[0-9]{6}$', ''),
(50, 'bank_details3', '', 'Поточний рахунок – 3', 0, '', 1, 1, 100, '', '', ''),
(51, 'bank_name_ukr3', '', 'Назва банку', 1, '', 0, 1, 75, '(українською мовою)', '', ''),
(52, 'bank_name_eng3', '', '', 1, '', 0, 0, 75, '(англійською мовою)', '', ''),
(53, 'bank_address3', '', 'Адреса банку', 1, '', 0, 1, 100, '', '', ''),
(54, 'banking_account3', '', 'Поточний рахунок', 1, '', 0, 1, 50, '', '^(UA)?[0-9]{27}$', 'Вкажіть рахунок у форматі IBAN'),
(55, 'bank_code3', '', 'МФО', 1, '', 0, 1, 50, '', '^[0-9]{6}$', ''),
(56, 'ceo_info', '', 'Інформація про керівника', 0, '', 1, 1, 100, '', '', ''),
(57, 'ceo_fullname_nom', '', 'ПІБ керівника', 1, '', 0, 1, 75, '(у називному відмінку)', '', ''),
(58, 'ceo_fullname_gen', '', '', 1, '', 0, 1, 75, '(у родовому відмінку)', '', ''),
(59, 'ceo_position_nom', '', 'Посада керівника', 1, '', 0, 1, 75, '(у називному відмінку)', '', ''),
(60, 'ceo_position_gen', '', '', 1, '', 0, 1, 75, '(у родовому відмінку)', '', ''),
(62, 'ceo_passport_data', '', 'Паспортні дані керівника', 0, '', 0, 1, 100, '', '', ''),
(63, 'ceo_passport_series', '', 'серія', 1, 'ceo_passport_data', 0, 1, 50, '', '^[a-zа-яЁёҐґЄєІіЇї]{1,4}$', ''),
(64, 'ceo_passport_number', '', '№', 1, 'ceo_passport_data', 0, 1, 50, '', '^[0-9]{1,20}$', ''),
(65, 'ceo_passport_authority', '', 'ким виданий', 1, 'ceo_passport_data', 0, 1, 100, '', '', ''),
(66, 'ceo_passport_date', '', 'дата видачі', 1, 'ceo_passport_data', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '', ''),
(71, 'ceo_id_num', '', 'Ідентифікаційний номер керівника', 1, '', 0, 1, 50, '', '^([0-9]{10}|[А-Яа-яЁёҐґЄєІіЇї]{2}[0-9]{6})$', ''),
(72, 'agent_info1', '', 'Особа, що буде виконувати повноваження брокера – 1', 0, '', 1, 1, 100, '', '', ''),
(73, 'agent_fullname_nom1', '', 'ПІБ особи', 1, '', 0, 1, 50, '(у називному відмінку)', '', ''),
(74, 'agent_fullname_gen1', '', '', 1, '', 0, 1, 50, '(у родовому відмінку)', '', ''),
(75, 'agent_fullname_acc1', '', '', 1, '', 0, 1, 50, '(у знахідному відмінку)', '', ''),
(76, 'agent_position1', '', 'Посада особи', 1, '', 0, 1, 100, '', '', ''),
(78, 'agent_passport_data1', '', 'Паспортні дані особи', 0, '', 0, 1, 100, '', '', ''),
(79, 'agent_passport_series1', '', 'серія', 1, 'agent_passport_data1', 0, 1, 50, '', '^[a-zа-яЁёҐґЄєІіЇї]{1,4}$', ''),
(80, 'agent_passport_number1', '', '№', 1, 'agent_passport_data1', 0, 1, 50, '', '^[0-9]{1,20}$', ''),
(81, 'agent_passport_authority1', '', 'ким виданий', 1, 'agent_passport_data1', 0, 1, 100, '', '', ''),
(82, 'agent_passport_date1', '', 'дата видачі', 1, 'agent_passport_data1', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '', ''),
(87, 'agent_id1', '', 'Ідентифікаційний номер особи', 1, '', 0, 1, 50, '', '^([0-9]{10}|[А-Яа-яЁёҐґЄєІіЇї]{2}[0-9]{6})$', ''),
(88, 'agent_address1', '', 'Адреса проживання особи', 2, '', 0, 1, 100, '', '', ''),
(89, 'agent_email1', '', 'E-mail особи', 1, '', 0, 1, 50, '', '^[0-9a-z_-]+(\\.[0-9a-z_-]+)*@[0-9a-z-]+(\\.[0-9a-z-]+)+$', ''),
(90, 'agent_work_phone1', '', 'Телефон особи (робочий)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(91, 'agent_mobile_phone1', '', 'Телефон особи (мобільний)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(93, 'agent_info2', '', 'Особа, що буде виконувати повноваження брокера – 2', 0, '', 1, 1, 100, '', '', ''),
(94, 'agent_fullname_nom2', '', 'ПІБ особи', 1, '', 0, 1, 50, '(у називному відмінку)', '', ''),
(95, 'agent_fullname_gen2', '', '', 1, '', 0, 1, 50, '(у родовому відмінку)', '', ''),
(96, 'agent_fullname_acc2', '', '', 1, '', 0, 1, 50, '(у знахідному відмінку)', '', ''),
(97, 'agent_position2', '', 'Посада особи', 1, '', 0, 1, 100, '', '', ''),
(99, 'agent_passport_data2', '', 'Паспортні дані особи', 0, '', 0, 1, 100, '', '', ''),
(100, 'agent_passport_series2', '', 'серія', 1, 'agent_passport_data2', 0, 1, 50, '', '^[a-zа-яЁёҐґЄєІіЇї]{1,4}$', ''),
(101, 'agent_passport_number2', '', '№', 1, 'agent_passport_data2', 0, 1, 50, '', '^[0-9]{1,20}$', ''),
(102, 'agent_passport_authority2', '', 'ким виданий', 1, 'agent_passport_data2', 0, 1, 100, '', '', ''),
(103, 'agent_passport_date2', '', 'дата видачі', 1, 'agent_passport_data2', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '', ''),
(108, 'agent_id2', '', 'Ідентифікаційний номер особи', 1, '', 0, 1, 50, '', '^([0-9]{10}|[А-Яа-яЁёҐґЄєІіЇї]{2}[0-9]{6})$', ''),
(109, 'agent_address2', '', 'Адреса проживання особи', 2, '', 0, 1, 100, '', '', ''),
(110, 'agent_email2', '', 'E-mail особи', 1, '', 0, 1, 50, '', '^[0-9a-z_-]+(\\.[0-9a-z_-]+)*@[0-9a-z-]+(\\.[0-9a-z-]+)+$', ''),
(111, 'agent_work_phone2', '', 'Телефон особи (робочий)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(112, 'agent_mobile_phone2', '', 'Телефон особи (мобільний)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(114, 'agent_info3', '', 'Особа, що буде виконувати повноваження брокера – 3', 0, '', 1, 1, 100, '', '', ''),
(115, 'agent_fullname_nom3', '', 'ПІБ особи', 1, '', 0, 1, 50, '(у називному відмінку)', '', ''),
(116, 'agent_fullname_gen3', '', '', 1, '', 0, 1, 50, '(у родовому відмінку)', '', ''),
(117, 'agent_fullname_acc3', '', '', 1, '', 0, 1, 50, '(у знахідному відмінку)', '', ''),
(118, 'agent_position3', '', 'Посада особи', 1, '', 0, 1, 100, '', '', ''),
(120, 'agent_passport_data3', '', 'Паспортні дані особи', 0, '', 0, 1, 100, '', '', ''),
(121, 'agent_passport_series3', '', 'серія', 1, 'agent_passport_data3', 0, 1, 50, '', '^[a-zа-яЁёҐґЄєІіЇї]{1,4}$', ''),
(122, 'agent_passport_number3', '', '№', 1, 'agent_passport_data3', 0, 1, 50, '', '^[0-9]{1,20}$', ''),
(123, 'agent_passport_authority3', '', 'ким виданий', 1, 'agent_passport_data3', 0, 1, 100, '', '', ''),
(124, 'agent_passport_date3', '', 'дата видачі', 1, 'agent_passport_data3', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '', ''),
(129, 'agent_id3', '', 'Ідентифікаційний номер особи', 1, '', 0, 1, 50, '', '^([0-9]{10}|[А-Яа-яЁёҐґЄєІіЇї]{2}[0-9]{6})$', ''),
(130, 'agent_address3', '', 'Адреса проживання особи', 2, '', 0, 1, 100, '', '', ''),
(131, 'agent_email3', '', 'E-mail особи', 1, '', 0, 1, 50, '', '^[0-9a-z_-]+(\\.[0-9a-z_-]+)*@[0-9a-z-]+(\\.[0-9a-z-]+)+$', ''),
(132, 'agent_work_phone3', '', 'Телефон особи (робочий)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(133, 'agent_mobile_phone3', '', 'Телефон особи (мобільний)', 1, '', 0, 1, 50, '(формат запису: +380XXXXXXXXX)', '^\\+380[0-9]{9}$', ''),
(1, 'accreditation_params', '', 'Акредитація за напрямками', 0, '', 1, 1, 100, '', '', ''),
(2, 'accreditation_sections', '«Вугільна продукція», «Природний газ», «Скраплений газ», «Нафта та газовий конденсат», «Нафтопродукти»,«Сировина та інша продукція», «Добрива»', 'Напрямки, на яких бажаєте здійснювати біржові операції', 4, '', 0, 1, 100, '', '', ''),
(3, 'accreditation_period', '3,6,12', 'Строк оренди біржового місця (місяці)', 3, '', 0, 1, 50, '', '', ''),
(37, 'company_eic', '', 'EIC код', 1, '', 0, 0, 50, '(заповнюється для напрямку \"Природний газ\")', '', ''),
(61, 'ceo_document_type', 'паспорт, ID-картка', 'Тип документу', 6, '', 0, 1, 100, '', '', ''),
(70, 'ceo_id_card_authority', '', 'орган, що видав', 1, 'ceo_id_card_data', 0, 1, 100, '', '^[0-9]{4}$', ''),
(67, 'ceo_id_card_data', '', 'Дані ID-картки керівника', 0, '', 0, 1, 100, '', '', ''),
(69, 'ceo_id_card_date', '', 'дата видачі', 1, 'ceo_id_card_data', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '^[0-9]{2}\\.[0-9]{2}\\.[0-9]{4}$', ''),
(68, 'ceo_id_card_number', '', 'документ №', 1, 'ceo_id_card_data', 0, 1, 50, '', '^[0-9]{9}$', ''),
(77, 'agent_document_type1', 'паспорт, ID-картка', 'Тип документу', 6, '', 0, 1, 100, '', '', ''),
(86, 'agent_id_card_authority1', '', 'орган, що видав', 1, 'agent_id_card_data1', 0, 1, 100, '', '', ''),
(83, 'agent_id_card_data1', '', 'Дані ID-картки особи', 0, '', 0, 1, 100, '', '', ''),
(85, 'agent_id_card_date1', '', 'дата видачі', 1, 'agent_id_card_data1', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '^[0-9]{2}\\.[0-9]{2}\\.[0-9]{4}$', ''),
(84, 'agent_id_card_number1', '', 'документ №', 1, 'agent_id_card_data1', 0, 1, 50, '', '^[0-9]{9}$', ''),
(98, 'agent_document_type2', 'паспорт, ID-картка', 'Тип документу', 6, '', 0, 1, 100, '', '', ''),
(107, 'agent_id_card_authority2', '', 'орган, що видав', 1, 'agent_id_card_data2', 0, 1, 100, '', '', ''),
(104, 'agent_id_card_data2', '', 'Дані ID-картки особи', 0, '', 0, 1, 100, '', '', ''),
(106, 'agent_id_card_date2', '', 'дата видачі', 1, 'agent_id_card_data2', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '^[0-9]{2}\\.[0-9]{2}\\.[0-9]{4}$', ''),
(105, 'agent_id_card_number2', '', 'документ №', 1, 'agent_id_card_data2', 0, 1, 50, '', '^[0-9]{9}$', ''),
(119, 'agent_document_type3', 'паспорт, ID-картка', 'Тип документу', 6, '', 0, 1, 100, '', '', ''),
(128, 'agent_id_card_authority3', '', 'орган, що видав', 1, 'agent_id_card_data3', 0, 1, 100, '', '', ''),
(125, 'agent_id_card_data3', '', 'Дані ID-картки особи', 0, '', 0, 1, 100, '', '', ''),
(127, 'agent_id_card_date3', '', 'дата видачі', 1, 'agent_id_card_data3', 0, 1, 50, '(формат запису: ЧЧ.ММ.РРРР)', '^[0-9]{2}\\.[0-9]{2}\\.[0-9]{4}$', ''),
(126, 'agent_id_card_number3', '', 'документ №', 1, 'agent_id_card_data3', 0, 1, 50, '', '^[0-9]{9}$', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` set('exch') NOT NULL DEFAULT 'exch',
  `status` set('new','processing','waiting','ok','stop') NOT NULL DEFAULT 'new',
  `company_fullname_ukr` text NOT NULL,
  `company_fullname_eng` text NOT NULL,
  `company_shortname_ukr` text NOT NULL,
  `company_shortname_eng` text NOT NULL,
  `company_constituent_doc` text NOT NULL,
  `company_ownership_form` text NOT NULL,
  `company_legal_address_code` text NOT NULL,
  `company_legal_address_country` text NOT NULL,
  `company_legal_address_oblast` text NOT NULL,
  `company_legal_address_city` text NOT NULL,
  `company_legal_address_district` text NOT NULL,
  `company_legal_address_street` text NOT NULL,
  `company_legal_address_dom` text NOT NULL,
  `company_legal_address_korpus` text NOT NULL,
  `company_legal_address_office` text NOT NULL,
  `company_legal_address_eng` text NOT NULL,
  `company_mailing_address_code` text NOT NULL,
  `company_mailing_address_country` text NOT NULL,
  `company_mailing_address_oblast` text NOT NULL,
  `company_mailing_address_city` text NOT NULL,
  `company_mailing_address_district` text NOT NULL,
  `company_mailing_address_street` text NOT NULL,
  `company_mailing_address_dom` text NOT NULL,
  `company_mailing_address_korpus` text NOT NULL,
  `company_mailing_address_office` text NOT NULL,
  `company_phone` text NOT NULL,
  `company_fax` text NOT NULL,
  `company_email` text NOT NULL,
  `company_code` varchar(32) NOT NULL,
  `company_tax_number` text NOT NULL,
  `company_eic` text NOT NULL,
  `bank_name_ukr1` text NOT NULL,
  `bank_name_eng1` text NOT NULL,
  `bank_address1` text NOT NULL,
  `banking_account1` text NOT NULL,
  `bank_code1` text NOT NULL,
  `bank_name_ukr2` text NOT NULL,
  `bank_name_eng2` text NOT NULL,
  `bank_address2` text NOT NULL,
  `banking_account2` text NOT NULL,
  `bank_code2` text NOT NULL,
  `bank_name_ukr3` text NOT NULL,
  `bank_name_eng3` text NOT NULL,
  `bank_address3` text NOT NULL,
  `banking_account3` text NOT NULL,
  `bank_code3` text NOT NULL,
  `ceo_fullname_nom` text NOT NULL,
  `ceo_fullname_gen` text NOT NULL,
  `ceo_position_nom` text NOT NULL,
  `ceo_position_gen` text NOT NULL,
  `ceo_document_type` text NOT NULL,
  `ceo_passport_series` text NOT NULL,
  `ceo_passport_number` text NOT NULL,
  `ceo_passport_authority` text NOT NULL,
  `ceo_passport_date` text NOT NULL,
  `ceo_id_card_number` text NOT NULL,
  `ceo_id_card_date` text NOT NULL,
  `ceo_id_card_authority` text NOT NULL,
  `ceo_id_num` varchar(32) NOT NULL,
  `agent_fullname_nom1` text NOT NULL,
  `agent_fullname_gen1` text NOT NULL,
  `agent_fullname_acc1` text NOT NULL,
  `agent_fullname_eng1` text NOT NULL,
  `agent_position1` text NOT NULL,
  `agent_position_eng1` text NOT NULL,
  `agent_document_type1` text NOT NULL,
  `agent_passport_series1` text NOT NULL,
  `agent_passport_number1` text NOT NULL,
  `agent_passport_authority1` text NOT NULL,
  `agent_passport_date1` text NOT NULL,
  `agent_id_card_number1` text NOT NULL,
  `agent_id_card_date1` text NOT NULL,
  `agent_id_card_authority1` text NOT NULL,
  `agent_id1` varchar(32) NOT NULL,
  `agent_address1` text NOT NULL,
  `agent_email1` text NOT NULL,
  `agent_work_phone1` text NOT NULL,
  `agent_mobile_phone1` text NOT NULL,
  `agent_fullname_nom2` text NOT NULL,
  `agent_fullname_gen2` text NOT NULL,
  `agent_fullname_acc2` text NOT NULL,
  `agent_fullname_eng2` text NOT NULL,
  `agent_position2` text NOT NULL,
  `agent_position_eng2` text NOT NULL,
  `agent_document_type2` text NOT NULL,
  `agent_passport_series2` text NOT NULL,
  `agent_passport_number2` text NOT NULL,
  `agent_passport_authority2` text NOT NULL,
  `agent_passport_date2` text NOT NULL,
  `agent_id_card_number2` text NOT NULL,
  `agent_id_card_date2` text NOT NULL,
  `agent_id_card_authority2` text NOT NULL,
  `agent_id2` varchar(32) NOT NULL,
  `agent_address2` text NOT NULL,
  `agent_email2` text NOT NULL,
  `agent_work_phone2` text NOT NULL,
  `agent_mobile_phone2` text NOT NULL,
  `agent_fullname_nom3` text NOT NULL,
  `agent_fullname_gen3` text NOT NULL,
  `agent_fullname_acc3` text NOT NULL,
  `agent_fullname_eng3` text NOT NULL,
  `agent_position3` text NOT NULL,
  `agent_position_eng3` text NOT NULL,
  `agent_document_type3` text NOT NULL,
  `agent_passport_series3` text NOT NULL,
  `agent_passport_number3` text NOT NULL,
  `agent_passport_authority3` text NOT NULL,
  `agent_passport_date3` text NOT NULL,
  `agent_id_card_number3` text NOT NULL,
  `agent_id_card_date3` text NOT NULL,
  `agent_id_card_authority3` text NOT NULL,
  `agent_id3` varchar(32) NOT NULL,
  `agent_address3` text NOT NULL,
  `agent_email3` text NOT NULL,
  `agent_work_phone3` text NOT NULL,
  `agent_mobile_phone3` text NOT NULL,
  `accreditation_sections` text NOT NULL,
  `accreditation_period` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `inputs_exch`
--
ALTER TABLE `inputs_exch`
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `company_code` (`company_code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
