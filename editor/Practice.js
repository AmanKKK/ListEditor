"use strict";

const app = new Vue({
  el: "#app",
  data(){
    return{
    quadro: {"title": "Введите курс"}, // переменная, хранящая название курса
    cards: [], //  таблицы со студентами
    quadroinfo:[], // данные о годе и курсе
    newCardName: "", 
    mover: false,
    movedTarefa: {}, // свойство для переноса данных с одной таблицы в другую
    movedCard: {},
    qualTarefaMover: {}, 
    idCard: 0,  
    idTarefa: 0, // id объекта в таблице
    minif: false,
    editQuadroTitle: false, // для внесения данных в блок "Введите курс"
    GetData:[],
    }
  },
  mounted(){
    axios
    .get('data1.php')
    .then(response=>(
      this.GetData=response.data,
      this.DOIT()
    )) 
  },
  methods:{ 
    DOIT(){
      for(let i=0; i<this.GetData['groupQTY'];i++){
      this.cards.push({
        "id":this.cards.length,
        "name":this.GetData[i]['name'],
        "tarefas":[], // массив хранящий объекты данной таблицы
        "navaTafera":null,
        "icon": "fas fa-clipboard-list",
        "delete": true,
        "edit": false 
      })
      for(let i1=0;i1<this.GetData[i]['amount'];i1++){
        
        let finalizadoT=false
        if(this.cards.id===0){
          finalizadoT=true;
        }
        this.cards[i].tarefas.push({
          "id":this.cards[i].tarefas.length,
          "name":this.GetData[i]['students'][i1]['first_name'],
          "finalizadoT":finalizadoT,
          "moved":false
          
        })
      }
      }
    },
   
    newCard(){
      if(!this.newCardName == ''){
      this.cards.push({
        "id": this.cards.length,
        "name": this.newCardName,
        "tarefas" : [], // массив хранящий объекты данной таблицы
        "novaTarefa": null,
        "icon": "fas fa-clipboard-list",
        "delete": true,
        "edit": false 
      })
      this.newCardName = ""
      }
    },
    newTarefa(card){ //создание блока с и/ф студента 
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
    deleteTarefa(tarefa, card){ //удаление блока со  студентом
      const idCard = this.cards.indexOf(card)
      const idTarefa = this.cards[idCard].tarefas.indexOf(tarefa)
      this.cards[idCard].tarefas.splice(idTarefa, 1)
    },
    upTarefa(tarefa, card){ //поднять блок со студентом в списке на одну еденицу вверх 
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
    downTarefa(tarefa, card){ //опустить блок студентом в списке на одну еденицу вниз 
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
    concluido(card, tarefa){ // добавление блока со студентом из одной таблицы в другую
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
    
    fetchData(){
      let print=JSON.stringify(app.$data);
      fetch('data.php',{
        method:'POST',
        headers:{
          'Content-Type':'application/json',
          'Accept':'application/json',
        },
        body:print,
      })
      .then(response=>console.log(response));
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
