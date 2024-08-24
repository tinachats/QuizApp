<script setup>
   import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="p-3 mb-3 border-botto shadow">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <Link :href="route('home')" class="d-flex align-items-center mb-2 mb-md-0 me-3 link-body-emphasis text-decoration-none">
                    <img :src="'storage/images/app/logo.png'" alt="QuizApp Logo" width="40" height="40">
                </Link>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <Link href="#" class="nav-link px-2 link-body-emphasis">Trivia</Link>
                    </li>   
                    <li>
                        <Link href="#" class="nav-link px-2 link-body-emphasis">Quiz</Link>
                    </li>
                    <li>
                        <Link :href="route('questions')" class="nav-link px-2 link-body-emphasis">Questions</Link>
                    </li>
                    <li>
                        <Link href="#" class="nav-link px-2 link-body-emphasis">Leaderboard</Link>
                    </li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control rounded-pill" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <div class="dropdown" v-if="$page.props.auth.user">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img :src="'storage/images/users/tatiana.jpg'" alt="Tatiana Simmons" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-end" v-else>
                        <Link :href="route('login')" class="d-block link-body-emphasis text-decoration-none mx-3">
                            Sign In
                        </Link>
                        <Link :href="route('register')" as="button" type="button" class="btn btn-dark btn-sm rounded-pill px-3">
                            Sign Up
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>