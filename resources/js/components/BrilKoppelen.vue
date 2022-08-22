<template>
  <h1 class="gridTitle" v-if="klantnaam">{{ klantnaam }}</h1>
  <h1 class="gridTitle" v-else>KLANTNAAM</h1>
  <div class="fullGridItem">
    <div>
      <div class="gridItem">
        <p>TOEGEWEZEN</p>
        <p v-if="toegewezen">{{ toegewezen }}</p>
        <p v-else>-</p>
      </div>
      <div class="gridItem">
        <p>BRIL ID</p>
        <p>{{ brilID }}</p>
      </div>
    </div>
    <div class="buttonDiv">
      <button
        class="mainButton"
        :disabled="isDisabled"
        @click="$emit('showKoppelBrilModal')"
      >
        BRIL KOPPELEN
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["klantnaam", "toegewezen", "brilID", "isDisabled"],
  data() {
    return {};
  },
  methods: {},
  mounted() {
    window.axios.get("/api/drinks").then((res) => {
      this.drinks = res.data;
    });
    window.axios.get("/api/users").then((res) => {
      this.users = res.data;
    });
  },
};
</script>

<style scoped>
</style>