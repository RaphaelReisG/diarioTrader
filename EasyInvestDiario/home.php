<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="estilo1.css" media="screen" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    

</head>
<body>

    <div id="app1" class="conteudo">
        <h1>Diario do Trader</h1>
        <div class="login" v-if="statusLogin[0]['status'] == false">
            <label>Login: </label>
            <input  type="email" name="login" placeholder="Digite seu e-mail"
                    v-model="statusLogin[0]['login']"
            >
            <br><br>
            <label>Senha: </label>
            <input  type="password" name="senha" placeholder="Digite sua senha"
                    v-model="statusLogin[0]['senha']"
            >
            <br><br>
            <button class="btLogin" v-on:click="validaLogin()">Entrar</button>
        </div>

        <div class="logado" v-if="statusLogin[0]['status'] == true">
            <label>{{statusLogin[0]['login']}}</label>
            <button class="btLogin" v-on:click="logout()">Sair</button>
        </div>

        <div class="tabInvestimento" v-if="statusLogin[0]['status'] == true">
            <table>
                <tr>
                    <th v-for='dado in cabecalhoDiario'>{{dado.titulo}}</th>
                    <th><i class="material-symbols-outlined">settings</i></th>
                </tr>
                
                <tr v-for='(dado, index) in dadosDiario' >
                    <div>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(0,index,'data'+index)">
                            <div v-if="cabecalhoDiario[0]['edicao'] != index">{{dado.data}}</div>
                            <input id="" type="date" v-bind:id="'data'+index" v-else v-model="dado.data" v-on:blur="alterado(0)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(0,index,'data'+index)">
                            <div v-if="cabecalhoDiario[0]['edicao'] != index">{{dado.data}}</div>
                            <input id="" type="date" v-bind:id="'data'+index" v-else v-model="dado.data" v-on:blur="alterado(0)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(1,index,'registro'+index)">
                            <div v-if="cabecalhoDiario[1]['edicao'] != index">{{dado.registro}}</div>
                            <select id="" v-bind:id="'registro'+index" v-else v-model="dado.registro" v-on:blur="alterado(1)">
                                <option  value="Compra" >Compra</option>
                                <option  value="Venda" >Venda</option>
                            </select>
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(1,index,'registro'+index)">
                            <div v-if="cabecalhoDiario[1]['edicao'] != index">{{dado.registro}}</div>
                            <select id="" v-bind:id="'registro'+index" v-else v-model="dado.registro" v-on:blur="alterado(1)">
                                <option  value="Compra" >Compra</option>
                                <option  value="Venda" >Venda</option>
                            </select>
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(2,index,'qtd'+index)">
                            <div v-if="cabecalhoDiario[2]['edicao'] != index">{{dado.qtd}}</div>
                            <input type="number" id="" v-bind:id="'qtd'+index" v-else v-model="dado.qtd" v-on:blur="alterado(2)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(2,index,'qtd'+index)">
                            <div v-if="cabecalhoDiario[2]['edicao'] != index">{{dado.qtd}}</div>
                            <input type="number" id="" v-bind:id="'qtd'+index" v-else v-model="dado.qtd" v-on:blur="alterado(2)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(3,index,'pontos'+index)">
                            <div v-if="cabecalhoDiario[3]['edicao'] != index">{{dado.pontos}}</div>
                            <input type="number" id="" v-bind:id="'pontos'+index" v-else v-model="dado.pontos" v-on:blur="alterado(3)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(3,index,'pontos'+index)">    
                            <div v-if="cabecalhoDiario[3]['edicao'] != index">{{dado.pontos}}</div>
                            <input type="number" id="" v-bind:id="'pontos'+index" v-else v-model="dado.pontos" v-on:blur="alterado(3)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(4,index,'resultado'+index)">
                            <div v-if="cabecalhoDiario[4]['edicao'] != index">R$ {{dado.resultado}}</div>
                            <input type="number" id="" v-bind:id="'resultado'+index" v-else v-model="dado.resultado" v-on:blur="alterado(4)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(4,index,'resultado'+index)">
                            <div v-if="cabecalhoDiario[4]['edicao'] != index">R$ {{dado.resultado}}</div>
                            <input type="number" id="" v-bind:id="'resultado'+index" v-else v-model="dado.resultado" v-on:blur="alterado(4)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(5,index,'entrada'+index)">
                            <div v-if="cabecalhoDiario[5]['edicao'] != index">{{dado.entrada}}</div>
                            <input id="" type="time" v-bind:id="'entrada'+index" v-else v-model="dado.entrada" v-on:blur="alterado(5)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(5,index,'entrada'+index)">
                            <div v-if="cabecalhoDiario[5]['edicao'] != index">{{dado.entrada}}</div>
                            <input id="" type="time" v-bind:id="'entrada'+index" v-else v-model="dado.entrada" v-on:blur="alterado(5)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(6,index,'saida'+index)">
                            <div v-if="cabecalhoDiario[6]['edicao'] != index">{{dado.saida}}</div>
                            <input id="" type="time" v-bind:id="'saida'+index" v-else v-model="dado.saida" v-on:blur="alterado(6)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(6,index,'saida'+index)">
                            <div v-if="cabecalhoDiario[6]['edicao'] != index">{{dado.saida}}</div>
                            <input id="" type="time" v-bind:id="'saida'+index" v-else v-model="dado.saida" v-on:blur="alterado(6)">
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(7,index,'setup'+index)">
                            <div v-if="cabecalhoDiario[7]['edicao'] != index">{{dado.setup}}</div>
                            <select id="" v-bind:id="'setup'+index" v-else v-model="dado.setup" v-on:blur="alterado(7)">
                                <option  value="Agressão" >Agressão</option>
                                <option  value="Rompimento" >Rompimento</option>
                                <option  value="Abertura" >Abertura</option>
                                <option  value="Fluxo" >Fluxo</option>
                                <option  value="Ajuste" >Ajuste</option>
                                <option  value="Erro Operacional" >Erro Operacional</option>
                                <option  value="Principe" >Principe</option>
                                <option  value="Martelo" >Martelo</option>
                                <option  value="Estrela" >Estrela</option>
                            </select>
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(7,index,'setup'+index)">
                            <div v-if="cabecalhoDiario[7]['edicao'] != index">{{dado.setup}}</div>
                            <select id="" v-bind:id="'setup'+index" v-else v-model="dado.setup" v-on:blur="alterado(7)">
                                <option  value="Agressão" >Agressão</option>
                                <option  value="Rompimento" >Rompimento</option>
                                <option  value="Abertura" >Abertura</option>
                                <option  value="Fluxo" >Fluxo</option>
                                <option  value="Ajuste" >Ajuste</option>
                                <option  value="Erro Operacional" >Erro Operacional</option>
                                <option  value="Principe" >Principe</option>
                                <option  value="Martelo" >Martelo</option>
                                <option  value="Estrela" >Estrela</option>
                            </select>
                        </td>
                        <td v-if="dado.resultado >= 0" class="ganho" v-on:dblclick="alterar(8,index,'emocao'+index)">
                            <div v-if="cabecalhoDiario[8]['edicao'] != index">{{dado.emocao}}</div>
                            <input id="" type="text" v-bind:id="'emocao'+index" v-else v-model="dado.emocao" v-on:blur="alterado(8)">
                        </td>
                        <td v-else class="perda" v-on:dblclick="alterar(8,index,'emocao'+index)">
                            <div v-if="cabecalhoDiario[8]['edicao'] != index">{{dado.emocao}}</div>
                            <input id="" type="text" v-bind:id="'emocao'+index" v-else v-model="dado.emocao" v-on:blur="alterado(8)">
                        </td>

                        <td class="botao">
                            <button  v-on:click="excluir(index)"><?php include "icones/lixeira.svg"; ?></button>
                        </td>
                    </div>
                </tr>
                
                <tr>
                    <td v-for='dados in cabecalhoDiario'>
                        <select v-if="dados.tipo == 'select'" v-model="dados.modelo" >
                                <option v-for="opcao in dados.option" value="" v-bind:value="opcao">{{opcao}}</option>
                        </select>
                        <input  v-else
                                type="" v-bind:type="dados.tipo"  
                                v-model="dados.modelo" 
                        >
                    </td>
                    <td class="botao"><button v-on:click="addLinha">+</button></td>
                </tr>
            </table>
        </div>
    </div>
</body>
<script src="vueScript.js"></script>
</html>