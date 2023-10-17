<template>
    <nav class="footer">
        <div class="footer-container container">
            <ul class="menu-items">
                <li>Copyright &copy; | Tous droits réservés</li>
                <li class="font-bold">
                  
                    <a :href="route('legalNotice')">Mentions légales</a>
                </li>
                <li>
                    <small>
                        Le contenu du présent site web doit être utilisé à des
                        fins informatives et non-commerciales
                    </small>
                </li>
            </ul>
            <router-link to="/">
                        <!-- <h1 class="logo">
                <img :src="logoHeader.url" :alt="logoHeader.alt" />
                        </h1> -->
            </router-link>
        </div>
    </nav>
</template>
<script>
export default {
    name: "Footer",
    // data() {
    //   return {
    //     logoFooter: {
    //       url: require("@/assets/img/logo/logo.svg"),
    //       alt: "logo",
    //     },
    //   };
    // },
};
</script>

<style scoped lang="scss">
@import "../../css/variables.scss";
/****************************************************
                      FOOTER
*****************************************************/

// .logoBas {
//   width: 100px;
//   padding-top: 10px;
// }

.footer {
    background-color: $main-text-color;
    color: $nav-bg-color;
    display: flex;
    justify-content: center;
    .menu-items{
      display: flex;
        flex-direction: column;
        align-items: center;
    }
    small {
        display: flex;
        text-align: center;
    }
    margin-top: 20px;
}
</style>
