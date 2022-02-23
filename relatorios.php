<?include("_head.php")?>
<?$pg="relatorios"?>
<body>
    <?include("_navbar.php")?>
    <section class="container-fluid">
        <div class="container">
            <form action="" method="post">
                <div class="row alert mt-3">
                    <div class="col-lg-12">
                        <h1 class="page-header">Relatórios</h1>
                    </div>
                    <div class="col-lg-12">
                        <h2 class="lead">Filtro por mês de negócios fechados</h2>
                    </div>

                    <div class="col-lg-12">
                        <hr>
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
                    <div class="col-lg-12">
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