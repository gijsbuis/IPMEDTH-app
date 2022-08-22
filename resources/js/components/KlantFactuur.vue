<template>
  <div class="factuurGridItem">
    <div>
      <h1 class="gridTitle" v-if="klantnaam">{{ klantnaam }}</h1>
      <h1 class="gridTitle" v-else>KLANTNAAM</h1>
      <div v-for="bestelling in drinks" :key="bestelling">
        <p class="gridItem" v-if="bestelling.user_id === klantID">
          {{ bestelling.bestelling }}
        </p>
      </div>
    </div>
    <div class="buttonTotaalDiv">
      <div class="buttonDiv">
        <button class="mainButton">AFREKENEN</button>
      </div>
      <div class="totaal">
        <p>TOTAAL</p>
        <p>€ {{ this.totaalPrijs }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["klantID", "klantnaam"],
  data() {
    return {
      drinks: [],
      totaalPrijs: 0,
    };
  },
  watch: {
    klantID: function (newVal) {
      for (let bestelling = 0; bestelling < this.drinks.length; bestelling++) {
        const element = this.drinks[bestelling];
        if (element.user_id == this.klantID) {
          this.totaalPrijs = element.totaal_prijs;
        }
      }
    },
  },
  mounted() {
    window.axios.get("/api/drinks").then((res) => {
      this.drinks = res.data;
    });
  },
};
</script>

<style scoped>
.factuurGridItem {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}

.totaal {
  margin-top: 20px;
  padding: 0 5%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  background-color: var(--backgroundLighter);
  border-top: 1px solid var(--background);
}
</style>