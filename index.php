<?include("_head.php")?>
<style>
    .card {
        width: 300px;
        margin: 0 auto;
    }
    @media(max-width: 768){
        .card {
            width: 150px;
        }
    }
</style>
<body>
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <img src="assets/img/logo.png" alt="">
            </div>
            <div class="col-lg-12">
                <form action="loginController.php" method="POST">
                    <div class="card pr-3 pl-3 pt-3 pb-3 mt-3">
                        <?if($_GET['erro'] === '404'){?>
                            <div class="alert alert-danger text-center">
                                Erro ao efetuar login
                            </div>
                        <?}?>
                        <h1 class="page-header text-center">Login</h1>
                        <hr>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite aqui" data-toggle="input-mask" data-mask-format="000.000.000-00" required>
                        </div>
                        <input type="submit" value="Login" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Mask -->
    <script src="assets/js/mask/jquery.mask.min.js"></script>
    <script src="assets/js/mask/autoNumeric-min.js"></script>
    <!-- Init js-->
    <script src="assets/js/mask/form-masks.init.js"></script>
</body>
</html>