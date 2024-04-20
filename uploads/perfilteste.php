<?php
session_start();
    require "conexao.php";

    $id = $_SESSION['id_dono'];

    $select =  "SELECT * FROM cliente WHERE id_cliente='$id'";
    $conn = mysqli_query($conexao , $select);

    $raw = mysqli_fetch_assoc($conn);

    
    $nome = trim($raw['nome']);
    $nome_ex = explode(" ", $nome);

    $_SESSION['nome'] = strtoupper($nome_ex[0]);
    $_SESSION['rua'] = $raw['logradouro'];
    $_SESSION['bairro'] = $raw['bairro'];
    $_SESSION['numero'] = $raw['numero'];
    $_SESSION['imagemPerfil'] = $raw['imagem'];
    $_SESSION['cidade'] = $raw['cidade'];
    $_SESSION['estado'] = $raw['estado'];
    $_SESSION['cep'] = $raw['cep'];
    $_SESSION['telefone'] = $raw['telefone'];
    $_SESSION['celular'] = $raw['telefoneFixo'];

    $_SESSION['nomeCompleto'] = $raw['nome'];
    $_SESSION['referencias'] = $raw['referencias'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/perfil.css">
    <link rel="shortcut icon" href="assets/img/pata.png" type="image/x-icon">

    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
-->
    
    <title>MEU PERFIL</title>
</head>
<body>

    <main>

        <div class="contener">
            
            <div class="coluna">


                <div class="perfil">

                    <div class="foto-perfil">
                        <img src="<?=$_SESSION['imagemPerfil'];?>" width="90px" style="border-radius: 50%;display: block;" alt="SEM FOTO">
                        <button class="btn-editar" onclick="openModal1()">Editar</button>
                    </div>
    
                    <div class="nome-perfil">
    
                        <div class="comp-nome">
                            <h1 class="nome">OLÁ, <?=$_SESSION['nome'];?>!</h1>
                        </div>
    
                        
                    </div>
    
                </div>
    
    
                    
                <div class="endereco">
    
                        <div class="box">

                            <div class="comp-rua">
                                <p>Rua:<?=$_SESSION['rua'];?></p>
                            </div>

                            <div class="comp-cidade">
                                <p>Cidade:<?=$_SESSION['cidade'];?></p>
                            </div>

                            <div class="comp-estado">
                                <p>Estado:<?=$_SESSION['estado'];?></p>
                            </div>

                            <div class="comp-bairro">
                                <p>Bairro: <?=$_SESSION['bairro'];?></p>
                            </div>

                            <div class="comp-number">
                                <p>Número: <?=$_SESSION['numero'];?>    </p>
                            </div>

                            <div class="comp-editar">
                                <button class="btn-editar2" onclick="openModal()">Editar</button>
                            </div>



                            
                            <div class="comp-mostrar">
                                <div class="switch__container">
                                    <input id="switch-shadow" class="switch switch--shadow" type="checkbox" />
                                    <label for="switch-shadow"></label>
                                </div>
                                <div class="balao" id="balao">Deixe marcado para mostrar seu endereço quando alguém encontrar seu pet.</div>
                                <span style="margin-left: 7px; display: flex; align-items: center;">Mostrar</span><img src="assets/img/ponto-de-interrogacao.png"  id="duvida" class="duvida">
                            </div>

                        </div>
    
                        <div class="box">

                            <div class="comp-nome">
                                <p>Nome: <?=$_SESSION['nomeCompleto'];?></p>
                            </div>

                            <div class="comp-tel">
                                <p>Tel: <?=$_SESSION['telefone'];?> </p>
                            </div>

                            <div class="comp-celular">
                                <p>Cel: <?=$_SESSION['celular'];?></p>
                            </div>

                            <div class="comp-referencias">
                                <p>Referências:<?=$_SESSION['referencias'];?></p>
                            </div>

                            <div class="comp-editar">
                                <button class="btn-editar2" onclick="openModal2()">Editar</button>
                            </div>

                            <div class="comp-mostrar1">
                                <div class="switch2__container">
                                    <input id="switch-shadow2" class="switch2 switch--shadow2" type="checkbox" />
                                    <label for="switch-shadow2"></label>
                                </div>
                                <div class="balao" id="balao">Deixe marcado para mostrar seu endereço quando alguém encontrar seu pet.</div>
                                <span style="margin-left: 7px; display: flex; align-items: center;">Mostrar</span><img src="assets/img/ponto-de-interrogacao.png"  id="duvida" class="duvida">
                            </div>

                            
                            <div class="comp-meus-pets">


                                <?php

                                    $select=" SELECT  p.* 
                                              
                                              FROM pet p JOIN cliente c ON p.fk_cliente_id_cliente = c.id_cliente 
                                              
                                              WHERE id_cliente='$_SESSION[id_dono]'";
                                    
                                    $conn = mysqli_query($conexao , $select);

                                    echo "<div class='coluna'>";
                                    while($registro = mysqli_fetch_array($conn)){
                                        
                                        
                                        echo "

                                        
                                            <div class='nome-pet'>
                                                <img src='img_dono/1699398158.jpg' width='50px' style='border-radius: 50%;' alt=''>
                                                <p>MEL</p>
                                            </div>
                
                                            <div class='ver'>
                                                <a href='meusPets.php' class='btn-ver-mais'>Ver Pet</a>
                                            </div>
                                       
                                        ";

                                    }

                                    echo " </div>";
                                ?>

                                


                                
                                
    
                            </div>
                            

                        </div>    

                        


    
                </div> 


            </div>

             

        </div>

        

        <div id="modal-container" class="modal-container">
            <div class="modal">
                <button class="fechar" id="fechar">X</button>
                <form action="editar-endereco-dono.php" method="post">

                    <input type="text" name="cep" id="cep" value="<?=$_SESSION['cep'];?>">

                    <input type="text" name="rua" id="rua" value="<?=$_SESSION['rua'];?>">

                    <input type="text" name="bairro" id="bairro" value="<?=$_SESSION['bairro'];?>">

                    <input type="text" name="numero" id="numero" value="<?=$_SESSION['numero'];?>">

                    <input type="text" name="cidade" id="cidade" value="<?=$_SESSION['cidade'];?>">

                    <div class="comp-uf" class="comp-geral">
                        <select id="uf" name="uf" class="comp-geral">
                            <option selected><?=$_SESSION['estado'];?></option>
                            <option value="Acre">Acre</option>
                            <option value="Alagoa">Alagoas</option>
                            <option value="Amapá">Amapá</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Bahia">Bahia</option>
                            <option value="Ceará">Ceará</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Espírito Santo">Espírito Santo</option>
                            <option value="Goiás">Goiás</option>
                            <option value="Maranhão">Maranhão</option>
                            <option value="Mato Grosso">Mato Grosso</option>
                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                            <option value="Minas Gerais">Minas Gerais</option>
                            <option value="Pará">Pará</option>
                            <option value="Paraíba">Paraíba</option>
                            <option value="Paraná">Paraná</option>
                            <option value="Pernambuco">Pernambuco</option>
                            <option value="Piauí">Piauí</option>
                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                            <option value="Rondônnia">Rondônia</option>
                            <option value="Roraima">Roraima</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="São Paulo">São Paulo</option>
                            <option value="Sergipe">Sergipe</option>
                            <option value="Tocantins">Tocantins</option>
                            <option value="Estrangeiro">Estrangeiro</option>
                        </select>
                    </div>

                    
                    
                    <input type="submit" value="Editar">

                </form>
            </div>
        </div>

        <div id="modal-container1" class="modal-container1">
            <div class="modal1">
                <button class="fechar1" id="fechar1">X</button>
                
                <!--parte necessaria 
                <form action="perfil.php" method="post" enctype="multipart/form-data">

                 
                            <div id="preview"></div>
                    
                    
                            <input type="file" name="FOTOA" id="FOTOA">
                            <div class="btns">
                                <div class="btn1">
                                    <label for="FOTOA">Escolher</label>
                                </div>

                                <div class="btn2">
                                    <button type="submit" class="btn-upload-imagem">Enviar</button>
                                </div>
                               
                            </div>
                    </div>
                                   
                </form>
                                -->
            </div>
        </div>


        <div id="modal-container2" class="modal-container2">
            <div class="modal2">
                <button class="fechar2" id="fechar2">X</button>
                
            
                <form action="editar-dados-dono.php" method="post">

                    <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?=$_SESSION['nomeCompleto'];?>">

                    <input type="tel" name="tel" id="tel" value="<?=$_SESSION['telefone'];?>">

                    <input type="tel" name="cel" id="cel" value="<?=$_SESSION['celular'];?>">

                    <input type="text" name="referencia" id="referencia" value="<?=$_SESSION['referencias'];?>">

                    <input type="submit" value="editar">
                                   
                </form>

            </div>
        </div>



    
    </main>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>-->

    <script>

        function openModal(){
            const modal = document.getElementById('modal-container')
            modal.classList.add('mostrar')

            modal.addEventListener('click', (e) =>{
                if (e.target.id == 'modal-container' || e.target.id == "fechar"){
                    modal.classList.remove('mostrar')
                    localStorage.fechaModal = 'modal-container'
                }
            })
        }


        function openModal1(){
            const modal = document.getElementById('modal-container1')
            modal.classList.add('mostrar1')

            modal.addEventListener('click', (e) =>{
                if (e.target.id == 'modal-container1' || e.target.id == "fechar1"){
                    modal.classList.remove('mostrar1')
                    localStorage.fechaModal = 'modal-container1'
                }
            })
        }

        function openModal2(){
            const modal = document.getElementById('modal-container2')
            modal.classList.add('mostrar2')

            modal.addEventListener('click', (e) =>{
                if (e.target.id == 'modal-container2' || e.target.id == "fechar2"){
                    modal.classList.remove('mostrar2')
                    localStorage.fechaModal = 'modal-container2'
                }
            })
        }

    </script>


    <script src="assets/js/customCliente.js"></script>

</body>
</html>