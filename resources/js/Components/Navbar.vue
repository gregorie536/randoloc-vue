<template>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="" />
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li>
                    <a :href="route('home')">Accueil</a>
                </li>
                <li>
                    <a :href="route('event')">Sorties et séjours</a>
                </li>
                <li>
                    <a :href="route('organization')">Association</a>
                </li>
                <li>
                    <a :href="route('guideline')">Règles et organisation</a>
                </li>
                <li>
                    <a :href="route('galleryPhotos')">Galerie photos</a>
                </li>
                <li>
                    <a :href="route('contact')">Contact</a>
                    <!-- <Link href="contact">Contact</Link> -->
                </li>
            </ul>
            <!-- <router-link to="/"> -->
            <!-- <h1 class="logo">
            <img :src="logoHeader.url" :alt="logoHeader.alt" />
          </h1> -->
            <!-- </router-link> -->
        </div>
    </nav>
</template>

<script>
// import { Link } from '@inertiajs/vue3'
export default {
    name: "NavBar",

    // data() {
    //   return {
    //     logoHeader: {
    //       url: require("@/assets/img/logo/logo.svg"),
    //       alt: "logo",
    //     },
    //   };
    // },
    methods: {
        sidemenu: {
            el: "#sidemenu",
            data: {
                navOpen: false,
            },
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/variables.scss";

.navbar {
    background-color: $main-text-color;
    color: $nav-bg-color;
}
.navbar input[type="checkbox"],
.navbar .hamburger-lines {
    display: none;
}

.container {
    max-width: 1200px;
    width: 90%;
    margin: auto;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    height: 64px;
    align-items: center;
}

.menu-items {
    order: 2;
    display: flex;
}
.logo {
    order: 1;
    font-size: 2.3rem;
    width: 130px;
}

.menu-items li {
    list-style: none;
    margin-left: 1.5rem;
    font-size: 1.3rem;
}

@media (max-width: 768px) {
    .navbar {
        opacity: 0.95;
    }

    .navbar-container input[type="checkbox"],
    .navbar-container .hamburger-lines {
        display: block;
    }

    .navbar-container {
        display: block;
        position: relative;
        height: 64px;
    }

    .navbar-container input[type="checkbox"] {
        position: absolute;
        display: block;
        height: 32px;
        width: 30px;
        top: 20px;
        left: 20px;
        z-index: 5;
        opacity: 0;
        cursor: pointer;
        right: 20px;
        left: auto;
    }

    .navbar-container .hamburger-lines {
        display: block;
        height: 28px;
        width: 35px;
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        right: 20px;
        left: auto;
    }

    .navbar-container .hamburger-lines .line {
        display: block;
        height: 4px;
        width: 100%;
        border-radius: 10px;
        background: $nav-bg-color;
    }

    .navbar-container .hamburger-lines .line1 {
        transform-origin: 0% 0%;
        transition: transform 0.3s ease-in-out;
    }

    .navbar-container .hamburger-lines .line2 {
        transition: transform 0.2s ease-in-out;
    }

    .navbar-container .hamburger-lines .line3 {
        transform-origin: 0% 100%;
        transition: transform 0.3s ease-in-out;
    }

    .navbar .menu-items {
        padding-top: 100px;
        background: $main-text-color;
        height: 100vh;
        max-width: 300px;
        transform: translate(-150%);
        display: flex;
        flex-direction: column;
        margin-left: -40px;
        padding-left: 40px;
        transition: transform 0.5s ease-in-out;
        //   box-shadow: 5px 0px 10px 0px #aaa;
        overflow: scroll;
    }

    .navbar .menu-items li {
        margin-bottom: 1.8rem;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .logo {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 2.5rem;
    }

    .navbar-container input[type="checkbox"]:checked ~ .menu-items {
        transform: translateX(0);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
        transform: rotate(45deg);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
        transform: scaleY(0);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
        transform: rotate(-45deg);
    }
}

@media (max-width: 500px) {
    .navbar-container input[type="checkbox"]:checked ~ .logo {
        display: none;
    }
}
</style>
