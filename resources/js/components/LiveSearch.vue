<template>
  <div>
    <input type="text" class="form-control" placeholder="enter a text" v-model="q">

    <ul class="autocomplete-results" v-if="users.length > 0">
      <li class="autocomplete-result" v-for="user in users">{{ user.name}}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      q: "",
      users: []
    };
  },

  created() {
    // axios.get("/searchAjax" + this.q).then(response => {
    //   console.log(response.data);
    // });
  },

  watch: {
    q() {
      if (this.q.length >= 3) {
        this.searchUsers();
      }
    }
  },
  methods: {
    searchUsers: _.debounce(function() {
      if (this.q != "") {
        axios.get("/searchAjax/" + this.q).then(response => {
          console.log(response.data);
          this.users = response.data;
        });
      }
    }, 1000)
  }
};
</script>

<style>
.autocomplete-results {
  border: 1px solid #ccc;
  overflow: auto;
}
.autocomplete-result {
  cursor: pointer;
  background: rgb(255, 255, 255);
  padding: 5px;
}
.autocomplete-result:hover {
  background-color: #4aae9b;
  color: white;
}
</style>
