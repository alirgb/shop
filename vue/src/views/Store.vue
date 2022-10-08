<template>
  <v-row>
    <!-- <v-col>
      <v-select
        v-model="select"
        :hint="`${select.name}`"
        :items="products"
        item-text="name"
        label="Select"
        return-object
        single-line
      ></v-select>
    </v-col> -->

    <v-col v-for="(product, index) in products" :key="index">
      <product :product="product" />
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";
import Product from "../components/Product.vue";
import { mapState } from "vuex";
export default {
  name: "Store",
  //   props: ["name"],
  components: {
    Product,
  },
  data() {
    return {
    }
  },
  computed: {
    ...mapState(["products"]),
  },
  methods: {},
  mounted() {
    axios
      .get("products")
      .then((response) => {
        this.$store.commit("set_products", response.data.products);
      })
      .catch((err) => console.log(err));
  },
};
</script>
