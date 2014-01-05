<?php 
/**
 *  Zadanie2:
 * 
 *  Proszę napisać skrypt PHP, który porównuje dwa łańcuchy znaków podanych 
 *  w polach formularza. 
 *  Skrypt wypisuje informację czy są identyczne czy nie.
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
      <label for="s1">String 1:</label>
      <input type="text" name="s1" id="s1" value="<?php echo $_REQUEST['s1'] ?>" />
      
      <br/>
      <label for="s2">String 2:</label>
      <input type="text" name="s2" id="s2" value="<?php echo $_REQUEST['s2'] ?>" />      
      
      <br/>
      <input type="submit" value="Oblicz!" />
    </form>
  
<?php
$s1 = $_REQUEST['s1'];
$s2 = $_REQUEST['s2'];


/*
 * Sprawdzam czy ktorykolwiek istnieje, zeby nie wypisywac komunikatu
 * kiedy strona jest ladowana zanim wpiszesz stringi
 */
if($s1 || $s2){
  if(strlen($s1) > strlen($s2)){
    echo "String 1 jest dłuższy od stringu 2";
  }elseif(strlen($s1) == strlen($s2)){
    echo "Oba stringi mają taką samą długość";
  }else{
    echo "String 2 jest dłuższy od stringu 1";
  }
}

?>
    
</body>
</html>
