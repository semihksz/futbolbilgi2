<?php

function Oturum()
{
    require_once 'config.php';
    if (!isset($_SESSION['adminEmail']) or !isset($_SESSION['adminPassword'])) {
        header("location:login.php");
        exit;
    } else {
        return true;
    }
}


function changeDate($changeDate)
{
    require_once 'config.php';
    $dateFormat = date("d.m.Y", strtotime($changeDate));
    return $dateFormat;
}

function inputFilter($value)
{
    $one = trim($value);
    $two = strip_tags($one);
    $three = htmlspecialchars($two, ENT_QUOTES, 'UTF-8');
    $result = $three;
    return $result;
}

function phoneNumberFilter($value)
{
    $cleanedInput = ltrim(htmlspecialchars(strip_tags(trim($value))), '0');
    $sPattern = '/^(?:(?:\+90|0090|0)[ ]?)?(?:(?<ac>21[26]|22[2468]|23[26]|24[268]|25[268]|26[246]|27[246]|28[2468]|31[28]|32[2468]|33[28]|34[2468]|35[2468]|36[2468]|37[02468]|38[02468]|392|41[246]|42[2468]|43[2468]|44[26]|45[2468]|46[246]47[2468]|48[2468]|50[1567]|51[02]|52[27]|5[34]\d|55[1234569]|56[124]|59[246]|800|811|822|850|8[89]8|900)|\((?P<ac>\g<ac>)\))[ -]*(?<sn1>\d{3})[ -]*(?<sn2>\d{2})[ -]*(?<sn3>\d{2})$/J';
    if (preg_match($sPattern, $cleanedInput)) {
        return $cleanedInput;
    } else {
        return false;
    }
}

function mailFilter($value)
{
    $cleanedInput = trim($value);
    $cleanedInput = filter_var($cleanedInput, FILTER_VALIDATE_EMAIL);
    $cleanedInput = htmlspecialchars($cleanedInput);
    if (filter_var($cleanedInput, FILTER_VALIDATE_EMAIL)) {
        return $cleanedInput;
    } else {
        return false;
    }
}

function ceviriAPI($kelime, $hedefDil)
{
    // Çeviri API'si için isteği burada yapın ve çeviriyi alın
    // Örnek olarak Google Çeviri API'yi kullanabilirsiniz
    // API isteği yapmak için CURL veya başka bir yöntem kullanabilirsiniz
    // Örnek:
    $ceviriAPIURL = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=$hedefDil&dt=t&q=" . urlencode($kelime);
    $ceviriJSON = file_get_contents($ceviriAPIURL);
    $ceviriVerisi = json_decode($ceviriJSON, true);
    $ceviri = $ceviriVerisi[0][0][0];
    return $ceviri;

    // Gerçek bir çeviri API'si kullanmanız gerektiği için yukarıdaki örneklerin çeviri API URL'sini ve çeviri işlemini uyarlamalısınız.
    // Ayrıca API anahtarlarınızı veya kimlik doğrulama bilgilerinizi kullanmanız gerekebilir.
    // Bu API ile ilgili belgeleri incelemeniz gerekecektir.
}
