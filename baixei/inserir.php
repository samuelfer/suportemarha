<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - Crud Create</title>
    </head>
    <body>        
        <header>
            <h1>Cadastrar Usuário</h1>
        </header>
        <?php
        require('./conf/Config.inc');
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);
            $cadastra = new Usuario();
            $cadastra->ExeCreate($data);
            if(!$cadastra->getResult()):
                echo $cadastra->getMsg();
            else:
                echo $cadastra->getMsg();
            endif;
        endif;
        
        //var_dump($data);
        ?>
        
        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

            <label class="label">
                <span class="field">Nome:</span>
                <input type="text" name="nome"  placeholder="Nome Completo"  value="<?php if (isset($data)) echo $data['nome']; ?>" />
            </label>

            <label class="label">
                <span class="field">E-mail:</span>
                <input type="text" name="email"  placeholder="Seu Melhor E-mail"  value="<?php if (isset($data)) echo $data['email']; ?>" />
            </label>

            <input type="submit" value="Cadastrar Usuário" name="SendPostForm" />
        </form>
    </body>
</html>