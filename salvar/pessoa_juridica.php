<?php

    include "app/validaDocs.php";

    $id = $razao_social = $cnpj = $nome_fantasia = $inscricao_estadual = $data_fundacao = $cep = $rua = $numero = $bairro = $cidade = $uf = $email = $telefone = $celular = "";

    if ( isset ( $_POST["id"] ) ) {
        $id = trim ( $_POST["id"] );
    }

    if ( isset ( $_POST["razao_social"] ) ) {
        $razao_social = trim ( $_POST["razao_social"] );
    }

    if ( isset ( $_POST["cnpj"] ) ) {
        $cnpj = trim ( $_POST["cnpj"] );
    }
    
    if ( isset ( $_POST["nome_fantasia"] ) ) {
        $nome_fantasia = trim ( $_POST["nome_fantasia"] );
    }
    
    if ( isset ( $_POST["inscricao_estadual"] ) ) {
        $inscricao_estadual = trim ( $_POST["inscricao_estadual"] );
    }
    
    if ( isset ( $_POST["data_fundacao"] ) ) {
        $data_fundacao = trim ( $_POST["data_fundacao"] );
        $data_fundacao = formataData($data_fundacao);
    }
    
    if ( isset ( $_POST["cep"] ) ) {
        $cep = trim ( $_POST["cep"] );
    }
    
    if ( isset ( $_POST["rua"] ) ) {
        $rua = trim ( $_POST["rua"] );
    }
    
    if ( isset ( $_POST["numero"] ) ) {
        $numero = trim ( $_POST["numero"] );
    }
    
    if ( isset ( $_POST["bairro"] ) ) {
        $bairro = trim ( $_POST["bairro"] );
    }
    
    if ( isset ( $_POST["cidade"] ) ) {
        $cidade = trim ( $_POST["cidade"] );
    }
    
    if ( isset ( $_POST["uf"] ) ) {
        $uf = trim ( $_POST["uf"] );
    }
    
    if ( isset ( $_POST["email"] ) ) {
        $email = trim ( $_POST["email"] );
    }
    
    if ( isset ( $_POST["telefone"] ) ) {
        $telefone = trim ( $_POST["telefone"] );
    }
    
    if ( isset ( $_POST["celular"] ) ) {
        $celular = trim ( $_POST["celular"] );
    }

    $msg = validaCNPJ($cnpj);

    if ( $msg != 1 ) {

    echo "<script>alert('$msg');history.back();</script>";
    exit;

    }

    if ( empty ( $razao_social ) ) {
        echo "<script>alert('Preencha o campo RAZÃO SOCIAL');history.back();</script>";
        exit;
    } else if ( empty ( $cnpj ) ) {
        echo "<script>alert('Preencha o campo CNPJ');history.back();</script>";
        exit;
    } else if ( empty ( $nome_fantasia ) ) {
        echo "<script>alert('Preencha o campo NOME FANTASIA');history.back();</script>";
        exit;
    } else if ( empty ( $inscricao_estadual ) ) {
        echo "<script>alert('Preencha o campo INSCRICÃO ESTADUAL');history.back();</script>";
        exit;
    } else if ( empty ( $data_fundacao ) ) {
        echo "<script>alert('Preencha o campo DATA FUNDAÇÃO');history.back();</script>";
        exit;
    } else if ( empty ( $cep ) ) {
        echo "<script>alert('Preencha o campo CEP');history.back();</script>";
        exit;
    } else if ( empty ( $rua ) ) {
        echo "<script>alert('Preencha o campo RUA');history.back();</script>";
        exit;
    } else if ( empty ( $numero ) ) {
        echo "<script>alert('Preencha o campo N°');history.back();</script>";
        exit;
    } else if ( empty ( $bairro ) ) {
        echo "<script>alert('Preencha o campo BAIRRO');history.back();</script>";
        exit;
    } else if ( empty ( $cidade ) ) {
        echo "<script>alert('Preencha o campo CIDADE');history.back();</script>";
        exit;
    } else if ( empty ( $uf ) ) {
        echo "<script>alert('Preencha o campo ESTADO');history.back();</script>";
        exit;
    } else if ( empty ( $email ) ) {
        echo "<script>alert('Preencha o campo E-MAIL');history.back();</script>";
        exit;
    } else if ( empty ( $telefone ) ) {
        echo "<script>alert('Preencha o campo TELEFONE');history.back();</script>";
        exit;
    } else if ( empty ( $celular ) ) {
        echo "<script>alert('Preencha o campo CELULAR');history.back();</script>";
        exit;
    } else {

        include "app/conecta.php";

        if ( empty ( $id ) ) {
            $sql = "insert into pessoa_juridica
                    (id, razao_social, cnpj, nome_fantasia, inscricao_estadual, data_fundacao, cep, rua, numero, bairro, cidade, uf, email, telefone, celular)
                    values 
                    (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $consulta = $pdo->prepare($sql);
            $consulta -> bindParam(1, $razao_social);
            $consulta -> bindParam(2, $cnpj);
            $consulta -> bindParam(3, $nome_fantasia);
            $consulta -> bindParam(4, $inscricao_estadual);
            $consulta -> bindParam(5, $data_fundacao);
            $consulta -> bindParam(6, $cep);
            $consulta -> bindParam(7, $rua);
            $consulta -> bindParam(8, $numero);
            $consulta -> bindParam(9, $bairro);
            $consulta -> bindParam(10, $cidade);
            $consulta -> bindParam(11, $uf);
            $consulta -> bindParam(12, $email);
            $consulta -> bindParam(13, $telefone);
            $consulta -> bindParam(14, $celular);

        } else {

            $sql = "update pessoa_juridica set 
                razao_social        = ?,
                cnpj                = ?,
                nome_fantasia       = ?,
                inscricao_estadual  = ?,
                data_fundacao       = ?,
                cep                 = ?,
                rua                 = ?,
                numero              = ?,
                bairro              = ?,
                cidade              = ?,
                uf                  = ?,
                email               = ?,
                telefone            = ?,
                celular             = ?
                where id = ? limit 1";

            $consulta = $pdo->prepare($sql);
            $consulta -> bindParam(1, $razao_social);
            $consulta -> bindParam(2, $cnpj);
            $consulta -> bindParam(3, $nome_fantasia);
            $consulta -> bindParam(4, $inscricao_estadual);
            $consulta -> bindParam(5, $data_fundacao);
            $consulta -> bindParam(6, $cep);
            $consulta -> bindParam(7, $rua);
            $consulta -> bindParam(8, $numero);
            $consulta -> bindParam(9, $bairro);
            $consulta -> bindParam(10, $cidade);
            $consulta -> bindParam(11, $uf);
            $consulta -> bindParam(12, $email);
            $consulta -> bindParam(13, $telefone);
            $consulta -> bindParam(14, $celular);
            $consulta -> bindParam(15, $id);

        }

        if ( $consulta->execute() ) {
            echo "<script>alert('Registro Salvo');location.href='index.php?op=listas&pg=pessoa_juridica ';</script>";
            exit;
        } else {
            echo "<script>alert('Erro ao Salvar');history.back();</script>";
            exit;

        }

    }

