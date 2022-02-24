<?
session_start();
if( !isset($_SESSION['usuario']) ){
    header('Location:index.php');
}

require __DIR__ . "/vendor/autoload.php";

use App\Model\User;

if(isset( $_POST['inserir'] )){
    $user = new User();
    
    $user->usuario   = $_POST['nome'];
    $user->cpf          = $_POST['cpf'];

    $user->insert();

    if($user->id) {
        header("Location:usuarios.php?status=200");
    } else {
        header("Location:usuarios.php?status=500");
    }
}

?>
<?include("_head.php")?>
<body>
    <?$pg="home"?>
    <?include("_navbar.php")?>
    <section class="container-fluid">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <?if($_GET['status'] == '500'){?>
                    <div class="alert alert-danger">
                        Erro ao cadastrar usuário.
                    </div>
                    <?}?>
                    <?if($_GET['status'] == '200'){?>
                    <div class="alert alert-success">
                        Usuário cadastrado com sucesso!
                    </div>
                    <?}?>
                </div>
            </div>
            <form action="" method="post">
                <div class="row alert mt-5">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cadastrar usuário</h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000-00" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <input type="hidden" name="inserir" value="true">
                        <button type="submit" class="btn btn-success mt-3">Confirmar</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Vue -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Mask -->
    <script src="assets/js/mask/jquery.mask.min.js"></script>
    <script src="assets/js/mask/autoNumeric-min.js"></script>
    <!-- Init js-->
    <script src="assets/js/mask/form-masks.init.js"></script>
</body>
</html>