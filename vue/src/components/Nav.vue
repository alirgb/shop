<template>
  <div class="topnav">
    <router-link :to="{ name: 'Home' }">Home</router-link>

    <router-link v-if="!this.authUser" :to="{ name: 'Login' }"
      >Login</router-link
    >

    <router-link
      v-if="this.authUser"
      @click.native="handelLogout"
      :to="{ name: 'Home' }"
      >Logout</router-link
    >

    <router-link :to="{ name: 'Register' }">Sign Up</router-link>
  </div>
</template>

<script>
import axios from "axios";
import { mapState } from "vuex";
export default {
  name: "Nav",
  computed: {
    ...mapState(["authUser"]),
  },
  methods: {
    handelLogout() {
      axios.get("logout");
      this.$store.commit("set_auth_user", null);
      localStorage.setItem("token", null);
    },
  },
};
</script>

<style scoped>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04aa6d;
  color: white;
}
</style>
