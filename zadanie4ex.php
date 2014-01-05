<?php 
/**
 *  Zadanie4:
 * 
 *  4. Napisać skrypt php wypisujący n wartości funkcji trygonometrycznej 
 *   sin(x) dla „x” w przedziale [a,b]. 
 *  Parametry n,a,b, podawane są w linii adresu. 
 *  Jeśli jako parametr podano ciąg znaków niebędący liczbą 
 *  należy wypisać stosowny komunikat.
 * 
 *  Wersja z użyciem exceptions
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
      <input type="text" name="n" id="n" value="<?php echo $_REQUEST['n'] ?>" />
      
      <br/>
      <label for="a">Początek przedziału (a):</label>
      <input type="text" name="a" id="a" value="<?php echo $_REQUEST['a'] ?>" />      
      
      <br/>
      <label for="b">Koniec przedziału (b):</label>
      <input type="text" name="b" id="b" value="<?php echo $_REQUEST['b'] ?>" />      
      
      <br/>
      <input type="submit" value="Oblicz!" />
    </form>
  
<?php
$n = $_REQUEST['n'];
$a = $_REQUEST['a'];
$b = $_REQUEST['b'];

if($n || $a || $b){
  try{
    validate($n,'n');
    validate($a,'a');
    validate($b,'b');

    if($n <= 0) throw new InvalidArgumentException("Ilość kroków musi być > 0");

    if($b < $a ) throw new InvalidArgumentException("Koniec przedziału musi być większy niż początek [$a,$b]");

    # mozna spokojnie, bo $n > 0
    $interval = ($b-$a)/$n;

    echo "<h4>{$n} Wartości funkcji sin:</h4>";
    for($x= $a;$x<=$b;$x = $x+$interval){
      echo "<p>";
      echo "sin({$x}) = ";
      echo sin($x);
      echo "</p>";
    }
  }catch(InvalidArgumentException $e){
    echo "<h4 style='font-weight:bold;color:red;'>Wystąpił błąd:</h4>";
    echo "<p style='font-weight:bold;color:red;'>{$e->getMessage()}</p>";
  }
}


function validate($var,$label)
{
  if(!is_numeric($var)){
    throw new InvalidArgumentException("Parametr '$label' nie jest liczbą ($var)");
  }
}

?>
    
</body>
</html>
