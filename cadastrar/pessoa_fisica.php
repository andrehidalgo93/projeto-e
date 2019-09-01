<?php
        $id = $nome = $cpf = $rg = $sexo = $data_nasc = $cep = $rua = $numero = $bairro = $cidade = $uf = $email = $telefone = $celular = "";

        include "app/conecta.php";
        include "app/validaDocs.php";

    if ( isset ( $_GET["id"] ) ) {
        $id = trim ( $_GET["id"] );
        
        $sql = "select *, date_format(data_nasc,'%d/%m/%Y') data_nasc from pessoa_fisica where id = ? limit 1";

        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        if ( isset ( $dados->id) ){
            $id = $dados->id;
            $nome = $dados->nome;
            $cpf = $dados->cpf;
            $rg = $dados->rg;
            $sexo = $dados->sexo;
            $data_nasc = $dados->data_nasc;
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
                <h4>Cadastro Pessoa Física</h4>
            </div>
            <div class="card-body">
                <form name="form1" id="form1" method="POST" action="index.php?op=salvar&pg=pessoa_fisica" enctype="multipart/form-data">
                    <ul id="progress">
                        <li class="ativo navegacao">Dados Pessoais</li>
                        <li class="navegacao">Endereço</li>
                        <li class="navegacao">Contato </li>
                    </ul>
                    <fieldset>
                        <h4 class="text-center margem">Dados Pessoais</h4>
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="<?php echo $id;?>" />
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome"
                                value="<?php echo $nome;?>" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF"
                                    value="<?php echo $cpf;?>" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG"
                                    value="<?php echo $rg;?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control" name="sexo">
                                    <option selected value="">-- Selecione --</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="data_nasc">Data de Nascimento</label>
                                <input type="text" class="form-control" id="data_nasc" name="data_nasc"
                                    value="<?php echo $data_nasc;?>" />
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
<script type="text/javascript">
    $('#sexo').val("<?$sexo;?>");
</script>