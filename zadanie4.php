<?php 
/**
 *  Zadanie4:
 * 
 *  4. Napisać skrypt php wypisujący n wartości funkcji trygonometrycznej 
 *   sin(x) dla „x” w przedziale [a,b]. 
 *  Parametry n,a,b, podawane są w linii adresu. 
 *  Jeśli jako parametr podano ciąg znaków niebędący liczbą 
 *  należy wypisać stosowny komunikat.
 */
?>
<html>
  <head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <title>Zestaw na 3, zadanie4</title>
  </head>
  <body>
    <form action="" method="get">
      <label for="n">Ilość wartości funkcji (n):</label>
      <input type="text" name="n" id="n" value="<?php echo @$_REQUEST['n'] ?>" />
      
      <br/>
      <label for="a">Początek przedziału (a):</label>
      <input type="text" name="a" id="a" value="<?php echo @$_REQUEST['a'] ?>" />      
      
      <br/>
      <label for="b">Koniec przedziału (b):</label>
      <input type="text" name="b" id="b" value="<?php echo @$_REQUEST['b'] ?>" />      
      
      <br/>
      <input type="submit" value="Oblicz!" />
    </form>
  
<?php
$n = @$_REQUEST['n'];
$a = @$_REQUEST['a'];
$b = @$_REQUEST['b'];

$error = false;

// Zeby nie sprawdzalo, jesli nie wyslales formularza jeszcze:
if($n || $a || $b){
  if(!validate($n)){
    echo "<p>Parametr 'n' nie jest liczbą!</p>";
    $error = true;
  }

  if(!validate($a)){
    echo "<p>Parametr 'a' nie jest liczbą!</p>";
    $error = true;
  }

  if(!validate($b)){
    echo "<p>Parametr 'b' nie jest liczbą!</p>";
    $error = true;
  }
}

if(!$error && $n >0 && $b > $a){
  # mozna spokojnie, bo $n > 0
  $interval = ($b-$a)/$n;
  
  echo "<h4>{$n} Wartości funkcji f:</h4>";
  for($x= $a;$x<=$b;$x = $x+$interval){
    echo "<p>";
    echo "sin({$x}) = ";
    echo sin($x);
    echo "</p>";
  }
  
}elseif ($n || $a || $b) {
  echo "Invalid paramters 'n', 'a' or 'b'";
}

function validate($y)
{
  return is_numeric($y);
}

?>
    
</body>
</html>
