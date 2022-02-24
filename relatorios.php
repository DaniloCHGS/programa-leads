<?
session_start();
if( !isset($_SESSION['usuario']) ){
    header('Location:index.php');
}

require __DIR__ . "/vendor/autoload.php";
use App\Model\Leads;

if( isset($_POST['filtrar']) ){

    $mesFiltro = $_POST['mes_solicitado'];

    $leads = new Leads();
    $filterLeads = $leads->select("mes_solicitado=\"".$mesFiltro."\" and negocio_fechado=1 ", "id ASC");
}



?>
<?include("_head.php")?>
<?$pg="relatorios"?>
<body>
    <?include("_navbar.php")?>
    <section class="container-fluid" id="app">
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
                            <label for="mes_solicitado">Mês Solicitação</label>
                            <select name="mes_solicitado" id="mes_solicitado" class="form-control" @change="filter($event)">
                                <option value="Janeiro" <?=$mesFiltro == "Janeiro" ? selected : '' ?> >Janeiro</option>
                                <option value="Fevereiro" <?=$mesFiltro == "Fevereiro" ? selected : '' ?> >Fevereiro</option>
                                <option value="Março" <?=$mesFiltro == "Março" ? selected : '' ?> >Março</option>
                                <option value="Abril" <?=$mesFiltro == "Abril" ? selected : '' ?> >Abril</option>
                                <option value="Maio" <?=$mesFiltro == "Maio" ? selected : '' ?> >Maio</option>
                                <option value="Junho" <?=$mesFiltro == "Junho" ? selected : '' ?> >Junho</option>
                                <option value="Julho" <?=$mesFiltro == "Julho" ? selected : '' ?> >Julho</option>
                                <option value="Agosto" <?=$mesFiltro == "Agosto" ? selected : '' ?> >Agosto</option>
                                <option value="Setembro" <?=$mesFiltro == "Setembro" ? selected : '' ?> >Setembro</option>
                                <option value="Outubro" <?=$mesFiltro == "Outubro" ? selected : '' ?> >Outubro</option>
                                <option value="Novembro" <?=$mesFiltro == "Novembro" ? selected : '' ?> >Novembro</option>
                                <option value="Dezembro" <?=$mesFiltro == "Dezembro" ? selected : '' ?> >Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center d-flex align-items-center">
                        <h2 class="lead border border-success pt-3 pb-3 w-100">
                            Valor Total:
                            <span id="somaTotal"></span>
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <input type="hidden" name="filtrar" value="true">
                        <button type="submit" class="btn btn-success mt-3">Confirmar</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped wd-100" id="table">
                <thead>
                  <tr>
                    <th scope="col">Mês</th>
                    <th scope="col">Barril <strong>30</strong> </th>
                    <th scope="col">Barril <strong>50</strong> </th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Total Venda</th>
                    <th scope="col">Negócio Fechado</th>
                    <th scope="col">Observações</th>
                  </tr>
                </thead>
                <tbody>
                    <?if($filterLeads){?>
                        <?foreach($filterLeads as $f_key => $lead) {?>
                            <tr>
                                <th><?=$lead->mes_solicitado?></th>
                                <td><?=$lead->trinta_litros?></td>
                                <td><?=$lead->cinquenta_litros?></td>
                                <td><?=$lead->nome?></td>
                                <td><?=$lead->telefone?></td>
                                <td><?=$lead->cidade?></td>
                                <td><?=$lead->bairro?></td>
                                <td>
                                    <?=$lead->total_venda?>
                                    <input type="hidden" value="<?=$lead->total_venda?>" class="total">
                                </td>
                                <td><?=$lead->negocio_fechado?></td>
                                <td><?=$lead->observacoes?></td>
                            </tr>
                        <?}?>
                    <?}?>
                </tbody>
              </table>

        </div>
    </section>
    
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"},
            });
            var sum = 0
            var totaisEL = [...document.querySelectorAll('.total')]

            totaisEL.forEach(item=>{
                sum = parseInt(sum) + parseInt(item.value)
            })
            var somaTotal = document.getElementById('somaTotal')
            somaTotal.innerHTML = `R$ ${sum}`
           
        });
    </script>

    <!-- Vue -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>