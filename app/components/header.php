
<?php include_once ("connection/connection.php"); ?>
<div class="fixed-top ">
  <header class = "pt-0 pb-0 ">
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
          <div class="row w-100 m-auto para-mobile-line">
            <div class="col-3 col-md" >
                <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <img src = "<?= BASE_IMG ?>extra/menu.svg" width = "25px" class = "icone-menu"/>  
                </a> 
              </div>
            <div class="col-6 col-md" >
              <a class="navbar-brand para-mobile " href="<?= BASE ?>"><img src="<?= BASE_IMG ?>logo/logo_prover_odonto-min.jpg" class = "logo"></a>
            </div> 
          </div>
          

          <a class="navbar-brand para-descktop" href="<?= BASE?>"><img src="<?= BASE_IMG ?>logo/logo_prover_odonto-min.jpg" class = "logo mr-4"></a>
          
          <div class="collapse navbar-collapse" id="navbarNavDropdown"> 
          <!-- justify-content-md-center -->
            <ul class="navbar-nav ">
              <!-- <li class="nav-item text-center">
                <a class="nav-link" href="<?= BASE ?>planos/para-voce">Para família </a>
              </li>
              <li class="nav-item text-center">
                <a class="nav-link" href="<?= BASE ?>planos/para-empresas">Para empresas</a>
              </li> -->
               <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Nossos planos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= BASE ?>planos-odontologicos/para-voce-e-sua-familia"> <b> Para você e sua família </b><br><span class = "fonte-regular fonte-14">Plano odontológico individual/familiar</span></a>
                  <a class="dropdown-item" href="<?= BASE ?>planos-odontologicos/para-empresas"> <b> Para empresas ou prefeituras </b><br><span class = "fonte-regular fonte-14">Mais qualidade de vida para seus colaboradores</span></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Rede credenciada
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="https://rede.odontosfera.com.br/RedeCredenciada.aspx?Operadora=422533" target="_blank"> <b> Rede de dentistas </b> <br><span class = "fonte-regular fonte-14">Encontre um dentista próximo de você</span></a>
                  <a class="dropdown-item" href="<?= BASE ?>seja-um-credenciado"> <b> Para Dentistas e Clínicas </b> <br><span class = "fonte-regular fonte-14">Seja um credenciado Prover Odonto</span></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sobre nós
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= BASE ?>institucional/quem-somos"> <b> Quem somos </b> <br><span class = "fonte-regular fonte-14">Conheça o Prover Odonto</span></a>
                  <a class="dropdown-item" href="<?= BASE ?>institucional/quem-somos#fale-conosco"><b> Fale conosco</b> <br><span class = "fonte-regular fonte-14">Precisando falar com a gente?</span></a>
                  <a class="dropdown-item" href="<?= BASE ?>institucional/resultado-idss"><b> Resultado do IDSS/b> <br><span class = "fonte-regular fonte-14">Índice de Desempenho da Saúde Suplementar</span></a>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?= BASE ?>tire-suas-duvidas">Dúvidas</a>
              </li>
            </ul>

            <!-- extra mobile -->
              <div class = " para-mobile">
                  <ul class="mt-5 mb-3 navbar-nav d-flex justify-content-between ">
                    <li class="nav-item mr-3 text-center">
                      <a class="nav-link botao-laranja" href="<?= BASE ?>falar-com-um-consultor">
                        Fale com consultor
                      </a>
                    </li>
                    <li class="nav-item text-center ">
                    
                      <a class="nav-link botao-azul cor-branco" href="<?= BASE ?>contratar/prover-odonto-online">
                        Solicitar meu plano
                      </a>
                    </li>
                    <li class="nav-item text-center">
                      <a class="nav-link botao-branco" href="https://cliente.odontosfera.com.br/login.aspx?operadora=422533" target="_blank">Área do Beneficiário </a>
                    </li>
                    <li class="nav-item text-center">
                      <a class="nav-link botao-branco" href="https://prestador.odontosfera.com.br/login.aspx?operadora=422533" target="_blank">Área do Prestador</a>
                    </li>
                  </ul>

                </div>
            
          </div>
          <ul class="para-descktop navbar-nav d-flex justify-content-between p-0">
              <li class="nav-item mr-3 mt-2" style = "margin-top: 11px !important;">
                <a class="botao-topo-acao-laranja" href="<?= BASE ?>falar-com-um-consultor">
                  Fale com consultor
                </a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link botao-topo-acao" href="<?= BASE ?>contratar/prover-odonto-online">
                  Solicitar meu plano
                </a>
              </li>
              <li class="nav-item ">
                  <div class="btn-group">
                    <button type="button" class="btn botao-topo-acao-branco dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acessar
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="https://cliente.odontosfera.com.br/login.aspx?operadora=422533" target="_blank" class="dropdown-item">Área do beneficiário</a>
                      <a href="https://prestador.odontosfera.com.br/login.aspx?operadora=422533" target="_blank" class="dropdown-item">Área do prestador</a>
                    </div>
                  </div>
              </li>
              
          </ul>

      </div>
    </nav>

  </header>
</div>

<section class = "espaco-exta">

</section>
