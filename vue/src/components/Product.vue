<template>
  <v-card class="mx-auto my-12" max-width="300">
    <v-img
      height="250"
      :src="`http://localhost:8000/img/${product.img}`"
      :alt="`${product.img}`"
    ></v-img>
    <v-card-title>
      {{ product.name }}
    </v-card-title>
    <v-card-text>
      <p>SKU: {{ product.sku }}</p>
      <p>image: {{ product.img }}</p>
      <p>Brand: {{ product.brand.name }}</p>
      <p>Category: {{ product.category.name }}</p>
    </v-card-text>
    <v-card-actions>
      <v-btn color="primary">add</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "Product",
  props: {
    product: {
      type: Object,
    },
  },
  data() {
    return {};
  },
  methods: {},
  created() {},
  mounted() {},
};
</script>
