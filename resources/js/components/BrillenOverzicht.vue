<template>
  <div class="doubleColumnGrid">
    <div class="firstColumn">
      <h1 class="gridTitle">KLANTEN</h1>
      <div class="gridSecond fullGridItem">
        <div>
          <div
            v-for="klant in users"
            :key="klant"
            :class="[selectedUser === klant.name ? 'selected' : '']"
            class="gridItem"
            @click="clickOnKlant(klant)"
          >
            <p>{{ klant.name }}</p>
            <p>></p>
          </div>
        </div>
        <div class="buttonDiv">
          <button class="secondButton" @click="$emit('ontkoppelBrillen')">
            ALLE BRILLEN ONTKOPPELEN
          </button>
        </div>
      </div>
    </div>
    <div class="secondColumn">
      <bril-koppelen
        :klantnaam="opgehaaldeKlantnaam"
        :toegewezen="opgehaaldeToegewezen"
        :brilID="opgehaaldeBril"
        :isDisabled="opgehaaldeIsDisabled"
        @showKoppelBrilModal="$emit('showKoppelBrilModal')"
      ></bril-koppelen>
    </div>
  </div>
</template>

<script>
import BrilKoppelen from "./BrilKoppelen.vue";

export default {
  components: {
    BrilKoppelen,
  },
  data() {
    return {
      users: [],
      drinks: [],
      selectedUser: "",
      opgehaaldeKlantnaam: "",
      opgehaaldeToegewezen: "",
      opgehaaldeBril: "-",
      opgehaaldeIsDisabled: true,
    };
  },
  methods: {
    clickOnKlant(key) {
      this.selectedUser = key.name;
      this.$store.selectedUser = key.name;
      this.opgehaaldeKlantnaam = key.name;
      this.opgehaaldeToegewezen = key.toegewezen;
      if (key.bril_id === 0) {
        this.opgehaaldeBril = "-";
      } else {
        this.opgehaaldeBril = key.bril_id;
      }
      this.opgehaaldeIsDisabled = false;
    },
  },
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

<style>
.ontkoppelBrillenButton {
  color: var(--primary);
  background-color: var(--background);
  border: 1px solid var(--background);
  width: 100%;
  height: 50px;
}
</style>