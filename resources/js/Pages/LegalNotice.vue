<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                <p class="font-bold">Editeur du site Web</p>
                <ul>
                    <li>À définir</li>
                    <li>Locminé 56500</li>
                    <li>Téléphone : À définir</li>
                </ul>
                <p class="font-bold">Hébergement du site Web</p>
                <ul>
                    <li>o2switch</li>
                    <li>Siret :</li>
                    <li>
                        510 909 807 00024 RCS Clermont Ferrand SARL au capital
                        de 100 000€ Opérateur Télécom déclaré ARCEP 09/2989 -
                        AS50474 o2switch est une société du groupe Zohey SAS au
                        capital de 8 000 000€ Marque déposée INPI : 09 3 645 279
                    </li>
                </ul>
                <p class="font-bold">Responsable éditorial</p>
                <ul>
                    <li>À définir</li>
                    <li>Technologies utilisées :</li>
                    <li>Laravel</li>
                    <li>VueJS</li>
                    <li>Conception du site et réalisation : Grégorie Vexier</li>
                </ul>

                <p class="font-bold">Photo présente sur le site</p>
                <ul>
                    <li>À définir</li>
                </ul>
                <p class="font-bold">Propriété et reproduction</p>
                <p>
                    La structure générale, ainsi que les logiciels, textes,
                    images animées ou fixes, sont, savoir-faire, dessins,
                    graphismes et tous autres éléments composant ce site web
                    sont de l’utilisation exclusive de **À définir**. Toute
                    reproduction totale ou partielle de ce site, par quelques
                    procédés que ce soient, sans autorisation expresse de **À
                    définir**, est interdite et constituerait une contrefaçon
                    sanctionnée par les articles L335-2 et suivants du Code de
                    la propriété intellectuelle. Les liens hypertextes mis en
                    place dans le cadre du présent site web en direction
                    d’autres ressources présentes sur le réseau internet, ne
                    sauraient engager la responsabilité de **À définir**.
                </p>
                <p class="font-bold">Données personnelles</p>
                <p>
                    Aucune information personnelle n’est collectée à votre insu
                    ni cédée à des tiers. Vous disposez d’un droit d’accès, de
                    rectification et d’opposition aux données vous concernant
                    que vous pouvez exercer en envoyant un courrier électronique
                    à **À définir**. Ce site utilise les cookies pour les
                    idetifiants de connexion uniquement.
                </p>
                <p class="font-bold">Liens</p>
                <p>
                    **À définir** autorise la mise en place d’un lien hypertexte
                    pointant vers son contenu, en respectant les principes
                    suivants : Le lien pointant vers le site de **À définir**
                    soit accessible par l’ouverture d’une nouvelle
                    fenêtre/onglet. Le lien est présenté de la manière suivante
                    : **À définir.fr** Cette autorisation exclut l’utilisation
                    du logo **À définir.fr**
                </p>
                <p class="font-bold">Loi applicable</p>
                <p>
                    L’usage de ce site web est régi par la loi française à
                    l’exception de toute autre législation.
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
    name: "LegalNotice",
    data() {
        return {
            titre: "Mentions légales",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
