<?php
include('url_response.php');
$urlpatterns = array(

//CONFIGURAÇÃO DE URL'S PADRÕES

	'/institucional/quem-somos' => 'quem-somos.php',
	'/quem-somos' => 'quem-somos.php',		

	'/institucional/fale-conosco' => 'fale-conosco.php',
	'/fale-conosco' => 'fale-conosco.php',

	'/politica-de-privacidade' => 'politica-de-privacidade.php',

	'/bem-vindo-ao-prover-odonto' => 'bem-vindo-ao-prover-odonto.php',
	'/bem-vindo-ao-prover-odonto?(?P<ads>\S+)' => 'bem-vindo-ao-prover-odonto.php',

	'/tire-suas-duvidas' => 'duvidas.php', 
	'/tire-suas-duvidas?(?P<ads>\S+)' => 'duvidas.php',
	'/duvidas' => 'duvidas.php', 
	'/duvidas?(?P<ads>\S+)' => 'duvidas.php',
	'/ajuda' => 'duvidas.php', 
	'/ajuda?(?P<ads>\S+)' => 'duvidas.php',

	'/politica-de-privacidade' => 'politica-de-privacidade.php',

//BEM-VINDO

	'/bem-vindo-ao-prover-odonto' => 'bem-vindo-ao-prover-odonto.php',
	'/bem-vindo-ao-prover-odonto/(?P<ads>\S+)' => 'bem-vindo-ao-prover-odonto.php',

//APLICATIVOS

	'/app/prestador' => 'aplicativo-meu-prover-odonto-prestador.php',
	'/app/prestador?(?P<ads>\S+)' => 'aplicativo-meu-prover-odonto-prestador.php',
	'/aplicativo-meu-prover-odonto-prestador' => 'aplicativo-meu-prover-odonto-prestador.php',
	'/aplicativo-meu-prover-odonto-prestador?(?P<ads>\S+)' => 'aplicativo-meu-prover-odonto-prestador.php',

	'/app/cliente' => 'aplicativo-meu-prover-odonto.php',
	'/app/cliente?(?P<ads>\S+)' => 'aplicativo-meu-prover-odonto.php',
	'/app/beneficiario' => 'aplicativo-meu-prover-odonto.php',
	'/app/beneficiario?(?P<ads>\S+)' => 'aplicativo-meu-prover-odonto.php',
	'/aplicativo-meu-prover-odonto' => 'aplicativo-meu-prover-odonto.php',
	'/aplicativo-meu-prover-odonto?(?P<ads>\S+)' => 'aplicativo-meu-prover-odonto.php',


//REDE CREDENCIADA

	//PARA CLIENTES
	'/imprimir/rede-credenciada/(?P<estado>\S+)/(?P<cidade>\S+)' => 'opcao-rede-imprimir.php',

	'/rede-credenciada/dentistas-e-clinicas' => 'opcao-rede-desc.php',
	'/rede-credenciada/dentistas-e-clinicas?(?P<ads>\S+)' => 'opcao-rede-desc.php',

	'/rede-credenciada' => 'opcao-rede-intro.php',
	'/rede-credenciada?(?P<ads>\S+)' => 'opcao-rede-intro.php',

	'/rede-credenciada-prover-odonto' => 'opcao-rede-intro.php',
	'/rede-credenciada-prover-odonto?(?P<ads>\S+)' => 'opcao-rede-intro.php',

	'/rede-credenciada/busque-um-dentista' => 'opcao-rede-intro.php',
	'/rede-credenciada/busque-um-dentista?(?P<ads>\S+)' => 'opcao-rede-intro.php',

	'/rede-credenciada/dentistas-prover-odonto' => 'opcao-rede-intro.php',
	'/rede-credenciada/dentistas-prover-odonto?(?P<ads>\S+)' => 'opcao-rede-intro.php',

	//PRESTADORES
	'/seja-um-credenciado' => 'seja-um-credenciado.php',
	'/seja-um-credenciado?(?P<ads>\S+)' => 'seja-um-credenciado.php',

	'/seja-um-credenciado-prover-odonto' => 'seja-um-credenciado.php',
	'/seja-um-credenciado-prover-odonto?(?P<ads>\S+)' => 'seja-um-credenciado.php',

	'/rede-credenciada/seja-um-credenciado' => 'seja-um-credenciado.php',
	'/rede-credenciada/seja-um-credenciado?(?P<ads>\S+)' => 'seja-um-credenciado.php',

	'/rede-credenciada/seja-um-credenciado-prover-odonto' => 'seja-um-credenciado.php',
	'/rede-credenciada/seja-um-credenciado-prover-odonto?(?P<ads>\S+)' => 'seja-um-credenciado.php',
	

//COMERCIAL
	'/consultor-pj' => 'consultor-pj.php',
	'/consultor-pj?(?P<ads>\S+)' => 'consultor-pj.php',
	'/falar-com-um-consultor' => 'falar-com-um-consultor.php',
	'/falar-com-um-consultor?(?P<ads>\S+)' => 'falar-com-um-consultor.php',
	'/consultor' => 'falar-com-um-consultor.php',
	'/consultor?(?P<ads>\S+)' => 'falar-com-um-consultor.php',
	

	'/contratar/prover-odonto-online' => 'prover-odonto-online.php',
	'/contratar/prover-odonto-online(?P<ads>\S+)' => 'prover-odonto-online.php',

	//PESSOA FISICA
	'/planos/familiar' => 'para-voce.php',
	'/planos/familiar?(?P<ads>\S+)' => 'para-voce.php',

	'/planos/individual' => 'para-voce.php',
	'/planos/individual?(?P<ads>\S+)' => 'para-voce.php',

	'/planos/individual-familiar' => 'para-voce.php',
	'/planos/individual-familiar?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/para-voce' => 'para-voce.php',
	'/planos-odontologicos/para-voce?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/para-familia' => 'para-voce.php',
	'/planos-odontologicos/para-familia?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/para-voce-e-sua-familia' => 'para-voce.php',
	'/planos-odontologicos/para-voce-e-sua-familia?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/plano-odontologico-para-voce-e-sua-familia' => 'para-voce.php',
	'/planos-odontologicos/plano-odontologico-para-voce-e-sua-familia?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/prover-odonto-familiar' => 'para-voce.php',
	'/planos-odontologicos/prover-odonto-familiar?(?P<ads>\S+)' => 'para-voce.php',

	'/planos-odontologicos/prover-odonto-individual' => 'para-voce.php',
	'/planos-odontologicos/prover-odonto-individual?(?P<ads>\S+)' => 'para-voce.php',
	
	//PESSOA JURIDICA
	'/planos/pj' => 'para-empresa.php',	
	'/planos/pj?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos/mei' => 'para-empresa.php',	
	'/planos/mei?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos/empresarial' => 'para-empresa.php',	
	'/planos/empresarial?(?P<ads>\S+)' => 'para-empresa.php',

	'/planos/empresas' => 'para-empresa.php',	
	'/planos/empresas?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos/para-empresas' => 'para-empresa.php',	
	'/planos/para-empresas?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos-odontologicos/para-empresas' => 'para-empresa.php',	
	'/planos-odontologicos/para-empresas?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos-odontologicos/plano-odontologico-para-empresas' => 'para-empresa.php',	
	'/planos-odontologicos/plano-odontologico-para-empresas?(?P<ads>\S+)' => 'para-empresa.php',	

	'/planos-odontologicos/plano-odontologico-empresarial' => 'para-empresa.php',	
	'/planos-odontologicos/plano-odontologico-empresarial?(?P<ads>\S+)' => 'para-empresa.php',	


	//PARA PREFEITURAS
	'/prefeitura/campo-grande' => 'pref-campo-grande.php',	
	'/prefeitura/campo-grande?(?P<ads>\S+)' => 'pref-campo-grande.php',	

	'/prefeitura/nova-andradina' => 'pref-nova-andradina.php',	
	'/prefeitura/nova-andradina?(?P<ads>\S+)' => 'pref-nova-andradina.php',		

//PRINCIPAL
	'/' => 'index.php',
	'/?(?P<ads>\S+)' => 'index.php',
);
url_response($urlpatterns);

	

	
	
	
	// '/imoveis' => 'imoveis.php',
	// '/imoveis/(?P<imovel>\S+)/(?P<pg>\S+)' => 'imoveis.php',
	// '/imoveis/(?P<imovel>\S+)' => 'imoveis-single.php',
?>
