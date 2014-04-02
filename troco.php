<?php
# Link do problema: http://dojopuzzles.com/problemas/exibe/troco/
# Author: Tiago
# Description: Solução do problema


$vpagar = 1.56; # valor a pagar
$vpago = 10;    # o valor efetivamente pago
$troco = 0;     # o troco

// array bem feio
$valores = array(	array(100,0), 
					array(50,0), 
					array(10,0), 
					array(5,0), 
					array(1,0), 
					array(0.50,0), 
					array(0.10,0), 
					array(0.05,0), 
					array(0.01,0)
					);

$troco = $vpago - $vpagar;      // calcula o valor do troco, oque deve ser devolvido
if($troco == 0)                 // se o troco é igual a zero, não tem troco
	echo "não tem troco";
else if($troco < 0)             // se for menor, a pessoa não pagou o suficiente
	echo "deve dinheiro";
else{                           // senao, o programa calcula quanto deve ser devolvido
	for( $i = 0; $i<count($valores);)               // um for pouco ortodoxo
	{	
		if( ($troco - $valores[$i][0]) >= 0 )  // 10 - 100
		{
			$valores[$i][1] += 1; 	                    // adiciono no contador de quantidades de cedula
			$troco = bcsub($troco, $valores[$i][0],2);  // atualizamos o valor do troco
		}else{
			$i++;                                       // incrementamos o contador
		}	
	}
}
	
// Exibição para fácil entendimento do que ocorreu no código
echo '<pre>';
echo 'Result: ' . $valores[0][0] . ' = ' . $valores[0][1] . '<BR>';
echo 'Result: ' . $valores[1][0] . ' = ' . $valores[1][1] . '<BR>';
echo 'Result: ' . $valores[2][0] . ' = ' . $valores[2][1] . '<BR>';
echo 'Result: ' . $valores[3][0] . ' = ' . $valores[3][1] . '<BR>';
echo 'Result: ' . $valores[4][0] . ' = ' . $valores[4][1] . '<BR>';
echo 'Result: ' . $valores[5][0] . ' = ' . $valores[5][1] . '<BR>';
echo 'Result: ' . $valores[6][0] . ' = ' . $valores[6][1] . '<BR>';
echo 'Result: ' . $valores[7][0] . ' = ' . $valores[7][1] . '<BR>';
echo 'Result: ' . $valores[8][0] . ' = ' . $valores[8][1] . '<BR>';
echo '</pre>';

echo "<pre>";
$total = 0.00;
foreach($valores as $v){
	$total = bcadd($total, bcmul($v[1],$v[0],2), 2);
}
echo $total;
echo "</pre>";


?>
