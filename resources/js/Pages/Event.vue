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

        <div>
            <p class="text-2xl font-semibold mb-4 mt-6">Les catégories</p>
        </div>

        <CategoryList
            :categories="categories"
            @select-category="handleSelectCategory"
        />
        <hr class="hr-main-text-color" />



        <div>
            <p class="text-2xl font-semibold mb-4 mt-6">Les sorties</p>
        </div>
        <EventList :events="events" @select-event="handleEventSelection" />
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import EventList from "@/Components/EventList.vue";
import CategoryList from "@/Components/CategoryList.vue";
export default {
    components: {
        MainLayout,
        EventList,
        CategoryList,
    },
    name: "Event",

    props: {
        events: Array,
        categories: Array,
    },

    data() {
        return {
            titre: "Sorties et séjours",
        };
    },
    methods: {
        handleSelectEvent(eventId) {
            Inertia.get(this.route("eventDetail", eventId));
        },
        handleSelectCategory(categoryId) {
            Inertia.get(this.route("categoryDetail", categoryId));
        },
    },
    mounted() {
        console.log(this.events);
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
p {
    color: $main-text-color;
    margin-left: 30px;
}
.hr-main-text-color {
    border-color: #223663; /* Utilisation de la couleur hexadécimale directement */
    border-width: 2px; /* Réglage de l'épaisseur de la ligne */
    margin-top: 1rem; /* Marge supérieure */
    margin-bottom: 1rem; /* Marge inférieure */
    margin-left: 1.5rem; /* Marge gauche */
    margin-right: 1.5rem; /* Marge droite */
}

</style>
