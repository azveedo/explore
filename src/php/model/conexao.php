<?php
  
    class conexao

    {
        private $pdo;
        public function __construct($dbTurism, $host, $user, $senha){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbTurism.";host=".$host, $user, $senha);
                echo "conexao realizada com sucesso";
            }
            catch (PDOException $e){
                echo "ERRO DE CONEXÃO NO PDO: ".$e->getMessage();
            }
            catch (Exception $e){
                echo "ERRO não passou da conexão: ".$e->getMessage();
                exit();
            }
        }
    
        //usuario
        public function validaEmail ($nomeUs, $emailUs, $senhaUS, $telefoneUs, $paisUS, $estadoUs, $cidadeUs, $ruaUS, $bairroUS, $numeroUS)
        {
            $validaEmail = $this->pdo->prepare("select idUser from usuario where emailUser=:e");
            $validaEmail->bindValue(":e", $emailUs);
            $validaEmail->execute();
            
            if ($validaEmail->rowCount()>0) {
                
                echo ($emailUs);

            }
            else
            {
                $this->insereUser($nomeUs, $emailUs, $senhaUS, $telefoneUs, $paisUS, $estadoUs, $cidadeUs, $ruaUS, $bairroUS, $numeroUS);
                echo "<script>alert('Cadastrado com sucesso!')</script>";
            }
        }

        public function insereUser($nomeUs, $emailUs, $senhaUS, $telefoneUs, $paisUS, $estadoUs, $cidadeUs, $ruaUS, $bairroUS, $numeroUS)
        {
            $insereUser = $this->pdo->prepare("insert into usuario (nomeUser ,emailUser, senhaUser, telefoneUser, paisUser, estadoUser, cidadeUser, ruaUser, bairroUser, numeroUser) 
            values (:n, :e, :s, :t, :p, :est, :c, :r, :b, :num)");
            
            $insereUser->bindValue(":n", $nomeUs);
            $insereUser->bindValue(":e", $emailUs);
            $insereUser->bindValue(":s", $senhaUS);
            $insereUser->bindValue(":t", $telefoneUs);
            $insereUser->bindValue(":p", $paisUS);
            $insereUser->bindValue(":est", $estadoUs);
            $insereUser->bindValue(":c", $cidadeUs);
            $insereUser->bindValue(":r", $ruaUS);
            $insereUser->bindValue(":b", $bairroUS);
            $insereUser->bindValue(":num", $numeroUS);
            $insereUser->execute();
        }

        public function logarUser ($emailUs, $senhaUS)
        {
            $validaLogin = $this->pdo->prepare("select idUser from usuario
            where emailUser = :e and senhaUser = :s");

            $validaLogin->bindValue(":e", $emailUs);
            $validaLogin->bindValue(":s", $senhaUS);
            $validaLogin->execute();

            if($validaLogin->rowCount()>0)
            {
                $emailUs=$validaLogin->fetch();
                session_start();
                $_SESSION['idAcesso']=$emailUs['idUser'];
                return true;

            } 
            else
            {

                return false;

            }
        }

        //contatos
          public function insereContato($nomeCt, $emailCt, $telefoneCt, $mensagemCt, $idPrograma, $idUnidade)
          {
              $insereContato = $this->pdo->prepare("insert into contato (nomeContato, emailContato, telefoneContato, mansagemContato, idPrograma, idUnidade)
              values (:n, :e, :t, :m, :idp, :idu");

              $insereContato->bindValue(":n", $nomeCt);
              $insereContato->bindValue(":e", $emailCt);
              $insereContato->bindValue(":t", $telefoneCt);
              $insereContato->bindValue(":m", $mensagemCt);
              $insereContato->bindValue(":idp", $idPrograma);
              $insereContato->bindValue(":idu", $idUnidade);
              $insereContato->execute();
          }

          //unidades
          public function insereUnidades($nomeSede, $telefoneSede, $paisSede, $estadoSede, $cidadeSede, $bairroSede, $ruaSede, $numeroSede)
          {
              $insereUnidades = $this->pdo->prepare("insert into unidades (nomeSede, telefoneSede, paisSede, estadoSede, cidadeSede, bairroSede, ruaSede, numeroSede)
              values (:n, :t, :p, :e, :c, :b, :r, :n");

              $insereUnidades->bindValue(":n ", $nomeSede);
              $insereUnidades->bindValue(":t ", $telefoneSede);
              $insereUnidades->bindValue(":p ", $paisSede);
              $insereUnidades->bindValue(":e ", $estadoSede);
              $insereUnidades->bindValue(":c ", $cidadeSede);
              $insereUnidades->bindValue(":b ", $bairroSede);
              $insereUnidades->bindValue(":r ", $ruaSede);
              $insereUnidades->bindValue(":n ", $numeroSede);
              $insereUnidades->execute();
          }

          //progama intercambio
          public function inserePrograma($destino, $duracao, $tipoAcomodacao, $preco)
          {
              $inserePrograma = $this->pdo->prepare("insert into programaIntercambio (destino, duracao, tipoAcomodacao, preco)
              values (:dt, :d, :ta, :p");

              $insereUnidades->bindValue(":dt ", $destino);
              $insereUnidades->bindValue(":d ", $duracao);
              $insereUnidades->bindValue(":ta ", $tipoAcomodacao);
              $insereUnidades->bindValue(":p ", $preco);
              $insereUnidades->execute();
          }

          //avaliação
          public function insereAvaliacao($nota, $comentario, $data, $idPrograma, $idUser)
          {
              $insereAvaliacao = $this->pdo->prepare("insert into avaliacoes (nota, comentario, dataAvaliacao, idPrograma, idUser)
              values (:n, :c, :d, :idp, :idu");

              $insereAvaliacao->bindValue(":n ", $nota);
              $insereAvaliacao->bindValue(":c ", $comentario);
              $insereAvaliacao->bindValue(":d ", $data);
              $insereAvaliacao->bindValue(":idp ", $idPrograma);
              $insereAvaliacao->bindValue(":idu ", $idUser);
              $insereAvaliacao->execute();
          }

          //reservas
          public function insereReserva($dataInicio, $dataFim, $precoTotal, $idPrograma, $idUser)
          {
              $insereReserva = $this->pdo->prepare("insert into reservas (dataInicio, dataFim, precoTotal, idPrograma, idUser)
              values (:dI, :dF, :p, idp, :idu");

              $insereReserva->bindValue(":dI ", $dataInicio);
              $insereReserva->bindValue(":dF ", $dataFim);
              $insereReserva->bindValue(":p ", $precoTotal);
              $insereReserva->bindValue(":idp ", $idPrograma);
              $insereReserva->bindValue(":idu ", $idUser);
              $insereReserva->execute();
          }

          pagamentos
          public function inserePagamento($valor, $metodoPagamento, $data, $idReserva)
          {
              $inserePagamento = $this->pdo->prepare("insert into pagamentos (valor, metodoPagamento, dataPagamento, idReserva)
              values (:v, :mP, :d, :idr");

              $inserePagamento->bindValue(":v ", $valor);
              $inserePagamento->bindValue(":mP ", $metodoPagamento);
              $inserePagamento->bindValue(":d ", $data);
              $inserePagamento->bindValue(":idr ", $idReserva);
              $inserePagamento->execute();
          }

      }
 ?>