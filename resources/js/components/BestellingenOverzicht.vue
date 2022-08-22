<template>
  <div v-for="bestelling in drinks" :key="bestelling" class="bestellingKaart" @click="changeStatus(bestelling)">
    <div class="gridTitle bestellingTitleDiv">
      <h1>{{bestelling.besteld_door}}</h1>
      <h3>#{{bestelling.bestel_id}}</h3>
    </div>
    <div class="bestelling">
      <div class="bestellingBestelling">
        <h2 class="bestellingItem">{{ bestelling.bestelling }}</h2>
      </div>
      <div class="bestellingStatus">
        <h4 class="bestellingStatus">STATUS</h4>
        <h4
          class="bestellingStatusActueel"
          :class="
            bestelling.status === 'ONDERWEG' ? 'statusOnderweg' : 'statusBesteld'
          "
        >
          {{ bestelling.status }}
        </h4>
      </div>
    </div>
    <div class="bestellingGemaaktOpDatum">
      <p class="bestellingDatum">{{ bestelling.created_at }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      drinks: [],
      bestelling: "3 COLA",
      status: "ONDERWEG",
      bestelDatum: "2022-08-21 19:05:22",
    };
  },
  methods: {
    changeStatus(id) {
      console.log(id);
      // Post request change db status
      window.axios.get("/api/bewerkStatus/2").then((res) => {
        console.log(res.data);
      })
    }
  },
  mounted() {
    window.axios.get("/api/drinks").then((res) => {
      this.drinks = res.data;
    });
  },
};
</script>

<style scoped>
.bestellingKaart {
  background-color: var(--backgroundLight);
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.bestellingTitleDiv {
  display: flex;
  justify-content: space-between;
}

.bestelling {
  height: 70%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 30px 20px;
}

.bestellingBestelling {
  margin-bottom: 20px;
}

.bestellingStatus {
  display: flex;
  justify-content: space-between;
}

.statusOnderweg {
  color: #4aff2d;
}

.statusBesteld {
  color: #ffa51e;
}

.bestellingGemaaktOpDatum {
  width: 100%;
  background-color: var(--backgroundLighter);
  border-top: 1px solid var(--background);
}

.bestellingDatum {
  margin-left: 10px;
}
</style>