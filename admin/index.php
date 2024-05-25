<?php
// Painel de administração

session_start();
// Verificar se a sessão não existe:
if (!isset($_SESSION['usuario'])) {
    // Voltar ao login:
    header('Location: login.php');
    die();
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<style>
    #body {
        margin: 0%;
    }
</style>

<body>
    <div class="row">
        <!-- MENU LATERAL -->
        <div class="col-md-2 bg-dark vh-100 p-2">
                <a href="#" class=" text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="25" height="45">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Estacione Bem</span>
                </a>

                <ul class="nav nav-pills" style="display: block;">

                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page" id="Painel">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Painel
                        </a>
                    </li>
                    <li>
                        <a href="#" id="RegistroEntrada" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#entrada"></use>
                            </svg>
                            Registro de entrada
                        </a>
                    </li>
                    <li>
                        <a href="#" id="MovimentacoesDoDia" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#movimentacoes"></use>
                            </svg>
                            Movimentações
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Mensalistas
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Histórico financeiro
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Configurações
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Gerar relatório
                        </a>
                    </li>
                    <hr>
                </ul>
                <hr>
                <div class="dropdown p-4 ">
                    <hr>
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFRbGzH16ONBKxPFysaNPBuX3oOurb0cXkaM1RXM9T4A&s"
                            alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>Usuário</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li><a class="dropdown-item" href="#">Nome do estacionamento</a></li>
                        <li><a class="dropdown-item" href="#">Contrato</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
            
        </div>

        <div class="col-md">
            <!-- PAINEL -->
            <div class="row  ">
                <div id="painel" class="col-md-7 m-2 border">
                    <form class="m-3" action="">
                        <h2 class="mb-4 fw-bolder">Posição atual</h2>
                        <hr>
                        <p class="mb-4 fs-6 opacity-75">Status do estacionamento e versionamento</p>
                        <table class="table">
                            <tr>
                                <th scope="col">CAIXA</th>

                                <td scope="col">Aberto - 10/05/2024 19:30</td>
                            </tr>
                            <tr>
                                <th scope="row">LOCAL</th>
                                <td>Estacione Bem</td>
                            </tr>
                            <tr>
                                <th scope="row">VERSÃO</th>
                                <td>1.0</td>
                            </tr>
                            <tr>
                                <th scope="row">NÍVEL DE ACESSO</th>
                                <td>Administrador</td>
                            </tr>
                            <tr>
                                <th scope="row">ENTRADAS</th>
                                <td>R$ 0,00</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- REGISTRO DE ENTRADA -->
            <div id="entrada" class="col-10 container-md m-2 border">
                <form class="m-3" action="">

                    <h2 class="mb-4 fw-bolder">Registrar entrada</h2>
                    <hr>
                    <p class="mb-4 fs-5 opacity-75">Dados do veículo</p>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="placa" class="form-label fw-bolder ">Placa</label>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="placa" name="placa" placeholder="AAA-1A11">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="tipo" class="form-label fw-bolder">Tipo de veículo </label>
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">Moto</option>
                                <option value="2">Carro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row fw-bolder">
                        <div class="col-3 mb-2  ">
                            <label for="tipoDeConvenio" class="form-label ">Tipo De Convênio:</label>
                        </div>
                        <div class="col mb-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Avulso
                            </label>

                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Mensal
                            </label>

                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Lavagem
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">&nbsp;</div>
                        <div class=" col-2 m-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check- fw-bolder" for="exampleCheck1">Possui avarias</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Registrar</button>
                </form>
            </div>

            <!-- MOVIMENTAÇÕES -->
            <div id="movimentacoes" class="row">
                <div class="col-md-5 container-md m-2 p-3">
                    <form class="row" action="">
                        <hr>
                        <h2 class="mb-4 fw-bolder">Movimentações</h2>
                        <p class="mb-4 fs-6 opacity-75 "><span class="fw-bolder">Período</span>
                            <br>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Aberto
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cancelado
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Fechado
                            </label>
                        </p>

                        <table class="table">
                            <tr>
                                <th scope="col">STATUS</th>

                                <td scope="col">Aberto - 10/05/2024 19:30</td>
                            </tr>
                            <tr>
                                <th scope="row">AVULSO</th>
                                <td>1</td>
                            </tr>
                            <tr>
                                <th scope="row">MENSALISTA</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">ENTRADAS</th>
                                <td>R$ 0,00</td>
                            </tr>
                            <tr>
                                <th scope="row"> A RECEBER</th>
                                <td>R$ 0,00</td>
                            </tr>
                            <tr>
                                <th scope="row"> CAIXA</th>
                                <td>R$ 0,00</td>
                            </tr>


                        </table>
                    </form>
                </div>
                <!-- HISTÓRICO DE MOVIMENTAÇÕES -->
                <div class="col-md-6 container-md m-2 p-3">
                    <form class="row" action="">
                        <hr>
                        <h2 class="mb-4 fw-bolder">Histórico Movimentações</h2>
                        <p class="mb-4 fs-6 opacity-75 fw-bold "><span class="fw-bolder">Período</span>
                            <br>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Dia
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Mês
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Ano
                            </label>
                        </p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Ticket</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Convênio</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Saída</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>CGW0I33</td>
                                    <td>Avulso</td>
                                    <td>24/04/2024 21:38</td>
                                    <td>-</td>
                                    <td>R$ 5.000,00</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>CGW0I33</td>
                                    <td>Avulso</td>
                                    <td>24/04/2024 21:38</td>
                                    <td>-</td>
                                    <td>R$ 5.000,00</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>CGW0I33</td>
                                    <td>Avulso</td>
                                    <td>24/04/2024 21:38</td>
                                    <td>-</td>
                                    <td>R$ 5.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        //esconder telas
        $("#entrada").hide();
        $("#movimentacoes").hide();



        // Alternar entre telas:
        $("#RegistroEntrada").click(function () {
            $("#painel").hide();
            // $("#painel").removeClass('active');
            //  $("#RegistroEntrada").addClass('active');
            $("#movimentacoes").hide();
            $("#entrada").fadeIn();
        });
        $("#Painel").click(function () {
            $("#painel").fadeIn();
            $("#movimentacoes").hide();
            $("#entrada").hide();
        });
        $("#MovimentacoesDoDia").on("click", function () {
            $("#movimentacoes").fadeIn();
            $("#movimentacoesHoje").fadeIn();
            $("#painel").hide();
            $("#entrada").hide();


        });

    </script>


</body>


</html>
</div>