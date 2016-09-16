<?php 
//require_once "init.php";
include_once 'menu.php';
require_once 'Acme/Models/SuporteModel.php';
require_once 'Acme/Classes/ValidarCampo.php';
?>

<?php
$testaCampo = new ValidarCampo;
?>
<?php

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);   
if (isset($data['cadastrar'])) {
    $suporte = new Acme\Models\SuporteModel;

    $sup = "'".$data['nu_protocolo']."'";
    $protEncontrado = $suporte->findBy('nu_protocolo', $sup);

    if (!$protEncontrado) {
        if (!empty($data['dt_cadastro']) && isset($data['dt_cadastro']) && !empty($data['nu_protocolo']) && isset($data['nu_protocolo'])) {
        
            $cadastrado = $suporte->create(
                [
                    'dt_cadastro'          => $data['dt_cadastro'],
                    'nu_protocolo'         => $data['nu_protocolo'],
                    'dt_reclamacao'        => $data['dt_reclamacao'],
                    'tp_ocorrencia'        => $data['tp_ocorrencia'],
                    'de_atendente'         => $data['de_atendente'],
                    'de_condominio'        => $data['de_condominio'],
                    'de_cliente'           => $data['de_cliente'],
                    'de_email_cliente'     => $data['de_email_cliente'],
                    'nu_telefone'          => $data['nu_telefone'],
                    'de_reclamacao'        => $data['de_reclamacao'],
                    'de_setor_responsavel' => $data['de_setor_responsavel'],
                    'dt_estimada'          => $data['dt_estimada'],
                    'de_avaliacao'         => $data['de_avaliacao'],
                    'st_status'            => $data['st_status'],
                    'de_solucao'           => $data['de_solucao']

                ]

            );
            //Antes de cadastrar verificar se o usuário existe na base de dados
            if($cadastrado){
                $mensagem = "<h4 id='div-msg'><div class='alert alert-success'><b>Sucesso:</b>O suporte foi cadastrado no sistema!</div></h4>";
            }else{
                $mensagem = '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Erro ao tentar cadastrar! </div>
                            </div></h4>';
            }
        }else{
            echo '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Por favor preencha os campos! </div>
                            </div></h4>';
                            
        }
    }else{
        echo '<h4 id="div-msg"><div class="alert alert-danger" role="alert">
                                <div class="header">Esse <b>protocolo<b> já foi cadastrado! </div>
                            </div></h4>';
                            
    }
}    

//Atualizar
if (isset($_POST['atualizar'])) {
    $suporte = new Acme\Models\SuporteModel;
    $atualizado = $suporte->update($_POST['id'],
        [
            'dt_cadastro'          => $_POST['dt_cadastro'],
            'nu_protocolo'         => $_POST['nu_protocolo'],
            'dt_reclamacao'        => $_POST['dt_reclamacao'],
            'tp_ocorrencia'        => $_POST['tp_ocorrencia'],
            'de_atendente'         => $_POST['de_atendente'],
            'de_condominio'        => $_POST['de_condominio'],
            'de_cliente'           => $_POST['de_cliente'],
            'de_email_cliente'     => $_POST['de_email_cliente'],
            'nu_telefone'          => $_POST['nu_telefone'],
            'de_reclamacao'        => $_POST['de_reclamacao'],
            'de_setor_responsavel' => $_POST['de_setor_responsavel'],
            'dt_estimada'          => $_POST['dt_estimada'],
            'de_avaliacao'         => $_POST['de_avaliacao'],
            'st_status'            => $_POST['st_status'],
            'de_solucao'           => $_POST['de_solucao']

        ]);
    if($atualizado == 1){
        $mensagemUpdate = '<h4 id="div-msg" ><div class="alert alert-success" role="alert">
                               <div class="header">Suporte atualizado com sucesso! </div>
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
    $suporte = new Acme\Models\SuporteModel;
    $deletado = $suporte->delete('id',$_GET['id']);

    if ($deletado) {
            echo("<script type='text/javascript'> alert('Suporte excluido com sucesso!'
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

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Cadastro de Suporte</h1>
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
            else:
                echo $cadastra->getMsg();
            endif;
        endif;
        
        //var_dump($data);*/
        ?>
        <!--POSSO PEGAR O POST PELO NOME DO FORMULÁRIO-->
    <form  action="" method="post">
      <div class="row">
        <input type="hidden" name="cadastrar">
        <div class="form-group col-md-3">
            <label for="dt_cadastro">Data do cadastro</label>
            <input type="text" class="form-control"  name="dt_cadastro" id="dt_cadastro" placeholder="Informe a data do cadastro" value="" >
            <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['dt_cadastro']);}?>
      </div>
    	<div class="form-group col-md-3">
		    <label for="nu_protocolo">Nº protocolo</label>
		    <input type="text" class="form-control"  name="nu_protocolo" id="nome" placeholder="Informe o número do protocolo" value="<?php if (isset($data)) echo $data['nu_protocolo']; ?>" >
            <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['nu_protocolo']);}?>
	  </div>

    <div class="form-group col-md-4">
        <label for="data">Data</label>
        <input type="date" class="form-control" name="dt_reclamacao" id="data" placeholder="Informe a data" value="<?php if (isset($data)) echo $data['dt_reclamacao']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['dt_reclamacao']);}?>
    </div>
 </div>
    <!--<div class="form-group col-md-2">
        <label for="hora">Hora</label>
        <input type="time" class="form-control" name="hora" id="hora" placeholder="Informe a hora">
    </div>-->
 <div class="row">
	  <div class="form-group col-md-4">
		    <label for="email">Tipo da ocorrência</label>
		    <input type="text" class="form-control" name="tp_ocorrencia" id="tipo_ocorrencia" placeholder="Informe o tipo da ocorrência" value="<?php if (isset($data)) echo $data['tp_ocorrencia']; ?>">
            <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['tp_ocorrencia']);}?>
	  </div>
	
  
    <div class="form-group col-md-3">
        <label for="atendente">Atendente</label>
        <input type="text" class="form-control" name="de_atendente" id="atendente" placeholder="Informe o atendente" value="<?php if (isset($data)) echo $data['de_atendente']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_atendente']);}?>
    </div>
    <div class="form-group col-md-3">
        <label for="condominio">Condomínio</label>
        <input type="text" class="form-control" name="de_condominio" id="condominio" placeholder="Informe o condomínio" value="<?php if (isset($data)) echo $data['de_condominio']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_condominio']);}?>
    </div>
     </div>
    <div class="row">
    <div class="form-group col-md-3">
        <label for="cliente">Cliente</label>
        <input type="text" class="form-control" name="de_cliente" id="cliente" placeholder="Informe o nome do cliente" value="<?php if (isset($data)) echo $data['de_cliente']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_cliente']);}?>
    </div>
    
    <div class="form-group col-md-4">
        <label for="email">E-mail do cliente</label>
        <input type="text" class="form-control" name="de_email_cliente" id="email" placeholder="Informe o email do cliente" value="<?php if (isset($data)) echo $data['de_email_cliente']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_email_cliente']);}?>
    </div>
    <div class="form-group col-md-3">
        <label for="exampleInputPassword1">Telefone do cliente</label>
        <input type="text" class="form-control" name="nu_telefone" id="telCliente" placeholder="Informe o telefone do cliente" value="<?php if (isset($data)) echo $data['nu_telefone']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['nu_telefone']);}?>
    </div>
</div>
  
  <div class="row">
    <div class="form-group col-md-4">
        <label for="setor">Setor responsável</label>
        <input type="text" class="form-control" name="de_setor_responsavel" id="setor" placeholder="Informe o setor" value="<?php if (isset($data)) echo $data['de_setor_responsavel']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['de_setor_responsavel']);}?>
    </div>
    <div class="form-group col-md-3">
        <label for="data">Data estimada</label>
        <input type="date" class="form-control" name="dt_estimada" id="data" placeholder="Informe uma data estimada" value="<?php if (isset($data)) echo $data['dt_estimada']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['dt_estimada']);}?>
    </div>
    <div class="form-group col-md-3">
        <label for="status">Status</label>
        <input type="text" class="form-control" name="st_status" id="status" placeholder="Informe o status" value="<?php if (isset($data)) echo $data['st_status']; ?>">
        <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['st_status']);}?>
    </div>
    </div>
     <div class="row">
    <div class="form-group col-md-5">
        <label for="avaliacao">Avaliação</label>
        <input type="text" class="form-control" name="de_avaliacao" id="avaliacao" placeholder="Informe a avaliação" value="<?php if (isset($data)) echo $data['de_avaliacao']; ?>">
    </div>
 
    <div class="form-group col-md-5">
        <label for="reclamacao">Reclamação</label>
        <input type="text" class="form-control" name="de_reclamacao" id="reclamacao" placeholder="Informe a reclamação" value="<?php if (isset($data)) echo $data['de_reclamacao']; ?>">
    </div>
  

    <div class="form-group col-md-5">
        <label for="solucao">Solução</label>
        <input type="text" class="form-control" name="de_solucao" id="solucao" placeholder="Informe a solução" value="<?php if (isset($data)) echo $data['de_solucao']; ?>">
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
