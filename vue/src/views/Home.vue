<template>
  <v-container fluid>
    <v-layout row wrap>
      <v-flex xs12 class="text-xs-center" mt-5>
        <h1>Home page</h1>
      </v-flex>
      <v-flex xs12 class="text-xs-center" mt-3>
        <p v-if="authUser">Hello {{ authUser.name }}</p>
      </v-flex>
      <Store />
    </v-layout>
  </v-container>
</template>
<script>
import { mapState } from "vuex";
import Store from "./Store.vue";
export default {
  name: "Home",
  components: {
    Store,
  },
  computed: {
    ...mapState(["authUser"]),
  },
};
</script>
