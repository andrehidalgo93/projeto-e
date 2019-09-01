<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">RG</th>
            <th scope="col">Data Nasc</th>
            <th scope="col">Cep</th>
            <th scope="col">Cidade</th>
            <th scope="col">Uf</th>
            <th scope="col">Telefone</th>
            <th scope="col">Celular</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "app/conecta.php";

            $sql = "select * from pessoa_fisica order by id";

            $consulta = $pdo->prepare($sql);
            $consulta->execute();

            while ( $dados = $consulta->fetch(PDO::FETCH_OBJ) ) {
                $id = $dados->id;
                $nome = $dados->nome;
                $cpf = $dados->cpf;
                $rg = $dados->rg;
                $data_nasc = $dados->data_nasc;
                $cep = $dados->cep;
                $cidade = $dados->cidade;
                $uf = $dados->uf;
                $telefone = $dados->telefone;
                $celular = $dados->celular;

                echo "<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$cpf</td>
                        <td>$rg</td>
                        <td>$data_nasc</td>
                        <td>$cep</td>
                        <td>$cidade</td>
                        <td>$uf</td>
                        <td>$celular</td>
                        <td>
                            <a href=index.php?op=cadastrar&pg=pessoa_fisica&id=$id class='btn btn-success'>
                                <i class='fas fa-edit'></i>
                            </a>
                            <a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    function excluir(id, nome) {
        if ( confirm( "Deseja realmente excluir "+nome+" ? ") ) {
            link = "index.php?op=excluir&pg=pessoa_fisica&id="+id;

            location.href = link;
        }
    }
</script>