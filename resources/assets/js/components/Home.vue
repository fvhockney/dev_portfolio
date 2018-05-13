<template>
  <div class="home-content-grid">
    <div class="text-center main">
      <h2 class="display-2 text-light">Less </h2>
      <h4 class="display-4 text-light font-italic">is</h4>
      <h1 class="display-1 text-light font-weight-bold">More</h1>
      <h4 class="text-light" style="transform: translate(50px)"> &mdash; Fred Hockney</h4>
    </div>
    <div class="social">
      <img class="rounded-circle mr-5" src="http://placekitten.com/g/75/75" alt="GitHub Icon" title="See My Github Repos">
      <img class="rounded-circle" src="http://placekitten.com/g/75/75" alt="LinkedIn Icon" title="See My LinkedIn Profile">
      <img class="rounded-circle ml-5" src="http://placekitten.com/g/75/75" alt="CodePen" title="See My CodePen">
    </div>
    <div class="foot">
      <p class="text-light rotate">fvhockney@gmail.com</p>
      <p class="text-light rotate">+49 (0) 157 735 76428</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home'
}
</script>

<style lang="scss" scoped>
  .home-content-grid {
    display: grid;
    grid-template-columns: [cstart] 20fr [cline2] 1fr [cline3] auto [end];
    grid-template-rows: [rstart] 5fr [rline2] auto [rline2] 1fr [rline3] 1fr [end];
    grid-template-areas: ". . foot"
                         ". . foot"
                         ". . foot"
                         ". . ."
  }
  .social {
    display: flex;
    grid-column: cstart / cend;
    grid-row: rline2;
    flex-direction: row;
    justify-content: center;
  }

  .main {
    grid-column: cstart / cend;
    grid-row: rstart / rend;
    margin-top: 4em;
  }

  .foot {
    grid-area: foot;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    margin-right: 1em;
    .rotate {
      writing-mode: vertical-rl;
      text-orientation: sideways;
      transform: rotate(180deg);
    }
  }

  @media screen and (max-width: 788px) {

  }
</style>
