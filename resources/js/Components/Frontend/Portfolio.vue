<script setup>
import Projects from './Projects.vue'
defineProps({
    skills: Object,
    projects: Object
})
</script>

<template>
    <section id="portfolio" class="section bg-light-primary dark:bg-dark-primary min-h-[1400px]">
        <div class="contianer mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">My latest work</h2>
                <p class="subtitle">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit illum eveniet,
                    impedit maiores aperiam reprehenderit praesentium quia aliquid. Autem aperiam earum et. Voluptatem
                    sed
                    assumenda accusantium reiciendis unde quisquam corrupti?</p>
            </div>
        </div>
        <Projects :skills="skills" :projects="projects" />
    </section>
</template>
