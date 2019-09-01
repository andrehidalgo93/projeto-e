<?php

    include "app/validaDocs.php";

    $id = $nome = $cpf = $rg = $sexo = $data_nasc = $cep = $rua = $numero = $bairro = $cidade = $uf = $email = $telefone = $celular = "";

    if ( isset ( $_POST["id"] ) ) {
        $id = trim ( $_POST["id"] );
    }

    if ( isset ( $_POST["nome"] ) ) {
        $nome = trim ( $_POST["nome"] );
    }

    if ( isset ( $_POST["cpf"] ) ) {
        $cpf = trim ( $_POST["cpf"] );
    }
    
    if ( isset ( $_POST["rg"] ) ) {
        $rg = trim ( $_POST["rg"] );
    }
    
    if ( isset ( $_POST["sexo"] ) ) {
        $sexo = trim ( $_POST["sexo"] );
    }
    
    if ( isset ( $_POST["data_nasc"] ) ) {
        $data_nasc = trim ( $_POST["data_nasc"] );
        $data_nasc = formataData($data_nasc);
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

    $msg = validaCPF($cpf);

    if ( $msg != 1 ) {

    echo "<script>alert('$msg');history.back();</script>";
    exit;

    }

    if ( empty ( $nome ) ) {
        echo "<script>alert('Preencha o campo NOME');history.back();</script>";
        exit;
    } else if ( empty ( $cpf ) ) {
        echo "<script>alert('Preencha o campo CPF');history.back();</script>";
        exit;
    } else if ( empty ( $rg ) ) {
        echo "<script>alert('Preencha o campo RG');history.back();</script>";
        exit;
    } else if ( empty ( $sexo ) ) {
        echo "<script>alert('Preencha o campo SEXO');history.back();</script>";
        exit;
    } else if ( empty ( $data_nasc ) ) {
        echo "<script>alert('Preencha o campo DATA NASCIMENTO');history.back();</script>";
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
            $sql = "insert into pessoa_fisica
                    (id, nome, cpf, rg, sexo, data_nasc, cep, rua, numero, bairro, cidade, uf, email, telefone, celular)
                    values 
                    (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $consulta = $pdo->prepare($sql);
            $consulta -> bindParam(1, $nome);
            $consulta -> bindParam(2, $cpf);
            $consulta -> bindParam(3, $rg);
            $consulta -> bindParam(4, $sexo);
            $consulta -> bindParam(5, $data_nasc);
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

            $sql = "update pessoa_fisica set 
                nome            = ?,
                cpf             = ?,
                rg              = ?,
                sexo            = ?,
                data_nasc       = ?,
                cep             = ?,
                rua             = ?,
                numero          = ?,
                bairro          = ?,
                cidade          = ?,
                uf              = ?,
                email           = ?,
                telefone        = ?,
                celular         = ?
                where id = ? limit 1";

            $consulta = $pdo->prepare($sql);
            $consulta -> bindParam(1, $nome);
            $consulta -> bindParam(2, $cpf);
            $consulta -> bindParam(3, $rg);
            $consulta -> bindParam(4, $sexo);
            $consulta -> bindParam(5, $data_nasc);
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
            echo "<script>alert('Registro Salvo');location.href='index.php?op=listas&pg=pessoa_fisica';</script>";
            exit;
        } else {
            echo "<script>alert('Erro ao Salvar');history.back();</script>";
            exit;

        }

    }

