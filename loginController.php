<?php
    session_start();
    require __DIR__ . "/vendor/autoload.php";
    use App\Model\User;

    if( isset($_POST['cpf']) ) {

        $user = new User();

        $cpf = addslashes($_POST['cpf']);

        $hasUser = $user->select("cpf = \"" .  $cpf . "\"", null);

        if($hasUser[0]){

            $_SESSION['usuario'] = $hasUser[0]->id;
            
            if( isset($_SESSION['usuario']) ){
                header('Location:leads.php');
            }

        } else {
            header('Location:index.php?erro=404');
        }
    } else {
        header('Location:index.php?erro=404');
    }
?>