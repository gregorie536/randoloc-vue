<!-- resources/js/Layouts/MainLayout.vue -->
<template>
  <div class="layout-container">
    <Navbar />
    <main class="main-content">
      <slot></slot> <!-- Le contenu de la page sera injecté ici -->
    </main>
    <Footer />
  </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue'

export default {
components: {
  Navbar,
  Footer
}
}
</script>

<style lang="scss">
@import "../../css/style.scss";
.layout-container {
display: flex;
flex-direction: column;
min-height: 100vh; // Utilisez vh pour s'assurer que cela prend toute la hauteur de la fenêtre de visualisation

.main-content {
  flex: 1; // Prend tout l'espace disponible
}
}
</style>
