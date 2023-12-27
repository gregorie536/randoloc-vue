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
        </div>
    </nav>
</template>
<script>
export default {
    name: "Footer",
};
</script>

<style scoped lang="scss">
@import "../../css/variables.scss";

.footer {
    background-color: $main-text-color;
    color: $nav-bg-color;
    display: flex;
    justify-content: center;
    .menu-items {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    small {
        display: flex;
        text-align: center;
    }
    margin-top: 20px;
}
</style>
