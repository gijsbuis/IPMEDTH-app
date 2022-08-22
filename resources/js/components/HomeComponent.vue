<template>
  <img class="logo" src="/images/effenaarLogo.svg" alt="Effenaar Logo" />
  <section class="grid">
    <div class="gridFirst">
      <h1 class="gridTitle">VIPDECK</h1>
      <div>
        <div
          class="gridItem"
          :class="[showSecondGrid === 'bril' ? 'selected' : '']"
          @click="changeSecondGridItem('bril')"
        >
          <p>BRIL KOPPELEN</p>
          <p>></p>
        </div>
        <div
          class="gridItem"
          :class="[showSecondGrid === 'bestellingen' ? 'selected' : '']"
          @click="changeSecondGridItem('bestellingen')"
        >
          <p>OVERZICHT BESTELLINGEN</p>
          <p>></p>
        </div>
        <div
          class="gridItem"
          :class="[showSecondGrid === 'klanten' ? 'selected' : '']"
          @click="changeSecondGridItem('klanten')"
        >
          <p>BETAALOVERZICHT KLANTEN</p>
          <p>></p>
        </div>
      </div>
    </div>
    <div
      :class="[
        showSecondGrid === 'bestellingen' ? 'gridBestellingen' : 'gridSecond',
      ]"
    >
      <grid-overzicht v-if="showSecondGrid === 'basic'"></grid-overzicht>
      <brillen-overzicht
        @ontkoppelBrillen="showModal"
        @showKoppelBrilModal="showKoppelModalFunction"
        v-if="showSecondGrid === 'bril'"
        :key="componentKey"
      ></brillen-overzicht>
      <bestellingen-overzicht
        v-if="showSecondGrid === 'bestellingen'"
      ></bestellingen-overzicht>
      <klanten-overzicht
        v-if="showSecondGrid === 'klanten'"
      ></klanten-overzicht>
    </div>
  </section>
  <div v-if="show" class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">
        <div class="gridTitle">
          <h3 name="header">ALLE BRILLEN ONTKOPPELEN</h3>
        </div>
        <div class="modal-body">
          <h4 name="body">
            WEET JE ZEKER DAT JE ALLE BRILLEN WIL ONTKOPPELEN?
          </h4>
        </div>
        <div class="modal-footer">
          <slot name="footer">
            <button
              @click="ontkoppelenAnnuleren"
              class="secondButton modalButton"
            >
              ANNULEREN
            </button>
            <button
              @click="alleBrillenOntkoppelen"
              class="mainButton modalButton"
            >
              ONTKOPPELEN
            </button>
          </slot>
        </div>
      </div>
    </div>
  </div>
  <div v-if="showKoppelModal" class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">
        <div class="gridTitle">
          <h3 name="header">BRIL KOPPELEN</h3>
        </div>
        <div class="modal-body">
          <h4 class="modal-body-text">
            BRIL KOPPELEN AAN {{ this.$store.selectedUser }}
          </h4>
          <div class="modal-body-number">
            <button class="mainButton koppelButton" @click="decrease">-</button>
            <p>{{ this.koppelBrilNumber }}</p>
            <button class="mainButton koppelButton" @click="increase">+</button>
          </div>
        </div>
        <div class="modal-footer">
          <slot name="footer">
            <button @click="koppelenAnnuleren" class="secondButton modalButton">
              ANNULEREN
            </button>
            <button @click="brilKoppelen" class="mainButton modalButton">
              KOPPELEN
            </button>
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BrillenOverzicht from "./BrillenOverzicht.vue";
import BestellingenOverzicht from "./BestellingenOverzicht.vue";
import KlantenOverzicht from "./KlantenOverzicht.vue";
import GridOverzicht from "./GridOverzicht.vue";

export default {
  components: {
    BrillenOverzicht,
    BestellingenOverzicht,
    KlantenOverzicht,
    GridOverzicht,
  },
  data() {
    return {
      showSecondGrid: "basic",
      selected: "bril",
      userForKoppelen: 6,
      show: false,
      showKoppelModal: false,
      koppelBrilNumber: 0,
      componentKey: 0,
    };
  },
  methods: {
    changeSecondGridItem(para) {
      this.showSecondGrid = para;
    },
    showModal() {
      this.show = true;
    },
    showKoppelModalFunction() {
      this.showKoppelModal = true;
    },
    ontkoppelenAnnuleren() {
      this.show = false;
    },
    alleBrillenOntkoppelen() {
      this.show = false;
      window.axios.get("/api/ontkoppelBrillen").then((res) => {});
      this.componentKey += 1;
    },
    increase() {
      this.koppelBrilNumber += 1;
    },
    decrease() {
      if (this.koppelBrilNumber > 0) {
        this.koppelBrilNumber -= 1;
      }
    },
    koppelenAnnuleren() {
      this.showKoppelModal = false;
    },
    brilKoppelen() {
      window.axios.get("/api/koppelBril").then((res) => {});

      // ).then((res) => {
      //   res.id = 1;
      //   res.bril_id = this.koppelBrilNumber;
      // });
      this.showKoppelModal = false;
      this.componentKey += 1;
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

<!-- NON SCOPED STYLE -->
<style>
.firstColumn,
.secondColumn {
  background-color: var(--backgroundLight);
  height: 100%;
}

.gridTitle {
  background-color: var(--secondary);
  color: var(--background);
  padding: 10px 20px;
}

.fullGridItem {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 90%;
}

.gridItem {
  display: flex;
  cursor: pointer;
  justify-content: space-between;
  padding: 20px;
  border-bottom: 1px solid var(--secondary);
}

.selected,
.gridItem:hover {
  background-color: var(--backgroundLighter);
}

.buttonDiv {
  width: 90%;
  margin: 0 auto;
}

.mainButton {
  color: var(--background);
  background-color: var(--primary);
  border: 1px solid var(--primary);
  width: 100%;
  height: 50px;
}

.mainButton:hover {
  cursor: pointer;
  color: var(--secondary);
  background-color: var(--background);
}

.secondButton {
  color: var(--secondary);
  background-color: var(--background);
  border: 1px solid var(--primary);
  width: 100%;
  height: 50px;
}

.secondButton:hover {
  cursor: pointer;
  color: var(--background);
  background-color: var(--primary);
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  height: 30%;
  width: 40%;
  margin: 0px auto;
  background-color: var(--backgroundLight);
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.modal-body {
  margin: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.modal-body-text {
  text-align: center;
}

.modal-body-number {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.modal-footer {
  margin: 20px;
  display: flex;
  justify-content: space-between;
}

.modalButton {
  width: 40%;
}
</style>
<!-- NON SCOPED STYLE ^ -->

<!-- SCOPED STYLE -->
<style scoped>
.logo {
  width: 20%;
  margin: 20px;
}

.grid {
  display: grid;
  height: 80vh;
  max-width: 100wv;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: 2;
  column-gap: 50px;
  row-gap: 50px;
}
.gridFirst {
  background-color: var(--backgroundLight);
  grid-column-start: 1;
}
.gridSecond {
  grid-column-start: 2;
  grid-column-end: 4;
}

.doubleColumnGrid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  column-gap: 50px;
  height: 100%;
}

.gridBestellingen {
  grid-column-start: 2;
  grid-column-end: 4;
  display: grid;
  height: 100%;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: repeat(2, 1fr);
  column-gap: 50px;
  row-gap: 50px;
}

.koppelButton {
  width: 20%;
}
</style>
<!-- Scoped ^ -->