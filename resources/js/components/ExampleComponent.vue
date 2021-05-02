<template>
  <section class="hero-section product-space">
    <div class="product-card" v-for="product in products" :key="product">
      <div class="product-img">
        <img
          v-bind:src="imageValid(imageValid(product.url_image))"
          alt="imagen del producto"
          title="product.url_image"
        />
        <!-- <img
          v-else
          src="http://localhost:8000/test/img/default/product_error.jpg"
          alt="imagen del producto"
          title="product.url_image"
        /> -->

        <!-- <img src=" url('/test/img/default/product_error.jpg')" alt="error_product" style="width:100%; height:auto;"> -->
      </div>
      <p class="product-title">{{ product.name }}</p>
      <div class="product-footer">
        <p>
          {{ product.price }}
          <img
            src="http://localhost:8000/test/img/default/carro.png"
            alt="shopping"
          />
        </p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  methods: {
    imageValid: function (image) {
      if (image == "" || image == null) {
        return "http://localhost:8000/test/img/default/product_error.jpg";
      }
      return image;
    },
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/product")
      .then((response) => (this.products = response.data));
  },
};
</script>