<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';
    import NewQuestionModal from '@/Layouts/NewQuestionModal.vue';
    import { ref } from 'vue';

    const showModal = ref(false);
    const createdQuestion = ref(null);
    const answers = ref([]);
    const selectedAnswer = ref(null);
    let errors = true;

    let questionError = document.getElementById('question-error');

    // Initialize answers with an ID of 1
    let answerId = 1;

    function addNewAnswer() {
        const newAnswer = {
            id: answerId++,
            answer: null,
            correct_answer: false
        };

        // Add a new answer to the answers array
        answers.value.push(newAnswer);
    }

    function handleRadioToggle(id) {
        selectedAnswer.value = id;
        answers.value.forEach(answer => {
            if (answer.id === id) {
                answer.correct_answer = true;
            } else {
                answer.correct_answer = false;
            }
        });
    }

    function countAnswers() {
        if (answers.length === 4) {
            errors = false;
        } else {
            errors = true;
        }
        return errors;
    }

    function hasErrors() {
        if (!createdQuestion.value) {
            errors = true;
        } else {
            errors = false;
        }
        return errors;
    }

    function saveQuestion() {
        if (!createdQuestion.value) {
            alert('Question field cannot be blank.');
            errors = true;
        }

        if (hasErrors && countAnswers) {
            alert('Your answers are not sufficient.');
            errors = true;
        }

        if (!errors) {
            alert('Saving your question and answers.');
            return true;
        }
    }
</script>

<template>
    <Head title="Questions"/>
    <Layout>
        <button class="btn btn-primary fw-bold rounded-pill px-3 mb-2" id="show-question-modal" @click="showModal = true">Create</button>
        <table class="table table-hover table-responsive border border-secondary-subtle rounded-3 shadow-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Correct</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr v-for="answer in answers" :key="answer.id">
                    <th scope="row">{{ answer.id }}</th>
                    <td>{{ answer.answer }}</td>
                    <td>{{ answer.correct_answer }}</td>
                </tr>
            </tbody>
        </table>
    </Layout>

    <Teleport to="body">
        <NewQuestionModal :show="showModal" @close="showModal = false">
            <template #header>
                <h5 class="fw-bold">Add a new Question</h5>
            </template>
            <template #body>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="question" v-model="createdQuestion">
                    <label for="question">Type your question...</label>
                    <small class="text-danger" id="question-error"></small>
                </div> 
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Correct</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="answer in answers" :key="answer.id">
                                <th scope="row">{{ answer.id }}</th>
                                <td>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="answer" v-model="answer.answer">
                                        <label for="answer">Type your answer...</label>
                                    </div> 
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center">
                                        <input class="form-check-input" type="radio" name="correct-answer" id="correct-answer" :checked="answer.correct_answer === true" :value="answer.id" @change="handleRadioToggle(answer.id)">
                                        <label class="form-check-label" for="correct-answer"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </template>
            <template #footer>
                <div class="d-flex align-items-center justify-content-end">
                    <button @click="addNewAnswer" class="btn btn-sm btn-primary rounded-pill px-3" v-if="answers.length < 4">
                        Next <i class="bi-chevron-double-right ms-1"></i>
                    </button>
                    <button @click="saveQuestion" class="btn btn-sm btn-success ms-2 rounded-pill px-3" v-if="answers.length > 3">
                        Save <i class="bi-save ms-1"></i>
                    </button>
                    <button class="btn btn-sm btn-light rounded-pill ms-2 px-3" @click="showModal = false">
                        Close <i class="bi-x-circle ms-1"></i>
                    </button>
                </div>
            </template>
        </NewQuestionModal>
    </Teleport>
</template>

