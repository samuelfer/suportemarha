<?php include_once 'menu.php';?>


  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Cadastro de Usuário</h1>
    </div>
    
    <div class="col-md-12">
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
        
       // var_dump($data);
        ?>

    <form name="PostForm" action="" method="post" enctype="multipart/form-data">
    	<div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control"  name="nome" id="nome" placeholder="Informe um nome" value="<?php if (isset($data)) echo $data['nome']; ?>" >
	  </div>
	  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" name="email" id="email" placeholder="Informe um email" value="<?php if (isset($data)) echo $data['email']; ?>">
	  </div>
	  <div class="form-group">
		    <label for="exampleInputPassword1">Senha</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  	<input type="submit" class="btn btn-primary" value="Cadastrar Usuário" name="SendPostForm">
</form>
  </div>
  </div>
  </div>
  </div>
