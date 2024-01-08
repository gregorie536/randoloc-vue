<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center">
            <div class="content">
                <p>
                    Une assemblée générale a lieu chaque année, à l’automne.
                    Elle permet de réunir les quelques 70 adhérents, d’élire un
                    bureau, d’établir des commissions et de faire un point sur
                    la saison passée et les projets à venir.
                </p>
            </div>

            <div class="content">
                <p class="text-center font-bold">La composition du bureau</p>
                <ul>
                    <li v-for="board in boards" :key="board.id">
                        <span class="font-bold">{{ board.role }}</span> :
                        {{ board.member.firstname }} {{ board.member.lastname }}
                    </li>
                </ul>
            </div>

            <div class="content">
                <p class="text-center font-bold">Les membres du conseil d’administration</p>
                <div>
                    <ul>
                        <li v-for="(group, index) in groupedBoardMembers" :key="index">
                            <span v-for="(member, memberIndex) in group" :key="member.id">
                                {{ member.firstname }} {{ member.lastname }}
                                <span v-if="memberIndex === 0"> | </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content">
                <p class="text-center font-bold">Les commissions</p>
                <ul>
                    <li v-for="committee in committees" :key="committee.id">
                        <div class="font-bold">
                            {{ committee.name }}
                        </div>
                        <div>
                            <span v-for="(member, index) in committee.members" :key="member.id">
                                {{ member.firstname }} {{ member.lastname }}
                                <span v-if="index < committee.members.length - 1"> | </span>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="content">
                <p class="text-center font-bold">Assurance</p>
                <p>
                    Nous adhérons à la FFRP et avons ainsi une licence fédérale
                    pour les randonneurs et son assurance. Celle-ci est valable
                    du 1er septembre au 31 août.
                </p>
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
    props: {
        members: Array,
        boards: Array,
        boardMembers: Array,
        committees: Array,

    },
    name: "Organization",
    data() {
        return {
            titre: "Association",
        };
    },

    computed: {
        groupedBoardMembers() {
            const grouped = [];
            for (let i = 0; i < this.boardMembers.length; i += 2) {
                grouped.push(this.boardMembers.slice(i, i + 2));
            }
            return grouped;
        }
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
