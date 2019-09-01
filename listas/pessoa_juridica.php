<table class="table" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Razão</th>
            <th>CNPJ</th>
            <th>Fantasia</th>
            <th>Fundação</th>
            <th>Cep</th>
            <th>Cidade</th>
            <th>Uf</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "app/conecta.php";

            $sql = "select * from pessoa_juridica order by id";

            $consulta = $pdo->prepare($sql);
            $consulta->execute();

            while ( $dados = $consulta->fetch(PDO::FETCH_OBJ) ) {
                $id = $dados->id;
                $razao_social = $dados->razao_social;
                $cnpj = $dados->cnpj;
                $nome_fantasia = $dados->nome_fantasia;
                $data_fundacao = $dados->data_fundacao;
                $cep = $dados->cep;
                $cidade = $dados->cidade;
                $uf = $dados->uf;
                $telefone = $dados->telefone;

                echo "<tr>
                        <td>$id</td>
                        <td>$razao_social</td>
                        <td>$cnpj</td>
                        <td>$nome_fantasia</td>
                        <td>$data_fundacao</td>
                        <td>$cep</td>
                        <td>$cidade</td>
                        <td>$uf</td>
                        <td>
                            <a href=index.php?op=cadastrar&pg=pessoa_juridica&id=$id class='btn btn-success'>
                                <i class='fas fa-edit'></i>
                            </a>
                            <a href=\"javascript:excluir($id,'$razao_social')\" class='btn btn-danger'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>";
            }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    function excluir(id, razao_social) {
        if ( confirm( "Deseja realmente excluir "+razao_social+" ? ") ) {
            link = "index.php?op=excluir&pg=pessoa_juridica&id="+id;

            location.href = link;
        }
    }
</script>