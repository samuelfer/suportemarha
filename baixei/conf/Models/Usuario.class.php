<?php

class Usuario {

    private $Data;
    private $Msg;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 't_usuarios';

    /**
     * <b>Cadastrar Categoria:</b> Envelopa nome, email em um array atribuitivo.
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->checkData();
        if ($this->Result):
            $this->Create();
        endif;
    }

       /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro for efetuado ou FALSE se não. Para verificar
     * erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }
    
    /**
     * <b>Obter Erro:</b> Retorna o tipo de erro!
     */
    public function getMsg() {
        return $this->Msg;
    }
    
    //Valida e cria os dados para realizar o cadastro
    private function checkData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Msg =  "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro ao cadastrar: </b>Para cadastrar o usuário, preencha todos os campos!</div></h4>";
        elseif(!Valida::Email($this->Data['email'])):
            $this->Result = false;
            $this->Msg =  "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro ao cadastrar: </b>Preencha o e-mail válido!</div></h4>";
        else:
            $this->Result = true;
        endif;
    }

    //Cadastra a usuário no banco!
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Result = $Create->getResult();
            $this->Msg = "<h4 id='div-msg'><div class='alert alert-success' role='alert'><b>Sucesso: </b>O Usuário {$this->Data['nome']} foi cadastrado no sistema!</div></h4>";
        endif;
    }

}
