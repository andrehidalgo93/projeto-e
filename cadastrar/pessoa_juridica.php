<?php
    $id = $razao_social = $cnpj = $nome_fantasia = $inscricao_estadual = $data_fundacao = $cep = $rua = $numero = $bairro = $cidade = $uf = $email = $telefone = $celular = "";

        include "app/conecta.php";
        include "app/validaDocs.php";

    if ( isset ( $_GET["id"] ) ) {
        $id = trim ( $_GET["id"] );
        
        $sql = "select *, date_format(data_fundacao,'%d/%m/%Y') data_fundacao from pessoa_juridica where id = ? limit 1";

        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        if ( isset ( $dados->id) ){
            $id = $dados->id;
            $razao_social = $dados->razao_social;
            $cnpj = $dados->cnpj;
            $nome_fantasia = $dados->nome_fantasia;
            $inscricao_estadual = $dados->inscricao_estadual;
            $data_fundacao = $dados->data_fundacao;
            $cep = $dados->cep;
            $rua = $dados->rua;
            $numero = $dados->numero;
            $bairro = $dados->bairro;
            $cidade = $dados->cidade;
            $uf = $dados->uf;
            $email = $dados->email;
            $telefone = $dados->telefone;
            $celular = $dados->celular;
        }
    }
?>

<div class="row">
    <div class="col-sm-8 col-md-10 offset-md-1">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h4>Cadastro Pessoa Jurídica</h4>
            </div>
            <div class="card-body">
                <form name="form1" id="form1" method="POST" action="index.php?op=salvar&pg=pessoa_juridica" enctype="multipart/form-data">
                    <ul id="progress">
                        <li class="ativo navegacao">Dados Pessoais</li>
                        <li class="navegacao">Endereço</li>
                        <li class="navegacao">Contato </li>
                    </ul>
                    <fieldset>
                        <h4 class="text-center margem">Dados Pessoais</h4>
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Digite sua Razão Social" 
                                value="<?php echo $razao_social;?>" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite seu CNPJ" 
                                    value="<?php echo $cnpj;?>" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="nome_fantasia">Nome Fantasia</label>
                                <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Digite seu Nome Fantasia" 
                                    value="<?php echo $nome_fantasia;?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="inscricao_estadual">Inscrição Estadual</label>
                                <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="Digite sua Inscrição Estadual" 
                                    value="<?php echo $inscricao_estadual;?>" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="data_fundacao">Data de Fundação</label>
                                <input type="text" class="form-control" id="data_fundacao" name="data_fundacao" 
                                    value="<?php echo $data_fundacao;?>" />
                            </div>
                        </div>
                        <button type="button" name="next1" class="next btn btn-success">Proximo</button>
                    </fieldset>
                    <fieldset>
                        <h4 class="text-center margem">Endereço</h4>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" 
                                value="<?php echo $cep;?>" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-9">
                                <label for="rua">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite o nome da Rua" 
                                    value="<?php echo $rua;?>" />
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="numero">N°</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o numero da Casa" 
                                    value="<?php echo $numero;?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite seu Bairro" 
                                value="<?php echo $bairro;?>" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-9">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua Cidade" 
                                    value="<?php echo $cidade;?>" />
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="uf">Estado</label>
                                <input type="text" class="form-control" id="uf" name="uf" placeholder="Digite a UF de seu Estado"
                                    value="<?php echo $uf;?>" />
                            </div>
                        </div>
                        <button type="button" name="prev" class="prev btn btn-success">Anterior</button>
                        <button type="button" name="next2" class="next btn btn-success">Proximo</button>
                    </fieldset>
                    <fieldset>
                        <h4 class="text-center margem">Contato</h4>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail" 
                                value="<?php echo $email;?>" />
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu Telefone" 
                                value="<?php echo $telefone;?>" />
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite seu Celular" 
                                value="<?php echo $celular;?>" />
                        </div>
                        <button type="button" name="prev" class="prev btn btn-success">Anterior</button>
                        <button type="submit" name="next" class="acao btn btn-success">Salvar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>