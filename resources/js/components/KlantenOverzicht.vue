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
            class="gridItem klantnaam"
            @click="clickOnKlant(klant)"
          >
            <p>{{ klant.name }}</p>
            <p>></p>
          </div>
        </div>
      </div>
    </div>
    <div class="secondColumn">
      <klant-factuur
        :klantID="opgehaaldeKlantID"
        :klantnaam="opgehaaldeKlantNaam"
      ></klant-factuur>
    </div>
  </div>
</template>

<script>
import KlantFactuur from "./KlantFactuur.vue";

export default {
  components: {
    KlantFactuur,
  },
  data() {
    return {
      users: [],
      drinks: [],
      selectedUser: "",
      opgehaaldeKlantID: 0,
      opgehaaldeKlantNaam: "",
    };
  },
  methods: {
    clickOnKlant(key) {
      this.opgehaaldeKlantID = key.id;
      this.selectedUser = key.name;
      this.opgehaaldeKlantNaam = key.name;
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