<template>
<div class="home-content-grid">
  <div class="text-center main">
    <div>
      <h2 class="display-2 text-light">Less </h2>
      <h4 class="display-4 text-light font-italic">is</h4>
      <h1 class="display-1 text-light font-weight-bold">More</h1>
      <h4 class="text-light" style="transform: translate(50px)"> &mdash; Fred Hockney</h4>
    </div>
  </div>
  <div class="social d-flex align-items-center">
    <a href="https://github.com/fvhockney"><img class="mr-5" src="/imgs/GitHub-Mark-Light-64px.png" width="auto" height="48" alt="GitHub Icon" title="See My Github Repos"></a>
    <!-- <a href="https://codepen.io/fvhockney/"><img class="" src="imgs/CodePen-Button-Fill-White-Large.png" height="52" width="auto" alt="CodePen" title="See My CodePen"></a> -->
    <a href="https://www.linkedin.com/in/fvhockney/"><img src="/imgs/In-White-66px-TM.png" height="43" width="auto" alt="LinkedIn Icon" title="See My LinkedIn Profile"></a>
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
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.social {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-top: 1em;
    margin-bottom: 1em;
}
.foot {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

@media screen and (min-width: 425px) and (min-height: 550px) {
    .home-content-grid {
        display: grid;
        grid-column-gap: 15px;
        grid-template-columns: [cstart] 20fr [cline2] 1fr [cline3] auto [end];
        grid-template-rows: [rstart] 5fr [rline2] auto [rline2] 1fr [rline3] 1fr [end];
        grid-template-areas: ". . foot" ". . foot" ". . foot" ". . .";
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
        grid-row: rstart;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
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
}
</style>
