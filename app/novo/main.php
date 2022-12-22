<?php
include('url_response.php');
$urlpatterns = array(
	'/' => 'index.php',
	'/home' => 'index.php',
	'/planos/para-voce' => 'para-voce.php',
	'/planos/para-empresas' => 'para-empresa.php',	
	'/institucional/quem-somos' => 'quem-somos.php',
	'/institucional/fale-conosco' => 'fale-conosco.php',
	'/institucional/trabalhe-conosco' => 'trabalhe-conosco.php',
	'/rede-credenciada' => 'busque-um-dentista.php',
	'/rede-credenciada/busque-um-dentista' => 'busque-um-dentista.php',
	'/rede-credenciada/busque-um-dentista/profissionais' => 'rede.php',
	'/rede-credenciada/seja-um-credenciado' => 'seja-um-credenciado.php',
	'/falar-com-um-consultor' => 'falar-com-um-consultor.php',
	'/solicitar-meu-plano' => 'solicitar-meu-plano.php',
	'/aplicativo-meu-prover-odonto' => 'aplicativo-meu-prover-odonto.php',
	'/aplicativo-meu-prover-odonto-prestador' => 'aplicativo-meu-prover-odonto-prestador.php',
	'/bem-vindo-ao-prover-odonto' => 'bem-vindo-ao-prover-odonto.php',
	
	
	// '/imoveis' => 'imoveis.php',
	// '/imoveis/(?P<imovel>\S+)/(?P<pg>\S+)' => 'imoveis.php',
	// '/imoveis/(?P<imovel>\S+)' => 'imoveis-single.php',
);
url_response($urlpatterns);
?>
