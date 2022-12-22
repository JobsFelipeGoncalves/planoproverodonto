<?php



/**

 * @return resource

 */

function connectDB()

{

	//$bdcon = @pg_connect("host=localhost options='--client_encoding=UTF8' port=5435 dbname=p5 user=postgres password=r");

	//$bdcon = pg_connect("host=127.0.0.1 options='--client_encoding=UTF8' port=5432 dbname=appwbc_prover_teste user=appwbc password=As3075@8076tel");

	$bdcon = pg_connect("host=127.0.0.1 options='--client_encoding=UTF8' port=5432 dbname=appwbc_prover user=appwbc password=Cd3075@8076Sat");

	

	@pg_query( $bdcon, "SET TIME ZONE 'GMT'");



	return $bdcon;

}



?>