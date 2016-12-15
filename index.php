<?php
const SMS = "Пароль: 2453\nСпишется 1,01р.\nПеревод на счет 41001961430823";

/**
 * @param string $sms
 * @param bool $throwError
 * @return array
 * @throws \Error
 */
function parseSMS($sms, $throwError = false) {
  $result = [
    'pass' => null,
    'sum' => null,
    'account' => null,
  ];

  $passPattern = '/\s[0-9]{4}\s/';
  if (preg_match($passPattern, SMS, $matches)){
    $result['pass'] = $matches[0];
  }
  elseif ($throwError) {
    throw new \Error('Wrong SMS format. Parsing failed.');
  }

  $sumPattern = '/\s\d+,\d{2}/';
  if (preg_match($sumPattern, SMS, $matches)){
    $result['sum'] = $matches[0];
  }
  elseif ($throwError) {
    throw new \Error('Wrong SMS format. Parsing failed.');
  }

  $accountPattern = '/\s\d+\s*$/';
  if (preg_match($accountPattern, SMS, $matches)){
    $result['account'] = $matches[0];
  }

  return $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Starter Template for Bootstrap</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Яндекс.Деньги SMS парсер</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">

  <div>
    <h1 class="text-center">Первое тестовое задание</h1>
    <p>Напишите на PHP функцию разбора SMS с кодом подтверждения от сервиса Яндекс.Деньги. Функция должна принимать текстовую строку и возвращать код подтверждения, сумму и кошелек. Речь идет о реальном сервисе Яндекс.Деньги. Если у вас нет кошелька, то воспользуйтесь эмулятором, генерирующим идентичные сообщения. Учтите, что порядок полей, пунктуация и слова со временем могут быть изменены.</p>
    <p>Исходная строка: <mark><?php print SMS; ?></mark></p>
    <h3>Результат работы</h3>
      <p><?php
        $result = parseSMS('Проверка');
        ?>
      <dl>
          <dd>Пароль</dd>
          <dt><?php print $result['pass']; ?></dt>
          <dd>Сумма</dd>
          <dt><?php print $result['sum']; ?></dt>
          <dd>Кошелек</dd>
          <dt><?php print $result['account']; ?></dt>
      </dl>
      </p>
  </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

