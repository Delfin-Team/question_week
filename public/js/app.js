//main groups
var apiurl = "http://192.168.0.22"
new Vue({
  el: "#mainGroup",
  created: function(){
    this.getGroups();
  },
  data: {
    groups: [],
    groupsUser:[],
    selected: "",
    possibleGroups: [],
    nameGroup: "",
    nameToSearch: "",
    typeGroup: "",
    nameToDelete: "",
    nameToJoin: "",
  },
  methods:{
    getGroups: function(){
      var apiURl = apiurl + "/getgroups";
      axios.get(apiURl).then(response => {
        this.groups = response.data.user.groups;
        this.groupsUser = response.data.user.groups_created;
        this.possibleGroups = response.data.possibleGroups;
        console.log(response.data.user);
      });
    },
    addGroup: function(){
      axios.post(apiurl + "/groups", {
        name: this.nameGroup,
        private: this.selected,
      }).then(response => {
          console.log(response);
          if (response.status == 200) {
            console.log(response.data.group);
            this.groups.push(response.data.group);
            this.groupsUser.push(response.data.group);
            var $toastContent = $('<div class="card-panel green darken-1">Grupo creado correctamente.</div>');
            Materialize.toast($toastContent, 2000);
            this.nameGroup= "";
            this.selected = "";
          }

        }
      );
    },
    deleteGroup: function(id, index){
      console.log('delete with position: ' + index + ' and id: '+ id);

      axios.delete(apiurl + "/groups/" + id).then(response => {
          if (response.status == 200) {
            this.groups.pop(index);
            var $toastContent = $('<div class="card-panel green darken-1">Grupo eliminado</div>');
            Materialize.toast($toastContent, 2000);
            this.nameToDelete = "";
          }

        }
      ).catch(error => {
        var $toastContent = $('<div class="card-panel red darken-1">Ha surgido un error</div>');
        Materialize.toast($toastContent, 2000);
        this.nameToDelete = "";
      });
    },
    sendRequest: function(id){
      axios.post(apiurl + '/requestsuser',{
        group_id: id
      }).then(response => {
        if (response.status == 200) {

          console.log(response.data.created);
          if (response.data.created) {
            var $toastContent = $('<div class="card-panel green darken-1">Solicitud enviada correctamente</div>');
            Materialize.toast($toastContent, 2000);
          }else{
            var $toastContent = $('<div class="card-panel red darken-1">Ya has enviado una solicitud antes</div>');
            Materialize.toast($toastContent, 2000);
          }
        }
      }).catch(error => {
        var $toastContent = $('<div class="card-panel red darken-1">Ha surgido un error</div>');
        Materialize.toast($toastContent, 2000);
      });
    },
  },

  computed:{
      searchGroupToDelete:function(){
        return this.groupsUser.filter((group)=>group.name.includes(this.nameToDelete));
      },
      searchGroupToJoin:function(){
        return this.possibleGroups.filter((group)=>group.name.includes(this.nameToJoin));
      },
      groupsResult:function(){
        return this.groups.filter((group)=>group.name.includes(this.nameToSearch));
      }
},
});
//main show group
new Vue({
      el: "#mainShowGroup",
      data: {
        group:[],
        list: [],
        selected : '',
        publicQuestion: false,
        newQuestion: {
          title: '',
          answer1: '',
          answer2: '',
          answer3: '',
        },
        users : [],
        questions: [],
        questionWeek: [],
        email:'',
        emailToDelete: '',
        group_id: '',
        requests: [],
      },
      created: function(){
        var url = window.location.href ;
        var id = url.substring(url.lastIndexOf('/') + 1);
        this.group_id = id;
        this.getUsers();
        this.getUsersOfGroup();
        this.detailGroup();

      },
      methods:{
        detailGroup: function(){
          axios.get(apiurl + '/detailgroup/' + this.group_id)
          .then(response => {
            this.group = response.data.group;
            this.questions = response.data.questions;
            this.requests = response.data.requests;
            this.questionWeek = response.data.questionWeek;
          });
        },
        getUsers: function(){
          var urlUsers=apiurl + "/users";
          axios.get(urlUsers).then(response => {
            this.list= response.data.users;
          });
        },
        getUsersOfGroup: function(){
          var urlUsers=apiurl + "/users/" + this.group_id;
          axios.get(urlUsers).then(response => {
            this.users = response.data.users;
            console.log(this.users);
          });
        },
        addUser: function(id){
          console.log("add user with id " + id +" and the id_group: " + this.group_id)
          axios.post(apiurl + "/adduser/" + id + "/" + this.group_id).then(response => {
            console.log(response.data.response);
            if (response.data.response) {
              var $toastContent = $('<div class="card-panel green darken-1">Usuario agregado</div>');
              Materialize.toast($toastContent, 2000);
              this.email = "";
            }else{
              var $toastContent = $('    <div class="card-panel deep-orange accent-4">Este usuario ya esta en el grupo</div>');
              Materialize.toast($toastContent, 2000);
            }
          });
        },
        addUserToGroup: function(id,index){
          axios.put(apiurl + "/requestsuser/" + id, {
          }).then(response => {

            if (response.status==200) {
              var $toastContent = $('<div class="card-panel green darken-1">Solicitud aceptada y usuario agregado al grupo.</div>');
              Materialize.toast($toastContent, 3000);
              this.requests.pop(index);
            }else{
              var $toastContent = $('    <div class="card-panel red accent-4">Ha surgido un error</div>');
              Materialize.toast($toastContent, 2000);
            }
          });
        },
        deleteUser: function(id,index){
          console.log("delete user with id " + id +" and the id_group: " + this.group_id)
          axios.post(apiurl + "/deleteuser/" + id + "/" + this.group_id).then(response => {
            console.log(response.data.response);
            if (response.data.response) {
              var $toastContent = $('<div class="card-panel green darken-1">Usuario eliminado</div>');
              Materialize.toast($toastContent, 2000);
              this.users.pop(index);
              this.emailToDelete = "";

            }
          });
        },
        addQuestion: function(){
          console.log(this.newQuestion.title);
          console.log(this.newQuestion.answer1);
          console.log(this.newQuestion.answer2);
          console.log(this.newQuestion.answer3);
          axios.post(apiurl + '/questions',{
            title: this.newQuestion.title,
            answer1: this.newQuestion.answer1,
            answer2: this.newQuestion.answer2,
            answer3: this.newQuestion.answer3,
            public: !this.publicQuestion,
            group_id : this.group_id
          }).then(response => {
            if (response.status == 200) {
              this.questions.push(response.data.question);
              console.log(response.data.question);
              this.newQuestion.title = "";
              this.newQuestion.answer1 = "";
              this.newQuestion.answer2 = "";
              this.newQuestion.answer3 = "";
              var $toastContent = $('<div class="card-panel green darken-1">Pregunta agregada.</div>');
              Materialize.toast($toastContent, 2000);
            }
          });
        },
        addVoteToQuestion: function(id,index){
          axios.put(apiurl + "/addvote/" + id ).then(response => {
            console.log(response.data.status);

            if (response.status == 200) {
              var $toastContent = $('<div class="card-panel green darken-1">Voto agregado.</div>');
              Materialize.toast($toastContent, 2000);
              //this.questions[index].alreadyVote = true;
              this.questions[index].votes++;

              this.questions[index].alreadyVote = !this.questions[index].alreadyVote ;

            }
          });
        },
        addVoteToAnswer: function(question_id,answer_id){
          axios.post(apiurl + "/addvote/" + question_id, {
            answer: answer_id,
          } ).then(response => {
            console.log(response.data.status);
            if (response.status == 200) {
              this.questionWeek.alreadyAnswered = !this.questionWeek.alreadyAnswered;
              var $toastContent = $('<div class="card-panel green darken-1">Pregunta responida.</div>');
              Materialize.toast($toastContent, 2000);

            }
          });
        }
      },
      computed:{
        searchUser:function(){
          return this.list.filter((item)=>item.email.includes(this.email));
        },
        searchUserForDelete:function(){
          return this.users.filter((item)=>item.email.includes(this.email));
        },
        sortQuestions: function(){
          function compare(a, b) {
            if (a.votes > b.votes)
              return -1;
            if (a.votes > b.votes)
              return 1;
            return 0;
          }

          return this.questions.sort(compare);
        }
      }
    });
//main profile
new Vue({
  el: '#userProfile',
  created: function(){
    this.getCurrentUser();
  },
  data: {
    user: [],
    show: true,
    questions:[],
    detailquestion: []
  },
  methods:{
    getCurrentUser: function(){
      axios.get(apiurl + '/detailuser').then(response => {
        console.log(response.data.user);
        this.user = response.data.user;
        this.questions = response.data.questions;
      });
    },
    showDetail: function(index){
      console.log(this.user.questions[index]);
      this.detailquestion= this.questions[index];
    },
  },
  filters: {
  truncate: function(string, value) {
    return string.substring(0, value) + '...';
  }
}
});
