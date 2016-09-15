<?php 
//require_once "init.php";
include_once 'menu.php';
require_once 'Acme/Models/ClienteModel.php';
require_once 'Acme/Classes/ValidarCampo.php';
?>

<?php

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);   
if (isset($data['cadastrar'])) {
    $cliente = new Acme\Models\ClienteModel;

    $cli = "'".$data['de_cliente']."'";
    $clienteEncontrado = $cliente->findBy('de_cliente', $cli);

    if (!$clienteEncontrado) {
        if (!empty($data['de_cliente']) && isset($data['de_cliente'])) {
        
            $cadastrado = $cliente->create(
                [
                    'de_cliente' => $data['de_cliente']

                ]

            );
            //Antes de cadastrar verificar se o usuário existe na base de dados
            if($cadastrado){
                $mensagem = "<h4 id='div-msg'><div class='alert alert-success'><b>Sucesso:</b>O cliente foi cadastrado no sistema!</div></h4>";
            }else{
                $mensagem = '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Erro ao tentar cadastrar! </div>
                            </div></h4>';
            }
        }else{
            echo '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Por favor preencha o campo! </div>
                            </div></h4>';
                            
        }
    }else{
        echo '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Esse <b>cliente<b> já foi cadastrado! </div>
                            </div></h4>';
                            
    }
}    

//Atualizar
if (isset($_POST['atualizar'])) {
    $cliente = new Acme\Models\ClienteModel;
    $atualizado = $suporte->update($_POST['id'],
        [
            'de_cliente'  => $_POST['de_cliente']

        ]);
    if($atualizado == 1){
        $mensagemUpdate = '<h4 id="div-msg" ><div class="alert alert-success" role="alert">
                               <div class="header">Cliente atualizado com sucesso! </div>
                           </div></h4>';
        //header('Location: /minhas-pastas/gravar/');
    }else{
        $mensagemUpdate = '<h4 id="div-msg" ><div class="alert alert-danger" role="alert">
                                <div class="header">Erro ao tentar atualizar! </div>
                           </div></h4>';
    }
}

//Deletar
if (isset($_GET['excluir']) && $_GET['excluir'] == true) {
    $cliente = new Acme\Models\ClienteModel;
    $deletado = $cliente->delete('id',$_GET['id']);

    if ($deletado) {
            echo("<script type='text/javascript'> alert('Cliente excluido com sucesso!'
                  ); location.href='cad-fornecedor.php';</script>");

    }
}

/*function fieldNotEmpty($field){
    if (!empty($field)) {
        echo $fields = $field;
    }else{
        echo '<span style="color: red;">Campo obrigatório!</span>';
        return;
    }
}*/

?>

<?php
    echo (isset($mensagemUpdate) ? $mensagemUpdate : '');
    echo (isset($mensagem) ? $mensagem : '');
?>

<?php
$testaCampo = new ValidarCampo;
?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Cadastro de Cliente</h1>
    </div>

    <div class="col-md-12">
      <?php
       /* require('./conf/Config.inc');
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);
            $cadastra = new Suporte();
            $cadastra->ExeCreate($data);
            if(!$cadastra->getResult()):
                echo $cadastra->getMsg();
    <?php if (isset($data)) echo $data['de_solucao']; ?>        else:
                echo $cadastra->getMsg();
            endif;
        endif;
        
        //var_dump($data);*/
        ?>
        <!--POSSO PEGAR O POST PELO NOME DO FORMULÁRIO-->
    <form  action="" method="post">
      <div class="row">
        <input type="hidden" name="cadastrar">
        <div class="form-group col-md-4">
            <label for="de_cliente">Cliente</label>
            <input type="text" class="form-control"  name="de_cliente" id="de_cliente" placeholder="Informe o nome do cliente" value="<?php if (isset($data)) echo $data['de_cliente']; ?>" >
            <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_cliente']);}?>
      </div>
  </div>
	  	<!--input type="submit" class="btn btn-primary" value="Cadastrar Suporte" name="SendPostForm">-->
        <button class="btn btn-primary" type="submit"><i class="check green icon"></i>Cadastrar</button>
        <input type="hidden" name="cadastrar">
</form>
  </div>
  </div>
  </div>
  </div>
