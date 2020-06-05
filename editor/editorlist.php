<?php
 require_once "connection/connection.php";
?>
<!DOCTYPE HTML>
<html>
<!--стадия интеграции STTABLE-->
 <head>
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="Practice.css">
  <script src="https://kit.fontawesome.com/261f20d232.js" crossorigin="anonymous"></script>
  <style scoped>
.body-table{
    width: 100%;
    height: 100%;
    margin: 0 !important;
    padding: 0 !important;
    border-collapse: collapse;
}

.body-table-tr{
    margin: 0 !important;
    padding: 0 !important;
}

.body-table-td{

    margin: 0 !important;
    padding: 0 !important;
}

.body-table-td-border{
    margin: 0 !important;
    padding: 0 !important;
    width: 25%;
    min-width: 15% !important;
}

.body-table-td-content{
    width: 1025px;
    /*Удалить*/
    min-width: 1025px;
    height: 100%;
    background-color: #ffffff;
    margin: 0 !important;
    padding: 10pt !important;
    font-family:Arial Narrow,Trebuchet MS,Arial,Verdana,Tahoma;
    font-size:12pt;
}

.image-text-block{
    position: relative;
    display: inline-block;
    font-family: Arial Narrow,Trebuchet MS,Arial,Verdana,Tahoma;
}

.menu{
    
    margin-left: 10px;
    font-size: 15px;
    font-family:Arial Narrow,Trebuchet MS,Arial,Verdana,Tahoma;
}

.image-text{
    position: absolute;
    z-index: 2;
}

.text-spec{
    left: 86px;
    top: 110px;
    font-size: 13px;    
}

.text-kaf{
    left: 31px;
    top: 130px;
    font-size: 13px;
}

.text-inst{
    left: -31px;
    top: 33px;
    text-align: right;
    font-size: 13px;
    
}

.text-email{
    top: 5px;
    text-align: center;
    font-size: 13px !important;
}

.edit-button {
    background: url(../images/edit.png) no-repeat center center; 
    border: 1px solid gray; 
    border-radius: 2px;
}
.edit-button:hover{
    box-shadow: 0px 0px 2px #000;
}
.edit-button:active{
    box-shadow: 0px 0px 1px #000;
}
    
.delete-button {
    background: url(../images/delete.png) no-repeat center center; 
    border: 1px solid gray; 
    border-radius: 2px;
}
.delete-button:hover{
    box-shadow: 0px 0px 2px #000;
}
.delete-button:active{
    box-shadow: 0px 0px 1px #000;
}

.hide-button {
    background: url(../images/hide.png) no-repeat center center; 
    border: 1px solid gray; 
    border-radius: 2px;
}
.hide-button:hover{
    box-shadow: 0px 0px 2px #000;
}
.hide-button:active{
    box-shadow: 0px 0px 1px #000;
}

.show-button {
    background: url(../images/show.png) no-repeat center center; 
    border: 1px solid gray; 
    border-radius: 2px;
}
.show-button:hover{
    box-shadow: 0px 0px 2px #000;
}
.show-button:active{
    box-shadow: 0px 0px 1px #000;
}

.flat-text{
    border: solid 1px #939494;
    border-radius: 2px;
    margin-top: 1px;
    margin-bottom: 1px;
  
    margin-right:20px;
    
}

.flat-button{
    border: solid 1px #939494;
    font-size:15px;
    border-radius: 2px;
    background-color: #e8e8e8;
    margin-top: 1px;
    margin-bottom: 1px;
   
    margin-right:20px;
    display:inline-block;
    
}

.flat-button:hover{
    box-shadow: 0px 0px 2px #000;
}
.flat-button:active{
    box-shadow: 0px 0px 1px #000;
}
root { 
    display: block;
}

#main{
    margin: 0px auto;
    width: 200px;
}
.btn{
    border:2px solid rgb(170, 169, 169);
    background-color:rgb(247, 155, 80);
    border-radius: 8px;
}
.airplane{
  position: absolute;
  margin-left:952px;
  margin-top: 1px;
 
}
.UniName{
  font-size:13px;
  font-family:  Arial Narrow,Trebuchet MS,Arial,Verdana,Tahoma;;
  position: absolute;
  display: inline-block;
  margin-top:110px;
  margin-left:280px;
}

.base-block {clear:both; float:left; padding:10px 10px 10px 10px;}
.title-lable {clear:both; float:left; font-weight: bold; padding: 0px 0px 5px 0px;}
.secondary-block {clear:both; float:left; padding: 0px 0px 0px 5px;}
.field {clear:both; text-align:right; line-height:25px; float:left; padding: 2px 0px 2px 0px}
.intable-field {clear:both; text-align:right; line-height:25px; float:left;}
.free-label {float:left; clear:both;}
.message {clear:both; float:left; font-style: italic !important;}

table.my-table {border-collapse:collapse !important; }
td.my-td {padding: 5px 5px 5px 0px !important;}
tr.underlined {border-bottom: 1 solid black !important;}

a.arrow:link{color:black;}
a.arrow:visited{color:black;}
a.arrow{text-decoration: none;}


  </style>
    
 </head>

 <body>
  <table class="body-table">   
    <tr class="body-table-tr" style=" position:relative;">                                                                                                       
        <td colspan="2" class="body-table-td" style="width: 1476px;height: 164px;background-image: url(http://vega.fcyb.mirea.ru/images/h-c.png);"> 
            <div class="image-text-block">
                <a href="/index.php"><img style="width: 531px; height: 164px;" src="images/h-lE.png"></a>
                <p class="image-text text-spec">Направление &laquo;Прикладная математика и информатика&raquo;</p>
                <p class="image-text text-kaf">Кафедра программного обеспечения систем радиоэлектронной аппаратуры<br>
                при АО &laquo;Концерн &laquo;Вега&raquo;</p>
            </div>
            
            
        </td> 
        <!--////////////////////ПРОБЛЕМНЫЙ УЧАСТОК///////////////////////-->
       
        <!--//////////////////////КОНЕЦ ПРОБЛЕМНОГО УЧАТСКА//////////////////-->
          <!-- <td class="body-table-td" style="max-width: 16px; width: 16px;background-color: #c0c0c0;"></td> -->
    </tr>
        <div class="airplane">
            <div class="UniName">
                <p>МИРЭА - Российский технологический </p>
                <p>университет</p>
                <p>Институт Кибернетики</p>
                
            </div>
            <img src="images/h-rE.png" width="531px" height="234px">

        </div>
        <td colspan="2" class="body-table-td" valign=middle style="height: 70px; background-color: #ffffff;">
            <div class="menu">
                <a href="/about.php">О кафедре</a> | <a href="/appmath.php">О прикладной математике</a> | <a href="/disc.php">Дисциплины</a> | <a href="/vega.php">О Концерне</a>
            </div>
             <!--  <td class="body-table-td" style="max-width: 16px; width: 16px;background-color: #c0c0c0;"></td> -->
         </td> 
    </tr>
    <tr class="body-table-tr" > 
        <td colspan="2" class="body-table-td" valign=middle style="height:35px; background-color: #ffffff;"> 
        
        
        
        
           </td> <!-- <td class="body-table-td" style="max-width: 16px; width: 16px;background-color: #c0c0c0;"></td> -->
        </td> 
    </tr>
    <tr class="body-table-tr"> 
        <td colspan="2" valign=top class="body-table-td-content">

  <!--         LIST'S START           --> 
  <div class="groups">
  <div id="app">
    <div v-for="data in GetData">
        {{data}}

    </div>


      <button @click="fetchData"
              class="btn"
              style="
                    margin-left:30px;
                    margin-bottom:20px;
                    "
      >
        Сохранить
        <i class="fas fa-save"></i>   
    </button>
  <div class="dash" v-bind:class="{mini: !minif}">
  <form method ="POST" action="data.php"  onkeydown="return event.key != 'Enter'" id="send" >
    <p class="quadro_title" @click="editQuadroName" 
     v-if="!editQuadroTitle">{{quadro.title}}
      <span v-if="quadro.title == ''">Списки подгрупп</span>
    </p>    
    <input  class="title_q"
           @blur="cancelQuadroTitle"
           v-on:keyup.enter="cancelQuadroTitle"
           v-else=""
           type="text"
           v-model="quadro.title"
           type="text"
           name="course">
           </form>
           <!-- <div v-for="info in quadroinfo">
               <p>{{info.name}}</p> 
               <p>{{info.year}}</p>
           </div> -->
    <div class="card" 
       v-for="card in cards">
       <!--Отвечает за перемещение элементов из стоблцов-->
       <!-- <p>{{card.name}}</p>
       <p>{{card.id}}</p> -->
       <!-- <p>{{card.tarefas}}</p> -->
       <!-- <p>{{cards}}</p> -->
    <div v-if="mover" class="move_p">
      <div @click="movendo(card)"
           class="moover"
           v-if="idCard !== cards.indexOf(card)">
        <p>Доступна для переноса</p> 
      </div>
      <div @click="cancelMover" class="moover"
           v-else="idCard === cards.indexOf(card)">
        <p>Текущая таблица</p>
      </div>
    </div>
    <!--END-->
    <button v-if="card.delete" 
            @click="deleteCard(card)"
            class="delete topd">
           <i class="fas fa-trash"></i>
           
    </button>
    <p class="title"
       v-bind:class="{ editando: card.edit }" 
       @click="editTitleCard(card)">
      <i :class="card.icon"></i>   
      {{ card.name }} 
      <span v-if="card.name == ''">
        Без названия;
      </span>
    </p>
    <input  v-if="card.edit" @blur="cancelEditCard(card)"
           v-on:keyup.enter="cancelEditCard(card)"
           class="edit" type="text"
           v-model="card.name"
           maxlength="45">
    <!--Отвечает за содержание колонки-->
    <div class="list">
     <p v-if="card.tarefas.length == 0" id="ghost">список студентов</p>
      <draggable
          v-model="card.tarefas">
      <div v-for="tarefa in card.tarefas">
     <div v-bind:class="{moved: tarefa.moved}">
    <div class="tarefa" v-on:dblclick="concluido(card, tarefa)"
         v-bind:class="{ concluido: tarefa.finalizado}">
      <p>{{ tarefa.name }}</p>
      <button @click="deleteTarefa(tarefa, card)"
              class="delete">
        <i class="fas fa-trash"></i> <!--Иконка удаления -->
      </button>
      <button v-if="card.tarefas.indexOf(tarefa) > 0"
              @click="upTarefa(tarefa, card)"
              class="right">
        <i class="fas fa-chevron-up"></i>
      </button>
      <button class="move" @click="move(card,tarefa)">
        <i class="fas fa-mouse-pointer"></i> <!--иконка переноса-->
      </button>
      <button v-if="card.tarefas.indexOf(tarefa) < card.tarefas.length - 1"
              @click="downTarefa(tarefa, card)"
              class="right"><i class="fas fa-chevron-down"></i>
      </button>
      </div>
        </draggable>
       </div>
       <!-- <p>{{cards[0]['tarefas'][0]['name']}}</p> -->
      </div>
    </div>
    <form  onkeydown="return event.key != 'Enter'" id="send" method="POST" action="data.php">
    <input  type="text" v-model="card.novaTarefa"
           v-on:keyup.enter="newTarefa(card)"
           placeholder="Введите и/ф студента" maxLength="100"
           name="studentname">
    </form>
  </div>
  <!-- отвечает за создание новой карты-->
 
  <div class="card">
    <h1>Создание группы</h1>
    <form id="send" onkeydown="return event.key != 'Enter'" method="POST" action="data.php">
    <input id="inputList" type="text" v-model="newCardName"
           v-on:keyup.enter="newCard"
           placeholder="Введите название группы" maxLength="30"
           name="group"
           >
           
         
    </form>
  </div>
  <!-- <div v-for="card in cards" style ="border:2px solid black;">
  <p>students info</p>
    <div v-for="(tarefa,index) in card.tarefas">
        <p>INDEX:{{index}}<p>
        <p>{{tarefa.name}}</p>
        <p>{{tarefa.id}}</p>
    </div>
 

  </div> -->
  <!--           LIST'S END         -->  
  </div>
  </div>


  

  <!-- <td class="body-table-td" style="max-width: 16px; width: 16px;background-color: #c0c0c0;"></td> -->
</tr>
<tr class="body-table-tr"> 
    <td colspan="4" class="body-table-td"  style="font-size: 14px; width: 1062px !important; height: 26px;">
        
        <div class="image-text-block" style="width: 100%;">
        <table style="border-collapse: collapse; border-width: 0; width: 100% !important; height: 26px;">
            <tr>
                <td align="left" valign="middle" style="background-image: url(http://vega.fcyb.mirea.ru/images/f-c.png); width: 1032px; height: 26px; margin: 0; padding: 0;">
                    <img src="images/f-l.png" alt="">    
                </td>
                <td align="right" valign="middle" style="background-image: url(http://vega.fcyb.mirea.ru/images/f-c.png); width: 30px; height: 26px; margin: 0; padding: 0;">
                    <img src="http://vega.fcyb.mirea.ru/images/f-r.png" alt="">
                </td>
            </tr>
        </table>            
            <p class="image-text text-email" style="width: 100%;">
                <a href="mailto:vega@mirea.ru">Обратная связь</a>
            </p>
        </div>    
    </td>
</tr>
<tr class="body-table-tr">
      <!--  <td class="body-table-td" style="max-width: 16px; width: 16px;background-color: #c0c0c0;"></td> -->
    <td colspan="2" class="body-table-td-content">
        <table align="center">
            <tr class="body-table-tr"> 
                <td class="body-table-td">
                    <!-- HotLog --> <script language="javascript"> hotlog_js="1.0"; hotlog_r=""+Math.random()+"&s=270979&im=134&r="+escape(document.referrer)+"&pg="+ escape(window.location.href); document.cookie="hotlog=1; path=/"; hotlog_r+="&c="+(document.cookie?"Y":"N"); </script>
                    <script language="javascript1.1"> hotlog_js="1.1";hotlog_r+="&j="+(navigator.javaEnabled()?"Y":"N")</script> 
                    <script language="javascript1.2"> hotlog_js="1.2"; hotlog_r+="&wh="+screen.width+'x'+screen.height+"&px="+ (((navigator.appName.substring(0,3)=="Mic"))? screen.colorDepth:screen.pixelDepth)</script> 
                    <script language="javascript1.3"> hotlog_js="1.3"</script> 
                    <script language="javascript">hotlog_r+="&js="+hotlog_js; document.write("<a href='http://click.hotlog.ru/?270979' target='_top'><img " + " src='http://hit10.hotlog.ru/cgi-bin/hotlog/count?"+ hotlog_r+"&' border=0 width=88 height=31 alt=HotLog></a>")</script> 
                    <noscript><a href="http://click.hotlog.ru/?270979" target=_top><img src="http://hit10.hotlog.ru/cgi-bin/hotlog/count?s=270979&im=134" border=0  width="88" height="31" alt="HotLog"></a></noscript> <!-- /HotLog --> 
                </td> 
                <td width="100%" class="body-table-td"> 
                    <div align="center" style="font-family:Arial Narrow,Trebuchet MS,Arial,Verdana,Tahoma; font-size:12pt;">МОСКВА 2020</div> 
                </td> 
                <td class="body-table-td"> 
                    <!--Rating@Mail.ru COUNTER--><script language="JavaScript" type="text/javascript"><!-- 
                     d=document;var a='';a+=';r='+escape(d.referrer); 
                     js=10//--></script><script language="JavaScript1.1" type="text/javascript"><!-- 
                     a+=';j='+navigator.javaEnabled(); 
                     js=11//--></script><script language="JavaScript1.2" type="text/javascript"><!-- 
                     s=screen;a+=';s='+s.width+'*'+s.height; 
                     a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth); 
                     js=12//--></script><script language="JavaScript1.3" type="text/javascript"><!-- 
                     js=13//--></script><script language="JavaScript" type="text/javascript"><!-- 
                     d.write('<a href=\"http://top.mail.ru/jump?from=916242\"'+ 
                     ' target=_top><img src=\"http://top.list.ru/counter'+ 
                     '?id=916242;t=216;js='+js+a+';rand='+Math.random()+ 
                     '\" alt=\"Рейтинг@Mail.ru\"'+' border=0 height=31 width=88/><\/a>'); 
                     if(11<js)d.write('<'+'!-- ')//--></script><noscript><a 
                     target=_top href="http://top.mail.ru/jump?from=916242"><img 
                     src="http://top.list.ru/counter?js=na;id=916242;t=216" 
                     border=0 height=31 width=88 
                     alt="Рейтинг@Mail.ru"/></a></noscript><script language="JavaScript" type="text/javascript"><!-- 
                     if(11<js)d.write('--'+'>')//--></script><!--/COUNTER-->

                </td> 
            </tr> 
        </table>
    </td>
 
</tr>
</table>

  <script src="axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/15.0.0/vuedraggable.min.js"></script>
  <script src="vue.min.js"></script>
  <script src="Practice.js"></script>  
  
  

 </body>

</html>
