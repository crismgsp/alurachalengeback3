<h1 align="center"><strong>Chalenge Backend 3 da Alura.</strong></h1>

Comecei o chalenge com uma noção muito pequena de PHP e já tinha tido algum contato com banco de dados(em outra área que eu trabalhava, mas com consultas simples).
 A minha intenção em participar do Chalenge é aprender mais (e colocar o php que já  aprendi até o momento em prática), é ter um contato com a área de backend e ver as dificuldades. Tenho muita curiosidade de fazer um deploy em uma aplicacao de forma que funcione direitinho igual funciona quando testo no computador.


<p align="center"><strong>O que tem neste projeto até este momento:</strong></p>

<strong>Tela inicial:</strong> onde o usuario acessa a pagina de  login para acessar outras telas<br>

<strong>Tela de login:</strong> Usuario digita login e senha, e os dados sao checados no banco de dados, se tiver tudo ok,e o status do usuario for 1, o login é efetuado, ainda falta desenvolver o logout pois está dando problema <br>

<strong>Tela de importacões:</strong>Ao fazer o login o usuario e direcionado para uma tela onde pode importar transacoes, por enquanto somente no formato csv, (ainda falta fazer a parte de validar os dados antes de importar). Ao importar estas tabelas elas vao para o banco de dados, onde também sao inseridos  horario e a data  de importação e o usuario logado em colunas especificas.<br>
Nesta mesma tela a pessoa pode acessar outras 2 telas, uma chama importacoesfeitas e outra chamada cadastrar usuarios.<br>
<strong>Tela de importacões feitas:</strong> Nesta tela da para ver as datas das transacoes e a data de importacao das importacoes que ja foram feitas, e na frente de cada tem um link, que quando o usuario clica, puxa os dados do banco de dados e mostra todas as colunas daquela transacao especifica.<br>
<strong>Cadastrar usuarios</strong> Nesta tela, tem um formulario, em que é possivel para o usuario logado, cadastrar outro usuario, digitando, nome, email, status e senha. Esta senha fica criptografada no banco de dados. Nesta página tambem tem um botão onde é possível acessar os usuários já cadastrados: tela usuarios cadastrados.<br>
<strong>Usuarios cadastrados</strong> Nesta tela aparecem todos os usuarios cadastrados, e há na frente de cada nome os botoes editar e excluir que levam para outras telas, no caso do editar é possivel editar nome, email e senha do usuario, e no caso do botao excluir é possivel mudar o status, se mudar de 1 para 2 o login fica inacessivel  para o usuario. O botao de excluir não envia para a tela de excluir caso o usuario seja o mesmo logado, pois ele mesmo não pode se excluir. (ainda preciso melhorar isso)


<p align="center"><strong>Ainda preciso aprender para este projeto:</strong></p>

<p><strong>Semana 1:</strong></p> 
Validação de dados antes de enviar para o banco de dados --> isto está sendo um desafio
Criar senhas de forma automatica e que fiquem armazenadas de forma criptografada no banco, e a senha deve ser enviada automaticamente para o usuario. <br>
<p><strong>Semana2:</strong></p> 
Falta resolver a questão do logout que não está funcionando. <br>
<p><strong>Semanas 3 e 4:</strong> </p> 
vou escrever depois que começar <br>



<p align="center"><strong>Ferramentas e linguagens utilizadas até agora:</strong></p>
<p><img src='/assets/imagens/php.png' alt="simbolo PHP criado por Freepik - Flaticon"/> PHP </p>
<p><img src='/assets/imagens/html.png' alt="simbolo HTML criado por Freepik - Flaticon"/> HTML </p>
<p><img src='/assets/imagens/css.png' alt="simbolo CSS criado por Freepik - Flaticon"/> CSS </p>
<p><img src='/assets/imagens/mariadb.png'alt="simbolo MariaDB"/> Banco de dados MariaDB </p>
<p><img src='/assets/imagens/phpmyadmin.png' alt=" Imagem relacionada a PHPMyAdmin"/>PHPMyAdmin (pra acessar o MariaDB)  </p>
<p><img src='/assets/imagens/vscode.png' alt="simbolo VSCODE"/> Visual Studio Code </p>
<p><img src='/assets/imagens/xampp.png' alt="simbolo XAMPP"/> XAMPP <br> </p>



<p>Referencias das imagens para credito:</p>
PHP -> https://www.flaticon.com/br/icones-gratis/php

HTML -> https://www.flaticon.com/free-icons/html

CSS -> https://www.flaticon.com/free-icons/css-3













