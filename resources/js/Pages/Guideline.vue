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
                    En vue de nous faire connaître et proposer nos activités à
                    de nouvelles personnes, nous participons au forum des
                    associations chaque automne. Régulièrement, les encadrants
                    bénévoles des randonnées suivent des formations. Elles sont
                    axées sur la sécurité et l’encadrement (gestes des premiers
                    secours, balisage, lecture d’une carte IGN, utilisation
                    d’une boussole…).
                </p>
            </div>
            <div class="content">
                <p class="text-center font-bold">Organisation des randonnées</p>
                <p>
                    La randonnée du mardi matin est d’environ 8 km en 2h dans
                    les proches environs de Locminé (10-15 km). Le départ a lieu
                    sur la Place Anne de Bretagne à Locminé à 8h45 précises. La
                    randonnée du mardi à la journée (le plus souvent 2 par
                    trimestre) est d’environ 20km en 5h jusqu’à 50 km de
                    Locminé. Le départ a lieu sur la Place Anne de Bretagne à
                    Locminé à 8h30 précises. La randonnée du samedi après-midi
                    (soit le 2èm et 4èm samedi du mois) est environ entre 12 à15
                    km en 3h. Le départ a lieu sur la Place Anne de Bretagne à
                    Locminé à 13h30 précises. La marche nordique du vendredi
                    matin est une marche sportive de 1h30 à 2h. Le départ a lieu
                    sur la place Place Anne de Bretagne à Locminé à 9h précises.
                    Pour les débutants, une initiation est recommandée avant sa
                    pratique, notamment auprès du Club d’Athlétisme de Locminé.
                    Nous covoiturons pour nos déplacements. Cependant, les
                    randonnées à la journée et du samedi après-midi s’effectuant
                    plus loin, il est demandé 5 cts d’euro du km par personne
                    pour le chauffeur.
                </p>
            </div>
            <div class="content">
                <p class="text-center font-bold">Adhésion et inscription :</p>
                <ul>
                    <li>
                        En adhérent, vous bénéficiez d’une licence valable une
                        année, soit du 1er septembre au 31 août. L’adhésion
                        comprend :
                    </li>
                    <li>
                        - La licence fédérale pour les randonneurs avec une
                        assurance, soit {{ licensePrice.price }} €
                    </li>
                    <li>
                        - L’inscription à l'association des marcheurs du pays de
                        Locminé, soit {{ associationPrice.price }} € (offerte pour les renouvellements
                        d’adhésion)
                    </li>
                    <li>
                        Ainsi, le montant de la cotisation pour la saison
                        {{ seasonYear.season_year }} est de {{ totalPrice }} € Pour adhérer, merci de remplir les
                        documents ci-dessous :
                    </li>
                    <li class="font-bold">Bulletin d’inscription</li>
                    <li>Plus lien vers fichier inscription</li>
                    <li class="font-bold">
                        Attestation et questionnaire de santé
                    </li>
                    <li>
                        Pour les nouveaux adhérents, le certificat médical est
                        obligatoire et est valable 3 ans.
                    </li>
                    <li>
                        Les personnes renouvelant leur adhésion complète le
                        questionnaire de santé.
                    </li>
                    <li>
                        En répondant oui à au moins une question, elles devront
                        fournir un certificat médical.
                    </li>
                    <li class="font-bold">Questionnaire</li>
                    <li>Plus lien vers fichier questionnaire</li>
                    <li class="font-bold">Règlement intérieur</li>
                    <li>Plus lien vers fichier règlement intérieur</li>
                    <li class="font-bold">Statuts</li>
                    <li>Plus lien vers fichier statuts</li>
                    <li class="font-bold">
                        Inscriptions aux séjours et aux activités diverses
                    </li>
                    <li>Plus lien vers bulletin d’inscription</li>
                    <li class="font-bold">Contacts et réseau</li>
                    <li>
                        FFRP: Fédération Française de la Randonnée Pédestre
                        (ffrandonnee.fr)
                    </li>
                    <li>
                        FFRP, comité régional de Bretagne : Le site officiel de
                        la FFRandonnée Bretagne (ffrandonnee.fr)
                    </li>
                    <li>
                        FFRP Morbihan : Comité Départemental de Randonnée du
                        Morbihan (ffrandonnee.fr)
                    </li>
                </ul>
            </div>
            <div class="content">
                <p class="text-center font-bold">Nos règles de sécurité</p>
                <ul>
                    <li>
                        La sécurité avant tout ! Ecouter et appliquer les
                        recommandations de l'animateur.
                    </li>
                    <li>Le chef de file a toujours raison !</li>
                    <li>
                        Respecter le guide et le serre-file, surtout lors des
                        traversées de route.
                    </li>
                    <li>Prévenir si vous quitter le sentier.</li>
                    <li>Se soucier des personnes qui sont derrière vous.</li>
                </ul>
            </div>
            <div class="content">
                <p class="text-center font-bold">Nos règles de vie</p>

                <li>Se présenter lors des premières sorties avec le club.</li>
                <li>Communiquer avec les gens que vous ne connaissez pas.</li>
                <li>Intégrer les nouveaux adhérents.</li>
                <li>Adopter le rythme adéquat du groupe.</li>
                <li>
                    Porter un équipement adapté au terrain et à la météo :
                    chaussures, vêtement de pluie.
                </li>
                <li>Conserver la nature en l'état.</li>
                <li>Pas de cueillette de fruits ni de fleurs.</li>
                <li>Remporter ses détritus.</li>
                <li>Refermer les barrières et clôtures.</li>
                <li>Être solidaire des moins aguerris.</li>
                <li>Ne pas troubler le calme ambiant, ni l’environnement.</li>
                <li>Laisser vos animaux domestiques à la maison.</li>
                <li>
                    Respecter les dates limites d'inscription et de paiement.
                </li>
                <li>Apporter votre bonne humeur.</li>
                <li>
                    Offrir votre implication au sein du club en contrepartie des
                    randonnées.
                </li>
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
    name: "Guideline",
    props: ['licensePrice',
        'associationPrice',
        'totalPrice',
        'seasonYear'
    ] 
    ,
    data() {
        return {
            titre: "Règles et organisations",
        };
    },
};

</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
