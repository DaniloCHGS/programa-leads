<?
session_start();
if( !isset($_SESSION['usuario']) ){
    header('Location:index.php');
}

require __DIR__ . "/vendor/autoload.php";

use App\Model\Leads;

$uri = explode("?", $_SERVER[REQUEST_URI])[0];
$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";

//Pegando todos os leads
$leads = Leads::select(null, "id DESC");

//Pegando somente um lead no caso exclusão eo edição;
$id = isset($_GET["id"]) ? $_GET["id"] : ""; 

if($acao != "" && $id != ""){
    $lead = Leads::selectById($id);

    if(empty($lead)){
        echo "<script>location.href='leads.php';</script>";
        die();
    }
}else{
    if($acao == "editar" || $acao == "excluir"){
        echo "<script>location.href='leads.php';</script>";
        die();
    }else{
        $lead = new Leads();
    }
}

if(isset( $_POST['inserir'] )){
    $lead->mes_solicitado   = $_POST['mes_solicitado'];
    $lead->trinta_litros    = $_POST['trinta_litros'];
    $lead->cinquenta_litros = $_POST['cinquenta_litros'];
    $lead->observacoes      = $_POST['observacoes'];
    $lead->total_venda      = $_POST['total_venda'];
    $lead->negocio_fechado  = $_POST['negocio_fechado'];
    $lead->nome             = $_POST['nome'];
    $lead->telefone         = $_POST['telefone'];
    $lead->cidade           = $_POST['cidade'];
    $lead->bairro           = $_POST['bairro'];

    if($acao == "editar"){
        $lead->update();
    }else{
        $lead->insert();
    }

    header('Location:leads.php');
    die();
}

//Executando ações
if($acao == "excluir"){
    $lead->delete();

    echo "<script>location.href='leads.php';</script>";
    die();
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
                    <a href="<?= $uri ?>" class="btn btn-success">Novo +</a>
                </div>
            </div>
            <form action="<? $acao == "editar" ? "?acao=editar" : "" ?>" method="post">
                <div class="row alert mt-5">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dados do Lead</h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= $lead->nome ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $lead->telefone ?>" data-toggle="input-mask" data-mask-format="(00) 0 0000-0000">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $lead->cidade ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $lead->bairro ?>">
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
                            <label for="mes_solicitado">Mês Solicitação</label>
                            <select name="mes_solicitado" id="mes_solicitado" class="form-control">
                                <option value="Janeiro"     <?= $lead->mes_solicitado == "Janeiro"   ? "selected" : "" ?>>Janeiro</option>
                                <option value="Fevereiro"   <?= $lead->mes_solicitado == "Fevereiro" ? "selected" : "" ?>>Fevereiro</option>
                                <option value="Março"       <?= $lead->mes_solicitado == "Março"     ? "selected" : "" ?>>Março</option>
                                <option value="Abril"       <?= $lead->mes_solicitado == "Abril"     ? "selected" : "" ?>>Abril</option>
                                <option value="Maio"        <?= $lead->mes_solicitado == "Maio"      ? "selected" : "" ?>>Maio</option>
                                <option value="Junho"       <?= $lead->mes_solicitado == "Junho"     ? "selected" : "" ?>>Junho</option>
                                <option value="Julho"       <?= $lead->mes_solicitado == "Julho"     ? "selected" : "" ?>>Julho</option>
                                <option value="Agosto"      <?= $lead->mes_solicitado == "Agosto"    ? "selected" : "" ?>>Agosto</option>
                                <option value="Setembro"    <?= $lead->mes_solicitado == "Setembro"  ? "selected" : "" ?>>Setembro</option>
                                <option value="Outubro"     <?= $lead->mes_solicitado == "Outubro"   ? "selected" : "" ?>>Outubro</option>
                                <option value="Novembro"    <?= $lead->mes_solicitado == "Novembro"  ? "selected" : "" ?>>Novembro</option>
                                <option value="Dezembro"    <?= $lead->mes_solicitado == "Dezembro"  ? "selected" : "" ?>>Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tri-ltrs">Barril <strong>30</strong> litros (Unidades)</label>
                            <input type="text" name="trinta_litros" id="tri-ltrs" class="form-control" value="<?= $lead->trinta_litros ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cin-ltrs">Barril <strong>50</strong> litros (Unidades)</label>
                            <input type="text" name="cinquenta_litros" id="cin-ltrs" class="form-control" value="<?= $lead->cinquenta_litros ?>">
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="total-venda">Valor total da venda</label>
                            <input type="text" name="total_venda" id="total-venda" class="form-control" value="<?= $lead->total_venda ?>">
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="negocio-fechado">Negócio Fechado</label>
                            <select name="negocio_fechado" id="negocio-fechado" class="form-control">
                                <option value="0" <?= $lead->negocio_fechado == 0 ? "selected" : "" ?>>Não</option>
                                <option value="1" <?= $lead->negocio_fechado == 1 ? "selected" : "" ?>>Sim</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" id="observacoes" cols="30" rows="5" class="form-control"><?= $lead->observacoes ?></textarea>
                    </div>

                    <div class="col-lg-12">
                        <input type="hidden" name="inserir" value="true">
                        <button type="submit" class="btn btn-success mt-3">Confirmar</button>
                    </div>
                </div>
            </form>

            <table id="table" class="display table table-striped wd-100">
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($leads as $l){ ?>
                        <tr>
                            <td><?= $l->mes_solicitado ?></td>
                            <td><?= $l->trinta_litros?></td>
                            <td><?= $l->cinquenta_litros ?></td>
                            <td><?= $l->nome ?></td>
                            <td><?= $l->telefone ?></td>
                            <td><?= $l->cidade ?></td>
                            <td><?= $l->bairro ?></td>
                            <td><?= $l->total_venda ?></td>
                            <td><?= $l->negocio_fechado ?></td>
                            <td><?= $l->observacoes ?></td>
                            <td>
                                <a href="<?= $uri . "?acao=editar&id=" . $l->id ?>" class="btn btn-warning">Editar</a>
                                <a href="<?= $uri . "?acao=excluir&id=" . $l->id ?>" class="btn btn-danger mt-3">Excluir</a>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
              </table>

        </div>
    </section>
    
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

     <!-- Mask -->
     <script src="assets/js/mask/jquery.mask.min.js"></script>
    <script src="assets/js/mask/autoNumeric-min.js"></script>
    <!-- Init js-->
    <script src="assets/js/mask/form-masks.init.js"></script>

    <!-- Vue -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
    $(document).ready( function () {
        $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
            },
        });
    });
    </script>
</body>
</html>