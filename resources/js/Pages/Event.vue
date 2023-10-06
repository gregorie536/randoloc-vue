<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                <ul>
                    <li>Notre groupe est composé d’environ 70 adhérent(e)s.</li>
                    <li>
                        Le mardi, nous effectuons une boucle de 8 à 10 km en 2h.
                    </li>
                    <li>
                        La randonnée du mardi à la journée est en moyenne de 20
                        km en 5h environ, dans un rayon de 50 km autour de
                        Locminé.
                    </li>
                    <li>Le samedi, la sortie dure environ 3 heures.</li>
                    <li>
                        Le rythme est plus soutenu. Le vendredi, la marche
                        Nordique dure environ 2h.
                    </li>
                    <li>
                        Pour info, lors des déplacements des samedis et des
                        mardis à la journée, il est demandé 0,05 euros du km par
                        personne pour le chauffeur.
                    </li>
                </ul>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    components: {
        MainLayout,
    },
    name: "Event",
    data() {
        return {
            titre: "Sorties et séjours",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
