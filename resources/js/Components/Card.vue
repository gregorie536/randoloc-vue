<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img
            class="w-full"
            src="/images/page-home/event.jpg"
            alt="Sunset in the mountains"
        />
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-center">
                <span class="main-text-color">Sorties et séjours</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    data() {
        return {
            cardName: [{
                name: "Sorties et séjours",
                link: "/sorties-et-sejours",
                image: "/images/page-home/event.jpg"
            },
            {name: "L'info du moment",
            link: "/sorties-et-sejours",
            image: "/images/page-home/event.jpg"
            },
            {name: "Association",
            link: "/sorties-et-sejours",
            image: "/images/page-home/event.jpg"
            },
            {name: "Règles et organisations",  
            link: "/sorties-et-sejours",
            image: "/images/page-home/event.jpg"
            },
            {
            name: "Galerie photos",    
            link: "/sorties-et-sejours",
            image: "/images/page-home/event.jpg"
            },
            {name: "Contact",   
            link: "/sorties-et-sejours",
            image: "/images/page-home/event.jpg"
            },
        ]
        };
    },
 
};


</script>


<style scoped lang="scss">

</style>
