<?
include('connection.php');

$leads = all('leads');

if(isset( $_POST['inserir'] )){
    $table = 'leads';
    $params = [
        'mes-solicitado'=>$_POST['mes-solicitado'],
        'trinta-litros'=>$_POST['trinta-litros'],
        'cinquenta-litros'=>$_POST['cinquenta-litros'],
        'observacoes'=>$_POST['observacoes'],
        'total-venda'=>$_POST['total-venda'],
        'negocio-fechado'=>$_POST['negocio-fechado'],
        'nome'=>$_POST['nome'],
        'telefone'=>$_POST['telefone'],
        'cidade'=>$_POST['cidade'],
        'bairro'=>$_POST['bairro']
    ];
    insert($params);
}

?>
<?include("_head.php")?>
<body>
    <?$pg="home"?>
    <?include("_navbar.php")?>
    <section class="container-fluid">
        <div class="container">
            <div class="row alert alert-secondary mt-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="#" class="btn btn-success">Novo +</a>
                </div>
            </div>
            <form action="" method="post">
                <div class="row alert mt-5">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dados do Lead</h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>

                    <div class="col-lg-12">
                        <h1 class="page-header">Dados da Venda</h1>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="mes-solicitado">Mês Solicitação</label>
                            <select name="mes-solicitado" id="mes-solicitado" class="form-control">
                            <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tri-ltrs">Barril <strong>30</strong> litros (Unidades)</label>
                            <input type="text" name="trinta-litros" id="tri-ltrs" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cin-ltrs">Barril <strong>50</strong> litros (Unidades)</label>
                            <input type="text" name="cinquenta-litros" id="cin-ltrs" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="total-venda">Valor total da venda</label>
                            <input type="text" name="total-venda" id="total-venda" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="negocio-fechado">Negócio Fechado</label>
                            <select name="negocio-fechado" id="negocio-fechado" class="form-control">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" id="observacoes" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-12">
                        <input type="hidden" name="inserir" value="true">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped wd-100">
                <thead>
                  <tr>
                    <th scope="col">Mês</th>
                    <th scope="col">Barril <strong>30</strong> </th>
                    <th scope="col">Barril <strong>50</strong> </th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Total Venda</th>
                    <th scope="col">Negócio Fechado</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Teste</th>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>
                        <a href="#" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Teste</th>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>
                        <a href="#" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
                    </td>
                  </tr>
                </tbody>
              </table>

        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Vue -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>