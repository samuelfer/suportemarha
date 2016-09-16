<?php 
require_once 'Acme/Models/SuporteModel.php';
include_once 'menu.php';?>

<?php
  $suporte = new Acme\Models\SuporteModel;
  $suportes = $suporte->read();
  //dump($user);
?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
      <h1 class="page-header">Suporte</h1>
    </div>
    <div class="col-md-2">
      <a class="btn btn-primary btn-block" href="cadastrar-user.php">Novo</a>
    </div>
    
    <div class="col-md-12">
      <table class="table table-striped">
        <tr>
          <th>Data do Cadastro</th>
          <th>Nº Protocolo</th>
          <th>Data da Reclamação</th>
          <th>Tipo de Ocorrência</th>
          <th>Atendente</th>
          <!--<th>Condomínio</th>-->
          <th>Cliente</th>
          <th>E-mail cliente</th>
          <!--<th>Telefone</th>-->
          <th>Reclamação</th>
          <!--<th>Setor</th>-->

          <th>Ações</th>
         
        </tr>
        <tr>
          <?php
               foreach ($suportes as $suporte) :

           ?>
          <td><?php echo $suporte->dt_cadastro; ?></td>
          <td><?php echo $suporte->nu_protocolo; ?></td>
          <td><?php echo $suporte->dt_reclamacao; ?></td>
          <td><?php echo $suporte->tp_ocorrencia; ?></td>
          <td><?php echo $suporte->de_atendente; ?></td>
          <td><?php echo $suporte->de_cliente;?></td>
          <td><?php echo $suporte->de_email_cliente; ?></td>
          <td><?php echo $suporte->de_reclamacao; ?></td>
          <!--<td><?php //echo "bolo"; ?></td>-->
         <!-- <td><?php //echo "bolo"; ?></td>
          <!--<td><?php //echo "bolo"; ?></td>-->
          <!--<td><?php //echo "bolo"; ?></td>-->
          <td><a href="editar-suporte.php?edit=true&id=<?php echo $suporte->id;?>" class="btn btn-primary">Editar</a>
        <a href="?excluir=true&id=<?php echo $suporte->id;?>" class="btn btn-danger">Excluir</a></td>
        </tr>
      <?php endforeach;?>
      </table>
    </div>

  </div>
  </div>
  </div>
