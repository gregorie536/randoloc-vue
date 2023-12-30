<template>
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white shadow-md">
            <ul class="space-y-2 p-4">
                <li>
                    <InertiaLink
                        :href="route('events.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="mr-2"></i>Sorties et séjours
                    </InertiaLink>
                </li>
                <li>
                    <InertiaLink
                        :href="route('homepage_features.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="mr-2"></i>L'info du moment
                    </InertiaLink>
                </li>
                <li>
                    <InertiaLink
                        :href="route('organization.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="fas fa-file-alt mr-2"></i>Association
                    </InertiaLink>
                </li>
                <li>
                    <InertiaLink
                        :href="route('guideline.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="mr-2"></i>Règles et organisation
                    </InertiaLink>
                </li>
                <li>
                    <InertiaLink
                        :href="route('gallery.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="mr-2"></i>Galerie photos
                    </InertiaLink>
                </li>
                <li>
                    <InertiaLink
                        :href="route('contact.choice')"
                        class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                    >
                        <i class="mr-2"></i>Contact
                    </InertiaLink>
                </li>
            </ul>
        </aside>

        <!-- Contenu principal et Navbar -->
        <div class="flex-1 flex flex-col">
            <nav class="bg-white shadow-md z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <NavLink
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {{ $page.props.auth.user.name }}
                                        <!-- Dropdown Icon here -->
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"
                                        >Profile</DropdownLink
                                    >
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                        >Log Out</DropdownLink
                                    >
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="..."
                            >
                                <!-- Hamburger icon here -->
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                        <!-- Other responsive links -->
                    </div>
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <!-- Profile and logout links -->
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8">
                <slot />
                <!-- Ici, le reste du contenu de votre page principale -->
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import { InertiaLink } from "@inertiajs/inertia-vue3";

const showingNavigationDropdown = ref(false);
</script>

<style></style>
