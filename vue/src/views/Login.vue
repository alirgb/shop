<template>
  <v-container fluid>
    <v-layout row wrap>
      <v-flex xs12 class="text-xs-center" mt-5>
        <h1>Sign In</h1>
      </v-flex>
      <v-flex xs12 sm6 offset-sm3 mt-3>
        <form @submit.prevent="handleSubmit">
          <v-layout column>
            <v-flex>
              <v-text-field
                v-model="email"
                name="email"
                label="Email"
                id="email"
                type="email"
                required
              ></v-text-field>
            </v-flex>
            <v-flex>
              <v-text-field
                v-model="password"
                name="password"
                label="Password"
                id="password"
                type="password"
                required
              ></v-text-field>
            </v-flex>
            <v-flex class="text-xs-center" mt-5>
              <v-btn color="primary" type="submit">Sign In</v-btn>
            </v-flex>
          </v-layout>
        </form>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
    };
  },

  methods: {
    async handleSubmit() {
      const response = await axios.post("login", {
        email: this.email,
        password: this.password,
      });
      this.$store.commit("set_auth_user", response.data.user);

      localStorage.setItem("token", response.data.token);

      this.$router.push({ name: "Home" });
    },
  },
};
</script>
