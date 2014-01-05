<?php 
/**
 *  Zadanie3:
 * 
 *  3. Proszę napisać skrypt PHP, który wypisze najkrótszy lub najdłuższy 
 *  łańcuch spośród podanych w polach formularza w zależności jaki przycisk 
 *  użytkownik naciśnie: „longest” czy „shortest”
 * 
 */
?>
<html>
  <head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <title>Zestaw na 3, zadanie2</title>
  </head>
  <body>
    <form action="" method="get">
      
      <label for="str">Ciągi znaków oddzielone spacjami lub nową linią:</label>
      <br/>
      <textarea name="str" id="str" cols="80" rows="15"><?php echo $_REQUEST['str']?></textarea>

      <br/>
      <input type="submit" name="shortest" value="Najkrótszy!" />
      
      <input type="submit" name="longest" value="Najdłuższy!" />
    </form>
  
<?php
$action = null;

// empty sprawdzi czy el. tablicy istnieje i czy nie jest null, 0 albo ''
if(!empty($_REQUEST['shortest'])){
  $action = 'shortest';
}elseif(!empty($_REQUEST['longest'])){
  $action = 'longest';
}

/*
 * Jesli wiadomo ile stringow ma porownac, mozna zrobic tak jak w zadaniu2 
 * porownujac wartosci np. 2 pol formularza.
 * Ten sposob jest uniwersalny bo mozesz miec dowolna ilosc stringow. 
 */
if($action){
  $strings = preg_split('/[\s\r\n]+/im', trim($_REQUEST['str']));
  
  
  if($action == 'longest'){
    
    $longest = '';
    foreach($strings as $str){
      $longest = strlen($str) >= strlen($longest) ? $str: $longest;
    }
    echo "<p>Najdłuższy ciąg znaków to: '{$longest}'";
    
    
  }else{ // shortest
    
    $shortest = null;
    foreach($strings as $str){
      // zainicjuj jesli to jest pierwszy string:
      if($shortest === null) $shortest = $str;

      $shortest = strlen($str) <= strlen($shortest) ? $str : $shortest;
    }
    
    echo "<p>Najkrótszy ciąg znaków to: '{$shortest}'";
  }
}


?>
    
</body>
</html>
