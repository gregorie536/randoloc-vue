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

// footer {
//   text-align: center;
//   margin-right: 20px;
//   margin-left: 20px;
//   border-top: 1px solid var(--black);
// }

// .liens {
//   display: flex;
//   flex-direction: column;
//   justify-content: space-between;
//   .pageFooter {
//     font-size: 15px;
//   }
// }
.footer {
    background-color: $main-text-color;
    color: $nav-bg-color;
    .footer-container {
        display: flex;
        justify-content: center;
        // flex-direction: column;
    }
    .menu-items{
      display: flex;
        // justify-content: center;
        flex-direction: column;
        // text-align: center;
        align-items: center;
    }
    small {
        display: flex;
        text-align: center;
    }
}
</style>
