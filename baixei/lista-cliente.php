<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Acme/Models/ClienteModel.php');
//require_once 'Acme/Models/ClienteModel.php';
include_once 'menu.php';?>

<?php
  // Limita o número de registros a serem mostrados por página
  $limite = 5;
  // Se pg não existe atribui 1 a variável pg
  $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;
  // Atribui a variável inicio o inicio de onde os registros vão ser
  // mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
  $inicio = ($pg * $limite) - $limite;

  $cliente = new Acme\Models\ClienteModel;
  $clientes = $cliente->readPagination($inicio, $limite);
  //dump($user);
?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-6">
      <h1 class="page-header">Clientes</h1>
    </div>
    <div class="col-md-2">
      <a class="btn btn-primary btn-sm btn-block" href="cadastrar-cliente.php">Novo</a>
    </div>
    <div class="col-md-10">
      <table class="table table-striped">
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Ações</th>
         
        </tr>
        <?php
            //quantos registros exitem no banco
            $temp = $cliente->countRecords();
            //var_dump($qtd);
            // echo ($qtd['total']);
            $qtdRegistros = $temp[0];
            //$qtdRegistros->total;
            //calcula o total de paginas
            $qtdPag = ceil($qtdRegistros->total/$limite);
            //print_r($qtd[0]);
            foreach ($clientes as $cliente) :

            ?>
          <td><?php echo $cliente->id; ?></td>
          <td><?php echo ($cliente->de_cliente);?></td>
          <td><a href="editar-cliente.php?edit=true&id=<?php echo $cliente->id;?>" class="btn btn-primary btn-sm">Editar</a>
        <a href="?excluir=true&id=<?php echo $cliente->id;?>" class="btn btn-danger btn-sm">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
      </table>

      <!-- Paginacao -->
      <nav aria-label="Paginacao">
          <ul class="pagination">
            <li>
              <a href="lista-user.php?pg=1" aria-label="Previous">
                <span aria-hidden="true">Primeiro</span>
              </a>
            </li>
            <li>
              <a href="lista-user.php?pg=<?php echo ($pg>1 ? $pg-1 : $pg); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php
            if($qtdPag > 1 && $pg <= $qtdPag){
              for($i = 1; $i <= $qtdPag; $i++){
                if($i == $pg){
                  ?> <li class="active"><a href="#"><?php echo $i; ?></a></li> <?php
                } else {
                  ?> <li><a href="lista-user.php?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li> <?php
                }
              }
            }
            ?>
            
            <li>
              <a href="lista-user.php?pg=<?php echo ($pg<$qtdPag ? $pg+1 : $pg); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            <li>
              <a href="lista-user.php?pg=<?php echo $qtdPag; ?>" aria-label="Previous">
                <span aria-hidden="true">Última</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
  </div>
  </div>
  </div>
  
