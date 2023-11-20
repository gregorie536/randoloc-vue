<template>
    <MainLayout>
        <div class="img-home">
            <div class="flex justify-center items-center">
                <div>
                    <h1>{{ titre }}</h1>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center space">
            <CardTop :homepageFeatures="homepageFeatures"/>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                <ul>
                    <li>
                        Vous souhaitez découvrir des sentiers dans une ambiance
                        conviviale et chaleureuse, alors rejoignez- nous !
                    </li>
                    <li>
                        Notre association, affiliée à la FFR (Fédération
                        Française de Randonnée), est entièrement encadrée par
                        des bénévoles.
                    </li>
                    <li>Nos objectifs sont de :</li>
                    <li>
                        - randonner : marcher est un sport à la portée de tous
                    </li>
                    <li>- découvrir notre patrimoine</li>
                    <li>
                        - soutenir le travail réalisé par les bénévoles de
                        l’association FFR
                    </li>
                    <li>
                        Nos valeurs reposent ainsi sur le respect de
                        l’environnement
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex justify-center items-center space">
            <CardBottom />
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import CardTop from "@/Components/CardTop.vue";
import CardBottom from "@/Components/CardBottom.vue";
export default {
    components: {
        MainLayout,
        CardTop,
        CardBottom,
    },
    props: ['homepageFeatures'],
    name: "Home",
    data() {
        return {
            titre: "Les marcheurs du pays de Locminé",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
.img-home {
    background: url(/images/page-home/img-home.jpg) no-repeat center center;
    background-size: cover;
    padding: 5%;
}

.space {
    margin-top: 20px;
}
</style>
