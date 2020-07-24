# coingecko-api
Small piece of coingecko api

Sample usage:

    use Coingecko\Coingecko;

    $arr = ['dash'];
    $client = new Coingecko();
    echo('<pre>');
    foreach($arr as $val) {
      print_r($client->getCurrencyInfo($val));
      echo("\n");
    }
    echo('</pre>');
