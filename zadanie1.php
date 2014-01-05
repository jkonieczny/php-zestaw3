<?php 
/**
 *  Zadanie1:
 * 
 *  Napisać skrypt PHP wypisujący k wartości funkcji	 
 *    f(x) = (x*x)/(x+1)
 *  dla x w przedziale [a,b]
 * 
 *  Parametry k, a, b podawane są w polach formularza.
 * 
 */
?>
<html>
  <head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <title>Zestaw na 3, zadanie1</title>
  </head>
  <body>
    <form action="" method="get">
      <label for="k">Ilość wartości funkcji (k):</label>
      <input type="text" name="k" id="k" value="<?php echo $_REQUEST['k'] ?>" />
      
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
$k = $_REQUEST['k'];
$a = $_REQUEST['a'];
$b = $_REQUEST['b'];

/*
 * $k, $a i $b sa STRINGami zawsze z formularza, ale php zrobi konwersje do 
 * int/float automatycznie jak bedziemy tego uzywac w kontekscie operacji 
 * arytmetycznych
 */

if($k >0 && $b > $a){
  # mozna spokojnie, bo $k > 0
  $interval = ($b-$a)/$k;
  
  echo "<h4>{$k} Wartości funkcji f:</h4>";
  for($x= $a;$x<=$b;$x = $x+$interval){
    echo "<p>";
    echo "f({$x}) = ";
    echo f($x);
    echo "</p>";
  }
  
}elseif ($k > 0) {
  echo "Invalid paramters 'a' or 'b'";
}

function f($x){
  # Nie dzielimyprzez 0 !
  if($x == -1) return "Not a Number!";
  
  return ($x*$x)/($x+1);
}

?>
    
</body>
</html>
