var app = new Vue({
    el: '#app1',
    data: {
        statusLogin: [{login: "", senha: "", status: false}],

        cabecalhoDiario: [
            {titulo: 'Data' ,tipo:'date', modelo: "", edicao: 'nada'},
            {titulo: 'Registro' ,tipo:'select', modelo: '', option: ['Compra', 'Venda'] , edicao: 'nada'},
            {titulo: 'QTD', tipo:'number', modelo: '' , edicao: 'nada'},
            {titulo: 'Pontos', tipo:'number', modelo: '' , edicao: 'nada'},
            {titulo: 'Resultado', tipo:'number', modelo: '' , edicao: 'nada'},
            {titulo: 'Entrada', tipo:'time', modelo: '' , edicao: 'nada'},
            {titulo: 'Saida', tipo:'time', modelo: '' , edicao: 'nada'},
            {titulo: 'Setup', tipo:'select', modelo: '', 
                option: ['Agressão', 'Rompimento', 'Abertura','Fluxo', 'Ajuste', 'Erro Operacional', 
                    'Principe', 'Martelo', 'Estrela'] , edicao: 'nada'},
            {titulo: 'Emoção', tipo:'text', modelo: '', edicao: 'nada'}
        ],

        dadosDiario: [
            {data: '22/02/2022', registro: 'Compra', 
                qtd: 10, pontos: 100, resultado: 100, 
                entrada: '12:00', saida: '13:00', 
                setup: 'Fluxo', emocao: 'Alegria' 
            },
            {data: '01/03/2022', registro: 'Compra', 
                qtd: 20, pontos: 100, resultado: -500, 
                entrada: '14:00', saida: '18:00', 
                setup: 'Rompimento', emocao: 'Tristeza' 
            },
            {data: '02/03/2022', registro: 'Venda', 
                qtd: 10, pontos: 200, resultado: 3,
                entrada: '10:00', saida: '10:30', 
                setup: 'Agressão', emocao: 'Raiva' 
            }
        ]
    },
    methods: {
        addLinha: function(){
            let j=0;
            if( this.cabecalhoDiario[0]['modelo'] != '' &&
                this.cabecalhoDiario[1]['modelo'] != '' &&
                this.cabecalhoDiario[2]['modelo'] != '' &&
                this.cabecalhoDiario[3]['modelo'] != '' &&
                this.cabecalhoDiario[4]['modelo'] != '' 
                ){
                    this.dadosDiario.push({
                        data: this.cabecalhoDiario[j++]['modelo'],
                        registro: this.cabecalhoDiario[j++]['modelo'],
                        qtd: this.cabecalhoDiario[j++]['modelo'],
                        pontos: this.cabecalhoDiario[j++]['modelo'],
                        resultado: this.cabecalhoDiario[j++]['modelo'],
                        entrada: this.cabecalhoDiario[j++]['modelo'],
                        saida: this.cabecalhoDiario[j++]['modelo'],
                        setup: this.cabecalhoDiario[j++]['modelo'],
                        emocao: this.cabecalhoDiario[j++]['modelo']
                        //opcoes: this.cabecalhoDiario[j++]['modelo']
                    });

                    for(j=0; j<=8; j++){
                        this.cabecalhoDiario[j]['modelo'] = '';
                    }
            }
            
        },
        addColuna: function(){

        },
        alterar(elemento, index, id){
            this.cabecalhoDiario[elemento]['edicao'] = index;
            //entrada = document.getElementById(id);
            //return entrada.focus();
        },
        alterado(elemento){
            this.cabecalhoDiario[elemento]['edicao'] = 'nada';
        },
        excluir(index){
            if(confirm("Tem certeza que deseja APAGAR a linha inteira?") == true){
                this.dadosDiario.splice(index, 1);
            }
        },
        validaLogin(){
            this.statusLogin[0]['status'] = true;
        },
        logout(){
            this.statusLogin[0]['status'] = false;
        }
    }
    
})
