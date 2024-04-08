<?php
include_once '../include/config.inc.php';

if(!isset($_SESSION['id'])){
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html  class="bg-base-100" lang="en" data-theme="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'default'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                
                <div class="flex flex-col gap-8">
                    <div class="">
                        <p class="py-3">
                            <h1 class="text-5xl font-bold"><?php echo "Olá, " . $_SESSION['user']  ?></h1>
                            <h3 class="py-3">bem vindo(a) de volta a educse, seu último acesso foi em: <?php echo $_SESSION['ultimo_login']; ?></h3>
                            <div class="gap-1 flex justify-center items-center w-full">
                                <a class="btn btn-secondary">Configurações</a>
                                <div class="divider divider-horizontal"></div>
                                <?php if($_SESSION['cargo'] == 'professor'){ ?>
                                    <a href="<?php echo $arrConfig['url_admin'] . 'turma.php' ?>" class="btn btn-secondary">Turmas</a>
                                <?php } else { ?>
                                    <a href="<?php echo $arrConfig['url_admin'] . 'turma.php' ?>" class="btn btn-secondary">Turma</a>
                                <?php } ?>
                                <div class="divider divider-horizontal"></div>
                                <a class="btn btn-secondary">Conta</a>
                                <div class="divider divider-horizontal"></div>
                                <a href="<?php echo $arrConfig['url_modules'] . 'trata_logout.mod.php' ?>" class="btn btn-secondary">Logout</a>
                            </div>
                        </p>
                    </div>
                    <div class="">
                        <input type="radio" id="theme-black" name="theme-radios" class="radio bg-black theme-controller" value="black"/>
                        <input type="radio" id="theme-nord" name="theme-radios" class="radio bg-slate-300 theme-controller" value="nord"/>
                        <input type="radio" id="theme-cyberpunk" name="theme-radios" class="radio bg-yellow-300 theme-controller" value="cyberpunk"/>
                        <input type="radio" id="theme-cmyk" name="theme-radios" class="radio theme-controller" value="cmyk"/>
                        <input type="radio" id="theme-mytheme" name="theme-radios" class="radio bg-blue-400 theme-controller" value="mytheme"/>                  
                        <input type="radio" id="theme-nocas" name="theme-radios" class="radio bg-purple-400 theme-controller" value="nocas"/>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</body>
<script>
    $(document).ready(function(){
    $('input[type=radio][name=theme-radios]').change(function() {
        var theme = this.value;
        $.ajax({
            url: '<?php echo $arrConfig['url_modules'] . 'trata_mudar_tema.mod.php' ?>',
            type: 'post',
            data: {theme: theme},
            success: function(response){
                location.reload(); 
            }
        });
    });
});
</script>
</script>
</html>