<template>
  <router-view></router-view>
</template>

<script>
export default {
  data() {
    return {
      
    };
  },
};
</script>

<style>
h1, h2, h3 {
  margin: 0;
  padding: 0;
}

:root {
  --background: #121212;
  --backgroundLight: #2e2e2d;
  --backgroundLighter: #6e6e6c;
  --primary: #edcb45;
  --secondary: #f8f7f3;
}

body {
  width: 90%;
  margin: 0 auto;
  background-color: var(--background);
  color: var(--secondary);
  font-family: "Open Sans";
}
</style>