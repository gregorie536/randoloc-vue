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
                    <li>
                        <span class="font-bold">Présidence</span> : Raymonde
                        BELLEC
                    </li>
                    <li>
                        <span class="font-bold">Vice-présidence</span> :
                        Marie-France LE GALL
                    </li>
                    <li>
                        <span class="font-bold">Secrétariat</span> : Dominique
                        VINCENT
                    </li>
                    <li>
                        <span class="font-bold">Secrétariat adjoint</span> :
                        Marie-France LE GALL
                    </li>
                    <li>
                        <span class="font-bold">Trésorerie</span> : Marie-France
                        LE GALL
                    </li>
                    <li>
                        <span class="font-bold">Trésorerie adjointe</span> :
                        Raymonde BELLEC
                    </li>
                </ul>
            </div>
            <div class="content">
                <p class="text-center font-bold">
                    Les membres du conseil d’administration
                </p>
                <div>
                    <p>Raymonde BELLEC | Yves Nédellec</p>
                    <p></p>
                    <p>Anne Pédronno | Sylviane Jago</p>
                    <p></p>
                    <p>Danièle Nédellec | Dominique Vincent</p>
                    <p></p>
                    <p>Marie-Annick Le Net | Joseph Le Tinevez</p>
                    <p></p>
                    <p>Sylvie Larvor | Sylvie Saouzanet</p>
                    <p></p>
                    <p>Gildas Hays | Alain Schaller</p>
                    <p></p>
                </div>
            </div>
            <div class="content">
                <p class="text-center font-bold">Les commissions</p>
                <ul>
                    <li>
                        <div class="font-bold">
                            Calendrier marches du mardi matin :
                        </div>
                        <div>
                            Gildas Hays | Sylvie Larvor | Dominique Vincent
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">
                            Calendrier marches du mardi à la journée :
                        </div>
                        <div>
                            Raymonde Bellec | Anne Pédronno | Jo Le Tinevez
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">
                            Calendrier marches du samedi après midi :
                        </div>
                        <div>
                            Yves Nédellec | Anne Pédronno | Alain Schaller
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">Commission 3 jours :</div>
                        <div>
                            Sylvie Saouzannet | Jo Le Tynevez | Raymonde Bellec
                            | Alain Schaller
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">Commission évènements :</div>
                        <div>
                            Yves Nédellec | Danièle Nédellec | Marie-Annick Le
                            Net
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">
                            Commission Rando-challenge :
                        </div>
                        <div>
                            Bernard Dumont | Gilles Bellec | Eliane Thoron |
                            Raymonde Bellec | Maria Pédronno
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">
                            Commission contact Mairie et OMS :
                        </div>
                        <div>Raymonde Bellec | Danièle Nédellec</div>
                    </li>
                    <li>
                        <div class="font-bold">
                            Commission assurance, santé, sécurité, trousse de
                            secours :
                        </div>
                        <div>Yves Nédellec | Marie-Annick Le Net</div>
                    </li>
                    <li>
                        <div class="font-bold">Commission long séjour :</div>
                        <div>
                            Yves Nédellec | Raymonde Bellec | Danièle Nédellec |
                            Sylviane Jago
                        </div>
                    </li>
                    <li>
                        <div class="font-bold">Site web :</div>
                        <div>
                            Dominique Vincent | Alain Schaller | Sylvie Larvor
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
    name: "Organization",
    data() {
        return {
            titre: "Association",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
