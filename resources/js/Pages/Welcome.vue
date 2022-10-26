<script setup>
import Frontend from '@/Layouts/Frontend.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Hero from '../Components/Frontend/Hero.vue'
import Promote from '../Components/Frontend/Promote.vue'
import Skill from '../Components/Frontend/Skill.vue'
import About from '../Components/Frontend/About.vue'
import Portfolio from '../Components/Frontend/Portfolio.vue'
import Service from '../Components/Frontend/Services.vue'
import ContactMe from '@/Components/Frontend/ContactMe.vue';
defineProps({
    skills: Object,
    projects: Object
})
</script>

<template>

    <Head title="Vue" />
    <Frontend>

        <!-- <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in
                    </Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                </template>
            </div>
        </div> -->

        <!-- Hero -->
        <Hero />
        <!-- Promote -->
        <Promote />
        <!-- About -->
        <About />
        <!-- Skill -->
        <Skill :skills="skills" />
        <!-- Portfolio -->
        <Portfolio :skills="skills" :projects="projects" />
        <!-- services Secondary -->
        <Service />
        <!-- Contact -->
        <ContactMe />

    </Frontend>

</template>
