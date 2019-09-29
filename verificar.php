<html>
    <head>
        <meta charset=UTF-8>
    </head>    

    <body>
    <?php
                include('conexao.php');

                session_start();

                if(isset($_POST['enviar'])){
                    $email=$_POST['email'];
                    $senha=$_POST['senha'];
                    $senha=sha1($senha);
                    $sql=('select * from profissional where email="'.$email.'" and senha="'.$senha.'";');
                    $resul=mysqli_query($conexao, $sql);

                    if(mysqli_num_rows($resul)){
                        $con=mysqli_fetch_array($resul);
                        $_SESSION['login']=$con['nome'];
						header('location:perfilprof/perfilprof.html');

                        if($con['nome']=='admin')header('location:perfilprof/perfilprof.html');
                        
						
					}else{
                         echo('Valor invalido');
					}
				}
        ?>
    </body>
</html>