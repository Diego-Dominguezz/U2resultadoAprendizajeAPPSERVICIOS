<?php

require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.api.video/auth/api-key', [
  'body' => '{"apiKey":"jvXAYaCVveie2F600z1Zz2UxoGJrZQ5VQo82OiMriLt"}',
  'headers' => [
    'Accept' => 'application/json',
    'Content-Type' => 'application/json',
  ],
]);
$auth = $response->getBody();
$auth = json_decode($auth);
$type = $auth->token_type;
$token = $auth->access_token;


$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://sandbox.api.video/videos/vi7TmUB73PcUr1F9LYibeYlP', [
  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => $token,
  ],
]);


$json = $response->getBody();
$video = json_decode($json);
//var_dump($video->assets->iframe);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body class="bg-dark">


  <div class="p-5">
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-secondary">
      <a class="navbar-brand" href="#">
        <img src="<?php echo $video->assets->thumbnail ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        Ejemplo video api clase - streaming
      </a>
    </nav>

    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src=" <?php echo $video->assets->player; ?> " allowfullscreen></iframe>
    </div>
  </div>

  <div class="card mx-auto bg-secondary" style="width: 18rem; ">
    <ul class="list-group list-group-flush ">
      <li class="list-group-item bg-secondary">DOMINGUEZ AVALOS DIEGO</li>
      <li class="list-group-item bg-secondary">PEÑA MONTERRUBIO RUBEN ISAAC</li>
      <li class="list-group-item bg-secondary">RAMOS COPTO KARINA</li>
    </ul>
  </div>




  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</body>

</html>