"use strict";

const app = new Vue({
  el: "#app",
  data(){
    return{
    quadro: {"title": "Введите курс"},
    cards: [],
    quadroinfo:[],  
    newCardName: "",
    mover: false,
    movedTarefa: {},
    movedCard: {},
    qualTarefaMover: {},
    idCard: 0,
    idTarefa: 0,
    minif: false,
    editQuadroTitle: false,
    response:'',
    }
  },
  mounted(){
    this.montar()
  },

  methods:{
   
  
    newCard(){
      if(!this.newCardName == ''){
      this.cards.push({
        "id": this.cards.length,
        "name": this.newCardName,
        "tarefas" : [],
        "novaTarefa": null,
        "icon": "fas fa-clipboard-list",
        "delete": true,
        "edit": false
      })
      this.newCardName = ""
      }
    },
    newTarefa(card){
      const id = this.cards.indexOf(card)
      var finalizadoT = false
      if(card.id === 0 ){
        finalizadoT = true
      }
      if(!this.cards[id].novaTarefa == ''){
      this.cards[id].tarefas.push({
        "id": this.cards[id].tarefas.length,
        "name": this.cards[id].novaTarefa,
        "finalizado" : finalizadoT,
        "moved": false
      })
      this.cards[id].novaTarefa = ""
      }
    },
    deleteTarefa(tarefa, card){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      this.cards[idCard].tarefas.splice(idTarefa, 1)
    },
    upTarefa(tarefa, card){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      var anterior = this.cards[idCard].tarefas[idTarefa - 1].name
      var eu = this.cards[idCard].tarefas[idTarefa].name
      const anteriorFinalizado = this.cards[idCard].tarefas[idTarefa - 1].finalizado
      const euFinalizado = this.cards[idCard].tarefas[idTarefa].finalizado

      this.cards[idCard].tarefas[idTarefa - 1].name = eu
      this.cards[idCard].tarefas[idTarefa].name = anterior
      this.cards[idCard].tarefas[idTarefa - 1].finalizado = euFinalizado
      this.cards[idCard].tarefas[idTarefa].finalizado = anteriorFinalizado
      this.cards[idCard].tarefas[idTarefa].moved = true
      this.cards[idCard].tarefas[idTarefa - 1].moved = true
      setTimeout(() => this.cards[idCard].tarefas[idTarefa].moved = false , 500);
      setTimeout(() => this.cards[idCard].tarefas[idTarefa - 1].moved = false , 500);
    },
    downTarefa(tarefa, card){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      const anteriorName = this.cards[idCard].tarefas[idTarefa + 1].name
      const euName = this.cards[idCard].tarefas[idTarefa].name
      const anteriorFinalizado = this.cards[idCard].tarefas[idTarefa + 1].finalizado
      const euFinalizado = this.cards[idCard].tarefas[idTarefa].finalizado
      

      this.cards[idCard].tarefas[idTarefa + 1].name = euName
      this.cards[idCard].tarefas[idTarefa].name = anteriorName
      this.cards[idCard].tarefas[idTarefa + 1].finalizado = euFinalizado
      this.cards[idCard].tarefas[idTarefa].finalizado = anteriorFinalizado
      this.cards[idCard].tarefas[idTarefa + 1].moved = true
      this.cards[idCard].tarefas[idTarefa].moved = true
      setTimeout(() => this.cards[idCard].tarefas[idTarefa].moved = false , 1000);
      setTimeout(() => this.cards[idCard].tarefas[idTarefa + 1].moved = false , 1000);
    },
    deleteCard(card){
      const idCard = this.cards.indexOf(card)
      this.cards.splice(idCard, 1)
    },
    concluido(card, tarefa){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      const tarefaFinalizada = this.cards[idCard].tarefas[idTarefa]
      if(this.cards[idCard].tarefas[idTarefa].finalizado){
        this.cards[idCard].tarefas[idTarefa].finalizado = false
        this.cards[idCard].tarefas.splice(idTarefa, 1)
        this.cards[1].tarefas.push(tarefaFinalizada)
        this.mover = false
      } else{
        this.cards[idCard].tarefas[idTarefa].finalizado = true
        this.cards[idCard].tarefas.splice(idTarefa, 1)
        this.cards[0].tarefas.push(tarefaFinalizada)
        this.mover = false
      }
    },
    move(card, tarefa){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      this.movedTarefa = tarefa
      this.movedCard = card
      this.idTarefa = idTarefa
      this.idCard = idCard
      this.qualTarefaMover = this.cards[idCard].tarefas[idTarefa]
      this.mover = true
    },
    movendo(card){
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(this.idTarefa)
      this.cards[this.idCard].tarefas.splice(this.idTarefa, 1)
      this.mover = false
      if(idCard !== 0){
        this.qualTarefaMover.finalizado = false
      } else{
        this.qualTarefaMover.finalizado = true
      }
      this.cards[idCard].tarefas.push(this.qualTarefaMover)
    },
    cancelMover(){
      this.mover = false
    },
    mini(){
      if(this.minif){
        this.minif = false
      } else{
        this.minif = true
      }
    },
    editQuadroName(){
      this.editQuadroTitle = true

    },
    cancelQuadroTitle(){
      this.editQuadroTitle = false
      if(this.quadro.title=='Списки подгрупп 1-го курса'){
        this.quadroinfo.push({
          "id":1,
          "year":2019,
          "name":'1 курс',
        })
      }
      if(this.quadro.title=='Списки подгрупп 2-го курса'){
        this.quadroinfo.push({
          "id":2,
          "year":2018,
          "name":'2 курс',   
        })
      }
      if(this.quadro.title=='Списки подгрупп 3-го курса'){
        this.quadroinfo.push({
          "id":3,
          "year":2017,
          "name":'3 курс',
        })
      }
    },
    cancelEditCard(card){
      const idCard = this.cards.indexOf(card)
      this.cards[idCard].edit = false
    },
    editTitleCard(card){
      const idCard = this.cards.indexOf(card)
      if(idCard > 2){
      this.cards[idCard].edit = true
      console.log(idCard)
      }
    },
    clone({ name }) {
      return { name, id: idGlobal++ };
    },
    pullFunction() {
      return this.controlOnStart ? "clone" : true;
    },  
    start({ originalEvent }) {
      this.controlOnStart = originalEvent.ctrlKey;
    },
    
    check(){
      let print=JSON.stringify(app.$data);
      
      axios.post('data.php',print)
      .then(response=>{
        console.log(response);
      })
      .catch(error=>{
        console.log(error);
      })
    },
    

  },

  
});













/*  sendData:function(){
      let StudentsData= app.toFormData(app.quadroinfo);
      const options={
        method: 'POST',
        headers:{ 'content-type': 'application/form-data' },
        data: personForm,
        url: 'data.php'
      }
    
    axios(options)
    .then( function(response) {
        console.log(response.data)
    })
    .catch(err => console.log(err))
  },
    toFormData:function(obj){
      let formData=new FormData();
      for(let key in obj){
        formData.append(key,obj[key]);
      }
      return formData;
    }*/
